-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.1.13-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win32
-- HeidiSQL Versi:               9.3.0.5117
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_akun: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_akun` DISABLE KEYS */;
INSERT INTO `tm_akun` (`kode_akun`, `akun`, `nama`, `perlakuan`) VALUES
	(1, '10.0.1', 'Pinjaman', '-'),
	(2, '10.0.2', 'Angsuran', '-'),
	(3, '11.0.1', 'Tarik', '-'),
	(4, '11.0.2', 'Simpan', '-'),
	(5, '12.0.1', 'Biaya Operasional', '-'),
	(6, '11.0.3', 'Bunga Bank', '-');
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_anggota: ~2 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_anggota` DISABLE KEYS */;
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
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_jaminan`),
  KEY `FK__tm_pinjaman` (`kd_pinjaman`),
  CONSTRAINT `FK__tm_pinjaman` FOREIGN KEY (`kd_pinjaman`) REFERENCES `tm_pinjaman` (`kd_pinjaman`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_jaminan: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_jaminan` DISABLE KEYS */;
/*!40000 ALTER TABLE `tm_jaminan` ENABLE KEYS */;

-- membuang struktur untuk table koperasi.tm_level
CREATE TABLE IF NOT EXISTS `tm_level` (
  `kd_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_level: ~1 rows (lebih kurang)
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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_pinjaman: ~6 rows (lebih kurang)
/*!40000 ALTER TABLE `tm_pinjaman` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tm_tabungan: ~6 rows (lebih kurang)
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
	(1, 'Muhammad Handharbeni', 'Puri Cempaka Putih AS 20', '1993-02-20', '2016-09-07', '3573032002930011', '081556617741', 'mhandharbeni', '12345', 1, '356a192b7913b04c54574d18c28d46e6395428ab.jpg');
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
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_angsuran: ~36 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_angsuran` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=417 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_jurnal_umum: ~61 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_jurnal_umum` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Membuang data untuk tabel koperasi.tt_perpanjangan_jangka_waktu: ~3 rows (lebih kurang)
/*!40000 ALTER TABLE `tt_perpanjangan_jangka_waktu` DISABLE KEYS */;
/*!40000 ALTER TABLE `tt_perpanjangan_jangka_waktu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
