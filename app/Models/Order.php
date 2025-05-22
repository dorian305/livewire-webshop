<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'cart_id',
        'customer_name',
        'contact_email',
        'contact_phone_number',
        'contact_address',
        'shipping_address',
        'order_status',
        'total_amount',
        'payment_method',
        'created_at',
        'updated_at',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getProducts(): Collection
    {
        return Cart::where('id', '=', $this->cart_id)
            ->where('is_processed', '=', true)
            ->first()
            ->products;
    }

    public function getOrderTotal(): float
    {
        return $this->getProducts()->sum(fn (Product $product) => 
            $product->unit_price * $product->pivot->quantity
        );
    }
}
