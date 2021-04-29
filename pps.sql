-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2018 at 10:54 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poinsmkakh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `c_admin` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`c_admin`, `nama`, `username`, `password`) VALUES
('123456789', 'Rino Oktavianto', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `benpel`
--

CREATE TABLE `benpel` (
  `c_benpel` varchar(10) NOT NULL,
  `c_katbenpel` varchar(10) NOT NULL,
  `benpel` text NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benpel`
--

INSERT INTO `benpel` (`c_benpel`, `c_katbenpel`, `benpel`, `bobot`) VALUES
('5XafCJsV5', 'b4tFXbsU5', 'Berkelahi dengan sekolahan lain', 100),
('cn7rgthJl', 'FSyln8F5q', 'Berkata Kotor Dengan Guru', 50),
('jODakRHnk', 'jGC4JtGo0', 'Memasukkan Baju (Siswa Putri)', 2),
('kmIn6bv43', 'jGC4JtGo0', 'Bertato', 20),
('M8yHhFw6o', 'b4tFXbsU5', 'Terbukti melakukan kejahatan', 50),
('o6zIRf55a', 'wE2hDSZ0H', 'Meninggalkan Kelas Tanpa Izin', 5),
('qlW4RnkLE', 'jGC4JtGo0', 'Tidak Memasukkan Baju (Siswa Putra)', 20),
('rkCV0Qegy', 'jGC4JtGo0', 'Berambut Gondrong (Siswa Putra)/dicat/diwarna', 2),
('UtkxKRhBu', 'wE2hDSZ0H', 'Tidak Mengikuti Pelajaran Tanpa Izin', 10),
('y1Xs82Iud', 'wE2hDSZ0H', 'Tidak Mengikuti Upacara', 5),
('yYuI3otvA', 'FSyln8F5q', 'Mengejek Guru', 10);

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `c_chat` int(11) NOT NULL,
  `c_guru` varchar(10) NOT NULL,
  `c_orangtua` varchar(10) NOT NULL,
  `pesan` text NOT NULL,
  `at` datetime NOT NULL,
  `w_g` varchar(1) NOT NULL,
  `sg` varchar(1) NOT NULL,
  `sw` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`c_chat`, `c_guru`, `c_orangtua`, `pesan`, `at`, `w_g`, `sg`, `sw`) VALUES
(1, 'DPCcMKMey', 'tW6FuMey0', 'Assalamualaikum', '2017-11-28 18:49:28', 'w', 'y', 'y'),
(2, 'DPCcMKMey', 'tW6FuMey0', 'Bapak?', '2017-11-28 18:56:49', 'w', 'y', 'y'),
(3, 'DPCcMKMey', '0vEcBeBgF', 'Bismillah', '2017-11-28 19:00:36', 'g', 'y', 'y'),
(4, 'DPCcMKMey', 'tW6FuMey0', 'Iya', '2017-11-29 05:38:34', 'g', 'y', 'y'),
(5, 'DPCcMKMey', 'tW6FuMey0', 'Anak Saya tolong dibimbing ya bapak', '2017-11-29 05:47:55', 'w', 'y', 'y'),
(6, 'DPCcMKMey', 'tW6FuMey0', 'insya Allah bapak, kami selalu berusaha seperti itu, dan juga mohon untuk dibimbing dari pihak keluarga', '2017-11-29 05:59:08', 'g', 'y', 'y'),
(7, 'DPCcMKMey', 'tW6FuMey0', 'Terimakasih bapak', '2017-11-29 05:59:36', 'w', 'y', 'y'),
(8, 'DPCcMKMey', 'tW6FuMey0', 'sama sama', '2017-12-01 06:33:32', 'g', 'y', 'n'),
(9, 'G2sSiWyoD', 'supyLA8lg', 'contoh', '2017-12-13 09:07:33', 'g', 'y', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `c_guru` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`c_guru`, `nama`, `username`, `password`, `foto`) VALUES
('DPCcMKMey', 'Ahmad Zubaidi', 'pakobet', 'pakobet', 'foto/download.jpg'),
('G2sSiWyoD', 'M. Zainnuri S.Kom', 'pakzen', 'pakzen', 'foto/20170816145718.jpg'),
('Ztknli361', 'Aris Andriyanto', 'pakaris', 'pakaris', '');

-- --------------------------------------------------------

--
-- Table structure for table `katbenpel`
--

CREATE TABLE `katbenpel` (
  `c_katbenpel` varchar(10) NOT NULL,
  `katbenpel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `katbenpel`
--

INSERT INTO `katbenpel` (`c_katbenpel`, `katbenpel`) VALUES
('b4tFXbsU5', 'KEJAHATAN'),
('FSyln8F5q', 'KESOPANAN'),
('jGC4JtGo0', 'KERAPIAN'),
('wE2hDSZ0H', 'KERAJINAN');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `c_kelas` varchar(10) NOT NULL,
  `kelas` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`c_kelas`, `kelas`) VALUES
('bf14I0amf', 'X RPL'),
('fi5IJXCDs', 'X TKJ'),
('g20VX0r3h', 'X TKR'),
('NFVN6oSIZ', 'X TPL');

-- --------------------------------------------------------

--
-- Table structure for table `orangtua`
--

CREATE TABLE `orangtua` (
  `c_orangtua` varchar(10) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orangtua`
--

INSERT INTO `orangtua` (`c_orangtua`, `c_siswa`, `nama`, `username`, `password`) VALUES
('0vEcBeBgF', 'djrCE5y6z', 'Bapaknya Amalia', 'bpa', 'bpa'),
('supyLA8lg', 'XKHcfzVUR', 'Bapak Ali Husain', 'alihusain', 'alihusain'),
('tW6FuMey0', 'ukxWhAq84', 'Muhammad Hasan Bisri', 'hasan', 'hasan');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggaran`
--

CREATE TABLE `pelanggaran` (
  `c_pelanggaran` varchar(5) NOT NULL,
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `c_benpel` varchar(10) NOT NULL,
  `bobot` int(4) NOT NULL,
  `c_guru` varchar(10) NOT NULL,
  `at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggaran`
--

INSERT INTO `pelanggaran` (`c_pelanggaran`, `c_siswa`, `c_kelas`, `c_benpel`, `bobot`, `c_guru`, `at`) VALUES
('0qib', 'aYlxwzZu6', 'fi5IJXCDs', 'qlW4RnkLE', 20, 'DPCcMKMey', '2017-12-01 06:10:55'),
('0vnB', 'I73vNKyU9', 'fi5IJXCDs', 'UtkxKRhBu', 10, 'DPCcMKMey', '2017-11-29 08:48:16'),
('46kg', 'ukxWhAq84', 'bf14I0amf', 'o6zIRf55a', 5, 'G2sSiWyoD', '2017-11-28 11:34:54'),
('6mR4', '9sgiPEKLX', 'g20VX0r3h', 'yYuI3otvA', 10, 'DPCcMKMey', '2017-12-01 06:18:42'),
('9', 'XKHcfzVUR', 'fi5IJXCDs', 'qlW4RnkLE', 20, 'G2sSiWyoD', '2017-11-25 14:55:26'),
('AqI1', 'ukxWhAq84', 'bf14I0amf', 'qlW4RnkLE', 20, 'Ztknli361', '2017-12-01 06:02:29'),
('c11k', 'I73vNKyU9', 'fi5IJXCDs', 'y1Xs82Iud', 5, 'DPCcMKMey', '2017-11-29 08:36:36'),
('F6kZ', 'ukxWhAq84', 'bf14I0amf', 'UtkxKRhBu', 10, 'G2sSiWyoD', '2017-11-28 11:34:54'),
('g9zH', '9sgiPEKLX', 'g20VX0r3h', 'qlW4RnkLE', 20, 'DPCcMKMey', '2017-12-01 06:18:42'),
('GnvK', 'unCWwBalF', 'bf14I0amf', 'o6zIRf55a', 5, 'G2sSiWyoD', '2017-12-13 09:09:54'),
('hA6I', 'I73vNKyU9', 'fi5IJXCDs', 'cn7rgthJl', 50, 'DPCcMKMey', '2017-12-01 06:16:59'),
('hLD0', '9sgiPEKLX', 'g20VX0r3h', 'y1Xs82Iud', 5, 'Ztknli361', '2017-12-02 08:58:38'),
('mfQQ', 'ukxWhAq84', 'bf14I0amf', 'o6zIRf55a', 5, 'G2sSiWyoD', '2017-12-13 09:09:54'),
('PxW7', 'NJOgsxL8z', 'bf14I0amf', 'cn7rgthJl', 50, 'G2sSiWyoD', '2017-11-27 06:26:59'),
('sNGD', 'AKbptUszm', 'g20VX0r3h', 'kmIn6bv43', 20, 'Ztknli361', '2017-12-01 05:56:49'),
('y7Et', 'ukxWhAq84', 'bf14I0amf', 'qlW4RnkLE', 20, 'DPCcMKMey', '2017-11-28 18:47:52');

-- --------------------------------------------------------

--
-- Table structure for table `relasichat`
--

CREATE TABLE `relasichat` (
  `c_chat` int(11) NOT NULL,
  `c_guru` varchar(10) NOT NULL,
  `c_orangtua` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relasichat`
--

INSERT INTO `relasichat` (`c_chat`, `c_guru`, `c_orangtua`) VALUES
(5, 'DPCcMKMey', '0vEcBeBgF'),
(7, 'DPCcMKMey', 'tW6FuMey0'),
(8, 'G2sSiWyoD', 'supyLA8lg');

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `c_sanksi` varchar(10) NOT NULL,
  `kriteria` varchar(30) NOT NULL,
  `bobot_dari` int(3) NOT NULL,
  `bobot_sampai` int(3) NOT NULL,
  `sanksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanksi`
--

INSERT INTO `sanksi` (`c_sanksi`, `kriteria`, `bobot_dari`, `bobot_sampai`, `sanksi`) VALUES
('0DhOeINEy', 'Pelanggaran Ringan', 1, 5, '1. Peringatan Lesan<br>2. Dicatat dalam buku pelanggaran'),
('d3e8l5Jts', 'Pelanggaran Sedang', 6, 20, '1. Dicatat<br>2. Membuat Surat Pernyataan'),
('Sk8x467Qm', 'Pelanggaran Berat', 50, 100, '1. Diberikan Peringatan dan Surat Perjanjian<br>2. BIla Melanggar Kembali dikeluarkan dari sekolahan');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `c_siswa` varchar(10) NOT NULL,
  `c_kelas` varchar(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jk` varchar(1) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`c_siswa`, `c_kelas`, `nisn`, `nama`, `jk`, `alamat`, `tl`) VALUES
('3mPRqCUvC', 'fi5IJXCDs', '45643646', 'Irfan Bachdim', '', '', '0000-00-00'),
('8XmoU43aM', 'g20VX0r3h', '989898898', 'M. Lionel Messi', 'P', 'Barcelona', '1998-10-22'),
('9sgiPEKLX', 'g20VX0r3h', '123456789', 'Muhammad Ali', 'L', '', '0000-00-00'),
('AKbptUszm', 'g20VX0r3h', '9980802501', 'Muhammad Irfan Sukoco Basyuri', 'L', '', '0000-00-00'),
('aYlxwzZu6', 'fi5IJXCDs', '4374734626', 'Michael Essien Woi', 'L', 'Nganjuk', '1998-11-05'),
('BNlJPHC33', 'bf14I0amf', '43544354', 'Muhammad Nur Hidayat', '', '', '0000-00-00'),
('djrCE5y6z', 'fi5IJXCDs', '46437437', 'Amalia Utami', '', '', '0000-00-00'),
('I73vNKyU9', 'fi5IJXCDs', '362362362', 'Febri Hariyadi', '', '', '0000-00-00'),
('iYDGaCQDM', 'g20VX0r3h', '123123123', 'Khusnul Yuliansyah Putra', 'L', 'Baron', '1998-10-15'),
('j1gD4Sei6', 'g20VX0r3h', '39090909090', 'Diva Anggraini', 'P', 'Nganjuk', '1998-05-16'),
('NJOgsxL8z', 'bf14I0amf', '465437345', 'Muhammad Rizky Ridho', '', '', '0000-00-00'),
('ukxWhAq84', 'bf14I0amf', '46346436436', 'Evan Dimas Darmono', 'L', 'Surabaya', '1997-10-18'),
('unCWwBalF', 'bf14I0amf', '35326436436', 'M. Ronaldo', '', '', '0000-00-00'),
('XKHcfzVUR', 'fi5IJXCDs', '46436437437', 'Alvaro Morata', 'L', 'Lengkong', '1999-03-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`c_admin`);

--
-- Indexes for table `benpel`
--
ALTER TABLE `benpel`
  ADD PRIMARY KEY (`c_benpel`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`c_chat`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`c_guru`);

--
-- Indexes for table `katbenpel`
--
ALTER TABLE `katbenpel`
  ADD PRIMARY KEY (`c_katbenpel`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`c_kelas`);

--
-- Indexes for table `orangtua`
--
ALTER TABLE `orangtua`
  ADD PRIMARY KEY (`c_orangtua`);

--
-- Indexes for table `pelanggaran`
--
ALTER TABLE `pelanggaran`
  ADD PRIMARY KEY (`c_pelanggaran`);

--
-- Indexes for table `relasichat`
--
ALTER TABLE `relasichat`
  ADD PRIMARY KEY (`c_chat`);

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`c_sanksi`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`c_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `c_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `relasichat`
--
ALTER TABLE `relasichat`
  MODIFY `c_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
