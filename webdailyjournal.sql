-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 10 Jan 2025 pada 17.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(2, 'Ruang Kelas', 'Ruang kelas adalah tempat untuk belajar dan mengajar', 'kelas.jpg', '2024-10-12 13:02:31', 'admin'),
(6, 'Valorant', 'Valorant adalah game fps battleground.', '20241230171028.jpg', '2024-12-30 17:10:28', 'admin'),
(7, 'Hoodie', 'Hoodie berkualitas dengan gramasi 330gsm.', '20241230171056.jpg', '2024-12-30 17:10:56', 'admin'),
(8, 'Naruto', 'Pain is a villain from Naruto Shipuden', '20250110235702.jpg', '2025-01-10 23:57:02', 'admin'),
(9, 'Hunter X Hunter', 'Hisoka', '20250110235725.jpg', '2025-01-10 23:57:25', 'admin'),
(10, 'Jujutsu Kaisen', 'Toji', '20250110235746.jpg', '2025-01-10 23:57:46', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `gambar`, `tanggal`, `username`) VALUES
(2, '20250110212023.jpg', '2025-01-10 21:20:23', 'admin'),
(3, '20250110212502.jpg', '2025-01-10 21:25:02', 'admin'),
(4, '20250110234858.jpg', '2025-01-10 23:48:58', 'admin'),
(5, '20250110235209.jpg', '2025-01-10 23:52:09', 'admin'),
(6, '20250110235221.jpg', '2025-01-10 23:52:21', 'admin'),
(7, '20250110235230.jpg', '2025-01-10 23:52:30', 'admin'),
(8, '20250110235239.jpg', '2025-01-10 23:52:39', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'WhatsApp Image 2023-10-10 at 23.17.50_a2e5faad.jpg'),
(2, 'Ziven', 'e10adc3949ba59abbe56e057f20f883e', 'WhatsApp Image 2023-10-10 at 20.02.49_23b2d2eb.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
