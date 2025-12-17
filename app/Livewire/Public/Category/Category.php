<?php

namespace App\Livewire\Public\Category;

use Livewire\Component;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    public function render()
    {
        $categories = CategoryModel::where('is_active', true)
            ->whereNull('parent_id')
            ->with('children')
            ->get();

        return view('livewire.public.category.category', [
            'categories' => $categories
        ]);
    }
}
