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
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella gaiae.account: ~8 rows (circa)
INSERT INTO `account` (`username`, `nome`, `cognome`, `password`, `email`, `telefono`) VALUES
	('1', 'g', 'g', 'gg', 'gg.gg@liceobanfi.eu', NULL),
	('asd', 'prof', 'prof', 'asd', 'ertyuioiutre@kjhgrtyu', 2147483647),
	('ert66', 'fghj', 'fghj', 'ff', 'gaia.cazzamalli@gmail.com', NULL),
	('erty', 'erty', 'rtyui', '345h', 'gaia.cazzamalli@gmail.com', 2147483647),
	('gaia', 'Gaia', 'Cazzamalli', 'gaia22', 'gaia.cazzamalli@gmail.com', 2147483647),
	('gaia11', 'Gaia', 'Cazzamalli', 'gaia222', 'gaia.cazzamalli@gmail.com', 2147483647),
	('gaiaa99', 'ddddd', 'fff', 'aa', 'gaia.cazzamalli@gmail.com', NULL),
	('gg1', 'gaia', 'cazzamalli', 'hh', 'gaia.cazzamalli@gmail.com', 2147483647),
	('gggg', 'yyyy', 'iiii', 'uu', 'gaia.cazzmalli@gmail.com', NULL),
	('gia', 'gaia', 'cazzamalli', 'gaia.2005', 'gaia.cazzamalli@liceobanfi.eu', NULL);

-- Dump della struttura di tabella gaiae.immagini
CREATE TABLE IF NOT EXISTS `immagini` (
  `id` varchar(50) NOT NULL,
  `path` varchar(60) NOT NULL,
  `matricola` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `matricola` (`matricola`),
  CONSTRAINT `FK_immagini_immobile` FOREIGN KEY (`matricola`) REFERENCES `immobile` (`matricola`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella gaiae.immagini: ~16 rows (circa)
INSERT INTO `immagini` (`id`, `path`, `matricola`) VALUES
	('casa10', '../immagini/casa10.jpg', 234),
	('casa11', '../immagini/check-up-casa.jpg', 456),
	('casa14', '../immagini/de60887e13d22742f7d640417f91922b.jpg', 456),
	('casa2', '../immagini/casa2.jpg', 234),
	('casa20', '../immagini/de60887e13d22742f7d640417f91922b.jpg', 456),
	('casa22', '../immagini/de60887e13d22742f7d640417f91922b.jpg', 456),
	('casa3', '../immagini/casa3.jpg', 123),
	('casa4', '../immagini/casa4.jpg', 34),
	('casa5', '../immagini/casa5.jpg', 123),
	('casa6', '../immagini/casa6.jpg', 34),
	('casa7', '../immagini/casa7.jpg', 56),
	('casa8', '../immagini/casa8.jpg', 76),
	('casa9', '.../immagini/casa9.jpg', 56),
	('case1', '../immagini/case1.jpg', 76);

-- Dump della struttura di tabella gaiae.immobile
CREATE TABLE IF NOT EXISTS `immobile` (
  `matricola` int(11) NOT NULL DEFAULT 0,
  `username` varchar(50) NOT NULL DEFAULT '0',
  `superficie` double NOT NULL DEFAULT 0,
  `prezzo` double NOT NULL DEFAULT 0,
  `n_piani` int(11) NOT NULL DEFAULT 0,
  `citta` char(50) NOT NULL DEFAULT '0',
  `via` varchar(50) NOT NULL DEFAULT '0',
  `n_civico` varchar(50) NOT NULL DEFAULT '0',
  `preferito` varchar(50) DEFAULT NULL,
  `locali` varchar(50) DEFAULT NULL,
  `map` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`matricola`),
  KEY `username` (`username`),
  CONSTRAINT `FK_immobile_account` FOREIGN KEY (`username`) REFERENCES `account` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dump dei dati della tabella gaiae.immobile: ~8 rows (circa)
INSERT INTO `immobile` (`matricola`, `username`, `superficie`, `prezzo`, `n_piani`, `citta`, `via`, `n_civico`, `preferito`, `locali`, `map`) VALUES
	(34, 'gaia', 567898765, 9888888, 4, 'Bari', 'Macchiavelli', '10', NULL, '4', 'https://maps.google.com/?q=Via+Niccol%C3%B2+Machia'),
	(45, 'asd', 6789, 234567, 3, 'Agrate', 'Petrarca', '9', NULL, '2', 'https://maps.app.goo.gl/frZmpmZjecvtPq2R7'),
	(56, 'gaia', 45666, 234566, 3, 'Milano', 'Monti', '8', NULL, '6', 'https://maps.app.goo.gl/br1fjvjrqx6tWLpr7'),
	(76, 'erty', 456777, 56789, 6, 'Firenze', 'Alighieri', '56', NULL, '5', 'https://maps.app.goo.gl/A6sFpRysHezM241e9'),
	(123, 'gia', 123333, 12345, 2, 'Lesmo', 'Grigan', '9', NULL, '7', 'https://maps.app.goo.gl/qBoR6o4aFnPKqwEY9'),
	(234, '1', 1234, 123456, 1, 'Monza', 'Manzoni', '23', NULL, '2', 'https://maps.google.com/?q=Via+Alessandro+Manzoni%'),
	(456, '1', 2345, 34567, 3, 'lesmo', 'tyuio', '4', NULL, '4', 'https://maps.app.goo.gl/qctQy1YqaUA4fz2V6'),
	(1233, '1', 1235544, 2345678, 1, 'lesmo', 'rerre', '44', NULL, '6', 'https://maps.app.goo.gl/bjdfmhpW8KiETrNE6');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
