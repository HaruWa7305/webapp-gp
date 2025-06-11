<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\Admin\ContactFormController as AdminContactFormController; // Alias for admin controller
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController; // for user-side order handling
use App\Http\Controllers\Admin\OrderController as AdminOrderController; // alias for admin order handling

use App\Http\Controllers\Admin\ProductController;
use Illuminate\Http\Request;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\User;



Route::get('/contact', [ContactFormController::class, 'showForm'])->name('contact.form');

Route::post('/contact', [ContactFormController::class, 'submitForm'])->name('contact.submit');  // Handle form submission
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    // Define the resource route with alias
    Route::resource('contact_forms', AdminContactFormController::class);
});
    Route::resource('orders', OrderController::class);
    Route::put('orders/{orderId}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
});
Route::get('/order-status', [OrderController::class, 'status'])->name('orders.status');

Route::get('/', function () {
    return redirect()->route('login');
});
Route::put('/admin/products/{id}/updateQuantity', [ProductController::class, 'updateQuantity'])->name('admin.products.updateQuantity');
Route::get('welcome', function () {
    return view('welcome')->with('message', session('message'));
})->name('welcome');
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('login');
})->name('logout');
Route::get('profile', function () {
    $email = session('profile_email');

    if (!$email) {
        return redirect()->route('login')->with('message', 'Please login first.');
    }

    $user = User::where('email', $email)->first();

    if (!$user) {
        return redirect()->route('login')->with('message', 'User not found.');
    }

    return view('profile', ['user' => $user]);
})->name('profile');


Route::put('/admin/orders/{orderId}/status', [AdminOrderController::class, 'updateStatus'])->name('admin.orders.updateStatus');
Route::get('/order/unsuccessful', function () {
    return view('unsuccessful'); // This is the view for unsuccessful payment
})->name('order.unsuccessful');

Route::delete('/admin/orders/{order}', [AdminOrderController::class, 'destroy'])->name('admin.orders.destroy');


Route::middleware('auth')->group(function () {
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/order/status', [OrderController::class, 'status'])->name('order.status');
});


Route::get('/menus', [MenuController::class, 'menus'])->name('menus');
Route::post('/orders', [OrderController::class, 'store'])->name('order.store');

Route::get('register', function () {
    return view('register');
});

Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('orders', App\Http\Controllers\Admin\OrderController::class);
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->only(['index', 'destroy']);
});
require __DIR__.'/auth.php';
