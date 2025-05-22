<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class ListCategories extends Component
{
    public ?string $searchTerm = null;
    public int $perPage = 6;
    public int $increment = 3;
    
    public function render()
    {
        return view('livewire.admin.categories.list-categories');
    }

    #[Computed]
    public function categories(): LengthAwarePaginator
    {
        return Category::when($this->searchTerm, function ($query) {
            $searchTermLowerCase = strtolower($this->searchTerm);

            $query->whereLike('name', "%{$searchTermLowerCase}%")
                ->whereLike('description', "%{$searchTermLowerCase}%");
        })->paginate($this->perPage);
    }

    #[On('load-more-categories')]
    public function incrementPerPage(): void
    {
        $this->perPage += $this->increment;

        if ($this->perPage >= $this->categories->count()) {
            $this->perPage = $this->categories->count();
        }
    }

    #[On('categoryDeleted')]
    public function deleteCategory(int $categoryId): void
    {
        Category::findOrFail($categoryId)->delete();
        unset($this->categories);
    }
}
