@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Product Information
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
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
                            {{ $product->code }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="quantity" class="col-md-4 col-form-label text-md-end text-start"><strong>Quantity:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->quantity }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->price }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->description }}
                        </div>
                    </div>

                @if ($product->coupon)
                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Applied Coupon:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->coupon->code }} ({{ $product->coupon->type }} - {{ $product->coupon->value }})
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-md-4 col-form-label text-md-end text-start"><strong>Final Price:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->final_price }}
                        </div>
                    </div>
                    <form action="{{ route('products.remove-coupon', $product->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Remove Coupon</button>
                    </form>
                @else
                    <form action="{{ route('products.apply-coupon', $product->id) }}" method="post">
                        @csrf
                        <div class="mb-3 row">
                            <label for="coupon_code" class="col-md-4 col-form-label text-md-end text-start">Coupon Code</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control @error('coupon_code') is-invalid @enderror" id="coupon_code" name="coupon_code" value="{{ old('coupon_code') }}">
                                @error('coupon_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Apply Coupon</button>
                    </form>
                @endif

            </div>
        </div>
    </div>    
</div>
    
@endsection