<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['authenticate'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::middleware(['superadmin'])->group(function () {
        // User Route
        Route::resource('user', UserController::class);
    });

});
