-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 19 Des 2019 pada 20.58
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE `ponpesinay`;

USE `ponpesinay`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ponpesinay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Alumni`
--

CREATE TABLE `db_Alumni` (
  `id_alumni` int(11) NOT NULL,
  `nama_alumni` varchar(30) NOT NULL,
  `gender` enum('P','L') NOT NULL,
  `alamat` text NOT NULL,
  `phone` varchar(16) NOT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_Alumni`
--

INSERT INTO `db_Alumni` (`id_alumni`, `nama_alumni`, `gender`, `alamat`, `phone`, `tgl_keluar`, `tgl_masuk`) VALUES
(2, 'Lana', 'P', 'W', '12221', '2019-12-19', '2019-12-19'),
(3, 'Lana', 'P', 'Wonoboyo', '08289182747', '2019-12-19', '2019-12-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Jadwal`
--

CREATE TABLE `db_Jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `kelas` int(11) DEFAULT NULL,
  `hari` enum('Senin','Selasa','Rabu','Kamis','Jum''at','Sabtu','Minggu') NOT NULL,
  `mapel` int(11) DEFAULT NULL,
  `kitab` int(11) DEFAULT NULL,
  `pengajar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_Jadwal`
--

INSERT INTO `db_Jadwal` (`id_jadwal`, `kelas`, `hari`, `mapel`, `kitab`, `pengajar`) VALUES
(2, 4, 'Senin', 3, 3, 3),
(4, 1, 'Selasa', 3, 1, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Kelas`
--

CREATE TABLE `db_Kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_Kelas`
--

INSERT INTO `db_Kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'Ibtida\''),
(2, 'Jurumiyah'),
(3, 'Imrithi'),
(4, 'Alfiyah 1'),
(5, 'Alfiyah 2'),
(9, 'Alfiyah 3');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Kitab`
--

CREATE TABLE `db_Kitab` (
  `id_kitab` int(11) NOT NULL,
  `nama_kitab` varchar(30) NOT NULL,
  `pengarang` varchar(40) DEFAULT NULL,
  `penerbit` varchar(60) DEFAULT NULL,
  `tahun` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_Kitab`
--

INSERT INTO `db_Kitab` (`id_kitab`, `nama_kitab`, `pengarang`, `penerbit`, `tahun`) VALUES
(1, 'Tijan Durori', 'man', 'nas', 2013),
(3, 'Nashoidhu', '', 'a', 0000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Mapel`
--

CREATE TABLE `db_Mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_Mapel`
--

INSERT INTO `db_Mapel` (`id_mapel`, `nama_mapel`) VALUES
(3, 'Shorof');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Pengajar`
--

CREATE TABLE `db_Pengajar` (
  `id_pengajar` int(11) NOT NULL,
  `nama_pengajar` varchar(30) NOT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_Pengajar`
--

INSERT INTO `db_Pengajar` (`id_pengajar`, `nama_pengajar`, `alamat`, `gender`, `phone`) VALUES
(2, 'Rifai', 'Ngombol', 'L', '0822516628178'),
(3, 'Mualana', 'Ngombol', 'P', '08219284187');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Ruangan`
--

CREATE TABLE `db_Ruangan` (
  `id_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(30) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Santri`
--

CREATE TABLE `db_Santri` (
  `id_santri` int(11) NOT NULL,
  `nama_santri` varchar(30) NOT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `alamat` text,
  `phone` varchar(16) DEFAULT NULL,
  `kelas` int(11) DEFAULT NULL,
  `tgl_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_Santri`
--

INSERT INTO `db_Santri` (`id_santri`, `nama_santri`, `gender`, `alamat`, `phone`, `kelas`, `tgl_masuk`) VALUES
(8, 'Programer', 'L', 'kujk', '877765658767', 3, '2019-12-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_Userpass`
--

CREATE TABLE `db_Userpass` (
  `username` varchar(16) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `db_Userpass`
--

INSERT INTO `db_Userpass` (`username`, `password`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_Alumni`
--
ALTER TABLE `db_Alumni`
  ADD PRIMARY KEY (`id_alumni`);

--
-- Indeks untuk tabel `db_Jadwal`
--
ALTER TABLE `db_Jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `FK_JadwalKelas` (`kelas`),
  ADD KEY `FK_JadwalMapel` (`mapel`),
  ADD KEY `FK_JadwalKitab` (`kitab`),
  ADD KEY `FK_JadwalPengajar` (`pengajar`);

--
-- Indeks untuk tabel `db_Kelas`
--
ALTER TABLE `db_Kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `db_Kitab`
--
ALTER TABLE `db_Kitab`
  ADD PRIMARY KEY (`id_kitab`);

--
-- Indeks untuk tabel `db_Mapel`
--
ALTER TABLE `db_Mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `db_Pengajar`
--
ALTER TABLE `db_Pengajar`
  ADD PRIMARY KEY (`id_pengajar`);

--
-- Indeks untuk tabel `db_Ruangan`
--
ALTER TABLE `db_Ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indeks untuk tabel `db_Santri`
--
ALTER TABLE `db_Santri`
  ADD PRIMARY KEY (`id_santri`),
  ADD KEY `FK_SantriKelas` (`kelas`);

--
-- Indeks untuk tabel `db_Userpass`
--
ALTER TABLE `db_Userpass`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_Alumni`
--
ALTER TABLE `db_Alumni`
  MODIFY `id_alumni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `db_Jadwal`
--
ALTER TABLE `db_Jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `db_Kelas`
--
ALTER TABLE `db_Kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `db_Kitab`
--
ALTER TABLE `db_Kitab`
  MODIFY `id_kitab` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `db_Mapel`
--
ALTER TABLE `db_Mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `db_Pengajar`
--
ALTER TABLE `db_Pengajar`
  MODIFY `id_pengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `db_Ruangan`
--
ALTER TABLE `db_Ruangan`
  MODIFY `id_ruangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `db_Santri`
--
ALTER TABLE `db_Santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `db_Jadwal`
--
ALTER TABLE `db_Jadwal`
  ADD CONSTRAINT `FK_JadwalKelas` FOREIGN KEY (`kelas`) REFERENCES `db_Kelas` (`id_kelas`),
  ADD CONSTRAINT `FK_JadwalKitab` FOREIGN KEY (`kitab`) REFERENCES `db_Kitab` (`id_kitab`),
  ADD CONSTRAINT `FK_JadwalMapel` FOREIGN KEY (`mapel`) REFERENCES `db_Mapel` (`id_mapel`),
  ADD CONSTRAINT `FK_JadwalPengajar` FOREIGN KEY (`pengajar`) REFERENCES `db_Pengajar` (`id_pengajar`);

--
-- Ketidakleluasaan untuk tabel `db_Santri`
--
ALTER TABLE `db_Santri`
  ADD CONSTRAINT `FK_SantriKelas` FOREIGN KEY (`kelas`) REFERENCES `db_Kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
