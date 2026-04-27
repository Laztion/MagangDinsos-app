<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Mahasiswa;
use App\Models\Universitas;
use App\Models\Perusahaan;
use App\Models\PembimbingUniversitas;
use App\Models\PembimbingPerusahaan;
use App\Models\KegiatanMagang;
use App\Models\LaporanKegiatan;
use App\Models\LampiranLaporan;
use App\Models\Penilaian;
use App\Models\KartuMagang;
use App\Models\RiwayatMagang;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class IndonesianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        // 1. Seed Universitas
        $universitas = [];
        $uniNames = [
            'Universitas Indonesia',
            'Institut Teknologi Bandung',
            'Universitas Gadjah Mada',
            'Universitas Padjadjaran',
            'Universitas Diponegoro',
        ];

        foreach ($uniNames as $name) {
            $universitas[] = Universitas::create([
                'namaUniversitas' => $name,
                'alamat' => $faker->address,
                'kota' => $faker->city,
                'noTelepon' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'website' => 'https://' . $faker->domainName,
            ]);
        }

        // 2. Seed Perusahaan
        $perusahaans = [];
        $companyNames = [
            'PT Pertamina',
            'PT Telkom Indonesia',
            'PT Bank Central Asia',
            'PT Astra International',
            'PT GoTo Gojek Tokopedia',
        ];

        foreach ($companyNames as $name) {
            $perusahaans[] = Perusahaan::create([
                'namaPerusahaan' => $name,
                'alamat' => $faker->address,
                'kota' => $faker->city,
                'provinsi' => $faker->state,
                'email' => $faker->unique()->companyEmail,
                'sektorIndustri' => $faker->jobTitle,
                'namaPIC' => $faker->name,
                'kontakPIC' => $faker->phoneNumber,
            ]);
        }

        // 3. Seed Pembimbing Universitas (linked to Users and Universities)
        $pembimbingUnis = [];
        foreach ($universitas as $uni) {
            $name = $faker->name;
            $email = 'dosen.' . $faker->unique()->userName . '@' . $faker->freeEmailDomain;
            
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'is_active' => true,
            ]);


            $pembimbingUnis[] = PembimbingUniversitas::create([
                'user_id' => $user->id,
                'universitas_id' => $uni->id,
                'nama' => $name,
                'nip' => $faker->unique()->numerify('19##########'),
                'email' => $email,
                'noTelepon' => $faker->phoneNumber,
                'departemen' => 'Teknik Informatika',
                'bidangKeahlian' => $faker->word,
            ]);
        }

        // 4. Seed Pembimbing Perusahaan (linked to companies)
        $pembimbingPerushs = [];
        foreach ($perusahaans as $perusahaan) {
            $pembimbingPerushs[] = PembimbingPerusahaan::create([
                'perusahaan_id' => $perusahaan->id,
                'nama' => $faker->name,
                'posisi' => 'Senior Manager',
                'email' => $faker->unique()->companyEmail,
                'noTelepon' => $faker->phoneNumber,
                'bidangKeahlian' => $faker->word,
                'tanggalDaftarSebagaiPembimbing' => now(),
            ]);
        }

        // 5. Seed Users & Mahasiswas
        for ($i = 0; $i < 15; $i++) {
            $name = $faker->name;
            $email = $faker->unique()->safeEmail;
            $uni = $faker->randomElement($universitas);
            
            $user = User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'is_active' => true,
            ]);


            $mahasiswa = Mahasiswa::create([
                'user_id' => $user->id,
                'universitas_id' => $uni->id,
                'statusKeaktifan' => true,
                'nama' => $name,
                'nim' => $faker->unique()->numerify('##########'),
                'jenisKelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'alamat' => $faker->address,
                'tanggalLahir' => $faker->date('Y-m-d', '2004-01-01'),
                'tempatLahir' => $faker->city,
                'email' => $email,
                'noTelepon' => $faker->phoneNumber,
                'fakultas' => 'Teknik',
                'programStudi' => 'Informatika',
                'kelas' => 'A',
                'semester' => '6',
                'tanggalDaftar' => now(),
            ]);

            // 6. Seed Kegiatan Magang for this Mahasiswa
            $perusahaan = $faker->randomElement($perusahaans);
            // Get supervisor from SAME university
            $pembimbingUni = PembimbingUniversitas::where('universitas_id', $uni->id)->first();
            $pembimbingPerush = PembimbingPerusahaan::where('perusahaan_id', $perusahaan->id)->first();

            $kegiatan = KegiatanMagang::create([
                'mahasiswa_id' => $mahasiswa->id,
                'perusahaan_id' => $perusahaan->id,
                'pembimbing_universitas_id' => $pembimbingUni->id,
                'pembimbing_perusahaan_id' => $pembimbingPerush->id,
                'judulKegiatan' => 'Magang ' . $faker->jobTitle,
                'tanggalMulai' => Carbon::now()->subMonths(2),
                'tanggalSelesai' => Carbon::now()->addMonths(2),
                'durasiHari' => 120,
                'divisiTempat' => 'IT Department',
                'deskripsiTugas' => $faker->paragraph,
                'statusKegiatan' => 'aktif',
            ]);

            // 7. Seed Laporan Kegiatan
            for ($j = 1; $j <= 4; $j++) {
                $laporan = LaporanKegiatan::create([
                    'kegiatan_magang_id' => $kegiatan->id,
                    'mahasiswa_id' => $mahasiswa->id,
                    'tanggalLaporan' => Carbon::now()->subMonths(2)->addWeeks($j),
                    'aktivitasKegiatan' => $faker->sentence,
                    'hasilPekerjaan' => $faker->sentence,
                    'hambatanDanSolusi' => 'Tidak ada hambatan berarti.',
                    'jamKerja' => 40.0,
                    'statusLaporan' => 'disetujui',
                ]);

                // Lampiran Laporan
                LampiranLaporan::create([
                    'laporan_kegiatan_id' => $laporan->id,
                    'namaFile' => 'foto_kegiatan.jpg',
                    'tipeFile' => 'image/jpeg',
                    'urlFile' => 'laporan/dummy.jpg',
                    'tanggalUpload' => now(),
                ]);
            }

            // 8. Seed Penilaian
            Penilaian::create([
                'kegiatan_magang_id' => $kegiatan->id,
                'pembimbing_perusahaan_id' => $pembimbingPerush->id,
                'pembimbing_universitas_id' => $pembimbingUni->id,
                'nilaiKehadiran' => $faker->numberBetween(80, 100),
                'nilaiSikap' => $faker->numberBetween(80, 100),
                'nilaiKomunikasi' => $faker->numberBetween(80, 100),
                'nilaiProaktif' => $faker->numberBetween(80, 100),
                'nilaiAkhir' => $faker->numberBetween(80, 100),
                'komentar' => $faker->sentence,
                'tanggalPenilaian' => now(),
            ]);

            // 9. Seed Kartu Magang
            KartuMagang::create([
                'mahasiswa_id' => $mahasiswa->id,
                'kegiatan_magang_id' => $kegiatan->id,
                'universitas_id' => $uni->id,
                'tanggalMulai' => Carbon::now()->subMonths(2),
                'tanggalSelesai' => Carbon::now()->addMonths(2),
                'statusKartu' => 'aktif',
                'tanggalCetak' => now(),
            ]);

            // 10. Seed Riwayat Magang
            RiwayatMagang::create([
                'mahasiswa_id' => $mahasiswa->id,
                'kegiatan_magang_id' => $kegiatan->id,
                'tanggalMulai' => Carbon::now()->subMonths(2),
                'tanggalSelesai' => Carbon::now()->addMonths(2),
                'divisiTempat' => 'IT Department',
                'namaPerusahaan' => $perusahaan->namaPerusahaan,
                'namaPembimbingPerusahaan' => $pembimbingPerush->nama,
                'statusKompetensi' => 'Kompeten',
                'nilaiAkhir' => $faker->numberBetween(80, 100),
                'catatan' => 'Sangat baik',
                'tanggalTercatat' => now(),
            ]);
        }
    }
}
