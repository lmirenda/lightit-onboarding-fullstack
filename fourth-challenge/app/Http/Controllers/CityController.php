<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all()->sortBy('name');

        return view('cities', ['cities' => $cities]);
    }

    public function store(City $city, Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities'
        ]);

        $city->create([
            'name' => $request->input('name')
        ]);

        return back();
    }
}
