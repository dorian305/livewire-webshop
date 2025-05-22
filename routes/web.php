<?php

use App\Http\Middleware\IsAdminMiddleware;
use App\Livewire\Admin\Categories\EditCategory;
use App\Livewire\Admin\Categories\CreateCategory;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\Products\CreateProduct;
use App\Livewire\Admin\Products\EditProduct;
use App\Livewire\Admin\Users\CreateUser;
use App\Livewire\Admin\Users\EditUser;
use App\Livewire\Carts\ViewCart;
use App\Livewire\Checkout\Checkout;
use App\Livewire\Checkout\CheckoutCompleted;
use App\Livewire\Home\Home;
use App\Livewire\Orders\OrderHistory;
use App\Livewire\Products\ListProducts;
use App\Livewire\Products\ProductDetails;
use Illuminate\Support\Facades\Route;

Route::get('/home', Home::class)
    ->name('home');
Route::get('/list-products', ListProducts::class)
    ->name('list-products');
Route::get('/products/{product}', ProductDetails::class)
    ->name('view-product');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/user/order-history', OrderHistory::class)
        ->name('order-history');
    Route::get('/view-cart', ViewCart::class)
        ->name('view-cart');
    Route::get('/checkout', Checkout::class)
        ->name('checkout');
    Route::get('/checkout-completed', CheckoutCompleted::class)
        ->name('checkout-completed');

    // Admin
    Route::middleware(IsAdminMiddleware::class)
        ->prefix('admin')
        ->group(function () {
            Route::get('dashboard', Dashboard::class)
                ->name('admin-dashboard');
            Route::get('categories/new', CreateCategory::class)
                ->name('create-category');
            Route::get('categories/{category}/edit', EditCategory::class)
                ->name('edit-category');
            Route::get('products/new', CreateProduct::class)
                ->name('create-product');
            Route::get('products/{product}/edit', EditProduct::class)
                ->name('edit-product');
            Route::get('users/new', CreateUser::class)
                ->name('create-user');
            Route::get('users/{user}/edit', EditUser::class)
                ->name('edit-user');
        });
});
