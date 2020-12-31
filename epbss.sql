-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 31, 2020 at 09:00 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epbss`
--

-- --------------------------------------------------------

--
-- Table structure for table `foto_properti`
--

CREATE TABLE `foto_properti` (
  `id_foto` int(11) NOT NULL,
  `id_properti` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `foto_properti`
--

INSERT INTO `foto_properti` (`id_foto`, `id_properti`, `foto`) VALUES
(4, 2, 'galery/P21.png'),
(5, 2, 'galery/P22.png'),
(6, 2, 'galery/P23.png'),
(206, 9, 'galery/P91.png'),
(207, 9, 'galery/P92.png'),
(208, 9, 'galery/P93.png'),
(209, 43, 'galery/P431.png'),
(210, 43, 'galery/P432.png'),
(211, 43, 'galery/P433.png'),
(212, 44, 'galery/P441.png'),
(213, 44, 'galery/P442.png'),
(214, 44, 'galery/P443.png'),
(215, 45, 'galery/P451.png'),
(216, 45, 'galery/P452.png'),
(217, 45, 'galery/P453.png'),
(224, 48, 'galery/P481.png'),
(225, 48, 'galery/P482.png'),
(226, 48, 'galery/P483.png');

-- --------------------------------------------------------

--
-- Table structure for table `informasi_properti`
--

CREATE TABLE `informasi_properti` (
  `id_properti` int(11) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `nama_properti` varchar(40) NOT NULL,
  `jenis_properti` enum('Rumah','Rumah Toko','Rumah Susun','Apartemen') NOT NULL,
  `deskripsi` varchar(1000) NOT NULL,
  `luas` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `furnished` enum('Iya','Tidak') NOT NULL,
  `jml_kamar` int(11) NOT NULL,
  `jml_kmandi` int(11) NOT NULL,
  `acceptable` enum('Iya','Tidak') NOT NULL,
  `tanggal_post` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `informasi_properti`
--

INSERT INTO `informasi_properti` (`id_properti`, `id_pengguna`, `nama_properti`, `jenis_properti`, `deskripsi`, `luas`, `harga`, `alamat`, `furnished`, `jml_kamar`, `jml_kmandi`, `acceptable`, `tanggal_post`) VALUES
(2, 2, 'Cottage Blater 6', 'Rumah', 'Ini rumah yang sangat nyaman!', 12, 200000000, 'Jln. Blater RT 01/ RW 01', 'Iya', 4, 2, 'Iya', '2020-11-29'),
(9, 2, 'Cottage Blater 5', 'Rumah', 'Apakah kamu penasaran dengan rumahku? Aku tinggal di desa simarpinggan, sebuah desa yang cukup terpencil namun memiliki udara yang bersih dan segar. Rumah ku terbuat dari kayu dengan lantai semen yang sederhana\r\n\r\nMemiliki luas sekitar 60 meter persegi, keluargaku membeli rumah ini setengah jadi dari bapak Haji selamet. Sebelumnya kami mengontrak rumah di daerah perkotaan.\r\n\r\n', 32, 500000000, 'Jln. Raya Tokyo 1', 'Iya', 3, 1, 'Iya', '2020-11-29'),
(43, 2, 'Testing', 'Rumah', 'Ini adalah sebuah percobaan', 16, 100000000, 'Jln. Raya Tokyo 1', 'Iya', 4, 2, 'Iya', '2020-11-29'),
(44, 2, 'Tunjung Home', 'Rumah Toko', 'Ini adalah rumah saya!', 16, 200000000, 'Jln. Raya Tokyo 1', 'Iya', 4, 2, 'Iya', '2020-11-29'),
(45, 6, 'Ruko Mewah', 'Rumah Toko', 'Testing', 15, 200000000, 'Jln. Raya Tokyo', 'Iya', 5, 2, 'Iya', '2020-11-29'),
(48, 2, 'Testing 32', 'Rumah', 'Ini adalah contoh', 56, 100000000, 'Jln. Blater RT 01/ RW 01', 'Iya', 4, 2, 'Tidak', '2020-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `password` varchar(10) NOT NULL,
  `level` enum('admin','reguler') NOT NULL,
  `profile_picture` varchar(30) NOT NULL,
  `keadaan` enum('aktif','blokir') NOT NULL,
  `tanggal_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama`, `email`, `no_hp`, `password`, `level`, `profile_picture`, `keadaan`, `tanggal_buat`) VALUES
(1, 'Ferry Darmawan', 'ferrydarmawan.fd@gmail.com', '81226297088', 'qwerty', 'admin', 'profile/1.png', 'aktif', '2020-11-29'),
(2, 'Michael Joe', 'michael.joe@mhs.unsoed.ac.id', '81122223333', 'qwerty', 'reguler', 'profile/2.png', 'aktif', '2020-11-29'),
(3, 'Faiz Aufa', 'faiz.aufa@mhs.unsoed.ac.id', '812678987234', 'qwerty', 'reguler', 'profile/3.png', 'aktif', '2020-11-29'),
(4, 'Astolfo', 'astolfo@gmail.com', '1234', 'qwerty', 'reguler', 'pictures/profile_picture.png', 'aktif', '2020-11-29'),
(5, 'Zein', 'zein@gmail.com', '8126789010', 'qwerty', 'reguler', 'pictures/profile_picture.png', 'blokir', '2020-11-29'),
(6, 'John Wick', 'john.wick@mhs.unsoed.ac.id', '821678123446', 'qwerty', 'reguler', 'pictures/profile_picture.png', 'aktif', '2020-11-29'),
(7, 'Michael De Santa', 'de.santa@gmail.com', '87990781234', 'qwerty', 'reguler', 'pictures/profile_picture.png', 'aktif', '2020-12-10'),
(8, 'Sakuragi Hanamichi', 'sakuragi.hanamichi@mhs.unsoed.ac.id', '890123678', 'qwerty', 'reguler', 'pictures/profile_picture.png', 'aktif', '2020-12-10'),
(9, 'Hendra Jauhar', 'hendra.jauhar@mhs.unsoed.ac.id', '8976123789', 'qwerty', 'reguler', 'pictures/profile_picture.png', 'aktif', '2020-12-10'),
(10, 'Jambia Anhar', 'jambia.anhar@mhs.unsoed.ac.id', '89012345678', 'qwerty', 'reguler', 'pictures/profile_picture.png', 'aktif', '2020-12-10'),
(11, 'Muhammad Pascal Rahmadi', 'muhammad.rahmadi@gmail.com', '9090990', 'qwerty', 'reguler', 'profile/11.png', 'aktif', '2020-12-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foto_properti`
--
ALTER TABLE `foto_properti`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `fk_properti` (`id_properti`);

--
-- Indexes for table `informasi_properti`
--
ALTER TABLE `informasi_properti`
  ADD PRIMARY KEY (`id_properti`),
  ADD KEY `fk_pengguna` (`id_pengguna`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foto_properti`
--
ALTER TABLE `foto_properti`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `informasi_properti`
--
ALTER TABLE `informasi_properti`
  MODIFY `id_properti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `foto_properti`
--
ALTER TABLE `foto_properti`
  ADD CONSTRAINT `fk_properti` FOREIGN KEY (`id_properti`) REFERENCES `informasi_properti` (`id_properti`);

--
-- Constraints for table `informasi_properti`
--
ALTER TABLE `informasi_properti`
  ADD CONSTRAINT `fk_pengguna` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
