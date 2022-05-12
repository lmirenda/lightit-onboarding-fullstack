<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Flight;
use App\Models\Company;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        return view('flights', [
            'flights' => Flight::all()->sortBy('departure'),
            'companies' => Company::all(),
            'cities' => City::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'origin_city_id' => 'required',
            'destination_city_id' => 'required',
            'company_id' => 'required',
            'departure' => 'required',
            'arrival' => 'required'
        ]);

        $flight = Flight::create([
            'name' =>'test',
            'origin_city_id' => $request->input('origin_city_id'),
            'destination_city_id' => $request->input('destination_city_id'),
            'company_id' => $request->input('company_id'),
            'departure' => $request->input('departure'),
            'arrival' => $request->input('arrival')
        ]);
        $flight->load('company', 'origin', 'destination');

        return $flight;
    }
    
    

    public function show()
    {
        return view('manageFlights', [
            'flights' => Flight::all(),
            'companies' => Company::all(),
            'cities' => City::all()
        ]);
    }

    public function destroy(Flight $flight)
    {
        $flight->delete();

        return response()->json();
    }

    public function update(Flight $flight, Request $request)
    {
        $request->validate([
            'origin_city_id' => 'required',
            'destination_city_id' => 'required',
            'company_id' => 'required',
            'departure' => 'required',
            'arrival' => 'required'
        ]);
        $flight->update($request->all());
        $flight->load('company', 'origin', 'destination');
        return $flight;
    }

    public function flights()
    {   
        $flights = Flight::all();
        $cities = City::all();
        $companies = Company::all();

        $info = array(
            "flights" => $flights,
            "cities" => $cities,
            "companies"=>$companies
          );
      
        return $info;
    }
}
