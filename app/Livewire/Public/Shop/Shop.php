<?php

namespace App\Livewire\Public\Shop;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Shop extends Component
{
    use WithPagination;

    public $selectedCategory;
    public $selectedBrand;

    protected $queryString = [
        'selectedCategory' => ['as' => 'category'],
        'selectedBrand' => ['as' => 'brand'],
    ];

    public function render()
    {
        $category= Category::where('is_active', true)
            ->withCount('products')
            ->get();
           $brands= Brand::where('is_active', true)->withCount('products')->get();
         $products = Product::where('status', true)
             ->with(['images', 'defaultVariant'])
             ->when($this->selectedCategory, function($q) {
                 $q->whereHas('category', function($q2) {
                     $q2->where('slug', $this->selectedCategory);
                 });
             })
             ->when($this->selectedBrand, function($q) {
                 $q->whereHas('brand', function($q2) {
                     $q2->where('slug', $this->selectedBrand);
                 });
             })
             ->latest()
             ->paginate(7);
        return view('livewire.public.shop.shop', [
            'categories' => $category,
            'brands' => $brands,
            'products' => $products,
        ]);
    }

    public function setCategory($slug)
    {
        if ($this->selectedCategory === $slug) {
            $this->selectedCategory = null;
        } else {
            $this->selectedCategory = $slug;
        }
        $this->resetPage();
    }

    public function setBrand($slug)
    {
        if ($this->selectedBrand === $slug) {
            $this->selectedBrand = null;
        } else {
            $this->selectedBrand = $slug;
        }
        $this->resetPage();
    }
}
