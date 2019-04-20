-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.3.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for economat
DROP DATABASE IF EXISTS `economat`;
CREATE DATABASE IF NOT EXISTS `economat` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `economat`;

-- Dumping structure for table economat.commands
DROP TABLE IF EXISTS `commands`;
CREATE TABLE IF NOT EXISTS `commands` (
  `c_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Comand id',
  `c_service` int(11) unsigned NOT NULL COMMENT 'Command service',
  `c_agent` int(11) unsigned NOT NULL COMMENT 'Command agent',
  `c_request_date` date NOT NULL DEFAULT curdate() COMMENT 'command request date',
  `c_delevery_date` date NOT NULL COMMENT 'command delivery date',
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table economat.commands: ~0 rows (approximately)
/*!40000 ALTER TABLE `commands` DISABLE KEYS */;
/*!40000 ALTER TABLE `commands` ENABLE KEYS */;

-- Dumping structure for table economat.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'user id',
  `p_level` tinyint(1) unsigned NOT NULL COMMENT 'permission level',
  `p_name` varchar(50) NOT NULL COMMENT 'permission name',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table economat.permissions: ~4 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`p_id`, `p_level`, `p_name`) VALUES
	(1, 0, 'Viewer'),
	(2, 1, 'Administrator'),
	(3, 2, 'Editor'),
	(4, 3, 'Fournisseur');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table economat.services
DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `s_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'service id',
  `s_name` varchar(255) NOT NULL COMMENT 'service name',
  `s_description` text NOT NULL COMMENT 'service sescription',
  `s_add_date` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'service add date',
  `s_modify_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'service modify time',
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table economat.services: ~1 rows (approximately)
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
/*!40000 ALTER TABLE `services` ENABLE KEYS */;

-- Dumping structure for table economat.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL COMMENT 'user name',
  `u_email` varchar(50) NOT NULL COMMENT 'user email',
  `u_phone` varchar(50) DEFAULT NULL COMMENT 'user phone',
  `u_passwd` varchar(255) NOT NULL,
  `u_level` tinyint(1) unsigned NOT NULL DEFAULT 0,
  `u_img` varchar(255) DEFAULT NULL,
  `u_join_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `u_update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_email` (`u_email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table economat.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_phone`, `u_passwd`, `u_level`, `u_img`, `u_join_date`, `u_update_date`) VALUES
	(1, 'Lotfio Lakehal', 'admin@site.com', '+213 662102028', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '5613efba76142b0dcaf0686e5c063f87.jpg', '2019-04-15 16:33:14', '2019-04-19 10:27:33'),
	(2, 'Editor User', 'editor@site.com', '+95 663 223 547', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, '323232.png', '2019-04-18 17:29:30', '2019-04-18 17:30:14'),
	(3, 'Viewer User', 'viewer@site.com', '+33 665 222 145', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 'qsdqsdqsd.jif', '2019-04-18 17:30:07', '2019-04-18 17:30:16');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
