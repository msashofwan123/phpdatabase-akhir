-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 05:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apoteker`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataobat`
--

CREATE TABLE `dataobat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `khasiat` varchar(255) NOT NULL,
  `dosis` varchar(255) NOT NULL,
  `izin` bigint(20) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dataobat`
--

INSERT INTO `dataobat` (`id`, `nama`, `khasiat`, `dosis`, `izin`, `golongan`, `file`) VALUES
(15, 'Jus Jeruk', 'Menyegarkan Mulut Pasca Kuliner', '1 Gelas Per Makan', 0, 'Obat Bebas', 'Jus Jeruk.png'),
(16, 'Amoxicillin', 'Obat Segalanya', '13mg', 12312312, 'Obat Bebas Terbatas', 'Amoxilillin.png'),
(17, 'Betadine', 'Melukai', '1 tetes per menit', 0, 'Obat Wajib Apotek', 'Betadine.png'),
(18, 'Buah Buahan', 'Pengganti Gula', '1 buah', 132123123123, 'Obat Bebas Terbatas', 'Buah-Buahan.png'),
(19, 'Corona', 'Pandemi', '2 orang / jam', 121212, 'Obat Keras', 'corona.png'),
(20, 'Ganja', 'Obat Segalanya', '2 gram', 0, 'Obat Herbal', 'Ganja.png'),
(21, 'Heroin', 'Fly', '121221', 12312312, 'Obat Herbal', 'Heroin.png'),
(22, 'Infus', 'Pengganti Makan', '12,5 mg', 12345, 'Obat Wajib Apotek', 'Infus.png'),
(23, 'Paracetamol', 'Obat Segalanya', '123123', 12312412234, 'Obat Wajib Apotek', 'Paracetamol.png'),
(24, 'Racun', 'Pengganti Gula', '121221', 12345, 'Obat Keras', 'racun.png'),
(25, 'Salep', 'Obat Luar', '121221', 12312312, 'Obat Herbal', 'Salep.png'),
(26, 'Vaksin', 'Biar BIsa Jalan2', '13mg', 231312, 'Obat Herbal', 'Vaksin.png'),
(27, 'Virus', 'Mengurangi Makan', '2131321', 1212, 'Obat Keras', 'virus.png'),
(35, 'Ahmad Arkan Sajaka', 'Makan NAsi padang', '12,56,12,121,12,', 0, 'Obat Keras', 'Betadine.png'),
(36, 'Fadhfayi Athallah', 'Pengganti Gula', '232', 132123123123, 'Obat Bebas', 'Betadine.png'),
(37, 'Ganja', 'Obat Segalanya', '3Kg perhari', 0, 'Obat Bebas', 'Ganja.png');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `email`, `password`, `status`) VALUES
(1, 'shofwan', 'msashofwan123@gmail.com', 'shofwan', 0),
(2, 'admin', 'admin@admin.com', 'admin', 1),
(5, 'rendi', 'rendi@rendi.com', 'rendi', 0),
(6, 'admin123', '', 'admin', 0),
(8, 'setan', '', 'setan123', 0),
(9, 'fayi', 'fayi@jamil.com', 'fayi123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `statusobat`
--

CREATE TABLE `statusobat` (
  `id` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `statusobat`
--

INSERT INTO `statusobat` (`id`, `id_obat`, `id_stok`) VALUES
(29, 35, 2),
(31, 36, 1),
(33, 15, 1),
(34, 16, 1),
(35, 17, 4),
(36, 18, 4),
(37, 19, 4),
(38, 20, 1),
(39, 21, 1),
(40, 22, 4),
(41, 23, 2),
(42, 24, 1),
(43, 25, 2),
(44, 26, 4),
(45, 27, 1),
(46, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stokobat`
--

CREATE TABLE `stokobat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stokobat`
--

INSERT INTO `stokobat` (`id`, `name`) VALUES
(1, 'Tersedia'),
(2, 'Stok Habis'),
(3, 'Stop Produksi'),
(4, 'Dalam Pengiriman');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataobat`
--
ALTER TABLE `dataobat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `statusobat`
--
ALTER TABLE `statusobat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_dataobat` (`id_obat`),
  ADD KEY `fk_id_stokobat` (`id_stok`);

--
-- Indexes for table `stokobat`
--
ALTER TABLE `stokobat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataobat`
--
ALTER TABLE `dataobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `statusobat`
--
ALTER TABLE `statusobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `stokobat`
--
ALTER TABLE `stokobat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `statusobat`
--
ALTER TABLE `statusobat`
  ADD CONSTRAINT `fk_id_dataobat` FOREIGN KEY (`id_obat`) REFERENCES `dataobat` (`id`),
  ADD CONSTRAINT `fk_id_stokobat` FOREIGN KEY (`id_stok`) REFERENCES `stokobat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
