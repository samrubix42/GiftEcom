<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
use App\Models\Enquiry;
use App\Models\Contact;
use App\Models\ProductImage;
use App\Models\Attribute;
use App\Models\AttributeValue;

class Dashboard extends Component
{
    public array $metrics = [];
    public array $categoryData = [];

    #[Layout('components.layouts.admin')]
    public function mount()
    {
        $this->metrics = [
            'products' => Product::count(),
            'variants' => ProductVariant::count(),
            'categories' => Category::count(),
            'brands' => Brand::count(),
            'users' => User::count(),
            'enquiries' => Enquiry::count(),
            'contacts' => Contact::count(),
            'images' => ProductImage::count(),
            'attributes' => Attribute::count(),
            'attribute_values' => AttributeValue::count(),
            'featured' => Product::where('is_featured', 1)->count(),
        ];

        $categories = DB::table('categories')
            ->leftJoin('products', 'products.category_id', '=', 'categories.id')
            ->select('categories.name', DB::raw('count(products.id) as products_count'))
            ->groupBy('categories.id', 'categories.name')
            ->orderByDesc('products_count')
            ->limit(10)
            ->get();

        $this->categoryData = $categories->map(function ($c) {
            return ['name' => $c->name, 'count' => (int) $c->products_count];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.admin.dashboard.dashboard', [
            'metrics' => $this->metrics,
            'categoryData' => $this->categoryData,
        ]);
    }
}
