-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.13-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.5116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Membuang struktur basisdata untuk koperasi
CREATE DATABASE IF NOT EXISTS `koperasi` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `koperasi`;

-- membuang struktur untuk table koperasi.tm_akun
CREATE TABLE IF NOT EXISTS `tm_akun` (
  `kode_akun` int(11) NOT NULL AUTO_INCREMENT,
  `akun` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `perlakuan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`kode_akun`),
  UNIQUE KEY `akun` (`akun`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_akun: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_akun` DISABLE KEYS */;
INSERT INTO `tm_akun` (`kode_akun`, `akun`, `nama`, `perlakuan`) VALUES
	(1, '10.0.1', 'Pinjaman', '-'),
	(2, '10.0.2', 'Angsuran', '-');
/*!40000 ALTER TABLE `tm_akun` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_anggota
CREATE TABLE IF NOT EXISTS `tm_anggota` (
  `kd_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `nama_anggota` varchar(100) DEFAULT NULL,
  `alamat_anggota` varchar(100) DEFAULT NULL,
  `no_identitas` varchar(100) DEFAULT NULL,
  `no_karyawan` varchar(100) DEFAULT '0',
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `kd_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_anggota`),
  KEY `FK_tm_anggota_tm_user` (`kd_user`),
  CONSTRAINT `FK_tm_anggota_tm_user` FOREIGN KEY (`kd_user`) REFERENCES `tm_user` (`kd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_anggota: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_anggota` DISABLE KEYS */;
INSERT INTO `tm_anggota` (`kd_anggota`, `nama_anggota`, `alamat_anggota`, `no_identitas`, `no_karyawan`, `tanggal_lahir`, `tanggal_masuk`, `tanggal_daftar`, `kd_user`) VALUES
	(22, 'Muhammad Handharbeni', 'Puri Cempaka Putih AS 20', '35730320029300113', '1', '1993-02-20', '2015-09-22', '2016-09-07', 1),
	(26, 'VIvi Atika Unnisyah', 'JL. BAUKSIT 31B', '3573032002930011', '0', '1994-07-31', '2012-03-01', '2016-09-10', 1),
	(27, 'Andrias', 'Mojokerto', '008', '9', '1992-09-29', '2010-09-29', '2016-09-13', 1);
/*!40000 ALTER TABLE `tm_anggota` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_biaya
CREATE TABLE IF NOT EXISTS `tm_biaya` (
  `kd_biaya` int(11) NOT NULL AUTO_INCREMENT,
  `biaya` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_biaya: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_biaya` DISABLE KEYS */;
INSERT INTO `tm_biaya` (`kd_biaya`, `biaya`) VALUES
	(1, 'LISTRIK'),
	(2, 'AIR'),
	(3, 'GAJI'),
	(4, 'INTERNET'),
	(5, 'OPERASIONAL');
/*!40000 ALTER TABLE `tm_biaya` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_hakakses
CREATE TABLE IF NOT EXISTS `tm_hakakses` (
  `kd_hakakses` int(11) NOT NULL AUTO_INCREMENT,
  `hakakses` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_hakakses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_hakakses: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_hakakses` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_hakakses` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_jaminan
CREATE TABLE IF NOT EXISTS `tm_jaminan` (
  `kd_jaminan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pinjaman` int(11) DEFAULT NULL,
  `jaminan` varchar(50) DEFAULT NULL,
  `no_surat` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_jaminan`),
  KEY `FK__tm_pinjaman` (`kd_pinjaman`),
  CONSTRAINT `FK__tm_pinjaman` FOREIGN KEY (`kd_pinjaman`) REFERENCES `tm_pinjaman` (`kd_pinjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_jaminan: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_jaminan` DISABLE KEYS */;
INSERT INTO `tm_jaminan` (`kd_jaminan`, `kd_pinjaman`, `jaminan`, `no_surat`, `status`) VALUES
	(1, 25, 'BPKB', '12345', NULL),
	(2, 26, 'BPKB', '123456', NULL),
	(3, 26, 'BPKB', '1234567', NULL),
	(4, 33, 'BPKB', '1234567', NULL),
	(5, 34, 'BPKB', '1234567', NULL),
	(6, 34, 'BPKB', '1234567', NULL),
	(7, 36, 'BPKB', '12345', NULL);
/*!40000 ALTER TABLE `tm_jaminan` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_level
CREATE TABLE IF NOT EXISTS `tm_level` (
  `kd_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_level: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_level` DISABLE KEYS */;
INSERT INTO `tm_level` (`kd_level`, `level`) VALUES
	(1, 'BOSS'),
	(2, 'ADMIN'),
	(3, 'STAFF');
/*!40000 ALTER TABLE `tm_level` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_pinjaman
CREATE TABLE IF NOT EXISTS `tm_pinjaman` (
  `kd_pinjaman` int(11) NOT NULL AUTO_INCREMENT,
  `kd_anggota` int(11) DEFAULT NULL,
  `jumlah_pinjaman` double DEFAULT NULL,
  `bunga` double DEFAULT NULL,
  `jenis_pinjaman` int(11) DEFAULT NULL,
  `jangka_waktu` int(11) DEFAULT NULL,
  `jaminan` int(11) DEFAULT NULL,
  `pokok_angsuran` int(11) DEFAULT NULL,
  `bunga_angsuran` double DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `provision` int(11) DEFAULT NULL,
  `administrasi` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `kd_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_pinjaman`),
  KEY `FK_tm_pinjaman_tm_anggota` (`kd_anggota`),
  KEY `FK_tm_pinjaman_tm_user` (`kd_user`),
  CONSTRAINT `FK_tm_pinjaman_tm_anggota` FOREIGN KEY (`kd_anggota`) REFERENCES `tm_anggota` (`kd_anggota`),
  CONSTRAINT `FK_tm_pinjaman_tm_user` FOREIGN KEY (`kd_user`) REFERENCES `tm_user` (`kd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_pinjaman: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_pinjaman` DISABLE KEYS */;
INSERT INTO `tm_pinjaman` (`kd_pinjaman`, `kd_anggota`, `jumlah_pinjaman`, `bunga`, `jenis_pinjaman`, `jangka_waktu`, `jaminan`, `pokok_angsuran`, `bunga_angsuran`, `tanggal_pinjam`, `provision`, `administrasi`, `status`, `kd_user`) VALUES
	(16, 26, 500000, 2.5, 1, 12, 0, 41667, 12500, '2016-09-14', 5000, 10000, 1, 1),
	(17, 26, 400000, 2.5, 1, 12, 0, 33333, 10000, '2016-09-14', 4000, 8000, 1, 1),
	(18, 26, 5000000, 2.5, 1, 12, 0, 416667, 125000, '2016-09-14', 50000, 100000, 1, 1),
	(25, 22, 10000000, 3, 1, 12, 0, 833333, 300000, '2016-09-15', 100000, 200000, 1, 1),
	(26, 26, 12000000, 3, 1, 6, 0, 2000000, 360000, '2016-09-15', 120000, 240000, 2, 1),
	(28, 26, 500000, 2.5, 1, 3, 0, 166667, 12500, '2016-09-15', 5000, 10000, 1, 1),
	(29, 26, 12000000, 3, 1, 12, 0, 1000000, 360000, '2016-09-15', 120000, 240000, 1, 1),
	(33, 26, 20000000, 3, 1, 3, 0, 6666667, 600000, '2016-09-16', 200000, 400000, 1, 1),
	(34, 26, 12000000, 3, 1, 12, 0, 1000000, 360000, '2016-09-16', 120000, 240000, 1, 1),
	(35, 26, 12000000, 3, 1, 6, 0, 2000000, 360000, '2016-09-16', 120000, 240000, 0, 1),
	(36, 22, 12000000, 3, 1, 6, 0, 2000000, 360000, '2016-09-16', 120000, 240000, 1, 1);
/*!40000 ALTER TABLE `tm_pinjaman` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_tabungan
CREATE TABLE IF NOT EXISTS `tm_tabungan` (
  `kd_tabungan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_anggota` int(11) NOT NULL DEFAULT '0',
  `debit` double NOT NULL DEFAULT '0',
  `kredit` double NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_tabungan`),
  KEY `FK__tm_anggota` (`kd_anggota`),
  CONSTRAINT `FK__tm_anggota` FOREIGN KEY (`kd_anggota`) REFERENCES `tm_anggota` (`kd_anggota`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_tabungan: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_tabungan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_tabungan` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_user
CREATE TABLE IF NOT EXISTS `tm_user` (
  `kd_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `no_identitas` varchar(50) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `kd_level` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_user`),
  KEY `FK_tm_user_tm_level` (`kd_level`),
  CONSTRAINT `FK_tm_user_tm_level` FOREIGN KEY (`kd_level`) REFERENCES `tm_level` (`kd_level`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_user: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_user` DISABLE KEYS */;
INSERT INTO `tm_user` (`kd_user`, `nama`, `alamat`, `tanggal_lahir`, `tanggal_masuk`, `no_identitas`, `no_hp`, `username`, `password`, `kd_level`) VALUES
	(1, 'Muhammadh Handharbeni', 'Puri Cempaka Putih AS 20', '1993-02-20', '2016-09-07', '3573032002930011', '081556617741', 'mhandharbeni', 'd41d8cd98f00b204e9800998ecf8427e', NULL);
/*!40000 ALTER TABLE `tm_user` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tt_angsuran
CREATE TABLE IF NOT EXISTS `tt_angsuran` (
  `kd_angsuran` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pinjaman` int(11) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `ke` int(11) DEFAULT NULL,
  `pinalti` double DEFAULT NULL,
  `pokok` double DEFAULT NULL,
  `bunga` double DEFAULT NULL,
  `kd_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_angsuran`),
  KEY `FK_tt_angsuran_tm_pinjaman` (`kd_pinjaman`),
  KEY `FK_tt_angsuran_tm_user` (`kd_user`),
  CONSTRAINT `FK_tt_angsuran_tm_pinjaman` FOREIGN KEY (`kd_pinjaman`) REFERENCES `tm_pinjaman` (`kd_pinjaman`),
  CONSTRAINT `FK_tt_angsuran_tm_user` FOREIGN KEY (`kd_user`) REFERENCES `tm_user` (`kd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_angsuran: ~66 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_angsuran` DISABLE KEYS */;
INSERT INTO `tt_angsuran` (`kd_angsuran`, `kd_pinjaman`, `tanggal_transaksi`, `denda`, `ke`, `pinalti`, `pokok`, `bunga`, `kd_user`) VALUES
	(1, 16, '2016-09-14', 0, 1, 0, 41667, 12500, 1),
	(2, 16, '2016-09-14', 0, 2, 0, 41667, 12500, 1),
	(3, 16, '2016-09-14', 0, 3, 0, 41667, 12500, 1),
	(4, 16, '2016-09-14', 0, 4, 0, 41667, 12500, 1),
	(5, 16, '2016-09-14', 0, 5, 0, 41667, 12500, 1),
	(22, 16, '2016-09-14', 0, 6, 2916.6666666667, 41666.666666667, 0, 1),
	(23, 16, '2016-09-14', 0, 7, 2916.6666666667, 41666.666666667, 0, 1),
	(24, 16, '2016-09-14', 0, 8, 2916.6666666667, 41666.666666667, 0, 1),
	(25, 16, '2016-09-14', 0, 9, 2916.6666666667, 41666.666666667, 0, 1),
	(26, 16, '2016-09-14', 0, 10, 2916.6666666667, 41666.666666667, 0, 1),
	(27, 16, '2016-09-14', 0, 11, 2916.6666666667, 41666.666666667, 0, 1),
	(28, 16, '2016-09-14', 0, 12, 2916.6666666667, 41666.666666667, 0, 1),
	(29, 17, '2016-09-14', 0, 1, 0, 33333, 10000, 1),
	(30, 17, '2016-09-14', 0, 2, 0, 33333, 10000, 1),
	(31, 17, '2016-09-14', 0, 3, 0, 33333, 10000, 1),
	(32, 17, '2016-09-14', 0, 4, 0, 33333, 10000, 1),
	(33, 17, '2016-09-14', 0, 5, 0, 33333, 10000, 1),
	(34, 17, '2016-09-14', 0, 6, 0, 33333, 10000, 1),
	(35, 17, '2016-09-14', 0, 7, 0, 33333, 10000, 1),
	(36, 17, '2016-09-14', 0, 8, 0, 33333, 10000, 1),
	(37, 17, '2016-09-14', 0, 9, 0, 33333, 10000, 1),
	(38, 17, '2016-09-14', 0, 10, 1000, 33333.333333333, 0, 1),
	(39, 17, '2016-09-14', 0, 11, 1000, 33333.333333333, 0, 1),
	(40, 17, '2016-09-14', 0, 12, 1000, 33333.333333333, 0, 1),
	(41, 18, '2016-09-15', 0, 1, 0, 416667, 125000, 1),
	(42, 18, '2016-09-15', 0, 2, 45833.333333333, 416666.66666666, 0, 1),
	(43, 18, '2016-09-15', 0, 3, 45833.333333333, 416666.66666666, 0, 1),
	(44, 18, '2016-09-15', 0, 4, 45833.333333333, 416666.66666666, 0, 1),
	(45, 18, '2016-09-15', 0, 5, 45833.333333333, 416666.66666666, 0, 1),
	(46, 18, '2016-09-15', 0, 6, 45833.333333333, 416666.66666666, 0, 1),
	(47, 18, '2016-09-15', 0, 7, 45833.333333333, 416666.66666666, 0, 1),
	(48, 18, '2016-09-15', 0, 8, 45833.333333333, 416666.66666666, 0, 1),
	(49, 18, '2016-09-15', 0, 9, 45833.333333333, 416666.66666666, 0, 1),
	(50, 18, '2016-09-15', 0, 10, 45833.333333333, 416666.66666666, 0, 1),
	(51, 18, '2016-09-15', 0, 11, 45833.333333333, 416666.66666666, 0, 1),
	(52, 18, '2016-09-15', 0, 12, 45833.333333333, 416666.66666666, 0, 1),
	(53, 28, '2016-09-15', 0, 1, 0, 166667, 12500, 1),
	(54, 28, '2016-09-15', 0, 2, 3333.3333333333, 166666.66666666, 0, 1),
	(55, 28, '2016-09-15', 0, 3, 3333.3333333333, 166666.66666666, 0, 1),
	(56, 29, '2016-09-15', 0, 1, 0, 1000000, 360000, 1),
	(57, 29, '2016-09-15', 0, 2, 0, 1000000, 360000, 1),
	(58, 29, '2016-09-15', 0, 3, 0, 1000000, 360000, 1),
	(59, 29, '2016-09-15', 0, 4, 0, 1000000, 360000, 1),
	(60, 29, '2016-09-15', 0, 5, 80000, 1000000, 0, 1),
	(61, 29, '2016-09-15', 0, 6, 80000, 1000000, 0, 1),
	(62, 29, '2016-09-15', 0, 7, 80000, 1000000, 0, 1),
	(63, 29, '2016-09-15', 0, 8, 80000, 1000000, 0, 1),
	(64, 29, '2016-09-15', 0, 9, 80000, 1000000, 0, 1),
	(65, 29, '2016-09-15', 0, 10, 80000, 1000000, 0, 1),
	(66, 29, '2016-09-15', 0, 11, 80000, 1000000, 0, 1),
	(67, 29, '2016-09-15', 0, 12, 80000, 1000000, 0, 1),
	(68, 33, '2016-09-16', 0, 1, 0, 6666667, 600000, 1),
	(71, 33, '2016-09-16', 0, 2, 0, 6666667, 600000, 1),
	(72, 33, '2016-09-16', 0, 3, 0, 6666667, 600000, 1),
	(73, 34, '2016-09-16', 0, 1, 0, 1000000, 360000, 1),
	(74, 34, '2016-09-16', 0, 2, 0, 1000000, 360000, 1),
	(75, 34, '2016-09-16', 0, 3, 0, 1000000, 360000, 1),
	(76, 34, '2016-09-16', 0, 4, 90000, 1000000, 0, 1),
	(77, 34, '2016-09-16', 0, 5, 90000, 1000000, 0, 1),
	(78, 34, '2016-09-16', 0, 6, 90000, 1000000, 0, 1),
	(79, 34, '2016-09-16', 0, 7, 90000, 1000000, 0, 1),
	(80, 34, '2016-09-16', 0, 8, 90000, 1000000, 0, 1),
	(81, 34, '2016-09-16', 0, 9, 90000, 1000000, 0, 1),
	(82, 34, '2016-09-16', 0, 10, 90000, 1000000, 0, 1),
	(83, 34, '2016-09-16', 0, 11, 90000, 1000000, 0, 1),
	(84, 34, '2016-09-16', 0, 12, 90000, 1000000, 0, 1),
	(85, 25, '2016-09-16', 0, 1, 100000, 833333.33333333, 0, 1),
	(86, 25, '2016-09-16', 0, 2, 100000, 833333.33333333, 0, 1),
	(87, 25, '2016-09-16', 0, 3, 100000, 833333.33333333, 0, 1),
	(88, 25, '2016-09-16', 0, 4, 100000, 833333.33333333, 0, 1),
	(89, 25, '2016-09-16', 0, 5, 100000, 833333.33333333, 0, 1),
	(90, 25, '2016-09-16', 0, 6, 100000, 833333.33333333, 0, 1),
	(91, 25, '2016-09-16', 0, 7, 100000, 833333.33333333, 0, 1),
	(92, 25, '2016-09-16', 0, 8, 100000, 833333.33333333, 0, 1),
	(93, 25, '2016-09-16', 0, 9, 100000, 833333.33333333, 0, 1),
	(94, 25, '2016-09-16', 0, 10, 100000, 833333.33333333, 0, 1),
	(95, 25, '2016-09-16', 0, 11, 100000, 833333.33333333, 0, 1),
	(96, 25, '2016-09-16', 0, 12, 100000, 833333.33333333, 0, 1),
	(97, 35, '2016-09-16', 0, 1, 0, 2000000, 360000, 1),
	(98, 35, '2016-09-16', 0, 2, 0, 2000000, 360000, 1),
	(99, 35, '2016-09-16', 0, 3, 0, 2000000, 360000, 1),
	(100, 35, '2016-09-16', 0, 4, 0, 2000000, 360000, 1),
	(101, 35, '2016-09-16', 0, 5, 0, 2000000, 360000, 1),
	(102, 35, '2016-09-16', 0, 6, 0, 2000000, 360000, 1),
	(103, 36, '2016-09-16', 0, 1, 120000, 2000000, 0, 1),
	(104, 36, '2016-09-16', 0, 2, 120000, 2000000, 0, 1),
	(105, 36, '2016-09-16', 0, 3, 120000, 2000000, 0, 1),
	(106, 36, '2016-09-16', 0, 4, 120000, 2000000, 0, 1),
	(107, 36, '2016-09-16', 0, 5, 120000, 2000000, 0, 1),
	(108, 36, '2016-09-16', 0, 6, 120000, 2000000, 0, 1);
/*!40000 ALTER TABLE `tt_angsuran` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tt_biaya
CREATE TABLE IF NOT EXISTS `tt_biaya` (
  `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_biaya` int(11) DEFAULT NULL,
  `value` double DEFAULT NULL,
  PRIMARY KEY (`kd_transaksi`),
  KEY `FK__tm_biaya` (`kd_biaya`),
  CONSTRAINT `FK__tm_biaya` FOREIGN KEY (`kd_biaya`) REFERENCES `tm_biaya` (`kd_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_biaya: ~5 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_biaya` DISABLE KEYS */;
INSERT INTO `tt_biaya` (`kd_transaksi`, `kd_biaya`, `value`) VALUES
	(1, 1, 0),
	(2, 2, 0),
	(3, 3, 0),
	(4, 4, 0),
	(5, 5, 0);
/*!40000 ALTER TABLE `tt_biaya` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tt_jurnal_umum
CREATE TABLE IF NOT EXISTS `tt_jurnal_umum` (
  `kd_jurnal` int(11) NOT NULL AUTO_INCREMENT,
  `kd_akun` int(11) DEFAULT NULL,
  `kd_transaksi` int(11) DEFAULT NULL,
  `kd_angsuran` int(11) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `debet` double DEFAULT NULL,
  `kredit` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`kd_jurnal`),
  KEY `FK__tm_akun` (`kd_akun`),
  CONSTRAINT `FK__tm_akun` FOREIGN KEY (`kd_akun`) REFERENCES `tm_akun` (`kode_akun`)
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_jurnal_umum: ~32 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_jurnal_umum` DISABLE KEYS */;
INSERT INTO `tt_jurnal_umum` (`kd_jurnal`, `kd_akun`, `kd_transaksi`, `kd_angsuran`, `keterangan`, `debet`, `kredit`, `date`) VALUES
	(1, 1, 33, 0, 'Pinjaman VIvi Atika Unnisyah', 20000000, 0, '2016-09-16'),
	(6, 2, 33, 0, 'Angsuran VIvi Atika Unnisyah ke 1', 0, 6666667, '2016-09-16'),
	(7, 2, 33, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 1', 0, 600000, '2016-09-16'),
	(8, 2, 33, 0, 'Angsuran VIvi Atika Unnisyah ke 2', 0, 6666667, '2016-09-16'),
	(9, 2, 33, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 2', 0, 600000, '2016-09-16'),
	(10, 2, 33, 0, 'Angsuran VIvi Atika Unnisyah ke 3', 0, 6666667, '2016-09-16'),
	(11, 2, 33, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 3', 0, 600000, '2016-09-16'),
	(12, 1, 34, 0, 'Pinjaman VIvi Atika Unnisyah', 12000000, 0, '2016-09-16'),
	(13, 2, 34, 0, 'Angsuran VIvi Atika Unnisyah ke 1', 0, 1000000, '2016-09-16'),
	(14, 2, 34, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 1', 0, 360000, '2016-09-16'),
	(15, 2, 34, 0, 'Angsuran VIvi Atika Unnisyah ke 2', 0, 1000000, '2016-09-16'),
	(16, 2, 34, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 2', 0, 360000, '2016-09-16'),
	(17, 2, 34, 0, 'Angsuran VIvi Atika Unnisyah ke 3', 0, 1000000, '2016-09-16'),
	(18, 2, 34, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 3', 0, 360000, '2016-09-16'),
	(19, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(20, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(21, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(22, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(23, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(24, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(25, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(26, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(27, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(28, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(29, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(30, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(31, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(32, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(33, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(34, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(35, 2, 34, 0, 'Tutup Angsuran VIvi Atika Unnisyah ke 4', 0, 1000000, '2016-09-16'),
	(36, 2, 34, 0, 'Pinalti Angsuran VIvi Atika Unnisyah ke 4', 0, 90000, '2016-09-16'),
	(37, 1, 34, 0, 'Pinjaman VIvi Atika Unnisyah', 12000000, 0, '2016-09-16'),
	(38, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(39, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(40, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(41, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(42, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(43, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(44, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(45, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(46, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(47, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(48, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(49, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(50, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(51, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(52, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(53, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(54, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(55, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(56, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(57, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(58, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(59, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(60, 2, 25, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 833333.33333333, '2016-09-16'),
	(61, 2, 25, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 100000, '2016-09-16'),
	(62, 1, 36, 0, 'Pinjaman Muhammad Handharbeni', 12000000, 0, '2016-09-16'),
	(63, 2, 35, 0, 'Angsuran VIvi Atika Unnisyah ke 1', 0, 2000000, '2016-09-16'),
	(64, 2, 35, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 1', 0, 360000, '2016-09-16'),
	(65, 2, 35, 0, 'Angsuran VIvi Atika Unnisyah ke 2', 0, 2000000, '2016-09-16'),
	(66, 2, 35, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 2', 0, 360000, '2016-09-16'),
	(67, 2, 35, 0, 'Angsuran VIvi Atika Unnisyah ke 3', 0, 2000000, '2016-09-16'),
	(68, 2, 35, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 3', 0, 360000, '2016-09-16'),
	(69, 2, 35, 0, 'Angsuran VIvi Atika Unnisyah ke 4', 0, 2000000, '2016-09-16'),
	(70, 2, 35, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 4', 0, 360000, '2016-09-16'),
	(71, 2, 35, 0, 'Angsuran VIvi Atika Unnisyah ke 5', 0, 2000000, '2016-09-16'),
	(72, 2, 35, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 5', 0, 360000, '2016-09-16'),
	(73, 2, 35, 0, 'Angsuran VIvi Atika Unnisyah ke 6', 0, 2000000, '2016-09-16'),
	(74, 2, 35, 0, 'Bunga Angsuran VIvi Atika Unnisyah ke 6', 0, 360000, '2016-09-16'),
	(75, 2, 36, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 2000000, '2016-09-16'),
	(76, 2, 36, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 120000, '2016-09-16'),
	(77, 2, 36, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 2000000, '2016-09-16'),
	(78, 2, 36, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 120000, '2016-09-16'),
	(79, 2, 36, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 2000000, '2016-09-16'),
	(80, 2, 36, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 120000, '2016-09-16'),
	(81, 2, 36, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 2000000, '2016-09-16'),
	(82, 2, 36, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 120000, '2016-09-16'),
	(83, 2, 36, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 2000000, '2016-09-16'),
	(84, 2, 36, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 120000, '2016-09-16'),
	(85, 2, 36, 0, 'Tutup Angsuran Muhammad Handharbeni ke 1', 0, 2000000, '2016-09-16'),
	(86, 2, 36, 0, 'Pinalti Angsuran Muhammad Handharbeni ke 1', 0, 120000, '2016-09-16');
/*!40000 ALTER TABLE `tt_jurnal_umum` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tt_level
CREATE TABLE IF NOT EXISTS `tt_level` (
  `kd_level` int(11) DEFAULT NULL,
  `kd_hakses` int(11) DEFAULT NULL,
  KEY `FK__tm_level` (`kd_level`),
  KEY `FK__tm_hakakses` (`kd_hakses`),
  CONSTRAINT `FK__tm_hakakses` FOREIGN KEY (`kd_hakses`) REFERENCES `tm_hakakses` (`kd_hakakses`),
  CONSTRAINT `FK__tm_level` FOREIGN KEY (`kd_level`) REFERENCES `tm_level` (`kd_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_level: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_level` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_level` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
