-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2022 at 03:36 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `online_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kat` int(11) NOT NULL,
  `nm_kat` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nm_kat`) VALUES
(7, 'Minuman');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE IF NOT EXISTS `keranjang` (
`id_keranjang` int(11) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE IF NOT EXISTS `konfirmasi` (
`id_konf` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `customer` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konf`, `nama`, `bank`, `nominal`, `invoice`, `customer`, `bukti`, `tanggal`) VALUES
(5, 'Sulaiman', 'BRI', '25000.00', '20220614114318', 3, 'images.png', '2022-06-14 16:47:12'),
(6, 'Sultan', 'MANDIRI', '75000.00', '20220614125301', 3, 'logo-baru_201007084651-572.png', '2022-06-14 17:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pel` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(18) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `user`, `password`, `nama`, `email`, `telp`, `alamat`, `role`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Nurhidayat', 'yyaayyaatt@gmail.com', '086564546546', 'Tegal', 'admin'),
(3, 'customer', '827ccb0eea8a706c4c34a16891f84e7b', 'Member', 'yyaayyaatt@gmail.com', '086564546546', 'Tegal', 'member');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(500) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `harga_disc` decimal(12,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `ket`, `kategori`, `harga`, `foto1`, `rate`, `harga_disc`) VALUES
(15, 'Wedang Uwuh', 'Wedang uwuh bisa untuk mengobatin masuk angin dan menghangatkan tubuh dari dalam, dengan bahan rempah yang berkualitas.', '7', '25000.00', 'wedang uwuh.jpg', 0, '0.00'),
(16, 'Jahe Merah', 'Jahe merah bisa untuk mengobatin masuk angin dan menghangatkan tubuh dari dalam, dengan bahan rempah yang berkualitas.', '7', '25000.00', 'jahe merah.jpg', 0, '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
`no` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `pelanggan` varchar(20) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no`, `invoice`, `tanggal`, `pelanggan`, `total`, `status`) VALUES
(11, '20220614113052', '2022-06-14', '1', '25000.00', 'Menunggu Pembayaran'),
(12, '20220614113128', '2022-06-14', '1', '25000.00', 'Menunggu Pembayaran'),
(13, '20220614113314', '2022-06-14', '1', '25000.00', 'Menunggu Pembayaran'),
(14, '20220614113331', '2022-06-14', '1', '25000.00', 'Menunggu Pembayaran'),
(15, '20220614114318', '2022-06-14', '3', '25000.00', 'Selesai'),
(20, '20220614125301', '2022-06-14', '3', '75000.00', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE IF NOT EXISTS `transaksi_detail` (
`id_detail` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(12,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `invoice`, `id_produk`, `nama`, `qty`, `harga`) VALUES
(2, '20220614114318', '15', 'Wedang Uwuh', 1, '25000.00'),
(5, '20220614125301', '15', 'Wedang Uwuh', 1, '25000.00'),
(6, '20220614125301', '15', 'Wedang Uwuh', 1, '25000.00'),
(7, '20220614125301', '16', 'Jahe Merah', 1, '25000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kat`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
 ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
 ADD PRIMARY KEY (`id_konf`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pel`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
 ADD PRIMARY KEY (`no`);

--
-- Indexes for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
 ADD PRIMARY KEY (`id_detail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
MODIFY `id_konf` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
MODIFY `no` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
