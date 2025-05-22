<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class ProductCategories extends Component
{
    public function render()
    {
        return view('livewire.category.product-categories', [
            'categories' => Category::select([
                'id',
                'name',
                'description',
                'slug',
            ])->get()
        ]);
    }
}
