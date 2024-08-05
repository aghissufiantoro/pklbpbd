-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2024 at 04:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bpbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_master_sembako`
--

CREATE TABLE `data_master_sembako` (
  `kode_barang` varchar(256) NOT NULL,
  `nama_barang` varchar(256) NOT NULL,
  `kategori_barang` varchar(256) NOT NULL,
  `satuan_barang` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data_master_sembako`
--

INSERT INTO `data_master_sembako` (`kode_barang`, `nama_barang`, `kategori_barang`, `satuan_barang`) VALUES
('BR0001', 'Sikat Gigi', 'Alat Mandi', 'Unit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_master_sembako`
--
ALTER TABLE `data_master_sembako`
  ADD PRIMARY KEY (`kode_barang`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
