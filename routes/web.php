<?php

use App\Http\Controllers\KartuMagangController;
use App\Models\RiwayatMagang;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $riwayats = RiwayatMagang::with(['mahasiswa', 'kegiatanMagang'])
        ->latest()
        ->take(6)
        ->get();
    return view('welcome', compact('riwayats'));
});

// Cetak kartu magang — hanya user yang login
Route::middleware(['auth'])->group(function () {
    Route::get('/kartu-magang/{kartuMagang}/cetak', [KartuMagangController::class, 'cetak'])
        ->name('kartu-magang.cetak');
});

// Verifikasi QR code — publik
Route::get('/kartu-magang/{id}/verify', [KartuMagangController::class, 'verify'])
    ->name('kartu-magang.verify');
