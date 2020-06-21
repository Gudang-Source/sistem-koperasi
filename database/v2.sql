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

-- Pengeluaran data tidak dipilih.
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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
-- membuang struktur untuk table koperasi.tm_biaya
CREATE TABLE IF NOT EXISTS `tm_biaya` (
  `kd_biaya` int(11) NOT NULL AUTO_INCREMENT,
  `biaya` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kd_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
-- membuang struktur untuk table koperasi.tm_hakakses
CREATE TABLE IF NOT EXISTS `tm_hakakses` (
  `kd_hakakses` int(11) NOT NULL AUTO_INCREMENT,
  `hakakses` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_hakakses`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
-- membuang struktur untuk table koperasi.tm_level
CREATE TABLE IF NOT EXISTS `tm_level` (
  `kd_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`kd_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
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

-- Pengeluaran data tidak dipilih.
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
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
-- membuang struktur untuk table koperasi.tt_biaya
CREATE TABLE IF NOT EXISTS `tt_biaya` (
  `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_biaya` int(11) DEFAULT NULL,
  `value` double DEFAULT '0',
  PRIMARY KEY (`kd_transaksi`),
  KEY `FK__tm_biaya` (`kd_biaya`),
  CONSTRAINT `FK__tm_biaya` FOREIGN KEY (`kd_biaya`) REFERENCES `tm_biaya` (`kd_biaya`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
-- membuang struktur untuk table koperasi.tt_bunga_tabungan
CREATE TABLE IF NOT EXISTS `tt_bunga_tabungan` (
  `kd_bunga` int(11) NOT NULL AUTO_INCREMENT,
  `bulantahun` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`kd_bunga`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
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
) ENGINE=InnoDB AUTO_INCREMENT=234 DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
-- membuang struktur untuk table koperasi.tt_level
CREATE TABLE IF NOT EXISTS `tt_level` (
  `kd_level` int(11) DEFAULT NULL,
  `kd_hakses` int(11) DEFAULT NULL,
  KEY `FK__tm_level` (`kd_level`),
  KEY `FK__tm_hakakses` (`kd_hakses`),
  CONSTRAINT `FK__tm_hakakses` FOREIGN KEY (`kd_hakses`) REFERENCES `tm_hakakses` (`kd_hakakses`),
  CONSTRAINT `FK__tm_level` FOREIGN KEY (`kd_level`) REFERENCES `tm_level` (`kd_level`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Pengeluaran data tidak dipilih.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
