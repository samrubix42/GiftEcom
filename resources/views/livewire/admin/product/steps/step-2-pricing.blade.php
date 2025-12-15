<!-- Step 2: Pricing (Simple Product) -->
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pricing & Inventory</h3>
                <div class="card-subtitle">Set price and stock for your simple product</div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">SKU</label>
                        <input type="text" class="form-control @error('sku') is-invalid @enderror" 
                               wire:model="sku" placeholder="SKU">
                        <small class="form-hint">Stock Keeping Unit - unique identifier</small>
                        @error('sku') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Stock Quantity</label>
                        <input type="number" class="form-control @error('stock') is-invalid @enderror" 
                               wire:model="stock" placeholder="0" min="0">
                        <small class="form-hint">Available units in inventory</small>
                        @error('stock') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label required">Regular Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" 
                                   wire:model="price" placeholder="0.00" min="0">
                        </div>
                        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Sale Price</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" class="form-control @error('sale_price') is-invalid @enderror" 
                                   wire:model="sale_price" placeholder="0.00" min="0">
                        </div>
                        <small class="form-hint">Optional - leave empty if no sale</small>
                        @error('sale_price') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                @if($sale_price && $price && $sale_price < $price)
                    <div class="alert alert-info">
                        <strong>Discount:</strong> 
                        {{ number_format((($price - $sale_price) / $price) * 100, 0) }}% off
                        (Save ${{ number_format($price - $sale_price, 2) }})
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card bg-blue-lt">
            <div class="card-body">
                <h4>💡 Simple Product</h4>
                <p class="text-muted mb-0">
                    This is a simple product with one price and SKU. Perfect for items that don't have 
                    variations like size or color.
                </p>
            </div>
        </div>
    </div>
</div>
