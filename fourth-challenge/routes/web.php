<?php

use App\Models\City;
use App\Models\Flight;
use App\Models\Company;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/manage/cities', function(City $cities) {
    return view('cities', [
        'cities' => City::all()
    ]);
});

Route::get('/manage/companies', function(Company $companies) {
    return view('companies', [
        'companies' => Company::all()
    ]);
});

Route::get('/manage/flights', function(Flight $flights) {
    return view('flights', [
        'flights' => Flight::all()
    ]);
});