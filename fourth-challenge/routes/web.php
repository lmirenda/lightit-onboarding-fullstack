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

Route::get('/manage/flights', [FlightController::class, 'create']);

Route::get('/list/flights', [FlightController::class, 'index']);

Route::post('/manage/cities', [CityController::class, 'store']);

Route::post('/manage/companies', [CompanyController::class, 'store']);

Route::post('/manage/flights/create', [FlightController::class, 'store']);

Route::get('/manage/companies/data', [FlightController::class, 'test']);
