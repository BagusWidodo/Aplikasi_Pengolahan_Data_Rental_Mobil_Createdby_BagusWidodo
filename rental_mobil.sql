-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Jul 2021 pada 20.46
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_mobil`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'Bagoes_Widodo', '14121996', 'WEB Programmer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `id_mobil` int(11) NOT NULL,
  `no_polisi` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `foto_mobil` varchar(50) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`id_mobil`, `no_polisi`, `nama`, `harga`, `foto_mobil`, `ket`) VALUES
(1, 'BK 1212 QN', 'TOYOTA - Agya New', 400000, 'Agya.PNG', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(2, 'BK 1234 QT', 'SUZUKI - APV New', 550000, 'APV.png', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(3, 'BK 1256 TUM', 'TOYOTA - Avanza New Merah', 450000, 'Avanza New 02.png', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(4, 'BK 2378 DNM', 'TOYOTA - Avanza New Hitam 2019', 450000, 'Avanza New.PNG', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(5, 'BK 3489 FGH', 'HONDA - BRIO New Kuning', 400000, 'Brio.png', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(6, 'BK 3412 JKL', 'DAIHATSU - Calya New', 400000, 'Calya.png', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(7, 'BB 3434 HTY', 'SUZUKI - C HR New', 500000, 'C-HR.png', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(8, 'B 3456 HTM', 'HONDA - CRV New', 600000, 'CRV.png', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(9, 'BB 7834 QRS', 'SUZUKI - Ertiga New', 450000, 'Ertiga.PNG', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(10, 'BB 5634 HJT', 'TOYOTA - New Fortuner Turbo', 650000, 'Fortuner New.PNG', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)'),
(11, 'BK 8934 MNH', 'DAIHATSU - Terios New', 450000, 'Terios.png', 'Harga belum termasuk driver => (Driver = Rp. 200.000,- / tergantung jarak tempuh)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pelanggan`
--

CREATE TABLE `tbl_pelanggan` (
  `no_ktp` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telephone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pelanggan`
--

INSERT INTO `tbl_pelanggan` (`no_ktp`, `nama`, `telephone`) VALUES
('1274061412960001', 'Bagus Widodo', '082354786805'),
('1274062305970003', 'Mikes Rivania, Amd.Keb', '082354786805');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id_transaksi`, `no_ktp`, `tanggal`, `total`) VALUES
(2, '1274062305970003', '2021-07-05', 650000),
(3, '1274061412960001', '2021-07-05', 2250000),
(4, '1274061412960001', '2021-07-05', 800000),
(5, '1274062305970003', '2021-07-05', 1100000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_transaksi_sewa`
--

CREATE TABLE `tbl_transaksi_sewa` (
  `id_transaksi_sewa` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `no_polisi` varchar(12) NOT NULL,
  `lama_sewa` int(11) NOT NULL,
  `status` varchar(25) NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_transaksi_sewa`
--

INSERT INTO `tbl_transaksi_sewa` (`id_transaksi_sewa`, `id_transaksi`, `no_polisi`, `lama_sewa`, `status`, `tanggal_kembali`, `denda`) VALUES
(1, 1, 'BK 1212 QN', 4, 'Mobil Belum Kembali', '0000-00-00', 0),
(2, 2, 'BB 5634 HJT', 1, 'Mobil Sudah Kembali', '2021-07-05', 0),
(3, 3, 'BK 1256 TUM', 5, 'Mobil Belum Kembali', '0000-00-00', 0),
(4, 4, 'BK 3489 FGH', 2, 'Mobil Sudah Kembali', '2021-07-05', 0),
(5, 5, 'BK 1234 QT', 2, 'Mobil Belum Kembali', '0000-00-00', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`id_mobil`);

--
-- Indeks untuk tabel `tbl_pelanggan`
--
ALTER TABLE `tbl_pelanggan`
  ADD PRIMARY KEY (`no_ktp`);

--
-- Indeks untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indeks untuk tabel `tbl_transaksi_sewa`
--
ALTER TABLE `tbl_transaksi_sewa`
  ADD PRIMARY KEY (`id_transaksi_sewa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  MODIFY `id_mobil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_transaksi_sewa`
--
ALTER TABLE `tbl_transaksi_sewa`
  MODIFY `id_transaksi_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
