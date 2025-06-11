@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Manage Products</h1>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('admin.products.create') }}"
        class="inline-block mb-4 text-white font-semibold py-2 px-4 rounded shadow"
        style="background-color: #2563EB;">
        + Add Product
    </a>

    <table class="min-w-full bg-white border">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Price (RM)</th>
                <th class="py-2 px-4 border-b">Quantity</th>
                <th class="py-2 px-4 border-b">Image</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $product->name }}</td>
                    <td class="py-2 px-4 border-b">RM{{ number_format($product->price, 2) }}</td>
                    <td class="py-2 px-4 border-b">{{ $product->quantity }}</td>
                    <td class="py-2 px-4 border-b">
                        @if ($product->img)
                            <img src="{{ asset('storage/' . $product->img) }}" alt="{{ $product->name }}" class="h-16">
                        @else
                            N/A
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="bg-yellow-400 hover:bg-yellow-500 text-white py-1 px-3 rounded mr-2">Edit</a>

                        <!-- Increase Quantity Button -->
                        <form action="{{ route('admin.products.updateQuantity', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="action" value="increase"
                                class="inline-block mb-4 text-white font-semibold py-2 px-4 rounded shadow"
                                style="background-color:rgb(241, 11, 11);">
                                Increase Quantity
                            </button>
                        </form>

                        <!-- Decrease Quantity Button -->
                        <form action="{{ route('admin.products.updateQuantity', $product->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" name="action" value="decrease"
                                class="inline-block mb-4 text-white font-semibold py-2 px-4 rounded shadow"
                                style="background-color:rgb(241, 11, 11);">
                                Decrease Quantity
                            </button>
                        </form>

                        <!-- Delete Product Button -->
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="inline"
                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="inline-block mb-4 text-white font-semibold py-2 px-4 rounded shadow"
                                style="background-color:rgb(241, 11, 11);">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="py-2 px-4 text-center">No products found.</td> <!-- Adjust colspan to 5 -->
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
