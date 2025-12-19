<?php

namespace App\Livewire\Public\Includes;

use Livewire\Component;
use App\Models\Category;

class Header extends Component
{
    public function render()
    {
        $menuCategories = Category::where('is_active', true)->orderBy('name')->get();
        return view('livewire.public.includes.header', [
            'menuCategories' => $menuCategories,
        ]);
    }
}
