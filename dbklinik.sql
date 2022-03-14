-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2022 at 12:21 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbklinik`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftar_pasienn`
--

CREATE TABLE `daftar_pasienn` (
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(125) NOT NULL,
  `keterangan` varchar(150) NOT NULL,
  `nama_dokter` varchar(35) NOT NULL,
  `wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_pasienn`
--

INSERT INTO `daftar_pasienn` (`id_pasien`, `nama`, `tanggal_daftar`, `tanggal_lahir`, `alamat`, `keterangan`, `nama_dokter`, `wilayah`) VALUES
(8, 'andika', '2022-03-14', '2022-03-01', 'perum', 'nani', 'Lena', 'palembang'),
(9, 'andika', '2022-03-01', '2022-03-14', 'perum', 'aw', 'Dhuha', 'palembang');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(35) NOT NULL,
  `kategori` enum('umum','gigi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`, `kategori`) VALUES
(1, 'Dhuha', 'umum'),
(2, 'Lena', 'gigi');

-- --------------------------------------------------------

--
-- Table structure for table `historry_tindakan`
--

CREATE TABLE `historry_tindakan` (
  `nomor` int(11) NOT NULL,
  `id_pasien` int(10) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nama_dokter` varchar(35) NOT NULL,
  `tindakan` varchar(45) NOT NULL,
  `diagnosa` varchar(45) NOT NULL,
  `obat` varchar(45) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `historry_tindakan`
--

INSERT INTO `historry_tindakan` (`nomor`, `id_pasien`, `nama`, `nama_dokter`, `tindakan`, `diagnosa`, `obat`, `keterangan`) VALUES
(20, 8, 'andika', 'Lena', 'kasih obat', 'nyeri nyeri', 'Mefenamat', 'boleh pulang');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(20) NOT NULL,
  `bentuk_obat` varchar(25) NOT NULL,
  `tanggal_beli` date NOT NULL,
  `tanggal_kedalauarsa` date NOT NULL,
  `aturan_pakai` varchar(35) NOT NULL,
  `kegunaan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`kode_obat`, `nama_obat`, `bentuk_obat`, `tanggal_beli`, `tanggal_kedalauarsa`, `aturan_pakai`, `kegunaan`) VALUES
('HHHHH', 'paramex', 'Tablet', '2018-07-13', '2018-07-13', '2X1Sehari', 'Meringankan Sakit kepala'),
('rh85d', 'Mefenamat', 'Tablet,kapsul', '2018-07-03', '2020-07-03', '3x1 Sehari', 'Menghilangkan rasa nyeri');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `no_rekmed` int(11) NOT NULL,
  `id_pasien` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `nama_dokter` varchar(35) NOT NULL,
  `tindakan` varchar(125) NOT NULL,
  `diagnosa` varchar(125) NOT NULL,
  `obat` varchar(125) NOT NULL,
  `keterangan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userr`
--

CREATE TABLE `userr` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('superadmin','admin','dokter1','dokter2','apoteker') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userr`
--

INSERT INTO `userr` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
(1, 'superadmin', 'superadmin', 'superadmin', 'superadmin'),
(2, 'admin', 'admin', 'admin123', 'admin'),
(3, 'apotoker', 'apoteker', 'apoteker123', 'apoteker'),
(4, 'Lena', 'lena', 'lena123', 'dokter2'),
(5, 'Dhuha', 'dhuha', 'dhuha123', 'dokter1');

-- --------------------------------------------------------

--
-- Table structure for table `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `nama_wilayah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `nama_wilayah`) VALUES
(1, 'jakarta'),
(2, 'palembang');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftar_pasienn`
--
ALTER TABLE `daftar_pasienn`
  ADD PRIMARY KEY (`id_pasien`),
  ADD KEY `nama_dokter` (`nama_dokter`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `historry_tindakan`
--
ALTER TABLE `historry_tindakan`
  ADD PRIMARY KEY (`nomor`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`no_rekmed`);

--
-- Indexes for table `userr`
--
ALTER TABLE `userr`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar_pasienn`
--
ALTER TABLE `daftar_pasienn`
  MODIFY `id_pasien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `historry_tindakan`
--
ALTER TABLE `historry_tindakan`
  MODIFY `nomor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `no_rekmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `userr`
--
ALTER TABLE `userr`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
