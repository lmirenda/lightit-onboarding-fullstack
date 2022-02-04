<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\CompanyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/manage/cities', [CityController::class, 'index']);

Route::get('/manage/companies', [CompanyController::class, 'index']);

Route::get('/manage/flights', [FlightController::class, 'index']);

Route::get('/list/flights', [FlightController::class, 'index']);

Route::post('/manage/cities/create', [CityController::class, 'store']);

Route::post('/manage/companies/create', [CompanyController::class, 'store']);

Route::post('/manage/flights/create', [FlightController::class, 'store']);
