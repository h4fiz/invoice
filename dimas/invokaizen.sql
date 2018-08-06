-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2018 at 07:51 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invokaizen`
--

-- --------------------------------------------------------

--
-- Table structure for table `inv_ppn`
--

CREATE TABLE `inv_ppn` (
  `inv_id` char(10) NOT NULL,
  `tgl_inv` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tgl_t_pembayaran` date NOT NULL,
  `nilai_project` bigint(20) NOT NULL,
  `jumlah_diterima` bigint(20) NOT NULL,
  `perusahaanId` int(10) NOT NULL,
  `kategoriId` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inv_ppn_d`
--

CREATE TABLE `inv_ppn_d` (
  `inv_d_id` int(11) NOT NULL,
  `inv_id` char(10) NOT NULL,
  `nama_project` tinytext NOT NULL,
  `qty` int(11) NOT NULL,
  `unit` varchar(10) NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `kategoriId` int(11) NOT NULL,
  `nama_kategori` varchar(15) NOT NULL,
  `VAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`kategoriId`, `nama_kategori`, `VAT`) VALUES
(1, 'Colo', 10),
(4, 'Other', 10),
(5, 'TMI', 10),
(6, 'Reimbursement C', 0),
(7, 'Reimbursement T', 0),
(8, 'DP', 10),
(9, 'FP', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan`
--

CREATE TABLE `tbl_perusahaan` (
  `perusahaanId` char(10) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perusahaan`
--

INSERT INTO `tbl_perusahaan` (`perusahaanId`, `nama_perusahaan`) VALUES
('001-COROTE', 'PT Corona Telecommunication Service'),
('001-DATALI', 'PT Datalink');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perusahaan_non`
--

CREATE TABLE `tbl_perusahaan_non` (
  `perusahaanNonId` char(12) NOT NULL,
  `nama_perusahaan_non` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perusahaan_non`
--

INSERT INTO `tbl_perusahaan_non` (`perusahaanNonId`, `nama_perusahaan_non`) VALUES
('N-001-PTPASA', 'PT Palka Sarana Utama'),
('N-002-PALSAR', 'PT Palka Sarana Utama');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(35) DEFAULT NULL,
  `user_username` varchar(30) DEFAULT NULL,
  `user_password` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_nama`, `user_username`, `user_password`) VALUES
(3, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inv_ppn`
--
ALTER TABLE `inv_ppn`
  ADD PRIMARY KEY (`inv_id`),
  ADD KEY `perusahaanId` (`perusahaanId`),
  ADD KEY `kategoriId` (`kategoriId`);

--
-- Indexes for table `inv_ppn_d`
--
ALTER TABLE `inv_ppn_d`
  ADD PRIMARY KEY (`inv_d_id`),
  ADD KEY `inv_id` (`inv_id`);

--
-- Indexes for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`kategoriId`);

--
-- Indexes for table `tbl_perusahaan`
--
ALTER TABLE `tbl_perusahaan`
  ADD PRIMARY KEY (`perusahaanId`);

--
-- Indexes for table `tbl_perusahaan_non`
--
ALTER TABLE `tbl_perusahaan_non`
  ADD PRIMARY KEY (`perusahaanNonId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `kategoriId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inv_ppn`
--
ALTER TABLE `inv_ppn`
  ADD CONSTRAINT `inv_ppn_ibfk_2` FOREIGN KEY (`kategoriId`) REFERENCES `tbl_kategori` (`kategoriId`);

--
-- Constraints for table `inv_ppn_d`
--
ALTER TABLE `inv_ppn_d`
  ADD CONSTRAINT `inv_ppn_d_ibfk_1` FOREIGN KEY (`inv_id`) REFERENCES `inv_ppn` (`inv_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
