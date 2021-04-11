<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): View
    {
        return view('product.index', [
            'products' => Product::availableProducts()->orderByDesc('id')->paginate(12)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create(): View
    {
        return view('product.form', ['statuses' => Product::STATUSES]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $request->except('_token');
        Product::create($request->all());
        return redirect()->route('products.index')->withSuccess('Created product '.$request->name);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Product $product): View
    {
        if($product->status == Product::STATUS_UNAVAILABLE){
            abort(404);
        }
        return view('product.show', [
            'product' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Product $product): View
    {
        if($product->status == Product::STATUS_UNAVAILABLE){
            abort(404);
        }
        return view('product.form', [
            'product' => $product,
            'statuses' => Product::STATUSES
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request->except('_token');
        $product->update($request->all());
        return redirect()->route('products.index')->withSuccess('Updated product '.$product->name);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('products.index')->withDanger('Deleted product ' . $product->name);
    }
}
