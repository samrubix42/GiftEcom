<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

class BrandList extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $brandId = null;
    public $name = '';
    public $slug = '';
    public $is_active = 1;

    public $modalOpen = false;

    public $search = '';
    public $perPage = 10;

    public $deleteModal = false;
    public $deleteId;
    public $deleteName;

    protected function rules()
    {
        return [
            'name'      => 'required|max:255',
            'slug'      => 'required|max:255|unique:brands,slug,' . $this->brandId,
            'is_active' => 'boolean',
        ];
    }

    // Generate slug automatically
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    // Open modal
    public function openModal()
    {
        $this->resetForm();
        $this->modalOpen = true;
    }

    // Close modal
    public function closeModal()
    {
        $this->modalOpen = false;
    }

    // Reset all form fields
    public function resetForm()
    {
        $this->brandId = null;
        $this->name = '';
        $this->slug = '';
        $this->is_active = 1;
    }

    // Save brand
    public function save()
    {
        $this->slug = Str::slug($this->slug ?: $this->name);

        $this->validate();

        Brand::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
        ]);

        $this->dispatch('toast', type: 'success', message: 'Brand added successfully.');

        $this->closeModal();
    }

    // Edit brand
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        $this->brandId = $brand->id;
        $this->name = $brand->name;
        $this->slug = $brand->slug;
        $this->is_active = $brand->is_active;

        $this->modalOpen = true;
    }

    // Update brand
    public function update()
    {
        $brand = Brand::findOrFail($this->brandId);

        $this->slug = Str::slug($this->slug ?: $this->name);

        $this->validate();

        $brand->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
        ]);

        $this->dispatch('toast', type: 'success', message: 'Brand updated successfully.');

        $this->closeModal();
    }

    // Open delete modal
    public function openDeleteModal($id)
    {
        $brand = Brand::findOrFail($id);

        $this->deleteId = $brand->id;
        $this->deleteName = $brand->name;

        $this->deleteModal = true;
    }

    // Delete brand
    public function deleteBrand()
    {
        $brand = Brand::find($this->deleteId);

        if ($brand) {
            $brand->delete();

            $this->dispatch('toast', type: 'success', message: 'Brand deleted successfully.');
        }

        $this->deleteModal = false;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.brand.brand-list', [
            'brands' => Brand::where('name', 'like', "%{$this->search}%")
                ->orderBy('id', 'desc')
                ->paginate($this->perPage),
        ]);
    }
}

