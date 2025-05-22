<?php

namespace App\Livewire\Carts;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class NavigationCart extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.carts.navigation-cart', [
            'cart' => $this->user->cart,
        ]);
    }

    public function mount(): void
    {
        $this->user = auth()->user();
    }

    #[On(event: 'decrease-quantity-event')]
    public function decreaseQuantity(int $productId): void
    {
        $product = Product::findOrFail($productId);
        $productCartItem = $this->user->cart
            ->products()
            ->where('product_id', '=', $product->id)
            ->first()
            ?->pivot;
        
        $productCartItem->update([
            'quantity' => $productCartItem->quantity - 1,
        ]);
        $product->update([
            'stock_quantity' => $product->stock_quantity + 1,
        ]);
        
        if ($productCartItem->quantity === 0) {
            $this->user->cart->products()->detach($product->id);
        }

        $this->dispatch('cart-updated-event');
    }

    #[On('increase-quantity-event')]
    public function increaseQuantity(int $productId): void
    {
        $product = Product::findOrFail($productId);
        $productCartItem = $this->user->cart
            ->products()
            ->where('product_id', '=', $product->id)
            ->first()
            ?->pivot;

        if (!$this->productIsInStock($product->id)) {
            return;
        }
        
        $productCartItem->update([
            'quantity' => $productCartItem->quantity + 1,
        ]);
        $product->update([
            'stock_quantity' => $product->stock_quantity - 1,
        ]);

        $this->dispatch('cart-updated-event');
    }

    #[On('add-to-cart')]
    public function addToCart(int $productId): void
    {
        if (!$this->user->cart) {
            $this->user->cart = $this->createCart();
        }

        $product = Product::findOrFail($productId);
        if (!$this->productIsInStock($product->id)) {
            return;
        }

        $productCartItem = $this->user->cart
            ->products()
            ->where('product_id', '=', $product->id)
            ->first()
            ?->pivot;
        if ($productCartItem) {
            $productCartItem->update([
                'quantity' => $productCartItem->quantity + 1,
            ]);
        } else {
            $this->user->cart->products()->attach($product->id);
        }

        $product->update([
            'stock_quantity' => $product->stock_quantity - 1,
        ]);

        $this->dispatch('cart-updated-event');
    }

    #[On('remove-from-cart-event')]
    public function removeFromCart(int $productId): void
    {
        $product = Product::findOrFail($productId);
        if (!$this->user->cart || !$product) {
            return;
        }

        $productCartItem = $this->user->cart
            ->products()
            ->where('product_id', '=', $product->id)
            ->first()
            ?->pivot;

        $product->update([
            'stock_quantity' => $product->stock_quantity + $productCartItem->quantity,
        ]);

        $this->user->cart->products()->detach($product->id);
        $this->dispatch('cart-updated-event');
    }

    private function createCart(): Cart
    {
        return Cart::create([
            'user_id' => $this->user->id,
        ]);
    }

    private function productIsInStock(int $productId): bool
    {
        return Product::findOrFail($productId)->stock_quantity > 0;
    }
}
