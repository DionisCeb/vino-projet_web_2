<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\CellierController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/bottles', [BouteilleController::class, 'index'])->name('bottle.index');
Route::get('/scrape-bouteilles', [BouteilleController::class, 'scrape']);
Route::get('/cellier/create', [CellierController::class, 'create'])->name('cellier.create');
