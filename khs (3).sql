-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2016 at 09:10 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`, `nama`, `foto`) VALUES
('admin1', '$2y$10$7g9TFyZa.tLs8pvRRSo3QeUTmqVv7iNwlqGu/ZYTr.zx1Sw4id4wq', 'ryfan', 'Bulu4auokl687xl3z9jmohvr2uzp0tybme.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detil_ujian`
--

CREATE TABLE `detil_ujian` (
  `id_detil` int(11) NOT NULL,
  `id_ujian` int(11) NOT NULL,
  `nim` char(10) NOT NULL,
  `nilai_uts` int(11) NOT NULL,
  `nilai_uas` int(11) NOT NULL,
  `nilai_tugas` int(11) NOT NULL,
  `nilai_absen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_ujian`
--

INSERT INTO `detil_ujian` (`id_detil`, `id_ujian`, `nim`, `nilai_uts`, `nilai_uas`, `nilai_tugas`, `nilai_absen`) VALUES
(3, 2, '1411502486', 0, 0, 0, 0),
(4, 2, '1411502493', 89, 74, 87, 100),
(5, 1, '1411502486', 0, 0, 0, 0),
(6, 1, '1411502493', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nid` int(10) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `jk` varchar(6) NOT NULL,
  `alamat_dosen` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nid`, `nama_dosen`, `jk`, `alamat_dosen`, `password`, `email`, `foto`) VALUES
(1411100100, 'Ari Untung ', 'Pria', 'Jalan Merak Kabur No 1213', '$2y$10$wK2LW5HfM2f31jiDo4aNTufxHj/ftDoEBNhbap9/Kcs.ugXKixbC6', 'aria@gmail.comcom', 'Manga Browserx4c6ity8awzt87g874057s9va2socn.jpg'),
(1411203203, 'Yunita Astuti', 'Wanita', 'Jalan Sendal Putus', '$2y$10$wK2LW5HfM2f31jiDo4aNTufxHj/ftDoEBNhbap9/Kcs.ugXKixbC6', 'yunita@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` int(10) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `jk` varchar(6) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mhs`, `jk`, `tempat_lahir`, `tgl_lahir`, `agama`, `nama_ortu`, `alamat`, `telp`, `foto`, `password`, `email`) VALUES
(1411502486, 'Yunita Cristiani', 'Wanita', 'bandung', '1996-10-10', 'Katolik', 'Andi Gundogan', 'Jalan Cempaka putih, RT 001/003, Kali Bata, Kota Tangerang', '0878812341', 'pass1.jpg', '$2y$10$TOTxDk6DLsN9KXgO/e6R8OaH1uZekWQLeM7.4Y1qAReRJ3EJKliHG', 'yunita@gmail.com'),
(1411502493, 'Ali Topan', 'Pria', 'Tangerang', '1996-11-22', 'Islam', 'Ahmad Sobirin', 'Pondok Asem, RT 001/001, Sepatan Timur, Kab. Tangerang', '087812035532', 'otakon5d9dcayydm4mjgaj141t8v7nl2tjnx.jpg', '$2y$10$TOTxDk6DLsN9KXgO/e6R8OaH1uZekWQLeM7.4Y1qAReRJ3EJKliHG', 'alitopan12@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `kode_matkul` char(5) NOT NULL,
  `nama_matkul` varchar(50) NOT NULL,
  `sks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`kode_matkul`, `nama_matkul`, `sks`) VALUES
('KP001', 'Pemrograman Berorientasi Objek', 3),
('KP002', 'Pemrograman Web', 3),
('KP003', 'Sistem Operasi', 3),
('KP004', 'Algoritma dan Struktur Data 1', 3),
('KP005', 'Interpersonal Skill', 2),
('KP006', 'Teori Bahasa dan Otomata', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id_ujian` int(5) NOT NULL,
  `tgl_ujian` date NOT NULL,
  `kode_matkul` char(5) NOT NULL,
  `nid` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id_ujian`, `tgl_ujian`, `kode_matkul`, `nid`) VALUES
(1, '2016-07-21', 'KP001', '1411100100'),
(2, '2016-08-11', 'KP002', '1411100100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `detil_ujian`
--
ALTER TABLE `detil_ujian`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `id_ujian` (`id_ujian`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`kode_matkul`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id_ujian`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detil_ujian`
--
ALTER TABLE `detil_ujian`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id_ujian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
