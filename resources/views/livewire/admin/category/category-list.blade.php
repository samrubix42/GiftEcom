<div>

    <!-- PAGE HEADER -->
    <div class="page-header d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center gap-3">

        <!-- LEFT SIDE TITLE -->
        <div>
            <h2 class="page-title mb-1">Categories</h2>
            <span class="text-muted small">Manage product categories & subcategories</span>
        </div>

        <!-- RIGHT SIDE ACTIONS -->
        <div class="d-flex flex-wrap gap-2 align-items-center">

            <div class="input-icon">
                <span class="input-icon-addon">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <circle cx="10" cy="10" r="7" />
                        <line x1="21" y1="21" x2="15" y2="15" />
                    </svg>
                </span>
                <input wire:model.debounce.live.400ms="search" type="search" class="form-control" placeholder="Search categories...">
            </div>

            <select wire:model.live="perPage" class="form-select" style="width: 90px;">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="25">25</option>
            </select>

            <button wire:click="openModal" class="btn btn-primary">
                + Add Category
            </button>

        </div>
    </div>


    <!-- Category Table -->
    <div class="card mt-3">
        <div class="table-responsive">
            <table class="table table-vcenter card-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Status</th>
                        <th class="w-1"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categories as $cat)
                    <tr>
                        <td class="fw-semibold">{{ $cat->name }}</td>
                        <td>{{ $cat->parent?->name ?? '—' }}</td>
                        <td>
                            @if($cat->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end d-flex justify-content-end">
                            <button class="btn btn-sm btn-warning me-1" wire:click="edit({{ $cat->id }})">Edit</button>
                            <button class="btn btn-sm btn-danger" wire:click="confirmDeleteModal({{ $cat->id }})">Delete</button>
                        </td>
                    </tr>

                    @foreach($cat->children as $child)
                    <tr class="table-row-muted">
                        <td>↳ {{ $child->name }}</td>
                        <td>{{ $cat->name }}</td>
                        <td>
                            @if($child->is_active)
                            <span class="badge bg-success-lt">Active</span>
                            @else
                            <span class="badge bg-secondary-lt">Inactive</span>
                            @endif
                        </td>
                        <td class="text-end d-flex justify-content-end">
                            <button class="btn btn-sm btn-warning me-1" wire:click="edit({{ $child->id }})">Edit</button>
                            <button class="btn btn-sm btn-danger" wire:click="confirmDeleteModal({{ $child->id }})">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">No categories found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-between align-items-center">
            <div class="small text-muted">Showing {{ $categories->firstItem() ?? 0 }} to {{ $categories->lastItem() ?? 0 }} of {{ $categories->total() }}</div>
            <div>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($modalOpen)
    <div class="modal fade show d-block" style="background: rgba(0,0,0,0.4)">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h3 class="modal-title">
                        {{ $categoryId ? 'Edit Category' : 'Add Category' }}
                    </h3>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>

                <div class="modal-body">

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input wire:model.live="name" type="text" class="form-control">
                        @error('name') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3 form-check">
                        <input wire:model.live="is_subcategory" class="form-check-input" type="checkbox" id="is_subcategory">

                        <label class="form-check-label" for="is_subcategory">Make this a subcategory</label>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Slug</label>
                        <input wire:model.defer="slug" type="text" class="form-control" placeholder="optional - will be generated from name">
                        @error('slug') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    @if($is_subcategory)
                    <div class="mb-3">
                        <label class="form-label">Parent Category</label>
                        <select wire:model="parent_id" class="form-control">
                            <option value="">Select parent</option>
                            @foreach($allCategories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Status</label>
                        <select wire:model="is_active" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Inactive</option>
                        </select>
                        @error('is_active') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary" wire:click="closeModal">Close</button>

                    @if($categoryId)
                    <button class="btn btn-primary" wire:click="update">Update</button>
                    @else
                    <button class="btn btn-primary" wire:click="save">Save</button>
                    @endif
                </div>

            </div>
        </div>
    </div>
    @endif

    {{-- Delete Confirmation Modal (Tabler style) --}}
    @if ($confirmDelete)
    <div class="modal modal-blur fade show" style="display:block;" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">

                <!-- Red status bar -->
                <div class="modal-status bg-danger"></div>

                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-3 text-danger icon-lg" width="48" height="48" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none">
                        <path d="M12 9v2m0 4v.01" />
                        <path d="M5 20h14a2 2 0 0 0 2 -2v-11a2 2 0 0 0 -2 -2h-3l-1 -3h-4l-1 3h-3a2 2 0 0 0 -2 2v11a2 2 0 0 0 2 2" />
                    </svg>

                    <h3 class="modal-title">Are you sure?</h3>
                    <div class="text-muted">
                        You are about to delete <strong>{{ $deleteName }}</strong>.
                        This action cannot be undone.
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="w-100 d-flex justify-content-end gap-2">
                        <button class="btn btn-link link-secondary" wire:click="$set('confirmDelete', false)">
                            Cancel
                        </button>

                        <button class="btn btn-danger" wire:click="deleteCategory">
                            Delete
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Required Tabler Backdrop -->
    <div class="modal-backdrop fade show"></div>
    @endif


</div>