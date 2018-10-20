<?php

namespace App\Http\Controllers\Api\Branch;

use App\Branch;
use App\Http\Controllers\Api\ApiController;
use App\Product;
use Illuminate\Http\Request;

class BranchProductController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Branch $branch
     * @return void
     */
    public function index(Branch $branch)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Branch $branch
     * @return void
     */
    public function create(Branch $branch)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Branch $branch
     * @param  \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Branch $branch, Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Branch $branch
     * @param  \App\Product $product
     * @return void
     */
    public function show(Branch $branch, Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @param  \App\Product $product
     * @return void
     */
    public function edit(Branch $branch, Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Branch $branch
     * @param  \App\Product $product
     * @return void
     */
    public function update(Request $request, Branch $branch, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @param  \App\Product $product
     * @return void
     */
    public function destroy(Branch $branch, Product $product)
    {
        //
    }
}
