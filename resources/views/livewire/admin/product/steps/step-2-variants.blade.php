<!-- Step 2: Variants (Product with Variants) -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Product Variants</h3>
                <div class="card-actions">
                    <button type="button" class="btn btn-ghost-secondary me-2" wire:click="toggleAddAttribute">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="6" rx="1" /><rect x="4" y="14" width="6" height="6" rx="1" /><rect x="14" y="14" width="6" height="6" rx="1" /><line x1="14" y1="7" x2="20" y2="7" /><line x1="17" y1="4" x2="17" y2="10" /></svg>
                        Add Attribute
                    </button>
                    <button type="button" class="btn btn-primary" wire:click="addVariant">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                        Add Variant
                    </button>
                </div>
            </div>
            <div class="card-body">
                <!-- Add New Attribute Form -->
                @if($showAddAttribute)
                <div class="card bg-azure-lt mb-3">
                    <div class="card-header">
                        <h4 class="card-title">Add New Attribute</h4>
                        <button type="button" class="btn-close" wire:click="toggleAddAttribute"></button>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label required">Attribute Name</label>
                            <input type="text" class="form-control" wire:model="newAttributeName" 
                                   placeholder="e.g., Size, Color, Material">
                            @error('newAttributeName') <div class="text-danger small mt-1">{{ $message }}</div> @enderror
                        </div>

                        <label class="form-label required">Attribute Values</label>
                        @foreach($newAttributeValues as $index => $value)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" 
                                   wire:model="newAttributeValues.{{ $index }}" 
                                   placeholder="e.g., Small, Medium, Red">
                            @if(count($newAttributeValues) > 1)
                            <button type="button" class="btn btn-outline-danger" 
                                    wire:click="removeAttributeValue({{ $index }})">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
                            </button>
                            @endif
                        </div>
                        @error("newAttributeValues.{$index}") <div class="text-danger small mb-2">{{ $message }}</div> @enderror
                        @endforeach

                        <button type="button" class="btn btn-sm btn-outline-primary mb-3" 
                                wire:click="addAttributeValue">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                            Add Another Value
                        </button>

                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-primary" wire:click="saveNewAttribute">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                                Save Attribute
                            </button>
                            <button type="button" class="btn btn-secondary" wire:click="toggleAddAttribute">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
                @endif

                @if (count($variants) > 0)
                    <div class="row g-3">
                        @foreach ($variants as $index => $variant)
                        <div class="col-12">
                            <div class="card shadow-sm">
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
                                            </h4>
                                        </div>
                                        <div class="col-auto">
                                            <div class="btn-list">
                                                <button type="button" class="btn btn-sm btn-ghost-secondary" 
                                                        wire:click="duplicateVariant({{ $index }})"
                                                        title="Duplicate this variant">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="8" y="8" width="12" height="12" rx="2" /><path d="M16 8v-2a2 2 0 0 0 -2 -2h-8a2 2 0 0 0 -2 2v8a2 2 0 0 0 2 2h2" /></svg>
                                                </button>
                                                <button type="button" class="btn btn-sm btn-ghost-danger" 
                                                        wire:click="removeVariant({{ $index }})"
                                                        title="Remove this variant">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="4" y1="7" x2="20" y2="7" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <!-- Pricing & Inventory -->
                                        <div class="col-md-6">
                                            <h5 class="mb-3">Pricing & Inventory</h5>
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
                                                               wire:model.live="variants.{{ $index }}.price" min="0">
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
                                                               wire:model.live="variants.{{ $index }}.sale_price" min="0">
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

                                        <!-- Variant Attributes with Color Swatches -->
                                        <div class="col-md-6">
                                            <h5 class="mb-3">Variant Attributes</h5>
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
                                                       wire:model="variants.{{ $index }}.status" 
                                                       id="variantStatus{{ $index }}" checked>
                                                <label class="form-check-label" for="variantStatus{{ $index }}">
                                                    Active
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty">
                        <div class="empty-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><rect x="4" y="4" width="6" height="6" rx="1" /><rect x="4" y="14" width="6" height="6" rx="1" /><rect x="14" y="4" width="6" height="6" rx="1" /><rect x="14" y="14" width="6" height="6" rx="1" /></svg>
                        </div>
                        <p class="empty-title">No variants added yet</p>
                        <p class="empty-subtitle text-muted">
                            Click "Add Variant" to create different versions of this product (e.g., Small/Red, Large/Blue)
                        </p>
                        <div class="empty-action">
                            <button type="button" class="btn btn-primary" wire:click="addVariant">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                                Add Your First Variant
                            </button>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        @if (count($variants) > 0)
        <div class="card mt-3 bg-azure-lt">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <h4>💡 Tip: Product Variants</h4>
                        <p class="text-muted mb-0">
                            Each variant represents a unique combination of attributes (like Size: Large, Color: Red). 
                            Make sure each variant has a unique SKU and appropriate pricing.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
