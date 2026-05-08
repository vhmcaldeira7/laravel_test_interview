<?php

namespace App\Actions\Coupons;

use App\Contracts\CouponRepositoryInterface;
use App\DTOs\CouponDTO;
use App\Models\Coupon;

class CreateCouponAction
{
    public function __construct(private CouponRepositoryInterface $repository) {}

    public function execute(CouponDTO $dto): Coupon
    {
        return $this->repository->create($dto);
    }
}
