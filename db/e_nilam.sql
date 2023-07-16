-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 12, 2023 at 03:08 AM
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
  `genre_buku` varchar(100) NOT NULL,
  `bahasa_buku` varchar(100) NOT NULL,
  `penulis_buku` varchar(100) NOT NULL,
  `penerbit_buku` varchar(100) NOT NULL,
  `penerangan_buku` text NOT NULL,
  `bil_pinjaman_buku` int(11) NOT NULL,
  `img_location_buku` varchar(100) NOT NULL,
  `status_buku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `kursus_pelajar` varchar(100) NOT NULL,
  `kohort_pelajar` varchar(100) NOT NULL,
  `status_kelas` int(11) NOT NULL
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
  `achivement` varchar(500) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `bil_bacaan_pelajar` int(11) NOT NULL,
  `bil_pinjaman_pelajar` int(11) NOT NULL,
  `buku_pinjaman_pelajar` varchar(500) NOT NULL,
  `status_pelajar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

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
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `id_pelajar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
