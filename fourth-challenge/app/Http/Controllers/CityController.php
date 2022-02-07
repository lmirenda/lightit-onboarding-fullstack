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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cities'
        ]);

        $city = City::create([
            'name' => $request->input('name')
        ]);

        return $city;
    }
}
