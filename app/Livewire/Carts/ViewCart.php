<?php

namespace App\Livewire\Carts;

use Livewire\Attributes\Title;
use Livewire\Component;

class ViewCart extends Component
{
    protected $listeners = ['cart-updated-event', '$refresh'];
    
    #[Title('Viewing cart')]
    public function render()
    {
        return view('livewire.carts.view-cart', [
            'cart' => auth()->user()?->cart,
        ]);
    }
}