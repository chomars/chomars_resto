CREATE DATABASE  IF NOT EXISTS `chomars_resto` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `chomars_resto`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: chomars_resto
-- ------------------------------------------------------
-- Server version	5.6.12-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `checkin`
--

DROP TABLE IF EXISTS `checkin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `checkin` (
  `checkin_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `resto_id` int(11) DEFAULT NULL,
  `checkin_date` datetime DEFAULT NULL,
  PRIMARY KEY (`checkin_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `resto_id_idx` (`resto_id`),
  CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `resto_id` FOREIGN KEY (`resto_id`) REFERENCES `resto` (`resto_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `checkin`
--

LOCK TABLES `checkin` WRITE;
/*!40000 ALTER TABLE `checkin` DISABLE KEYS */;
/*!40000 ALTER TABLE `checkin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resto`
--

DROP TABLE IF EXISTS `resto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resto` (
  `resto_id` int(11) NOT NULL AUTO_INCREMENT,
  `resto_name` varchar(255) DEFAULT NULL,
  `min_price` float(10,0) DEFAULT NULL,
  `max_price` float(10,0) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `input_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `resto_type_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`resto_id`),
  KEY `category_id_idx` (`category_id`),
  KEY `resto_type_id_idx` (`resto_type_id`),
  CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `resto_type_id` FOREIGN KEY (`resto_type_id`) REFERENCES `resto_type` (`resto_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resto`
--

LOCK TABLES `resto` WRITE;
/*!40000 ALTER TABLE `resto` DISABLE KEYS */;
/*!40000 ALTER TABLE `resto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resto_branch`
--

DROP TABLE IF EXISTS `resto_branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resto_branch` (
  `resto_branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `address` text,
  `resto_id` int(11) DEFAULT NULL,
  `kecamatan` tinyint(4) DEFAULT NULL,
  `city` tinyint(4) DEFAULT NULL,
  `province` tinyint(4) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `rate` varchar(45) DEFAULT NULL,
  `koordinat_x` float DEFAULT NULL,
  `koordinat_y` float DEFAULT NULL,
  PRIMARY KEY (`resto_branch_id`),
  KEY `resto_id_idx` (`resto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resto_branch`
--

LOCK TABLES `resto_branch` WRITE;
/*!40000 ALTER TABLE `resto_branch` DISABLE KEYS */;
/*!40000 ALTER TABLE `resto_branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resto_images`
--

DROP TABLE IF EXISTS `resto_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resto_images` (
  `resto_images_id` int(11) NOT NULL AUTO_INCREMENT,
  `resto_branch_id` int(11) DEFAULT NULL,
  `caption` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`resto_images_id`),
  KEY `resto_id_idx` (`resto_branch_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resto_images`
--

LOCK TABLES `resto_images` WRITE;
/*!40000 ALTER TABLE `resto_images` DISABLE KEYS */;
/*!40000 ALTER TABLE `resto_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resto_menu`
--

DROP TABLE IF EXISTS `resto_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resto_menu` (
  `resto_menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `resto_id` int(11) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`resto_menu_id`),
  KEY `resto_id_idx` (`resto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resto_menu`
--

LOCK TABLES `resto_menu` WRITE;
/*!40000 ALTER TABLE `resto_menu` DISABLE KEYS */;
/*!40000 ALTER TABLE `resto_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resto_type`
--

DROP TABLE IF EXISTS `resto_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resto_type` (
  `resto_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `resto_type_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`resto_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resto_type`
--

LOCK TABLES `resto_type` WRITE;
/*!40000 ALTER TABLE `resto_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `resto_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial`
--

DROP TABLE IF EXISTS `testimonial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonial` (
  `testimonial_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `resto_id` int(11) DEFAULT NULL,
  `testi` text,
  PRIMARY KEY (`testimonial_id`),
  KEY `user_id_idx` (`user_id`),
  KEY `resto_id_idx` (`resto_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial`
--

LOCK TABLES `testimonial` WRITE;
/*!40000 ALTER TABLE `testimonial` DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `join_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `c_fb_share` int(11) DEFAULT NULL,
  `c_tw_share` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-10  2:11:03
