-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2023 pada 17.04
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-shop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bayar`
--

CREATE TABLE `tbl_bayar` (
  `id_bayar` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `no_referensi` varchar(25) NOT NULL,
  `tot_bayar` double NOT NULL,
  `status_bayar` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_bayar`
--

INSERT INTO `tbl_bayar` (`id_bayar`, `tgl_bayar`, `no_referensi`, `tot_bayar`, `status_bayar`) VALUES
(1, '2023-07-29', '945750', 48500, 'terkonfirmasi'),
(2, '2023-07-30', '75069', 175000, 'terkonfirmasi'),
(3, '2023-08-02', '191861', 120000, 'terkonfirmasi'),
(4, '2023-08-02', '396267', 175000, 'terkonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `id_checkout` int(11) NOT NULL,
  `no_referensi` varchar(25) NOT NULL,
  `tgl_checkout` date NOT NULL,
  `no_belanja` varchar(25) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_checkout`
--

INSERT INTO `tbl_checkout` (`id_checkout`, `no_referensi`, `tgl_checkout`, `no_belanja`, `id_produk`, `id_customer`, `qty`, `total`, `status`) VALUES
(1, '', '0000-00-00', 'EC-65673', 17, 1, 3, 1077000, 'Bblum di Bayar'),
(2, '', '0000-00-00', 'EC-2617', 18, 1, 1, 35000, 'Bblum di Bayar'),
(3, '', '0000-00-00', 'EC-41662', 19, 1, 1, 20000, 'Bblum di Bayar'),
(4, '', '0000-00-00', 'EC-26108', 20, 1, 1, 50000, 'Bblum di Bayar'),
(5, '', '0000-00-00', 'EC-11059', 17, 1, 1, 359000, 'Bblum di Bayar'),
(6, '935482', '0000-00-00', 'EC-45991', 17, 1, 1, 359000, 'Bblum di Bayar'),
(7, '935482', '0000-00-00', 'EC-98193', 19, 1, 1, 20000, 'Bblum di Bayar'),
(8, '265903', '0000-00-00', 'EC-95411', 17, 1, 3, 1077000, 'Bblum di Bayar'),
(9, '265903', '0000-00-00', 'EC-705', 18, 1, 1, 35000, 'Bblum di Bayar'),
(10, '702833', '2023-07-30', 'EC-45631', 17, 1, 1, 359000, 'Bblum di Bayar'),
(11, '666787', '0000-00-00', 'EC-69407', 17, 1, 1, 359000, 'Bblum di Bayar'),
(12, '351796', '0000-00-00', 'EC-60056', 17, 1, 1, 359000, 'Bblum di Bayar'),
(13, '675008', '0000-00-00', 'EC-23448', 17, 1, 1, 359000, 'Bblum di Bayar'),
(14, '772915', '0000-00-00', 'EC-62155', 17, 1, 1, 359000, 'Bblum di Bayar'),
(15, '894242', '0000-00-00', 'EC-92796', 17, 1, 1, 359000, 'Bblum di Bayar'),
(16, '801730', '0000-00-00', 'EC-48310', 17, 1, 1, 359000, 'Bblum di Bayar'),
(21, '945750', '0000-00-00', 'EC-24171', 18, 1, 1, 35000, 'Sudah di Bayar'),
(22, '75069', '0000-00-00', 'EC-89146', 21, 1, 3, 150000, 'Sudah di Bayar'),
(23, '191861', '0000-00-00', 'EC-84415', 21, 1, 1, 50000, 'Sudah di Bayar'),
(24, '191861', '0000-00-00', 'EC-39665', 29, 1, 1, 50000, 'Sudah di Bayar'),
(25, '129469', '0000-00-00', 'EC-50851', 21, 1, 3, 150000, 'Belum di Bayar'),
(26, '257009', '0000-00-00', 'EC-95607', 21, 1, 3, 150000, 'Belum di Bayar'),
(27, '396267', '0000-00-00', 'EC-38215', 21, 1, 3, 150000, 'Sudah di Bayar');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nm_customer` varchar(50) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nohp` varchar(15) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `username`, `password`, `nm_customer`, `gender`, `email`, `nohp`, `alamat`) VALUES
(1, 'Athirah', '12345', 'Athirah', 'perempuan', 'athira@gmail.com', '083121082281', 'Jl.Melati No.49'),
(2, 'Avinin', '12345', 'Avini Nanda', 'Perempuan', 'avini@gmail.com', '08546738291', 'Jl.Utara'),
(3, 'athirah', '123456', 'Athirah Salsabilah', 'Perempuan', 'salsabilah17@gmail.com', '08546738291', 'Jl.Selatan'),
(4, 'avini1234', '12345', 'Avini Nanda', 'Perempuan', 'avini@gmail.com', '083121082281', 'Jl.Selatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nm_kategori` varchar(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `nm_kategori`, `ket`) VALUES
(1, 'Baju Wanita', 'Baju Khusus Untuk wanita'),
(2, 'Baju Pria', 'Baju Khusus Pria'),
(3, 'Kaos Wanita', 'Kualitas Terjamin'),
(4, 'Kaos Pria', 'Kaos pria dengan kualitas terjamin'),
(5, 'Baju Bayi', 'Baju bayi dengan bahan berkualitas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keranjang`
--

CREATE TABLE `tbl_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `no_belanja` varchar(40) NOT NULL,
  `tgl_belanja` date NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `id_produk` int(11) NOT NULL,
  `kd_produk` varchar(20) NOT NULL,
  `nm_produk` varchar(100) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `harga` double NOT NULL,
  `stok` int(11) NOT NULL,
  `ket` text NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_produk`
--

INSERT INTO `tbl_produk` (`id_produk`, `kd_produk`, `nm_produk`, `kategori`, `harga`, `stok`, `ket`, `gambar`) VALUES
(21, 'KD001', 'Baju Anak', '5', 50000, 16, 'Bahan dan kualitas terjamin', '6795-baju bayi.jpg'),
(22, 'KD002', 'Baju Anak', '5', 55000, 10, 'Kualitas terjamin', '3507-baju anak4.jpg'),
(24, 'KD003', 'kaos anak', '5', 25000, 2, 'Bahan berkualitas', '2596-kaos anak.jpg'),
(28, 'KD004', 'kaos Anak-anak motif', '5', 50000, 2, 'Bahan berkualitas', '8866-anak1.jpg'),
(29, 'KD005', 'kaos Anak-anak motif', '5', 50000, 2, 'Bahan berkualitas', '7026-anak2.jpg'),
(30, 'KD006', 'kaos Anak-anak motif', '5', 50000, 15, 'Bahan Berkualitas', '4215-anak3.jpg'),
(33, 'KD007', 'Kaos oversize', '3', 55000, 15, 'Kualitas terjamin', '261-kaos1.jpg'),
(34, 'KD008', 'Kaos', '3', 150000, 2, 'kualitas terjamin', '6125-Harajuku Style Oversized Look Back Tee - L (US_EU Sizing) _ Blue.jpeg'),
(36, 'KD009', 'Kaos pria polos', '4', 45000, 15, 'Kualitas produk terjamin', '1259-97b14da367091367af0b20869496f813.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `username`, `password`, `nm_user`, `status`) VALUES
(1, 'admin', '12345', 'Aathirah Salsabilah', 'Administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indeks untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indeks untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_bayar`
--
ALTER TABLE `tbl_bayar`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `id_checkout` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_keranjang`
--
ALTER TABLE `tbl_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
