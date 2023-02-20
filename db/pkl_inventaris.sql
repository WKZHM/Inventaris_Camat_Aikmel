-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 17 Feb 2023 pada 12.21
-- Versi server: 5.7.33
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pkl_inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `ruang` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `kategori`, `ruang`, `jumlah`, `tanggal`) VALUES
(2, 'Printer', 'Elektronik', 'Aula', '1', '2023-02-14 02:48:41'),
(5, 'Kulkas', 'Elektronik', 'Kantin', '2', '2023-02-15 03:33:15'),
(6, 'Kursi', 'Furniture', 'Sekertariat PPK', '4', '2023-02-16 07:52:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(100) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `jk` varchar(10) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `telepon` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `nip`, `jk`, `jabatan`, `telepon`, `foto`) VALUES
(1, 'Sung Jin-Woo', '200005032022021321', 'Laki-Laki', 'Kes TU', '082340252209', 'sung.jpg'),
(2, 'Seong Jina', '200111232023012456', 'Perempuan', 'Sekertaris', '081765234543', 'jina.jpg'),
(4, 'Nabila Sari', '198403032014061006', 'Perempuan', 'Staf', '087952341066', '63ed1398ce351.jpg'),
(6, 'Jeno Udin', '199709122011091721', 'Laki-Laki', 'Kesubag Program & Keuangan', '087623125644', '63ed177c82ecc.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `ruang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `lokasi`, `ruang`) VALUES
(1, 'A1', 'Kantin'),
(3, 'B1', 'Aula'),
(4, 'A1', 'Sekertariat PPK'),
(5, 'B1', 'Gudang'),
(6, 'A1', 'Camat '),
(7, 'A1', 'KASUBAG Keuangan dan Pelayanan'),
(8, 'A1', 'Kasi Pemerintah'),
(9, 'A1', 'TU/Pengarsipan'),
(10, 'A1', 'KASUBAG Umum dan Pepegawaian'),
(11, 'A1', 'Kasi Kesra'),
(12, 'A1', 'Panitia Pemilihan Kecamatan Aikmel'),
(13, 'A1', 'KASI TRANTIB'),
(14, 'A1', 'Pelayanan'),
(15, 'A1', 'KASI Pelayanan Umum');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `email`, `password`, `level`) VALUES
(3, 'Monkey D. Luffy', 'luffy', 'luffy@gmail.com', '$2y$10$9ibGWyC61weeDFMOgTtVKOVCjtCYb0RXqMzVwtCA1k14bW5IoWqIS', '2'),
(4, 'Admin', 'admin', 'admin@gmail.com', '$2y$10$cNo86HvbnjWfojdSwfpRsefKIouBYEF10IZYxMU6qao2dU0MbsUK.', '1'),
(5, 'Nami', 'nami', 'nami@gmail.com', '$2y$10$0HkIYsCLWPTX7Mh/I.Xgfe3S5lFURYarDNiqI8ejT6EJObvk/5t9m', '2');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
