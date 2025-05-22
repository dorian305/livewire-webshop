<?php

namespace App\Livewire\Products;

use App\Models\Category;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class ListProducts extends Component
{
    public ?Category $category = null;

    // Paginating
    #[Url(history: true, keep: true)]
    public int $perPage = 3;
    public int $increment = 3;

    // Sorting
    #[Url(history: true, keep: true)]
    public string $orderDirection = 'DESC';
    #[Url(history: true, keep: true)]
    public string $orderBy = 'created_at';

    // Filters
    public array $filters = [];

    public function render()
    {
        return view('livewire.products.list-products')
            ->title("{$this->category->name} - {$this->category->description}");
    }

    public function mount(): void
    {
        try {
            $categoryId = request()->get('categoryId');
            $this->category = Category::where('id', '=', $categoryId)->first();
        } catch (ModelNotFoundException $e) {
            logger("Failed to find category with id: {$categoryId}. Someone is possibly messing with the data.");
        }
    }

    #[Computed]
    public function products()
    {
        if (!$this->category) return;

        $productSelectFields = [
            'id',
            'image_url',
            'title',
            'description',
            'unit_price',
            'unit_measure',
            'stock_quantity',
            'created_at',
        ];

        $productsQuery = $this->category
            ->products()
            ->select($productSelectFields)
            ->orderBy($this->orderBy, $this->orderDirection);

        $filteredProductsQuery = $this->applyFilters($productsQuery);

        return $filteredProductsQuery->paginate($this->perPage);
    }

    public function applyFilters(Builder $query): Builder
    {
        foreach ($this->filters as $filterType => $filterValue) {
            if (!$filterValue) continue;
            
            match ($filterType) {
                'min_price' => $query->where('unit_price', '>=', $filterValue),

                'max_price' => $query->where('unit_price', '<=', $filterValue),

                'in_stock' => $filterValue
                    ? $query->where('stock_quantity', '>=', $filterValue)
                    : $query,
            };
        }

        return $query;
    }

    #[On('load-more-products')]
    public function loadMore(): void
    {
        $this->perPage += $this->increment;

        if ($this->perPage >= $this->products->count()) {
            $this->perPage = $this->products->count();
        }
    }

    public function updateOrder(string $filter): void
    {
        match ($filter) {
            'newest' => call_user_func(function () {
                $this->orderBy = 'created_at';
                $this->orderDirection = 'DESC';
            }),

            'lower_price' => call_user_func(function () {
                $this->orderBy = 'unit_price';
                $this->orderDirection = 'ASC';
            }),

            'higher_price' => call_user_func(function () {
                $this->orderBy = 'unit_price';
                $this->orderDirection = 'DESC';
            }),
        };
    }

    #[On('updated-filters')]
    public function updateFilters(array $filters): void
    {
        $this->filters = $filters;
        unset($this->products);
    }
}
