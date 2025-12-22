<div>

    <!-- Header -->
    <div class="page-header mb-4">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="page-title">Contact Messages</h2>
                <div class="text-muted">Website inquiries & messages</div>
            </div>
            <div class="col-auto">
                <input
                    type="text"
                    class="form-control"
                    placeholder="Search messages..."
                    wire:model.live.debounce.400ms="search"
                >
            </div>
        </div>
    </div>

    <!-- Table Card -->
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover card-table align-middle">
                <thead class="bg-muted-lt">
                    <tr>
                        <th>#</th>
                        <th>Sender</th>
                        <th>Contact</th>
                        <th>Message</th>
                        <th>Status</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($contacts as $contact)
                        <tr class="{{ !$contact->is_read ? 'fw-semibold' : '' }}">
                            <td class="text-muted">
                                {{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}
                            </td>

                            <td>
                                <div>{{ $contact->name }}</div>
                                <div class="text-muted small">{{ $contact->email ?? '—' }}</div>
                            </td>

                            <td>
                                <span class="text-muted">{{ $contact->phone }}</span>
                            </td>

                            <td class="text-truncate" style="max-width: 280px;">
                                {{ $contact->comment }}
                            </td>

                            <td>
                                @if($contact->is_read)
                                    <span class="badge bg-success-lt">Read</span>
                                @else
                                    <span class="badge bg-warning-lt">Unread</span>
                                @endif
                            </td>

                            <td class="text-end">
                                <div class="btn-list justify-content-end">
                                    @if(!$contact->is_read)
                                        <button
                                            class="btn btn-sm btn-outline-primary"
                                            wire:click="markAsRead({{ $contact->id }})"
                                        >
                                            Mark Read
                                        </button>
                                    @endif

                                    <button
                                        class="btn btn-sm btn-outline-danger"
                                        wire:click="confirmDelete({{ $contact->id }})"
                                    >
                                        Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-5">
                                No messages found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-footer d-flex justify-content-center">
            {{ $contacts->links() }}
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    @if($showDeleteModal)
        <div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,.45);">
            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Delete</h5>
                        <button type="button" class="btn-close" wire:click="closeDeleteModal"></button>
                    </div>

                    <div class="modal-body text-muted">
                        Are you sure you want to delete this message?
                        <br>
                        <small>This action cannot be undone.</small>
                    </div>

                    <div class="modal-footer">
                        <button class="btn" wire:click="closeDeleteModal">
                            Cancel
                        </button>
                        <button class="btn btn-danger" wire:click="deleteContact">
                            Yes, Delete
                        </button>
                    </div>

                </div>
            </div>
        </div>
    @endif

</div>
