-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 10:31 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sewalapangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(20) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idadmin`, `password`, `nama`, `username`) VALUES
(2, 'admin', 'Admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idjadwal` int(20) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `idlapangan` int(20) DEFAULT NULL,
  `jam` varchar(20) DEFAULT NULL,
  `durasi` int(20) DEFAULT NULL,
  `hargasewa` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idjadwal`, `tanggal`, `idlapangan`, `jam`, `durasi`, `hargasewa`) VALUES
(112, '2020-05-25', 1, '12:00', 5, 35000),
(113, '2020-05-30', 1, '12:00', 3, 30000),
(114, '2020-05-29', 1, '12:00', 2, 25000),
(115, '2020-05-30', 3, '11:00', 2, 25000),
(116, '2020-05-30', 2, '13:00', 3, 30000);

-- --------------------------------------------------------

--
-- Table structure for table `lapangan`
--

CREATE TABLE `lapangan` (
  `idlapangan` int(20) NOT NULL,
  `nolapangan` int(20) DEFAULT NULL,
  `namalapangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lapangan`
--

INSERT INTO `lapangan` (`idlapangan`, `nolapangan`, `namalapangan`) VALUES
(1, 5, 'Cendrawasih'),
(2, 1, 'Camar'),
(3, 2, 'Bangau');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(20) NOT NULL,
  `metode` varchar(20) DEFAULT 'Belum diproses',
  `nominal` int(20) DEFAULT 0,
  `status` varchar(20) DEFAULT 'Belum diproses',
  `idpesanan` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `metode`, `nominal`, `status`, `idpesanan`) VALUES
(59, 'Minimarket', 38000, 'LUNAS', 95),
(60, 'Belum diproses', 0, 'Belum diproses', 96),
(61, 'Belum diproses', 0, 'Belum diproses', 97),
(62, 'Belum diproses', 0, 'Belum diproses', 98),
(63, 'Tunai', 32000, 'LUNAS', 99);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `waktupesan` datetime DEFAULT NULL,
  `iduser` int(20) DEFAULT NULL,
  `idjadwal` int(20) DEFAULT NULL,
  `idpesanan` int(20) NOT NULL,
  `statuspesan` varchar(30) DEFAULT 'Menunggu Konfirmasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`waktupesan`, `iduser`, `idjadwal`, `idpesanan`, `statuspesan`) VALUES
('2020-05-23 18:45:13', 44, 112, 95, 'LUNAS'),
('2020-05-27 17:53:25', 44, 113, 96, 'Menunggu Konfirmasi'),
('2020-05-29 10:07:36', 44, 114, 97, 'Menunggu Konfirmasi'),
('2020-05-29 10:08:34', 45, 115, 98, 'Menunggu Konfirmasi'),
('2020-05-30 14:08:54', 46, 116, 99, 'LUNAS');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `iduser` int(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `jk` varchar(20) DEFAULT NULL,
  `notelp` varchar(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`iduser`, `email`, `password`, `nama`, `jk`, `notelp`) VALUES
(44, 'user', 'user', 'Mohammad Nurfaizy', 'Laki-Laki', ''),
(45, 'user1', 'user1', 'FAIZ PANGESTU', 'Laki-Laki', NULL),
(46, 'user@user.com', 'user123', 'FAIZ', 'Laki-Laki', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idjadwal`),
  ADD KEY `fk_idlapangan` (`idlapangan`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`idlapangan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`),
  ADD UNIQUE KEY `idpesanan` (`idpesanan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`idpesanan`),
  ADD KEY `fk_iduser` (`iduser`),
  ADD KEY `fk_idjadwal` (`idjadwal`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idjadwal` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `idlapangan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `idpesanan` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_idlapangan` FOREIGN KEY (`idlapangan`) REFERENCES `lapangan` (`idlapangan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_idpesanan` FOREIGN KEY (`idpesanan`) REFERENCES `pemesanan` (`idpesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `fk_idjadwal` FOREIGN KEY (`idjadwal`) REFERENCES `jadwal` (`idjadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_iduser` FOREIGN KEY (`iduser`) REFERENCES `user` (`iduser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
