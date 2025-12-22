<div class="page page-center">
    <div class="container container-tight py-4">

        <div class="card" style="max-width: 380px; margin: auto;">
            <div class="card-body">

                <h2 class="h3 text-center mb-4">Login</h2>

                <form wire:submit.prevent="login" autocomplete="off">

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            wire:model.defer="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="you@example.com"
                            autofocus
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            wire:model.defer="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="••••••••"
                        >
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Remember -->
                    <div class="mb-3">
                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="remember">
                            <span class="form-check-label">Remember me</span>
                        </label>
                    </div>

                    <!-- Submit -->
                    <button
                        type="submit"
                        class="btn btn-primary w-100"
                        wire:loading.attr="disabled"
                    >
                        <span wire:loading.remove>Sign in</span>
                        <span wire:loading>
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Signing in...
                        </span>
                    </button>

                </form>

            </div>
        </div>

    </div>
</div>
