<?php

namespace App\Livewire\Public\Category;

use Livewire\Component;
use App\Models\Category as CategoryModel;
use Livewire\Attributes\Title;

class Category extends Component
{
    #[Title('Categories')]
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
