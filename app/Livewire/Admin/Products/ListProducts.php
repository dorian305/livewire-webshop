<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ListProducts extends Component
{
    public int $perPage = 6;
    public int $increment = 3;
    public ?string $searchTerm = null;

    public function render()
    {
        return view('livewire.admin.products.list-products');
    }

    #[Computed]
    public function products(): LengthAwarePaginator {
        return Product::when($this->searchTerm, function ($query) {
            $searchTermLowerCase = strtolower($this->searchTerm);

            $query->whereLike('title', "%{$searchTermLowerCase}%")
                ->whereLike('description', "%{$searchTermLowerCase}%");
        })->paginate($this->perPage);
    }

    #[On('load-more-products')]
    public function incrementPerPage(): void
    {
        $this->perPage += $this->increment;

        if ($this->perPage >= $this->products->count()) {
            $this->perPage = $this->products->count();
        }
    }

    #[On('productDeleted')]
    public function deleteProduct(int $productId): void
    {
        Product::findOrFail($productId)->delete();
        unset($this->products);
    }
}
