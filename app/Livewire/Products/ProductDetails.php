<?php

namespace App\Livewire\Products;

use App\Models\Product;
use Livewire\Component;

class ProductDetails extends Component
{
    public Product $product;
    protected $listeners = ['cart-updated-event', '$refresh'];


    public function render()
    {
        return view('livewire.products.product-details')
            ->title("{$this->product->title} - {$this->product->description}");
    }
}
