@extends('layouts.app')

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

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

        <div class="card">
            <div class="card-header">Coupon List</div>
            <div class="card-body">
                <a href="{{ route('coupons.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Coupon</a>

                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Code</th>
                        <th scope="col">Type</th>
                        <th scope="col">Value</th>
                        <th scope="col">Expires At</th>
                        <th scope="col">Active</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($coupons as $coupon)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->type }}</td>
                            <td>{{ $coupon->value }}</td>
                            <td>{{ $coupon->expires_at?->format('Y-m-d') ?? '—' }}</td>
                            <td>{{ $coupon->active ? 'Yes' : 'No' }}</td>
                            <td>
                                <form action="{{ route('coupons.destroy', $coupon->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('coupons.show', $coupon->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>
                                    <a href="{{ route('coupons.edit', $coupon->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this coupon?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="7">
                                <span class="text-danger">
                                    <strong>No Coupon Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                </table>
                {{ $coupons->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
