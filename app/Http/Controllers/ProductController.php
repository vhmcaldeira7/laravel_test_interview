<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Coupon;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\ApplyCouponRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(4)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request) : RedirectResponse
    {
        Product::create($request->validated());

        return redirect()->route('products.index')
                ->withSuccess('New product is added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) : View
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) : View
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product) : RedirectResponse
    {
        $product->update($request->validated());

        return redirect()->back()
                ->withSuccess('Product is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) : RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')
                ->withSuccess('Product is deleted successfully.');
    }

    /**
     * Apply a coupon to the specified product.
     */
    public function applyCoupon(ApplyCouponRequest $request, Product $product) : RedirectResponse
    {
        if ($product->coupon_id) {
            return redirect()->back()->with('error', 'Product already has a coupon applied.');
        }

        $coupon = Coupon::where('code', $request->validated('coupon_code'))->first();

        if (! $coupon || ! $coupon->isValid()) {
            return redirect()->back()->with('error', 'Cupom inválido');
        }

        $product->update(['coupon_id' => $coupon->id]);
        $coupon->increment('usage_count');

        return redirect()->back()->withSuccess('Coupon applied successfully.');
    }

    /**
     * Remove the applied coupon from the specified product.
     */
    public function removeCoupon(Product $product) : RedirectResponse
    {
        if ($product->coupon) {
            $product->coupon->decrement('usage_count');
        }
        $product->update(['coupon_id' => null]);

        return redirect()->back()->withSuccess('Coupon removed successfully.');
    }
}
