<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'quantity',
        'price',
        'description',
        'coupon_id',
    ];

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function getFinalPriceAttribute(): float
    {
        return $this->coupon
            ? $this->coupon->applyTo((float) $this->price)
            : (float) $this->price;
    }
}
