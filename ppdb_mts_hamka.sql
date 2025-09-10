-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2025 pada 03.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_mts_hamka`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nama`, `created_at`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', 'Administrator PPDB', '2025-09-08 03:35:27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(11) NOT NULL,
  `no_pendaftaran` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ijazah` decimal(4,2) NOT NULL,
  `status` enum('pending','diterima','ditolak') DEFAULT 'pending',
  `tanggal_daftar` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `no_pendaftaran`, `nama_lengkap`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `alamat`, `nama_ayah`, `nama_ibu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `no_hp`, `asal_sekolah`, `nilai_ijazah`, `status`, `tanggal_daftar`, `updated_at`) VALUES
(1, 'PPDB2025099256', 'syaikul', '0845974867985', 'ponorogo', '2025-09-08', 'L', 'Hindu', '3jhj3h5', 'uifiw', 'jnefjg', 'jeje', 'enbe', '085607899067', 'hbrhw', 80.00, 'ditolak', '2025-09-08 03:42:50', '2025-09-08 07:50:19'),
(2, 'PPDB2025093060', 'syaikul', '0240958385928592525', 'ponorogo', '2025-09-08', 'L', 'Hindu', '3jhj3h5', 'uifiw', 'jnefjg', 'jeje', 'enbe', '085607899067', 'hbrhw', 80.00, 'diterima', '2025-09-08 03:50:49', '2025-09-08 07:47:48'),
(3, 'PPDB2025099027', 'syaikul', '123456789013', 'ponorogo', '2025-09-12', 'L', 'Katolik', '3jhj3h5', 'uifiw', 'jnefjg', 'jeje', 'enbe', '085607899067', 'hbrhw', 88.00, 'diterima', '2025-09-08 04:08:50', '2025-09-08 04:26:01'),
(4, 'PPDB2025090087', 'inam', '12345 67890', 'ponorogo', '2025-09-08', 'L', 'Islam', 'jenangan', 'syaikul', 'intan', 'wiraswasta', 'ibu rumah tangga', '085607899067', 'sd muhammadiyah', 99.99, 'pending', '2025-09-08 07:44:09', '2025-09-08 07:44:09');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_statistik_pendaftaran`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_statistik_pendaftaran` (
`total_pendaftaran` bigint(21)
,`pending` decimal(22,0)
,`diterima` decimal(22,0)
,`ditolak` decimal(22,0)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_statistik_pendaftaran`
--
DROP TABLE IF EXISTS `v_statistik_pendaftaran`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_statistik_pendaftaran`  AS SELECT count(0) AS `total_pendaftaran`, sum(case when `pendaftaran`.`status` = 'pending' then 1 else 0 end) AS `pending`, sum(case when `pendaftaran`.`status` = 'diterima' then 1 else 0 end) AS `diterima`, sum(case when `pendaftaran`.`status` = 'ditolak' then 1 else 0 end) AS `ditolak` FROM `pendaftaran` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`),
  ADD UNIQUE KEY `nisn` (`nisn`),
  ADD KEY `idx_status` (`status`),
  ADD KEY `idx_tanggal_daftar` (`tanggal_daftar`),
  ADD KEY `idx_no_pendaftaran` (`no_pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
