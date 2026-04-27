<?php

use App\Http\Controllers\KartuMagangController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Cetak kartu magang — hanya user yang login
Route::middleware(['auth'])->group(function () {
    Route::get('/kartu-magang/{kartuMagang}/cetak', [KartuMagangController::class, 'cetak'])
        ->name('kartu-magang.cetak');
});

// Verifikasi QR code — publik
Route::get('/kartu-magang/{id}/verify', [KartuMagangController::class, 'verify'])
    ->name('kartu-magang.verify');
