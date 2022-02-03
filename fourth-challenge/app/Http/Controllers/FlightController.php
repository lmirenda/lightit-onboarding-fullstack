<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index() 
    {

        return view('flight', 
        [
            'flights' => $Flight::all()->sortBy('departure')
        ]);
    }
}
