<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'type',
        'value',
        'expires_at',
        'active',
        'usage_limit',
        'usage_count',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'active' => 'boolean',
        'value' => 'decimal:2',
    ];

    public function applyTo(float $price): float
    {
        return $this->type === 'percentual'
            ? round($price * (1 - $this->value / 100), 2)
            : round(max(0, $price - $this->value), 2);
    }

    public function isValid(): bool
    {
        return $this->active
            && ($this->expires_at === null || $this->expires_at >= now())
            && ($this->usage_limit === null || $this->usage_count < $this->usage_limit);
    }
}
