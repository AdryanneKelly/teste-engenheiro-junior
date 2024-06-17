<?php

use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Customer\CreateCustomer;
use App\Livewire\Customer\EditCustomer;
use App\Livewire\Customer\ListCustomers;
use App\Livewire\Customer\ViewCustomer;
use App\Livewire\Order\CreateOrder;
use App\Livewire\Order\EditOrder;
use App\Livewire\Order\ListOrders;
use App\Livewire\Order\ViewOrder;
use App\Livewire\Product\ListProducts;
use App\Livewire\Product\CreateProduct;
use App\Livewire\Product\EditProduct;
use App\Livewire\Product\ViewProduct;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/products');

Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/logout', function () {
    auth()->logout();
    return redirect()->to('/login');
})->name('logout');

Route::name('products.')->middleware('auth')->prefix('products')->group(function () {
    Route::get('/', ListProducts::class)->name('index');
    Route::get('/create', CreateProduct::class)->name('create');
    Route::get('/edit/{product}', EditProduct::class)->name('edit');
    Route::get('/view/{product}', ViewProduct::class)->name('view');
});

Route::name('orders.')->middleware('auth')->prefix('orders')->group(function () {
    Route::get('/', ListOrders::class)->name('index');
    Route::get('/create', CreateOrder::class)->name('create');
    Route::get('/edit/{order}', EditOrder::class)->name('edit');
    Route::get('/view/{order}', ViewOrder::class)->name('view');
});

Route::name('customers.')->middleware('auth')->prefix('customers')->group(function () {
    Route::get('/', ListCustomers::class)->name('index');
    Route::get('/create', CreateCustomer::class)->name('create');
    Route::get('/edit/{customer}', EditCustomer::class)->name('edit');
    Route::get('/view/{customer}', ViewCustomer::class)->name('view');
});
