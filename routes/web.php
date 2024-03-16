<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DBController;
use App\Http\Controllers\ApiController;



Route::get('getData', [DBController::class, 'getData']);
Route::get('getDataApi',[ApiController::class, 'getDataApi']);

Route::get('/', function () {
    return view('welcome');
});

