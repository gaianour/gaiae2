-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versione server:              10.4.28-MariaDB - mariadb.org binary distribution
-- S.O. server:                  Win64
-- HeidiSQL Versione:            12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump della struttura del database gaiae
CREATE DATABASE IF NOT EXISTS `gaiae` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `gaiae`;

-- Dump della struttura di tabella gaiae.account
CREATE TABLE IF NOT EXISTS `account` (
  `username` varchar(50) NOT NULL,
  `nome` char(50) NOT NULL DEFAULT '0',
  `cognome` char(50) NOT NULL DEFAULT '0',
  `password` char(50) NOT NULL DEFAULT '',
  `email` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella gaiae.account: ~2 rows (circa)
INSERT INTO `account` (`username`, `nome`, `cognome`, `password`, `email`) VALUES
	('1', 'g', 'g', 'gg', 'gg.gg@liceobanfi.eu'),
	('gia', 'gaia', 'cazzamalli', 'gaia.2005', 'gaia.cazzamalli@liceobanfi.eu');

-- Dump della struttura di tabella gaiae.immagini
CREATE TABLE IF NOT EXISTS `immagini` (
  `id` varchar(50) NOT NULL,
  `path` varchar(60) NOT NULL,
  `matricola` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_immagini_immobile` (`matricola`),
  CONSTRAINT `FK_immagini_immobile` FOREIGN KEY (`matricola`) REFERENCES `immobile` (`matricola`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella gaiae.immagini: ~10 rows (circa)
INSERT INTO `immagini` (`id`, `path`, `matricola`) VALUES
	('casa10', '../immagini/casa10.jpg', 234),
	('casa2', '../immagini/casa2.jpg', 123),
	('casa3', '../immagini/casa3.jpg', 234),
	('casa4', '../immagini/casa4.jpg', 123),
	('casa5', '../immagini/casa5.jpg', NULL),
	('casa6', '../immagini/casa6.jpg', NULL),
	('casa7', '../immagini/casa7.jpg', NULL),
	('casa8', '../immagini/casa8.jpg', NULL),
	('casa9', '.../immagini/casa9.jpg', NULL),
	('case1', '../immagini/case1.jpg', NULL);

-- Dump della struttura di tabella gaiae.immobile
CREATE TABLE IF NOT EXISTS `immobile` (
  `matricola` int(11) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `superficie` double NOT NULL DEFAULT 0,
  `prezzo` double NOT NULL DEFAULT 0,
  `n_piani` int(11) NOT NULL DEFAULT 0,
  `citta` char(50) NOT NULL DEFAULT '0',
  `via` varchar(50) NOT NULL DEFAULT '0',
  `n_civico` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`matricola`),
  KEY `username` (`username`),
  CONSTRAINT `FK_immobile_account` FOREIGN KEY (`username`) REFERENCES `account` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella gaiae.immobile: ~2 rows (circa)
INSERT INTO `immobile` (`matricola`, `username`, `superficie`, `prezzo`, `n_piani`, `citta`, `via`, `n_civico`) VALUES
	(123, 'gia', 123333, 12345, 2, 'Lesmo', 'Grigan', '9'),
	(234, '1', 1234, 123456, 1, 'Monza', 'Manzoni', '23');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
