<div>

    <!-- Page Header -->
    <div class="page-header mb-3">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Enquiries</h2>
                <div class="text-muted mt-1">Manage customer enquiries</div>
            </div>

            <div class="col-auto">
                <div class="input-icon">
                    <span class="input-icon-addon">
                        <i class="ti ti-search"></i>
                    </span>
                    <input
                        type="search"
                        wire:model.live="search"
                        class="form-control"
                        placeholder="Search enquiries...">
                </div>
            </div>
        </div>
    </div>

    <!-- Card -->
    <div class="card">
        <div class="table-responsive">
            <table class="table table-vcenter table-hover">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($enquiries as $enquiry)
                    <tr wire:key="enquiry-{{ $enquiry->id }}">
                        <td>{{ $enquiry->id }}</td>

                        <td>
                            <div class="fw-medium">{{ $enquiry->name }}</div>
                            <div class="text-muted small">{{ $enquiry->email }}</div>
                        </td>

                        <td>{{ $enquiry->phone }}</td>

                        <td class="text-muted" style="max-width:280px">
                            {{ Str::limit($enquiry->message, 70) }}
                        </td>

                        <td>
                            <span class="badge
                                @if($enquiry->status === 'pending') bg-yellow-lt
                                @elseif($enquiry->status === 'in_progress') bg-blue-lt
                                @else bg-green-lt @endif">
                                {{ ucfirst(str_replace('_', ' ', $enquiry->status)) }}
                            </span>
                        </td>

                        <td class="text-end">
                            <div x-data="{ open:false }" @click.outside="open=false">
                                <button class="btn btn-sm btn-outline-secondary" @click="open=!open">
                                    Actions
                                </button>

                                <div x-show="open" x-transition class="dropdown-menu dropdown-menu-end show">
                                    <button class="dropdown-item" @click="open=false"
                                        wire:click="updateStatus({{ $enquiry->id }}, 'pending')">
                                        Mark Pending
                                    </button>

                                    <button class="dropdown-item" @click="open=false"
                                        wire:click="updateStatus({{ $enquiry->id }}, 'in_progress')">
                                        Mark In Progress
                                    </button>

                                    <button class="dropdown-item" @click="open=false"
                                        wire:click="updateStatus({{ $enquiry->id }}, 'completed')">
                                        Mark Completed
                                    </button>

                                    <div class="dropdown-divider"></div>

                                    <button class="dropdown-item text-danger"
                                        @click="open=false"
                                        wire:click="confirmDelete({{ $enquiry->id }})">
                                        <i class="ti ti-trash me-1"></i> Delete
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">
                            <div class="empty py-5 text-center">
                                <i class="ti ti-inbox fs-1 text-muted"></i>
                                <p class="mt-2 mb-0">No enquiries found</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="card-footer d-flex align-items-center">
            <p class="m-0 text-muted">
                Showing {{ $enquiries->firstItem() ?? 0 }} to {{ $enquiries->lastItem() ?? 0 }}
                of {{ $enquiries->total() }}
            </p>
            <div class="ms-auto">
                {{ $enquiries->links() }}
            </div>
        </div>
    </div>

    @if($showDeleteModal)
    <div
        class="modal modal-blur fade show"
        tabindex="-1"
        role="dialog"
        aria-modal="true"
        style="display: block;">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title text-danger">
                        Delete Enquiry
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        wire:click="closeDeleteModal">
                    </button>
                </div>

                <!-- Body -->
                <div class="modal-body text-center pt-2">
                    <span class="avatar avatar-xl bg-red-lt mb-3">
                        <i class="ti ti-trash fs-1 text-red"></i>
                    </span>

                    <h4 class="mb-1">Are you sure?</h4>
                    <p class="text-muted mb-0">
                        This enquiry will be permanently removed.
                        <br>
                        <small>This action cannot be undone.</small>
                    </p>
                </div>

                <!-- Footer -->
                <div class="modal-footer border-top-0 pt-4 d-flex gap-2">
                    <button
                        type="button"
                        class="btn btn-outline-secondary flex-fill"
                        wire:click="closeDeleteModal">
                        Cancel
                    </button>

                    <button
                        type="button"
                        class="btn btn-danger flex-fill"
                        wire:click="deleteConfirmed"
                        wire:loading.attr="disabled">

                        <span wire:loading.remove>
                            <i class="ti ti-trash me-1"></i> Delete
                        </span>

                        <span wire:loading>
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Deleting...
                        </span>
                    </button>
                </div>


            </div>
        </div>
    </div>

    <!-- Backdrop -->
    <div class="modal-backdrop fade show"></div>
    @endif


</div>