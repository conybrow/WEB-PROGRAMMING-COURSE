-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Feb 2024 pada 14.01
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pweb`
--
CREATE DATABASE IF NOT EXISTS `pweb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pweb`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE IF NOT EXISTS `akun` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(200) NOT NULL,
  `idRole` int(3) NOT NULL,
  `email` varchar(200) NOT NULL,
  `negara` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `username` varchar(12) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'AKTIF',
  `gender` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `c1` (`idRole`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `fullName`, `idRole`, `email`, `negara`, `password`, `username`, `status`, `gender`) VALUES
(1, 'Evi Fitriya', 1, 'evfi29@gmail.com', 'Indonesia', 'epinee', 'epiholy', 'AKTIF', NULL),
(17, 'Feng Yin', 2, 'admin@ruguoling', '', 'ajin', 'ayin', 'AKTIF', NULL),
(18, 'owner', 999, 'owner@gmail.com', '', 'owner', 'owner', 'AKTIF', NULL),
(19, 'Nawal', 2, 'nawal@user', '', 'nawal', 'nawal', 'AKTIF', NULL),
(21, 'tes', 2, '', '', 'dafa', 'dafa', 'AKTIF', NULL),
(22, 'Yoga', 2, '', '', '12345678', 'Yoga', 'AKTIF', NULL),
(23, 'Olifia', 1, 'olifia@gmail.com', 'Indonesia', '123456', 'Olif', 'AKTIF', NULL),
(24, 'fwp', 1, 'fwp@gmail.com', 'Korea Selatan', '123123', 'Pak fidi', 'AKTIF', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `balancingmodal`
--

CREATE TABLE IF NOT EXISTS `balancingmodal` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `idKaryawan` int(4) NOT NULL,
  `ToalUangOffline` int(20) DEFAULT NULL,
  `uangSeharusnya` int(20) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `DATE` varchar(200) DEFAULT NULL,
  `TIME` varchar(200) DEFAULT NULL,
  `Keluar_Masuk` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bm1` (`idKaryawan`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `balancingmodal`
--

INSERT INTO `balancingmodal` (`id`, `idKaryawan`, `ToalUangOffline`, `uangSeharusnya`, `status`, `DATE`, `TIME`, `Keluar_Masuk`) VALUES
(1, 1, 0, 20000000, NULL, 'Thursday, 11 January 2024', 'Close', NULL),
(2, 23, 3100, 20000000, NULL, 'Thursday, 11 January 2024', 'Close', NULL);

--
-- Trigger `balancingmodal`
--
DELIMITER $$
CREATE TRIGGER `updateStatusBM` AFTER UPDATE ON `balancingmodal` FOR EACH ROW BEGIN
    IF NEW.ToalUangOffline != OLD.ToalUangOffline OR NEW.uangSeharusnya != OLD.uangSeharusnya THEN
        CALL updateStatusBM();
    END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detilbalancingmodal`
--

CREATE TABLE IF NOT EXISTS `detilbalancingmodal` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `idBM` int(3) NOT NULL,
  `idUang` int(3) NOT NULL,
  `saldo` int(200) DEFAULT NULL,
  `qty` int(60) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dbm1` (`idUang`),
  KEY `dbm2` (`idBM`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detilbalancingmodal`
--

INSERT INTO `detilbalancingmodal` (`id`, `idBM`, `idUang`, `saldo`, `qty`) VALUES
(1, 2, 100, 2100, 21),
(2, 2, 200, 1000, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detiltransaksi`
--

CREATE TABLE IF NOT EXISTS `detiltransaksi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `idTransaksi` int(4) NOT NULL,
  `kodeJasa` int(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `dt2` (`idTransaksi`),
  KEY `yryfh5` (`kodeJasa`)
) ENGINE=InnoDB AUTO_INCREMENT=455 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `detiltransaksi`
--

INSERT INTO `detiltransaksi` (`id`, `idTransaksi`, `kodeJasa`) VALUES
(425, 1, 1),
(426, 1, 2),
(427, 1, 6),
(428, 2, 7),
(429, 3, 1),
(430, 4, 3),
(431, 5, 4),
(432, 6, 2),
(433, 7, 4),
(434, 7, 5),
(435, 7, 6),
(436, 8, 3),
(437, 8, 7),
(438, 9, 5),
(439, 9, 6),
(440, 5, 4),
(441, 5, 5),
(442, 10, 7),
(443, 11, 5),
(444, 11, 6),
(445, 9, 5),
(446, 9, 6),
(447, 13, 1),
(448, 13, 3),
(449, 14, 7),
(450, 15, 1),
(451, 15, 2),
(452, 16, 1),
(453, 16, 4),
(454, 16, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa`
--

CREATE TABLE IF NOT EXISTS `jasa` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `NamaJasa` varchar(100) DEFAULT NULL,
  `harga` int(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jasa`
--

INSERT INTO `jasa` (`id`, `NamaJasa`, `harga`) VALUES
(1, 'Wash', 20000),
(2, 'Wash and Haircut', 65000),
(3, 'Treatment', 127000),
(4, 'Cut', 45000),
(5, 'Creambath', 150000),
(6, 'Cuci Sepatu', 55000),
(7, 'Nail Polish', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengeluaran`
--

CREATE TABLE IF NOT EXISTS `pengeluaran` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `iduser` int(4) DEFAULT NULL,
  `Tanggal` varchar(200) DEFAULT NULL,
  `waktu` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `qty` int(64) DEFAULT NULL,
  `harga` int(64) DEFAULT NULL,
  `total` int(64) DEFAULT NULL,
  `pajak` int(64) DEFAULT NULL,
  `jenisPembayaran` varchar(200) DEFAULT NULL,
  `termin` varchar(200) DEFAULT NULL,
  `jenisPengeluaran` varchar(200) DEFAULT NULL,
  `fromfaktur` int(60) DEFAULT -1,
  `posisiDK` varchar(100) DEFAULT NULL,
  `Instansi` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `p5` (`iduser`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengeluaran`
--

INSERT INTO `pengeluaran` (`id`, `iduser`, `Tanggal`, `waktu`, `keterangan`, `qty`, `harga`, `total`, `pajak`, `jenisPembayaran`, `termin`, `jenisPengeluaran`, `fromfaktur`, `posisiDK`, `Instansi`) VALUES
(1, 17, 'Wednesday, 10 January 2024', '20:57:43', 'Listrik Bulan Desember', NULL, NULL, 250000, NULL, 'Cash', NULL, 'Pembayaran', 0, 'Kredit', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1000 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'Pegawai'),
(2, 'Admin'),
(999, 'Pemilik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `tanggal` varchar(200) DEFAULT NULL,
  `idKasir` int(4) NOT NULL,
  `waktu` varchar(200) DEFAULT NULL,
  `total` decimal(65,2) DEFAULT NULL,
  `Jumlah_Bayar` decimal(65,2) DEFAULT NULL,
  `Kembalian` decimal(65,2) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL,
  `keterangan` varchar(200) DEFAULT NULL,
  `jenisTransaksi` varchar(200) DEFAULT 'Pemasukan',
  `posisiDK` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `t1` (`idKasir`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `tanggal`, `idKasir`, `waktu`, `total`, `Jumlah_Bayar`, `Kembalian`, `status`, `keterangan`, `jenisTransaksi`, `posisiDK`) VALUES
(1, 'Wednesday, 10 January 2024', 1, '20:54:49', 140000.00, 150000.00, 10000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(2, 'Wednesday, 10 January 2024', 1, '20:54:59', 50000.00, 100000.00, 50000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(3, 'Wednesday, 10 January 2024', 1, '20:55:06', 20000.00, 30000.00, 10000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(4, 'Wednesday, 10 January 2024', 1, '20:55:12', 127000.00, 130000.00, 3000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(5, 'Wednesday, 10 January 2024', 1, '20:55:19', 195000.00, 200000.00, 5000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(6, 'Wednesday, 10 January 2024', 1, '20:55:25', 65000.00, 70000.00, 5000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(7, 'Wednesday, 10 January 2024', 1, '22:25:13', 250000.00, 300000.00, 50000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(8, 'Wednesday, 10 January 2024', 1, '22:25:50', 177000.00, 200000.00, 23000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(9, 'Wednesday, 10 January 2024', 1, '22:28:56', 205000.00, 300000.00, 95000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(10, 'Thursday, 11 January 2024', 1, '00:29:33', 50000.00, 60000.00, 10000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(11, 'Thursday, 11 January 2024', 1, '00:29:45', 205000.00, 300000.00, 95000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(13, 'Thursday, 11 January 2024', 1, '12:35:01', 147000.00, 150000.00, 3000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(14, 'Thursday, 11 January 2024', 1, '12:36:11', 50000.00, 60000.00, 10000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(15, 'Thursday, 11 January 2024', 24, '17:26:32', 85000.00, 900000.00, 815000.00, NULL, NULL, 'Pemasukan', 'Debit'),
(16, 'Thursday, 11 January 2024', 24, '17:27:02', 115000.00, 200000.00, 85000.00, NULL, NULL, 'Pemasukan', 'Debit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `uang`
--

CREATE TABLE IF NOT EXISTS `uang` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `namaUang` varchar(100) NOT NULL,
  `Deskripsi` text DEFAULT NULL,
  `nominal` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100001 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `uang`
--

INSERT INTO `uang` (`id`, `namaUang`, `Deskripsi`, `nominal`) VALUES
(100, 'Rp. 100,-', 'Seratus Rupiah', 100),
(200, 'Rp. 200,-', 'Dua ratus Rupiah', 200),
(500, 'Rp. 500,-', 'Lima ratus Rupiah', 500),
(1000, 'Rp. 1.000,-', 'Seribu Rupiah', 1000),
(2000, 'Rp. 2.000,-', 'Dua Ribu Rupiah', 2000),
(5000, 'Rp. 5.000,-', 'Lima Ribu Rupiah', 5000),
(10000, 'Rp. 10.000,-', 'Sepuluh Ribu Rupiah', 10000),
(20000, 'Rp. 20.000,-', 'Dua Puluh Ribu Rupiah', 20000),
(50000, 'Rp. 50.000,-', 'Lima Puluh Ribu Rupiah', 50000),
(100000, 'Rp. 100.000,-', 'Seratus Ribu Rupiah', 100000);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD CONSTRAINT `c1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Ketidakleluasaan untuk tabel `balancingmodal`
--
ALTER TABLE `balancingmodal`
  ADD CONSTRAINT `bm1` FOREIGN KEY (`idKaryawan`) REFERENCES `akun` (`id`);

--
-- Ketidakleluasaan untuk tabel `detilbalancingmodal`
--
ALTER TABLE `detilbalancingmodal`
  ADD CONSTRAINT `dbm1` FOREIGN KEY (`idUang`) REFERENCES `uang` (`id`),
  ADD CONSTRAINT `dbm2` FOREIGN KEY (`idBM`) REFERENCES `balancingmodal` (`id`);

--
-- Ketidakleluasaan untuk tabel `detiltransaksi`
--
ALTER TABLE `detiltransaksi`
  ADD CONSTRAINT `dt1` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`id`),
  ADD CONSTRAINT `dt2` FOREIGN KEY (`idTransaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `yryfh5` FOREIGN KEY (`kodeJasa`) REFERENCES `jasa` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD CONSTRAINT `p5` FOREIGN KEY (`iduser`) REFERENCES `akun` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `t1` FOREIGN KEY (`idKasir`) REFERENCES `akun` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
