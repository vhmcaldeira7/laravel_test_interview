<?php

namespace App\Repositories;

use App\Contracts\CouponRepositoryInterface;
use App\DTOs\CouponDTO;
use App\Models\Coupon;
use Illuminate\Pagination\LengthAwarePaginator;

class CouponRepository implements CouponRepositoryInterface
{
    public function paginate(int $perPage): LengthAwarePaginator
    {
        return Coupon::latest()->paginate($perPage);
    }

    public function find(int $id): Coupon
    {
        return Coupon::findOrFail($id);
    }

    public function create(CouponDTO $dto): Coupon
    {
        return Coupon::create((array) $dto);
    }

    public function update(int $id, CouponDTO $dto): Coupon
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->update((array) $dto);

        return $coupon;
    }

    public function delete(int $id): void
    {
        Coupon::findOrFail($id)->delete();
    }
}
