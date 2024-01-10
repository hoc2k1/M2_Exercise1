-- MySQL dump 10.13  Distrib 5.7.24, for osx10.9 (x86_64)
--
-- Host: localhost    Database: ex1
-- ------------------------------------------------------
-- Server version	8.2.0

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
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devices` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `mac_address` varchar(50) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `power_consumption` int DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `device` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=831 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT INTO `devices` VALUES (791,'test','00:1B:44:11:3A:B8','1234','2024-01-09',20),(792,'phone','00:1B:44:11:3A:B8','12.12.12.12','2024-01-09',20),(793,'iuer','00:1B:44:11:3A:B8','ưerjkc','2024-01-09',20),(797,'d','00:1B:44:11:3A:B8','d','2024-01-09',20),(801,'1234','00:1B:44:11:3A:B8','1234','2024-01-09',20),(814,'76','00:1B:44:11:3A:B8','67','2024-01-09',20),(829,'test device','00:1B:44:11:3A:B8','test ip','2024-01-09',20),(830,'test001','00:1B:44:11:3A:B8','12.32.23.23','2024-01-10',20);
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logs`
--

DROP TABLE IF EXISTS `logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logs` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `date` int DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logs`
--

LOCK TABLES `logs` WRITE;
/*!40000 ALTER TABLE `logs` DISABLE KEYS */;
INSERT INTO `logs` VALUES (1,'test1','Turn on',234),(2,'test2','Turn off',47),(3,'test3','Sleep',89),(4,'test4','Turn off',345),(5,'test5','Sleep',34),(6,'test6','Sleep',98),(7,'test7','Turn on',98),(8,'test8','Turn off',34),(9,'test9','Turn off',50),(10,'test10','Turn on',78),(11,'test11','Sleep',345),(12,'test12','Turn off',67),(13,'test13','Turn on',97),(14,'test14','Turn off',32),(15,'test15','Sleep',16),(16,'test16','Turn off',67),(17,'test17','Turn on',89),(18,'test18','Turn off',33),(19,'test19','Turn off',77),(20,'test20','Turn on',98),(21,'test21','Sleep',677),(22,'test22','Turn off',15),(23,'test23','Turn on',67),(24,'test24','Sleep',21),(25,'test25','Turn off',68),(26,'test26','Turn on',99),(27,'test27','Turn off',56),(28,'test28','Sleep',35),(29,'test29','Turn on',63),(30,'test30','Turn off',38),(31,'test31','Turn off',67),(32,'test32','Turn off',89),(33,'test33','Turn on',34),(34,'test34','Sleep',51),(35,'test35','Turn on',58),(36,'test36','Turn off',78),(37,'test37','Turn on',93),(38,'test38','Turn off',95),(39,'test39','Turn off',78),(40,'test40','Sleep',67),(41,'test41','Sleep',11),(42,'test42','Sleep',56),(43,'test43','Turn on',59),(44,'test44','Sleep',39),(45,'test45','Turn off',27),(46,'test46','Turn on',48),(47,'test47','Sleep',36),(48,'test48','Turn on',19);
/*!40000 ALTER TABLE `logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'john','1234');
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

-- Dump completed on 2024-01-10 14:11:42
