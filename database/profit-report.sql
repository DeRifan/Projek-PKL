-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Apr 2025 pada 04.28
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `profit-report`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `profit`
--

CREATE TABLE `profit` (
  `id_profit` int(11) NOT NULL,
  `nama_karyawan` varchar(228) NOT NULL,
  `jml_profit` varchar(200) NOT NULL,
  `jml_order` int(20) NOT NULL,
  `jml_akun` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profit`
--

INSERT INTO `profit` (`id_profit`, `nama_karyawan`, `jml_profit`, `jml_order`, `jml_akun`) VALUES
(1, 'ADE', 'Rp2.402.195', 11, 22),
(2, 'SHIFA', 'Rp1.510.391', 10, 30),
(3, 'ANDI', 'Rp833.821', 8, 28),
(4, 'RAPLI', 'Rp764.698', 7, 23),
(5, 'FAHCRI', 'Rp368.490', 4, 408),
(6, 'ASYFA', 'Rp745.554', 4, 22),
(7, 'SISKA', 'Rp424.135', 5, 25),
(8, 'HILMI', 'Rp723.664', 3, 29),
(9, 'EVA', 'Rp615.987', 2, 14),
(10, 'ADITYA', 'Rp615.987', 4, 24),
(11, 'ADMIN MEI', 'Rp0', 0, 1),
(12, 'IIR', 'Rp0', 7, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `report`
--

CREATE TABLE `report` (
  `id_report` int(11) NOT NULL,
  `jml_profit` varchar(228) NOT NULL,
  `jml_order` int(20) NOT NULL,
  `jml_akun` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `report`
--

INSERT INTO `report` (`id_report`, `jml_profit`, `jml_order`, `jml_akun`) VALUES
(2, '8513107', 65, 626);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(228) NOT NULL,
  `nama_user` varchar(228) NOT NULL,
  `username` varchar(228) NOT NULL,
  `password` varchar(228) NOT NULL,
  `role` enum('admin','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `email`, `nama_user`, `username`, `password`, `role`) VALUES
(1, '', 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, '', 'kasir', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir'),
(3, '', 'owner', 'owner', '72122ce96bfec66e2396d2e25225d70a', 'owner'),
(5, 'kaka@gmail.com', 'kaka', 'kaka', '5541c7b5a06c39b267a5efae6628e003', 'kasir'),
(9, 'mily@gmail.com', 'mily', 'mily', '5c71c13a588866bc794c42c54f8b9f37', 'kasir'),
(10, 'jajang@gmail.com', 'jajang', 'jajang', 'b56b57039c86f8626ece5a1a35f86175', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `profit`
--
ALTER TABLE `profit`
  ADD PRIMARY KEY (`id_profit`);

--
-- Indeks untuk tabel `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id_report`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `profit`
--
ALTER TABLE `profit`
  MODIFY `id_profit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `report`
--
ALTER TABLE `report`
  MODIFY `id_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
