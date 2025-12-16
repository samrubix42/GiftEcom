<?php

namespace App\Livewire\Admin\Product;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UpdateProduct extends Component
{
    use WithFileUploads;

    public $productId;
    public $product;

    // Product Properties
    public $name = '';
    public $slug = '';
    public $description = '';
    public $category_id = '';
    public $brand_id = '';
    public $status = true;
    public $has_variants = false;

    // Default Variant Properties (for simple products)
    public $defaultVariantId;
    public $sku = '';
    public $price = '';
    public $sale_price = '';
    public $stock = '';

    // Images
    public $images = [];
    public $existingImages = [];
    public $imagesToDelete = [];
    public $variantImagesToDelete = [];

    // Variant Management
    public $variants = [];
    public $variantsToDelete = [];

    // Data for dropdowns
    public $categories = [];
    public $brands = [];
    public $productAttributes = [];

    public function mount($id)
    {
        $this->productId = $id;
        $this->product = Product::with(['category', 'brand', 'variants.variantAttributes', 'images'])->findOrFail($id);
        
        // Load product data
        $this->name = $this->product->name;
        $this->slug = $this->product->slug;
        $this->description = $this->product->description;
        $this->category_id = $this->product->category_id;
        $this->brand_id = $this->product->brand_id;
        $this->status = $this->product->status;
        $this->has_variants = $this->product->has_variants;

        // Load existing images
        $this->existingImages = $this->product->images->toArray();

        // Load dropdown data
        $this->categories = Category::where('is_active', true)->get();
        $this->brands = Brand::where('is_active', true)->get();
        $this->productAttributes = Attribute::with('values')->get();

        // Load variants
        if ($this->has_variants) {
            foreach ($this->product->variants as $variant) {
                $variantAttrs = [];
                foreach ($variant->variantAttributes as $attr) {
                    $variantAttrs[$attr->attribute_id] = $attr->attribute_value_id;
                }
                
                $this->variants[] = [
                    'id' => $variant->id,
                    'sku' => $variant->sku,
                    'price' => $variant->price,
                    'sale_price' => $variant->sale_price,
                    'stock' => $variant->stock,
                    'status' => (bool)$variant->status,
                    'variantAttributes' => $variantAttrs,
                    'existingImages' => $variant->images->toArray(),
                    'newImages' => [],
                ];
            }
        } else {
            // Load default variant
            $defaultVariant = $this->product->variants->first();
            if ($defaultVariant) {
                $this->defaultVariantId = $defaultVariant->id;
                $this->sku = $defaultVariant->sku;
                $this->price = $defaultVariant->price;
                $this->sale_price = $defaultVariant->sale_price;
                $this->stock = $defaultVariant->stock;
            }
        }
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function addVariant()
    {
        $this->variants[] = [
            'id' => null,
            'sku' => 'VAR-' . strtoupper(Str::random(8)),
            'price' => '',
            'sale_price' => '',
            'stock' => '',
            'status' => true,
            'variantAttributes' => [],
            'existingImages' => [],
            'newImages' => [],
        ];
    }

    public function deleteVariantImage($variantIndex, $imageId)
    {
        if (!isset($this->variantImagesToDelete[$variantIndex])) {
            $this->variantImagesToDelete[$variantIndex] = [];
        }
        $this->variantImagesToDelete[$variantIndex][] = $imageId;
        
        // Remove from display
        if (isset($this->variants[$variantIndex]['existingImages'])) {
            $this->variants[$variantIndex]['existingImages'] = array_filter(
                $this->variants[$variantIndex]['existingImages'], 
                function($img) use ($imageId) {
                    return $img['id'] != $imageId;
                }
            );
        }
        $this->dispatch('toast', type: 'info', message: 'Variant image marked for deletion');
    }

    public function removeVariant($index)
    {
        if (isset($this->variants[$index]['id'])) {
            $this->variantsToDelete[] = $this->variants[$index]['id'];
        }
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
        $this->dispatch('toast', type: 'info', message: 'Variant marked for deletion');
    }

    public function deleteImage($imageId)
    {
        $this->imagesToDelete[] = $imageId;
        $this->existingImages = array_filter($this->existingImages, function($img) use ($imageId) {
            return $img['id'] != $imageId;
        });
        $this->dispatch('toast', type: 'info', message: 'Image marked for deletion');
    }

    public function setPrimaryImage($imageId)
    {
        // Set all images to not primary
        foreach ($this->existingImages as &$img) {
            $img['is_primary'] = false;
        }
        
        // Set selected image as primary
        foreach ($this->existingImages as &$img) {
            if ($img['id'] == $imageId) {
                $img['is_primary'] = true;
                break;
            }
        }
        
        // Update in database immediately
        ProductImage::where('product_id', $this->productId)->update(['is_primary' => false]);
        ProductImage::where('id', $imageId)->update(['is_primary' => true]);
        
        $this->dispatch('toast', type: 'success', message: 'Primary image updated successfully!');
    }

    public function duplicateVariant($index)
    {
        if (isset($this->variants[$index])) {
            $duplicate = $this->variants[$index];
            $duplicate['id'] = null; // Mark as new
            $duplicate['sku'] = 'VAR-' . strtoupper(Str::random(8));
            $this->variants[] = $duplicate;
            $this->dispatch('toast', type: 'success', message: 'Variant duplicated successfully!');
        }
    }

    public function getColorForVariant($variantIndex)
    {
        if (!isset($this->variants[$variantIndex]['variantAttributes'])) {
            return null;
        }

        foreach ($this->productAttributes as $attribute) {
            if (strtolower($attribute->name) === 'color') {
                $valueId = $this->variants[$variantIndex]['variantAttributes'][$attribute->id] ?? null;
                if ($valueId) {
                    $value = $attribute->values->firstWhere('id', $valueId);
                    return $value ? $value->value : null;
                }
            }
        }
        return null;
    }

    public function update()
    {
        // Validate based on product type
        if ($this->has_variants) {
            $this->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:products,slug,' . $this->productId,
                'category_id' => 'required|exists:categories,id',
                'variants' => 'required|array|min:1',
                'variants.*.sku' => 'required|string',
                'variants.*.price' => 'required|numeric|min:0',
                'variants.*.stock' => 'required|integer|min:0',
            ]);
        } else {
            $this->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255|unique:products,slug,' . $this->productId,
                'category_id' => 'required|exists:categories,id',
                'sku' => 'required|string|unique:product_variants,sku,' . $this->defaultVariantId,
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
            ]);
        }

        try {
            DB::beginTransaction();
            
            // Update product
            $this->product->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'brand_id' => $this->brand_id,
                'status' => $this->status,
                'has_variants' => $this->has_variants,
            ]);

            // Handle variants
            if ($this->has_variants) {
                // Delete marked variants
                if (!empty($this->variantsToDelete)) {
                    ProductVariant::whereIn('id', $this->variantsToDelete)->delete();
                }

                // Update or create variants
                foreach ($this->variants as $variantData) {
                    if (isset($variantData['id']) && $variantData['id']) {
                        // Update existing variant
                        $variant = ProductVariant::find($variantData['id']);
                        $variant->update([
                            'sku' => $variantData['sku'],
                            'price' => $variantData['price'],
                            'sale_price' => $variantData['sale_price'] ?? null,
                            'stock' => $variantData['stock'],
                            'status' => isset($variantData['status']) ? (bool)$variantData['status'] : false,
                        ]);

                        // Update attributes
                        $variant->variantAttributes()->delete();
                    } else {
                        // Create new variant
                        $variant = $this->product->variants()->create([
                            'sku' => $variantData['sku'],
                            'price' => $variantData['price'],
                            'sale_price' => $variantData['sale_price'] ?? null,
                            'stock' => $variantData['stock'],
                            'status' => isset($variantData['status']) ? (bool)$variantData['status'] : true,
                        ]);
                    }

                    // Attach attributes
                    if (isset($variantData['variantAttributes']) && is_array($variantData['variantAttributes'])) {
                        foreach ($variantData['variantAttributes'] as $attributeId => $valueId) {
                            if ($valueId) {
                                $variant->variantAttributes()->create([
                                    'attribute_id' => $attributeId,
                                    'attribute_value_id' => $valueId,
                                ]);
                            }
                        }
                    }

                    // Handle new variant images
                    if (isset($variantData['newImages']) && is_array($variantData['newImages'])) {
                        $currentMaxOrder = $variant->images()->max('sort_order') ?? -1;
                        foreach ($variantData['newImages'] as $imgIndex => $image) {
                            if ($image) {
                                $path = $image->store('products/variants', 'public');
                                $variant->images()->create([
                                    'image_path' => $path,
                                    'is_primary' => $imgIndex === 0,
                                    'sort_order' => $currentMaxOrder + $imgIndex + 1,
                                ]);
                            }
                        }
                    }
                }
            } else {
                // Update default variant
                if ($this->defaultVariantId) {
                    ProductVariant::where('id', $this->defaultVariantId)->update([
                        'sku' => $this->sku,
                        'price' => $this->price,
                        'sale_price' => $this->sale_price ?? null,
                        'stock' => $this->stock,
                        'status' => true,
                    ]);
                }
            }

            // Delete marked product images
            if (!empty($this->imagesToDelete)) {
                ProductImage::whereIn('id', $this->imagesToDelete)->delete();
            }

            // Delete marked variant images
            if (!empty($this->variantImagesToDelete)) {
                foreach ($this->variantImagesToDelete as $imageIds) {
                    ProductImage::whereIn('id', $imageIds)->delete();
                }
            }

            // Handle new product image uploads
            if ($this->images) {
                $currentMaxOrder = $this->product->images()->max('sort_order') ?? -1;
                foreach ($this->images as $index => $image) {
                    $path = $image->store('products', 'public');
                    $this->product->images()->create([
                        'image_path' => $path,
                        'is_primary' => count($this->existingImages) == 0 && $index === 0,
                        'sort_order' => $currentMaxOrder + $index + 1,
                    ]);
                }
            }

            DB::commit();
            $this->dispatch('toast', type: 'success', message: 'Product updated successfully!');
            return redirect()->route('admin.products.index');

        } catch (\Exception $e) {
            DB::rollBack();
            $this->dispatch('toast', type: 'error', message: 'Error updating product: ' . $e->getMessage());
            \Log::error('Product update failed: ' . $e->getMessage(), [
                'product_id' => $this->productId,
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.product.update-product');
    }
}
