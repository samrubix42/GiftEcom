<?php

namespace App\Livewire\Public\Shop;

use Livewire\Component;
use App\Models\Enquiry;
use App\Models\Product;
use Livewire\Attributes\On;

class Enquire extends Component
{
    
    public $productId;
    public $productName;
    public $name;
    public $email;
    public $phone;
    public $message;
    public $show = false;
    public $showConfirmation = false;


    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:50',
        'message' => 'nullable|string',
    ];

    #[On('openEnquire')]
    public function open($id)
    {        $this->show = true;

        $this->resetValidation();
        $this->resetForm();
        $this->showConfirmation = false;
        $this->productId = $id;
        $this->productName = Product::find($id)?->name ?? null;
    }

    public function resetForm()
    {
        $this->name = null;
        $this->email = null;
        $this->phone = null;
        $this->message = null;
    }

    public function submit()
    {
        $this->validate();

        Enquiry::create([
            'product_id' => $this->productId,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'message' => $this->message,
        ]);

        $this->show = false;
        $this->showConfirmation = true;
    
    }
    
    public function closeConfirmation()
    {
        $this->showConfirmation = false;
    }

    public function close()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.public.shop.enquire');
    }
}
