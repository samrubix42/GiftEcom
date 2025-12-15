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
use Illuminate\Support\Facades\Storage;

class AddProduct extends Component
{
    use WithFileUploads;

    // Step Management
    public $currentStep = 1;
    public $totalSteps = 4;

    // Product Properties (Step 1)
    public $name = '';
    public $slug = '';
    public $description = '';
    public $category_id = '';
    public $brand_id = '';
    public $status = true;
    public $has_variants = false;

    // Simple Product Variant (Step 2 - if has_variants = false)
    public $sku = '';
    public $price = '';
    public $sale_price = '';
    public $stock = '';

    // Variant Products (Step 2 - if has_variants = true)
    public $variants = [];

    // Images (Step 3)
    public $productImages = [];
    
    // Data for dropdowns
    public $categories = [];
    public $brands = [];
    public $productAttributes = [];
    
    // Add new attribute on the fly
    public $showAddAttribute = false;
    public $newAttributeName = '';
    public $newAttributeValues = [''];
    
    // Image removal
    public $imagesToRemove = [];

    public function mount()
    {
        $this->categories = Category::where('is_active', true)->get();
        $this->brands = Brand::where('is_active', true)->get();
        $this->productAttributes = Attribute::with('values')->get();
        $this->sku = 'PRD-' . strtoupper(Str::random(8));
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function updatedHasVariants($value)
    {
        if ($value) {
            $this->reset(['sku', 'price', 'sale_price', 'stock', 'variants']);
            $this->totalSteps = 4; // Basic Info -> Variants -> Images -> Review
        } else {
            $this->reset(['variants']);
            $this->sku = 'PRD-' . strtoupper(Str::random(8));
            $this->totalSteps = 4; // Basic Info -> Pricing -> Images -> Review
        }
    }

    // ========== STEP NAVIGATION ==========
    
    public function nextStep()
    {
        try {
            $this->validateCurrentStep();
            
            if ($this->currentStep < $this->totalSteps) {
                $this->currentStep++;
                
                // Scroll to top after step change
                $this->dispatch('scroll-to-top');
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, errors will be displayed automatically
            throw $e;
        }
    }

    public function previousStep()
    {
        if ($this->currentStep > 1) {
            $this->currentStep--;
            
            // Scroll to top after step change
            $this->dispatch('scroll-to-top');
        }
    }

    public function goToStep($step)
    {
        if ($step >= 1 && $step <= $this->currentStep) {
            $this->currentStep = $step;
        }
    }

    // ========== VALIDATION ==========
    
    protected function validateCurrentStep()
    {
        try {
            if ($this->currentStep === 1) {
                // Step 1: Basic Information
                $this->validate([
                    'name' => 'required|string|max:255',
                    'slug' => 'required|string|unique:products,slug|max:255',
                    'category_id' => 'required|exists:categories,id',
                ]);
            } elseif ($this->currentStep === 2) {
                // Step 2: Pricing/Variants
                if (!$this->has_variants) {
                    $this->validate([
                        'sku' => 'required|string',
                        'price' => 'required|numeric|min:0',
                        'stock' => 'required|integer|min:0',
                    ]);
                } else {
                    $this->validate([
                        'variants' => 'required|array|min:1',
                    ], [
                        'variants.required' => 'Please add at least one variant',
                        'variants.min' => 'Please add at least one variant',
                    ]);
                }
            }
            // Step 3: Images (optional)
            // Step 4: Review and save
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Re-throw to show validation errors
            throw $e;
        }
    }

    // ========== VARIANT MANAGEMENT ==========
    
    public function addVariant()
    {
        $variantData = [
            'sku' => 'VAR-' . strtoupper(Str::random(8)),
            'price' => '',
            'sale_price' => '',
            'stock' => '',
            'status' => true,
            'variantAttributes' => [],
            'images' => [],
            'color_name' => '', // For display
        ];

        $this->variants[] = $variantData;
    }

    public function removeVariant($index)
    {
        unset($this->variants[$index]);
        $this->variants = array_values($this->variants);
    }

    public function duplicateVariant($index)
    {
        if (isset($this->variants[$index])) {
            $newVariant = $this->variants[$index];
            $newVariant['sku'] = 'VAR-' . strtoupper(Str::random(8));
            $this->variants[] = $newVariant;
        }
    }

    public function removeProductImage($index)
    {
        if (isset($this->productImages[$index])) {
            unset($this->productImages[$index]);
            $this->productImages = array_values($this->productImages);
        }
    }

    public function removeVariantImage($variantIndex, $imageIndex)
    {
        if (isset($this->variants[$variantIndex]['images'][$imageIndex])) {
            unset($this->variants[$variantIndex]['images'][$imageIndex]);
            $this->variants[$variantIndex]['images'] = array_values($this->variants[$variantIndex]['images']);
        }
    }

    // ========== ATTRIBUTE MANAGEMENT ==========
    
    public function toggleAddAttribute()
    {
        $this->showAddAttribute = !$this->showAddAttribute;
        if (!$this->showAddAttribute) {
            $this->reset(['newAttributeName', 'newAttributeValues']);
        }
    }

    public function addAttributeValue()
    {
        $this->newAttributeValues[] = '';
    }

    public function removeAttributeValue($index)
    {
        unset($this->newAttributeValues[$index]);
        $this->newAttributeValues = array_values($this->newAttributeValues);
    }

    public function saveNewAttribute()
    {
        $this->validate([
            'newAttributeName' => 'required|string|max:255',
            'newAttributeValues.*' => 'required|string|max:255',
        ], [
            'newAttributeName.required' => 'Attribute name is required',
            'newAttributeValues.*.required' => 'All attribute values must be filled',
        ]);

        try {
            DB::beginTransaction();
            
            // Create the attribute
            $attribute = Attribute::create([
                'name' => $this->newAttributeName,
            ]);

            // Create attribute values
            foreach (array_filter($this->newAttributeValues) as $value) {
                $attribute->values()->create([
                    'value' => $value,
                ]);
            }

            DB::commit();
            
            // Reload attributes
            $this->productAttributes = Attribute::with('values')->get();
            
            session()->flash('message', 'Attribute created successfully!');
            $this->reset(['newAttributeName', 'newAttributeValues', 'showAddAttribute']);
            
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error creating attribute: ' . $e->getMessage());
        }
    }

    // ========== IMAGE OPTIMIZATION ==========
    
    protected function optimizeAndSaveImage($image, $path)
    {
        try {
            // Check if GD is available for basic optimization
            if (extension_loaded('gd')) {
                $tempPath = $image->store('temp', 'public');
                $fullPath = storage_path('app/public/' . $tempPath);
                
                // Get image info
                $info = getimagesize($fullPath);
                if ($info === false) {
                    throw new \Exception('Invalid image');
                }
                
                // Load image based on type
                switch ($info[2]) {
                    case IMAGETYPE_JPEG:
                        $source = imagecreatefromjpeg($fullPath);
                        break;
                    case IMAGETYPE_PNG:
                        $source = imagecreatefrompng($fullPath);
                        break;
                    case IMAGETYPE_WEBP:
                        $source = imagecreatefromwebp($fullPath);
                        break;
                    default:
                        throw new \Exception('Unsupported image type');
                }
                
                // Resize if too large (max 1200px on longest side)
                $width = imagesx($source);
                $height = imagesy($source);
                $maxDimension = 1200;
                
                if ($width > $maxDimension || $height > $maxDimension) {
                    if ($width > $height) {
                        $newWidth = $maxDimension;
                        $newHeight = (int)(($height / $width) * $maxDimension);
                    } else {
                        $newHeight = $maxDimension;
                        $newWidth = (int)(($width / $height) * $maxDimension);
                    }
                    
                    $resized = imagecreatetruecolor($newWidth, $newHeight);
                    
                    // Preserve transparency for PNG
                    if ($info[2] === IMAGETYPE_PNG) {
                        imagealphablending($resized, false);
                        imagesavealpha($resized, true);
                    }
                    
                    imagecopyresampled($resized, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
                    
                    // Save optimized image
                    switch ($info[2]) {
                        case IMAGETYPE_JPEG:
                            imagejpeg($resized, $fullPath, 85);
                            break;
                        case IMAGETYPE_PNG:
                            imagepng($resized, $fullPath, 8);
                            break;
                        case IMAGETYPE_WEBP:
                            imagewebp($resized, $fullPath, 85);
                            break;
                    }
                    
                    imagedestroy($resized);
                }
                
                imagedestroy($source);
                
                // Move to final destination
                $finalPath = $path . '/' . basename($tempPath);
                Storage::disk('public')->move($tempPath, $finalPath);
                
                return $finalPath;
            }
            
            // Fallback to normal storage if GD not available
            return $image->store($path, 'public');
            
        } catch (\Exception $e) {
            // Fallback to normal storage on any error
            \Log::warning('Image optimization failed, using original: ' . $e->getMessage());
            return $image->store($path, 'public');
        }
    }

    // ========== SAVE PRODUCT ==========
    
    public function save()
    {
        $this->validateCurrentStep();

        DB::beginTransaction();
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

            // Create variants
            if ($this->has_variants && count($this->variants) > 0) {
                foreach ($this->variants as $index => $variantData) {
                    $variant = $product->variants()->create([
                        'sku' => $variantData['sku'],
                        'price' => $variantData['price'],
                        'sale_price' => $variantData['sale_price'] ?? null,
                        'stock' => $variantData['stock'],
                        'status' => $variantData['status'] ?? true,
                    ]);

                    // Attach variant attributes
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

                    // Save variant images (optimized)
                    if (isset($variantData['images']) && is_array($variantData['images'])) {
                        foreach ($variantData['images'] as $imgIndex => $image) {
                            if ($image) {
                                $path = $this->optimizeAndSaveImage($image, 'products/variants');
                                $variant->images()->create([
                                    'image_path' => $path,
                                    'is_primary' => $imgIndex === 0,
                                    'sort_order' => $imgIndex,
                                ]);
                            }
                        }
                    }
                }

                // Save product-level images for variant product (optimized)
                if (!empty($this->productImages)) {
                    foreach ($this->productImages as $index => $image) {
                        $path = $this->optimizeAndSaveImage($image, 'products');
                        $product->images()->create([
                            'image_path' => $path,
                            'is_primary' => $index === 0,
                            'sort_order' => $index,
                        ]);
                    }
                }
            } else {
                // Create default variant for simple product
                $variant = $product->variants()->create([
                    'sku' => $this->sku,
                    'price' => $this->price,
                    'sale_price' => $this->sale_price ?? null,
                    'stock' => $this->stock,
                    'status' => true,
                ]);

                // Save product-level images for simple product (optimized)
                if (!empty($this->productImages)) {
                    foreach ($this->productImages as $index => $image) {
                        $path = $this->optimizeAndSaveImage($image, 'products');
                        $product->images()->create([
                            'image_path' => $path,
                            'is_primary' => $index === 0,
                            'sort_order' => $index,
                        ]);
                    }
                }
            }

            DB::commit();
            session()->flash('message', 'Product created successfully!');
            return redirect()->route('admin.products.index');

        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Error creating product: ' . $e->getMessage());
        }
    }

    // ========== HELPERS ==========
    
    public function getColorForVariant($variantIndex)
    {
        if (isset($this->variants[$variantIndex]['variantAttributes'])) {
            // Find Color attribute
            $colorAttribute = $this->productAttributes->firstWhere('name', 'Color');
            if ($colorAttribute && isset($this->variants[$variantIndex]['variantAttributes'][$colorAttribute->id])) {
                $valueId = $this->variants[$variantIndex]['variantAttributes'][$colorAttribute->id];
                $value = $colorAttribute->values->firstWhere('id', $valueId);
                return $value ? $value->value : null;
            }
        }
        return null;
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.product.add-product');
    }
}
