<div>
    {{-- MODAL --}}
    <div class="modal fade {{ $show ? 'show d-block' : '' }}"
        tabindex="-1"
        role="dialog"
        aria-hidden="{{ $show ? 'false' : 'true' }}"
        style="{{ $show ? 'background: rgba(0,0,0,.5);' : '' }}">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                {{-- HEADER --}}
                <div class="modal-header align-items-center">
                    <div class="d-flex align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2 text-primary" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M3 7h18" />
                            <rect x="3" y="7" width="18" height="12" rx="2" />
                            <path d="M7 11h10" />
                        </svg>
                        <div>
                            <h5 class="modal-title mb-0">Product Enquiry</h5>
                            @if(!empty($productName))
                            <div class="small">{{ $productName }}</div>
                            @else
                            <div class="text-muted small">Ask a question about this product and we'll reply soon</div>
                            @endif
                        </div>
                    </div>
                    <button type="button" class="btn-close" wire:click="close"></button>
                </div>

                {{-- BODY --}}
                <form wire:submit.prevent="submit">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label required">Name</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                wire:model.defer="name"
                                placeholder="Your full name">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Email</label>
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                wire:model.defer="email"
                                placeholder="you@example.com">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                            <div class="form-hint text-muted small">We will only use this to reply to your enquiry.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                wire:model.defer="phone"
                                placeholder="Optional">
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror"
                                rows="4"
                                wire:model.defer="message"
                                placeholder="Write your question or request here..."></textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                    </div>

                    {{-- FOOTER --}}
                    <div class="modal-footer">
                        <div class="w-100">
                            <div class="row g-2">
                                <div class="col">
                                    <button type="button"
                                        class="btn btn-outline-secondary w-100"
                                        wire:click="close">
                                        Cancel
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="submit"
                                        class="btn btn-primary w-100" style="background-color: black;"
                                        wire:loading.attr="disabled">
                                        <span wire:loading.remove>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-1" width="18" height="18" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path d="M5 12l5 5l10 -10" />
                                            </svg>
                                            Send Enquiry
                                        </span>
                                        <span wire:loading>
                                            <span class="spinner-border spinner-border-sm me-2" role="status"></span>
                                            Sending...
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

{{-- Confirmation Modal --}}
@if($showConfirmation)
    <div class="modal fade show d-block" tabindex="-1" role="dialog" aria-hidden="false" style="background: rgba(0,0,0,.45);">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" style="background-color: #111; color: #fff;">
                <div class="modal-body text-center py-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-success" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M5 12l5 5l10 -10" />
                    </svg>
                    <h5 class="mb-1">Enquiry Sent</h5>
                    <div class="small mb-3 text-muted">Thank you — we'll get back to you soon.</div>
                    <div>
                        <button class="btn btn-sm" style="background:#000;color:#fff;border-color:#000" wire:click="closeConfirmation">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<script>
    // Listen for browser event (also dispatched from Livewire) to help ensure the modal is visible.
    window.addEventListener('show-enquiry-confirmation', function () {
        // No-op: the modal is controlled by Livewire, but this logs for debugging.
        console.debug('show-enquiry-confirmation event received');
    });
</script>