<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:products.index')->only('index');
        $this->middleware('permission:products.create')->only(['create', 'store']);
        $this->middleware('permission:products.show')->only('show');
        $this->middleware('permission:products.edit')->only(['edit', 'update']);
        $this->middleware('permission:products.destroy')->only('destroy');
        $this->middleware('can:update,product')->only(['edit', 'update']);
        $this->middleware('can:view,product')->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::allowed()->paginate();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*if (Auth::user()->company_id){
        }*/
        $companies = Company::allowed()->pluck('name', 'id');
        $branches = Branch::allowed()->pluck('name', 'id');

        return view('admin.products.create', compact('companies', 'branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create($request->all());

        return redirect()->route('products.edit', $product)->with('flash', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $companies = Company::allowed()->pluck('name', 'id');
        $branches = Branch::allowed()->pluck('name', 'id');

        return view('admin.products.edit', compact('product', 'branches', 'companies'));
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
        $product->update($request->all());

        return redirect()->route('products.edit', $product)->with('flash', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product $product
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return back()->with('flash', 'Producto eliminado correctamente');
    }
}
