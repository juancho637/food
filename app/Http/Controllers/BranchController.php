<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('permission:branches.index')->only('index');
        $this->middleware('permission:branches.create')->only(['create', 'store']);
        $this->middleware('permission:branches.show')->only('show');
        $this->middleware('permission:branches.edit')->only(['edit', 'update']);
        $this->middleware('permission:branches.destroy')->only('destroy');
        $this->middleware('can:update,branch')->only(['edit', 'update']);
        $this->middleware('can:view,branch')->only(['show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::allowed()->paginate();

        return view('admin.branches.index', compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::allowed()->pluck('name', 'id');

        return view('admin.branches.create', compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Auth::user()->isRole('su'))
        {
            $request['company_id'] = Auth::user()->company_id;
        }

        $branch = Branch::create($request->all());

        return redirect()->route('branches.edit', $branch)->with('flash', 'Sucursal creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        return view('admin.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $companies = Company::allowed()->pluck('name', 'id');

        return view('admin.branches.edit', compact('branch', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $branch->update($request->all());

        return redirect()->route('branches.edit', $branch)->with('flash', 'Sucursal actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch $branch
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();

        return back()->with('flash', 'Sucursal eliminada correctamente');
    }
}
