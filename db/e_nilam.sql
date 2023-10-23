-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2023 at 09:54 AM
-- Server version: 10.11.3-MariaDB
-- PHP Version: 8.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_nilam`
--

-- --------------------------------------------------------

--
-- Table structure for table `achivement`
--

CREATE TABLE `achivement` (
  `id_achivement` int(11) NOT NULL,
  `nama_achivement` varchar(100) NOT NULL,
  `type_achivement` varchar(100) NOT NULL,
  `limit_achivement` varchar(100) NOT NULL,
  `img_location_achivement` varchar(100) NOT NULL,
  `status_achivement` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `tajuk_buku` varchar(100) NOT NULL,
  `id_genre` varchar(100) NOT NULL,
  `bahasa_buku` varchar(100) NOT NULL,
  `penulis_buku` varchar(100) NOT NULL,
  `penerbit_buku` varchar(100) NOT NULL,
  `penerangan_buku` text NOT NULL,
  `bil_pinjaman_buku` int(11) NOT NULL DEFAULT 0,
  `img_location_buku` varchar(100) NOT NULL,
  `status_buku` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id_genre` int(11) NOT NULL,
  `nama_genre` varchar(100) NOT NULL,
  `status_genre` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id_genre`, `nama_genre`, `status_genre`) VALUES
(1, 'Fiction', '1'),
(2, 'Mystery', '1'),
(3, 'Fantasy', '1'),
(4, 'Romance', '1'),
(5, 'Biography', '1'),
(6, 'Poetry', '1'),
(7, 'Self Help', '1'),
(8, 'Fairy Tale', '1'),
(9, 'Science Fiction', '1'),
(10, 'Horror', '1'),
(11, 'Literary Fiction', '1'),
(12, 'Literature', '1'),
(13, 'Action Fiction', '1'),
(14, 'Science Fantasy', '1');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kursus_pelajar` varchar(100) NOT NULL,
  `kohort_pelajar` varchar(100) NOT NULL,
  `status_kelas` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `kursus_pelajar`, `kohort_pelajar`, `status_kelas`) VALUES
(1, '2 KPD', 'KPD', '2022', 1),
(2, '2 HSK', 'HSK', '2022', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nilam`
--

CREATE TABLE `nilam` (
  `id_nilam` int(11) NOT NULL,
  `tajuk_bahan` varchar(100) NOT NULL,
  `tarikh_bacaan` date NOT NULL,
  `bahasa_bahan` varchar(100) NOT NULL,
  `jenis_bahan` varchar(100) NOT NULL,
  `genre_buku` varchar(100) DEFAULT NULL,
  `jenis_buku` int(11) DEFAULT NULL,
  `bil_mukasurat_buku` varchar(50) DEFAULT NULL,
  `katergori_bahan` int(10) DEFAULT NULL,
  `cara_penyampaian_bahan` varchar(100) DEFAULT NULL,
  `ringkasan_bahan` varchar(100) NOT NULL,
  `id_pelajar` varchar(100) NOT NULL,
  `status_permohonan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `id_pelajar` int(11) NOT NULL,
  `ic_pelajar` varchar(20) NOT NULL,
  `no_kad_pelajar` varchar(20) NOT NULL,
  `nama_pelajar` varchar(100) NOT NULL,
  `achivement` varchar(500) DEFAULT NULL,
  `id_kelas` int(11) DEFAULT NULL,
  `bil_bacaan_pelajar` int(11) NOT NULL DEFAULT 0,
  `bil_pinjaman_pelajar` int(11) NOT NULL DEFAULT 0,
  `buku_pinjaman_pelajar` varchar(500) DEFAULT NULL,
  `status_pelajar` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`id_pelajar`, `ic_pelajar`, `no_kad_pelajar`, `nama_pelajar`, `achivement`, `id_kelas`, `bil_bacaan_pelajar`, `bil_pinjaman_pelajar`, `buku_pinjaman_pelajar`, `status_pelajar`) VALUES
(1, '060820100301', '0004430775', 'DANIAL IRFAN BIN ZAKARIA', NULL, 1, 0, 0, NULL, 1),
(2, '060109140707', '0004440972', 'AZHAN ADLI BIN MOHD BORHAN', NULL, 1, 0, 0, '0', 1),
(3, '060312100911', '00054292943', 'ADAM MUKHRIZ BIN MUHAMMAD JALIL SAYUTY', NULL, 1, 0, 0, '0', 1),
(6, '060924101747', '00300450340', 'HAZWAN HAIKAL BIN HAIZAM IRWAN', NULL, 1, 0, 0, '0', 1),
(7, '061128050138', '', 'AINUR QISTINA PUTRI BINTI Q HISHAM', NULL, 2, 0, 0, '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `tarikh_permohonan` date NOT NULL,
  `tarikh_hantar` date NOT NULL,
  `id_pelajar` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `status_permohonan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perpustakawan`
--

CREATE TABLE `perpustakawan` (
  `id_perpustakawan` int(11) NOT NULL,
  `nama_perpustakawan` varchar(100) NOT NULL,
  `password_perpustakawan` varchar(200) NOT NULL,
  `status_perpustakawan` varchar(100) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perpustakawan`
--

INSERT INTO `perpustakawan` (`id_perpustakawan`, `nama_perpustakawan`, `password_perpustakawan`, `status_perpustakawan`) VALUES
(17, 'admin', '$2y$10$rHlSNZyLw2.zGc/0kcL60eFcq3hqFCXyMJ3AyIpdOacVqKpKQSpdG', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achivement`
--
ALTER TABLE `achivement`
  ADD PRIMARY KEY (`id_achivement`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id_genre`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `nilam`
--
ALTER TABLE `nilam`
  ADD PRIMARY KEY (`id_nilam`);

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`id_pelajar`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indexes for table `perpustakawan`
--
ALTER TABLE `perpustakawan`
  ADD PRIMARY KEY (`id_perpustakawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achivement`
--
ALTER TABLE `achivement`
  MODIFY `id_achivement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id_genre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilam`
--
ALTER TABLE `nilam`
  MODIFY `id_nilam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `id_pelajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `perpustakawan`
--
ALTER TABLE `perpustakawan`
  MODIFY `id_perpustakawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
