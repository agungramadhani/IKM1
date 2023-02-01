-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 03:27 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sipuas`
--

-- --------------------------------------------------------

--
-- Table structure for table `parameter`
--

CREATE TABLE IF NOT EXISTS `parameter` (
  `kode_parameter` varchar(10) NOT NULL,
  `parameter` varchar(255) NOT NULL,
  `id_preference` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parameter`
--

INSERT INTO `parameter` (`kode_parameter`, `parameter`, `id_preference`, `type`, `status`) VALUES
('1', 'Bagaimana pemahaman anda tentang kemudahan prosedur pelayanan di unit ini', 'Kemudahan', 'Option', 1),
('2', 'Ini Pertanyaan', 'Pertanyaan', 'Option', 1),
('3', 'COBAKKKK', 'SU', 'Option', 0),
('9', 'Kritik dan Saran', '', 'textarea', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pref`
--

CREATE TABLE IF NOT EXISTS `pref` (
  `id_preference` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pref`
--

INSERT INTO `pref` (`id_preference`, `value`, `nilai`) VALUES
('Kemudahan', 'Tidak Mudah', 1),
('Kemudahan', 'Mudah', 2),
('Kemudahan', 'Kurang Mudah', 3),
('Kemudahan', 'Sangat Mudah', 4),
('Entry', '', 0),
('Pertanyaan', '1', 1),
('Pertanyaan', '2', 2),
('Pertanyaan', '3', 3),
('Pertanyaan', '4', 4),
('SU', 'Q', 1),
('SU', 'W', 2),
('SU', 'E', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`idAdmin` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `fullname` varchar(64) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `lastIp` varchar(16) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`idAdmin`, `username`, `password`, `email`, `fullname`, `lastLogin`, `lastIp`) VALUES
(1, 'administrator', '$2y$10$iIi.v.KJb5B9HmYcW.xWcuobv.W6GsRTPU3iK7SR/82ciVriOuQRW', 'admin@gmail.com', 'Administrator', '2023-01-24 12:11:57', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id_transaksi` varchar(10) NOT NULL,
  `id_visit` varchar(10) NOT NULL,
  `kode_parameter` varchar(10) NOT NULL,
  `id` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_visit`, `kode_parameter`, `id`, `value`) VALUES
('RSP-0001', 'USR0001', '1', '', 'Tidak Mudah'),
('RSP-0002', 'USR0001', '2', '', '1'),
('RSP-0003', 'USR0001', '3', '', 'Q'),
('RSP-0004', 'USR0001', '9', '', ' yhf'),
('RSP-0005', 'USR0002', '1', '', 'Mudah'),
('RSP-0006', 'USR0002', '2', '', '1'),
('RSP-0007', 'USR0002', '3', '', 'W'),
('RSP-0008', 'USR0002', '9', '', ' yhfasf'),
('RSP-0009', 'USR0003', '1', '', 'Tidak Mudah'),
('RSP-0010', 'USR0003', '2', '', '1'),
('RSP-0011', 'USR0003', '9', '', ' yfify');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `id_visit` varchar(8) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `umur` varchar(50) NOT NULL,
  `jenkel` enum('Laki-Laki','Perempuan','','') NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `no_pol` varchar(50) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`id_visit`, `nik`, `nama`, `alamat`, `umur`, `jenkel`, `instansi`, `keperluan`, `no_pol`, `date_created`) VALUES
('USR0001', '123123', 'Ilham', 'jember', '23', 'Laki-Laki', 'PT Sentosa', 'Menemui seseorang', 'P0000XZ', '2023-01-23 19:40:39'),
('USR0002', '32322323', 'Maxi', 'Mojokerto', '24', 'Perempuan', 'PT Sentosaa2', 'Menemui seseorang direktur', 'S000XZ', '2023-01-23 19:41:47'),
('USR0003', '35353535', 'Made', 'Jember', '23', 'Laki-Laki', 'PT Agung Wilis', 'Membuat surat', 'P 000 tt', '2023-01-24 02:45:45'),
('USR0004', '3232232312', 'Suryo', 'jember', '24', 'Laki-Laki', 'PT Agung Wilis', 'Menemui seseorang direktur', 'P 00202 tt', '2023-01-24 09:52:04'),
('USR0005', '351010', 'bejo', 'Lamongan', '24', 'Laki-Laki', 'PT Mayo', 'Memberikan Penawaran', 'P 234 XC', '2023-01-24 10:31:31'),
('USR0006', '32322323', 'Lukman', 'jember', '24', 'Laki-Laki', 'PT Mayo', 'Membuat surat', 'P 0002 tt', '2023-01-24 10:37:03'),
('USR0007', '11212121', 'YAIS', 'Jl. yos sudarso rw 04 rt04 kel.kraksaan wetan, kec.kraksaan', '12', 'Laki-Laki', 'SABIN', 'Gaktau', 'N4444L', '2023-01-24 10:44:14'),
('USR0008', '356111', 'ikhsan', 'surabaya', '40', 'Laki-Laki', 'mulya abadi', 'testing', 'tidak perlu', '2023-01-24 11:36:56'),
('USR0009', '3512314301299', 'Agung', 'Kraksaan', '24', 'Laki-Laki', 'PT Agung', 'CheckUp', 'jl', '2023-01-29 23:18:12');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_kuisioner`
--
CREATE TABLE IF NOT EXISTS `v_kuisioner` (
`kode_parameter` varchar(10)
,`parameter` varchar(255)
,`id_preference` varchar(255)
,`type` varchar(255)
,`status` int(11)
,`value` varchar(255)
,`nilai` int(11)
);
-- --------------------------------------------------------

--
-- Structure for view `v_kuisioner`
--
DROP TABLE IF EXISTS `v_kuisioner`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_kuisioner` AS select `p`.`kode_parameter` AS `kode_parameter`,`p`.`parameter` AS `parameter`,`p`.`id_preference` AS `id_preference`,`p`.`type` AS `type`,`p`.`status` AS `status`,`pr`.`value` AS `value`,`pr`.`nilai` AS `nilai` from (`parameter` `p` left join `pref` `pr` on((`p`.`id_preference` = `pr`.`id_preference`))) where (`p`.`status` = 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parameter`
--
ALTER TABLE `parameter`
 ADD PRIMARY KEY (`kode_parameter`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
 ADD PRIMARY KEY (`id_visit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
