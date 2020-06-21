-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.13-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.5119
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_akun: ~9 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_akun` DISABLE KEYS */;
INSERT INTO `tm_akun` (`kode_akun`, `akun`, `nama`, `perlakuan`) VALUES
	(1, '10.0.1', 'Pinjaman', '-'),
	(2, '10.0.2', 'Angsuran', '-'),
	(3, '11.0.1', 'Tarik', '-'),
	(4, '11.0.2', 'Simpan', '-'),
	(5, '12.0.1', 'Biaya Operasional', '-'),
	(6, '11.0.3', 'Bunga Bank', '-'),
	(7, '10.0.3', 'Bunga Angsuran', '-'),
	(8, '13.0.1', 'Administrasi', '-'),
	(9, '13.0.2', 'Provisi', '-');
/*!40000 ALTER TABLE `tm_akun` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_anggota
CREATE TABLE IF NOT EXISTS `tm_anggota` (
  `kd_anggota` int(11) NOT NULL AUTO_INCREMENT,
  `no_anggota` int(11) NOT NULL DEFAULT '0',
  `nama_anggota` varchar(100) DEFAULT NULL,
  `alamat_anggota` varchar(100) DEFAULT NULL,
  `no_hp` varchar(100) DEFAULT '0',
  `no_identitas` varchar(100) DEFAULT NULL,
  `no_karyawan` varchar(100) DEFAULT '0',
  `tanggal_lahir` date DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_daftar` date DEFAULT NULL,
  `kd_user` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_anggota`),
  KEY `FK_tm_anggota_tm_user` (`kd_user`),
  CONSTRAINT `FK_tm_anggota_tm_user` FOREIGN KEY (`kd_user`) REFERENCES `tm_user` (`kd_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_anggota: ~4 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_anggota` DISABLE KEYS */;
INSERT INTO `tm_anggota` (`kd_anggota`, `no_anggota`, `nama_anggota`, `alamat_anggota`, `no_hp`, `no_identitas`, `no_karyawan`, `tanggal_lahir`, `tanggal_masuk`, `tanggal_daftar`, `kd_user`) VALUES
	(1, 0, 'Andrias Sofian Adinata', 'Moker', '0', '003', '122', '1992-09-29', '2016-10-05', '2016-10-05', 1),
	(5, 0, 'Anggota Karyawan', 'Malang', '0', '001', '0123', '2016-10-10', '2016-10-10', '2016-10-10', 1),
	(6, 1, 'Anggota Umum 1', 'Malang', '0', '00987', '', '2016-10-10', '2016-10-10', '2016-10-10', 1),
	(7, 2, 'Anggota Umum 2', 'Malng', '0', '00876', '', '2016-10-10', '2016-10-10', '2016-10-10', 1);
/*!40000 ALTER TABLE `tm_anggota` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_biaya
CREATE TABLE IF NOT EXISTS `tm_biaya` (
  `kd_biaya` int(11) NOT NULL AUTO_INCREMENT,
  `biaya` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_biaya: ~10 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_biaya` DISABLE KEYS */;
INSERT INTO `tm_biaya` (`kd_biaya`, `biaya`) VALUES
	(1, 'LISTRIK'),
	(2, 'AIR'),
	(3, 'HONOR KARYAWAN'),
	(4, 'DANA BANTUAN SOSIAL'),
	(5, 'OPERASIONAL 1'),
	(6, 'OPERASIONAL 2'),
	(7, 'OPERASIONAL 3'),
	(8, 'OPERASIONAL 4'),
	(9, 'OPERASIONAL 5'),
	(10, 'OPERASIONAL 6');
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
  `nopol` varchar(50) DEFAULT NULL,
  `merk` varchar(50) DEFAULT NULL,
  `tahun` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `norangka` varchar(50) DEFAULT NULL,
  `nomesin` varchar(50) DEFAULT NULL,
  `atasnama` varchar(50) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `luastanah` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`kd_jaminan`),
  KEY `FK__tm_pinjaman` (`kd_pinjaman`),
  CONSTRAINT `FK__tm_pinjaman` FOREIGN KEY (`kd_pinjaman`) REFERENCES `tm_pinjaman` (`kd_pinjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_jaminan: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_jaminan` DISABLE KEYS */;
INSERT INTO `tm_jaminan` (`kd_jaminan`, `kd_pinjaman`, `jaminan`, `no_surat`, `nopol`, `merk`, `tahun`, `warna`, `norangka`, `nomesin`, `atasnama`, `alamat`, `luastanah`, `status`) VALUES
	(1, 1, 'BPKB', '1234567', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 34, 'sertifikat', '12345', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(23, 36, 'sertifikat', '786', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
	(24, 38, 'sertifikat', '123456', NULL, NULL, NULL, NULL, NULL, NULL, 'beni', 'malang', '102', 0);
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_pinjaman: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_pinjaman` DISABLE KEYS */;
INSERT INTO `tm_pinjaman` (`kd_pinjaman`, `kd_anggota`, `jumlah_pinjaman`, `bunga`, `jenis_pinjaman`, `jangka_waktu`, `jaminan`, `pokok_angsuran`, `bunga_angsuran`, `tanggal_pinjam`, `provision`, `administrasi`, `status`, `kd_user`) VALUES
	(1, 1, 2000000, 3, 1, 10, 0, 0, 60000, '2016-10-05', 20000, 40000, 1, 1),
	(20, 1, 500000, 2.5, 0, 3, 0, 166667, 12500, '2016-10-09', 5000, 10000, 1, 1),
	(21, 1, 500000, 2.5, 0, 3, 0, 166667, 12500, '2016-10-09', 5000, 10000, 1, 1),
	(34, 1, 900000, 2.5, 0, 3, 0, 300000, 22500, '2016-10-09', 9000, 18000, 1, 1),
	(36, 6, 1000000, 2, 1, 10, 0, 0, 20000, '2016-10-10', 10000, 20000, 0, 1),
	(38, 7, 900000, 2.5, 0, 3, 0, 300000, 22500, '2016-10-10', 9000, 18000, 0, 1);
/*!40000 ALTER TABLE `tm_pinjaman` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_tabungan
CREATE TABLE IF NOT EXISTS `tm_tabungan` (
  `kd_tabungan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_anggota` int(11) NOT NULL DEFAULT '0',
  `debit` double NOT NULL DEFAULT '0',
  `kredit` double NOT NULL DEFAULT '0',
  `date` date NOT NULL,
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
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`kd_user`),
  KEY `FK_tm_user_tm_level` (`kd_level`),
  CONSTRAINT `FK_tm_user_tm_level` FOREIGN KEY (`kd_level`) REFERENCES `tm_level` (`kd_level`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_user: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_user` DISABLE KEYS */;
INSERT INTO `tm_user` (`kd_user`, `nama`, `alamat`, `tanggal_lahir`, `tanggal_masuk`, `no_identitas`, `no_hp`, `username`, `password`, `kd_level`, `foto`) VALUES
	(1, 'Muhammad Handharbeni', 'Puri Cempaka Putih AS 20', '1993-02-20', '2016-09-07', '3573032002930011', '081556617741', 'mhandharbeni', '827ccb0eea8a706c4c34a16891f84e7b', 1, '356a192b7913b04c54574d18c28d46e6395428ab.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_angsuran: ~20 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_angsuran` DISABLE KEYS */;
INSERT INTO `tt_angsuran` (`kd_angsuran`, `kd_pinjaman`, `tanggal_transaksi`, `denda`, `ke`, `pinalti`, `pokok`, `bunga`, `kd_user`) VALUES
	(1, 1, '2016-10-08', 0, 1, 0, 0, 60000, 1),
	(2, 1, '2016-10-08', 0, 2, 0, 0, 60000, 1),
	(3, 1, '2016-10-08', 0, 3, 0, 0, 60000, 1),
	(4, 1, '2016-10-08', 0, 4, 0, 0, 60000, 1),
	(5, 1, '2016-10-08', 0, 5, 0, 0, 60000, 1),
	(6, 1, '2016-10-08', 0, 6, 0, 0, 60000, 1),
	(7, 1, '2016-10-08', 0, 7, 0, 0, 60000, 1),
	(8, 1, '2016-10-08', 0, 8, 0, 0, 60000, 1),
	(9, 1, '2016-10-08', 0, 9, 0, 0, 60000, 1),
	(10, 1, '2016-10-08', 0, 10, 0, 0, 60000, 1),
	(11, 1, '2016-10-08', 0, 11, 0, 2000000, 0, 1),
	(12, 20, '2016-10-09', 0, 1, 5000, 166666.66666667, 0, 1),
	(13, 20, '2016-10-09', 0, 2, 5000, 166666.66666667, 0, 1),
	(14, 20, '2016-10-09', 0, 3, 5000, 166666.66666667, 0, 1),
	(15, 21, '2016-10-09', 0, 1, 5000, 166666.66666667, 0, 1),
	(16, 21, '2016-10-09', 0, 2, 5000, 166666.66666667, 0, 1),
	(17, 21, '2016-10-09', 0, 3, 5000, 166666.66666667, 0, 1),
	(18, 34, '2016-10-10', 0, 1, 9000, 300000, 0, 1),
	(19, 34, '2016-10-10', 0, 2, 9000, 300000, 0, 1),
	(20, 34, '2016-10-10', 0, 3, 9000, 300000, 0, 1);
/*!40000 ALTER TABLE `tt_angsuran` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tt_biaya
CREATE TABLE IF NOT EXISTS `tt_biaya` (
  `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_biaya` int(11) DEFAULT NULL,
  `value` double DEFAULT '0',
  PRIMARY KEY (`kd_transaksi`),
  KEY `FK__tm_biaya` (`kd_biaya`),
  CONSTRAINT `FK__tm_biaya` FOREIGN KEY (`kd_biaya`) REFERENCES `tm_biaya` (`kd_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_biaya: ~10 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_biaya` DISABLE KEYS */;
INSERT INTO `tt_biaya` (`kd_transaksi`, `kd_biaya`, `value`) VALUES
	(1, 1, 0),
	(2, 2, 0),
	(3, 3, 0),
	(4, 4, 0),
	(5, 5, 0),
	(6, 6, 0),
	(7, 7, 0),
	(8, 8, 0),
	(9, 9, 0),
	(10, 10, 0);
/*!40000 ALTER TABLE `tt_biaya` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tt_bunga_tabungan
CREATE TABLE IF NOT EXISTS `tt_bunga_tabungan` (
  `kd_bunga` int(11) NOT NULL AUTO_INCREMENT,
  `bulantahun` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_bunga`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_bunga_tabungan: ~1 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_bunga_tabungan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_bunga_tabungan` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_jurnal_umum: ~41 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_jurnal_umum` DISABLE KEYS */;
INSERT INTO `tt_jurnal_umum` (`kd_jurnal`, `kd_akun`, `kd_transaksi`, `kd_angsuran`, `keterangan`, `debet`, `kredit`, `date`) VALUES
	(1, 1, 1, 0, 'Pinjaman Andrias Sofian Adinata', 2000000, 0, '2016-10-05'),
	(2, 8, 1, 0, 'Administrasi Andrias Sofian Adinata', 0, 40000, '2016-10-05'),
	(3, 9, 1, 0, 'Provisi Andrias Sofian Adinata', 0, 20000, '2016-10-05'),
	(4, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 1', 0, 60000, '2016-10-08'),
	(5, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 2', 0, 60000, '2016-10-08'),
	(6, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 3', 0, 60000, '2016-10-08'),
	(7, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 4', 0, 60000, '2016-10-08'),
	(8, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 5', 0, 60000, '2016-10-08'),
	(9, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 6', 0, 60000, '2016-10-08'),
	(10, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 7', 0, 60000, '2016-10-08'),
	(11, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 8', 0, 60000, '2016-10-08'),
	(12, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 9', 0, 60000, '2016-10-08'),
	(13, 2, 1, 0, 'Angsuran Bunga Andrias Sofian Adinata ke 10', 0, 60000, '2016-10-08'),
	(14, 2, 1, 0, 'Bayar Jumlah Pinjaman Andrias Sofian Adinata ke 11', 0, 2000000, '2016-10-08'),
	(15, 1, 20, 0, 'Pinjaman Andrias Sofian Adinata', 500000, 0, '2016-10-09'),
	(16, 8, 20, 0, 'Administrasi Andrias Sofian Adinata', 0, 10000, '2016-10-09'),
	(17, 9, 20, 0, 'Provisi Andrias Sofian Adinata', 0, 5000, '2016-10-09'),
	(18, 2, 20, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 1', 0, 166666.66666667, '2016-10-09'),
	(19, 2, 20, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 1', 0, 5000, '2016-10-09'),
	(20, 2, 20, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 2', 0, 166666.66666667, '2016-10-09'),
	(21, 2, 20, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 2', 0, 5000, '2016-10-09'),
	(22, 2, 20, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 3', 0, 166666.66666667, '2016-10-09'),
	(23, 2, 20, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 3', 0, 5000, '2016-10-09'),
	(24, 2, 21, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 1', 0, 166666.66666667, '2016-10-09'),
	(25, 2, 21, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 1', 0, 5000, '2016-10-09'),
	(26, 2, 21, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 2', 0, 166666.66666667, '2016-10-09'),
	(27, 2, 21, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 2', 0, 5000, '2016-10-09'),
	(28, 2, 21, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 3', 0, 166666.66666667, '2016-10-09'),
	(29, 2, 21, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 3', 0, 5000, '2016-10-09'),
	(30, 1, 34, 0, 'Pinjaman Andrias Sofian Adinata', 900000, 0, '2016-10-09'),
	(31, 8, 34, 0, 'Administrasi Andrias Sofian Adinata', 0, 18000, '2016-10-09'),
	(32, 9, 34, 0, 'Provisi Andrias Sofian Adinata', 0, 9000, '2016-10-09'),
	(33, 2, 34, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 1', 0, 300000, '2016-10-10'),
	(34, 2, 34, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 1', 0, 9000, '2016-10-10'),
	(35, 2, 34, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 2', 0, 300000, '2016-10-10'),
	(36, 2, 34, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 2', 0, 9000, '2016-10-10'),
	(37, 2, 34, 0, 'Tutup Angsuran Andrias Sofian Adinata ke 3', 0, 300000, '2016-10-10'),
	(38, 2, 34, 0, 'Pinalti Angsuran Andrias Sofian Adinata ke 3', 0, 9000, '2016-10-10'),
	(39, 1, 36, 0, 'Pinjaman Anggota Umum 1', 1000000, 0, '2016-10-10'),
	(40, 8, 36, 0, 'Administrasi Anggota Umum 1', 0, 20000, '2016-10-10'),
	(41, 9, 36, 0, 'Provisi Anggota Umum 1', 0, 10000, '2016-10-10'),
	(42, 1, 38, 0, 'Pinjaman Anggota Umum 2', 900000, 0, '2016-10-10'),
	(43, 8, 38, 0, 'Administrasi Anggota Umum 2', 0, 18000, '2016-10-10'),
	(44, 9, 38, 0, 'Provisi Anggota Umum 2', 0, 9000, '2016-10-10');
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

-- membuang struktur untuk table koperasi.tt_perpanjangan_jangka_waktu
CREATE TABLE IF NOT EXISTS `tt_perpanjangan_jangka_waktu` (
  `kd_perpanjangan` int(11) NOT NULL AUTO_INCREMENT,
  `kd_pinjaman` int(11) DEFAULT NULL,
  `jumlah_pinjaman` double DEFAULT NULL,
  `bunga_jasa` double DEFAULT NULL,
  `jasa` double DEFAULT NULL,
  `jangka_waktu_awal` int(11) DEFAULT NULL,
  `jangka_waktu_perpanjangan` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_perpanjangan`),
  KEY `FK_tt_perpanjangan_jangka_waktu_tm_pinjaman` (`kd_pinjaman`),
  CONSTRAINT `FK_tt_perpanjangan_jangka_waktu_tm_pinjaman` FOREIGN KEY (`kd_pinjaman`) REFERENCES `tm_pinjaman` (`kd_pinjaman`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_perpanjangan_jangka_waktu: ~0 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_perpanjangan_jangka_waktu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_perpanjangan_jangka_waktu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
