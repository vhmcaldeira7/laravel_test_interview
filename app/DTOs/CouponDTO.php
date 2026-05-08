<?php

namespace App\DTOs;

use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;

final readonly class CouponDTO
{
    public function __construct(
        public string $code,
        public string $type,
        public float $value,
        public ?string $expires_at,
        public bool $active,
        public ?int $usage_limit,
    ) {}

    public static function fromRequest(StoreCouponRequest|UpdateCouponRequest $request): self
    {
        $validated = $request->validated();

        return new self(
            code: $validated['code'],
            type: $validated['type'],
            value: (float) $validated['value'],
            expires_at: $validated['expires_at'] ?? null,
            active: (bool) $validated['active'],
            usage_limit: $validated['usage_limit'] ?? null,
        );
    }
}
