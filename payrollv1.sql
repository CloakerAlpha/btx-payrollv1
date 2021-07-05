-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 05:31 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payrollv1`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_absensi`
--

CREATE TABLE `db_absensi` (
  `no_index` int(11) NOT NULL,
  `namapegawai` varchar(20) NOT NULL,
  `jumlah_harikerja` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `db_absensi`
--

INSERT INTO `db_absensi` (`no_index`, `namapegawai`, `jumlah_harikerja`) VALUES
(1, 'Ali D', 22),
(2, 'Asia S.', 20);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `namapegawai` varchar(40) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `jabatan` varchar(40) NOT NULL,
  `gapok` int(10) NOT NULL,
  `tunjangan` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `gajitotal` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `namapegawai`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `jabatan`, `gapok`, `tunjangan`, `status`, `gajitotal`) VALUES
(10, 'Ali De', 'Lamongan', '2029-08-19', 'P', 'BE', 500000, 500000, 'approved', 956224),
(11, 'Akhmad W', 'Bojonegoro', '2029-08-19', 'L', 'FE', 6000000, 300000, 'approved', 6457820),
(12, 'Arif R', 'Tuban', '2029-08-19', 'L', 'FE', 6000000, 500000, 'pending', 6139682),
(13, 'Sheila A. F.', 'Surabaya', '2029-08-19', 'P', 'FE', 6000000, 500000, 'pending', 6339682),
(14, 'Asia S.', 'Bojonegoro', '2029-08-19', 'P', 'FE', 9000000, 300000, 'pending', 9073023),
(15, 'Ratu R.', 'Lamongan', '2029-08-19', 'P', 'BE', 6000000, 300000, 'pending', 6145682),
(16, 'Andi R.', 'Lamongan', '2029-08-19', 'L', 'FE', 9000000, 300000, 'pending', 9541230),
(17, 'Cahyadi A.', 'Bojonegoro', '2029-08-19', 'L', 'BE', 500000, 500000, 'pending', 982234),
(18, 'Werkudara W.', 'Surabaya', '2029-08-19', 'L', 'BE', 500000, 300000, 'pending', 778890),
(19, 'Gilang A.', 'Bojonegoro', '2029-08-19', 'L', 'BE', 500000, 300000, 'pending', 788234),
(20, 'Afiudan', 'Tuban', '2029-08-19', 'L', 'BE', 6000000, 300000, 'pending', 5945682);

-- --------------------------------------------------------

--
-- Table structure for table `staff_admin`
--

CREATE TABLE `staff_admin` (
  `id_admin` int(4) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `namalengkap` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff_admin`
--

INSERT INTO `staff_admin` (`id_admin`, `username`, `password`, `namalengkap`) VALUES
(1, 'admin', '21232F297A57A5A743894A0E4A801FC3', 'Fakkaru Jabarrohman H.'),
(2, 'supervisor', '1B3231655CEBB7A1F783EDDF27D254CA', 'SuperVisor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_absensi`
--
ALTER TABLE `db_absensi`
  ADD PRIMARY KEY (`no_index`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `staff_admin`
--
ALTER TABLE `staff_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_absensi`
--
ALTER TABLE `db_absensi`
  MODIFY `no_index` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `staff_admin`
--
ALTER TABLE `staff_admin`
  MODIFY `id_admin` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
