<?php

namespace App\Livewire\Admin\Categories;

use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditCategory extends Component
{
    public Category $category;
    
    #[Validate('required|string|min:3')]
    public string $name;
    #[Validate('required|string|min:3')]
    public string $description;
    #[Validate('required|string|regex:/^[a-zA-Z0-9]+(-[a-zA-Z0-9]+)*$/')]
    public string $slug;

    #[Title('Editing category')]
    public function render()
    {
        return view('livewire.admin.categories.edit-category');
    }

    public function mount(): void
    {
        $this->name = $this->category->name;
        $this->description = $this->category->description;
        $this->slug = $this->category->slug;
    }

    #[On('updateCategory')]
    public function updateCategory(): void
    {
        $this->validate();

        try {
            $this->category->update([
                    'name' => $this->name,
                    'description' => $this->description,
                    'slug' => $this->slug,
                ]);
        } catch (ModelNotFoundException $e) {
            logger("Error updating category: {$e}");
        }

        session()->flash('updated', 'Category updated successfully!');
    }

    #[On('deleteCategory')]
    public function deleteCategory(): void
    {
        try {
            $this->category->delete();

            $this->redirect(route('admin-dashboard', [
                'tab' => 'categories',
            ]), true);
        } catch (ModelNotFoundException $e) {
            logger("Error deleting category: {$e}");
        }
    }

    #[On('cancelEditCategory')]
    public function cancelEditing(): void
    {
        $this->redirect(route('admin-dashboard', [
            'tab' => 'categories',
        ]), true);
    }
}
