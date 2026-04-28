<?php

namespace App\Observers;

use App\Models\KegiatanMagang;
use App\Models\LaporanKegiatan;

class KegiatanMagangObserver
{
    /**
     * Handle the KegiatanMagang "updated" event.
     */
    public function updated(KegiatanMagang $kegiatanMagang): void
    {
        // Cek jika status berubah menjadi 'selesai'
        if ($kegiatanMagang->isDirty('statusKegiatan') && $kegiatanMagang->statusKegiatan === 'selesai') {
            
            $mahasiswa = $kegiatanMagang->mahasiswa;
            
            // CEK: Apakah sudah ada laporan untuk kegiatan magang spesifik ini?
            $exists = LaporanKegiatan::where('kegiatan_magang_id', $kegiatanMagang->id)->exists();

            if (!$exists) {
                LaporanKegiatan::create([
                    'kegiatan_magang_id' => $kegiatanMagang->id,
                    'mahasiswa_id' => $mahasiswa->id,
                    'tanggalLaporan' => now(),
                    'aktivitasKegiatan' => $kegiatanMagang->deskripsiTugas, // Mengambil langsung dari tugas kegiatan
                    'hasilPekerjaan' => 'Selesai sesuai dengan deskripsi tugas.',
                    'hambatanDanSolusi' => '-',
                    'jamKerja' => $kegiatanMagang->durasiHari * 8, // Contoh: durasi hari x 8 jam
                    'statusLaporan' => 'draft',
                ]);
            }
        }
    }
}
