<?php

namespace App\Livewire\Public\Home;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Home extends Component
{
    public function render()
    {
        // Fetch products for different sections
        $newArrivals = Product::with(['images', 'variants'])
            ->where('status', true)
            ->latest()
            ->take(8)
            ->get();

        $featuredProducts = Product::with(['images', 'variants'])
            ->where('status', true)
            ->where('is_featured', true)
            ->take(8)
            ->get();

        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->take(4)
            ->get();

        return view('livewire.public.home.home', [
            'newArrivals' => $newArrivals,
            'featuredProducts' => $featuredProducts,
            'categories' => $categories,
        ]);
    }
}
