-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2015 at 03:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simplisia`
--

-- --------------------------------------------------------

--
-- Table structure for table `simplisia`
--

CREATE TABLE IF NOT EXISTS `simplisia` (
  `nama_simplisia` varchar(500) NOT NULL,
  `nama_,lain` varchar(500) NOT NULL,
  `nama_tanaman_asal` varchar(500) NOT NULL,
  `keluarga` varchar(500) NOT NULL,
  `zat_berkhasist` varchar(500) NOT NULL,
  `penggunaan` varchar(500) NOT NULL,
  `pemerian` varchar(500) NOT NULL,
  `bagian` varchar(500) NOT NULL,
  `penyimpanan` varchar(500) NOT NULL,
  `jenis` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simplisia`
--

INSERT INTO `simplisia` (`nama_simplisia`, `nama_,lain`, `nama_tanaman_asal`, `keluarga`, `zat_berkhasist`, `penggunaan`, `pemerian`, `bagian`, `penyimpanan`, `jenis`) VALUES
('ALSTONIAE CORTEX', 'Kulit Pule', 'Alstonia scholaris (L) ', 'Apocynaceae', 'Alkaloida- alkaloida ditamina, ekitamina, ekhitenina, akhitamidina, alstonina', 'Antipiretika, antimalaria, stomakika, antidiabetika, antelmintika', 'Tidak berbau, rasa pahit, yang tidak mudah hilang', 'Kulit batang dan kulit cabang', 'Dalam wadah tertutup baik', 'cortex'),
('ALYXIAE CORTEX', 'Pulasari', 'Alyxia reinwardtii, juga disebut Alyxia stellata ', 'Apocynaceae', 'Alkaloida zat pahit, kumarin, zat penyamak, minyak atsiri, asam organik', 'Bahan pewangi, (campuran boreh), karminativa, antidemam', 'Bau dan rasa mirip kumarin, agak pahit', 'Kulit batang dan kulit cabang', 'Dalam wadah tertutup baik', 'cortex'),
('CATHARANTHI RADIX', 'Akar Tapak dara', 'Catharanthus roseus (L), Vinca rosea (L), Lochnera rosea', 'Apocynaceae', 'Alkaloida: ajmalisin, serpentina, tetrahidroalstonin, vindesin, vinkristin, vinblastin', 'Peluruh kemih (emenagoga), obat diabetes, obat kanker', 'Tidak berbau, rasa pahit', 'Akar', 'Dalam wadah tertutup baik', 'Radix'),
('CURCUMAE DOMESTICAE RHIZOMA ', 'Kunyit, kunir', 'Curcuma domestica ', 'Zingiberaceae', 'Minyak atsiri, zat warna kurkumin, pati, damar', 'Karminativa, antidiare, kolagoga, skabisida', 'Bau khas aromatik, agak pedas, lama –lama menjadi tebal', 'Akar tinggal', 'Dalam wadah tertutup baik', 'Rhizoma'),
('CURCUMAE RHIZOMA', 'Temu lawak, Koneng gede', 'Curcuma xanthorrhiza ', 'Zingiberaceae', 'Minyak atsiri yang mengandung felandren dan tumerol, zat warna kurkumin, pati. Kadar minyak atsiri tidak kurang dari       8,2 % b/v', 'Kolagoga, antispasmodika', 'Bau khas aromatik, rasa tajam dan pahit', 'Kepingan akar tinggal', 'Dalam wadah tertutup baik', 'Rhizoma'),
('GLYCYRRHIZAE   RADIX ', 'Akar manis, Liquiritae Radix', 'Glycyrrhiza glabra varietas typical, Glycyrrhiza glabra, varietas glandulifera dan jenis Glycyrrhiza lainnya', 'Papilionaceae', 'Glysirisin dengan kadar 5-10 %, yaitu garam K dan Ca dari asam glisirizat (zat ini 50 x lebih manis dari gula tebu), pati, gula, asparagin', 'Antitusiva', 'Akar dalam bentuk serbuk sebagai pengisi/pembalut pil, Ekstrak untuk pewangi tembakau dan campuran obat batuk', 'Bau khas lemah, rasa manis', 'Dalam wadah tertutup baik', 'Radix');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `simplisia`
--
ALTER TABLE `simplisia`
 ADD PRIMARY KEY (`nama_simplisia`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
