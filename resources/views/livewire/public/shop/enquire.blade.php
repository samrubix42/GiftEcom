<div>
    {{-- ENQUIRY MODAL --}}
    <div class="modal fade {{ $show ? 'show d-block' : '' }}"
        tabindex="-1"
        aria-hidden="{{ $show ? 'false' : 'true' }}"
        style="{{ $show ? 'background: rgba(0,0,0,.55);' : '' }}">

        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow-sm">

                {{-- HEADER --}}
                <div class="modal-header bg-white border-bottom">
                    <div class="d-flex align-items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon text-dark" width="22" height="22"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <path d="M3 7h18"/>
                            <rect x="3" y="7" width="18" height="12" rx="2"/>
                            <path d="M7 11h10"/>
                        </svg>
                        <div>
                            <h5 class="modal-title mb-0">Product Enquiry</h5>
                            <div class="text-muted small">
                                {{ $productName ?? 'Ask a question about this product' }}
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn-close" wire:click="close"></button>
                </div>

                {{-- BODY --}}
                <form wire:submit.prevent="submit">
                    <div class="modal-body bg-white p-4">

                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                wire:model.defer="name"
                                placeholder="Your name">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                wire:model.defer="email"
                                placeholder="you@example.com">
                            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                wire:model.defer="phone"
                                placeholder="Optional">
                            @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-0">
                            <label class="form-label">Message</label>
                            <textarea class="form-control @error('message') is-invalid @enderror"
                                rows="4"
                                wire:model.defer="message"
                                placeholder="Write your message..."></textarea>
                            @error('message') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                    </div>

                    {{-- FOOTER --}}
                    <div class="modal-footer bg-white border-top">
                        <button type="button"
                            class="btn btn-outline-secondary"
                            wire:click="close">
                            Cancel
                        </button>

                        <button type="submit"
                            class="btn btn-dark"
                            wire:loading.attr="disabled">
                            <span wire:loading.remove>Send Enquiry</span>
                            <span wire:loading>
                                <span class="spinner-border spinner-border-sm me-2"></span>
                                Sending...
                            </span>
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- CONFIRMATION MODAL --}}
    @if ($showConfirmation)
        <div class="modal fade show d-block"
            tabindex="-1"
            style="background: rgba(0,0,0,.6);">

            <div class="modal-dialog modal-sm modal-dialog-centered">
                <div class="modal-content border-0 shadow-sm">

                    <div class="modal-body text-center py-4 px-3">

                        <svg xmlns="http://www.w3.org/2000/svg"
                            class="icon mb-2 text-success"
                            width="32" height="32"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor" fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z"/>
                            <path d="M5 12l5 5l10 -10"/>
                        </svg>

                        <h5 class="mb-1">Enquiry Sent</h5>
                        <p class="text-muted small mb-3">
                            We’ll contact you shortly.
                        </p>

                        <button class="btn btn-dark btn-sm"
                            wire:click="closeConfirmation">
                            Close
                        </button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show"></div>
    @endif
</div>
