<?php

namespace App\Livewire\Admin\Brand;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

class BrandList extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $brandId = null;
    public $name = '';
    public $slug = '';
    public $image;
    public $oldImage;
    public $is_active = 1;
    public $is_featured = 0;

    public $modalOpen = false;

    public $search = '';
    public $perPage = 10;

    public $deleteModal = false;
    public $deleteId;
    public $deleteName;

    protected function rules()
    {
        return [
            'name'        => 'required|max:255',
            'slug'        => 'required|max:255|unique:brands,slug,' . $this->brandId,
            'image'       => 'nullable|image|max:2048',
            'is_active'   => 'boolean',
            'is_featured' => 'boolean',
        ];
    }

    // Auto-generate slug
    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    // Open create modal
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

    // Reset form
    public function resetForm()
    {
        $this->brandId = null;
        $this->name = '';
        $this->slug = '';
        $this->image = null;
        $this->oldImage = null;
        $this->is_active = 1;
        $this->is_featured = 0;
    }

    // Save brand
    public function save()
    {
        $this->slug = Str::slug($this->slug ?: $this->name);
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('brands', 'public');
        }

        Brand::create([
            'name'        => $this->name,
            'slug'        => $this->slug,
            'image'       => $imagePath,
            'is_active'   => $this->is_active,
            'is_featured' => $this->is_featured,
        ]);

        $this->dispatch('toast', type: 'success', message: 'Brand added successfully.');
        $this->closeModal();
    }

    // Edit brand
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        $this->brandId     = $brand->id;
        $this->name        = $brand->name;
        $this->slug        = $brand->slug;
        $this->oldImage    = $brand->image;
        $this->is_active   = $brand->is_active;
        $this->is_featured = (bool) $brand->is_featured;

        $this->modalOpen = true;
    }

    // Update brand
    public function update()
    {
        $brand = Brand::findOrFail($this->brandId);
        $this->slug = Str::slug($this->slug ?: $this->name);
        $this->validate();

        $imagePath = $this->oldImage;
        if ($this->image) {
            $imagePath = $this->image->store('brands', 'public');
        }

        $brand->update([
            'name'        => $this->name,
            'slug'        => $this->slug,
            'image'       => $imagePath,
            'is_active'   => $this->is_active,
            'is_featured' => $this->is_featured,
        ]);

        $this->dispatch('toast', type: 'success', message: 'Brand updated successfully.');
        $this->closeModal();
    }

    // Delete modal
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
        Brand::where('id', $this->deleteId)->delete();
        $this->dispatch('toast', type: 'success', message: 'Brand deleted successfully.');
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
