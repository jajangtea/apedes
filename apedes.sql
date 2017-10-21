-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 22 Okt 2017 pada 01.52
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apedes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas_user`
--

CREATE TABLE `log_aktivitas_user` (
  `idlog` bigint(20) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `halaman` varchar(100) NOT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `date_activity` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(11) NOT NULL,
  `group` varchar(32) NOT NULL,
  `key` varchar(64) NOT NULL,
  `value` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `urusan`
--

CREATE TABLE `urusan` (
  `idurusan` int(11) NOT NULL,
  `kode_urusan` varchar(15) NOT NULL,
  `nama_urusan` varchar(200) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `urusan`
--

INSERT INTO `urusan` (`idurusan`, `kode_urusan`, `nama_urusan`, `enabled`) VALUES
(1, '1', 'PEMERINTAHAN', 1),
(2, '2', 'KEUANGAN', 1),
(3, '3', 'UMUM', 1),
(4, '4', 'PEMBANGUNAN', 1),
(5, '5', 'KESEJAHTERAAN SOSIAL', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` smallint(6) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `userpassword` varchar(80) NOT NULL,
  `salt` varchar(7) NOT NULL,
  `page` char(1) NOT NULL DEFAULT 'm',
  `email` varchar(150) NOT NULL,
  `idurusan` smallint(6) NOT NULL,
  `theme` varchar(25) NOT NULL,
  `photo_profile` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `userpassword`, `salt`, `page`, `email`, `idurusan`, `theme`, `photo_profile`, `active`) VALUES
(1, 'admin', '02d41c8ebb9a29428caecee41a5b745611f869da8baf58b677374e34788b3449', '7d4ba3', 'm', 'apedes@yacanet.com', 0, 'limitless', 'resources/userimages/no_photo.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log_aktivitas_user`
--
ALTER TABLE `log_aktivitas_user`
  ADD PRIMARY KEY (`idlog`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `urusan`
--
ALTER TABLE `urusan`
  ADD PRIMARY KEY (`idurusan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log_aktivitas_user`
--
ALTER TABLE `log_aktivitas_user`
  MODIFY `idlog` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `urusan`
--
ALTER TABLE `urusan`
  MODIFY `idurusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
