-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jan 2019 pada 02.53
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_magang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'af7e0928fcba501d8ed0385c794e690fe151bf16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_magang`
--

CREATE TABLE `data_magang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_perusahaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_magang`
--

INSERT INTO `data_magang` (`id`, `id_user`, `id_perusahaan`) VALUES
(7, 1, 3),
(8, 2, 3),
(9, 3, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nim` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `jurusan` varchar(30) NOT NULL,
  `alamat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nim`, `nama`, `kelas`, `tlp`, `jurusan`, `alamat`) VALUES
(1, '1703042', 'Muhamad Nadi', 'd3ti2c', '9403248732847', 'D3 Teknik Informatika', 'sjhfkjdshfjdsfs'),
(3, '5675765', 'dfdgdf', 'dggrerrrrr', '56565656', 'D4 Rekayasa Perangkat Lunak', 'hgjhgjhgj'),
(4, '1703055', 'Agung Yoga', 'D3TI2C', '0985974', 'D3 Teknik Informatika', '<p><strong>Junti Krangkeng&nbsp;</strong>karang anyar</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lokasi` varchar(10) NOT NULL,
  `tlp` varchar(13) NOT NULL,
  `bentuk` varchar(10) NOT NULL,
  `bidang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`id`, `nama`, `lokasi`, `tlp`, `bentuk`, `bidang`) VALUES
(2, 'LEN Industri', 'Bandung', '39875943865', 'PT', 'Network'),
(3, 'LAPAN', 'Jakarta', '9835743875', 'PT', 'IOT'),
(4, 'Nadi Jaya Perkasa', 'Bandung', '5657675', 'CV', 'Desktop Apps');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `view_data_magang`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `view_data_magang` (
`id` int(11)
,`nama_mahasiswa` varchar(30)
,`nama_perusahaan` varchar(30)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `view_data_magang`
--
DROP TABLE IF EXISTS `view_data_magang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_data_magang`  AS  select `data_magang`.`id` AS `id`,`mahasiswa`.`nama` AS `nama_mahasiswa`,`perusahaan`.`nama` AS `nama_perusahaan` from ((`mahasiswa` join `data_magang` on((`mahasiswa`.`id` = `data_magang`.`id_user`))) join `perusahaan` on((`data_magang`.`id_perusahaan` = `perusahaan`.`id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_magang`
--
ALTER TABLE `data_magang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_magang`
--
ALTER TABLE `data_magang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
