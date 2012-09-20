# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.5.25)
# Database: framework
# Generation Time: 2012-09-20 12:50:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table domains
# ------------------------------------------------------------

DROP TABLE IF EXISTS `domains`;

CREATE TABLE `domains` (
  `portal_id` int(11) unsigned NOT NULL,
  `domain_id` varchar(64) NOT NULL DEFAULT '',
  `primary` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`domain_id`),
  KEY `portal_id` (`portal_id`),
  CONSTRAINT `domains_ibfk_1` FOREIGN KEY (`portal_id`) REFERENCES `portals` (`portal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `domains` WRITE;
/*!40000 ALTER TABLE `domains` DISABLE KEYS */;

INSERT INTO `domains` (`portal_id`, `domain_id`, `primary`)
VALUES
	(1,'framework.dev',1),
	(1,'otherframework.dev',0);

/*!40000 ALTER TABLE `domains` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table portals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `portals`;

CREATE TABLE `portals` (
  `portal_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`portal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `portals` WRITE;
/*!40000 ALTER TABLE `portals` DISABLE KEYS */;

INSERT INTO `portals` (`portal_id`, `name`)
VALUES
	(1,'Default Portal');

/*!40000 ALTER TABLE `portals` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
