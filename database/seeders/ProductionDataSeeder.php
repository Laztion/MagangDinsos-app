<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Universitas;
use App\Models\Perusahaan;
use App\Models\Mahasiswa;
use App\Models\PembimbingUniversitas;
use App\Models\PembimbingPerusahaan;
use App\Models\KegiatanMagang;
use App\Models\LaporanKegiatan;
use App\Models\LampiranLaporan;
use App\Models\Penilaian;
use App\Models\KartuMagang;
use App\Models\RiwayatMagang;
use Illuminate\Support\Facades\Hash;

class ProductionDataSeeder extends Seeder
{
    public function run(): void
    {
        $json = file_get_contents(__DIR__ . '/data/production_data.json');
        $data = json_decode($json, true);

        // 1. Universitas
        foreach ($data['universitas'] as $item) {
            Universitas::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 2. Perusahaan
        foreach ($data['perusahaan'] as $item) {
            Perusahaan::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 3. Users
        foreach ($data['users'] as $item) {
            $user = User::updateOrCreate(
                ['email' => $item['email']],
                array_merge(
                    $this->except($item, ['id', 'created_at', 'updated_at', 'role']),
                    ['password' => $item['password'] ?? Hash::make('password')]
                )
            );
            // Re-map IDs if necessary, but here we assume IDs are stable or we use email as key
            $userIdMap[$item['id']] = $user->id;
        }

        // 4. Mahasiswa
        foreach ($data['mahasiswa'] as $item) {
            Mahasiswa::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 5. Pembimbing Universitas
        foreach ($data['pembimbing_universitas'] as $item) {
            PembimbingUniversitas::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 6. Pembimbing Perusahaan
        foreach ($data['pembimbing_perusahaan'] as $item) {
            PembimbingPerusahaan::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 7. Kegiatan Magang
        foreach ($data['kegiatan_magang'] as $item) {
            KegiatanMagang::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 8. Laporan Kegiatan
        foreach ($data['laporan_kegiatan'] as $item) {
            LaporanKegiatan::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 9. Lampiran Laporan
        foreach ($data['lampiran_laporan'] as $item) {
            LampiranLaporan::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 10. Penilaian
        foreach ($data['penilaian'] as $item) {
            Penilaian::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 11. Kartu Magang
        foreach ($data['kartu_magang'] as $item) {
            KartuMagang::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }

        // 12. Riwayat Magang
        foreach ($data['riwayat_magang'] as $item) {
            RiwayatMagang::updateOrCreate(['id' => $item['id']], $this->except($item, ['id', 'created_at', 'updated_at']));
        }
    }

    private function except(array $array, array $keys): array
    {
        return array_diff_key($array, array_flip($keys));
    }
}
