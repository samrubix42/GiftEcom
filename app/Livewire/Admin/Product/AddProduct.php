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

class AddProduct extends Component
{
    use WithFileUploads;

    // Product Properties
    public $name = '';
    public $slug = '';
    public $description = '';
    public $category_id = '';
    public $brand_id = '';
    public $status = true;
    public $has_variants = false;

    // Default Variant Properties (for simple products)
    public $sku = '';
    public $price = '';
    public $sale_price = '';
    public $stock = '';

    // Images
    public $images = [];
    public $existingImages = [];

    // Variant Management
    public $variants = [];
    public $selectedAttributes = [];

    // Data for dropdowns
    public $categories = [];
    public $brands = [];
    public $productAttributes = [];

    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|unique:products,slug|max:255',
        'description' => 'nullable|string',
        'category_id' => 'required|exists:categories,id',
        'brand_id' => 'nullable|exists:brands,id',
        'status' => 'boolean',
        'has_variants' => 'boolean',
        'sku' => 'required_if:has_variants,false|string|unique:product_variants,sku',
        'price' => 'required_if:has_variants,false|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0',
        'stock' => 'required_if:has_variants,false|integer|min:0',
        'images.*' => 'nullable|image|max:2048',
    ];

    public function mount()
    {
        $this->categories = Category::where('is_active', true)->get();
        $this->brands = Brand::where('is_active', true)->get();
        $this->productAttributes = Attribute::with('values')->get();
        
        // Generate initial SKU
        $this->sku = 'PRD-' . strtoupper(Str::random(8));
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updatedHasVariants($value)
    {
        if ($value) {
            $this->reset(['sku', 'price', 'sale_price', 'stock']);
        } else {
            // Generate SKU for simple product
            $this->sku = 'PRD-' . strtoupper(Str::random(8));
        }
    }

    public function addVariant()
    {
        $this->variants[] = [
            'sku' => 'VAR-' . strtoupper(Str::random(8)),
            'price' => '',
            'sale_price' => '',
            'stock' => '',
            'status' => true,
            'attributes' => []
        ];
    }

    public function removeVariant($index)
    {
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
    }

    public function save()
    {
        // Validate based on product type
        if ($this->has_variants) {
            $this->validate([
                'name' => 'required|string|max:255',
                'slug' => 'required|string|unique:products,slug|max:255',
                'category_id' => 'required|exists:categories,id',
                'variants' => 'required|array|min:1',
                'variants.*.sku' => 'required|string|unique:product_variants,sku',
                'variants.*.price' => 'required|numeric|min:0',
                'variants.*.stock' => 'required|integer|min:0',
            ]);
        } else {
            $this->validate();
        }

        try {
            // Create the product
            $product = Product::create([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'category_id' => $this->category_id,
                'brand_id' => $this->brand_id,
                'has_variants' => $this->has_variants,
                'status' => $this->status,
            ]);

            // Handle variants or default variant
            if ($this->has_variants && count($this->variants) > 0) {
                foreach ($this->variants as $variantData) {
                    $variant = $product->variants()->create([
                        'sku' => $variantData['sku'],
                        'price' => $variantData['price'],
                        'sale_price' => $variantData['sale_price'] ?? null,
                        'stock' => $variantData['stock'],
                        'status' => $variantData['status'] ?? true,
                    ]);

                    // Attach attributes to variant if any
                    if (isset($variantData['variantAttributes']) && is_array($variantData['variantAttributes'])) {
                        foreach ($variantData['variantAttributes'] as $attributeId => $valueId) {
                            if ($valueId) {
                                $variant->attributes()->create([
                                    'attribute_id' => $attributeId,
                                    'attribute_value_id' => $valueId,
                                ]);
                            }
                        }
                    }
                }
            } else {
                // Create default variant for simple product
                $product->variants()->create([
                    'sku' => $this->sku,
                    'price' => $this->price,
                    'sale_price' => $this->sale_price ?? null,
                    'stock' => $this->stock,
                    'status' => true,
                ]);
            }

            // Handle image uploads
            if ($this->images) {
                foreach ($this->images as $index => $image) {
                    $path = $image->store('products', 'public');
                    $product->images()->create([
                        'image_path' => $path,
                        'is_primary' => $index === 0,
                        'sort_order' => $index,
                    ]);
                }
            }

            session()->flash('message', 'Product created successfully!');
            return redirect()->route('admin.products.index');

        } catch (\Exception $e) {
            session()->flash('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.product.add-product');
    }
}
