<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Edit Product</h2>
                    <div class="text-muted mt-1">Update product details and variants</div>
                </div>
                <div class="col-auto ms-auto">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                        Back to Products
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">
        <div class="container-xl">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form wire:submit.prevent="update">
                <div class="row">
                    <!-- Main Product Information -->
                    <div class="col-lg-8">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Product Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Product Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                           wire:model.live="name" placeholder="Enter product name">
                                    @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label required">Slug</label>
                                    <input type="text" class="form-control @error('slug') is-invalid @enderror" 
                                           wire:model="slug" placeholder="product-slug">
                                    @error('slug') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" 
                                              wire:model="description" rows="5" 
                                              placeholder="Enter product description"></textarea>
                                    @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Product Type Info (Read-only) -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Product Type</h3>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-info mb-0">
                                    <strong>Type:</strong> 
                                    @if($has_variants)
                                        Multi-Variant Product
                                    @else
                                        Simple Product (Default Variant)
                                    @endif
                                    <div class="text-muted small mt-1">Product type cannot be changed after creation</div>
                                </div>
                            </div>
                        </div>

                        <!-- Simple Product (Default Variant) -->
                        @if (!$has_variants)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Pricing & Inventory</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">SKU</label>
                                        <input type="text" class="form-control @error('sku') is-invalid @enderror" 
                                               wire:model="sku" placeholder="SKU">
                                        @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Stock</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                                               wire:model="stock" placeholder="0" min="0">
                                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label required">Price</label>
                                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                               wire:model="price" placeholder="0.00" min="0">
                                        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Sale Price</label>
                                        <input type="number" step="0.01" class="form-control @error('sale_price') is-invalid @enderror" 
                                               wire:model="sale_price" placeholder="0.00" min="0">
                                        @error('sale_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif

                        <!-- Product Variants -->
                        @if ($has_variants)
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Product Variants</h3>
                                <div class="card-actions">
                                    <button type="button" class="btn btn-primary btn-sm" wire:click="addVariant">
                                        Add Variant
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($variants) > 0)
                                    @foreach ($variants as $index => $variant)
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h4 class="card-title">
                                                Variant #{{ $index + 1 }}
                                                @if(isset($variant['id']))
                                                    <span class="badge bg-blue-lt ms-2">Existing</span>
                                                @else
                                                    <span class="badge bg-green-lt ms-2">New</span>
                                                @endif
                                            </h4>
                                            <div class="card-actions">
                                                <button type="button" class="btn btn-danger btn-sm" 
                                                        wire:click="removeVariant({{ $index }})">
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">SKU</label>
                                                    <input type="text" class="form-control" 
                                                           wire:model="variants.{{ $index }}.sku">
                                                    @error("variants.$index.sku") 
                                                        <div class="text-danger">{{ $message }}</div> 
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Stock</label>
                                                    <input type="number" class="form-control" 
                                                           wire:model="variants.{{ $index }}.stock" min="0">
                                                    @error("variants.$index.stock") 
                                                        <div class="text-danger">{{ $message }}</div> 
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Price</label>
                                                    <input type="number" step="0.01" class="form-control" 
                                                           wire:model="variants.{{ $index }}.price" min="0">
                                                    @error("variants.$index.price") 
                                                        <div class="text-danger">{{ $message }}</div> 
                                                    @enderror
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">Sale Price</label>
                                                    <input type="number" step="0.01" class="form-control" 
                                                           wire:model="variants.{{ $index }}.sale_price" min="0">
                                                </div>

                                                <!-- Variant Attributes -->
                                                <div class="col-12">
                                                    <h5>Attributes</h5>
                                                    @foreach ($productAttributes as $attribute)
                                                    <div class="mb-3">
                                                        <label class="form-label">{{ $attribute->name }}</label>
                                                        <select class="form-select" 
                                                                wire:model="variants.{{ $index }}.variantAttributes.{{ $attribute->id }}">
                                                            <option value="">Select {{ $attribute->name }}</option>
                                                            @foreach ($attribute->values as $value)
                                                                <option value="{{ $value->id }}">{{ $value->value }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    @endforeach
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" 
                                                               wire:model="variants.{{ $index }}.status" 
                                                               id="variantStatus{{ $index }}">
                                                        <label class="form-check-label" for="variantStatus{{ $index }}">
                                                            Active
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="text-center py-4 text-muted">
                                        <p>No variants available. Click "Add Variant" to create product variants.</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                        @endif

                        <!-- Images -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Product Images</h3>
                            </div>
                            <div class="card-body">
                                <!-- Existing Images -->
                                @if (count($existingImages) > 0)
                                    <div class="mb-3">
                                        <label class="form-label">Current Images</label>
                                        <div class="row g-2">
                                            @foreach ($existingImages as $image)
                                                <div class="col-md-3">
                                                    <div class="position-relative">
                                                        <img src="{{ asset('storage/' . $image['image_path']) }}" class="img-thumbnail" alt="Product">
                                                        <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1" 
                                                                wire:click="deleteImage({{ $image['id'] }})">
                                                            ✕
                                                        </button>
                                                        @if($image['is_primary'])
                                                            <span class="badge bg-primary position-absolute bottom-0 start-0 m-1">Primary</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label class="form-label">Upload New Images</label>
                                    <input type="file" class="form-control @error('images.*') is-invalid @enderror" 
                                           wire:model="images" multiple accept="image/*">
                                    <small class="form-hint">Upload additional images for this product.</small>
                                    @error('images.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                @if ($images)
                                    <div class="row g-2">
                                        @foreach ($images as $image)
                                            <div class="col-md-3">
                                                <img src="{{ $image->temporaryUrl() }}" class="img-thumbnail" alt="Preview">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                        <!-- Category & Brand -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Organization</h3>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label required">Category</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror" 
                                            wire:model="category_id">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Brand</label>
                                    <select class="form-select @error('brand_id') is-invalid @enderror" 
                                            wire:model="brand_id">
                                        <option value="">Select Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3 class="card-title">Status</h3>
                            </div>
                            <div class="card-body">
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" wire:model="status" id="productStatus">
                                    <label class="form-check-label" for="productStatus">
                                        Product is Active
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="card">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary w-100">
                                    <span wire:loading.remove wire:target="update">Update Product</span>
                                    <span wire:loading wire:target="update">
                                        <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                        Updating...
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
