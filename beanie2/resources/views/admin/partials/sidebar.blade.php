<aside class="w-64 bg-white shadow-md p-4">
    <h2 class="text-xl font-bold mb-6">☕ Coffee Admin</h2>
    <nav class="space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="block w-full text-left px-4 py-2 rounded bg-red-500 text-black hover:bg-red-600">Dashboard</a>
        <a href="{{ route('admin.products.index') }}" class="block w-full text-left px-4 py-2 rounded bg-red-500 text-black hover:bg-red-600">Manage Products</a>
        <a href="{{ route('admin.orders.index') }}" class="block w-full text-left px-4 py-2 rounded bg-red-500 text-black hover:bg-red-600">Orders</a>
        <a href="{{ route('admin.users.index') }}" class="block w-full text-left px-4 py-2 rounded bg-red-500 text-black hover:bg-red-600">Users</a>
        <form method="POST" action="{{ route('logout') }}" class="mt-6">
    @csrf
    <button type="submit" class="block w-full text-left px-4 py-2 rounded bg-red-500 text-black hover:bg-red-600">
        Logout
    </button>
</form>

    </nav>
</aside>
