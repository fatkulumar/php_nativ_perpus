-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2020 at 08:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `nis` int(20) NOT NULL,
  `nama_anggota` varchar(255) NOT NULL,
  `id_jurusan` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_offering` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`nis`, `nama_anggota`, `id_jurusan`, `id_kelas`, `id_offering`, `alamat`, `foto`) VALUES
(112222, 'Diana Mar\'atus Sholikah', 6, 1, 2, 'Wonokerto, kedunggalar', '12.jpg'),
(112233, 'Fatkhul Umar', 1, 1, 2, 'umar            ', ''),
(112244, 'Kevin Aprilio', 5, 2, 15, 'Kedunggbanteng, paron', ''),
(112255, 'Latif Muammar Rifki', 2, 1, 2, 'Kedunngalar', ''),
(112266, 'Mariyun', 1, 1, 3, 'Pitu', ''),
(112277, 'Sri Yuana', 3, 1, 2, 'Wonokerto, Kedunggalar', ''),
(112288, 'Tasemi', 2, 2, 3, 'Sumberagung, wonokerto, kedunggalar', ''),
(112299, 'Budi Anto', 5, 3, 11, 'Sumberagung, wonokerto, malang', ''),
(113300, 'Supri Anto', 5, 2, 14, 'Sumberagung, wonokerto, kedunggalar', ''),
(113311, 'Gufron Anto', 3, 1, 2, 'Sumberagung, wonokerto, kedungglar', ''),
(113322, 'Faridatul Lailliyah', 6, 1, 3, 'Kedunggbanteng, ngasem, paron', ''),
(113344, 'fatkhul', 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_buku`
--

CREATE TABLE `tb_buku` (
  `id_buku` int(11) NOT NULL,
  `id_lokasi_buku` int(11) NOT NULL,
  `kd_buku` varchar(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` varchar(20) NOT NULL,
  `stok` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_buku`
--

INSERT INTO `tb_buku` (`id_buku`, `id_lokasi_buku`, `kd_buku`, `judul_buku`, `pengarang`, `penerbit`, `tahun_terbit`, `stok`) VALUES
(1, 1, 'kd1', 'Pendidikan kewarganegaraan untuk SMK XI', 'Sumarsono', 'Yudhistira', '2002', 0),
(2, 2, 'kd2', 'Bahasa Indonesia', 'Siswasih', 'Diknas', '2002', 1),
(3, 2, 'kd3', 'Fisika untuk SMA kelas X', 'Marthen Kanginan', 'Yudhistira', '2002', 0),
(4, 1, 'kd4', 'PKN & Sejarah untuk I SMK', 'Mardiyatmo', 'Yudhistira', '2001', 2),
(5, 2, 'kd5', 'Pendidikan agama islam Penuntun Hidup', 'Junaedi Anwar', 'Yudhistira', '2001', 3),
(6, 3, 'kd6', 'Bahasa indonesia untuk kelas 1', 'Erien Komarudin', 'Yudhistira', '2003', 10),
(7, 4, 'kd7', 'Matematika kelas 1', 'Dra.Hj.Herawati', 'Yudhistira', '2005', 10),
(8, 5, 'kd8', 'Agama islam untuk SMK XI', 'Margiono ', 'Yudhistira', '2006', 10),
(9, 7, 'kd9', 'Pendidikan kewarganegaraan', 'Sumarsono', 'Yudhistira', '2007', 10),
(10, 7, 'kd10', 'Fisika Bilingual untuk SMK XI', 'Sunardi', 'Yrama Widya', '2000', 10);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jurusan`
--

CREATE TABLE `tb_jurusan` (
  `id_jurusan` int(11) NOT NULL,
  `nama_jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_jurusan`
--

INSERT INTO `tb_jurusan` (`id_jurusan`, `nama_jurusan`) VALUES
(1, 'Tekhnik Kendaraan Ringan'),
(2, 'Tekhnik Komputer Jaringan'),
(3, 'Teknik Gambar Bangunan'),
(4, 'Teknik Instalasi Tenaga Listrik'),
(5, 'Teknik Permesianan'),
(6, 'Akomodasi Perhotelan'),
(7, 'Teknik Sepeda Motor'),
(8, 'Multimedia');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(1, '10'),
(2, '11'),
(3, '12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kembali`
--

CREATE TABLE `tb_kembali` (
  `id_kembali` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_pinjam` int(11) NOT NULL,
  `nis` int(20) NOT NULL,
  `tgl_pinjam` varchar(20) NOT NULL,
  `tgl_kembali` varchar(20) NOT NULL,
  `denda` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kembali`
--

INSERT INTO `tb_kembali` (`id_kembali`, `id_buku`, `id_pinjam`, `nis`, `tgl_pinjam`, `tgl_kembali`, `denda`, `status`) VALUES
(48, 5, 28, 112233, '2020-06-26', '2020-06-29', '0', 0),
(49, 4, 29, 112233, '2020-06-27', '2020-06-30', '0', 0),
(50, 0, 30, 0, '2020-06-27', '2020-06-30', '0', 0),
(51, 0, 31, 0, '2020-06-27', '2020-06-30', '0', 0),
(52, 0, 32, 0, '2020-06-27', '2020-06-30', '0', 0),
(53, 0, 33, 0, '2020-06-27', '2020-06-30', '0', 0),
(54, 0, 34, 0, '2020-06-27', '2020-06-30', '0', 0),
(55, 0, 35, 0, '2020-06-27', '2020-06-30', '0', 0),
(56, 0, 36, 0, '2020-06-27', '2020-06-30', '0', 0),
(57, 2, 37, 112233, '2020-06-27', '2020-06-30', '0', 0),
(58, 5, 38, 112233, '2020-06-27', '2020-06-30', '0', 0),
(59, 5, 39, 112233, '2020-06-27', '2020-06-30', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lokasi_buku`
--

CREATE TABLE `tb_lokasi_buku` (
  `id_lokasi_buku` int(255) NOT NULL,
  `lokasi_buku` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_lokasi_buku`
--

INSERT INTO `tb_lokasi_buku` (`id_lokasi_buku`, `lokasi_buku`) VALUES
(1, 'RAK 1A'),
(2, 'RAK_1B'),
(3, 'RAK_1C'),
(4, 'RAK_1D'),
(5, 'RAK_1F'),
(6, 'RAK_1G'),
(7, 'RAK_1H'),
(8, 'RAK_1i'),
(9, 'RAK_1J'),
(10, 'RAK_1E'),
(11, 'RAK_1H');

-- --------------------------------------------------------

--
-- Table structure for table `tb_offering`
--

CREATE TABLE `tb_offering` (
  `id_offering` int(11) NOT NULL,
  `offering` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_offering`
--

INSERT INTO `tb_offering` (`id_offering`, `offering`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'D'),
(4, 'F'),
(5, 'E'),
(6, 'G'),
(7, 'H'),
(8, 'I'),
(9, 'J'),
(10, 'K'),
(11, 'L'),
(12, 'M'),
(13, 'N'),
(14, 'O'),
(15, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `jenkel` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telp` int(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pinjam`
--

CREATE TABLE `tb_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `tgl_pinjam` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pinjam`
--

INSERT INTO `tb_pinjam` (`id_pinjam`, `id_buku`, `nis`, `tgl_pinjam`) VALUES
(1, 2, 112233, '2020-06-26'),
(2, 2, 112233, '2020-06-26'),
(3, 2, 112233, '2020-06-26'),
(4, 2, 112233, '2020-06-26'),
(5, 2, 112233, '2020-06-26'),
(6, 2, 112233, '2020-06-26'),
(7, 2, 112233, '2020-06-26'),
(8, 2, 112233, '2020-06-26'),
(9, 3, 112233, '2020-06-26'),
(10, 3, 112233, '2020-06-26'),
(11, 3, 112233, '2020-06-26'),
(12, 3, 112233, '2020-06-26'),
(13, 3, 112233, '2020-06-26'),
(14, 4, 112233, '2020-06-26'),
(15, 3, 112233, '2020-06-26'),
(16, 3, 112233, '2020-06-26'),
(17, 3, 112233, '2020-06-26'),
(18, 3, 112233, '2020-06-26'),
(19, 3, 112233, '2020-06-26'),
(20, 4, 112233, '2020-06-26'),
(21, 4, 112233, '2020-06-26'),
(22, 4, 112233, '2020-06-26'),
(23, 4, 112222, '2020-06-26'),
(24, 4, 112222, '2020-06-26'),
(25, 5, 112233, '2020-06-26'),
(26, 5, 112233, '2020-06-26'),
(27, 5, 112233, '2020-06-26'),
(28, 5, 112233, '2020-06-26'),
(29, 4, 112233, '2020-06-27'),
(30, 0, 0, '2020-06-27'),
(31, 0, 0, '2020-06-27'),
(32, 0, 0, '2020-06-27'),
(33, 0, 0, '2020-06-27'),
(34, 0, 0, '2020-06-27'),
(35, 0, 0, '2020-06-27'),
(36, 0, 0, '2020-06-27'),
(37, 2, 112233, '2020-06-27'),
(38, 5, 112233, '2020-06-27'),
(39, 5, 112233, '2020-06-27');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(255) NOT NULL,
  `nis` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nis`, `username`, `password`, `status`) VALUES
(1, 113344, '113344', '$2y$10$SwFFBxxDQSonCsH.sKmHJOHSEe6aAGwVwOFh7fwzz.MQ78Q87.jtm', 0),
(7, 112233, '112233', '$2y$10$5.NsAHDb0wCcrkP4SSYFlutfvE56utw4zlpyzSbEuxzsorxmGmW9C', 2),
(8, 112222, '112222', '$2y$10$vpyE.flN2IqNc7HZczE0eeeexvV95uvD3Va7nbc0nFtJhZBzeGY2q', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tb_buku`
--
ALTER TABLE `tb_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  ADD PRIMARY KEY (`id_kembali`);

--
-- Indexes for table `tb_lokasi_buku`
--
ALTER TABLE `tb_lokasi_buku`
  ADD PRIMARY KEY (`id_lokasi_buku`);

--
-- Indexes for table `tb_offering`
--
ALTER TABLE `tb_offering`
  ADD PRIMARY KEY (`id_offering`);

--
-- Indexes for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `nis` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113345;

--
-- AUTO_INCREMENT for table `tb_buku`
--
ALTER TABLE `tb_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_jurusan`
--
ALTER TABLE `tb_jurusan`
  MODIFY `id_jurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_kembali`
--
ALTER TABLE `tb_kembali`
  MODIFY `id_kembali` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_lokasi_buku`
--
ALTER TABLE `tb_lokasi_buku`
  MODIFY `id_lokasi_buku` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_offering`
--
ALTER TABLE `tb_offering`
  MODIFY `id_offering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pinjam`
--
ALTER TABLE `tb_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
