<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
Route::get('/', [LandingPageController::class, 'index'])->name('landing-page.index');

Route::get('/example', function () {
    return view('example-page');
})->name('example');

