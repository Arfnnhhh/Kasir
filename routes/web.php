<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['authenticate'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');

    Route::resource('products', ProductController::class);

    Route::middleware(['superadmin'])->group(function () {
        
        Route::resource('user', UserController::class);

        Route::put('/products/{id}/update-stock', [ProductController::class, 'updateStock'])->name('products.updateStock');
    });

});
