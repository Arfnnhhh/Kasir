<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SalesExportController;
use App\Http\Controllers\UserExportController;
use App\Http\Controllers\ProductExportController;
use App\Http\Controllers\MemberExportController;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;



Route::get('/', function () {
    return redirect('/login');
});

Auth::routes();

Route::middleware(['authenticate'])->group(function () {
    Route::get('/home', [DashboardController::class, 'index'])->name('home');


    Route::resource('products', ProductController::class)->except(['show']);

    Route::resource('members', MemberController::class)->except(['show']);


    Route::get('/sales/{id}/invoice', [SalesController::class, 'showInvoice'])->name('sales.invoice');
    Route::resource('sales', SalesController::class);

    Route::middleware(['superadmin'])->group(function () {

        Route::resource('user', UserController::class)->except(['show']);

        Route::put('/products/{id}/update-stock', [ProductController::class, 'updateStock'])->name('products.updateStock');

        Route::get('/sales/export', [SalesExportController::class, 'export'])->name('sales.export');
        Route::get('/sales/export/excel', function () {
            return Excel::download(new SalesExport, 'sales.xlsx');
        })->name('sales.export');

        Route::get('/user/export', [UserExportController::class, 'export'])->name('user.export');
        Route::get('/product/export', [ProductExportController::class, 'export'])->name('product.export');
        Route::get('/member/export', [MemberExportController::class, 'export'])->name('member.export');
    });

    Route::middleware(['user'])->group(function () {

        Route::post('/confirm-sale', [SalesController::class, 'confirmationStore'])->name('sales.confirmationStore');
    });
});
