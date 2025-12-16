<?php

namespace App\Livewire\Admin\Product;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;

class ProductList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';
    public $categoryFilter = '';
    public $brandFilter = '';
    public $statusFilter = '';
    public $hasVariantsFilter = '';
    public $perPage = 10;

    public $deleteId = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'categoryFilter' => ['except' => ''],
        'brandFilter' => ['except' => ''],
        'statusFilter' => ['except' => ''],
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingCategoryFilter()
    {
        $this->resetPage();
    }

    public function updatingBrandFilter()
    {
        $this->resetPage();
    }

    public function updatingStatusFilter()
    {
        $this->resetPage();
    }

    public function confirmDelete($id)
    {
        $this->deleteId = $id;
    }

    public function deleteProduct()
    {
        if ($this->deleteId) {
            try {
                $product = Product::findOrFail($this->deleteId);
                $product->delete();

                $this->dispatch('toast', type: 'success', message: 'Product deleted successfully.');
                $this->deleteId = null;
            } catch (\Exception $e) {
                $this->dispatch('toast', type: 'error', message: 'Error deleting product: ' . $e->getMessage());
            }
        }
    }

    public function toggleStatus($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->status = !$product->status;
            $product->save();

            $this->dispatch('toast', type: 'success', message: 'Product status updated!');
        } catch (\Exception $e) {
            $this->dispatch('toast', type: 'error', message: 'Error updating status: ' . $e->getMessage());
        }
    }

    public function resetFilters()
    {
        $this->reset(['search', 'categoryFilter', 'brandFilter', 'statusFilter', 'hasVariantsFilter']);
        $this->resetPage();
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Product::with(['category', 'brand', 'variants'])
            ->when($this->search, function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($q) {
                $q->where('category_id', $this->categoryFilter);
            })
            ->when($this->brandFilter, function ($q) {
                $q->where('brand_id', $this->brandFilter);
            })
            ->when($this->statusFilter !== '', function ($q) {
                $q->where('status', $this->statusFilter);
            })
            ->when($this->hasVariantsFilter !== '', function ($q) {
                $q->where('has_variants', $this->hasVariantsFilter);
            })
            ->latest();

        $products = $query->paginate($this->perPage);
        $categories = Category::where('is_active', true)->get();
        $brands = Brand::where('is_active', true)->get();

        return view('livewire.admin.product.product-list', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands,
        ]);
    }
}
