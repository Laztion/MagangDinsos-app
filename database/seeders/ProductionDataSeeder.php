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
use Illuminate\Support\Facades\DB;

class ProductionDataSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks for clean seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Clear existing data except roles, permissions and the super admin
        User::where('email', '!=', 'admin@admin.com')->delete();
        Universitas::truncate();
        Perusahaan::truncate();
        Mahasiswa::truncate();
        PembimbingUniversitas::truncate();
        PembimbingPerusahaan::truncate();
        KegiatanMagang::truncate();
        LaporanKegiatan::truncate();
        LampiranLaporan::truncate();
        Penilaian::truncate();
        KartuMagang::truncate();
        RiwayatMagang::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 1. Seed Universitas (10 data)
        $universities = [];
        $univData = [
            ['nama' => 'Universitas Indonesia', 'kota' => 'Depok', 'alamat' => 'Kampus UI Depok, Jawa Barat'],
            ['nama' => 'Universitas Gadjah Mada', 'kota' => 'Sleman', 'alamat' => 'Bulaksumur, Yogyakarta'],
            ['nama' => 'Institut Teknologi Bandung', 'kota' => 'Bandung', 'alamat' => 'Jl. Ganesa No.10, Bandung'],
            ['nama' => 'Universitas Padjadjaran', 'kota' => 'Sumedang', 'alamat' => 'Jl. Raya Bandung Sumedang KM.21'],
            ['nama' => 'Universitas Airlangga', 'kota' => 'Surabaya', 'alamat' => 'Kampus C Mulyorejo, Surabaya'],
            ['nama' => 'Universitas Diponegoro', 'kota' => 'Semarang', 'alamat' => 'Jl. Prof. Sudarto No.13, Tembalang'],
            ['nama' => 'Universitas Brawijaya', 'kota' => 'Malang', 'alamat' => 'Jl. Veteran, Ketawanggede, Malang'],
            ['nama' => 'Universitas Hasanuddin', 'kota' => 'Makassar', 'alamat' => 'Jl. Perintis Kemerdekaan KM.10'],
            ['nama' => 'Universitas Sebelas Maret', 'kota' => 'Surakarta', 'alamat' => 'Jl. Ir. Sutami No.36, Kentingan'],
            ['nama' => 'Universitas Pendidikan Indonesia', 'kota' => 'Bandung', 'alamat' => 'Jl. Dr. Setiabudhi No.229']
        ];

        foreach ($univData as $data) {
            $universities[] = Universitas::create([
                'namaUniversitas' => $data['nama'],
                'alamat' => $data['alamat'],
                'kota' => $data['kota'],
                'website' => "https://" . strtolower(str_replace(' ', '', $data['nama'])) . ".ac.id",
                'email' => "info@" . strtolower(str_replace(' ', '', $data['nama'])) . ".ac.id",
                'noTelepon' => '(021) ' . rand(7000000, 7999999),
            ]);
        }

        // 2. Seed Perusahaan (10 data)
        $companies = [];
        $compData = [
            ['nama' => 'Dinas Sosial Provinsi DKI Jakarta', 'sektor' => 'Pemerintahan', 'kota' => 'Jakarta Pusat'],
            ['nama' => 'PT Gojek Indonesia', 'sektor' => 'Teknologi', 'kota' => 'Jakarta Selatan'],
            ['nama' => 'PT Telkom Indonesia', 'sektor' => 'Telekomunikasi', 'kota' => 'Bandung'],
            ['nama' => 'Bank Central Asia (BCA)', 'sektor' => 'Perbankan', 'kota' => 'Jakarta Pusat'],
            ['nama' => 'PT Pertamina', 'sektor' => 'Energi', 'kota' => 'Jakarta Pusat'],
            ['nama' => 'PT Unilever Indonesia', 'sektor' => 'Consumer Goods', 'kota' => 'Tangerang'],
            ['nama' => 'PT Tokopedia', 'sektor' => 'E-commerce', 'kota' => 'Jakarta Barat'],
            ['nama' => 'PT Traveloka Indonesia', 'sektor' => 'Travel', 'kota' => 'Jakarta Selatan'],
            ['nama' => 'Bukalapak', 'sektor' => 'E-commerce', 'kota' => 'Jakarta Selatan'],
            ['nama' => 'PT Astra International', 'sektor' => 'Otomotif', 'kota' => 'Jakarta Utara']
        ];

        foreach ($compData as $i => $data) {
            $companies[] = Perusahaan::create([
                'namaPerusahaan' => $data['nama'],
                'alamat' => "Jl. " . $data['nama'] . " Hub No. " . ($i + 1),
                'kota' => $data['kota'],
                'provinsi' => $data['kota'] == 'Bandung' ? 'Jawa Barat' : ($data['kota'] == 'Tangerang' ? 'Banten' : 'DKI Jakarta'),
                'sektorIndustri' => $data['sektor'],
                'namaPIC' => "Bpk/Ibu PIC " . ($i + 1),
                'kontakPIC' => "0812" . rand(10000000, 99999999),
            ]);
        }

        // 3. Seed Mahasiswa (20 data)
        $mahasiswas = [];
        $mhsNames = [
            'Aditya Wijaya', 'Bambang Kusuma', 'Catur Handoko', 'Dian Saputra', 'Eko Prasetyo',
            'Fajar Ramadhan', 'Guntur Wibowo', 'Hendra Kurniawan', 'Indra Lesmana', 'Joko Susilo',
            'Kusuma Wardani', 'Larasati Putri', 'Maya Indah', 'Nanda Pratama', 'Oka Mahendra',
            'Putri Lestari', 'Qori Amanda', 'Rizky Fauzi', 'Shinta Bella', 'Taufik Hidayat'
        ];

        foreach ($mhsNames as $index => $name) {
            $emailPrefix = strtolower(str_replace(' ', '.', $name));
            $mahasiswas[] = $this->createMahasiswa(
                $name,
                "$emailPrefix@test.com",
                "1234567" . str_pad($index + 1, 2, '0', STR_PAD_LEFT),
                $universities[array_rand($universities)]->id,
                'Fakultas Teknik',
                'Teknik Informatika',
                $index < 10 ? 'Laki-laki' : 'Perempuan'
            );
        }

        // 4. Seed Pembimbing Universitas (10 data)
        $pUnis = [];
        $dosenNames = [
            'Prof. Dr. Ahmad Fauzi, M.T.', 'Dr. Siti Aminah, M.Cs.', 'Ir. Bambang Heru, M.Kom.',
            'Dr. Eng. Listiani Santoso', 'H. Muhammad Yusuf, Ph.D.', 'Rina Wijaya, S.T., M.Sc.',
            'Agus Setiawan, M.Kom.', 'Sri Wahyuni, M.Hum.', 'Budi Raharjo, Ph.D.', 'Anita Sari, M.T.'
        ];

        foreach ($dosenNames as $index => $name) {
            $emailPrefix = strtolower(preg_replace('/[^a-z]/', '', explode(' ', $name)[2] ?? 'dosen'));
            $pUnis[] = $this->createPembimbingUniversitas(
                $name,
                "$emailPrefix$index@univ.com",
                "198001012010011" . str_pad($index + 1, 3, '0', STR_PAD_LEFT),
                $universities[array_rand($universities)]->id,
                'Departemen Teknologi Informasi'
            );
        }

        // 5. Seed Pembimbing Perusahaan (10 data)
        $pPers = [];
        $mentorNames = [
            'Hendra Setiawan', 'Budi Gunawan', 'Ani Maryani', 'Dedi Suryadi', 'Enny Rahmawati',
            'Fadel Muhammad', 'Gani Surya', 'Herman Yohanes', 'Iwan Fals', 'Jaka Tarub'
        ];

        foreach ($mentorNames as $index => $name) {
            $emailPrefix = strtolower(str_replace(' ', '.', $name));
            $pPers[] = $this->createPembimbingPerusahaan(
                $name,
                "$emailPrefix@comp.com",
                $companies[array_rand($companies)]->id,
                'Project Manager'
            );
        }

        // 6. Seed Kegiatan Magang + Reports + Assessments + Cards + History
        foreach ($mahasiswas as $index => $mhs) {
            $perusahaan = $companies[array_rand($companies)];
            $pUni = $pUnis[array_rand($pUnis)];
            $pPer = $pPers[array_rand($pPers)];
            
            $statusKegiatan = $index < 15 ? 'aktif' : 'selesai';

            $kegiatan = $this->createKegiatanMagang(
                $mhs->id,
                $perusahaan->id,
                $pUni->id,
                $pPer->id,
                "Implementasi Sistem Tahap " . ($index + 1),
                $statusKegiatan
            );

            // Create Laporan Kegiatan (5 reports per student)
            for ($j = 1; $j <= 5; $j++) {
                $laporan = LaporanKegiatan::create([
                    'kegiatan_magang_id' => $kegiatan->id,
                    'mahasiswa_id' => $mhs->id,
                    'tanggalLaporan' => now()->subDays(rand(1, 30)),
                    'aktivitasKegiatan' => "Mengerjakan modul ke-$j untuk proyek $kegiatan->judulKegiatan.",
                    'hasilPekerjaan' => "Modul $j berhasil diselesaikan dan diuji.",
                    'hambatanDanSolusi' => "Beberapa bug pada integrasi, diperbaiki dengan refactoring.",
                    'jamKerja' => 8.00,
                    'statusLaporan' => 'approved',
                ]);

                // Create Lampiran for the first report
                if ($j == 1) {
                    LampiranLaporan::create([
                        'laporan_kegiatan_id' => $laporan->id,
                        'namaFile' => "dokumentasi_kegiatan_$j.pdf",
                        'tipeFile' => 'application/pdf',
                        'urlFile' => "uploads/reports/doc_$j.pdf",
                    ]);
                }
            }

            // Create Penilaian if finished
            if ($statusKegiatan == 'selesai') {
                Penilaian::create([
                    'kegiatan_magang_id' => $kegiatan->id,
                    'pembimbing_perusahaan_id' => $pPer->id,
                    'pembimbing_universitas_id' => $pUni->id,
                    'nilaiKehadiran' => rand(85, 100),
                    'nilaiSikap' => rand(80, 100),
                    'nilaiKomunikasi' => rand(75, 100),
                    'nilaiProaktif' => rand(80, 100),
                    'nilaiAkhir' => rand(80, 95),
                    'komentar' => "Mahasiswa sangat berdedikasi dan memiliki kemampuan teknis yang baik.",
                ]);
            }

            // Create Kartu Magang
            KartuMagang::create([
                'mahasiswa_id' => $mhs->id,
                'kegiatan_magang_id' => $kegiatan->id,
                'universitas_id' => $mhs->universitas_id,
                'tanggalMulai' => $kegiatan->tanggalMulai,
                'tanggalSelesai' => $kegiatan->tanggalSelesai,
                'statusKartu' => 'aktif',
            ]);

            // Create Riwayat Magang
            RiwayatMagang::create([
                'mahasiswa_id' => $mhs->id,
                'kegiatan_magang_id' => $kegiatan->id,
                'tanggalMulai' => $kegiatan->tanggalMulai,
                'tanggalSelesai' => $kegiatan->tanggalSelesai,
                'divisiTempat' => $kegiatan->divisiTempat,
                'namaPerusahaan' => $perusahaan->namaPerusahaan,
                'namaPembimbingPerusahaan' => $pPer->nama,
                'statusKompetensi' => 'Kompeten',
                'nilaiAkhir' => rand(80, 95),
            ]);
        }

        $this->command->info('Full System Data Seeded successfully with all relations.');
    }

    private function createMahasiswa($name, $email, $nim, $univId, $fakultas, $prodi, $gender)
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'is_active' => true,
        ]);
        $user->assignRole('mahasiswa');

        return Mahasiswa::create([
            'user_id' => $user->id,
            'nama' => $name,
            'nim' => $nim,
            'jenisKelamin' => $gender,
            'tanggalLahir' => '2003-05-15',
            'tempatLahir' => 'Jakarta',
            'email' => $email,
            'universitas_id' => $univId,
            'fakultas' => $fakultas,
            'programStudi' => $prodi,
            'kelas' => 'IF-0' . rand(1, 4),
            'semester' => rand(5, 7),
            'statusKeaktifan' => true,
        ]);
    }

    private function createPembimbingUniversitas($name, $email, $nip, $univId, $dept)
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'is_active' => true,
        ]);
        $user->assignRole('pembimbing_universitas');

        return PembimbingUniversitas::create([
            'user_id' => $user->id,
            'universitas_id' => $univId,
            'nama' => $name,
            'nip' => $nip,
            'email' => $email,
            'departemen' => $dept,
        ]);
    }

    private function createPembimbingPerusahaan($name, $email, $perusahaanId, $posisi)
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'is_active' => true,
        ]);
        $user->assignRole('pembimbing_perusahaan');

        return PembimbingPerusahaan::create([
            'user_id' => $user->id,
            'perusahaan_id' => $perusahaanId,
            'nama' => $name,
            'posisi' => $posisi,
            'email' => $email,
        ]);
    }

    private function createKegiatanMagang($mhsId, $perusahaanId, $pUniId, $pPerId, $judul, $status = 'aktif')
    {
        return KegiatanMagang::create([
            'mahasiswa_id' => $mhsId,
            'perusahaan_id' => $perusahaanId,
            'pembimbing_universitas_id' => $pUniId,
            'pembimbing_perusahaan_id' => $pPerId,
            'judulKegiatan' => $judul,
            'tanggalMulai' => now()->subMonths(rand(2, 4)),
            'tanggalSelesai' => now()->addMonths(rand(1, 2)),
            'durasiHari' => 120,
            'divisiTempat' => 'Divisi Teknologi & Inovasi',
            'deskripsiTugas' => "Melaksanakan tugas $judul dan koordinasi dengan tim operasional.",
            'statusKegiatan' => $status,
        ]);
    }
}
