<!-- Step 1: Basic Information -->
<div class="row">
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
                    <small class="form-hint">Auto-generated from product name, can be edited</small>
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

        <!-- Product Type Selection -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Type</h3>
            </div>
            <div class="card-body">
                <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                    <label class="form-selectgroup-item flex-fill">
                        <input type="radio" wire:model.live="has_variants" value="0" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                            <div class="me-3">
                                <span class="form-selectgroup-check"></span>
                            </div>
                            <div>
                                <strong>Simple Product</strong>
                                <div class="text-muted">Product with single price and SKU (e.g., a book)</div>
                            </div>
                        </div>
                    </label>
                    <label class="form-selectgroup-item flex-fill">
                        <input type="radio" wire:model.live="has_variants" value="1" class="form-selectgroup-input">
                        <div class="form-selectgroup-label d-flex align-items-center p-3">
                            <div class="me-3">
                                <span class="form-selectgroup-check"></span>
                            </div>
                            <div>
                                <strong>Product with Variants</strong>
                                <div class="text-muted">Product with multiple options like size, color (e.g., t-shirt)</div>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>
    </div>

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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Status</h3>
            </div>
            <div class="card-body">
                <div class="form-check form-switch mb-3">
                    <input class="form-check-input" type="checkbox" wire:model="status" id="productStatus">
                    <label class="form-check-label" for="productStatus">
                        Product is Active
                    </label>
                </div>
                <small class="form-hint">Inactive products won't be visible to customers</small>
                
                <hr class="my-3">
                
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" wire:model="is_featured" id="productFeatured">
                    <label class="form-check-label" for="productFeatured">
                        Mark as Featured
                    </label>
                </div>
                <small class="form-hint">Featured products appear in special sections</small>
            </div>
        </div>
    </div>
</div>
