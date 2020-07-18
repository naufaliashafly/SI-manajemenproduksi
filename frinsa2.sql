-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 02:20 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frinsa2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang_cshp`
--

CREATE TABLE `barang_cshp` (
  `id_barangcshp` int(11) NOT NULL,
  `id_barangdatang` int(11) NOT NULL,
  `varietas` varchar(20) NOT NULL,
  `kodecshp` varchar(50) NOT NULL,
  `tanggalcshp` date NOT NULL,
  `bobotmasukcshp` int(30) NOT NULL,
  `bobotcshp` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `proses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_cshp`
--

INSERT INTO `barang_cshp` (`id_barangcshp`, `id_barangdatang`, `varietas`, `kodecshp`, `tanggalcshp`, `bobotmasukcshp`, `bobotcshp`, `id_user`, `status`, `proses`) VALUES
(1, 1, 'ADS', 'CS_ADS2002019-12-02', '2019-12-02', 270, 200, 1, 'di input', 'CS+HP'),
(2, 2, 'ADS', 'CS_ADS25002019-12-03', '2019-12-03', 3400, 2500, 1, 'di input', 'CS+HP'),
(3, 3, 'ADS', 'CS_ADS13002019-12-03', '2019-12-03', 1600, 1300, 1, 'di input', 'CS+HP'),
(5, 16, 'ATS', 'CS_ATS9002019-12-27', '2019-12-27', 1200, 900, 1, 'di input', 'CS+HP'),
(9, 21, 'ADS', 'CS_ADS3202020-02-13', '2020-02-13', 400, 320, 5, 'di input', ''),
(10, 22, 'ADS', 'CSHP_2020-03-12', '2020-03-12', 1200, 1090, 1, 'di edit', 'CS+HP'),
(11, 23, 'ADS', 'CS_ADS6502020-04-11', '2020-04-11', 800, 650, 5, 'di input', ''),
(12, 24, 'ADS', 'CS_ADS6102020-05-21', '2020-05-21', 700, 610, 5, 'di input', ''),
(14, 26, 'ADS', 'CS_ADS2982020-07-16', '2020-07-16', 400, 298, 5, 'di input', ''),
(15, 27, 'ADS', 'CS_ADS3782020-08-20', '2020-08-20', 500, 378, 5, 'di input', ''),
(18, 30, 'ADS', 'CS_ADS19702019-02-19', '2019-02-19', 2300, 1970, 1, 'di input', ''),
(19, 31, 'ADS', 'CS_ADS8872019-03-29', '2019-03-29', 1200, 887, 1, 'di input', ''),
(20, 32, 'ADS', 'CS_ADS5672019-04-24', '2019-04-24', 1000, 567, 1, 'di input', ''),
(21, 33, 'ADS', 'CS_ADS5682019-05-17', '2019-05-17', 800, 568, 1, 'di input', ''),
(22, 34, 'ADS', 'CS_ADS8902019-11-13', '2019-11-13', 1300, 890, 1, 'di input', ''),
(23, 36, 'ADS', 'CS_ADS8902019-11-13', '2019-11-13', 1300, 890, 1, 'di input', ''),
(24, 20, 'ADS', 'CS_ADS28792020-01-16', '2020-01-16', 3200, 2879, 1, 'di input', ''),
(25, 37, 'ADS', 'CS_ADS3002019-12-25', '2019-12-25', 500, 300, 1, 'di input', 'CS+HP'),
(26, 28, 'ATS', 'CS_ATS1902020-01-23', '2020-01-23', 300, 190, 1, 'di input', 'CS+HP'),
(27, 38, 'ADS', 'CS_ADS8792020-01-29', '2020-01-29', 1200, 879, 1, 'di input', 'CS+HP'),
(28, 39, 'ATS', 'CS_ATS3892020-02-12', '2020-02-12', 700, 389, 1, 'di input', 'CS+HP'),
(29, 40, 'ATS', 'CS_ATS02020-03-12', '2020-03-12', 0, 0, 1, 'di input', 'CS+HP'),
(31, 41, 'ATS', 'CS_ATS7002020-04-23', '2020-04-23', 900, 700, 1, 'di input', 'CS+HP');

-- --------------------------------------------------------

--
-- Table structure for table `barang_datang`
--

CREATE TABLE `barang_datang` (
  `id_barangdatang` int(11) NOT NULL,
  `id_statusbarangdatang` int(11) DEFAULT NULL,
  `varietas` varchar(11) NOT NULL,
  `blokmitra` varchar(11) NOT NULL,
  `jenisolahan` varchar(30) DEFAULT NULL,
  `kodebarang` varchar(30) DEFAULT NULL,
  `tanggaldatang` date NOT NULL,
  `bobotdatang` int(30) DEFAULT NULL,
  `kadarairawal` int(5) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `proses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_datang`
--

INSERT INTO `barang_datang` (`id_barangdatang`, `id_statusbarangdatang`, `varietas`, `blokmitra`, `jenisolahan`, `kodebarang`, `tanggaldatang`, `bobotdatang`, `kadarairawal`, `id_user`, `status`, `proses`) VALUES
(1, 1, 'ADS', 'AI', 'Natural', 'ADSAI45002019-12-02', '2019-12-02', 4500, 38, 1, 'input', 'Jemur'),
(2, 3, 'ADS', 'AI', 'FW', 'ADSAI34002019-12-03', '2019-12-03', 3400, 32, 1, 'di input', 'Jemur'),
(3, 2, 'ADS', 'AI', 'FW', 'ADSAI23002019-12-03', '2019-12-03', 2300, 34, 1, 'di input', 'Jemur'),
(4, 1, 'ADS', 'AI', 'FW', 'ADSAI12002019-12-03', '2019-12-03', 1200, 38, 1, 'di input', 'Jemur'),
(5, 1, 'ATS', 'AI', 'SW', 'ATSAI23002019-12-05', '2019-12-05', 2300, 38, 1, 'di input', 'Jemur'),
(6, 2, 'ATS', 'AI', 'SW', 'ATSAI5002019-12-05', '2019-12-05', 500, 35, 1, 'di input', 'Jemur'),
(7, 3, 'ADS', 'AI', 'Honey', 'ADSAI8002019-12-05', '2019-12-05', 800, 32, 1, 'di input', 'Jemur'),
(8, 2, 'ADS', 'AI', 'SW', 'ADSAI12002019-12-05', '2019-12-05', 1200, 35, 1, 'di input', 'Jemur'),
(11, 1, 'ADS', 'AI', 'FW', 'ADSAI10002019-12-17', '2019-12-17', 1000, 35, 1, 'di input', 'Jemur'),
(12, 3, 'ADS', 'AI', 'FW', 'ADSAI10002019-12-27', '2019-12-27', 1000, 32, 1, 'di edit', 'Jemur'),
(13, 2, 'ADS', 'AI', 'FW', 'ADSAI7002019-12-29', '2019-12-29', 700, 25, 1, 'di input', 'Jemur'),
(14, 1, 'ADS', 'AI', 'SW', 'ADSAI1002019-12-22', '2019-12-22', 100, 39, 1, 'di input', 'Jemur'),
(15, 1, 'ATS', 'P7', 'FW', 'ATSP72002019-12-17', '2019-12-17', 200, 39, 1, 'di input', 'Jemur'),
(16, 3, 'ATS', 'AI', 'FW', 'ATSAI12002019-12-26', '2019-12-26', 1200, 32, 1, 'di input', 'Jemur'),
(17, 2, 'ADS', 'AI', 'FW', 'ADSAI10002020-01-07', '2020-01-07', 1000, 34, 1, 'di input', 'Jemur'),
(18, 3, 'ADS', 'P7', 'FW', 'ADSP710002020-01-08', '2020-01-08', 1000, 32, 1, 'di input', 'Jemur'),
(19, 3, 'ATS', 'P7', 'FW', 'ATSP77002020-01-15', '2020-01-15', 700, 32, 1, 'di input', 'Jemur'),
(20, 3, 'ADS', 'AI', 'FW', 'ADSAI32002020-01-09', '2020-01-09', 3200, 32, 5, 'di input', 'Jemur'),
(21, 3, 'ADS', 'AI', 'FW', 'ADSAI4002020-02-06', '2020-02-06', 400, 32, 5, 'di input', 'Jemur'),
(22, 3, 'ADS', 'AI', 'FW', 'ADSAI12002020-03-11', '2020-03-11', 1200, 32, 5, 'di input', 'Jemur'),
(23, 3, 'ADS', 'AI', 'FW', 'ADSAI8002020-04-10', '2020-04-10', 800, 32, 5, 'di input', 'Jemur'),
(24, 3, 'ADS', 'AI', 'FW', 'ADSAI7002020-05-20', '2020-05-20', 700, 32, 5, 'di input', 'Jemur'),
(25, 3, 'ADS', 'AI', 'FW', 'ADSAI6002020-06-17', '2020-06-17', 600, 32, 5, 'di input', 'Jemur'),
(26, 3, 'ADS', 'AI', 'FW', 'ADSAI4002020-07-15', '2020-07-15', 400, 32, 5, 'di input', 'Jemur'),
(27, 3, 'ADS', 'AI', 'FW', 'ADSAI5002020-08-19', '2020-08-19', 500, 32, 5, 'di input', 'Jemur'),
(28, 3, 'ATS', 'AI', 'FW', 'ATSAI3002020-01-09', '2020-01-09', 300, 32, 5, 'di input', 'Jemur'),
(29, 3, 'ATS', 'AI', 'FW', 'ATSAI5002020-03-18', '2020-03-18', 500, 32, 5, 'di input', 'Jemur'),
(30, 3, 'ADS', 'P7', 'FW', 'ADSP723002019-02-12', '2019-02-12', 2300, 32, 1, 'di edit', 'Jemur'),
(31, 3, 'ADS', 'P7', 'Natural', 'ADSP712002019-03-14', '2019-03-14', 1200, 32, 1, 'di input', 'Jemur'),
(32, 3, 'ADS', 'P7', 'Natural', 'ADSP710002019-04-18', '2019-04-18', 1000, 32, 1, 'di input', 'Jemur'),
(33, 3, 'ADS', 'P7', 'Natural', 'ADSP78002019-05-15', '2019-05-15', 800, 32, 1, 'di input', 'Jemur'),
(34, 3, 'ADS', 'P7', 'Natural', 'ADSP75002019-06-19', '2019-06-19', 500, 32, 1, 'di input', 'Jemur'),
(35, 3, 'ADS', 'P7', 'Natural', 'ADSP79002019-07-23', '2019-07-23', 900, 32, 1, 'di input', 'Jemur'),
(36, 3, 'ADS', 'P7', 'Natural', 'ADSP78002019-06-19', '2019-06-19', 800, 32, 1, 'di input', 'Jemur'),
(37, 3, 'ADS', 'AI', 'Natural', 'ADSAI5002019-12-18', '2019-12-18', 500, 32, 1, 'di input', 'Jemur'),
(38, 3, 'ADS', 'AI', 'Honey', 'ADSAI12002020-01-08', '2020-01-08', 1200, 32, 1, 'di input', 'Jemur'),
(39, 3, 'ATS', 'P7', 'Natural', 'ATSP77002020-02-13', '2020-02-13', 700, 32, 1, 'di input', 'Jemur'),
(40, 3, 'ATS', 'P7', 'Natural', 'ATSP702020-03-12', '2020-03-12', 0, 0, 1, 'di input', 'Jemur'),
(41, 3, 'ATS', 'P7', 'Natural', 'ATSP79002020-04-09', '2020-04-09', 900, 32, 1, 'di input', 'Jemur');

-- --------------------------------------------------------

--
-- Table structure for table `barang_gudang`
--

CREATE TABLE `barang_gudang` (
  `id_baranggudang` int(11) NOT NULL,
  `id_barangdatang` int(11) NOT NULL,
  `id_letakgudang` int(11) NOT NULL,
  `bobot` int(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `proses` varchar(10) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_gudang`
--

INSERT INTO `barang_gudang` (`id_baranggudang`, `id_barangdatang`, `id_letakgudang`, `bobot`, `id_user`, `proses`, `status`) VALUES
(1, 2, 2, 2500, 1, '', 'di input'),
(2, 16, 17, 900, 1, '', 'di input');

-- --------------------------------------------------------

--
-- Table structure for table `barang_huller`
--

CREATE TABLE `barang_huller` (
  `id_baranghuller` int(11) NOT NULL,
  `id_barangdatang` int(11) NOT NULL,
  `tanggalhuller` date NOT NULL,
  `bobotmasukhull` int(30) NOT NULL,
  `bobothuller` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `proses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_huller`
--

INSERT INTO `barang_huller` (`id_baranghuller`, `id_barangdatang`, `tanggalhuller`, `bobotmasukhull`, `bobothuller`, `id_user`, `status`, `proses`) VALUES
(1, 1, '2019-12-02', 500, 300, 1, 'input', 'Huller'),
(2, 3, '2019-12-03', 2300, 2000, 1, 'di input', 'Huller'),
(3, 6, '2019-12-05', 400, 300, 1, 'di input', 'Huller'),
(4, 8, '2019-12-05', 1200, 800, 1, 'di input', 'Huller'),
(7, 4, '2019-12-11', 800, 700, 1, 'di input', 'Huller'),
(8, 17, '2020-01-07', 1000, 780, 1, 'di input', 'Huller');

-- --------------------------------------------------------

--
-- Table structure for table `barang_jemur`
--

CREATE TABLE `barang_jemur` (
  `id_barangjemur` int(11) NOT NULL,
  `id_barangdatang` int(11) NOT NULL,
  `id_posisibarang` int(11) NOT NULL,
  `tanggalmasukjemuran` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_jemur`
--

INSERT INTO `barang_jemur` (`id_barangjemur`, `id_barangdatang`, `id_posisibarang`, `tanggalmasukjemuran`, `id_user`, `status`) VALUES
(1, 1, 17, '2019-12-02', 1, 'di input'),
(2, 4, 17, '2019-12-03', 1, 'input'),
(3, 6, 2, '2019-12-12', 1, 'di input'),
(5, 11, 18, '2019-12-17', 1, 'di input'),
(6, 14, 17, '2019-12-29', 1, 'di input'),
(7, 15, 16, '2019-12-30', 1, 'di input');

-- --------------------------------------------------------

--
-- Table structure for table `barang_kering`
--

CREATE TABLE `barang_kering` (
  `id_barangkering` int(11) NOT NULL,
  `id_barangjemur` int(11) NOT NULL,
  `tanggalkering` date NOT NULL,
  `bobotkering` int(30) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_kering`
--

INSERT INTO `barang_kering` (`id_barangkering`, `id_barangjemur`, `tanggalkering`, `bobotkering`, `id_user`, `status`) VALUES
(1, 1, '2019-12-02', 500, 1, 'di input'),
(2, 3, '2019-12-11', 400, 1, 'di input'),
(4, 2, '0000-00-00', 800, 1, 'di input'),
(5, 6, '2019-12-31', 60, 1, 'di input'),
(6, 7, '2019-12-31', 100, 1, 'di input');

-- --------------------------------------------------------

--
-- Table structure for table `barang_ready`
--

CREATE TABLE `barang_ready` (
  `id_barangready` int(11) NOT NULL,
  `id_barangdatang` int(11) NOT NULL,
  `id_statusready` int(11) NOT NULL,
  `bobot` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `proses` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_ready`
--

INSERT INTO `barang_ready` (`id_barangready`, `id_barangdatang`, `id_statusready`, `bobot`, `id_user`, `status`, `proses`) VALUES
(1, 1, 2, 200, 1, 'di input', 'ready'),
(6, 3, 2, 1300, 1, 'di input', 'ready');

-- --------------------------------------------------------

--
-- Table structure for table `barang_sutongrading`
--

CREATE TABLE `barang_sutongrading` (
  `id_barangsutongrading` int(11) NOT NULL,
  `id_barangdatang` int(11) DEFAULT NULL,
  `varietas` varchar(20) NOT NULL,
  `kodesutongrading` varchar(30) NOT NULL,
  `tanggalsutongrading` date NOT NULL,
  `bobotmasuksut` int(10) NOT NULL,
  `MB` int(10) DEFAULT NULL,
  `BB` int(10) DEFAULT NULL,
  `PB` int(10) DEFAULT NULL,
  `L2` int(10) DEFAULT NULL,
  `L3` int(10) DEFAULT NULL,
  `PBK` int(10) DEFAULT NULL,
  `ELV` int(10) DEFAULT NULL,
  `bobotsutongrading` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `proses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_sutongrading`
--

INSERT INTO `barang_sutongrading` (`id_barangsutongrading`, `id_barangdatang`, `varietas`, `kodesutongrading`, `tanggalsutongrading`, `bobotmasuksut`, `MB`, `BB`, `PB`, `L2`, `L3`, `PBK`, `ELV`, `bobotsutongrading`, `id_user`, `status`, `proses`) VALUES
(1, 1, 'ADS', 'SUT_ADS2702019-12-02', '2019-12-02', 300, 90, 90, 90, 0, 0, 0, 0, 270, 1, 'input', 'Suton+Grading'),
(2, 3, 'ADS', 'SUT_ADS16002019-12-03', '2019-12-03', 2000, 500, 500, 200, 200, 200, 0, 0, 1600, 1, 'input', 'Suton+Grading'),
(4, 6, 'ATS', 'SUT_ATS2502019-12-20', '2019-12-20', 300, 50, 50, 50, 50, 10, 20, 20, 250, 1, 'input', 'Suton+Grading'),
(5, 7, 'ADS', 'SUT_ADS2002019-12-17', '2019-12-17', 800, 50, 50, 50, 50, 0, 0, 0, 200, 1, 'di input', 'Suton+Grading'),
(6, 17, 'ADS', 'SUT_ADS6502020-01-08', '2020-01-08', 780, 500, 50, 50, 0, 50, 0, 0, 650, 1, 'di input', 'Suton+Grading');

-- --------------------------------------------------------

--
-- Table structure for table `blokmitra`
--

CREATE TABLE `blokmitra` (
  `blokmitra` varchar(11) NOT NULL,
  `id_blokmitra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blokmitra`
--

INSERT INTO `blokmitra` (`blokmitra`, `id_blokmitra`) VALUES
('AI', 1),
('P7', 4),
('GCP', 5),
('GPT', 6);

-- --------------------------------------------------------

--
-- Stand-in structure for view `grafik`
-- (See below for the actual view)
--
CREATE TABLE `grafik` (
`blokmitra` varchar(11)
,`varietas` varchar(11)
,`tanggaldatang` date
,`bobotcshp` int(30)
,`bobotmasukcshp` int(30)
,`rendemencshp` decimal(40,8)
,`bulan` varchar(9)
);

-- --------------------------------------------------------

--
-- Table structure for table `input_kadar_air`
--

CREATE TABLE `input_kadar_air` (
  `id_inputkadarair` int(11) NOT NULL,
  `id_barangjemur` int(11) DEFAULT NULL,
  `harike` int(3) DEFAULT NULL,
  `kadarair` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenisolahan`
--

CREATE TABLE `jenisolahan` (
  `id_jenisolahan` int(11) NOT NULL,
  `jenisolahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenisolahan`
--

INSERT INTO `jenisolahan` (`id_jenisolahan`, `jenisolahan`) VALUES
(1, 'FW'),
(2, 'SW'),
(3, 'Honey'),
(4, 'Natural');

-- --------------------------------------------------------

--
-- Table structure for table `letakgudang`
--

CREATE TABLE `letakgudang` (
  `id_letakgudang` int(11) NOT NULL,
  `letakgudang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `letakgudang`
--

INSERT INTO `letakgudang` (`id_letakgudang`, `letakgudang`) VALUES
(1, '1A'),
(2, '1B'),
(3, '1C'),
(4, '1D'),
(5, '2A'),
(6, '2B'),
(7, '2C'),
(8, '2D'),
(9, '3A'),
(10, '3B'),
(11, '3C'),
(12, '3D'),
(13, '4A'),
(14, '4B'),
(15, '4C'),
(16, '4D'),
(17, '5A'),
(18, '5B'),
(19, '5C'),
(20, '5D'),
(21, '6A'),
(22, '6B'),
(23, '6C'),
(24, '6D'),
(25, '7A'),
(26, '7B'),
(27, '7C'),
(28, '7D'),
(29, '8A'),
(30, '8B'),
(31, '8C'),
(32, '8D'),
(33, '9A'),
(34, '9B'),
(35, '9C'),
(36, '9D'),
(37, '10A'),
(38, '10B'),
(39, '10C'),
(40, '10D'),
(41, '11A'),
(42, '11B'),
(43, '11C'),
(44, '11D'),
(45, '12A'),
(46, '12B'),
(47, '12C'),
(48, '12D'),
(49, '13A'),
(50, '13B'),
(51, '13C'),
(52, '13D'),
(53, '14A'),
(54, '14B'),
(55, '14C'),
(56, '14D'),
(57, '15A'),
(58, '15B'),
(59, '15C'),
(60, '15D'),
(61, '16'),
(62, '17'),
(63, '18'),
(64, '19'),
(65, '20'),
(66, '21'),
(67, '5E'),
(68, '5F'),
(69, '5G'),
(70, '5H'),
(71, '6E'),
(72, '6F'),
(73, '6G'),
(74, '6H'),
(75, '7E'),
(76, '7F'),
(77, '7G'),
(78, '7H'),
(79, '8E'),
(80, '8F'),
(81, '8G'),
(82, '8H'),
(83, '9E'),
(84, '9F'),
(85, '9G'),
(86, '9H'),
(87, '10E'),
(88, '10F'),
(89, '10G'),
(90, '10H'),
(91, '11E'),
(92, '11F'),
(93, '11G'),
(94, '11H'),
(95, '12E'),
(96, '12F'),
(97, '12G'),
(98, '12H'),
(99, '13E'),
(100, '13F'),
(101, '13G'),
(102, '13H'),
(103, '14E'),
(104, '14F'),
(105, '14G'),
(106, '14H'),
(107, '15E'),
(108, '15F'),
(109, '15G'),
(110, '15H'),
(112, 'Luar');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `varietas` varchar(20) NOT NULL,
  `jenisolahan` varchar(30) NOT NULL,
  `kodepesan` varchar(50) NOT NULL,
  `tanggalpesan` date NOT NULL,
  `bobotpesan` int(20) NOT NULL,
  `tanggalkirim` date NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `varietas`, `jenisolahan`, `kodepesan`, `tanggalpesan`, `bobotpesan`, `tanggalkirim`, `status`) VALUES
(2, 'ADS', 'FW', 'ADSFW18002019-12-30', '2019-12-30', 1800, '2019-12-31', 'di input'),
(3, 'ADS', 'SW', 'ADSSW12002020-01-01', '2020-01-01', 1200, '2020-01-16', 'di input'),
(4, 'ATS', 'SW', 'ATSSW3002020-01-22', '2020-01-22', 300, '2020-01-31', 'di input');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_barang`
--

CREATE TABLE `pesanan_barang` (
  `id_pesanan` int(11) NOT NULL,
  `id_barangdatang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan_barang`
--

INSERT INTO `pesanan_barang` (`id_pesanan`, `id_barangdatang`) VALUES
(2, 4),
(2, 11),
(3, 8),
(4, 6);

-- --------------------------------------------------------

--
-- Table structure for table `posisibarang`
--

CREATE TABLE `posisibarang` (
  `id_posisibarang` int(11) NOT NULL,
  `posisibarang` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posisibarang`
--

INSERT INTO `posisibarang` (`id_posisibarang`, `posisibarang`) VALUES
(1, 'A1'),
(2, 'A2'),
(3, 'A3'),
(4, 'A4'),
(5, 'A5'),
(6, 'A6'),
(7, 'B1'),
(8, 'B2'),
(9, 'B3'),
(10, 'B4'),
(11, 'B5'),
(12, 'B6'),
(13, 'C1'),
(14, 'C2'),
(15, 'C3'),
(16, 'C4'),
(17, 'C5'),
(18, 'C6'),
(19, 'D1'),
(20, 'D2'),
(21, 'D3'),
(22, 'D4'),
(23, 'D5'),
(24, 'D6'),
(25, 'E1'),
(26, 'E2'),
(27, 'E3'),
(28, 'E4'),
(29, 'E5'),
(30, 'E6'),
(31, 'F1'),
(32, 'F2'),
(33, 'F3'),
(34, 'F4'),
(35, 'F5'),
(36, 'F6');

-- --------------------------------------------------------

--
-- Table structure for table `statusbarangdatang`
--

CREATE TABLE `statusbarangdatang` (
  `id_statusbarangdatang` int(11) NOT NULL,
  `statusbarangdatang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusbarangdatang`
--

INSERT INTO `statusbarangdatang` (`id_statusbarangdatang`, `statusbarangdatang`) VALUES
(1, 'Cherry'),
(2, 'Gabah'),
(3, 'Green Bean');

-- --------------------------------------------------------

--
-- Table structure for table `statusready`
--

CREATE TABLE `statusready` (
  `id_statusready` int(11) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `statusready`
--

INSERT INTO `statusready` (`id_statusready`, `status`) VALUES
(1, 'READY'),
(2, 'SOLD');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_userrole` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `username` varchar(30) NOT NULL,
  `HP` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_userrole`, `nama`, `username`, `HP`, `password`, `is_active`, `date_created`) VALUES
(1, 1, 'Admin', 'admin', '081564705073', 'admin', 1, 0),
(2, 1, 'aufa', 'aufa', '081564705073999', 'aufa', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_akses_menu`
--

CREATE TABLE `user_akses_menu` (
  `id_userakses` int(11) NOT NULL,
  `id_userrole` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_akses_menu`
--

INSERT INTO `user_akses_menu` (`id_userakses`, `id_userrole`, `id_menu`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 3, 1),
(5, 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id_menu`, `menu`) VALUES
(1, 'STOK BARANG'),
(2, 'LAPORAN'),
(3, 'ADMIN');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_userrole` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_userrole`, `role`) VALUES
(1, 'Manajer Produksi'),
(2, 'Manajer Pemasaran'),
(3, 'Supervisor'),
(4, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_submenu` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `sub_menu` varchar(128) NOT NULL,
  `url` varchar(256) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_submenu`, `id_menu`, `sub_menu`, `url`, `icon`, `is_active`) VALUES
(8, 3, 'Kelola User', 'user', 'fas fa-fw fa-user-edit', 1),
(9, 3, 'Input Pesanan', 'pesanan', 'fas fa-fw fa-folder-plus', 1),
(10, 2, 'Laporan Barang', 'laporan', 'fas fa-fw fa-folder-open', 1),
(11, 2, 'Pesanan Barang', 'pesanan/laporan', 'fas fs-fw fa-clipboard', 1),
(12, 1, 'Stok Proses', 'stok/proses', 'fas fa-fw fa-spinner', 1),
(13, 1, 'Stok Gudang', 'stok/gudang', 'fas fa-fw fa-warehouse', 1),
(14, 1, 'Stok Ready', 'stok/ready', 'fas fa-fw fa-check', 1),
(15, 1, 'Stok Pabrik', 'stok', 'fas fa-fw fa-boxes', 1),
(16, 3, 'Varietas & Blok/Mitra', 'tabelvarblok', 'fas fa-fw fa-list', 1),
(17, 2, 'Barang Keluar', 'laporan/keluar', 'fas fa-fw fa-clipboard-check', 1);

-- --------------------------------------------------------

--
-- Table structure for table `varietas`
--

CREATE TABLE `varietas` (
  `varietas` varchar(20) NOT NULL,
  `id_varietas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `varietas`
--

INSERT INTO `varietas` (`varietas`, `id_varietas`) VALUES
('ADS', 1),
('ATS', 2),
('P88', 3),
('BOR', 4),
('ooopp', 5);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barangcshp`
-- (See below for the actual view)
--
CREATE TABLE `view_barangcshp` (
`id_barangdatang` int(11)
,`kodebarang` varchar(30)
,`tanggalcshp` date
,`bobotmasukcshp` int(30)
,`bobotcshp` int(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_baranghuller`
-- (See below for the actual view)
--
CREATE TABLE `view_baranghuller` (
`id_barangdatang` int(11)
,`kodebarang` varchar(30)
,`tanggalhuller` date
,`bobotmasukhull` int(30)
,`bobothuller` int(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barangjemur`
-- (See below for the actual view)
--
CREATE TABLE `view_barangjemur` (
`id_barangdatang` int(11)
,`kodebarang` varchar(30)
,`tanggalmasukjemuran` date
,`posisibarang` varchar(2)
,`jenisolahan` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_barangkering`
-- (See below for the actual view)
--
CREATE TABLE `view_barangkering` (
`id_barangjemur` int(11)
,`id_barangdatang` int(11)
,`kodebarang` varchar(30)
,`tanggalkering` date
,`bobotkering` int(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_cekbox`
-- (See below for the actual view)
--
CREATE TABLE `view_cekbox` (
`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`id_barangdatang` int(11)
,`kodebarang` varchar(50)
,`bobotdatang` int(30)
,`proses` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_datanghuller`
-- (See below for the actual view)
--
CREATE TABLE `view_datanghuller` (
`id_barangdatang` int(11)
,`bobotkering` int(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_groupgudang`
-- (See below for the actual view)
--
CREATE TABLE `view_groupgudang` (
`id_baranggudang` int(11)
,`id_barangdatang` int(11)
,`id_letakgudang` int(11)
,`Bobot` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_gudang`
-- (See below for the actual view)
--
CREATE TABLE `view_gudang` (
`id_barangdatang` int(11)
,`kodebarang` varchar(30)
,`letakgudang` varchar(5)
,`bobot` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pesananbarang`
-- (See below for the actual view)
--
CREATE TABLE `view_pesananbarang` (
`id_pesanan` int(11)
,`id_barangdatang` int(11)
,`kodebarang` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_ready`
-- (See below for the actual view)
--
CREATE TABLE `view_ready` (
`id_barangdatang` int(11)
,`kodebarang` varchar(30)
,`bobot` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stokcshp`
-- (See below for the actual view)
--
CREATE TABLE `view_stokcshp` (
`id_barangdatang` int(11)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobotall` decimal(51,0)
,`proses` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stokgabah`
-- (See below for the actual view)
--
CREATE TABLE `view_stokgabah` (
`id_barangdatang` int(11)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobotall` int(30)
,`proses` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stokgb`
-- (See below for the actual view)
--
CREATE TABLE `view_stokgb` (
`id_barangdatang` int(11)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobotall` int(30)
,`proses` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stokgudang`
-- (See below for the actual view)
--
CREATE TABLE `view_stokgudang` (
`id_barangdatang` int(11)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobot` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stokhitung`
-- (See below for the actual view)
--
CREATE TABLE `view_stokhitung` (
`id` int(11)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobotjemur` decimal(65,0)
,`bobothuller` decimal(65,0)
,`bobotsuton` decimal(65,0)
,`bobotcshp` decimal(65,0)
,`bobotready` decimal(65,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stokhuller`
-- (See below for the actual view)
--
CREATE TABLE `view_stokhuller` (
`id_barangdatang` int(11)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobotall` decimal(51,0)
,`proses` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stokjemur`
-- (See below for the actual view)
--
CREATE TABLE `view_stokjemur` (
`id_barangdatang` int(11)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobotall` int(30)
,`proses` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stokproses`
-- (See below for the actual view)
--
CREATE TABLE `view_stokproses` (
`id` int(11)
,`proses` varchar(30)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobotall` decimal(51,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_stoksuton`
-- (See below for the actual view)
--
CREATE TABLE `view_stoksuton` (
`id_barangdatang` int(11)
,`varietas` varchar(11)
,`jenisolahan` varchar(30)
,`bobotall` decimal(32,0)
,`proses` varchar(30)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_sutongrading`
-- (See below for the actual view)
--
CREATE TABLE `view_sutongrading` (
`id_barangdatang` int(11)
,`varietas` varchar(20)
,`kodebarang` varchar(30)
,`kodesutongrading` varchar(30)
,`tanggalsutongrading` date
,`bobotmasuksut` int(10)
,`MB` int(10)
,`BB` int(10)
,`PB` int(10)
,`L2` int(10)
,`L3` int(10)
,`PBK` int(10)
,`ELV` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_user`
-- (See below for the actual view)
--
CREATE TABLE `view_user` (
`id_user` int(11)
,`nama` varchar(128)
,`username` varchar(30)
,`HP` varchar(30)
,`password` varchar(256)
,`role` varchar(128)
,`is_active` varchar(11)
);

-- --------------------------------------------------------

--
-- Structure for view `grafik`
--
DROP TABLE IF EXISTS `grafik`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `grafik`  AS  select `barang_datang`.`blokmitra` AS `blokmitra`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`tanggaldatang` AS `tanggaldatang`,`barang_cshp`.`bobotcshp` AS `bobotcshp`,`barang_cshp`.`bobotmasukcshp` AS `bobotmasukcshp`,avg((100 * (`barang_cshp`.`bobotcshp` / `barang_cshp`.`bobotmasukcshp`))) AS `rendemencshp`,monthname(`barang_datang`.`tanggaldatang`) AS `bulan` from (`barang_datang` join `barang_cshp` on((`barang_cshp`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) group by `barang_cshp`.`kodecshp` order by `barang_datang`.`blokmitra`,`barang_datang`.`varietas`,`barang_datang`.`tanggaldatang` ;

-- --------------------------------------------------------

--
-- Structure for view `view_barangcshp`
--
DROP TABLE IF EXISTS `view_barangcshp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barangcshp`  AS  select `barang_cshp`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_cshp`.`tanggalcshp` AS `tanggalcshp`,`barang_cshp`.`bobotmasukcshp` AS `bobotmasukcshp`,`barang_cshp`.`bobotcshp` AS `bobotcshp` from (`barang_cshp` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_cshp`.`id_barangdatang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_baranghuller`
--
DROP TABLE IF EXISTS `view_baranghuller`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_baranghuller`  AS  select `barang_huller`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_huller`.`tanggalhuller` AS `tanggalhuller`,`barang_huller`.`bobotmasukhull` AS `bobotmasukhull`,`barang_huller`.`bobothuller` AS `bobothuller` from (`barang_huller` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_huller`.`id_barangdatang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_barangjemur`
--
DROP TABLE IF EXISTS `view_barangjemur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barangjemur`  AS  select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_jemur`.`tanggalmasukjemuran` AS `tanggalmasukjemuran`,`posisibarang`.`posisibarang` AS `posisibarang`,`barang_datang`.`jenisolahan` AS `jenisolahan` from ((`barang_datang` left join `barang_jemur` on((`barang_jemur`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) left join `posisibarang` on((`posisibarang`.`id_posisibarang` = `barang_jemur`.`id_posisibarang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_barangkering`
--
DROP TABLE IF EXISTS `view_barangkering`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_barangkering`  AS  select `barang_jemur`.`id_barangjemur` AS `id_barangjemur`,`barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_kering`.`tanggalkering` AS `tanggalkering`,`barang_kering`.`bobotkering` AS `bobotkering` from ((`barang_jemur` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_jemur`.`id_barangdatang`))) join `barang_kering` on((`barang_kering`.`id_barangjemur` = `barang_jemur`.`id_barangjemur`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_cekbox`
--
DROP TABLE IF EXISTS `view_cekbox`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_cekbox`  AS  select `barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_jemur`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_datang`.`bobotdatang` AS `bobotdatang`,`barang_datang`.`proses` AS `proses` from (`barang_jemur` join `barang_datang` on((`barang_jemur`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where ((not(`barang_datang`.`id_barangdatang` in (select `barang_jemur`.`id_barangdatang` from (`barang_jemur` join `barang_kering` on((`barang_kering`.`id_barangjemur` = `barang_jemur`.`id_barangjemur`)))))) and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) union select `barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_huller`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_huller`.`bobotmasukhull` AS `bobotmasukhull`,`barang_huller`.`proses` AS `proses` from (`barang_huller` join `barang_datang` on((`barang_huller`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where ((not(`barang_datang`.`id_barangdatang` in (select `barang_sutongrading`.`id_barangdatang` from `barang_sutongrading` union select `barang_cshp`.`id_barangdatang` from `barang_cshp`))) and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) union select `barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_sutongrading`.`id_barangdatang` AS `id_barangdatang`,`barang_sutongrading`.`kodesutongrading` AS `kodesutongrading`,`barang_sutongrading`.`bobotmasuksut` AS `bobotmasuksut`,`barang_sutongrading`.`proses` AS `proses` from (`barang_sutongrading` join `barang_datang` on((`barang_sutongrading`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where ((not(`barang_datang`.`id_barangdatang` in (select `barang_cshp`.`id_barangdatang` from `barang_cshp`))) and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) union select `barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_cshp`.`id_barangdatang` AS `id_barangdatang`,`barang_cshp`.`kodecshp` AS `kodecshp`,`barang_cshp`.`bobotmasukcshp` AS `bobotmasukcshp`,`barang_cshp`.`proses` AS `proses` from (`barang_cshp` join `barang_datang` on((`barang_cshp`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where ((not(`barang_datang`.`id_barangdatang` in (select `barang_ready`.`id_barangdatang` from `barang_ready`))) and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) union select `barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_ready`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_ready`.`bobot` AS `bobot`,`statusready`.`status` AS `proses` from ((`barang_ready` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_ready`.`id_barangdatang`))) join `statusready` on((`statusready`.`id_statusready` = `barang_ready`.`id_statusready`))) where ((`barang_ready`.`id_statusready` = '1') and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) order by `proses` ;

-- --------------------------------------------------------

--
-- Structure for view `view_datanghuller`
--
DROP TABLE IF EXISTS `view_datanghuller`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_datanghuller`  AS  select `barang_jemur`.`id_barangdatang` AS `id_barangdatang`,`barang_kering`.`bobotkering` AS `bobotkering` from (`barang_jemur` join `barang_kering` on((`barang_kering`.`id_barangjemur` = `barang_jemur`.`id_barangjemur`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_groupgudang`
--
DROP TABLE IF EXISTS `view_groupgudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_groupgudang`  AS  select `barang_gudang`.`id_baranggudang` AS `id_baranggudang`,`barang_gudang`.`id_barangdatang` AS `id_barangdatang`,`barang_gudang`.`id_letakgudang` AS `id_letakgudang`,`barang_gudang`.`bobot` AS `Bobot` from `barang_gudang` where (not(`barang_gudang`.`id_barangdatang` in (select `barang_gudang`.`id_barangdatang` from (`barang_gudang` join `barang_ready` on((`barang_gudang`.`id_barangdatang` = `barang_ready`.`id_barangdatang`)))))) group by `barang_gudang`.`id_letakgudang`,`barang_gudang`.`bobot` order by `barang_gudang`.`id_baranggudang` ;

-- --------------------------------------------------------

--
-- Structure for view `view_gudang`
--
DROP TABLE IF EXISTS `view_gudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_gudang`  AS  select `barang_gudang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`letakgudang`.`letakgudang` AS `letakgudang`,`barang_gudang`.`bobot` AS `bobot` from ((`barang_gudang` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_gudang`.`id_barangdatang`))) join `letakgudang` on((`letakgudang`.`id_letakgudang` = `barang_gudang`.`id_letakgudang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_pesananbarang`
--
DROP TABLE IF EXISTS `view_pesananbarang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pesananbarang`  AS  select `pesanan_barang`.`id_pesanan` AS `id_pesanan`,`pesanan_barang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang` from (`pesanan_barang` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `pesanan_barang`.`id_barangdatang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_ready`
--
DROP TABLE IF EXISTS `view_ready`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ready`  AS  select `barang_ready`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_ready`.`bobot` AS `bobot` from (`barang_ready` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_ready`.`id_barangdatang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_stokcshp`
--
DROP TABLE IF EXISTS `view_stokcshp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stokcshp`  AS  select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,sum(`barang_cshp`.`bobotmasukcshp`) AS `bobotall`,`barang_cshp`.`proses` AS `proses` from (`barang_cshp` join `barang_datang` on((`barang_cshp`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where (not(`barang_datang`.`id_barangdatang` in (select `barang_ready`.`id_barangdatang` from `barang_ready`))) group by `barang_datang`.`varietas`,`barang_datang`.`jenisolahan` order by `barang_datang`.`varietas` ;

-- --------------------------------------------------------

--
-- Structure for view `view_stokgabah`
--
DROP TABLE IF EXISTS `view_stokgabah`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stokgabah`  AS  select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_kering`.`bobotkering` AS `bobotall`,`barang_datang`.`proses` AS `proses` from ((`barang_kering` join `barang_jemur` on((`barang_jemur`.`id_barangjemur` = `barang_kering`.`id_barangjemur`))) join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_jemur`.`id_barangdatang`))) where (not(`barang_datang`.`id_barangdatang` in (select `barang_huller`.`id_barangdatang` from `barang_huller`))) union select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_datang`.`bobotdatang` AS `bobot`,`barang_datang`.`proses` AS `proses` from `barang_datang` where ((`barang_datang`.`id_statusbarangdatang` = '2') and (not(`barang_datang`.`id_barangdatang` in (select `barang_huller`.`id_barangdatang` from `barang_huller`)))) order by `varietas`,`jenisolahan` ;

-- --------------------------------------------------------

--
-- Structure for view `view_stokgb`
--
DROP TABLE IF EXISTS `view_stokgb`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stokgb`  AS  select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_datang`.`bobotdatang` AS `bobotall`,`barang_datang`.`proses` AS `proses` from `barang_datang` where ((`barang_datang`.`id_statusbarangdatang` = '3') and (not(`barang_datang`.`id_barangdatang` in (select `barang_sutongrading`.`id_barangdatang` from `barang_sutongrading` union select `barang_cshp`.`id_barangdatang` from `barang_cshp` union select `barang_ready`.`id_barangdatang` from `barang_ready`)))) union select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_sutongrading`.`bobotsutongrading` AS `bobotall`,`barang_sutongrading`.`proses` AS `proses` from (`barang_sutongrading` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_sutongrading`.`id_barangdatang`))) where (not(`barang_sutongrading`.`id_barangdatang` in (select `barang_cshp`.`id_barangdatang` from `barang_cshp`))) union select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_cshp`.`bobotcshp` AS `bobotall`,`barang_cshp`.`proses` AS `proses` from (`barang_cshp` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_cshp`.`id_barangdatang`))) where (not(`barang_cshp`.`id_barangdatang` in (select `barang_ready`.`id_barangdatang` from `barang_ready`))) union select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_huller`.`bobothuller` AS `bobotall`,`barang_huller`.`proses` AS `proses` from (`barang_huller` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_huller`.`id_barangdatang`))) where (not(`barang_huller`.`id_barangdatang` in (select `barang_sutongrading`.`id_barangdatang` from `barang_sutongrading`))) order by `varietas`,`jenisolahan` ;

-- --------------------------------------------------------

--
-- Structure for view `view_stokgudang`
--
DROP TABLE IF EXISTS `view_stokgudang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stokgudang`  AS  select `barang_gudang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_gudang`.`bobot` AS `bobot` from (`barang_gudang` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_gudang`.`id_barangdatang`))) where (not(`barang_gudang`.`id_barangdatang` in (select `barang_ready`.`id_barangdatang` from `barang_ready`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_stokhitung`
--
DROP TABLE IF EXISTS `view_stokhitung`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stokhitung`  AS  select `view_stokproses`.`id` AS `id`,`view_stokproses`.`varietas` AS `varietas`,`view_stokproses`.`jenisolahan` AS `jenisolahan`,sum((case when (`view_stokproses`.`proses` = 'Jemur') then `view_stokproses`.`bobotall` else 0 end)) AS `bobotjemur`,sum((case when (`view_stokproses`.`proses` = 'Huller') then `view_stokproses`.`bobotall` else 0 end)) AS `bobothuller`,sum((case when (`view_stokproses`.`proses` = 'Suton+Grading') then `view_stokproses`.`bobotall` else 0 end)) AS `bobotsuton`,sum((case when (`view_stokproses`.`proses` = 'CS+HP') then `view_stokproses`.`bobotall` else 0 end)) AS `bobotcshp`,sum((case when (`view_stokproses`.`proses` = 'ready') then `view_stokproses`.`bobotall` else 0 end)) AS `bobotready` from `view_stokproses` group by `view_stokproses`.`varietas`,`view_stokproses`.`jenisolahan` ;

-- --------------------------------------------------------

--
-- Structure for view `view_stokhuller`
--
DROP TABLE IF EXISTS `view_stokhuller`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stokhuller`  AS  select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,sum(`barang_huller`.`bobotmasukhull`) AS `bobotall`,`barang_huller`.`proses` AS `proses` from (`barang_huller` join `barang_datang` on((`barang_huller`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where (not(`barang_datang`.`id_barangdatang` in (select `barang_sutongrading`.`id_barangdatang` from `barang_sutongrading` union select `barang_cshp`.`id_barangdatang` from `barang_cshp`))) group by `barang_datang`.`varietas`,`barang_datang`.`jenisolahan` order by `barang_datang`.`varietas` ;

-- --------------------------------------------------------

--
-- Structure for view `view_stokjemur`
--
DROP TABLE IF EXISTS `view_stokjemur`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stokjemur`  AS  select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,`barang_datang`.`bobotdatang` AS `bobotall`,`barang_datang`.`proses` AS `proses` from (`barang_jemur` join `barang_datang` on((`barang_jemur`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where (not(`barang_datang`.`id_barangdatang` in (select `barang_jemur`.`id_barangdatang` from (`barang_jemur` join `barang_kering` on((`barang_kering`.`id_barangjemur` = `barang_jemur`.`id_barangjemur`)))))) order by `barang_datang`.`varietas` ;

-- --------------------------------------------------------

--
-- Structure for view `view_stokproses`
--
DROP TABLE IF EXISTS `view_stokproses`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stokproses`  AS  select `barang_datang`.`id_barangdatang` AS `id`,`barang_datang`.`proses` AS `proses`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,sum(`barang_datang`.`bobotdatang`) AS `bobotall` from (`barang_jemur` join `barang_datang` on((`barang_jemur`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where ((not(`barang_datang`.`id_barangdatang` in (select `barang_jemur`.`id_barangdatang` from (`barang_jemur` join `barang_kering` on((`barang_kering`.`id_barangjemur` = `barang_jemur`.`id_barangjemur`)))))) and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) group by `barang_datang`.`varietas`,`barang_datang`.`jenisolahan` union select `barang_datang`.`id_barangdatang` AS `id`,`barang_huller`.`proses` AS `proses`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,sum(`barang_huller`.`bobotmasukhull`) AS `bobotall` from (`barang_huller` join `barang_datang` on((`barang_huller`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where ((not(`barang_datang`.`id_barangdatang` in (select `barang_sutongrading`.`id_barangdatang` from `barang_sutongrading` union select `barang_cshp`.`id_barangdatang` from `barang_cshp`))) and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) group by `barang_datang`.`varietas`,`barang_datang`.`jenisolahan` union select `barang_datang`.`id_barangdatang` AS `id`,`barang_sutongrading`.`proses` AS `proses`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,sum(`barang_sutongrading`.`bobotmasuksut`) AS `bobotall` from (`barang_sutongrading` join `barang_datang` on((`barang_sutongrading`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where ((not(`barang_datang`.`id_barangdatang` in (select `barang_cshp`.`id_barangdatang` from `barang_cshp`))) and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) group by `barang_datang`.`varietas`,`barang_datang`.`jenisolahan` union select `barang_datang`.`id_barangdatang` AS `id`,`barang_cshp`.`proses` AS `proses`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,sum(`barang_cshp`.`bobotmasukcshp`) AS `bobotall` from (`barang_cshp` join `barang_datang` on((`barang_cshp`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where ((not(`barang_datang`.`id_barangdatang` in (select `barang_ready`.`id_barangdatang` from `barang_ready`))) and (not(`barang_datang`.`id_barangdatang` in (select `pesanan_barang`.`id_barangdatang` from `pesanan_barang`)))) group by `barang_datang`.`varietas`,`barang_datang`.`jenisolahan` order by `varietas` ;

-- --------------------------------------------------------

--
-- Structure for view `view_stoksuton`
--
DROP TABLE IF EXISTS `view_stoksuton`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stoksuton`  AS  select `barang_datang`.`id_barangdatang` AS `id_barangdatang`,`barang_datang`.`varietas` AS `varietas`,`barang_datang`.`jenisolahan` AS `jenisolahan`,sum(`barang_sutongrading`.`bobotmasuksut`) AS `bobotall`,`barang_sutongrading`.`proses` AS `proses` from (`barang_sutongrading` join `barang_datang` on((`barang_sutongrading`.`id_barangdatang` = `barang_datang`.`id_barangdatang`))) where (not(`barang_datang`.`id_barangdatang` in (select `barang_cshp`.`id_barangdatang` from `barang_cshp`))) group by `barang_datang`.`varietas`,`barang_datang`.`jenisolahan` order by `barang_datang`.`varietas` ;

-- --------------------------------------------------------

--
-- Structure for view `view_sutongrading`
--
DROP TABLE IF EXISTS `view_sutongrading`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sutongrading`  AS  select `barang_sutongrading`.`id_barangdatang` AS `id_barangdatang`,`barang_sutongrading`.`varietas` AS `varietas`,`barang_datang`.`kodebarang` AS `kodebarang`,`barang_sutongrading`.`kodesutongrading` AS `kodesutongrading`,`barang_sutongrading`.`tanggalsutongrading` AS `tanggalsutongrading`,`barang_sutongrading`.`bobotmasuksut` AS `bobotmasuksut`,`barang_sutongrading`.`MB` AS `MB`,`barang_sutongrading`.`BB` AS `BB`,`barang_sutongrading`.`PB` AS `PB`,`barang_sutongrading`.`L2` AS `L2`,`barang_sutongrading`.`L3` AS `L3`,`barang_sutongrading`.`PBK` AS `PBK`,`barang_sutongrading`.`ELV` AS `ELV` from (`barang_sutongrading` join `barang_datang` on((`barang_datang`.`id_barangdatang` = `barang_sutongrading`.`id_barangdatang`))) ;

-- --------------------------------------------------------

--
-- Structure for view `view_user`
--
DROP TABLE IF EXISTS `view_user`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_user`  AS  select `user`.`id_user` AS `id_user`,`user`.`nama` AS `nama`,`user`.`username` AS `username`,`user`.`HP` AS `HP`,`user`.`password` AS `password`,`user_role`.`role` AS `role`,(case when (`user`.`is_active` = '1') then 'aktif' else 'tidak aktif' end) AS `is_active` from (`user` join `user_role` on((`user_role`.`id_userrole` = `user`.`id_userrole`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang_cshp`
--
ALTER TABLE `barang_cshp`
  ADD PRIMARY KEY (`id_barangcshp`),
  ADD KEY `varietas` (`varietas`),
  ADD KEY `barang_cshp_ibfk_3` (`id_barangdatang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `barang_datang`
--
ALTER TABLE `barang_datang`
  ADD PRIMARY KEY (`id_barangdatang`),
  ADD KEY `barang_datang_ibfk_2` (`varietas`),
  ADD KEY `barang_datang_ibfk_3` (`blokmitra`),
  ADD KEY `barang_datang_ibfk_4` (`id_statusbarangdatang`),
  ADD KEY `jenisolahan` (`jenisolahan`),
  ADD KEY `barang_datang_ibfk_6` (`id_user`);

--
-- Indexes for table `barang_gudang`
--
ALTER TABLE `barang_gudang`
  ADD PRIMARY KEY (`id_baranggudang`),
  ADD KEY `id_barangdatang` (`id_barangdatang`),
  ADD KEY `input_gudang_ibfk_3` (`id_letakgudang`),
  ADD KEY `barang_gudang_ibfk_4` (`id_user`);

--
-- Indexes for table `barang_huller`
--
ALTER TABLE `barang_huller`
  ADD PRIMARY KEY (`id_baranghuller`),
  ADD KEY `id_barangdatang` (`id_barangdatang`),
  ADD KEY `barang_huller_ibfk_2` (`id_user`);

--
-- Indexes for table `barang_jemur`
--
ALTER TABLE `barang_jemur`
  ADD PRIMARY KEY (`id_barangjemur`),
  ADD KEY `barang_jemur_ibfk_3` (`id_posisibarang`),
  ADD KEY `barang_jemur_ibfk_4` (`id_barangdatang`),
  ADD KEY `barang_jemur_ibfk_5` (`id_user`);

--
-- Indexes for table `barang_kering`
--
ALTER TABLE `barang_kering`
  ADD PRIMARY KEY (`id_barangkering`),
  ADD KEY `id_barangjemur` (`id_barangjemur`),
  ADD KEY `barang_kering_ibfk_2` (`id_user`);

--
-- Indexes for table `barang_ready`
--
ALTER TABLE `barang_ready`
  ADD PRIMARY KEY (`id_barangready`),
  ADD KEY `barang_ready_ibfk_1` (`id_barangdatang`),
  ADD KEY `barang_ready_ibfk_5` (`id_statusready`),
  ADD KEY `barang_ready_ibfk_6` (`id_user`);

--
-- Indexes for table `barang_sutongrading`
--
ALTER TABLE `barang_sutongrading`
  ADD PRIMARY KEY (`id_barangsutongrading`),
  ADD KEY `barang_sutongrading_ibfk_1` (`id_barangdatang`),
  ADD KEY `barang_sutongrading_ibfk_2` (`varietas`),
  ADD KEY `barang_sutongrading_ibfk_3` (`id_user`);

--
-- Indexes for table `blokmitra`
--
ALTER TABLE `blokmitra`
  ADD PRIMARY KEY (`blokmitra`),
  ADD UNIQUE KEY `id_blokmitra` (`id_blokmitra`);

--
-- Indexes for table `input_kadar_air`
--
ALTER TABLE `input_kadar_air`
  ADD PRIMARY KEY (`id_inputkadarair`),
  ADD KEY `input_kadar_air_ibfk_1` (`id_barangjemur`);

--
-- Indexes for table `jenisolahan`
--
ALTER TABLE `jenisolahan`
  ADD PRIMARY KEY (`jenisolahan`),
  ADD UNIQUE KEY `id_jenisolahan` (`id_jenisolahan`);

--
-- Indexes for table `letakgudang`
--
ALTER TABLE `letakgudang`
  ADD PRIMARY KEY (`id_letakgudang`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `pesanan_ibfk_1` (`varietas`),
  ADD KEY `pesanan_ibfk_2` (`jenisolahan`);

--
-- Indexes for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  ADD KEY `id_barangdatang` (`id_barangdatang`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `posisibarang`
--
ALTER TABLE `posisibarang`
  ADD PRIMARY KEY (`id_posisibarang`);

--
-- Indexes for table `statusbarangdatang`
--
ALTER TABLE `statusbarangdatang`
  ADD PRIMARY KEY (`id_statusbarangdatang`);

--
-- Indexes for table `statusready`
--
ALTER TABLE `statusready`
  ADD PRIMARY KEY (`id_statusready`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `user_ibfk_1` (`id_userrole`);

--
-- Indexes for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD PRIMARY KEY (`id_userakses`),
  ADD KEY `user_akses_menu_ibfk_2` (`id_userrole`),
  ADD KEY `user_akses_menu_ibfk_3` (`id_menu`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_userrole`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_submenu`),
  ADD KEY `user_sub_menu_ibfk_1` (`id_menu`);

--
-- Indexes for table `varietas`
--
ALTER TABLE `varietas`
  ADD PRIMARY KEY (`varietas`),
  ADD UNIQUE KEY `id_varietas` (`id_varietas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_cshp`
--
ALTER TABLE `barang_cshp`
  MODIFY `id_barangcshp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `barang_datang`
--
ALTER TABLE `barang_datang`
  MODIFY `id_barangdatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `barang_gudang`
--
ALTER TABLE `barang_gudang`
  MODIFY `id_baranggudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang_huller`
--
ALTER TABLE `barang_huller`
  MODIFY `id_baranghuller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barang_jemur`
--
ALTER TABLE `barang_jemur`
  MODIFY `id_barangjemur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `barang_kering`
--
ALTER TABLE `barang_kering`
  MODIFY `id_barangkering` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_ready`
--
ALTER TABLE `barang_ready`
  MODIFY `id_barangready` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `barang_sutongrading`
--
ALTER TABLE `barang_sutongrading`
  MODIFY `id_barangsutongrading` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `blokmitra`
--
ALTER TABLE `blokmitra`
  MODIFY `id_blokmitra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `input_kadar_air`
--
ALTER TABLE `input_kadar_air`
  MODIFY `id_inputkadarair` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenisolahan`
--
ALTER TABLE `jenisolahan`
  MODIFY `id_jenisolahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `letakgudang`
--
ALTER TABLE `letakgudang`
  MODIFY `id_letakgudang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posisibarang`
--
ALTER TABLE `posisibarang`
  MODIFY `id_posisibarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `statusbarangdatang`
--
ALTER TABLE `statusbarangdatang`
  MODIFY `id_statusbarangdatang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `statusready`
--
ALTER TABLE `statusready`
  MODIFY `id_statusready` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  MODIFY `id_userakses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_userrole` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `varietas`
--
ALTER TABLE `varietas`
  MODIFY `id_varietas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_cshp`
--
ALTER TABLE `barang_cshp`
  ADD CONSTRAINT `barang_cshp_ibfk_1` FOREIGN KEY (`id_barangdatang`) REFERENCES `barang_datang` (`id_barangdatang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_cshp_ibfk_2` FOREIGN KEY (`varietas`) REFERENCES `varietas` (`varietas`),
  ADD CONSTRAINT `barang_cshp_ibfk_3` FOREIGN KEY (`id_barangdatang`) REFERENCES `barang_datang` (`id_barangdatang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_cshp_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `barang_cshp_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`),
  ADD CONSTRAINT `barang_cshp_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `barang_datang`
--
ALTER TABLE `barang_datang`
  ADD CONSTRAINT `barang_datang_ibfk_1` FOREIGN KEY (`varietas`) REFERENCES `varietas` (`varietas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_datang_ibfk_2` FOREIGN KEY (`varietas`) REFERENCES `varietas` (`varietas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_datang_ibfk_4` FOREIGN KEY (`id_statusbarangdatang`) REFERENCES `statusbarangdatang` (`id_statusbarangdatang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_datang_ibfk_5` FOREIGN KEY (`jenisolahan`) REFERENCES `jenisolahan` (`jenisolahan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_datang_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_gudang`
--
ALTER TABLE `barang_gudang`
  ADD CONSTRAINT `barang_gudang_ibfk_1` FOREIGN KEY (`id_barangdatang`) REFERENCES `barang_datang` (`id_barangdatang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_gudang_ibfk_3` FOREIGN KEY (`id_letakgudang`) REFERENCES `letakgudang` (`id_letakgudang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_gudang_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_huller`
--
ALTER TABLE `barang_huller`
  ADD CONSTRAINT `barang_huller_ibfk_1` FOREIGN KEY (`id_barangdatang`) REFERENCES `barang_datang` (`id_barangdatang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_huller_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_jemur`
--
ALTER TABLE `barang_jemur`
  ADD CONSTRAINT `barang_jemur_ibfk_3` FOREIGN KEY (`id_posisibarang`) REFERENCES `posisibarang` (`id_posisibarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_jemur_ibfk_4` FOREIGN KEY (`id_barangdatang`) REFERENCES `barang_datang` (`id_barangdatang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_jemur_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_kering`
--
ALTER TABLE `barang_kering`
  ADD CONSTRAINT `barang_kering_ibfk_1` FOREIGN KEY (`id_barangjemur`) REFERENCES `barang_jemur` (`id_barangjemur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_kering_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_ready`
--
ALTER TABLE `barang_ready`
  ADD CONSTRAINT `barang_ready_ibfk_1` FOREIGN KEY (`id_barangdatang`) REFERENCES `barang_datang` (`id_barangdatang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ready_ibfk_5` FOREIGN KEY (`id_statusready`) REFERENCES `statusready` (`id_statusready`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ready_ibfk_6` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `barang_sutongrading`
--
ALTER TABLE `barang_sutongrading`
  ADD CONSTRAINT `barang_sutongrading_ibfk_1` FOREIGN KEY (`id_barangdatang`) REFERENCES `barang_datang` (`id_barangdatang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_sutongrading_ibfk_2` FOREIGN KEY (`varietas`) REFERENCES `varietas` (`varietas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_sutongrading_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `input_kadar_air`
--
ALTER TABLE `input_kadar_air`
  ADD CONSTRAINT `input_kadar_air_ibfk_1` FOREIGN KEY (`id_barangjemur`) REFERENCES `barang_jemur` (`id_barangjemur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`varietas`) REFERENCES `varietas` (`varietas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`jenisolahan`) REFERENCES `jenisolahan` (`jenisolahan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  ADD CONSTRAINT `pesanan_barang_ibfk_1` FOREIGN KEY (`id_barangdatang`) REFERENCES `barang_datang` (`id_barangdatang`),
  ADD CONSTRAINT `pesanan_barang_ibfk_2` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_userrole`) REFERENCES `user_role` (`id_userrole`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_akses_menu`
--
ALTER TABLE `user_akses_menu`
  ADD CONSTRAINT `user_akses_menu_ibfk_2` FOREIGN KEY (`id_userrole`) REFERENCES `user_role` (`id_userrole`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_akses_menu_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD CONSTRAINT `user_sub_menu_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `user_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
