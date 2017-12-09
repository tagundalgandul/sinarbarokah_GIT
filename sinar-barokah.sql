-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2017 at 05:41 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinar-barokah`
--

-- --------------------------------------------------------

--
-- Table structure for table `det_transaksi`
--

CREATE TABLE `det_transaksi` (
  `no_faktur` varchar(8) DEFAULT NULL,
  `kd_barang` varchar(8) DEFAULT NULL,
  `sub_total` float DEFAULT NULL,
  `qty` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_transaksi`
--

INSERT INTO `det_transaksi` (`no_faktur`, `kd_barang`, `sub_total`, `qty`) VALUES
('PJL0001', 'PDK0002', 60000, 50),
('PJL0002', 'PDK0001', 30000, 50),
('PJL0002', 'PDK0002', 90000, 75),
('PJL0003', 'PDK0001', 60000, 100),
('PJL0003', 'PDK0002', 60000, 50),
('PJL0004', 'PDK0001', 30000, 50),
('PJL0004', 'PDK0002', 90000, 75),
('PJL0005', 'PDK0001', 30000, 50),
('PJL0005', 'PDK0002', 60000, 50),
('PJL0007', 'PDK0001', 30000, 50),
('PJL0007', 'PDK0002', 60000, 50),
('PJL0008', 'PDK0002', 60000, 50),
('PJL0009', 'PDK0001', 70800, 118),
('PJL0009', 'PDK0002', 60000, 50),
('PJL0010', 'PDK0001', 120000, 200),
('PJL0010', 'PDK0002', 60000, 50),
('PJL0010', 'PDK0003', 112000, 56),
('PJL0011', 'PDK0001', 60000, 100),
('PJL0011', 'PDK0002', 120000, 100),
('PJL0011', 'PDK0003', 200000, 100),
('PJL0012', 'PDK0002', 60000, 50),
('PJL0012', 'PDK0003', 50000, 25),
('PJL0013', 'PDK0001', 60000, 100),
('PJL0013', 'PDK0002', 60000, 50),
('PJL0014', 'PDK0001', 42000, 70),
('PJL0014', 'PDK0003', 100000, 50),
('PJL0015', 'PDK0001', 45000, 75),
('PJL0015', 'PDK0002', 60000, 50),
('PJL0016', 'PDK0001', 90000, 150),
('PJL0016', 'PDK0002', 60000, 50),
('PJL0017', 'PDK0001', 90000, 150),
('PJL0017', 'PDK0002', 90000, 75),
('PJL0017', 'PDK0003', 40000, 20),
('PJL0018', 'PDK0001', 30000, 50),
('PJL0018', 'PDK0003', 200000, 100),
('PJL0019', 'PDK0001', 30000, 50),
('PJL0019', 'PDK0002', 36000, 30),
('PJL0019', 'PDK0003', 150000, 75),
('PJL0020', 'PDK0001', 90000, 150),
('PJL0020', 'PDK0002', 90000, 75),
('PJL0020', 'PDK0003', 40000, 20),
('PJL0021', 'PDK0001', 45000, 75),
('PJL0021', 'PDK0002', 90000, 75),
('PJL0021', 'PDK0003', 60000, 30),
('PJL0022', 'PDK0001', 90000, 150),
('PJL0022', 'PDK0002', 90000, 75),
('PJL0023', 'PDK0001', 90000, 150),
('PJL0023', 'PDK0002', 120000, 100),
('PJL0024', 'PDK0001', 60000, 100),
('PJL0024', 'PDK0003', 300000, 150),
('PJL0025', 'PDK0002', 48000, 40),
('PJL0026', 'PDK0001', 60000, 100),
('PJL0026', 'PDK0003', 220000, 110),
('PJL0027', 'PDK0001', 18000, 30),
('PJL0027', 'PDK0002', 36000, 30),
('PJL0027', 'PDK0003', 60000, 30),
('PJL0028', 'PDK0001', 30000, 50),
('PJL0028', 'PDK0002', 36000, 30),
('PJL0029', 'PDK0001', 30000, 50),
('PJL0029', 'PDK0003', 100000, 50);

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `kd_kecamatan` varchar(8) NOT NULL,
  `nama_kecamatan` varchar(25) DEFAULT NULL,
  `latitude` float(10,6) DEFAULT NULL,
  `longitude` float(10,6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`kd_kecamatan`, `nama_kecamatan`, `latitude`, `longitude`) VALUES
('KEC0001', 'Binong', -6.398262, 107.798141),
('KEC0002', 'Blanakan', -6.260771, 107.657043),
('KEC0003', 'Ciasem', -6.330865, 107.692566),
('KEC0004', 'Ciater', -6.730217, 107.680725),
('KEC0005', 'Cibogo', -6.565531, 107.840614),
('KEC0006', 'Cijambe', -6.624205, 107.775467),
('KEC0007', 'Cikaum', -6.421428, 107.728088),
('KEC0008', 'Cipeundeuy', -6.497591, 107.597855),
('KEC0009', 'Cipunagara', -6.498018, 107.870232),
('KEC0010', 'Cisalak', -6.768625, 107.751778),
('KEC0011', 'Compreng', -6.395961, 107.870232),
('KEC0012', 'Dawuan', -6.563959, 107.688866),
('KEC0013', 'Jalancagak', -6.667801, 107.704407),
('KEC0014', 'Kalijati', -6.548326, 107.609695),
('KEC0015', 'Kasomalang', -6.685677, 107.775467),
('KEC0016', 'Legonkulon', -6.235499, 107.799156),
('KEC0017', 'Pabuaran', -6.426456, 107.586021),
('KEC0018', 'Pagaden', -6.495267, 107.805077),
('KEC0019', 'Pagaden Barat', -6.481009, 107.775467),
('KEC0020', 'Pamanukan', -6.295739, 107.822845),
('KEC0021', 'Patokbeusi', -6.364362, 107.609695),
('KEC0022', 'Purwadadi', -6.443534, 107.680725),
('KEC0023', 'Pusakajaya', -6.313406, 107.895599),
('KEC0024', 'Pusakanagara', -6.254518, 107.869659),
('KEC0025', 'Sagalaherang', -6.711445, 107.633369),
('KEC0026', 'Serangpanjang', -6.630267, 107.609695),
('KEC0027', 'Subang', -6.563656, 107.751778),
('KEC0028', 'Sukasari', -6.297398, 107.775467),
('KEC0029', 'Tambakdahan', -6.338508, 107.797974),
('KEC0030', 'Tanjungsiang', -6.747860, 107.807785),
('KEC0031', 'aa', 1.000000, 2.000000);

-- --------------------------------------------------------

--
-- Table structure for table `kelompok`
--

CREATE TABLE `kelompok` (
  `id_kelompok` varchar(8) NOT NULL,
  `nama_kelompok` varchar(30) DEFAULT NULL,
  `kd_promosi` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelompok`
--

INSERT INTO `kelompok` (`id_kelompok`, `nama_kelompok`, `kd_promosi`) VALUES
('CC', 'Core Customers', 'PMI0001'),
('CRC', 'Consuming Resource Customer', 'PMI0005'),
('LC', 'Lost Customer', 'PMI0003'),
('NC', 'New Customers', 'PMI0004'),
('PC', 'Potensial Customers', 'PMI0002');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` varchar(8) NOT NULL,
  `nama_pelanggan` varchar(25) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `no_tlp` varchar(15) DEFAULT NULL,
  `kd_kecamatan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jk`, `no_tlp`, `kd_kecamatan`) VALUES
('PLG0001', 'IPIN', 'L', '081276930800', 'KEC0014'),
('PLG0002', 'ANGGI', 'P', '089699007402', 'KEC0014'),
('PLG0003', 'HARIS', 'L', '081276930800', 'KEC0014'),
('PLG0004', 'nanda', 'L', '081276930800', 'KEC0002');

-- --------------------------------------------------------

--
-- Table structure for table `penduduk`
--

CREATE TABLE `penduduk` (
  `kd_penduduk` varchar(8) NOT NULL,
  `jumlah_penduduk` int(8) DEFAULT NULL,
  `penduduk_20` int(8) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL,
  `kd_kecamatan` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penduduk`
--

INSERT INTO `penduduk` (`kd_penduduk`, `jumlah_penduduk`, `penduduk_20`, `tahun`, `kd_kecamatan`) VALUES
('PDK0001', 43608, 30185, 2016, 'KEC0001'),
('PDK0002', 63242, 40382, 2016, 'KEC0002'),
('PDK0003', 106444, 71129, 2016, 'KEC0003'),
('PDK0004', 29560, 21930, 2016, 'KEC0004'),
('PDK0005', 46712, 30794, 2016, 'KEC0005'),
('PDK0006', 39461, 26019, 2016, 'KEC0006'),
('PDK0007', 48275, 31727, 2016, 'KEC0007'),
('PDK0008', 48984, 35891, 2016, 'KEC0008'),
('PDK0009', 60982, 40754, 2016, 'KEC0009'),
('PDK0010', 40977, 26516, 2016, 'KEC0010'),
('PDK0011', 44655, 29768, 2016, 'KEC0011'),
('PDK0012', 39975, 27326, 2016, 'KEC0012'),
('PDK0013', 47031, 30871, 2016, 'KEC0013'),
('PDK0014', 64828, 44506, 2016, 'KEC0014'),
('PDK0015', 42872, 25994, 2016, 'KEC0015'),
('PDK0016', 22038, 14880, 2016, 'KEC0016'),
('PDK0017', 61392, 39617, 2016, 'KEC0017'),
('PDK0018', 62009, 42398, 2016, 'KEC0018'),
('PDK0019', 33869, 24508, 2016, 'KEC0019'),
('PDK0020', 57575, 38672, 2016, 'KEC0020'),
('PDK0021', 80728, 52678, 2016, 'KEC0021'),
('PDK0022', 63376, 40989, 2016, 'KEC0022'),
('PDK0023', 45536, 29439, 2016, 'KEC0023'),
('PDK0024', 39133, 24787, 2016, 'KEC0024'),
('PDK0025', 29824, 21276, 2016, 'KEC0025'),
('PDK0026', 25462, 16550, 2016, 'KEC0026'),
('PDK0027', 131066, 83851, 2016, 'KEC0027'),
('PDK0028', 40825, 26801, 2016, 'KEC0028'),
('PDK0029', 41032, 29385, 2016, 'KEC0029'),
('PDK0030', 44529, 29255, 2016, 'KEC0030');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` varchar(8) NOT NULL,
  `nama_pengguna` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','pemilik','penjualan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `nama_pengguna`, `email`, `password`, `level`) VALUES
('PGN0001', 'nanda', 'tagundalgandul25@gmail.com', '$2y$10$c3pyNTw.JxSmB11p/mqimeNBorFxpMF/1mycm8sSVu4ILbgA6Tex6', 'admin'),
('PGN0002', 'aryan', 'aryan@gmail.com', '$2y$10$oKnYHp0yOTjoPbD7YB/eoeK9dXAB9fUDsl177HFChCwZ/eP49YoXG', 'pemilik'),
('PGN0003', 'oky1', 'oky', '$2y$10$oKnYHp0yOTjoPbD7YB/eoeK9dXAB9fUDsl177HFChCwZ/eP49YoXG', 'penjualan'),
('PGN0004', 'nanda1', 'nanda', '$2y$10$oKnYHp0yOTjoPbD7YB/eoeK9dXAB9fUDsl177HFChCwZ/eP49YoXG', 'pemilik'),
('PGN0005', 'aaaa', 'aaaa', '$2y$10$oKnYHp0yOTjoPbD7YB/eoeK9dXAB9fUDsl177HFChCwZ/eP49YoXG', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `kd_barang` varchar(8) NOT NULL,
  `nama_barang` varchar(25) DEFAULT NULL,
  `harga` float DEFAULT NULL,
  `gambar` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`kd_barang`, `nama_barang`, `harga`, `gambar`) VALUES
('PDK0001', 'BAKSO POLOS', 600, 'A.JPG'),
('PDK0002', 'BAKSO ISI DAGING', 1200, 'B.JPG'),
('PDK0003', 'BAKSO ISI TELUR', 2000, 'A.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `kd_promosi` varchar(8) NOT NULL,
  `isi_promosi` varchar(255) DEFAULT NULL,
  `id_pengguna` varchar(8) DEFAULT NULL,
  `tgl_berlaku` date DEFAULT NULL,
  `tgl_berakhir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`kd_promosi`, `isi_promosi`, `id_pengguna`, `tgl_berlaku`, `tgl_berakhir`) VALUES
('PMI0001', 'Mendapatkan Diskon 15% setiap belanja minimal Rp. 250.000,-', 'PGN0002', '2017-11-01', '2017-11-02'),
('PMI0002', 'Mendapatkan diskon 10%  setiap belanja minimal Rp. 200.000', 'PGN0002', '2017-11-08', '2017-11-08'),
('PMI0003', 'Mendapatkan diskon  7 % setiap belanja minimal Rp. 150.000', 'PGN0002', '2017-11-14', '2017-11-14'),
('PMI0004', 'Mendapatkan diskon  5 % setiap belanja minimal Rp. 150.000', 'PGN0002', '2017-11-14', '2017-11-14'),
('PMI0005', 'Mendapatkan 25 btr bakso polos dengan minimal transaksi 100.000', 'PGN0002', '2017-11-14', '2017-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `kd_sms` varchar(8) NOT NULL,
  `isi_sms` varchar(255) DEFAULT NULL,
  `kd_promosi` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`kd_sms`, `isi_sms`, `kd_promosi`) VALUES
('SMS0001', '[Sinar Barokah]. Terima kasih atas kepercayaan anda terhadap produk kami. Selamat anda mendapatkan Diskon 15% setiap belanja minimal Rp. 250.000,-. ', 'PMI0001'),
('SMS0002', '[Sinar Barokah]. Terima kasih atas kepercayaan anda terhadap produk kami. Selamat anda mendapatkan Diskon 10% setiap belanja minimal Rp. 200.000,-.', 'PMI0002'),
('SMS0003', '[Sinar Barokah]. Terima kasih atas kepercayaan anda terhadap produk kami. Selamat anda mendapatkan Diskon 7% setiap belanja minimal Rp. 150.000,-.', 'PMI0003'),
('SMS0004', '[Sinar Barokah]. Terima kasih atas kepercayaan anda terhadap produk kami. Selamat anda mendapatkan Diskon 5% setiap belanja minimal Rp. 150.000,-.', 'PMI0004'),
('SMS0005', '[Sinar Barokah]. Terima kasih atas kepercayaan anda terhadap produk kami. Selamat anda mendapatkan 25 btr bakso polos dengan minimal transaksi Rp. 150.000.', 'PMI0005');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_faktur` varchar(8) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `id_pengguna` varchar(8) DEFAULT NULL,
  `id_pelanggan` varchar(8) NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_faktur`, `tgl_transaksi`, `id_pengguna`, `id_pelanggan`, `total`) VALUES
('PJL0001', '2017-04-01', 'PGN0002', 'PLG0001', 60000),
('PJL0002', '2017-04-01', 'PGN0002', 'PLG0002', 120000),
('PJL0003', '2017-04-02', 'PGN0002', 'PLG0003', 120000),
('PJL0004', '2017-04-03', 'PGN0002', 'PLG0002', 120000),
('PJL0005', '2017-11-06', 'PGN0002', 'PLG0001', 90000),
('PJL0007', '2017-04-10', 'PGN0002', 'PLG0001', 90000),
('PJL0008', '2017-04-15', 'PGN0002', 'PLG0001', 60000),
('PJL0009', '2017-04-18', 'PGN0002', 'PLG0001', 130800),
('PJL0010', '2017-04-22', 'PGN0002', 'PLG0001', 292000),
('PJL0011', '2017-04-24', 'PGN0002', 'PLG0001', 380000),
('PJL0012', '2017-04-25', 'PGN0002', 'PLG0001', 110000),
('PJL0013', '2017-04-27', 'PGN0002', 'PLG0001', 120000),
('PJL0014', '2017-04-29', 'PGN0002', 'PLG0001', 142000),
('PJL0015', '2017-04-07', 'PGN0002', 'PLG0002', 105000),
('PJL0016', '2017-04-08', 'PGN0002', 'PLG0002', 150000),
('PJL0017', '2017-04-10', 'PGN0002', 'PLG0002', 220000),
('PJL0018', '2017-04-15', 'PGN0002', 'PLG0002', 230000),
('PJL0019', '2017-04-16', 'PGN0002', 'PLG0002', 216000),
('PJL0020', '2017-04-18', 'PGN0002', 'PLG0002', 220000),
('PJL0021', '2017-04-24', 'PGN0002', 'PLG0002', 195000),
('PJL0022', '2017-04-26', 'PGN0002', 'PLG0002', 180000),
('PJL0023', '2017-04-04', 'PGN0002', 'PLG0003', 210000),
('PJL0024', '2017-04-10', 'PGN0002', 'PLG0003', 360000),
('PJL0025', '2017-04-17', 'PGN0002', 'PLG0003', 48000),
('PJL0026', '2017-04-18', 'PGN0002', 'PLG0003', 280000),
('PJL0027', '2017-03-26', 'PGN0002', 'PLG0003', 114000),
('PJL0028', '2017-04-03', 'PGN0003', 'PLG0001', 66000),
('PJL0029', '2017-04-08', 'PGN0003', 'PLG0001', 130000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `det_transaksi`
--
ALTER TABLE `det_transaksi`
  ADD KEY `no_faktur` (`no_faktur`),
  ADD KEY `kd_barang` (`kd_barang`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`kd_kecamatan`);

--
-- Indexes for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD PRIMARY KEY (`id_kelompok`),
  ADD KEY `kd_promosi` (`kd_promosi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `kd_kecamatan` (`kd_kecamatan`);

--
-- Indexes for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD PRIMARY KEY (`kd_penduduk`),
  ADD KEY `kd_kecamatan` (`kd_kecamatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`kd_barang`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`kd_promosi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`kd_sms`),
  ADD KEY `kd_promosi` (`kd_promosi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_faktur`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `det_transaksi`
--
ALTER TABLE `det_transaksi`
  ADD CONSTRAINT `det_transaksi_ibfk_1` FOREIGN KEY (`no_faktur`) REFERENCES `transaksi` (`no_faktur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `det_transaksi_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `produk` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelompok`
--
ALTER TABLE `kelompok`
  ADD CONSTRAINT `kelompok_ibfk_1` FOREIGN KEY (`kd_promosi`) REFERENCES `promosi` (`kd_promosi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`kd_kecamatan`) REFERENCES `kecamatan` (`kd_kecamatan`);

--
-- Constraints for table `penduduk`
--
ALTER TABLE `penduduk`
  ADD CONSTRAINT `penduduk_ibfk_1` FOREIGN KEY (`kd_kecamatan`) REFERENCES `kecamatan` (`kd_kecamatan`);

--
-- Constraints for table `promosi`
--
ALTER TABLE `promosi`
  ADD CONSTRAINT `promosi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_ibfk_1` FOREIGN KEY (`kd_promosi`) REFERENCES `promosi` (`kd_promosi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `pengguna` (`id_pengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
