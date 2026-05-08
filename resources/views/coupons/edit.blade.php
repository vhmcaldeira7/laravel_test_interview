@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @session('success')
            <div class="alert alert-success" role="alert">
                {{ $value }}
            </div>
        @endsession

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Coupon
                </div>
                <div class="float-end">
                    <a href="{{ route('coupons.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('coupons.update', $coupon->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">Code</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ $coupon->code }}">
                            @error('code')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="type" class="col-md-4 col-form-label text-md-end text-start">Type</label>
                        <div class="col-md-6">
                          <select class="form-select @error('type') is-invalid @enderror" id="type" name="type">
                            <option value="percentual" {{ $coupon->type === 'percentual' ? 'selected' : '' }}>percentual</option>
                            <option value="fixo" {{ $coupon->type === 'fixo' ? 'selected' : '' }}>fixo</option>
                          </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="value" class="col-md-4 col-form-label text-md-end text-start">Value</label>
                        <div class="col-md-6">
                          <input type="number" step="0.01" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ $coupon->value }}">
                            @error('value')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="expires_at" class="col-md-4 col-form-label text-md-end text-start">Expires At</label>
                        <div class="col-md-6">
                          <input type="date" class="form-control @error('expires_at') is-invalid @enderror" id="expires_at" name="expires_at" value="{{ $coupon->expires_at?->format('Y-m-d') }}">
                            @error('expires_at')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="active" class="col-md-4 col-form-label text-md-end text-start">Active</label>
                        <div class="col-md-6">
                          <select class="form-select @error('active') is-invalid @enderror" id="active" name="active">
                            <option value="1" {{ $coupon->active ? 'selected' : '' }}>Yes</option>
                            <option value="0" {{ ! $coupon->active ? 'selected' : '' }}>No</option>
                          </select>
                            @error('active')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="usage_limit" class="col-md-4 col-form-label text-md-end text-start">Usage Limit</label>
                        <div class="col-md-6">
                          <input type="number" min="1" class="form-control @error('usage_limit') is-invalid @enderror" id="usage_limit" name="usage_limit" value="{{ $coupon->usage_limit }}">
                            @error('usage_limit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

@endsection
