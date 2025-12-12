<?php

namespace App\Livewire\Admin\Dashboard;

use Livewire\Attributes\Layout;
use Livewire\Component;

class Dashboard extends Component
{
    public function check(){

$this->dispatch('toast', type: 'success', message: 'Please check fields!');
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.dashboard.dashboard');
    }
}
