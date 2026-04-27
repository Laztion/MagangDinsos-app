-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2026 pada 21.37
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magangdinsos_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:1;', 1775501927),
('laravel-cache-livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1775501927;', 1775501927);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kartu_magangs`
--

CREATE TABLE `kartu_magangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_magang_id` bigint(20) UNSIGNED NOT NULL,
  `universitas_id` bigint(20) UNSIGNED NOT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalSelesai` date NOT NULL,
  `statusKartu` varchar(255) NOT NULL DEFAULT 'aktif',
  `tanggalCetak` date DEFAULT NULL,
  `tanggalCetakUlang` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan_magangs`
--

CREATE TABLE `kegiatan_magangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing_universitas_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing_perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `judulKegiatan` varchar(255) NOT NULL,
  `tanggalMulai` datetime NOT NULL,
  `tanggalSelesai` datetime NOT NULL,
  `durasiHari` int(11) NOT NULL,
  `divisiTempat` varchar(255) NOT NULL,
  `deskripsiTugas` text NOT NULL,
  `dokumentasi` varchar(255) DEFAULT NULL,
  `statusKegiatan` varchar(255) NOT NULL DEFAULT 'aktif',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lampiran_laporans`
--

CREATE TABLE `lampiran_laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `laporan_kegiatan_id` bigint(20) UNSIGNED NOT NULL,
  `namaFile` varchar(255) NOT NULL,
  `tipeFile` varchar(255) NOT NULL,
  `urlFile` varchar(255) NOT NULL,
  `tanggalUpload` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_kegiatans`
--

CREATE TABLE `laporan_kegiatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_magang_id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `tanggalLaporan` date NOT NULL,
  `aktivitasKegiatan` text NOT NULL,
  `hasilPekerjaan` text DEFAULT NULL,
  `hambatanDanSolusi` text DEFAULT NULL,
  `jamKerja` decimal(5,2) NOT NULL,
  `statusLaporan` varchar(255) NOT NULL DEFAULT 'draft',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswas`
--

CREATE TABLE `mahasiswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `statusKeaktifan` tinyint(1) NOT NULL DEFAULT 1,
  `nama` varchar(255) NOT NULL,
  `nim` varchar(255) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text DEFAULT NULL COMMENT 'Alamat lengkap mahasiswa',
  `tanggalLahir` date NOT NULL,
  `tempatLahir` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noTelepon` varchar(255) DEFAULT NULL,
  `universitas` varchar(255) NOT NULL,
  `fakultas` varchar(255) DEFAULT NULL,
  `programStudi` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `tanggalDaftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_06_153119_create_mahasiswas_table', 1),
(5, '2026_04_06_153150_create_universitas_table', 1),
(6, '2026_04_06_153211_create_perusahaans_table', 1),
(7, '2026_04_06_153241_create_pembimbing_universitas_table', 1),
(8, '2026_04_06_153258_create_pembimbing_perusahaans_table', 1),
(9, '2026_04_06_153316_create_kegiatan_magangs_table', 1),
(10, '2026_04_06_153354_create_laporan_kegiatans_table', 1),
(11, '2026_04_06_153421_create_lampiran_laporans_table', 1),
(12, '2026_04_06_153444_create_penilaians_table', 1),
(13, '2026_04_06_153511_create_kartu_magangs_table', 1),
(14, '2026_04_06_153532_create_riwayat_magangs_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing_perusahaans`
--

CREATE TABLE `pembimbing_perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noTelepon` varchar(255) DEFAULT NULL,
  `bidangKeahlian` varchar(255) DEFAULT NULL,
  `tanggalDaftarSebagaiPembimbing` date NOT NULL DEFAULT curdate(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembimbing_universitas`
--

CREATE TABLE `pembimbing_universitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `noTelepon` varchar(255) DEFAULT NULL,
  `departemen` varchar(255) NOT NULL,
  `bidangKeahlian` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaians`
--

CREATE TABLE `penilaians` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_magang_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing_perusahaan_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing_universitas_id` bigint(20) UNSIGNED NOT NULL,
  `nilaiKehadiran` decimal(5,2) NOT NULL,
  `nilaiSikap` decimal(5,2) NOT NULL,
  `nilaiKomunikasi` decimal(5,2) NOT NULL,
  `nilaiProaktif` decimal(5,2) NOT NULL,
  `nilaiAkhir` decimal(5,2) NOT NULL,
  `komentar` text DEFAULT NULL,
  `tanggalPenilaian` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaPerusahaan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `sektorIndustri` varchar(255) DEFAULT NULL,
  `namaPIC` varchar(255) DEFAULT NULL,
  `kontakPIC` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_magangs`
--

CREATE TABLE `riwayat_magangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahasiswa_id` bigint(20) UNSIGNED NOT NULL,
  `kegiatan_magang_id` bigint(20) UNSIGNED NOT NULL,
  `tanggalMulai` date NOT NULL,
  `tanggalSelesai` date NOT NULL,
  `divisiTempat` varchar(255) NOT NULL,
  `namaPerusahaan` varchar(255) NOT NULL,
  `namaPembimbingPerusahaan` varchar(255) NOT NULL,
  `statusKompetensi` varchar(255) DEFAULT NULL,
  `nilaiAkhir` decimal(5,2) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `tanggalTercatat` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('tvxLgGiCk72RsjdyK80PfP6NBe9sLercyI35SDLA', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/146.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJYSE9HNm9MQUFGTjdOUVVCR0pLVXpDMjBOcWl0ZmtHVVBiOWhXNjVhIiwidXJsIjpbXSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL21hZ2FuZ2RpbnNvcy50ZXN0XC9hZG1pblwvbWFoYXNpc3dhc1wvY3JlYXRlIiwicm91dGUiOiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMubWFoYXNpc3dhcy5jcmVhdGUifSwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MSwicGFzc3dvcmRfaGFzaF93ZWIiOiIzOWY5YjQ4YjBmMWM0NDc4MDM4ZjY5Mzg0ZTIzZmJkNmEwYTMyYjA5YTc3NmJhNDNkZDYwMjQ5MzE3MjAzOTlhIiwidGFibGVzIjp7IjZhM2MzMzM2OGYxZmQ4NWQ1MjYzMGQzMjIzMjllYjkyX2NvbHVtbnMiOlt7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidXNlcl9pZCIsImxhYmVsIjoiVXNlciBpZCIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJzdGF0dXNLZWFrdGlmYW4iLCJsYWJlbCI6IlN0YXR1cyBrZWFrdGlmYW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibmFtYSIsImxhYmVsIjoiTmFtYSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJuaW0iLCJsYWJlbCI6Ik5pbSIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJqZW5pc0tlbGFtaW4iLCJsYWJlbCI6IkplbmlzIGtlbGFtaW4iLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidGFuZ2dhbExhaGlyIiwibGFiZWwiOiJUYW5nZ2FsIGxhaGlyIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InRlbXBhdExhaGlyIiwibGFiZWwiOiJUZW1wYXQgbGFoaXIiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZW1haWwiLCJsYWJlbCI6IkVtYWlsIGFkZHJlc3MiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoibm9UZWxlcG9uIiwibGFiZWwiOiJObyB0ZWxlcG9uIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InVuaXZlcnNpdGFzIiwibGFiZWwiOiJVbml2ZXJzaXRhcyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJmYWt1bHRhcyIsImxhYmVsIjoiRmFrdWx0YXMiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoicHJvZ3JhbVN0dWRpIiwibGFiZWwiOiJQcm9ncmFtIHN0dWRpIiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOnRydWUsImlzVG9nZ2xlYWJsZSI6ZmFsc2UsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6bnVsbH0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6ImtlbGFzIiwibGFiZWwiOiJLZWxhcyIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJzZW1lc3RlciIsImxhYmVsIjoiU2VtZXN0ZXIiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoidGFuZ2dhbERhZnRhciIsImxhYmVsIjoiVGFuZ2dhbCBkYWZ0YXIiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6dHJ1ZSwiaXNUb2dnbGVhYmxlIjpmYWxzZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjpudWxsfSx7InR5cGUiOiJjb2x1bW4iLCJuYW1lIjoiZm90byIsImxhYmVsIjoiRm90byIsImlzSGlkZGVuIjpmYWxzZSwiaXNUb2dnbGVkIjp0cnVlLCJpc1RvZ2dsZWFibGUiOmZhbHNlLCJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiOm51bGx9LHsidHlwZSI6ImNvbHVtbiIsIm5hbWUiOiJjcmVhdGVkX2F0IiwibGFiZWwiOiJDcmVhdGVkIGF0IiwiaXNIaWRkZW4iOmZhbHNlLCJpc1RvZ2dsZWQiOmZhbHNlLCJpc1RvZ2dsZWFibGUiOnRydWUsImlzVG9nZ2xlZEhpZGRlbkJ5RGVmYXVsdCI6dHJ1ZX0seyJ0eXBlIjoiY29sdW1uIiwibmFtZSI6InVwZGF0ZWRfYXQiLCJsYWJlbCI6IlVwZGF0ZWQgYXQiLCJpc0hpZGRlbiI6ZmFsc2UsImlzVG9nZ2xlZCI6ZmFsc2UsImlzVG9nZ2xlYWJsZSI6dHJ1ZSwiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0Ijp0cnVlfV19fQ==', 1775502180);

-- --------------------------------------------------------

--
-- Struktur dari tabel `universitas`
--

CREATE TABLE `universitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `namaUniversitas` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `noTelepon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@dinsos.com', NULL, '$2y$12$uESNuP8gFXGydnWHHkul3.v4zI2rQ3AD/UEzE6ea7/iGJ/CCOkpQe', NULL, '2026-04-06 11:56:15', '2026-04-06 11:56:15');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kartu_magangs`
--
ALTER TABLE `kartu_magangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kartu_magangs_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `kartu_magangs_kegiatan_magang_id_foreign` (`kegiatan_magang_id`),
  ADD KEY `kartu_magangs_universitas_id_foreign` (`universitas_id`);

--
-- Indeks untuk tabel `kegiatan_magangs`
--
ALTER TABLE `kegiatan_magangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kegiatan_magangs_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `kegiatan_magangs_perusahaan_id_foreign` (`perusahaan_id`),
  ADD KEY `kegiatan_magangs_pembimbing_universitas_id_foreign` (`pembimbing_universitas_id`),
  ADD KEY `kegiatan_magangs_pembimbing_perusahaan_id_foreign` (`pembimbing_perusahaan_id`);

--
-- Indeks untuk tabel `lampiran_laporans`
--
ALTER TABLE `lampiran_laporans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lampiran_laporans_laporan_kegiatan_id_foreign` (`laporan_kegiatan_id`);

--
-- Indeks untuk tabel `laporan_kegiatans`
--
ALTER TABLE `laporan_kegiatans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_kegiatans_kegiatan_magang_id_foreign` (`kegiatan_magang_id`),
  ADD KEY `laporan_kegiatans_mahasiswa_id_foreign` (`mahasiswa_id`);

--
-- Indeks untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mahasiswas_nim_unique` (`nim`),
  ADD UNIQUE KEY `mahasiswas_email_unique` (`email`),
  ADD KEY `mahasiswas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `pembimbing_perusahaans`
--
ALTER TABLE `pembimbing_perusahaans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembimbing_perusahaans_email_unique` (`email`),
  ADD KEY `pembimbing_perusahaans_perusahaan_id_foreign` (`perusahaan_id`);

--
-- Indeks untuk tabel `pembimbing_universitas`
--
ALTER TABLE `pembimbing_universitas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pembimbing_universitas_nip_unique` (`nip`),
  ADD UNIQUE KEY `pembimbing_universitas_email_unique` (`email`);

--
-- Indeks untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaians_kegiatan_magang_id_foreign` (`kegiatan_magang_id`),
  ADD KEY `penilaians_pembimbing_perusahaan_id_foreign` (`pembimbing_perusahaan_id`),
  ADD KEY `penilaians_pembimbing_universitas_id_foreign` (`pembimbing_universitas_id`);

--
-- Indeks untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `riwayat_magangs`
--
ALTER TABLE `riwayat_magangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_magangs_mahasiswa_id_foreign` (`mahasiswa_id`),
  ADD KEY `riwayat_magangs_kegiatan_magang_id_foreign` (`kegiatan_magang_id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kartu_magangs`
--
ALTER TABLE `kartu_magangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan_magangs`
--
ALTER TABLE `kegiatan_magangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lampiran_laporans`
--
ALTER TABLE `lampiran_laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `laporan_kegiatans`
--
ALTER TABLE `laporan_kegiatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pembimbing_perusahaans`
--
ALTER TABLE `pembimbing_perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembimbing_universitas`
--
ALTER TABLE `pembimbing_universitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `riwayat_magangs`
--
ALTER TABLE `riwayat_magangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kartu_magangs`
--
ALTER TABLE `kartu_magangs`
  ADD CONSTRAINT `kartu_magangs_kegiatan_magang_id_foreign` FOREIGN KEY (`kegiatan_magang_id`) REFERENCES `kegiatan_magangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kartu_magangs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kartu_magangs_universitas_id_foreign` FOREIGN KEY (`universitas_id`) REFERENCES `universitas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kegiatan_magangs`
--
ALTER TABLE `kegiatan_magangs`
  ADD CONSTRAINT `kegiatan_magangs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kegiatan_magangs_pembimbing_perusahaan_id_foreign` FOREIGN KEY (`pembimbing_perusahaan_id`) REFERENCES `pembimbing_perusahaans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kegiatan_magangs_pembimbing_universitas_id_foreign` FOREIGN KEY (`pembimbing_universitas_id`) REFERENCES `pembimbing_universitas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kegiatan_magangs_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `lampiran_laporans`
--
ALTER TABLE `lampiran_laporans`
  ADD CONSTRAINT `lampiran_laporans_laporan_kegiatan_id_foreign` FOREIGN KEY (`laporan_kegiatan_id`) REFERENCES `laporan_kegiatans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_kegiatans`
--
ALTER TABLE `laporan_kegiatans`
  ADD CONSTRAINT `laporan_kegiatans_kegiatan_magang_id_foreign` FOREIGN KEY (`kegiatan_magang_id`) REFERENCES `kegiatan_magangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `laporan_kegiatans_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mahasiswas`
--
ALTER TABLE `mahasiswas`
  ADD CONSTRAINT `mahasiswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembimbing_perusahaans`
--
ALTER TABLE `pembimbing_perusahaans`
  ADD CONSTRAINT `pembimbing_perusahaans_perusahaan_id_foreign` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaans` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `penilaians`
--
ALTER TABLE `penilaians`
  ADD CONSTRAINT `penilaians_kegiatan_magang_id_foreign` FOREIGN KEY (`kegiatan_magang_id`) REFERENCES `kegiatan_magangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_pembimbing_perusahaan_id_foreign` FOREIGN KEY (`pembimbing_perusahaan_id`) REFERENCES `pembimbing_perusahaans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_pembimbing_universitas_id_foreign` FOREIGN KEY (`pembimbing_universitas_id`) REFERENCES `pembimbing_universitas` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_magangs`
--
ALTER TABLE `riwayat_magangs`
  ADD CONSTRAINT `riwayat_magangs_kegiatan_magang_id_foreign` FOREIGN KEY (`kegiatan_magang_id`) REFERENCES `kegiatan_magangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `riwayat_magangs_mahasiswa_id_foreign` FOREIGN KEY (`mahasiswa_id`) REFERENCES `mahasiswas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
