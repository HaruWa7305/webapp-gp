<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Check if user is logged in
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You need to login to place an order');
        }

        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'cart' => 'required',
            'payment_method' => 'required|string',
        ]);

        Log::info('Order store request data:', $validated);

        $cartJson = $validated['cart'];
        if (empty($cartJson)) {
            return redirect()->back()->with('error', 'Cart is empty');
        }

        // Decode the cart JSON data
        $cart = json_decode($cartJson, true);
        if (!$cart || count($cart) === 0) {
            return redirect()->back()->with('error', 'Cart is empty or invalid');
        }

        // Simulate payment (this could be expanded based on actual payment logic)
        $paymentSuccess = $this->processPayment($validated['payment_method']);

    if (!$paymentSuccess) {
        return redirect()->route('order.unsuccessful'); // Redirecting to the unsuccessful page
    }

        // Add dd(auth()->id()); here to check user ID for debugging
        //dd(auth()->id()); // This will dump and die the current authenticated user ID

        // If payment is successful, proceed to save the order
        try {
            // Calculate total price from cart
            $total = 0;
            $itemsData = [];

            foreach ($cart as $productId => $quantity) {
                $product = Product::find($productId);
                if (!$product) continue;

                $price = $product->price;
                $total += $price * $quantity;

                $itemsData[] = [
                    'product_id' => $productId,
                    'product_name' => $product->name,
                    'price' => $price,
                    'quantity' => $quantity,
                ];

                // Reduce product stock (quantity) in the products table
                $product->decrement('quantity', $quantity);
            }

            // Check if there are valid items
            if (count($itemsData) === 0) {
                return redirect()->back()->with('error', 'No valid products found in cart');
            }

            // Create the order in the 'orders' table with the user_id
            $order = Order::create([
    'user_id' => auth()->id(),  // This will use the logged-in user's ID
    'customer_name' => $validated['name'],
    'customer_email' => $validated['email'],
    'total' => $total,
    'payment_method' => $validated['payment_method'],
]);

            // Insert order items into 'order_items' table
            foreach ($itemsData as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['product_name'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity'],
                ]);
            }

            // Return to success page
            return redirect()->route('order.success');

        } catch (\Exception $e) {
            Log::error('Order creation failed: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Order failed to save');
        }
    }

    public function status()
{
    $user = auth()->user(); // Ensure the user is authenticated

    if (!$user) {
        return redirect()->route('login')->with('error', 'Please login to view your orders');
    }

    // Get the orders of the authenticated user
    $orders = $user->orders;

    // Check if the user has orders
    if ($orders->isEmpty()) {
        return redirect()->route('menus')->with('message', 'You have no orders yet.');
    }

    return view('orders.status', compact('orders'));  // Pass orders to the view
}



    private function processPayment($method)
    {
        // For example, if payment method is 'cod', always succeed
        if ($method === 'cod') {
            return true;
        }

        // For other methods, simulate random success/failure for demo purposes
        return rand(0, 1) === 1;
    }
}
