@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Order #{{ $order->id }}</h1>

    <div class="mb-6">
        <p><strong>Customer:</strong> {{ $order->user->name ?? 'Guest' }}</p>
        <p><strong>Email:</strong> {{ $order->user->email ?? '-' }}</p>
        <p><strong>Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
        <p><strong>Total:</strong> RM{{ number_format($order->total_price, 2) }}</p>
    </div>

    <h2 class="text-xl font-semibold mb-2">Items</h2>

    <table class="min-w-full bg-white border rounded shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Product</th>
                <th class="py-2 px-4 border-b">Quantity</th>
                <th class="py-2 px-4 border-b">Unit Price (RM)</th>
                <th class="py-2 px-4 border-b">Total (RM)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->items as $item)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $item->product->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                    <td class="py-2 px-4 border-b">{{ number_format($item->unit_price, 2) }}</td>
                    <td class="py-2 px-4 border-b">{{ number_format($item->quantity * $item->unit_price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('admin.orders.index') }}"
       class="inline-block mt-6 bg-gray-300 text-black py-2 px-4 rounded">
        Back to Orders
    </a>
@endsection
