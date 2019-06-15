-- --------------------------------------------------------
-- Host:                         192.168.10.10
-- Server version:               5.7.12-0ubuntu1.1 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for INT1000
CREATE DATABASE IF NOT EXISTS `INT1000` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `INT1000`;

-- Dumping structure for table INT1000.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Dumping data for table INT1000.categories: ~4 rows (approximately)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `category_name`) VALUES
	(1, 'Addisjon'),
	(2, 'Subtraksjon'),
	(3, 'Divisjon'),
	(4, 'Multiplikasjon');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Dumping structure for table INT1000.questions
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_name` text NOT NULL,
  `answer1` varchar(250) NOT NULL,
  `answer2` varchar(250) NOT NULL,
  `answer3` varchar(250) NOT NULL,
  `answer4` varchar(250) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- Dumping data for table INT1000.questions: ~20 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `question_name`, `answer1`, `answer2`, `answer3`, `answer4`, `answer`, `category_id`) VALUES
	(1, 'Hva er 2+2?', '22', '4', '2', '3', '2', 1),
	(2, 'Hva er 5+10?', '15', '50', '5', '10', '1', 1),
	(3, 'Hva er 4+6?\r\n\r\n\r\n', '12', '8', '22', '10', '4', 1),
	(4, 'Hva er 0+9?\r\n\r\n\r\n\r\n', '0', '10', '9', '1', '3', 1),
	(5, 'Hva er 10+10?\r\n\r\n\r\n\r\n', '100', '20', '1000', '10', '2', 1),
	(6, 'Hva er 10-10?\r\n	\r\n	\r\n	', '0', '10', '5', '-10', '1', 2),
	(7, 'Hva er 8-3?\r\n	\r\n	\r\n	\r\n	\r\n', '6', '3', '5', '-5', '3', 2),
	(8, 'Hva er 35-100?\r\n	\r\n	\r\n	\r\n	', '40', '-55', '65', '-65', '4', 2),
	(9, 'Hva er 100-66?\r\n\r\n\r\n\r\n', '34', '24', '-34', '44', '1', 2),
	(10, 'Hva er 100-100?\r\n\r\n\r\n\r\n', '200', '-100', '0', '-100', '3', 2),
	(11, 'Hva er 3x10?	\r\n	\r\n	\r\n	', '3', '0', '10', '30', '4', 4),
	(12, 'Hva er 30x0?\r\n	\r\n	\r\n	\r\n	', '30', '3', '300', '0', '4', 4),
	(13, 'Hva er 2x2?\r\n\r\n	\r\n	\r\n	', '1', '2', '4', '6', '3', 4),
	(14, 'Hva er 2x4?\r\n	\r\n	\r\n	\r\n	', '4', '10', '8', '12', '3', 4),
	(15, 'Hva er -2x2?\r\n	\r\n	\r\n	', '-4', '4', '-2', '2', '1', 4),
	(16, 'Hva er 2:2?\r\n	\r\n	\r\n	', '1', '4', '2', '-1', '1', 3),
	(17, 'Hva er -24:8?\r\n	\r\n	\r\n	\r\n	', '4', '-3', '3', '-4', '2', 3),
	(18, 'Hva er -10:10?\r\n	\r\n	\r\n	', '1', '-1', '10', '-10', '2', 3),
	(19, 'Hva er 18:3?\r\n\r\n	\r\n	\r\n	', '2', '4', '9', '6', '4', 3),
	(20, 'Hva er 10:5?\r\n	\r\n	\r\n	\r\n	', '5', '15', '2', '10', '3', 3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Dumping structure for table INT1000.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- Dumping data for table INT1000.users: ~9 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `user_name`, `score`, `category_id`) VALUES
	(3, 'Imran', 1, 2),
	(5, 'borz', 5, 4),
	(6, 'lasse', 5, 1),
	(13, 'Test1', 0, 2),
	(14, 'ysf', 0, 2),
	(15, 'ysf', 0, 2),
	(16, 'ysf', 0, 2),
	(17, 'ysf', 0, 2),
	(18, 'ysf', 0, 2),
	(19, 'ysf', 0, 2),
	(20, 'ysf', 0, 2),
	(21, 'ysf', 0, 2),
	(22, 'ysf', 0, 2),
	(23, 'ysf', 0, 2),
	(24, 'ysf', 0, 2),
	(25, 'ysf', 0, 2),
	(26, 'ysf', 0, 2),
	(27, 'ysf', 0, 2),
	(28, 'ysf', 0, 2),
	(29, 'ysf', 0, 2),
	(30, 'ysf', 0, 2),
	(31, 'ysf', 0, 2),
	(32, 'ysf', 0, 2),
	(33, 'ysf', 0, 2),
	(34, 'ysf', 0, 2),
	(35, 'ysf', 0, 2),
	(36, 'ysf', 0, 2),
	(37, 'ysf', 0, 2),
	(38, 'ysf', 0, 2),
	(39, 'ysf', 0, 2),
	(40, 'ysf', 0, 2),
	(41, 'ysf', 0, 2),
	(42, 'dda', 4, 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
