<!-- Step 4: Review & Save -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title text-white">Review Product Information</h3>
                <div class="card-subtitle text-white-50">Review all details before saving</div>
            </div>
            <div class="card-body">
                <!-- Basic Information -->
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-3">Basic Information</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-muted" width="200"><strong>Product Name</strong></td>
                                        <td>{{ $name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong>Slug</strong></td>
                                        <td><code>{{ $slug }}</code></td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong>Description</strong></td>
                                        <td>{{ $description ?: 'No description' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong>Category</strong></td>
                                        <td>
                                            @php
                                                $category = $categories->firstWhere('id', $category_id);
                                            @endphp
                                            <span class="badge bg-blue">{{ $category->name ?? 'N/A' }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong>Brand</strong></td>
                                        <td>
                                            @php
                                                $brand = $brands->firstWhere('id', $brand_id);
                                            @endphp
                                            {{ $brand->name ?? 'No brand' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong>Product Type</strong></td>
                                        <td>
                                            @if($has_variants)
                                                <span class="badge bg-purple">Product with Variants</span>
                                            @else
                                                <span class="badge bg-green">Simple Product</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong>Status</strong></td>
                                        <td>
                                            @if($status)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Simple Product Pricing -->
                @if(!$has_variants)
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-3">Pricing & Inventory</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td class="text-muted" width="200"><strong>SKU</strong></td>
                                        <td><code>{{ $sku }}</code></td>
                                    </tr>
                                    <tr>
                                        <td class="text-muted"><strong>Price</strong></td>
                                        <td>${{ number_format($price, 2) }}</td>
                                    </tr>
                                    @if($sale_price)
                                    <tr>
                                        <td class="text-muted"><strong>Sale Price</strong></td>
                                        <td>
                                            <span class="text-danger"><strong>${{ number_format($sale_price, 2) }}</strong></span>
                                            <span class="badge bg-red ms-2">
                                                {{ number_format((($price - $sale_price) / $price) * 100, 0) }}% OFF
                                            </span>
                                        </td>
                                    </tr>
                                    @endif
                                    <tr>
                                        <td class="text-muted"><strong>Stock</strong></td>
                                        <td>
                                            <span class="badge {{ $stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $stock }} units
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Product Variants -->
                @if($has_variants && count($variants) > 0)
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-3">Product Variants ({{ count($variants) }})</h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>SKU</th>
                                        <th>Attributes</th>
                                        <th>Price</th>
                                        <th>Stock</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($variants as $index => $variant)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td><code>{{ $variant['sku'] }}</code></td>
                                        <td>
                                            @if(isset($variant['variantAttributes']))
                                                @foreach($variant['variantAttributes'] as $attrId => $valueId)
                                                    @if($valueId)
                                                        @php
                                                            $attr = $productAttributes->firstWhere('id', $attrId);
                                                            $value = $attr?->values->firstWhere('id', $valueId);
                                                        @endphp
                                                        @if($attr && $value)
                                                            <span class="badge bg-azure me-1">
                                                                @if(strtolower($attr->name) === 'color')
                                                                    <span class="avatar avatar-xs me-1" 
                                                                          style="background-color: {{ strtolower($value->value) }};"></span>
                                                                @endif
                                                                {{ $attr->name }}: {{ $value->value }}
                                                            </span>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                                <span class="text-muted">No attributes</span>
                                            @endif
                                        </td>
                                        <td>
                                            <strong>${{ number_format($variant['price'], 2) }}</strong>
                                            @if(isset($variant['sale_price']) && $variant['sale_price'])
                                                <br>
                                                <small class="text-danger">Sale: ${{ number_format($variant['sale_price'], 2) }}</small>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="badge {{ $variant['stock'] > 0 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $variant['stock'] }}
                                            </span>
                                        </td>
                                        <td>
                                            @if($variant['status'] ?? true)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Images -->
                @if(!empty($productImages) || ($has_variants && count($variants) > 0))
                <div class="row mb-4">
                    <div class="col-12">
                        <h4 class="mb-3">Images</h4>
                        
                        @if(!empty($productImages))
                            <div class="mb-3">
                                <h5>Product Images ({{ count($productImages) }})</h5>
                                <div class="row g-2">
                                    @foreach($productImages as $index => $image)
                                        <div class="col-md-2">
                                            <div class="card">
                                                <img src="{{ $image->temporaryUrl() }}" class="card-img-top" alt="Image">
                                                @if($index === 0)
                                                    <div class="card-body p-2 text-center">
                                                        <span class="badge bg-primary">Primary</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="alert alert-info">No product images uploaded</div>
                        @endif

                        @if($has_variants)
                            @php
                                $hasVariantImages = false;
                                foreach($variants as $v) {
                                    if(isset($v['images']) && count($v['images']) > 0) {
                                        $hasVariantImages = true;
                                        break;
                                    }
                                }
                            @endphp
                            
                            @if($hasVariantImages)
                                <div class="mt-3">
                                    <h5>Variant-Specific Images</h5>
                                    @foreach($variants as $index => $variant)
                                        @if(isset($variant['images']) && count($variant['images']) > 0)
                                            <div class="mb-3">
                                                <strong>Variant #{{ $index + 1 }}:</strong> {{ count($variant['images']) }} images
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
                @endif

                <!-- Action Buttons -->
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M5 12l5 5l10 -10" /></svg>
                            <h4 class="alert-title">Ready to Save!</h4>
                            <div class="text-muted">
                                Everything looks good. Click "Save Product" below to create this product in your store.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
