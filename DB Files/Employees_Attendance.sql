-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: Employees
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Attendance`
--

DROP TABLE IF EXISTS `Attendance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Attendance` (
  `id` int NOT NULL AUTO_INCREMENT,
  `EmployeeID` int DEFAULT NULL,
  `CheckInTime` datetime DEFAULT NULL,
  `CheckOutTime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `EmployeeID` (`EmployeeID`),
  CONSTRAINT `Attendance_ibfk_1` FOREIGN KEY (`EmployeeID`) REFERENCES `Employees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Attendance`
--

LOCK TABLES `Attendance` WRITE;
/*!40000 ALTER TABLE `Attendance` DISABLE KEYS */;
INSERT INTO `Attendance` VALUES (2,1,'2023-10-28 19:40:47','2023-10-28 19:40:49'),(3,1,'2023-10-29 10:35:50','2023-10-29 10:35:51'),(4,1,'2023-10-29 10:35:59','2023-10-29 10:36:00'),(5,1,'2023-10-29 10:36:09','2023-10-29 10:36:09'),(6,2,'2023-10-29 10:38:09','2023-10-29 10:38:11'),(7,2,'2023-10-29 10:38:23','2023-10-29 10:38:25'),(8,2,'2023-10-29 10:38:41','2023-10-29 10:38:42'),(9,3,'2023-10-29 10:41:36','2023-10-29 10:41:37'),(10,3,'2023-10-29 10:41:50','2023-10-29 10:41:51'),(11,3,'2023-10-29 10:41:54','2023-10-29 10:41:54'),(12,4,'2023-10-29 10:43:07','2023-10-29 10:43:08'),(13,4,'2023-10-29 10:43:09','2023-10-29 10:43:10'),(14,5,'2023-10-29 10:45:47','2023-10-29 10:45:48'),(15,5,'2023-10-29 10:45:50','2023-10-29 10:45:51'),(16,6,'2023-10-29 10:52:24','2023-10-29 10:52:26'),(17,6,'2023-10-29 10:52:27','2023-10-29 10:52:28'),(18,2,'2023-10-29 11:10:36','2023-10-29 11:11:06');
/*!40000 ALTER TABLE `Attendance` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-29 13:24:43
