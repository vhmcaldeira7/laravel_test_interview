<?php

namespace App\Services;

use App\Actions\Coupons\CreateCouponAction;
use App\Actions\Coupons\DeleteCouponAction;
use App\Actions\Coupons\FindCouponAction;
use App\Actions\Coupons\ListCouponsAction;
use App\Actions\Coupons\UpdateCouponAction;
use App\DTOs\CouponDTO;
use App\Models\Coupon;
use Illuminate\Pagination\LengthAwarePaginator;

class CouponService
{
    public function list(int $perPage = 10): LengthAwarePaginator
    {
        return app(ListCouponsAction::class)->execute($perPage);
    }

    public function find(int $id): Coupon
    {
        return app(FindCouponAction::class)->execute($id);
    }

    public function create(CouponDTO $dto): Coupon
    {
        return app(CreateCouponAction::class)->execute($dto);
    }

    public function update(int $id, CouponDTO $dto): Coupon
    {
        return app(UpdateCouponAction::class)->execute($id, $dto);
    }

    public function delete(int $id): void
    {
        app(DeleteCouponAction::class)->execute($id);
    }
}
