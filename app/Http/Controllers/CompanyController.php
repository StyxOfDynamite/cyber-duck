<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\CompanyUpdateRequest;
use App\Http\Requests\CompanyStoreRequest;
use JunaidQadirB\Cray\Traits\RedirectsWithFlash;
use Illuminate\Routing\Controller;

class CompanyController extends Controller
{
    use RedirectsWithFlash;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::paginate(10);
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company = new Company();
        return view('companies.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CompanyStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyStoreRequest $request)
    {
        // Valdiation for request.
        $request->validated();

        $name = $request->input('company_name');  
        $website = $request->input('company_website');
        $email = $request->input('company_email');

        $logo = null;
        if ($request->hasFile('company_logo')) {
            $logo = $request->company_logo->store('images');
        }  

        Company::create(compact('name', 'logo', 'website', 'email'));
        
        return redirect()->route('companies.index', ['companies' => Company::paginate(10)])->with('success', 'Company added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(\App\Company $company)
    {
        $previous = $company->where('id', '<', $company->id)->max('id');
        $next = $company->where('id', '>', $company->id)->min('id');

        return view('companies.show', compact('company'))
            ->with('next', $next)
            ->with('previous', $previous);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompanyUpdateRequest  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyUpdateRequest $request, Company $company)
    {
        // Valdiation for request.
        $request->validated();

        $name = $request->input('company_name');  
        $website = $request->input('company_website');
        $email = $request->input('company_email');

        $logo = null;
        if ($request->hasFile('company_logo')) {
            $logo = $request->company_logo->store('images');
        }  

        $company->update(compact('name', 'website', 'email', 'logo'));

        return redirect()->route('companies.index', ['companies' => Company::paginate(10)])->with('success', 'Company updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        foreach ($company->employees as $employee) {
            $employee->delete();
        }
        
        $company->delete();

        return redirect()->route('companies.index', ['companies' => Company::paginate(10)])->with('success', 'Company and employees deleted');

    }
}
