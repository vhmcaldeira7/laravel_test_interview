@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Coupon Information
                </div>
                <div class="float-end">
                    <a href="{{ route('coupons.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                @session('success')
                    <div class="alert alert-success" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                @session('error')
                    <div class="alert alert-danger" role="alert">
                        {{ $value }}
                    </div>
                @endsession

                    <div class="row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start"><strong>Code:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $coupon->code }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="type" class="col-md-4 col-form-label text-md-end text-start"><strong>Type:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $coupon->type }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="value" class="col-md-4 col-form-label text-md-end text-start"><strong>Value:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $coupon->value }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="expires_at" class="col-md-4 col-form-label text-md-end text-start"><strong>Expires At:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $coupon->expires_at?->format('Y-m-d') ?? '—' }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="active" class="col-md-4 col-form-label text-md-end text-start"><strong>Active:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $coupon->active ? 'Yes' : 'No' }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="usage_limit" class="col-md-4 col-form-label text-md-end text-start"><strong>Usage Limit:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $coupon->usage_limit ?? '—' }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="usage_count" class="col-md-4 col-form-label text-md-end text-start"><strong>Usage Count:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $coupon->usage_count }}
                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>

@endsection
