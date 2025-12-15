<!-- Step 3: Images -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Images</h3>
                <div class="card-subtitle">
                    @if($has_variants)
                        Images will be attached to the entire product
                    @else
                        Upload images for your product
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Upload Images</label>
                    <input type="file" class="form-control @error('productImages.*') is-invalid @enderror" 
                           wire:model="productImages" multiple accept="image/*">
                    <small class="form-hint">
                        <strong>Accepted:</strong> JPG, PNG, WEBP (Max 2MB each) • 
                        <strong>First image</strong> will be set as primary
                    </small>
                    @error('productImages.*') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>

                <!-- Loading Indicator -->
                <div wire:loading wire:target="productImages" class="alert alert-info">
                    <div class="d-flex align-items-center">
                        <div class="spinner-border spinner-border-sm me-2" role="status"></div>
                        <div>Uploading images...</div>
                    </div>
                </div>

                <!-- Image Preview -->
                @if (!empty($productImages))
                    <div class="row g-3 mt-2">
                        @foreach ($productImages as $index => $image)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body p-2">
                                        <div class="position-relative">
                                            <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded" alt="Preview">
                                            <button type="button" 
                                                    class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1" 
                                                    wire:click="removeProductImage({{ $index }})"
                                                    title="Remove image">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                                            </button>
                                        </div>
                                        @if($index === 0)
                                            <span class="badge bg-primary mt-2 w-100">Primary</span>
                                        @else
                                            <span class="badge bg-secondary-lt mt-2 w-100">Image {{ $index + 1 }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty mt-4">
                        <div class="empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="15" y1="8" x2="15.01" y2="8" /><rect x="4" y="4" width="16" height="16" rx="3" /><path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5" /><path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2" /></svg>
                        </div>
                        <p class="empty-title">No images uploaded</p>
                        <p class="empty-subtitle text-muted">
                            Upload product images to help customers see what they're buying
                        </p>
                    </div>
                @endif
            </div>
        </div>

        @if($has_variants && count($variants) > 0)
        <!-- Variant-Specific Images -->
        <div class="card mt-3">
            <div class="card-header">
                <h3 class="card-title">Variant Images (Optional)</h3>
                <div class="card-subtitle">Add specific images for each variant</div>
            </div>
            <div class="card-body">
                <div class="accordion" id="variantImagesAccordion">
                    @foreach($variants as $index => $variant)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed" type="button" 
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}">
                                    Variant #{{ $index + 1 }}
                                    @if($this->getColorForVariant($index))
                                        <span class="badge bg-secondary ms-2">{{ $this->getColorForVariant($index) }}</span>
                                    @endif
                                    @if(isset($variant['images']) && count($variant['images']) > 0)
                                        <span class="badge bg-success ms-2">{{ count($variant['images']) }} images</span>
                                    @endif
                                </button>
                            </h2>
                            <div id="collapse{{ $index }}" class="accordion-collapse collapse" 
                                 data-bs-parent="#variantImagesAccordion">
                                <div class="accordion-body">
                                    <input type="file" class="form-control mb-3" 
                                           wire:model="variants.{{ $index }}.images" 
                                           multiple accept="image/*">
                                    
                                    <div wire:loading wire:target="variants.{{ $index }}.images" 
                                         class="alert alert-info">
                                        <div class="spinner-border spinner-border-sm me-2"></div>
                                        Uploading...
                                    </div>

                                    @if(isset($variant['images']) && is_array($variant['images']) && count($variant['images']) > 0)
                                        <div class="row g-2">
                                            @foreach($variant['images'] as $imgIndex => $img)
                                                @if($img)
                                                <div class="col-4">
                                                    <div class="card">
                                                        <div class="card-body p-2">
                                                            <div class="position-relative">
                                                                <img src="{{ $img->temporaryUrl() }}" 
                                                                     class="img-fluid rounded" alt="Variant Image">
                                                                <button type="button" 
                                                                        class="btn btn-sm btn-danger position-absolute top-0 end-0 m-1" 
                                                                        wire:click="removeVariantImage({{ $index }}, {{ $imgIndex }})"
                                                                        title="Remove image">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                                                                </button>
                                                            </div>
                                                            <span class="badge bg-primary-lt mt-2 w-100">Variant Image {{ $imgIndex + 1 }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>

    <div class="col-lg-4">
        <div class="card bg-info-lt">
            <div class="card-body">
                <h4>📸 Image Guidelines</h4>
                <ul class="mb-0">
                    <li>Use high-quality, clear images</li>
                    <li>Recommended size: 800x800px or larger</li>
                    <li>Square images work best</li>
                    <li>White or transparent background preferred</li>
                    <li>Show product from multiple angles</li>
                    <li><strong>✨ Auto-optimized:</strong> Images resized to 1200px max</li>
                </ul>
            </div>
        </div>

        <div class="card mt-3 bg-success-lt">
            <div class="card-body">
                <h5 class="text-success">✅ Multiple Image Support</h5>
                <p class="mb-2">You can upload multiple images:</p>
                <ul class="mb-0">
                    <li><strong>Product Images:</strong> Shared across all variants</li>
                    @if($has_variants)
                    <li><strong>Variant Images:</strong> Specific to each variant</li>
                    @endif
                    <li>Click × button to remove unwanted images</li>
                </ul>
            </div>
        </div>

        @if(!$has_variants)
        <div class="card mt-3">
            <div class="card-body">
                <h5>Simple Product Images</h5>
                <p class="text-muted mb-0">
                    For simple products, all images are attached at the product level. 
                    You can skip this step and add images later if needed.
                </p>
            </div>
        </div>
        @endif
    </div>
</div>
