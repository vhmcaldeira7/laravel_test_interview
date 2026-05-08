<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CouponController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('products', ProductController::class);
Route::post('products/{product}/apply-coupon', [ProductController::class, 'applyCoupon'])->name('products.apply-coupon');
Route::delete('products/{product}/remove-coupon', [ProductController::class, 'removeCoupon'])->name('products.remove-coupon');
Route::resource('coupons', CouponController::class);
