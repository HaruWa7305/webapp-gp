@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Orders</h1>

    @if ($orders->isEmpty())
        <p class="text-gray-600">No orders found.</p>
    @else
        <table class="min-w-full bg-white border rounded shadow">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">Order ID</th>
                    <th class="py-2 px-4 border-b">Customer</th>
                    <th class="py-2 px-4 border-b">Total Price (RM)</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $order->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $order->user->name ?? 'Guest' }}</td>
                        <td class="py-2 px-4 border-b">RM{{ number_format($order->total, 2) }}</td>
                        <td class="py-2 px-4 border-b">{{ $order->created_at->format('d M Y') }}</td>
                        <td class="py-2 px-4 border-b">
                            <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
    @csrf
    @method('PUT')
    <select name="status" class="form-select" onchange="this.form.submit()">
        <option value="pending" {{ $order->status === 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="completed" {{ $order->status === 'completed' ? 'selected' : '' }}>Completed</option>
    </select>
</form>
                        </td>
                        <td class="py-2 px-4 border-b">
    <!-- Delete button, using a form with DELETE method -->
    <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');" class="inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded">Delete</button> <!-- Delete button -->
    </form>
</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
