<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BottleController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/bottles', [BottleController::class, 'index'])->name('bottle.index');