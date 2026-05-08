<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    public function run(): void
    {
        Coupon::create([
            'code' => 'WELCOME10',
            'type' => 'percentual',
            'value' => 10.00,
            'expires_at' => null,
            'active' => true,
            'usage_limit' => null,
            'usage_count' => 0,
            'validation_url' => 'https://api.example.com/coupons/validate/WELCOME10',
        ]);

        Coupon::create([
            'code' => 'BLACKFRIDAY25',
            'type' => 'percentual',
            'value' => 25.00,
            'expires_at' => now()->addDays(30),
            'active' => true,
            'usage_limit' => 100,
            'usage_count' => 0,
            'validation_url' => 'https://api.example.com/coupons/validate/BLACKFRIDAY25',
        ]);

        Coupon::create([
            'code' => 'FLAT5',
            'type' => 'fixo',
            'value' => 5.00,
            'expires_at' => null,
            'active' => true,
            'usage_limit' => null,
            'usage_count' => 0,
            'validation_url' => 'https://api.example.com/coupons/validate/FLAT5',
        ]);

        Coupon::create([
            'code' => 'SUMMER15',
            'type' => 'fixo',
            'value' => 15.00,
            'expires_at' => now()->addDays(60),
            'active' => true,
            'usage_limit' => null,
            'usage_count' => 0,
            'validation_url' => null,
        ]);

        Coupon::create([
            'code' => 'OLDPROMO',
            'type' => 'percentual',
            'value' => 50.00,
            'expires_at' => null,
            'active' => false,
            'usage_limit' => null,
            'usage_count' => 0,
            'validation_url' => null,
        ]);
    }
}
