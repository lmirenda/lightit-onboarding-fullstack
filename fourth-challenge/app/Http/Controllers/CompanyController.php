<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $guarded = ['id'];

    public function index()
    {
        $companies = Company::orderByDesc('created_at')->paginate(6);

        return view('companies', ['companies' => $companies]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:companies'
        ]);

        $company = Company::create([
            'name' => $request->input('name')
        ]);

        return $company;
    }
}
