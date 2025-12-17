<div>
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
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="form-label required">SKU</label>
                                        <input type="text" class="form-control @error('sku') is-invalid @enderror"
                                            wire:model="sku" placeholder="SKU">
                                        @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Stock</label>
                                        <input type="number" class="form-control @error('stock') is-invalid @enderror"
                                            wire:model="stock" placeholder="0" min="0">
                                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label required">Price</label>
                                        <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror"
                                            wire:model="price" placeholder="0.00" min="0">
                                        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-md-6">
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
                                    <button type="button" class="btn btn-primary" wire:click="addVariant">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg>
                                        Add Variant
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($variants) > 0)
                                @foreach ($variants as $index => $variant)
                                <div class="card shadow-sm mb-3">
                                    <div class="card-header bg-light">
                                        <div class="row align-items-center">
                                            <div class="col">
                                                <h4 class="card-title mb-0">
                                                    Variant #{{ $index + 1 }}
                                                    @if($this->getColorForVariant($index))
                                                    <span class="badge bg-secondary ms-2">
                                                        {{ $this->getColorForVariant($index) }}
                                                    </span>
                                                    @endif
                                                    @if(isset($variant['id']))
                                                    <span class="badge bg-blue-lt ms-2">Existing</span>
                                                    @else
                                                    <span class="badge bg-green-lt ms-2">New</span>
                                                    @endif
                                                </h4>
                                            </div>
                                            <div class="col-auto">
                                                <div class="btn-list">
                                                    <button type="button" class="btn btn-sm btn-ghost-secondary"
                                                        wire:click="duplicateVariant({{ $index }})"
                                                        title="Duplicate this variant">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <rect x="8" y="8" width="12" height="12" rx="2" />
                                                            <path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" />
                                                        </svg>
                                                    </button>
                                                    <button type="button" class="btn btn-sm btn-ghost-danger"
                                                        wire:click="removeVariant({{ $index }})"
                                                        title="Remove this variant">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <line x1="4" y1="7" x2="20" y2="7" />
                                                            <line x1="10" y1="11" x2="10" y2="17" />
                                                            <line x1="14" y1="11" x2="14" y2="17" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <!-- Pricing & Inventory Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <h5>Pricing & Inventory</h5>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">SKU</label>
                                                    <input type="text" class="form-control"
                                                        wire:model="variants.{{ $index }}.sku">
                                                    @error("variants.$index.sku")
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label required">Price</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" step="0.01" class="form-control"
                                                                wire:model="variants.{{ $index }}.price" min="0">
                                                        </div>
                                                        @error("variants.$index.price")
                                                        <div class="text-danger small mt-1">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">Sale Price</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">₹</span>
                                                            <input type="number" step="0.01" class="form-control"
                                                                wire:model="variants.{{ $index }}.sale_price" min="0">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label required">Stock</label>
                                                    <input type="number" class="form-control"
                                                        wire:model="variants.{{ $index }}.stock" min="0">
                                                    @error("variants.$index.stock")
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>

                                            <!-- Attributes Column -->
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <h5>Variant Attributes</h5>
                                                </div>
                                                @foreach ($productAttributes as $attribute)
                                                <div class="mb-3">
                                                    <label class="form-label">{{ $attribute->name }}</label>

                                                    @if(strtolower($attribute->name) === 'color')
                                                    <!-- Color Swatches -->
                                                    <div class="form-selectgroup form-selectgroup-boxes">
                                                        @foreach ($attribute->values as $value)
                                                        <label class="form-selectgroup-item">
                                                            <input type="radio"
                                                                wire:model="variants.{{ $index }}.variantAttributes.{{ $attribute->id }}"
                                                                value="{{ $value->id }}"
                                                                class="form-selectgroup-input">
                                                            <span class="form-selectgroup-label">
                                                                <span class="avatar avatar-xs me-2"
                                                                    style="background-color: {{ strtolower($value->value) }}; 
                                                                                         border: 2px solid #dee2e6;"></span>
                                                                {{ $value->value }}
                                                            </span>
                                                        </label>
                                                        @endforeach
                                                    </div>
                                                    @else
                                                    <!-- Regular Dropdown -->
                                                    <select class="form-select"
                                                        wire:model="variants.{{ $index }}.variantAttributes.{{ $attribute->id }}">
                                                        <option value="">Select {{ $attribute->name }}</option>
                                                        @foreach ($attribute->values as $value)
                                                        <option value="{{ $value->id }}">{{ $value->value }}</option>
                                                        @endforeach
                                                    </select>
                                                    @endif
                                                </div>
                                                @endforeach

                                                <div class="form-check form-switch mt-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        wire:model.boolean="variants.{{ $index }}.status"
                                                        id="variantStatus{{ $index }}"
                                                        @if($variant['status'] ?? true) checked @endif>
                                                    <label class="form-check-label" for="variantStatus{{ $index }}">
                                                        <strong>{{ isset($variant['status']) && $variant['status'] ? 'Active' : 'Inactive' }}</strong>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Variant Images Section -->
                                        @if(isset($variant['id']))
                                        <div class="card-footer bg-light">
                                            <div class="mb-3">
                                                <h5 class="mb-0">Variant Images</h5>
                                                <small class="text-muted">Upload specific images for this variant</small>
                                            </div>

                                            <!-- Existing Variant Images -->
                                            @if(isset($variant['existingImages']) && count($variant['existingImages']) > 0)
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Current Images</label>
                                                <div class="row g-2">
                                                    @foreach($variant['existingImages'] as $image)
                                                    <div class="col-md-3">
                                                        <div class="card">
                                                            <div class="card-body p-2">
                                                                <div class="position-relative">
                                                                    <img src="{{ asset('storage/' . $image['image_path']) }}"
                                                                        class="img-fluid rounded" alt="Variant">
                                                                    <button type="button"
                                                                        class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1"
                                                                        wire:click="confirmDeleteVariantImage({{ $index }}, {{ $image['id'] }})">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                            <line x1="18" y1="6" x2="6" y2="18" />
                                                                            <line x1="6" y1="6" x2="18" y2="18" />
                                                                        </svg>
                                                                    </button>
                                                                </div>
                                                                @if($image['is_primary'])
                                                                <span class="badge bg-primary mt-1 w-100">Primary</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            @endif

                                            <!-- Upload New Variant Images -->
                                            <div class="mb-3">
                                                <label class="form-label fw-bold">Add New Images</label>
                                                <input type="file" class="form-control"
                                                    wire:model="variants.{{ $index }}.newImages"
                                                    multiple accept="image/*">
                                                <small class="form-hint">Choose multiple images to upload</small>
                                            </div>

                                            <!-- Loading Indicator -->
                                            <div wire:loading wire:target="variants.{{ $index }}.newImages"
                                                class="alert alert-info">
                                                <div class="spinner-border spinner-border-sm me-2"></div>
                                                Uploading...
                                            </div>

                                            <!-- New Images Preview -->
                                            @if(isset($variant['newImages']) && is_array($variant['newImages']) && count($variant['newImages']) > 0)
                                            <div class="row g-2">
                                                @foreach($variant['newImages'] as $img)
                                                @if($img)
                                                <div class="col-md-3">
                                                    <div class="card">
                                                        <div class="card-body p-2">
                                                            <img src="{{ $img->temporaryUrl() }}"
                                                                class="img-fluid rounded" alt="Preview">
                                                            <span class="badge bg-success-lt mt-1 w-100">New</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                            @endif
                                        </div>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="empty">
                                    <div class="empty-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <rect x="4" y="4" width="6" height="6" rx="1" />
                                            <rect x="4" y="14" width="6" height="6" rx="1" />
                                            <rect x="14" y="4" width="6" height="6" rx="1" />
                                            <rect x="14" y="14" width="6" height="6" rx="1" />
                                        </svg>
                                    </div>
                                    <p class="empty-title">No variants added yet</p>
                                    <p class="empty-subtitle text-muted">Click "Add Variant" to create different versions of this product</p>
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
                                    <div class="mb-4">
                                        <label class="form-label fw-bold">Current Images</label>
                                        <div class="row g-3">
                                            @foreach ($existingImages as $image)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body p-2">
                                                        <img src="{{ asset('storage/' . $image['image_path']) }}"
                                                            class="img-fluid rounded mb-2" alt="Product">

                                                        <div class="d-flex gap-1">
                                                            @if($image['is_primary'])
                                                            <span class="badge bg-primary w-100">Primary Image</span>
                                                            @else
                                                            <button type="button"
                                                                class="btn btn-sm btn-outline-primary w-100"
                                                                wire:click="setPrimaryImage({{ $image['id'] }})"
                                                                title="Set as primary">
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                                                </svg>
                                                                Set Primary
                                                            </button>
                                                            @endif
                                                        </div>

                                                        <button type="button"
                                                            class="btn btn-sm btn-outline-danger w-100 mt-1"
                                                            wire:click="confirmDeleteImage({{ $image['id'] }})"
                                                            title="Delete image">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                <line x1="4" y1="7" x2="20" y2="7" />
                                                                <line x1="10" y1="11" x2="10" y2="17" />
                                                                <line x1="14" y1="11" x2="14" y2="17" />
                                                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="text-muted small mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-info-circle" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <circle cx="12" cy="12" r="9" />
                                                <line x1="12" y1="8" x2="12.01" y2="8" />
                                                <polyline points="11 12 12 12 12 16 13 16" />
                                            </svg>
                                            Click "Set Primary" to change which image appears first. Click "Delete" to remove an image.
                                        </div>
                                    </div>
                                    @else
                                    <div class="empty mb-3">
                                        <div class="empty-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <line x1="15" y1="8" x2="15.01" y2="8" />
                                                <rect x="4" y="4" width="16" height="16" rx="3" />
                                                <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" />
                                                <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" />
                                            </svg>
                                        </div>
                                        <p class="empty-title">No images yet</p>
                                        <p class="empty-subtitle text-muted">Upload images below to add product photos</p>
                                    </div>
                                    @endif

                                    <div class="mb-3">
                                        <label class="form-label fw-bold">Upload New Images</label>
                                        <input type="file" class="form-control @error('images.*') is-invalid @enderror"
                                            wire:model="images" multiple accept="image/*">
                                        <small class="form-hint">
                                            <strong>Accepted:</strong> JPG, PNG, WEBP (Max 2MB each) •
                                            Upload additional images for this product
                                        </small>
                                        @error('images.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                    </div>

                                    <!-- Loading Indicator -->
                                    <div wire:loading wire:target="images" class="alert alert-info mb-3">
                                        <div class="d-flex align-items-center">
                                            <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                                            <div>Uploading images...</div>
                                        </div>
                                    </div>

                                    <!-- New Images Preview -->
                                    @if ($images)
                                    <div class="mb-3">
                                        <label class="form-label fw-bold text-success">New Images Preview</label>
                                        <div class="row g-2">
                                            @foreach ($images as $index => $image)
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body p-2">
                                                        <img src="{{ $image->temporaryUrl() }}"
                                                            class="img-fluid rounded" alt="Preview">
                                                        <span class="badge bg-success-lt mt-2 w-100">
                                                            New Image {{ $index + 1 }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                    </div>

                    <!-- Sidebar -->
                    <div class="col-lg-4">
                            <!-- Quick Actions -->
                            <div class="card mb-3">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary w-100 mb-2">
                                        <span wire:loading.remove wire:target="update">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                            Update Product
                                        </span>
                                        <span wire:loading wire:target="update">
                                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                            Updating...
                                        </span>
                                    </button>
                                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 11l-4 4l4 4m-4 -4h11a4 4 0 0 0 0 -8h-1" />
                                        </svg>
                                        Cancel
                                    </a>
                                </div>
                            </div>

                            <!-- Category & Brand -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                            <line x1="12" y1="12" x2="20" y2="7.5" />
                                            <line x1="12" y1="12" x2="12" y2="21" />
                                            <line x1="12" y1="12" x2="4" y2="7.5" />
                                        </svg>
                                        Organization
                                    </h3>
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

                                    <div class="mb-0">
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

                            <!-- Status & Visibility -->
                            <div class="card mb-3">
                                <div class="card-header">
                                    <h3 class="card-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="12" r="2" />
                                            <path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" />
                                        </svg>
                                        Visibility
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" wire:model="status" id="productStatus">
                                        <label class="form-check-label" for="productStatus">
                                            <strong>Product is {{ $status ? 'Active' : 'Inactive' }}</strong>
                                            <div class="text-muted small">
                                                {{ $status ? 'Visible to customers' : 'Hidden from customers' }}
                                            </div>
                                        </label>
                                    </div>
                                    
                                    <hr>
                                    
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" wire:model="is_featured" id="productFeatured">
                                        <label class="form-check-label" for="productFeatured">
                                            <strong>Featured Product</strong>
                                            <div class="text-muted small">
                                                {{ $is_featured ? 'Shown in featured sections' : 'Regular product' }}
                                            </div>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Product Info Card -->
                            <div class="card bg-blue-lt">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="12" cy="12" r="9" />
                                            <line x1="12" y1="8" x2="12.01" y2="8" />
                                            <polyline points="11 12 12 12 12 16 13 16" />
                                        </svg>
                                        Update Tips
                                    </h4>
                                    <ul class="mb-0 small">
                                        <li>Product type cannot be changed after creation</li>
                                        @if($has_variants)
                                        <li>Each variant needs unique SKU and pricing</li>
                                        <li>Upload specific images for each variant</li>
                                        @else
                                        <li>All changes apply to the single product</li>
                                        @endif
                                        <li>Changes are saved immediately after clicking Update</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Image Confirmation Modal -->
    @if($showDeleteImageModal)
    <div class="modal fade show" id="deleteImageModal" tabindex="-1" style="display: block;" 
         x-data="{ modalInstance: null }" 
         x-init="
            modalInstance = new bootstrap.Modal($el);
            modalInstance.show();
         "
         @hidden.bs.modal="
            $wire.resetImageDeletion();
            document.querySelectorAll('.modal-backdrop').forEach(backdrop => backdrop.remove());
            document.body.classList.remove('modal-open');
            document.body.style.removeProperty('overflow');
            document.body.style.removeProperty('padding-right');
         ">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 9v4"></path>
                        <path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path>
                        <path d="M12 16h.01"></path>
                    </svg>
                    <h3>Delete Image?</h3>
                    <div class="text-muted">Are you sure you want to delete this image? This will be permanent when you save the product.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <button class="btn w-100" data-bs-dismiss="modal" wire:click="resetImageDeletion">Cancel</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-danger w-100" data-bs-dismiss="modal" wire:click="{{ $deleteImageType === 'variant' ? 'deleteVariantImage' : 'deleteImage' }}">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
</div>