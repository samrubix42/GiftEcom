<div>

    <!-- PAGE HEADER -->
    <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div>
            <h2 class="page-title mb-1">Brands</h2>
            <div class="text-muted">Manage all product brands</div>
        </div>

        <div class="d-flex align-items-center gap-2 mt-3 mt-md-0">

            <div class="input-icon">
                <span class="input-icon-addon">
                    <i class="ti ti-search"></i>
                </span>
                <input wire:model.live="search" type="search" class="form-control" placeholder="Search brands…">
            </div>

            <button wire:click="openModal" class="btn btn-primary">
                <i class="ti ti-plus"></i> Add Brand
            </button>

        </div>
    </div>

    <!-- Brand Table Card -->
    <div class="card mt-4 shadow-sm">
        <div class="table-responsive">
            <table class="table table-vcenter table-hover card-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th class="w-1 text-end">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td class="text-muted fw-semibold">{{ $brand->name }}</td>
                            <td class="text-muted">{{ $brand->slug }}</td>

                            <td>
                                <span class="badge @if($brand->is_active) bg-green-lt @else bg-secondary-lt @endif">
                                    {{ $brand->is_active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>

                            <td class="text-end">
                                <div class="btn-list flex-nowrap">

                                    <button class="btn btn-icon btn-warning btn-sm"
                                        wire:click="edit({{ $brand->id }})" title="Edit">
                                        <i class="ti ti-edit"></i>
                                    </button>

                                    <button class="btn btn-icon btn-danger btn-sm"
                                        wire:click="openDeleteModal({{ $brand->id }})" title="Delete">
                                        <i class="ti ti-trash"></i>
                                    </button>

                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-5">
                                No brands found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-end">
            {{ $brands->links() }}
        </div>
    </div>

    <!-- CREATE / EDIT MODAL -->
    @if($modalOpen)
        <div class="modal fade show d-block" style="background: rgba(0,0,0,.45);" tabindex="-1">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content shadow-lg">

                    <div class="modal-header">
                        <h3 class="modal-title">{{ $brandId ? 'Edit Brand' : 'Add Brand' }}</h3>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>

                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Brand Name</label>
                            <input wire:model.live="name" type="text" class="form-control"
                                placeholder="Enter brand name">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Slug</label>
                            <input wire:model="slug" type="text" class="form-control"
                                placeholder="Auto-created or edit manually">
                            @error('slug') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select wire:model="is_active" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-link" wire:click="closeModal">Cancel</button>

                        @if($brandId)
                            <button class="btn btn-primary" wire:click="update">Update Brand</button>
                        @else
                            <button class="btn btn-primary" wire:click="save">Save Brand</button>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    @endif

    <!-- DELETE CONFIRM MODAL -->
    @if($deleteModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.45)">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-status bg-danger"></div>

                    <div class="modal-body text-center py-4">
                        <i class="ti ti-alert-triangle icon mb-3 text-danger" style="font-size:40px;"></i>
                        <h3>Delete Brand?</h3>
                        <p class="text-muted">
                            Are you sure you want to delete <strong>{{ $deleteName }}</strong> permanently?
                        </p>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button class="btn btn-link" wire:click="$set('deleteModal', false)">Cancel</button>
                        <button class="btn btn-danger" wire:click="deleteBrand">Yes, Delete</button>
                    </div>

                </div>
            </div>
        </div>
    @endif

</div>
