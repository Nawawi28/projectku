-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2023 at 03:50 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antriannnn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(234) NOT NULL,
  `password` varchar(233) NOT NULL,
  `nik` int(23) NOT NULL,
  `no_telepon` int(20) NOT NULL,
  `date_created` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `nik`, `no_telepon`, `date_created`, `image`) VALUES
(15, 'asyiknawawi', '$2y$10$Mm3rYDs8ArMZPoAmqqvaTeS0o3CMxbLmnv2ZKWtan5/htATs0I4q.', 123, 2147483647, 1691068659, 'imresizer-16904521539651.jpg'),
(16, 'nawa', '$2y$10$nib4pGfSidhtOHqb9uhZaOwc.d7EJ35SL94Sko5L4DRnXk8NrqBAq', 2147483647, 838617, 1691412883, 'semestet_4_page-0001.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `nomor_antrian` varchar(20) NOT NULL,
  `tanggal_antrian` date NOT NULL,
  `status_antrian` enum('MENUNGGU','MASUK','SELESAI') NOT NULL DEFAULT 'MENUNGGU'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `id_supplier`, `nomor_antrian`, `tanggal_antrian`, `status_antrian`) VALUES
(165, 168, '1', '2023-09-18', 'SELESAI'),
(169, 172, '2', '2023-09-18', 'SELESAI'),
(170, 173, '3', '2023-09-18', 'MENUNGGU'),
(171, 174, '4', '2023-09-18', 'MENUNGGU'),
(172, 175, '5', '2023-09-18', 'MENUNGGU'),
(173, 176, '1', '2023-09-27', 'MENUNGGU'),
(174, 177, '1', '2023-10-01', 'MENUNGGU'),
(175, 178, '2', '2023-10-01', 'MENUNGGU'),
(176, 179, '1', '2023-10-03', 'MASUK'),
(177, 180, '2', '2023-10-03', 'MENUNGGU'),
(178, 181, '3', '2023-10-03', 'MENUNGGU'),
(179, 182, '4', '2023-10-03', 'MENUNGGU'),
(180, 183, '5', '2023-10-03', 'MENUNGGU'),
(181, 184, '6', '2023-10-03', 'MASUK'),
(182, 185, '7', '2023-10-03', 'MENUNGGU'),
(183, 186, '8', '2023-10-03', 'MENUNGGU'),
(184, 187, '9', '2023-10-03', 'MENUNGGU'),
(185, 188, '1', '2023-10-05', 'MENUNGGU');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `jumlah_surat_jalan` int(123) NOT NULL,
  `keterangan` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telepon`, `tanggal_daftar`, `jumlah_surat_jalan`, `keterangan`) VALUES
(168, 'asyik nawawi', '083861770124', '2023-09-18', 2, 'aman'),
(172, 'asyik ', '083861770124', '2023-09-18', 2, 'aman'),
(173, 'asyik ', '083861770124', '2023-09-18', 2, 'aman'),
(174, 'asyik ', '083861770124', '2023-09-18', 2, 'aman'),
(175, 'asyik ', '083861770124', '2023-09-18', 2, 'aman'),
(176, 'asyik naw', '083861770124', '2023-09-27', 1448787, 'lengkap'),
(177, '', '', '2023-10-01', 0, ''),
(178, 'zsdfae', '', '2023-10-01', 0, ''),
(179, 'arfa', 'ag', '2023-10-03', 0, 'afg'),
(180, 'arfa', 'ag', '2023-10-03', 0, 'afg'),
(181, '', '', '2023-10-03', 0, ''),
(182, 'asyik nawawi', '083861770124', '2023-10-03', 1448787, 'wdqed'),
(183, 'asyik nawawi', '083861770124', '2023-10-03', 1448787, 'wdqed'),
(184, 'asyik nawawi', '083861770124', '2023-10-03', 144, 's'),
(185, 'asyik nawawi', '083861770124', '2023-10-03', 1448787, 'favf'),
(186, 'asyik nawawi', '083861770124', '2023-10-03', 144, 'agrfsdf'),
(187, 'asyik nawawi', '083861770124', '2023-10-03', 243, 'aefdf'),
(188, 'asyik nawawi', '083861770124', '2023-10-05', 1448787, 'lenkap\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD UNIQUE KEY `id_pelanggan` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
