<?php

namespace App\Livewire\Public\Contact;

use Livewire\Component;
use App\Models\Contact as ContactModel;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

class Contact extends Component
{
    public $name;
    public $email;
    public $phone;
    public $comment;

    protected $rules = [
        'name'    => 'required|min:3',
        'email'   => 'nullable|email',
        'phone'   => 'required|min:10',
        'comment' => 'nullable|min:5',
    ];

    public function submit()
    {
        ContactModel::create([
            'name'    => $this->name,
            'email'   => $this->email,
            'phone'   => $this->phone,
            'comment' => $this->comment,
        ]);

        session()->flash('success', 'Thank you! Your message has been sent.');

        // Reset form
        $this->reset();
    }

    #[Title('Contact Us')]
    public function render()
    {
        return view('livewire.public.contact.contact');
    }
}
