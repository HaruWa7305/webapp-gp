<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;


class OrderController extends Controller
{
    public function index()
{
    $orders = Order::with('user')->latest()->get();  // Fetch all orders, including user info
    return view('admin.orders.index', compact('orders'));
}
public function updateStatus(Request $request, $orderId)
{
    try {
        $order = Order::findOrFail($orderId); // Get the order by ID
        $order->status = $request->status;  // Update the status
        $order->save(); // Save the updated order

        return redirect()->route('admin.orders.index')->with('success', 'Order status updated successfully');
    } catch (\Exception $e) {
        Log::error('Failed to update order status: ' . $e->getMessage());
        return redirect()->route('admin.orders.index')->with('error', 'Failed to update order status');
    }
}
public function destroy($orderId)
{
    try {
        $order = Order::findOrFail($orderId);
        $order->delete();

        return redirect()->route('admin.orders.index')->with('success', 'Order deleted successfully');
    } catch (\Exception $e) {
        Log::error('Failed to delete order: ' . $e->getMessage());
        return redirect()->route('admin.orders.index')->with('error', 'Failed to delete order');
    }
}
}
