@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Add New Product</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Product Name</label>
            <input type="text" name="name" id="name" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block font-semibold mb-1">Description</label>
            <textarea name="description" id="description" class="w-full border p-2 rounded" rows="4"></textarea>
        </div>

        <div class="mb-4">
            <label for="price" class="block font-semibold mb-1">Price (RM)</label>
            <input type="number" step="0.01" name="price" id="price" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="img" class="block font-semibold mb-1">Product Image</label>
            <input type="file" name="img" id="img" class="w-full border p-2 rounded">
        </div>

        <div class="flex justify-between mt-4">
    <a href="{{ route('admin.products.index') }}"
       class="bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded">
        Cancel
    </a>

    <button type="submit"
        class="bg-gray-300 hover:bg-gray-400 text-black py-2 px-4 rounded">
    Add Product
</button>
</div>
    </form>
@endsection
