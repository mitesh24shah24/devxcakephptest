-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: devxcake
-- ------------------------------------------------------
-- Server version	8.0.34

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
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `states` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `states`
--

LOCK TABLES `states` WRITE;
/*!40000 ALTER TABLE `states` DISABLE KEYS */;
INSERT INTO `states` VALUES (1,'Andaman And Nicobar',11.7400867,92.6586401,'2014-11-27 12:23:26'),(2,'Andhra Pradesh',15.9128998,79.7399875,'2014-11-27 12:23:26'),(3,'Assam',26.2006043,92.9375739,'2014-11-27 12:23:26'),(4,'Chandigarh',30.7333148,76.7794179,'2014-11-27 12:23:26'),(5,'Dadra And Nagar Haveli',20.1808672,73.0169135,'2014-11-27 12:23:26'),(6,'Delhi NCR',28.7040592,77.1024902,'2014-11-27 12:23:26'),(7,'Gujarat',22.258652,71.1923805,'2014-11-27 12:23:26'),(8,'Haryana',29.0587757,76.085601,'2014-11-27 12:23:26'),(9,'Himachal Pradesh',31.1048294,77.1733901,'2014-11-27 12:23:26'),(10,'Jammu And Kashmir',33.277839,75.3412179,'2014-11-27 12:23:26'),(11,'Kerala',10.8505159,76.2710833,'2014-11-27 12:23:26'),(12,'Lakshadweep',10.3280265,72.7846336,'2014-11-27 12:23:26'),(13,'Maharashtra',19.7514798,75.7138884,'2014-11-27 12:23:26'),(14,'Manipur',24.6637173,93.9062688,'2014-11-27 12:23:26'),(15,'Meghalaya',25.4670308,91.366216,'2014-11-27 12:23:26'),(16,'Karnataka',15.3172775,75.7138884,'2014-11-27 12:23:26'),(17,'Nagaland',26.1584354,94.5624426,'2014-11-27 12:23:26'),(18,'Odisha',20.9516658,85.0985236,'2014-11-27 12:23:26'),(19,'Puducherry',11.9415915,79.8083133,'2014-11-27 12:23:26'),(20,'Punjab',31.1471305,75.3412179,'2014-11-27 12:23:26'),(21,'Rajasthan',27.0238036,74.2179326,'2014-11-27 12:23:26'),(22,'Tamil Nadu',11.1271225,78.6568942,'2014-11-27 12:23:26'),(23,'Tripura',23.9408482,91.9881527,'2014-11-27 12:23:26'),(24,'West Bengal',22.9867569,87.8549755,'2014-11-27 12:23:26'),(25,'Sikkim',27.5329718,88.5122178,'2014-11-27 12:23:26'),(26,'Arunachal Pradesh',28.2179994,94.7277528,'2014-11-27 12:23:26'),(27,'Mizoram',23.164543,92.9375739,'2014-11-27 12:23:26'),(28,'Daman And Diu',20.3973736,72.8327991,'2014-11-27 12:23:26'),(29,'Goa',15.2993265,74.123996,'2014-11-27 12:23:26'),(30,'Bihar',25.0960742,85.3131194,'2014-11-27 12:23:26'),(31,'Madhya Pradesh',22.9734229,78.6568942,'2014-11-27 12:23:26'),(32,'Uttar Pradesh',26.8467088,80.9461592,'2014-11-27 12:23:26'),(33,'Chhattisgarh',21.2786567,81.8661442,'2014-11-27 12:23:26'),(34,'Jharkhand',23.6101808,85.2799354,'2014-11-27 12:23:26'),(35,'Uttarakhand',30.066753,79.0192997,'2014-11-27 12:23:26'),(36,'Telangana',18.1124372,79.0192997,'2017-11-27 11:58:26'),(37,'Pondicherry',11.9415915,79.8083133,'2017-11-27 11:58:26'),(38,'Leh-Ladakh',NULL,NULL,'2023-07-28 16:50:26');
/*!40000 ALTER TABLE `states` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `lastname` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` longtext NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'super','d187aec787a8893ecf6557718efec7ba5b8e6474','mitesh@admin.com','2024-01-27 10:00:00','2024-01-24 10:00:00',1,'admin','9722815431','pritamnagar,paldi','23',1);
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

-- Dump completed on 2024-01-27  2:45:47
