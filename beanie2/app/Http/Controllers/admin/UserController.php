<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();
        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        // Optional: Prevent deleting self
        if (auth()->id() === $user->id) {
            return redirect()->route('admin.users.index')->with('message', 'You cannot delete yourself.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('message', 'User deleted.');
    }

    // OPTIONAL: Add edit/update methods if needed later
}
