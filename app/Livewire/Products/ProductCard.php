<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductCard extends Component
{
    public Product $product;
    protected $listeners = ['cart-updated-event', '$refresh'];
    
    public function render()
    {
        return view('livewire.products.product-card');
    }
}
