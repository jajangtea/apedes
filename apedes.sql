-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Okt 2017 pada 07.34
-- Versi Server: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `apedes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bidang`
--

CREATE TABLE `bidang` (
  `idbidang` int(11) NOT NULL,
  `kode_bidang` varchar(15) NOT NULL,
  `nama_bidang` varchar(200) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

--
-- Dumping data untuk tabel `log_aktivitas_user`
--

INSERT INTO `log_aktivitas_user` (`idlog`, `userid`, `username`, `halaman`, `aktivitas`, `date_activity`) VALUES
(1, 1, 'admin', 'login', 'melakukan login sebagai admin dan berhasil masuk ke dalam sistem.', '2017-10-20 07:19:20');

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
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userid` smallint(6) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `userpassword` varchar(80) NOT NULL,
  `salt` varchar(7) NOT NULL,
  `page` char(1) NOT NULL DEFAULT 'm',
  `email` varchar(150) NOT NULL,
  `idbidang` smallint(6) NOT NULL,
  `theme` varchar(25) NOT NULL,
  `photo_profile` varchar(150) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userid`, `username`, `userpassword`, `salt`, `page`, `email`, `idbidang`, `theme`, `photo_profile`, `active`) VALUES
(1, 'admin', '02d41c8ebb9a29428caecee41a5b745611f869da8baf58b677374e34788b3449', '7d4ba3', 'm', 'm_rizki_r@yacanet.com', 0, 'limitless', 'resources/userimages/no_photo.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`idbidang`);

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
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `idbidang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `log_aktivitas_user`
--
ALTER TABLE `log_aktivitas_user`
  MODIFY `idlog` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=856;