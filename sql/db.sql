-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for hack24
CREATE DATABASE IF NOT EXISTS `hack24` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hack24`;

-- Dumping structure for table hack24.eventhistory
CREATE TABLE IF NOT EXISTS `eventhistory` (
  `username` varchar(50) NOT NULL,
  `author` varchar(50) NOT NULL,
  `eventName` varchar(50) NOT NULL,
  `went` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table hack24.eventhistory: ~0 rows (approximately)
/*!40000 ALTER TABLE `eventhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `eventhistory` ENABLE KEYS */;

-- Dumping structure for table hack24.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(10000) NOT NULL DEFAULT '',
  `author` varchar(50) NOT NULL DEFAULT '',
  `interest` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table hack24.events: ~3 rows (approximately)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `name`, `description`, `author`, `interest`) VALUES
	(1, 'Concert', 'Yay lets have fun', 'Sam', 'music'),
	(2, 'Pub Crawl', 'Lets get wasted', 'Victor', 'drinking'),
	(3, 'Hackathon', 'Hack 24 Bitches', 'Chris', 'programming');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dumping structure for table hack24.interests
CREATE TABLE IF NOT EXISTS `interests` (
  `interest` varchar(50) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  KEY `interest` (`interest`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table hack24.interests: ~3 rows (approximately)
/*!40000 ALTER TABLE `interests` DISABLE KEYS */;
INSERT INTO `interests` (`interest`, `description`) VALUES
	('programming', 'we hack things'),
	('music', 'we listen to stuff'),
	('drinking', 'booze');
/*!40000 ALTER TABLE `interests` ENABLE KEYS */;

-- Dumping structure for table hack24.participants
CREATE TABLE IF NOT EXISTS `participants` (
  `username` varchar(50) NOT NULL,
  `event` varchar(50) NOT NULL,
  `yesOrNo` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table hack24.participants: ~0 rows (approximately)
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;

-- Dumping structure for table hack24.userinterests
CREATE TABLE IF NOT EXISTS `userinterests` (
  `username` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL,
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table hack24.userinterests: ~0 rows (approximately)
/*!40000 ALTER TABLE `userinterests` DISABLE KEYS */;
/*!40000 ALTER TABLE `userinterests` ENABLE KEYS */;

-- Dumping structure for table hack24.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `accessToken` varchar(200) NOT NULL DEFAULT '',
  `renewToken` varchar(200) NOT NULL DEFAULT '',
  `location` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table hack24.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`, `accessToken`, `renewToken`, `location`) VALUES
	(1, 'chris', 'cheese', '', '', '');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
