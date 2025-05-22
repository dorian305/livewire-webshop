<?php

namespace App\Livewire\Filters;

use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class GeneralFilters extends Component
{
    #[Url(history: true, except: null)]
    public ?float $minPrice = null;

    #[Url(history: true, except: null)]
    public ?float $maxPrice = null;

    #[Url(history: true, except: null)]
    public ?bool $inStock = null;

    public function render()
    {
        return view('livewire.filters.general-filters');
    }

    public function updatedMinPrice(): void
    {
        if (in_array($this->minPrice, ['', 0])) {
            $this->minPrice = null;
        }

        $this->dispatch('updated-filters', $this->getFilters());
    }

    public function updatedMaxPrice(): void
    {
        if (in_array($this->maxPrice, ['', 0])) {
            $this->maxPrice = null;
        }

        $this->dispatch('updated-filters', $this->getFilters());
    }


    public function updatedInStock(): void
    {
        if (!$this->inStock) {
            $this->inStock = null;
        }

        $this->dispatch('updated-filters', $this->getFilters());
    }

    private function getFilters(): array
    {
        $filters = [];

        if (isset($this->minPrice)) {
            $filters['min_price'] = $this->minPrice;
        }
        if (isset($this->maxPrice)) {
            $filters['max_price'] = $this->maxPrice;
        }
        if (isset($this->inStock)) {
            $filters['in_stock'] = $this->inStock;
        }

        return $filters;
    }

    #[On('clear-filters')]
    public function clearFilters(): void
    {
        $this->reset(['minPrice', 'maxPrice', 'inStock']);
        $this->dispatch('updated-filters', $this->getFilters());
    }
}
