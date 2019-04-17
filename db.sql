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

-- Dumping structure for table economat.permissions
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `p_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'user id',
  `p_level` tinyint(1) unsigned NOT NULL COMMENT 'permission level',
  `p_name` varchar(50) NOT NULL COMMENT 'permission name',
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table economat.permissions: ~3 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`p_id`, `p_level`, `p_name`) VALUES
	(1, 0, 'Viewer'),
	(2, 1, 'Administrator'),
	(3, 2, 'Editor');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table economat.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_phone`, `u_passwd`, `u_level`, `u_img`, `u_join_date`, `u_update_date`) VALUES
	(2, 'Lotfio Lakehal', 'admin@site.com', '+213662102028', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, '2f1802e711dfbbb6860ce88486d31193.jpg', '2019-04-15 16:33:14', '2019-04-17 11:31:04'),
	(3, 'Viewer User', 'viewer@site.com', '+66 22 33665', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, NULL, '2019-04-17 11:19:33', '2019-04-17 11:21:08'),
	(4, 'Editor User', 'editor@site.com', '+95 223 654 552', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, NULL, '2019-04-17 11:20:23', '2019-04-17 11:20:24');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
