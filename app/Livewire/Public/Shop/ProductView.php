<?php

namespace App\Livewire\Public\Shop;

use Livewire\Component;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use Illuminate\Support\Str;

class ProductView extends Component
{
    public Product $product;
    public ?ProductVariant $selectedVariant = null;
    public ?string $selectedImage = null;
    public int $quantity = 1;
    public ?int $variant = null;

    public array $variantLabels = [];
    public $relatedProducts = [];



    public function mount($slugOrId = null)
    {
        if (! $slugOrId) {
            $slugOrId = request()->route('slug') ?? request()->route('id') ?? request('slug') ?? request('id') ?? null;
        }

        if (! $slugOrId) {
            throw new \RuntimeException('Product identifier not provided to ProductView Livewire component. Mount with: @livewire("public.shop.product-view", ["slugOrId" => $product->slug])');
        }
        $query = Product::with(['variants.attributes.attribute','variants.attributes.value','variants.images','images','brand','category']);

        $this->product = is_numeric($slugOrId)
            ? $query->where('id', $slugOrId)->firstOrFail()
            : $query->where('slug', $slugOrId)->firstOrFail();

        $this->selectedVariant = $this->product->variants->first() ?? null;

        // If a variant id was provided via query string, try to select it
        if ($this->variant) {
            $this->selectVariant($this->variant);
        }

        $primaryImage = $this->product->images->firstWhere('is_primary', 1) ?? $this->product->images->first();
        $this->selectedImage = $primaryImage->image_path ?? null;

        // Load related products (same category, exclude current product)
        if ($this->product->category_id) {
            $this->relatedProducts = Product::where('category_id', $this->product->category_id)
                ->where('id', '<>', $this->product->id)
                ->with(['defaultVariant', 'images'])
                ->take(8)
                ->get();
        }

        // Build readable labels for each variant (e.g. "Color: Red — Size: M")
        foreach ($this->product->variants as $variant) {
            $parts = [];
            foreach ($variant->attributes as $attr) {
                $attrName = optional($attr->attribute)->name ?? 'Option';
                $attrValue = optional($attr->value)->value ?? null;
                if ($attrValue) {
                    $parts[] = "$attrName: $attrValue";
                }
            }

            $label = $parts ? implode(' — ', $parts) : ($variant->sku ?? 'Variant');
            $this->variantLabels[$variant->id] = $label;
        }
    }

    public function selectVariant($variantId)
    {
        $variant = $this->product->variants->firstWhere('id', $variantId);
        if (! $variant) {
            return;
        }

        $this->selectedVariant = $variant;
        $this->variant = $variant->id;

        $variantImage = $variant->images->first();
        if ($variantImage) {
            $this->selectedImage = $variantImage->image_path;
        }
    }

    public function selectImage($path)
    {
        $this->selectedImage = $path;
    }

    public function imageUrl(?string $path): string
    {
        if (! $path) {
            return 'https://placehold.co/600x765';
        }

        // If already absolute URL or starts with slash, return as-is or with url helper
        if (Str::startsWith($path, ['http://', 'https://'])) {
            return $path;
        }

        if (Str::startsWith($path, ['/'])) {
            return url($path);
        }

        // Ensure path is prefixed with 'storage/' for local storage files
        if (! Str::startsWith($path, ['storage/'])) {
            $path = 'storage/' . ltrim($path, '/');
        }

        return asset($path);
    }

    public function increaseQuantity(): void
    {
        $this->quantity++;
    }

    public function decreaseQuantity(): void
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }

    public function render()
    {
        return view('livewire.public.shop.product-view');
    }
}
