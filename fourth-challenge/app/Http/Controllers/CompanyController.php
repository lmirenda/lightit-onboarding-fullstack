<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all()->sortBy('name');

        return view('companies', ['companies' => $companies]);
    }

    public function store(Company $company, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:companies'
        ]);

        $company->create([
            'name' => $request->input('name')
        ]);
        return back();
    }
}
