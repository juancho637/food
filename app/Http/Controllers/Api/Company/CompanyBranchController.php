<?php

namespace App\Http\Controllers\Api\Company;

use App\Branch;
use App\Company;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

class CompanyBranchController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Company $company
     * @return void
     */
    public function index(Company $company)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Company $company
     * @return void
     */
    public function create(Company $company)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Company $company
     * @return void
     */
    public function store(Request $request, Company $company)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @param  \App\Branch $branch
     * @return void
     */
    public function show(Company $company, Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @param  \App\Branch $branch
     * @return void
     */
    public function edit(Company $company, Branch $branch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Company $company
     * @param  \App\Branch $branch
     * @return void
     */
    public function update(Request $request, Company $company, Branch $branch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @param  \App\Branch $branch
     * @return void
     */
    public function destroy(Company $company, Branch $branch)
    {
        //
    }
}
