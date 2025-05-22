<?php

namespace App\Livewire\Admin\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateProduct extends Component
{
    use WithFileUploads;
    
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

    #[Title('Create new product')]
    public function render()
    {
        return view('livewire.admin.products.create-product');
    }

    #[Computed]
    public function categories(): Collection
    {
        return Category::all();
    }

    #[On('createProduct')]
    public function createProduct(): void
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
        }

        try {
            $product = Product::create($data);
        } catch (ModelNotFoundException $e) {
            logger("Error creating product: {$e}");
        }

        session()->flash('created', 'New product created successfully!');
        
        redirect(route('admin-dashboard', [
            'tab' => 'products',
        ]));
    }
}
