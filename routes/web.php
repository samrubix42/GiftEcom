<?php

use App\Livewire\Admin\Brand\BrandList;
use App\Livewire\Admin\Category\CategoryList;
use App\Livewire\Admin\Dashboard\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/categories', CategoryList::class)->name('categories');
    Route::get('/brands', BrandList::class)->name('brands');
});

Route::get('logout', function () {
    auth()->logout();
    return redirect()->route('login');
})->name('logout');