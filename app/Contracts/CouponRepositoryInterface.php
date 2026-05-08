<?php

namespace App\Contracts;

use App\DTOs\CouponDTO;
use App\Models\Coupon;
use Illuminate\Pagination\LengthAwarePaginator;

interface CouponRepositoryInterface
{
    public function paginate(int $perPage): LengthAwarePaginator;

    public function find(int $id): Coupon;

    public function create(CouponDTO $dto): Coupon;

    public function update(int $id, CouponDTO $dto): Coupon;

    public function delete(int $id): void;
}
