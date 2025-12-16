<div class="page-wrapper">
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">Products</h2>
                    <div class="text-muted mt-1">Manage your product inventory</div>
                </div>
                <div class="col-auto ms-auto">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 5l0 14"></path><path d="M5 12l14 0"></path></svg>
                        Add Product
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

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Product List</h3>
                </div>
                <div class="card-body border-bottom py-3">
                    <div class="row g-2">
                        <div class="col-md-3">
                            <input type="text" class="form-control" wire:model.live.debounce.300ms="search" placeholder="Search products...">
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" wire:model.live="categoryFilter">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" wire:model.live="brandFilter">
                                <option value="">All Brands</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" wire:model.live="statusFilter">
                                <option value="">All Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select class="form-select" wire:model.live="hasVariantsFilter">
                                <option value="">All Types</option>
                                <option value="0">Simple</option>
                                <option value="1">Multi-Variant</option>
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-secondary w-100" wire:click="resetFilters">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path><path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path></svg>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-vcenter card-table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Type</th>
                                <th>Variants</th>
                                <th>Status</th>
                                <th class="w-1">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>
                                        <div class="fw-bold">{{ $product->name }}</div>
                                        <div class="text-muted small">{{ $product->slug }}</div>
                                    </td>
                                    <td>
                                        <span class="badge bg-blue-lt">{{ $product->category->name }}</span>
                                    </td>
                                    <td>
                                        @if($product->brand)
                                            <span class="badge bg-purple-lt">{{ $product->brand->name }}</span>
                                        @else
                                            <span class="text-muted">—</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($product->has_variants)
                                            <span class="badge bg-info-lt">Multi-Variant</span>
                                        @else
                                            <span class="badge bg-secondary-lt">Simple</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="badge bg-cyan-lt">{{ $product->variants->count() }}</span>
                                    </td>
                                    <td>
                                        <label class="form-check form-switch m-0">
                                            <input class="form-check-input" type="checkbox" 
                                                   wire:click="toggleStatus({{ $product->id }})"
                                                   {{ $product->status ? 'checked' : '' }}>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="btn-list flex-nowrap">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" 
                                               class="btn btn-sm btn-primary">
                                                Edit
                                            </a>
                                            <button class="btn btn-sm btn-danger" 
                                                    wire:click="confirmDelete({{ $product->id }})"
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#deleteModal">
                                                Delete
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-lg mb-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path><path d="M9 10l.01 0"></path><path d="M15 10l.01 0"></path><path d="M9.5 15.25a3.5 3.5 0 0 1 5 0"></path></svg>
                                        <div>No products found</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @if($products->hasPages())
                    <div class="card-footer d-flex align-items-center">
                        <p class="m-0 text-muted">
                            Showing {{ $products->firstItem() }} to {{ $products->lastItem() }} of {{ $products->total() }} entries
                        </p>
                        <div class="ms-auto">
                            {{ $products->links() }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" wire:ignore.self>
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><path d="M12 9v4"></path><path d="M10.363 3.591l-8.106 13.534a1.914 1.914 0 0 0 1.636 2.871h16.214a1.914 1.914 0 0 0 1.636 -2.87l-8.106 -13.536a1.914 1.914 0 0 0 -3.274 0z"></path><path d="M12 16h.01"></path></svg>
                    <h3>Delete Product?</h3>
                    <div class="text-muted">Are you sure you want to delete this product? This action cannot be undone.</div>
                </div>
                <div class="modal-footer">
                    <div class="w-100">
                        <div class="row">
                            <div class="col">
                                <button class="btn w-100" data-bs-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col">
                                <button class="btn btn-danger w-100" wire:click="deleteProduct" data-bs-dismiss="modal">
                                    Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
