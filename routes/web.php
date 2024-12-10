<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BottleController;
use App\Http\Controllers\CellierController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/bottles', [BottleController::class, 'index'])->name('bottle.index');
Route::get('/cellier/create', [CellierController::class, 'create'])->name('cellier.create');