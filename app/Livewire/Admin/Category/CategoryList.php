<?php

namespace App\Livewire\Admin\Category;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

class CategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $categoryId = null;
    public $name = '';
    public $slug = '';
    public $parent_id = null;
    public $is_active = 1;

    public $modalOpen = false;
    public $is_subcategory = false;

    public $search = '';
    public $perPage = 10;

    public $confirmDelete = false;
    public $deleteId;
    public $deleteName;


    protected function rules()
    {
        return [
            'name'       => 'required|max:255',
            'slug'       => 'required|max:255|unique:categories,slug,' . $this->categoryId,
            'parent_id'  => $this->is_subcategory ? 'required|exists:categories,id' : 'nullable',
            'is_active'  => 'boolean',
        ];
    }

    // Auto-generate slug
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    // Open modal
    public function openModal()
    {
        $this->resetFields();
        $this->modalOpen = true;
    }

    // Close modal
    public function closeModal()
    {
        $this->modalOpen = false;
    }

    // Reset form
    public function resetFields()
    {
        $this->categoryId = null;
        $this->name = '';
        $this->slug = '';
        $this->parent_id = null;
        $this->is_active = 1;
        $this->is_subcategory = false;
    }

    // Save new record
    public function save()
    {
        $this->slug = Str::slug($this->slug ?: $this->name);

        $this->validate();

        Category::create([
            'name'      => $this->name,
            'slug'      => $this->slug,
            'parent_id' => $this->is_subcategory ? $this->parent_id : null,
            'is_active' => $this->is_active,
        ]);

        $this->dispatch('toast', type: 'success', message: 'Category added successfully.');
        $this->closeModal();
    }

    // Load existing data for edit
    public function edit($id)
    {
        $cat = Category::findOrFail($id);

        $this->categoryId = $cat->id;
        $this->name = $cat->name;
        $this->slug = $cat->slug;
        $this->parent_id = $cat->parent_id;
        $this->is_active = $cat->is_active;

        $this->is_subcategory = !empty($cat->parent_id);

        $this->modalOpen = true;
    }

    // Update existing category
    public function update()
    {
        $cat = Category::findOrFail($this->categoryId);

        $this->slug = Str::slug($this->slug ?: $this->name);

        $this->validate();

        if ($this->parent_id == $cat->id) {
            $this->addError('parent_id', 'Category cannot be its own parent.');
            return;
        }

        $cat->update([
            'name'      => $this->name,
            'slug'      => $this->slug,
            'parent_id' => $this->is_subcategory ? $this->parent_id : null,
            'is_active' => $this->is_active,
        ]);

        $this->dispatch('toast', type: 'success', message: 'Category updated successfully.');
        $this->closeModal();
    }

    // Open delete popup
    public function confirmDeleteModal($id)
    {
        $cat = Category::findOrFail($id);

        $this->deleteId   = $cat->id;
        $this->deleteName = $cat->name;

        $this->confirmDelete = true;
    }

    // Delete category
    public function deleteCategory()
    {
        $cat = Category::find($this->deleteId);

        if (!$cat) {
            $this->confirmDelete = false;
            return;
        }

        if ($cat->children()->count()) {
            $this->dispatch('toast', type: 'error', message: 'Category has subcategories.');
            $this->confirmDelete = false;
            return;
        }

        $cat->delete();

        $this->dispatch('toast', type: 'success', message: 'Category deleted successfully.');

        $this->confirmDelete = false;
        $this->deleteId = null;
        $this->deleteName = null;
    }

    // Pagination reset
    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.category.category-list', [
            'categories' => Category::whereNull('parent_id')
                ->with('children')
                ->where(function ($q) {
                    $q->where('name', 'like', "%{$this->search}%")
                        ->orWhere('slug', 'like', "%{$this->search}%")
                        ->orWhereHas('children', function ($c) {
                            $c->where('name', 'like', "%{$this->search}%")
                                ->orWhere('slug', 'like', "%{$this->search}%");
                        });
                })
                ->orderBy('id', 'desc')
                ->paginate($this->perPage),

            'allCategories' => Category::whereNull('parent_id')->get(),
        ]);
    }
}
