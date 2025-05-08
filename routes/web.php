<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Customer\AuthController as CustomerAuthController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Product;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

// Customer Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [CustomerAuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [CustomerAuthController::class, 'login']);
    Route::get('register', [CustomerAuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('register', [CustomerAuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [CustomerAuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest routes
    Route::middleware('admin.guest')->group(function () {
        Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AuthController::class, 'login']);
    });

    // Authenticated routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        
        // Product routes
        Route::resource('products', ProductController::class);
        
        // Category routes
        Route::resource('categories', CategoryController::class);
        
        // Order routes
        Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
        Route::get('orders/{order}', [OrderController::class, 'show'])->name('orders.show');
        Route::put('orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.update-status');
        // Customer routes
        Route::resource('customers', CustomerController::class);
        // User routes
        Route::resource('users', UserController::class);
    });
});

Route::get('/shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('/shop/{id}', [ShopController::class, 'show'])->name('shop.show');

Route::get('/cart', function() {
    return view('cart');
})->name('cart.index');

Route::get('/checkout', function() {
    return view('checkout');
})->name('checkout.index');

require __DIR__.'/auth.php';
