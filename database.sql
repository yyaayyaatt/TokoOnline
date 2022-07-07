-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2022 at 08:07 PM
-- Server version: 10.3.35-MariaDB-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grir5245_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` bigint(20) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `tanggal` varchar(30) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `id_tujuan` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_pelanggan`, `pesan`, `tanggal`, `status`, `id_tujuan`) VALUES
(7, 1, 'tes', '2022-07-05, 04:16 am', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kat` int(11) NOT NULL,
  `nm_kat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kat`, `nm_kat`) VALUES
(7, 'Wedang'),
(8, 'Jahe'),
(9, 'Temulawak'),
(10, 'Kopi'),
(11, 'Kunyit');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `qty` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `qty`, `pelanggan`) VALUES
(33, '16', 1, 5),
(34, '16', 1, 5),
(52, '16', 1, 3),
(58, '17', 1, 3),
(63, '16', 1, 1),
(66, '17', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi`
--

CREATE TABLE `konfirmasi` (
  `id_konf` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(20) NOT NULL,
  `nominal` decimal(10,2) NOT NULL,
  `invoice` varchar(30) NOT NULL,
  `customer` int(11) NOT NULL,
  `bukti` varchar(100) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfirmasi`
--

INSERT INTO `konfirmasi` (`id_konf`, `nama`, `bank`, `nominal`, `invoice`, `customer`, `bukti`, `tanggal`) VALUES
(5, 'Sulaiman', 'BRI', '25000.00', '20220614114318', 3, 'images.png', '2022-06-14 16:47:12'),
(6, 'Sultan', 'MANDIRI', '75000.00', '20220614125301', 3, 'logo-baru_201007084651-572.png', '2022-06-14 17:56:53'),
(7, 'Sulaiman', 'BTPN', '250000.00', '20220619124724', 3, 'python.PNG', '2022-06-19 00:48:34'),
(8, 'Serina', 'MANDIRI', '30000.00', '20220620011238', 6, 'BUKTI PEMBYARAN.jpg', '2022-06-20 01:16:29'),
(9, 'Dewi', 'BNI', '25000.00', '20220620094931', 8, 'BUKTI PEMBYARAN.jpg', '2022-06-20 09:50:23'),
(10, 'Serina', 'BSI', '20000.00', '20220624111329', 6, 'BUKTI PEMBYARAN.jpg', '2022-06-24 23:24:49'),
(11, 'Serina', 'BNI', '30000.00', '20220627094704', 6, 'BUKTI PEMBYARAN.jpg', '2022-06-28 11:43:59');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pel` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(18) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `role` varchar(20) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pel`, `user`, `password`, `nama`, `email`, `telp`, `alamat`, `role`, `status`) VALUES
(1, 'admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Amalia', 'amalia@gmail.com', '086564546546', 'Tegal', 'admin', 1),
(3, 'customer', '827ccb0eea8a706c4c34a16891f84e7b', 'Member', 'yyaayyaatt@gmail.com', '086564546546', 'Tegal', 'member', 1),
(6, 'Serina', '827ccb0eea8a706c4c34a16891f84e7b', 'Serina', 'serina@gmail.com', '087654789654', 'SLAWI', 'member', 1),
(7, 'Roni', '827ccb0eea8a706c4c34a16891f84e7b', 'Roni', 'Roni@gmail.com', '087636485903', 'SLAWI', 'member', 1),
(8, 'Dewi', '827ccb0eea8a706c4c34a16891f84e7b', 'Dewi', 'Dewi@gmail.com', '086357893767', 'SLAWI', 'member', 1),
(9, 'super', '827ccb0eea8a706c4c34a16891f84e7b', 'Siti Robiah', 'sitirobiah@gmail.com', '086564546546', 'Tegal', 'super', 1);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `ket` varchar(500) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `foto1` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  `harga_disc` decimal(12,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `ket`, `kategori`, `harga`, `foto1`, `rate`, `harga_disc`, `stok`, `status`) VALUES
(16, 'Jahe Merah', '300 gr', '8', '30000.00', 'IMG-20220601-WA0004.jpg', 0, '0.00', 50, 1),
(17, 'Wedang Rempah Temulawak', '30 gr', '7', '25000.00', 'IMG-20220601-WA0002.jpg', 0, '0.00', 50, 1),
(19, 'Jahe Merah', '100 gr', '8', '10000.00', 'IMG-20220601-WA0003.jpg', 0, '0.00', 49, 1),
(20, 'Jahe Instan Premium', '250 gr', '8', '30000.00', 'IMG-20220601-WA0005.jpg', 0, '0.00', 50, 1),
(21, 'Temulawak Instan Premium', '250 gr', '9', '30000.00', 'IMG-20220601-WA0006.jpg', 0, '0.00', 50, 1),
(22, 'Wedang Uwuh', '30 gr', '7', '20000.00', 'IMG-20220601-WA0001.jpg', 0, '0.00', 49, 1),
(23, 'Wedang Rempah Temulawak Premium', '30 gr', '7', '25000.00', 'IMG-20220601-Wa7.jpg', 0, '0.00', 50, 1),
(24, 'Kopi Rempah', '100 gr', '10', '25000.00', 'IMG-20220601-WA0009.jpg', 0, '0.00', 50, 1),
(25, 'Teh Daun Kelor', '30 gr', '7', '25000.00', 'IMG-20220601-WA0010.jpg', 0, '0.00', 50, 1),
(27, 'Wedang Uwuh Celup', '30 gr', '7', '25000.00', 'IMG-20220601-WA0011.jpg', 0, '0.00', 50, 1),
(28, 'Serbuk Kunyit Murni', '90 gr', '11', '25000.00', 'IMG-20220601-WA0012.jpg', 0, '0.00', 50, 1),
(29, 'Wedang Uwuh Premium', '30 gr', '7', '25000.00', 'IMG-20220601-WA0007.jpg', 0, '0.00', 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id_rate` int(11) NOT NULL,
  `pelanggan` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `produk` int(11) NOT NULL,
  `pesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id_rate`, `pelanggan`, `rate`, `produk`, `pesan`) VALUES
(1, 3, 5, 16, ''),
(3, 1, 4, 16, '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `pelanggan` varchar(20) NOT NULL,
  `total` decimal(12,2) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ongkir` decimal(10,2) NOT NULL,
  `resi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no`, `invoice`, `tanggal`, `pelanggan`, `total`, `status`, `ongkir`, `resi`) VALUES
(11, '20220614113052', '2022-06-14', '1', '25000.00', 'Menunggu Pembayaran', '0.00', ''),
(12, '20220614113128', '2022-06-14', '1', '25000.00', 'Menunggu Pembayaran', '0.00', ''),
(13, '20220614113314', '2022-06-14', '1', '25000.00', 'Menunggu Pembayaran', '0.00', ''),
(14, '20220614113331', '2022-06-14', '1', '25000.00', 'Menunggu Pembayaran', '0.00', ''),
(15, '20220614114318', '2022-06-14', '3', '25000.00', 'Selesai', '0.00', ''),
(20, '20220614125301', '2022-06-14', '3', '75000.00', 'Selesai', '0.00', ''),
(21, '20220617111708', '2022-06-17', '5', '0.00', 'Menunggu Pembayaran', '0.00', ''),
(22, '20220619124724', '2022-06-19', '3', '250000.00', 'Bayar', '0.00', ''),
(23, '20220619081054', '2022-06-19', '3', '50000.00', 'Menunggu Pembayaran', '0.00', ''),
(24, '20220619011150', '2022-06-19', '3', '50000.00', 'Menunggu Pembayaran', '0.00', ''),
(25, '20220619021156', '2022-06-19', '6', '25000.00', 'Menunggu Pembayaran', '0.00', ''),
(26, '20220619095039', '2022-06-19', '', '250000.00', 'Menunggu Pembayaran', '0.00', ''),
(27, '20220620011238', '2022-06-20', '6', '30000.00', 'Selesai', '0.00', ''),
(28, '20220620074921', '2022-06-20', '3', '30000.00', 'Menunggu Pembayaran', '0.00', ''),
(29, '20220620094931', '2022-06-20', '8', '25000.00', 'Selesai', '0.00', ''),
(30, '20220624111329', '2022-06-24', '6', '20000.00', 'Selesai', '0.00', ''),
(31, '20220627094704', '2022-06-27', '6', '30000.00', 'Bayar', '0.00', ''),
(32, '20220628114313', '2022-06-28', '6', '25000.00', 'Menunggu Pembayaran', '0.00', ''),
(33, '20220629113450', '2022-06-29', '6', '20000.00', 'Menunggu Pembayaran', '0.00', ''),
(34, '20220629113807', '2022-06-29', '1', '55000.00', 'Menunggu Pembayaran', '0.00', ''),
(35, '20220630070234', '2022-06-30', '', '55000.00', 'Menunggu Pembayaran', '0.00', ''),
(36, '20220706075936', '2022-07-06', '6', '50000.00', 'Menunggu Pembayaran', '0.00', ''),
(37, '20220706095052', '2022-07-06', '6', '20000.00', 'Menunggu Pembayaran', '0.00', ''),
(38, '20220706095825', '2022-07-06', '9', '10000.00', 'Menunggu Pembayaran', '0.00', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_detail`
--

CREATE TABLE `transaksi_detail` (
  `id_detail` int(11) NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `id_produk` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_detail`
--

INSERT INTO `transaksi_detail` (`id_detail`, `invoice`, `id_produk`, `nama`, `qty`, `harga`) VALUES
(2, '20220614114318', '15', 'Wedang Uwuh', 1, '25000.00'),
(5, '20220614125301', '15', 'Wedang Uwuh', 1, '25000.00'),
(6, '20220614125301', '15', 'Wedang Uwuh', 1, '25000.00'),
(7, '20220614125301', '16', 'Jahe Merah', 1, '25000.00'),
(8, '20220617111708', '15', 'Wedang Uwuh', 1, '25000.00'),
(9, '20220617111708', '15', 'Wedang Uwuh', 1, '25000.00'),
(10, '20220617111708', '15', 'Wedang Uwuh', 1, '25000.00'),
(11, '20220617111708', '15', 'Wedang Uwuh', 1, '25000.00'),
(12, '20220617111708', '15', 'Wedang Uwuh', 1, '25000.00'),
(13, '20220617111708', '16', 'Jahe Merah', 1, '25000.00'),
(14, '20220617111708', '16', 'Jahe Merah', 1, '25000.00'),
(15, '20220617111708', '16', 'Jahe Merah', 1, '25000.00'),
(16, '20220617111708', '16', 'Jahe Merah', 1, '25000.00'),
(17, '20220617111708', '16', 'Jahe Merah', 1, '25000.00'),
(18, '20220617111708', '16', 'Jahe Merah', 1, '25000.00'),
(19, '20220617111708', '16', 'Jahe Merah', 1, '25000.00'),
(20, '20220619124724', '15', 'Wedang Uwuh', 1, '25000.00'),
(21, '20220619124724', '15', 'Wedang Uwuh', 1, '25000.00'),
(22, '20220619124724', '15', 'Wedang Uwuh', 1, '25000.00'),
(23, '20220619124724', '15', 'Wedang Uwuh', 1, '25000.00'),
(24, '20220619124724', '15', 'Wedang Uwuh', 1, '25000.00'),
(25, '20220619124724', '15', 'Wedang Uwuh', 1, '25000.00'),
(26, '20220619124724', '16', 'Jahe Merah', 1, '25000.00'),
(27, '20220619124724', '16', 'Jahe Merah', 1, '25000.00'),
(28, '20220619124724', '16', 'Jahe Merah', 1, '25000.00'),
(29, '20220619124724', '16', 'Jahe Merah', 1, '25000.00'),
(30, '20220619081054', '16', 'Jahe Merah', 1, '25000.00'),
(31, '20220619081054', '16', 'Jahe Merah', 1, '25000.00'),
(32, '20220619011150', '16', 'Jahe Merah', 1, '25000.00'),
(33, '20220619011150', '16', 'Jahe Merah', 1, '25000.00'),
(34, '20220619021156', '15', 'Wedang Uwuh Premium', 1, '25000.00'),
(35, '20220620011238', '21', 'Temulawak Instan Premium', 1, '30000.00'),
(36, '20220620074921', '16', 'Jahe Merah', 1, '30000.00'),
(37, '20220620094931', '17', 'Wedang Rempah Temulawak', 1, '25000.00'),
(38, '20220624111329', '22', 'Wedang Uwuh', 1, '20000.00'),
(39, '20220627094704', '20', 'Jahe Instan Premium', 1, '30000.00'),
(40, '20220628114313', '23', 'Wedang Rempah Temulawak Premium', 1, '25000.00'),
(41, '20220629113450', '22', 'Wedang Uwuh', 1, '20000.00'),
(42, '20220629113807', '16', 'Jahe Merah', 1, '30000.00'),
(43, '20220629113807', '17', 'Wedang Rempah Temulawak', 1, '25000.00'),
(44, '20220706075936', '17', 'Wedang Rempah Temulawak', 1, '25000.00'),
(45, '20220706075936', '17', 'Wedang Rempah Temulawak', 1, '25000.00'),
(46, '20220706095052', '22', 'Wedang Uwuh', 1, '20000.00'),
(47, '20220706095825', '19', 'Jahe Merah', 1, '10000.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

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
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rate`);

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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `konfirmasi`
--
ALTER TABLE `konfirmasi`
  MODIFY `id_konf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `transaksi_detail`
--
ALTER TABLE `transaksi_detail`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
