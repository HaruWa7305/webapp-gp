<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
    $products = Product::all();  // Fetch updated products with the new quantity
    return view('admin.products.index', compact('products'));
}
public function updateQuantity($id, Request $request)
    {
        // Find the product
        $product = Product::findOrFail($id);

        // Check the action (increase or decrease)
        if ($request->input('action') == 'increase') {
            // Increase the quantity by 1
            $product->quantity += 1;
        } elseif ($request->input('action') == 'decrease') {
            // Decrease the quantity by 1, ensuring it doesn't go below 0
            if ($product->quantity > 0) {
                $product->quantity -= 1;
            }
        }

        // Save the updated quantity
        $product->save();

        // Redirect back with a success message
        return redirect()->route('admin.products.index')->with('success', 'Product quantity updated successfully!');
    }
    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only('name', 'description', 'price');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('products', 'public');
        }

        Product::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::findOrFail($id);
        $data = $request->only('name', 'description', 'price');

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Product updated!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }
}
