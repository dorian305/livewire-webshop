<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProduct extends Component
{
    use WithFileUploads;

    public Product $product;

    #[Validate('nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048')]
    public $image;
    #[Validate('required|string|min:3')]
    public string $title;
    #[Validate('required|string|min:5')]
    public string $description;
    #[Validate('required|numeric|min:0')]
    public float $unit_price;
    #[Validate('required|string|min:1')]
    public string $unit_measure;
    #[Validate('required|integer|min:0')]
    public int $stock_quantity;
    #[Validate('required|exists:categories,id')]
    public int $category_id;


    #[Title('Editing product')]
    public function render()
    {
        return view('livewire.admin.products.edit-product');
    }

    public function mount(): void
    {
        $this->title = $this->product->title;
        $this->description = $this->product->description;
        $this->unit_price = $this->product->unit_price;
        $this->unit_measure = $this->product->unit_measure;
        $this->stock_quantity = $this->product->stock_quantity;
        $this->category_id = $this->product->category_id;
    }

    #[Computed]
    public function categories(): Collection
    {
        return Category::all();
    }

    #[On('updateProduct')]
    public function updateProduct(): void
    {
        $this->validate();

        $data = [
            'title'          => $this->title,
            'description'    => $this->description,
            'unit_price'     => $this->unit_price,
            'unit_measure'   => $this->unit_measure,
            'stock_quantity' => $this->stock_quantity,
            'category_id'    => $this->category_id,
        ];

        if ($this->image) {
            $newPath = $this->image->store('product-images', 'public');
            $data['image_url'] = $newPath;

            $this->deleteProductImage();
        }

        try {
            if ($this->product->update($data)) {
                session()->flash('updated', 'Product updated successfully!');
                $this->reset('image');
            } else {
                logger()->info('Update failed for product ID: ' . $this->product->id);
            }
        } catch (Exception $e) {
            logger("Error updating product: {$e}");
        }
    }

    #[On('deleteProduct')]
    public function deleteProduct(): void
    {
        try {
            if (Product::findOrFail($this->product->id)->delete()) {
                $this->redirect(route('admin-dashboard', [
                    'tab' => 'products',
                ]), true);   
            } else {
                logger()->info('Delete failed for product ID: ' . $this->product->id);
            }
        } catch (Exception $e) {
            logger("Error deleting category: {$e}");
        }
    }

    #[On('deleteProductImage')]
    public function deleteProductImage(): void
    {
        $oldImagePath = $this->product->image_url;

        if ($oldImagePath && Storage::exists($oldImagePath)) {
            Storage::delete($oldImagePath);
        }
        
        $this->product->update([
            'image_url' => null,
        ]);
    }

    #[On('cancelEdit')]
    public function cancelEditing(): void
    {
        $this->redirect(route('admin-dashboard', [
            'tab' => 'products',
        ]), true);
    }
}
