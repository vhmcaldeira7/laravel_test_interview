<?php

namespace App\Actions\Coupons;

use App\Contracts\CouponRepositoryInterface;
use App\Models\Coupon;

class FindCouponAction
{
    public function __construct(private CouponRepositoryInterface $repository) {}

    public function execute(int $id): Coupon
    {
        return $this->repository->find($id);
    }
}
