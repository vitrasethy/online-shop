<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    protected $fillable = [
        'product_id', 'quantity', 'user_id',
    ];

    protected $appends = ['total_price'];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    protected function totalPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->quantity * $this->product->price
        );
    }
}
