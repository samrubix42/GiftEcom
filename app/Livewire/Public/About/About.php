<?php

namespace App\Livewire\Public\About;

use Livewire\Attributes\Title;
use Livewire\Component;

class About extends Component
{
    #[Title('About Us')]
    public function render()
    {
        return view('livewire.public.about.about');
    }
}
