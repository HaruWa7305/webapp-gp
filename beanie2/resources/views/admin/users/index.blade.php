@extends('admin.layouts.admin')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Registered Users</h1>

    @if (session('message'))
        <div class="mb-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('message') }}
        </div>
    @endif

    <table class="min-w-full bg-white border rounded shadow">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b">ID</th>
                <th class="py-2 px-4 border-b">Name</th>
                <th class="py-2 px-4 border-b">Email</th>
                <th class="py-2 px-4 border-b">Registered</th>
                <th class="py-2 px-4 border-b">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $user->created_at->format('d M Y') }}</td>
                    <td class="py-2 px-4 border-b">
                        @if (auth()->id() !== $user->id)
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="bg-red-600 text-white px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        @else
                            <span class="text-gray-400">You</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
