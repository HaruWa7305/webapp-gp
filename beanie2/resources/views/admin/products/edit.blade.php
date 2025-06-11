@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Edit Product</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Product Name</label>
            <input type="text" name="name" id="name" class="w-full border p-2 rounded"
                   value="{{ old('name', $product->name) }}" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold mb-1">Description</label>
            <textarea name="description" id="description" class="w-full border p-2 rounded" rows="4">{{ old('description', $product->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block font-semibold mb-1">Price (RM)</label>
            <input type="number" step="0.01" name="price" id="price" class="w-full border p-2 rounded"
                   value="{{ old('price', $product->price) }}" required>
        </div>

        <div class="mb-4">
            <label for="img" class="block font-semibold mb-1">Product Image</label>
            @if ($product->img)
                <img src="{{ asset('storage/' . $product->img) }}" alt="Current Image" class="h-20 mb-2">
            @endif
            <input type="file" name="img" id="img" class="w-full border p-2 rounded">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.products.index') }}" class="bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded">
                Cancel
            </a>
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded">
                Update Product
            </button>
        </div>
    </form>
@endsection
