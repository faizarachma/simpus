-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2022 pada 08.17
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
-- Database: `db_simpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbadmin`
--

CREATE TABLE `tbadmin` (
  `id_admin` int(5) NOT NULL,
  `nm_admin` varchar(35) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbadmin`
--

INSERT INTO `tbadmin` (`id_admin`, `nm_admin`, `username`, `password`) VALUES
(1, 'Admin', 'admin', '1234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbanggota`
--

CREATE TABLE `tbanggota` (
  `idanggota` int(5) NOT NULL,
  `kdanggota` varchar(8) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jeniskelamin` varchar(10) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  `foto` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbanggota`
--

INSERT INTO `tbanggota` (`idanggota`, `kdanggota`, `nama`, `jeniskelamin`, `alamat`, `status`, `foto`) VALUES
(22, 'AG220001', 'admin', 'Wanita', 'hhh', 'Tidak Meminjam', ''),
(23, 'AG220002', 'Faiza Rachma', 'Wanita', 'karang nanas', 'Sedang Meminjam', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbbuku`
--

CREATE TABLE `tbbuku` (
  `idbuku` int(11) NOT NULL,
  `kdbuku` varchar(7) NOT NULL,
  `judulbuku` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `pengarang` varchar(40) NOT NULL,
  `penerbit` varchar(40) NOT NULL,
  `status` varchar(10) NOT NULL,
  `stokbuku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbbuku`
--

INSERT INTO `tbbuku` (`idbuku`, `kdbuku`, `judulbuku`, `kategori`, `pengarang`, `penerbit`, `status`, `stokbuku`) VALUES
(37, 'BK22000', 'buku', 'ilkom', 'zainudin', 'jojd', 'Dipinjam', 8888),
(39, 'BK22002', 'fdg', 's', 's', 'dgd', 'Tersedia', 12),
(40, 'BK22003', 'fdg', 'inlkokm', 's', 'dgd', 'Dipinjam', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` int(11) NOT NULL,
  `kdtransaksi` varchar(8) NOT NULL,
  `idanggota` int(5) NOT NULL,
  `idbuku` int(5) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `kdtransaksi`, `idanggota`, `idbuku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(1, 'TR210001', 5, 1, '2021-08-25', '2021-08-25'),
(2, 'TR210002', 5, 2, '2021-08-25', '2021-08-25'),
(5, 'TR210003', 5, 7, '2021-08-25', '2021-08-25'),
(6, 'TR210004', 6, 8, '2021-08-25', '2022-01-15'),
(7, 'TR210005', 5, 3, '2021-08-27', '2022-01-15'),
(8, 'TR210006', 7, 1, '2022-01-15', '2022-01-15'),
(9, 'TR210007', 9, 7, '2022-01-15', '2022-01-15'),
(10, 'TR210008', 8, 5, '2022-01-15', '2022-01-16'),
(11, 'TR210009', 8, 5, '2022-01-16', '2022-01-16'),
(12, 'TR210010', 7, 6, '2022-01-16', '2022-01-16'),
(13, 'TR210011', 9, 10, '2022-01-16', '2022-01-16'),
(14, 'TR210012', 12, 8, '2022-01-16', '2022-01-16'),
(15, 'TR210013', 7, 2, '2022-01-16', '2022-01-16'),
(16, 'TR210014', 9, 7, '2022-01-16', '2022-01-16'),
(17, 'TR210015', 0, 12, '2022-01-16', '0000-00-00'),
(18, 'TR210016', 0, 4, '2022-01-16', '0000-00-00'),
(19, 'TR210017', 0, 9, '2022-01-16', '0000-00-00'),
(20, 'TR210018', 13, 6, '2022-01-16', '2022-01-16'),
(21, 'TR210019', 18, 3, '2022-01-17', '2022-01-17'),
(22, 'TR210020', 19, 5, '2022-01-17', '2022-01-17'),
(23, 'TR210021', 19, 4, '2022-01-17', '2022-01-17'),
(24, 'TR210022', 0, 3, '2022-01-17', '0000-00-00'),
(25, 'TR210023', 0, 5, '2022-01-17', '0000-00-00'),
(26, 'TR210024', 0, 1, '2022-01-17', '0000-00-00'),
(27, 'TR210025', 0, 2, '2022-01-17', '0000-00-00'),
(28, 'TR210026', 19, 4, '2022-01-17', '0000-00-00'),
(29, 'TR210027', 18, 11, '2022-01-17', '2022-01-17'),
(30, 'TR210028', 18, 36, '2022-01-17', '0000-00-00'),
(31, 'TR210029', 20, 37, '2022-01-17', '2022-01-17'),
(32, 'TR210030', 21, 40, '2022-01-17', '2022-01-17'),
(33, 'TR210031', 0, 39, '2022-01-17', '0000-00-00'),
(34, 'TR210032', 23, 39, '2022-01-17', '2022-01-17'),
(35, 'TR210033', 23, 37, '2022-01-17', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbadmin`
--
ALTER TABLE `tbadmin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbanggota`
--
ALTER TABLE `tbanggota`
  ADD PRIMARY KEY (`idanggota`);

--
-- Indeks untuk tabel `tbbuku`
--
ALTER TABLE `tbbuku`
  ADD PRIMARY KEY (`idbuku`);

--
-- Indeks untuk tabel `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbadmin`
--
ALTER TABLE `tbadmin`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbanggota`
--
ALTER TABLE `tbanggota`
  MODIFY `idanggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `tbbuku`
--
ALTER TABLE `tbbuku`
  MODIFY `idbuku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
