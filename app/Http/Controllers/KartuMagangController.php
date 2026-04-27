<?php

namespace App\Http\Controllers;

use App\Models\KartuMagang;
use Illuminate\Http\Request;

class KartuMagangController extends Controller
{
    /**
     * Tampilkan halaman cetak kartu magang.
     */
    public function cetak(KartuMagang $kartuMagang)
    {
        // Load relasi yang dibutuhkan
        $kartuMagang->load([
            'mahasiswa.universitas',
            'universitas',
            'kegiatanMagang',
        ]);

        return view('kartu-magang.cetak', [
            'kartu' => $kartuMagang,
        ]);
    }

    /**
     * Halaman verifikasi kartu via QR scan.
     */
    public function verify($id)
    {
        $kartu = KartuMagang::with([
            'mahasiswa',
            'universitas',
            'kegiatanMagang',
        ])->find($id);

        return view('kartu-magang.verify', compact('kartu'));
    }
}
