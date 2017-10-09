-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2017 at 07:05 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(150) NOT NULL,
  `jenis_kelamin_customer` varchar(150) NOT NULL,
  `umur_customer` int(11) NOT NULL,
  `alamat_customer` varchar(150) NOT NULL,
  `no_hp_customer` varchar(15) NOT NULL,
  `no_ktp_customer` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `jenis_kelamin_customer`, `umur_customer`, `alamat_customer`, `no_hp_customer`, `no_ktp_customer`) VALUES
(1, 'Cahyo', 'Laki-laki', 30, 'Lumajang', '080920390', '99970970923123');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_rental` int(11) NOT NULL,
  `foto_karyawan` varchar(150) NOT NULL,
  `nama_karyawan` varchar(150) NOT NULL,
  `jenis_kelamin_karyawan` varchar(25) NOT NULL,
  `alamat_karyawan` varchar(150) NOT NULL,
  `no_hp_karyawan` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_rental`, `foto_karyawan`, `nama_karyawan`, `jenis_kelamin_karyawan`, `alamat_karyawan`, `no_hp_karyawan`) VALUES
(1, 1, 'B9PmaPKIQAA5XhS.jpg', 'Paijo', 'Laki-laki', 'Randu Agung', '08766236186398'),
(2, 2, 'doa40.jpg', 'Hendro', 'Laki-laki', 'Senduro', '08221973701'),
(3, 1, 'detective_conan_derp_png_by_jinsuke04-d5qh5kf.png', 'Fais', 'Laki-laki', 'Besuk', '087587612812');

-- --------------------------------------------------------

--
-- Table structure for table `mobil`
--

CREATE TABLE `mobil` (
  `id_mobil` int(11) NOT NULL,
  `id_rental` int(11) NOT NULL,
  `foto_mobil` varchar(150) NOT NULL,
  `nopol` varchar(10) NOT NULL,
  `merk_mobil` varchar(50) NOT NULL,
  `type_mobil` varchar(50) NOT NULL,
  `tahun_mobil` year(4) NOT NULL,
  `harga_mobil` varchar(25) NOT NULL,
  `kapasitas_mobil` int(11) NOT NULL,
  `status_mobil` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_rental`, `foto_mobil`, `nopol`, `merk_mobil`, `type_mobil`, `tahun_mobil`, `harga_mobil`, `kapasitas_mobil`, `status_mobil`) VALUES
(1, 1, 'Rental-Mobil-Toyota-Avanza-di-Pulau-Belitung.jpg', 'A 5555 UB', 'Toyota', 'Avanza', 2010, '700000', 5, 'Tidak Ada'),
(2, 2, '5-big-changes-that-make-the-new-Maruti-Ertiga-better-than-ever.jpg', 'X 2128 YU', 'Mitsubishi', 'Alphard', 2009, '900000', 10, 'Tidak Ada'),
(3, 1, '2015-08-10-image.png', 'asdx', 'asd', 'asd', 0000, '900000', 0, 'Ada');

-- --------------------------------------------------------

--
-- Table structure for table `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `tgl_pemasukan` date NOT NULL,
  `perihal_pemasukan` varchar(150) NOT NULL,
  `pendapatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemasukan`
--

INSERT INTO `pemasukan` (`id_pemasukan`, `tgl_pemasukan`, `perihal_pemasukan`, `pendapatan`) VALUES
(1, '2016-11-19', 'Penyewaan Mobil', '900000'),
(2, '2016-11-19', 'Penyewaan Mobil', '1200000'),
(3, '2016-11-19', 'Penyewaan Mobil', '900000'),
(4, '2016-11-19', 'Penyewaan Mobil', '1200000'),
(5, '2016-11-19', 'Penyewaan Mobil', '1100000'),
(6, '2016-11-19', 'Penyewaan Mobil', '1000000'),
(7, '2016-11-19', 'Penyewaan Mobil', '900000'),
(8, '2016-11-20', 'Penyewaan Mobil', '1200000'),
(9, '2016-11-19', 'Penyewaan Mobil', '900000'),
(10, '2016-11-20', 'Penyewaan Mobil', '900000'),
(11, '2016-11-20', 'Penyewaan Mobil', '900000'),
(12, '0000-00-00', 'Penyewaan Mobil', '0'),
(13, '2016-11-20', 'Penyewaan Mobil', '900000'),
(14, '2016-11-20', 'Penyewaan Mobil', '900000'),
(15, '2016-11-21', 'Penyewaan Mobil', '1200000'),
(16, '2016-11-21', 'zz', '900000'),
(17, '2016-11-22', 'Penyewaan Mobil', '1200000'),
(18, '2016-11-26', 'Penyewaan Mobil', '900000'),
(19, '2016-11-26', 'Penyewaan Mobil', '900000');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id_pengeluaran` int(11) NOT NULL,
  `tgl_pengeluaran` date NOT NULL,
  `perihal_pengeluaran` varchar(150) NOT NULL,
  `total_pengeluaran` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengeluaran`
--

INSERT INTO `pengeluaran` (`id_pengeluaran`, `tgl_pengeluaran`, `perihal_pengeluaran`, `total_pengeluaran`) VALUES
(1, '2016-11-20', 'Bayar Karyawan', '5000000'),
(2, '2016-11-20', 'Service', '200000'),
(3, '2016-11-20', 'Bayar Karyawan', '2000000'),
(4, '2016-11-22', 'service', '1000000');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE `rental` (
  `id_rental` int(11) NOT NULL,
  `nama_rental` varchar(150) NOT NULL,
  `alamat_rental` varchar(150) NOT NULL,
  `no_hp_rental` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id_rental`, `nama_rental`, `alamat_rental`, `no_hp_rental`) VALUES
(1, 'Mantap Jiwa', 'Yoso', '0891261869283'),
(2, 'Sae', 'Kunir', '08761752371');

-- --------------------------------------------------------

--
-- Table structure for table `supir`
--

CREATE TABLE `supir` (
  `id_supir` int(11) NOT NULL,
  `id_rental` int(11) NOT NULL,
  `foto_supir` varchar(150) NOT NULL,
  `nama_supir` varchar(150) NOT NULL,
  `jenis_kelamin_supir` varchar(150) NOT NULL,
  `umur_supir` int(11) NOT NULL,
  `alamat_supir` varchar(150) NOT NULL,
  `no_hp_supir` varchar(15) NOT NULL,
  `status_supir` varchar(25) NOT NULL,
  `harga_supir` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supir`
--

INSERT INTO `supir` (`id_supir`, `id_rental`, `foto_supir`, `nama_supir`, `jenis_kelamin_supir`, `umur_supir`, `alamat_supir`, `no_hp_supir`, `status_supir`, `harga_supir`) VALUES
(1, 1, 'detective_conan_derp_png_by_jinsuke04-d5qh5kf.png', 'Conan', 'Laki-laki', 28, 'Kudus', '0898017237', 'Tidak Ada', '200000'),
(2, 2, 'Mesut-Ozil-2.jpg', 'Yanto', 'Laki-laki', 30, 'Lumajang', '087861823123', 'Tidak Ada', '300000');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_mobil` int(11) NOT NULL,
  `id_supir` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `tgl_sewa_mobil` date NOT NULL,
  `tgl_kembali_mobil` date NOT NULL,
  `total_harga_transaksi` varchar(50) NOT NULL,
  `status_mobil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_mobil`, `id_supir`, `id_karyawan`, `id_customer`, `tgl_sewa_mobil`, `tgl_kembali_mobil`, `total_harga_transaksi`, `status_mobil`) VALUES
(1, 1, 1, 1, 1, '2016-11-26', '2016-11-27', '900000', 'Disewa');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id_user` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `tingkat_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id_user`, `id_karyawan`, `username`, `password`, `tingkat_level`) VALUES
(1, 2, 'hendro', 'hendro', 'karyawan'),
(2, 0, 'admin', 'sadmin', 'admin'),
(3, 1, 'paijo', 'paijo', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_rental` (`id_rental`);

--
-- Indexes for table `mobil`
--
ALTER TABLE `mobil`
  ADD PRIMARY KEY (`id_mobil`),
  ADD KEY `id_rental` (`id_rental`);

--
-- Indexes for table `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id_pengeluaran`);

--
-- Indexes for table `rental`
--
ALTER TABLE `rental`
  ADD PRIMARY KEY (`id_rental`);

--
-- Indexes for table `supir`
--
ALTER TABLE `supir`
  ADD PRIMARY KEY (`id_supir`),
  ADD KEY `id_rental` (`id_rental`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_mobil` (`id_mobil`,`id_supir`,`id_karyawan`,`id_customer`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mobil`
--
ALTER TABLE `mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id_pengeluaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rental`
--
ALTER TABLE `rental`
  MODIFY `id_rental` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `supir`
--
ALTER TABLE `supir`
  MODIFY `id_supir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
