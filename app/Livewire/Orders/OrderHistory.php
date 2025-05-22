<?php

namespace App\Livewire\Orders;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

class OrderHistory extends Component
{
    public User $user ;

    #[Title('Order history')]
    public function render()
    {
        return view('livewire.orders.order-history', [
            'orders' => $this->user->orders,
        ]);
    }

    public function mount(): void
    {
        $this->user = auth()->user();
    }
}
