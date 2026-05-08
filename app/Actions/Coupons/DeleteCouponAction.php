<?php

namespace App\Actions\Coupons;

use App\Contracts\CouponRepositoryInterface;

class DeleteCouponAction
{
    public function __construct(private CouponRepositoryInterface $repository) {}

    public function execute(int $id): void
    {
        $this->repository->delete($id);
    }
}
