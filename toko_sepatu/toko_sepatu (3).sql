-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2024 at 02:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_sepatu`
--

-- --------------------------------------------------------

--
-- Table structure for table `beli`
--

CREATE TABLE `beli` (
  `idbeli` int(11) NOT NULL,
  `idsepatu` int(11) NOT NULL,
  `namasepatu` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `deskripsi` varchar(200) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `beli`
--

INSERT INTO `beli` (`idbeli`, `idsepatu`, `namasepatu`, `deskripsi`, `harga`, `jumlah`) VALUES
(35, 29, 'Jordan 1 High OG Heritage GS', 'Air Jordan 1 High OG Heritage GS hadir untuk anak-anak dengan desain klasik yang terinspirasi dari warisan besar merek Jordan.', 2500000, 1),
(36, 33, 'Nike Vomero 5 Metallic Silver Blue Tint Womens', 'Nike Air Zoom Vomero 5 ‘Metallic Silver Blue Tint’ menghadirkan kombinasi teknologi canggih dan desain stylish untuk pengalaman lari yang optimal.', 2400000, 4),
(37, 38, 'Adidas Handball Spezial Green Pink Velvet Womens', 'Adidas, Adidas Spezial, Womens Collection', 2000000, 1),
(38, 38, 'Adidas Handball Spezial Green Pink Velvet Womens', 'Adidas, Adidas Spezial, Womens Collection', 2000000, 1),
(39, 42, 'Nike Sacai Waffle Fragment Grey', 'Nike Sacai Waffle Fragment Grey adalah kolaborasi epik yang menghadirkan desain ikonik dengan twist modern.', 8500000, 2),
(40, 44, 'Dunk Low Veneer 2024', 'Dunk Low Veneer 2024 aaa', 2000000, 5);

--
-- Triggers `beli`
--
DELIMITER $$
CREATE TRIGGER `ambilsepatu` AFTER INSERT ON `beli` FOR EACH ROW BEGIN
UPDATE sepatu set stok = stok - NEW.jumlah
WHERE idsepatu = NEW.idsepatu;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sepatu`
--

CREATE TABLE `sepatu` (
  `idsepatu` int(11) NOT NULL,
  `image` varchar(30) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `namasepatu` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sepatu`
--

INSERT INTO `sepatu` (`idsepatu`, `image`, `namasepatu`, `deskripsi`, `harga`, `stok`) VALUES
(28, 'j11.jpg', 'Jordan 1 Low Iron Grey Men', 'Jordan 1 Low Iron Grey Men menghadirkan sentuhan modern pada siluet klasik Air Jordan 1 Low, menjadi pilihan sempurna untuk penggemar sneaker.', 2000000, 15),
(29, 'th.jpg', 'Jordan 1 High OG Heritage GS', 'Air Jordan 1 High OG Heritage GS hadir untuk anak-anak dengan desain klasik yang terinspirasi dari warisan besar merek Jordan.', 2500000, 16),
(33, 'vomero.jpeg', 'Nike Vomero 5 Metallic Silver Blue Tint Womens', 'Nike Air Zoom Vomero 5 ‘Metallic Silver Blue Tint’ menghadirkan kombinasi teknologi canggih dan desain stylish untuk pengalaman lari yang optimal.', 2400000, 16),
(35, 'nb327.jpeg', 'New Balance 327 Moonbeam Stone Pink Womens', 'New Balance 327 Moonbeam Stone Pink adalah sneakers wanita yang memadukan desain vintage dengan sentuhan modern.', 1800000, 40),
(37, 'th.jpeg', 'Dunk Low University Blue UNC GS', 'Nike Dunk Low University Blue UNC adalah perpaduan sempurna antara gaya kasual dan elegan. Upper berbahan kulit dengan warna putih dan biru khas UNC menciptakan tampilan minimalis yang ikonik.', 2300000, 12),
(38, 'th (1).jpeg', 'Adidas Handball Spezial Green Pink Velvet Womens', 'Adidas, Adidas Spezial, Womens Collection', 2000000, 28),
(39, 'nike Lim.jpeg', 'Air Force 1 Low Louis Vuitton White Royal', 'Nike Air Force 1 Low Louis Vuitton White Royal adalah hasil kolaborasi prestisius antara Nike dan Louis Vuitton untuk merayakan 40 tahun Air Force 1.', 150000000, 1),
(40, 'nike lim1.jpg', 'Air Force 1 Low Louis Vuitton White Green', 'Nike Air Force 1 Low Louis Vuitton White Green adalah kolaborasi prestisius antara Nike dan Louis Vuitton, yang dirancang oleh mendiang Virgil Abloh untuk merayakan 40 tahun ikoniknya Air Force 1.', 130000000, 2),
(42, 'nike sacai.jpg', 'Nike Sacai Waffle Fragment Grey', 'Nike Sacai Waffle Fragment Grey adalah kolaborasi epik yang menghadirkan desain ikonik dengan twist modern.', 8500000, 8),
(44, 'Dunk Low Veneer 2024.jpeg', 'Dunk Low Veneer 2024', 'Dunk Low Veneer 2024 aaa', 2000000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beli`
--
ALTER TABLE `beli`
  ADD PRIMARY KEY (`idbeli`);

--
-- Indexes for table `sepatu`
--
ALTER TABLE `sepatu`
  ADD PRIMARY KEY (`idsepatu`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beli`
--
ALTER TABLE `beli`
  MODIFY `idbeli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `sepatu`
--
ALTER TABLE `sepatu`
  MODIFY `idsepatu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
