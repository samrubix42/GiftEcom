<div>
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">Add New Product</h2>
                        <div class="text-muted mt-1">Step {{ $currentStep }} of {{ $totalSteps }}</div>
                    </div>
                    <div class="col-auto ms-auto">
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">
                            Back to Products
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                <!-- Step Progress Indicator -->
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="steps steps-counter steps-{{ $totalSteps }}">

                            {{-- STEP 1 --}}
                            <a href="#"
                                wire:click.prevent="goToStep(1)"
                                class="step-item
               {{ $currentStep == 1 ? 'active' : '' }}
               {{ $currentStep > 1 ? 'completed' : '' }}">
                                <div class="h4 m-0">1</div>
                                <div>Basic Info</div>
                            </a>

                            {{-- STEP 2 --}}
                            <a href="#"
                                wire:click.prevent="goToStep(2)"
                                class="step-item
               {{ $currentStep == 2 ? 'active' : '' }}
               {{ $currentStep > 2 ? 'completed' : '' }}">
                                <div class="h4 m-0">2</div>
                                <div>{{ $has_variants ? 'Variants' : 'Pricing' }}</div>
                            </a>

                            {{-- STEP 3 --}}
                            <a href="#"
                                wire:click.prevent="goToStep(3)"
                                class="step-item
               {{ $currentStep == 3 ? 'active' : '' }}
               {{ $currentStep > 3 ? 'completed' : '' }}">
                                <div class="h4 m-0">3</div>
                                <div>Images</div>
                            </a>

                            {{-- STEP 4 --}}
                            <a href="#"
                                wire:click.prevent="goToStep(4)"
                                class="step-item
               {{ $currentStep == 4 ? 'active' : '' }}">
                                <div class="h4 m-0">4</div>
                                <div>Review</div>
                            </a>

                        </div>
                    </div>
                </div>


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

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <h4 class="alert-title">Please fix the following errors:</h4>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                    @endif

                    <form wire:submit.prevent="save">
                        <div class="row">
                            <!-- Main Content Area -->
                            <div class="col-lg-12" wire:key="step-{{ $currentStep }}">
                                @if($currentStep === 1)
                                @include('livewire.admin.product.steps.step-1-basic-info')
                                @elseif($currentStep === 2)
                                @if($has_variants)
                                @include('livewire.admin.product.steps.step-2-variants')
                                @else
                                @include('livewire.admin.product.steps.step-2-pricing')
                                @endif
                                @elseif($currentStep === 3)
                                @include('livewire.admin.product.steps.step-3-images')
                                @elseif($currentStep === 4)
                                @include('livewire.admin.product.steps.step-4-review')
                                @endif
                            </div>

                            <!-- Navigation Buttons -->
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-footer d-flex justify-content-between">
                                        <div>
                                            @if($currentStep > 1)
                                            <button type="button" wire:click="previousStep" class="btn btn-secondary">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <polyline points="15 6 9 12 15 18" />
                                                </svg>
                                                Previous
                                            </button>
                                            @endif
                                        </div>

                                        <div>
                                            @if($currentStep < $totalSteps)
                                                <button type="button" wire:click="nextStep" class="btn btn-primary">
                                                <span wire:loading.remove wire:target="nextStep">
                                                    Next
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <polyline points="9 6 15 12 9 18" />
                                                    </svg>
                                                </span>
                                                <span wire:loading wire:target="nextStep">
                                                    <span class="spinner-border spinner-border-sm me-2"></span>
                                                    Processing...
                                                </span>
                                                </button>
                                                @else
                                                <button type="submit" class="btn btn-success">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M5 12l5 5l10 -10" />
                                                    </svg>
                                                    Save Product
                                                </button>
                                                @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('scroll-to-top', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
    @endpush
</div>