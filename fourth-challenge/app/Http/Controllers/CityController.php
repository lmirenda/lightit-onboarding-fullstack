<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::orderByDesc('created_at')->paginate(6);

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
