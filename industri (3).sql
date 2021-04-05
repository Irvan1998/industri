-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 05 Apr 2021 pada 17.34
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `industri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `ahp`
--

CREATE TABLE `ahp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_matriks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ahp`
--

INSERT INTO `ahp` (`id`, `created_at`, `updated_at`, `id_matriks`, `kategori`, `nilai`, `id_user`) VALUES
(1, '2021-03-31 03:48:26', '2021-03-31 03:48:26', '5', 'SDM', '7', '1'),
(2, '2021-03-31 04:07:39', '2021-03-31 04:07:39', '6', 'SDM', '4', '1'),
(3, '2021-03-31 04:07:47', '2021-03-31 04:07:47', '7', 'SDM', '3', '1'),
(4, '2021-03-31 04:07:52', '2021-03-31 04:07:52', '8', 'SDM', '4', '1'),
(5, '2021-03-31 04:07:56', '2021-03-31 04:07:56', '9', 'SDM', '1', '1'),
(6, '2021-03-31 04:08:01', '2021-03-31 04:08:01', '10', 'SDM', '3', '1'),
(7, '2021-03-31 04:09:11', '2021-03-31 04:09:11', '5', 'SDM', '3', '2'),
(8, '2021-03-31 04:09:15', '2021-03-31 04:09:15', '6', 'SDM', '3', '2'),
(9, '2021-03-31 04:09:18', '2021-03-31 04:09:18', '7', 'SDM', '3', '2'),
(10, '2021-03-31 04:09:25', '2021-03-31 04:09:25', '8', 'SDM', '3', '2'),
(11, '2021-03-31 04:09:45', '2021-03-31 04:09:45', '9', 'SDM', '3', '2'),
(12, '2021-03-31 04:09:50', '2021-03-31 04:09:50', '10', 'SDM', '3', '2'),
(13, '2021-04-05 07:46:19', '2021-04-05 07:46:19', '11', 'PRODUKSI', '5', '1'),
(14, '2021-04-05 07:46:24', '2021-04-05 07:46:24', '12', 'PRODUKSI', '5', '1'),
(15, '2021-04-05 07:46:29', '2021-04-05 07:46:29', '13', 'PRODUKSI', '3', '1'),
(16, '2021-04-05 07:47:10', '2021-04-05 07:47:10', '11', 'PRODUKSI', '5', '2'),
(17, '2021-04-05 07:47:14', '2021-04-05 07:47:14', '12', 'PRODUKSI', '5', '2'),
(18, '2021-04-05 07:47:21', '2021-04-05 07:47:21', '13', 'PRODUKSI', '5', '2'),
(19, '2021-04-05 08:23:33', '2021-04-05 08:23:33', '14', 'PENYIMPANAN&TRANSPORTASI', '9', '1'),
(20, '2021-04-05 08:23:50', '2021-04-05 08:23:50', '15', 'INTEGRITASHALAL', '9', '1'),
(21, '2021-04-05 08:24:02', '2021-04-05 08:24:02', '16', 'INTEGRITASHALAL', '9', '1'),
(22, '2021-04-05 08:24:18', '2021-04-05 08:24:18', '17', 'INTEGRITASHALAL', '9', '1'),
(23, '2021-04-05 08:24:26', '2021-04-05 08:24:26', '18', 'INTEGRITASHALAL', '9', '1'),
(24, '2021-04-05 08:24:32', '2021-04-05 08:24:32', '19', 'INTEGRITASHALAL', '9', '1'),
(25, '2021-04-05 08:24:39', '2021-04-05 08:24:39', '20', 'INTEGRITASHALAL', '9', '1'),
(26, '2021-04-05 08:24:45', '2021-04-05 08:24:45', '21', 'INTEGRITASHALAL', '9', '1'),
(27, '2021-04-05 08:24:50', '2021-04-05 08:24:50', '22', 'INTEGRITASHALAL', '9', '1'),
(28, '2021-04-05 08:24:57', '2021-04-05 08:24:57', '23', 'INTEGRITASHALAL', '9', '1'),
(29, '2021-04-05 08:25:02', '2021-04-05 08:25:02', '24', 'INTEGRITASHALAL', '9', '1'),
(30, '2021-04-05 08:27:03', '2021-04-05 08:27:03', '14', 'PENYIMPANAN&TRANSPORTASI', '2', '2'),
(31, '2021-04-05 08:27:09', '2021-04-05 08:27:09', '15', 'INTEGRITASHALAL', '2', '2'),
(32, '2021-04-05 08:27:15', '2021-04-05 08:27:15', '16', 'INTEGRITASHALAL', '2', '2'),
(33, '2021-04-05 08:27:20', '2021-04-05 08:27:20', '17', 'INTEGRITASHALAL', '2', '2'),
(34, '2021-04-05 08:27:25', '2021-04-05 08:27:25', '18', 'INTEGRITASHALAL', '2', '2'),
(35, '2021-04-05 08:27:31', '2021-04-05 08:27:31', '19', 'INTEGRITASHALAL', '2', '2'),
(36, '2021-04-05 08:27:36', '2021-04-05 08:27:36', '20', 'INTEGRITASHALAL', '2', '2'),
(37, '2021-04-05 08:27:39', '2021-04-05 08:27:39', '21', 'INTEGRITASHALAL', '2', '2'),
(38, '2021-04-05 08:27:43', '2021-04-05 08:27:43', '22', 'INTEGRITASHALAL', '2', '2'),
(39, '2021-04-05 08:27:48', '2021-04-05 08:27:48', '23', 'INTEGRITASHALAL', '2', '2'),
(40, '2021-04-05 08:27:52', '2021-04-05 08:27:52', '24', 'INTEGRITASHALAL', '2', '2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dinas`
--

CREATE TABLE `dinas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `dinas`
--

INSERT INTO `dinas` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'irvan', 'irvanrifqi5@gmail.com', '$2y$10$gK6o9Hnaxm6DZ44VGMefW./rNW6gvhRySXWuDPQRglxqelAvhCVQS', '2021-03-30 11:01:18', '2021-03-30 11:01:18'),
(2, 'irvan2', 'irvanrifqi52@gmail.com', '$2y$10$gK6o9Hnaxm6DZ44VGMefW./rNW6gvhRySXWuDPQRglxqelAvhCVQS', '2021-03-30 11:01:18', '2021-03-30 11:01:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator`
--

CREATE TABLE `indikator` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahap` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `indikator`
--

INSERT INTO `indikator` (`id`, `nama`, `tahap`, `created_at`, `updated_at`, `kategori`) VALUES
(34, 'Perusahaan mampu menjamin bahan baku halal,bersih dan berkualitas sesuai dengan konsep halal', 1, '2021-03-29 23:45:57', '2021-03-29 23:45:57', NULL),
(35, 'Perusahaan mampu menjamin bahan berasal dari\npemasok yang memiliki sertifikasi halal yang\nvalid', 1, '2021-03-29 23:45:57', '2021-03-29 23:45:57', NULL),
(36, 'Perhatian yang serius terhadap fasilitas produksi\nyang digunakan guna mengatasi masalah\nkontaminasi produk halal dan non halal\n            ', 1, '2021-03-29 23:45:57', '2021-03-29 23:45:57', NULL),
(37, 'Transportasi khusus untuk produk makanan halal', 1, '2021-03-29 23:45:57', '2021-03-29 23:45:57', NULL),
(38, 'Infrastruktur/peralatan pembantu khusus untuk produk makanan halal', 1, '2021-03-29 23:45:57', '2021-03-29 23:45:57', NULL),
(39, 'Pemisahan minimum yang diperlukan dalam penyimpanan halal untuk rantai makanan', 1, '2021-03-29 23:45:57', '2021-03-29 23:45:57', NULL),
(40, 'Perusahaan menjamin karyawan mendapatkan pelatihan eksternal tipe sederhana\nminimal dua tahun sekali (training singkat sebelum audit, training singkat LPPOM\nMUI, training dari lembaga lain) dalam menangani produk halal yang memadai', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'SDM'),
(41, 'Perusahaan menjamin karyawan mendapatkan pelatihan internal dalam menangani\nproduk halal yang memadai', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'SDM'),
(42, 'Level pemahaman karyawan dalam prosedur penanganan makanan halal', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'SDM'),
(43, 'Level pemahaman karyawan dalam persyaratan Islam dalam makanan halal', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'SDM'),
(44, 'Peralatan dan mesin pemrosesan yang disediakan bersifat higienis dan disetujui oleh\nLPPOM MUI', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'PRODUKSI'),
(45, 'Sanitasi dan kebersihan area produksi dijaga sesuai dengan persyaratan Syari\'ah yang\ndisetujui oleh LPPOM MUI', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'PRODUKSI'),
(46, 'Prosedur standar dalam food operation memenuhi konsep halal', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'PRODUKSI'),
(47, 'Fasilitas penyimpanan bersih dan higienis yang memenuhi persyaratan hukum\nSyari\'ah LPPOM MUI', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'PENYIMPANAN&TRANSPORTASI'),
(48, 'Transportasi bersih dan higienis yang memenuhi persyaratan LPPOM MUI hukum\nSyari`ah', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'PENYIMPANAN&TRANSPORTASI'),
(49, 'Menerapkan persyaratan halal di setiap aspek dalam produksi melalui penetapan\nkomitmen halal/kebijakan halal', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'INTEGRITASHALAL'),
(50, 'Perusahaan menjamin telah membentuk tim manajemen halal yang berkompeten', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'INTEGRITASHALAL'),
(51, 'Perusahaan menjamin telah dilakukan audit internal yang memadai untuk memastikan\r\nproduksi memenuhi persyaratan halal', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'INTEGRITASHALAL'),
(52, 'Perusahaan menjamin telah dilakukan kaji ulang manajemen yang memadai untuk\r\nmenilai efektifitas penerapan SJH dan merumuskan perbaikan berkelanjutan.', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'INTEGRITASHALAL'),
(53, 'Perusahaan menjamin terdapat fasilitas sistematis untuk mengajukan pengaduan\n(seperti, ditemukan produk yang tidak memenuhi kriteria) yang memadai', 2, '2021-03-29 23:45:57', '2021-03-29 23:45:57', 'INTEGRITASHALAL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `industri`
--

CREATE TABLE `industri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nilai_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indikator_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indikator_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indikator_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indikator_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indikator_5` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indikator_6` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `industri`
--

INSERT INTO `industri` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`, `nilai_1`, `indikator_1`, `indikator_2`, `indikator_3`, `indikator_4`, `indikator_5`, `indikator_6`) VALUES
(1, 'Peternakan', 'Peternakan', '2021-03-15 23:36:23', '2021-03-16 07:56:05', '6', '1', '1', '1', '1', '1', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matriks_ahp`
--

CREATE TABLE `matriks_ahp` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `id_indikator2` int(11) NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `matriks_ahp`
--

INSERT INTO `matriks_ahp` (`id`, `id_indikator`, `id_indikator2`, `kategori`, `created_at`, `updated_at`) VALUES
(5, 40, 41, 'SDM', '2021-03-29 23:53:50', '2021-03-29 23:53:50'),
(6, 40, 42, 'SDM', '2021-03-29 23:54:14', '2021-03-29 23:54:14'),
(7, 40, 43, 'SDM', '2021-03-29 23:54:26', '2021-03-29 23:54:26'),
(8, 41, 42, 'SDM', '2021-03-29 23:54:41', '2021-03-29 23:54:41'),
(9, 41, 43, 'SDM', '2021-03-29 23:55:20', '2021-03-29 23:55:20'),
(10, 42, 43, 'SDM', '2021-03-29 23:55:47', '2021-03-29 23:55:47'),
(11, 44, 45, 'PRODUKSI', '2021-04-05 07:44:04', '2021-04-05 07:44:04'),
(12, 44, 46, 'PRODUKSI', '2021-04-05 07:44:44', '2021-04-05 07:44:44'),
(13, 45, 46, 'PRODUKSI', '2021-04-05 07:45:15', '2021-04-05 07:45:15'),
(14, 47, 48, 'PENYIMPANAN&TRANSPORTASI', '2021-04-05 08:11:54', '2021-04-05 08:11:54'),
(15, 49, 50, 'INTEGRITASHALAL', '2021-04-05 08:20:01', '2021-04-05 08:20:01'),
(16, 49, 51, 'INTEGRITASHALAL', '2021-04-05 08:20:16', '2021-04-05 08:20:16'),
(17, 49, 52, 'INTEGRITASHALAL', '2021-04-05 08:21:28', '2021-04-05 08:21:28'),
(18, 49, 53, 'INTEGRITASHALAL', '2021-04-05 08:21:41', '2021-04-05 08:21:41'),
(19, 50, 51, 'INTEGRITASHALAL', '2021-04-05 08:21:52', '2021-04-05 08:21:52'),
(20, 50, 52, 'INTEGRITASHALAL', '2021-04-05 08:22:04', '2021-04-05 08:22:04'),
(21, 50, 53, 'INTEGRITASHALAL', '2021-04-05 08:22:18', '2021-04-05 08:22:18'),
(22, 51, 52, 'INTEGRITASHALAL', '2021-04-05 08:22:30', '2021-04-05 08:22:30'),
(23, 51, 53, 'INTEGRITASHALAL', '2021-04-05 08:22:37', '2021-04-05 08:22:37'),
(24, 52, 53, 'INTEGRITASHALAL', '2021-04-05 08:22:49', '2021-04-05 08:22:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(41, '2014_10_12_000000_create_users_table', 1),
(42, '2014_10_12_100000_create_password_resets_table', 1),
(43, '2019_08_19_000000_create_failed_jobs_table', 1),
(44, '2021_03_06_034304_create_indikator_table', 1),
(45, '2021_03_06_034506_create_industri_table', 1),
(46, '2021_03_06_034518_create_skala_table', 1),
(47, '2021_03_09_041703_create_nilai_skala_table', 1),
(48, '2021_03_09_143415_create_penguji_table', 1),
(49, '2021_03_16_072416_create_tahap_1s_table', 2),
(50, '2021_03_16_075827_add_nilai_to_industri', 3),
(51, '2021_03_16_122955_add_skala_to_industri', 4),
(55, '2021_03_22_102508_create_dinas_table', 5),
(56, '2021_03_24_111949_create_matriks_ahp_table', 5),
(57, '2021_03_24_112518_create_ahp_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_skala`
--

CREATE TABLE `nilai_skala` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_industri` int(11) NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `id_skala` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penguji`
--

CREATE TABLE `penguji` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penguji`
--

INSERT INTO `penguji` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Wahid Dwipa Baskara', 'wahid@gmail.com', '$2y$10$aog5snbIyTlnO97lfvcH5OmdqJDNFhE2c8wguKAb8gqpkRw2rzYo2', '2021-03-13 03:52:14', '2021-03-13 03:52:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skala`
--

CREATE TABLE `skala` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_indikator` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'irvan', 'irvanrifqi5@gmail.com', '2021-03-10 00:37:16', '$2y$10$gK6o9Hnaxm6DZ44VGMefW./rNW6gvhRySXWuDPQRglxqelAvhCVQS', NULL, '2021-03-10 00:37:16', '2021-03-10 00:37:16');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `ahp`
--
ALTER TABLE `ahp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dinas`
--
ALTER TABLE `dinas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dinas_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `industri`
--
ALTER TABLE `industri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `matriks_ahp`
--
ALTER TABLE `matriks_ahp`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_skala`
--
ALTER TABLE `nilai_skala`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `penguji`
--
ALTER TABLE `penguji`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penguji_email_unique` (`email`);

--
-- Indeks untuk tabel `skala`
--
ALTER TABLE `skala`
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
-- AUTO_INCREMENT untuk tabel `ahp`
--
ALTER TABLE `ahp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `dinas`
--
ALTER TABLE `dinas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `indikator`
--
ALTER TABLE `indikator`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `industri`
--
ALTER TABLE `industri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `matriks_ahp`
--
ALTER TABLE `matriks_ahp`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `nilai_skala`
--
ALTER TABLE `nilai_skala`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penguji`
--
ALTER TABLE `penguji`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `skala`
--
ALTER TABLE `skala`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
