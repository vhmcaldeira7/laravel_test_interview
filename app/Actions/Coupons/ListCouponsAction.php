<?php

namespace App\Actions\Coupons;

use App\Contracts\CouponRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class ListCouponsAction
{
    public function __construct(private CouponRepositoryInterface $repository) {}

    public function execute(int $perPage = 10): LengthAwarePaginator
    {
        return $this->repository->paginate($perPage);
    }
}
