<?php

use App\Livewire\Admin\Brand\BrandList;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\Dashboard\Dashboard;
use App\Livewire\Admin\EnquireList;
use App\Livewire\Admin\Product\AddProduct;
use App\Livewire\Admin\Product\ProductList;
use App\Livewire\Admin\Product\UpdateProduct;
use App\Livewire\Auth\Login;
use App\Livewire\Public\About\About;
use App\Livewire\Public\Category\Category;
use App\Livewire\Public\Home\Home;
use App\Livewire\Public\Shop\ProductView;
use App\Livewire\Public\Shop\Shop;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
});
Route::get('/',Home::class)->name('home');
Route::get('/product',Shop::class)->name('shop');
Route::get('/category',Category::class)->name('category');
Route::get('/about-us',About::class)->name('about-us');
Route::get('/product/{slug}',ProductView::class)->name('product.detail');
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/categories', CategoryList::class)->name('categories');
    Route::get('/brands', BrandList::class)->name('brands');
    
    // Product routes
    Route::get('/products', ProductList::class)->name('products.index');
    Route::get('/products/create', AddProduct::class)->name('products.create');
    Route::get('/products/{id}/edit', UpdateProduct::class)->name('products.edit');
    Route::get('Enquire',EnquireList::class)->name('enquiries');
});

Route::get('logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');