<?php

namespace App\Http\Controllers;

use App\DTOs\CouponDTO;
use App\Http\Requests\StoreCouponRequest;
use App\Http\Requests\UpdateCouponRequest;
use App\Models\Coupon;
use App\Services\CouponService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CouponController extends Controller
{
    public function __construct(private CouponService $service) {}

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('coupons.index', [
            'coupons' => $this->service->list(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCouponRequest $request): RedirectResponse
    {
        $this->service->create(CouponDTO::fromRequest($request));

        return redirect()->route('coupons.index')
                ->withSuccess('New coupon is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon): View
    {
        return view('coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon): View
    {
        return view('coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCouponRequest $request, Coupon $coupon): RedirectResponse
    {
        $this->service->update($coupon->getKey(), CouponDTO::fromRequest($request));

        return redirect()->back()
                ->withSuccess('Coupon is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon): RedirectResponse
    {
        $this->service->delete($coupon->getKey());

        return redirect()->route('coupons.index')
                ->withSuccess('Coupon is deleted successfully.');
    }
}
