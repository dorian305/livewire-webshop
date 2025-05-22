<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateCategory extends Component
{
    #[Validate('required|string|min:3')]
    public string $name;
    #[Validate('required|string|min:3')]
    public string $description;
    #[Validate('required|string|regex:/^[a-zA-Z0-9]+(-[a-zA-Z0-9]+)*$/')]
    public string $slug;

    #[Title('Create new category')]
    public function render()
    {
        return view('livewire.admin.categories.create-category');
    }

    #[On('createCategory')]
    public function createCategory(): void
    {
        $this->validate();

        $category = Category::create([
            'name' => $this->name,
            'description' => $this->description,
            'slug' => $this->slug,
        ]);

        session()->flash('created', 'New category created successfully!');
        redirect(route('admin-dashboard', [
            'tab' => 'categories',
        ]));
    }
}
