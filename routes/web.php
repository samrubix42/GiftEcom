<?php

use App\Livewire\Admin\Brand\BrandList;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\Dashboard\Dashboard;
use App\Livewire\Admin\Product\AddProduct;
use App\Livewire\Admin\Product\ProductList;
use App\Livewire\Admin\Product\UpdateProduct;
use App\Livewire\Public\Home\Home;
use Illuminate\Support\Facades\Route;

Route::get('/',Home::class)->name('home');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/categories', CategoryList::class)->name('categories');
    Route::get('/brands', BrandList::class)->name('brands');
    
    // Product routes
    Route::get('/products', ProductList::class)->name('products.index');
    Route::get('/products/create', AddProduct::class)->name('products.create');
    Route::get('/products/{id}/edit', UpdateProduct::class)->name('products.edit');
});

Route::get('logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');