<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Product;
use Illuminate\Http\Request;

class BranchProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param  \App\Branch $branch
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function index(Request $request, Branch $branch)
    {
        $products = $branch->products()->allowed()->pluck('name', 'id');
        $product_id = $request->product_id ?: null;

        return response()->json([
            'view' => view('admin._partials.selectProduct', compact('products', 'product_id'))->render()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
