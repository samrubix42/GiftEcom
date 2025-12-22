<?php

namespace App\Livewire\Public\Includes;

use App\Models\Brand;
use App\Models\Category;
use Livewire\Component;

class Footer extends Component
{
    public function render()
    {  $featuredCategories = Category::where('is_active', true)
        ->orderBy('name')
        ->limit(5)
        ->get();
        $brand= Brand::where('is_active', true)
                ->orderBy('name')
                ->limit(5)
                ->get();
        return view('livewire.public.includes.footer',[
            'featuredCategories' => $featuredCategories,
            'brands'=>$brand,
        ]);
    }
}
