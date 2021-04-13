<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PendapatanBankController;
use App\Http\Controllers\PendapatanTunaiController;
use App\Http\Controllers\PengeluaranBankController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Pendapatan Bank
    Route::get('/pendapatan-bank', [PendapatanBankController::class, 'index'])->name('pendapatan-bank');
    Route::post('save-pendapatan-bank', [PendapatanBankController::class, 'save'])->name('save-pendapatan-bank');
    Route::get('{id}/detail-pendapatan-bank', [PendapatanBankController::class, 'detail'])->name('detail-pendapatan-bank');
    Route::get('pendapatan-bank/filter', [PendapatanBankController::class, 'filter']);

    //Pendapatan Tunai
    Route::get('/pendapatan-tunai', [PendapatanTunaiController::class, 'index'])->name('pendapatan-tunai');
    Route::post('save-pendapatan-tunai', [PendapatanTunaiController::class, 'save'])->name('save-pendapatan-tunai');
    Route::get('{id}/detail-pendapatan-tunai', [PendapatanTunaiController::class, 'detail'])->name('detail-pendapatan-tunai');
    Route::get('pendapatan-tunai/filter', [PendapatanTunaiController::class, 'filter']);

    // Pengeluaran Bank
    Route::get('/pengeluaran-bank', [PengeluaranBankController::class, 'index'])->name('pengeluaran-bank');
    Route::post('save-pengeluaran-bank', [PengeluaranBankController::class, 'save'])->name('save-pengeluaran-bank');
    Route::get('{id}/detail-pengeluaran-bank', [PengeluaranBankController::class, 'detail'])->name('detail-pengeluaran-bank');
    Route::get('pengeluaran-bank/filter', [PengeluaranBankController::class, 'filter']);
});



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});

Route::get('/config-cache', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});
