<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Title;

class Login extends Component
{
    
    public string $email = '';
    public string $password = '';
    public bool $remember = false;

    public function login()
    {
        $credentials = $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials, $this->remember)) {
            throw ValidationException::withMessages([
                'email' => 'Invalid email or password.',
            ]);
        }

        session()->regenerate();

        return redirect()->intended(route('admin.dashboard'));
    }
    #[Layout('components.layouts.guest')]
    #[Title('Admin Login')]
    public function render()
    {
        return view('livewire.auth.login');
    }
}
