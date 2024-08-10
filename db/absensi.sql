-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for absensi
CREATE DATABASE IF NOT EXISTS `absensi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `absensi`;

-- Dumping structure for table absensi.absen
CREATE TABLE IF NOT EXISTS `absen` (
  `id_absen` int NOT NULL,
  `id_person` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `jenis` enum('m','k') COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table absensi.absen: ~0 rows (approximately)

-- Dumping structure for table absensi.absensi
CREATE TABLE IF NOT EXISTS `absensi` (
  `id_absen` int NOT NULL AUTO_INCREMENT,
  `id_person` int NOT NULL,
  `tanggal` date NOT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  PRIMARY KEY (`id_absen`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table absensi.absensi: ~0 rows (approximately)

-- Dumping structure for table absensi.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `nama_1` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_2` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table absensi.admin: ~0 rows (approximately)
REPLACE INTO `admin` (`id_admin`, `nama_1`, `nama_2`, `foto`, `username`, `password`) VALUES
	(8, 'kokoro', 'sensei', 'img/user/1Screenshot 2024-04-09 121459.png', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
	(32, 'riz', 'sensei', 'img/user/Screenshot 2024-04-09 121459.png', 'riz', 'a828a24b3c8a9f817820fea0d221dd1c'),
	(48, 'aa', 'aa', 'img/user/Screenshot 2024-04-09 121459.png', 'aaa', '74b87337454200d4d33f80c4663dc5e5');

-- Dumping structure for table absensi.info
CREATE TABLE IF NOT EXISTS `info` (
  `id_info` int NOT NULL AUTO_INCREMENT,
  `nama_perusahaan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `deskripsi_perusahaan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat_perusahaan` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `kec_perusahaan` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `kab_perusahaan` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `prov_perusahaan` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `kode_pos` int NOT NULL,
  `web_perusahaan` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `logo_perusahaan` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_info`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table absensi.info: ~0 rows (approximately)
REPLACE INTO `info` (`id_info`, `nama_perusahaan`, `deskripsi_perusahaan`, `alamat_perusahaan`, `kec_perusahaan`, `kab_perusahaan`, `prov_perusahaan`, `kode_pos`, `web_perusahaan`, `logo_perusahaan`) VALUES
	(51, 'seika', 'www', 'aaa', 'buah batu', 'bandung', 'jawa', 8888, 'www.www.www', 'img/user/Screenshot 2024-04-09 115105.png');

-- Dumping structure for table absensi.person
CREATE TABLE IF NOT EXISTS `person` (
  `id_person` int NOT NULL AUTO_INCREMENT,
  `no_induk` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_1` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `nama_2` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `generated_code` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_person`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table absensi.person: ~2 rows (approximately)
REPLACE INTO `person` (`id_person`, `no_induk`, `foto`, `nama_1`, `nama_2`, `generated_code`) VALUES
	(22, 'USR00004', 'Screenshot 2024-04-09 115105.png', 'Mufti', 'Antp', 'VH4SIeUbAX'),
	(68, 'USR00003', 'Screenshot 2024-04-09 121459.png', 'Yossandi ', 'Imran', 'oqGRiMAfHS');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
