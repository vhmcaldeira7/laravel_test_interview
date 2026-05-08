<?php

namespace App\Actions\Coupons;

use App\Contracts\CouponRepositoryInterface;
use App\DTOs\CouponDTO;
use App\Models\Coupon;

class UpdateCouponAction
{
    public function __construct(private CouponRepositoryInterface $repository) {}

    public function execute(int $id, CouponDTO $dto): Coupon
    {
        return $this->repository->update($id, $dto);
    }
}
