<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::resource('/city', CityController::class)->only('show');


Route::get('import_test', function () {
    \Illuminate\Support\Facades\Artisan::call('data:import');
    dump('data:import');
});
