<?php

use App\Models\Flight;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/manage/cities', [CityController::class, 'index']);

Route::get('/manage/companies', [CompanyController::class, 'index']);

Route::get('/manage/flights', function(Flight $flights) {
    return view('flights', [
        'flights' => Flight::all()
    ]);
});