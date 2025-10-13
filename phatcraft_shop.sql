-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: phatcraft_shop
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- 
-- Create database
--
CREATE DATABASE IF NOT EXISTS phatcraft_shop;
USE phatcraft_shop;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `productID` varchar(255) NOT NULL,
  `name` text DEFAULT NULL,
  `info` text DEFAULT NULL,
  `price` float DEFAULT NULL,
  `image_path` text DEFAULT 'not_found.PNG',
  `tagID` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`productID`),
  KEY `tag` (`tagID`),
  CONSTRAINT `tag` FOREIGN KEY (`tagID`) REFERENCES `tags` (`tagID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('P001','Sữa tươi','Sữa tươi có đường',7000,'milk.JPG','DRINK'),('P002','Nước khoáng','Nước khoáng thiên nhiên',5000,'water_bottle.JPG','DRINK'),('P003','Chanh giấy','Chanh giấy tươi',4000,'lemon.JPG','FRESH'),('P004','Trứng vịt','Trứng vịt tươi',4000,'egg.JPG','FRESH');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `saleID` varchar(255) NOT NULL,
  `saleValue` float DEFAULT NULL,
  `tagID` varchar(255) DEFAULT NULL,
  `dateCreated` datetime DEFAULT current_timestamp(),
  `isActive` tinyint(1) DEFAULT 1,
  PRIMARY KEY (`saleID`),
  KEY `tag_sale` (`tagID`),
  CONSTRAINT `tag_sale` FOREIGN KEY (`tagID`) REFERENCES `tags` (`tagID`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES ('S001',0.1,'ALL','2025-10-09 14:38:27',1),('S002',0.05,'FRESH','2025-10-09 14:38:27',1),('S003',0.02,'DRINK','2025-10-09 14:38:27',1);
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tags` (
  `tagID` varchar(255) NOT NULL,
  `name` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  PRIMARY KEY (`tagID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES ('ALL','tất cả sản phẩm','#70717d'),('DRINK','đồ uống','#426ac2'),('FRESH','thực phẩm tươi sống','#499c38');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` varchar(255) NOT NULL,
  `username` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dateCreated` datetime DEFAULT current_timestamp(),
  `role` enum('ADMIN','USER') DEFAULT 'USER',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username` (`username`) USING HASH,
  UNIQUE KEY `email` (`email`) USING HASH
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('dSwT6AcW7F8xsqkK','Alex','alex@gmail.com','$2y$10$8AphhkxMt.YR7EASvzxSeO0l9MSROJwC6chumA1srKxe5Q93Aa5.W','2025-10-12 11:53:44','USER'),('LzlZ6VIYmwWvtESQ','Phatcraft','phat@gmail.com','$2y$10$wHj6Tz.7nRroGPXylU60peBlfSfila7tIowDItosOJQ/Y./7LJ0wW','2025-10-12 11:23:38','USER');
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

-- Dump completed on 2025-10-13  9:56:29
