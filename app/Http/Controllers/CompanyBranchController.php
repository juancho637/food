<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CompanyBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param  \App\Company $company
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function index(Request $request, Company $company)
    {
        $branches = $company->branches()->allowed()->pluck('name', 'id');
        $branch_id = $request->branch_id ?: null;

        return response()->json([
            'view' => view('admin._partials.selectBranch', compact('branches', 'branch_id'))->render()
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
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        //
    }
}
