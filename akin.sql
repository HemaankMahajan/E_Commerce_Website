-- MySQL dump 10.13  Distrib 5.7.34, for Win64 (x86_64)
--
-- Host: localhost    Database: akin
-- ------------------------------------------------------
-- Server version	8.0.25

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
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `location_id` int NOT NULL,
  `street_address` varchar(40) DEFAULT NULL,
  `postal_code` int DEFAULT NULL,
  `city` varchar(25) NOT NULL,
  `state` varchar(25) DEFAULT NULL,
  `country` varchar(20) NOT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `DOB` date DEFAULT NULL,
  `location_id` int NOT NULL,
  `Phone_no` varchar(14) NOT NULL,
  `Phone_second` varchar(14) DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `location_id` (`location_id`),
  CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`location_id`) REFERENCES `address` (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_agent`
--

DROP TABLE IF EXISTS `delivery_agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_agent` (
  `Agent_ID` varchar(15) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `DOJ` date NOT NULL,
  `Age` int NOT NULL,
  `Phone_no` varchar(14) NOT NULL,
  `salary` int NOT NULL,
  `Review` decimal(3,1) DEFAULT NULL,
  `Vaccinated` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`Agent_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_agent`
--

LOCK TABLES `delivery_agent` WRITE;
/*!40000 ALTER TABLE `delivery_agent` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incart`
--

DROP TABLE IF EXISTS `incart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incart` (
  `cust_email` varchar(50) NOT NULL,
  `PID` varchar(20) NOT NULL,
  `quantity` int NOT NULL,
  `total_cost` int NOT NULL,
  `Adding_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cust_email`,`PID`),
  KEY `PID` (`PID`),
  CONSTRAINT `incart_ibfk_1` FOREIGN KEY (`cust_email`) REFERENCES `customer` (`email`),
  CONSTRAINT `incart_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incart`
--

LOCK TABLES `incart` WRITE;
/*!40000 ALTER TABLE `incart` DISABLE KEYS */;
/*!40000 ALTER TABLE `incart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `Bill_no` varchar(30) NOT NULL,
  `cust_email` varchar(50) NOT NULL,
  `PID` varchar(20) NOT NULL,
  `order_date` date NOT NULL,
  `Delivery_date` date NOT NULL,
  `Mode_of_payment` enum('Cash','Cheque','PrePaid','ReturnType') DEFAULT NULL,
  `Agent_ID` varchar(15) NOT NULL,
  `amount` int NOT NULL,
  `Operation` enum('Delivery','Return') DEFAULT NULL,
  PRIMARY KEY (`Bill_no`),
  KEY `cust_email` (`cust_email`),
  KEY `PID` (`PID`),
  KEY `Agent_ID` (`Agent_ID`),
  CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cust_email`) REFERENCES `customer` (`email`),
  CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`),
  CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Agent_ID`) REFERENCES `delivery_agent` (`Agent_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `PID` varchar(20) NOT NULL,
  `quantity` int DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `price` int NOT NULL,
  `color` varchar(15) DEFAULT NULL,
  `dimensions` varchar(30) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `review` decimal(4,2) DEFAULT NULL,
  PRIMARY KEY (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wishlist` (
  `cust_email` varchar(50) NOT NULL,
  `PID` varchar(20) NOT NULL,
  `quantity` int NOT NULL,
  `discount` int DEFAULT NULL,
  PRIMARY KEY (`cust_email`,`PID`),
  KEY `PID` (`PID`),
  CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`cust_email`) REFERENCES `customer` (`email`),
  CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`PID`) REFERENCES `products` (`PID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wishlist`
--

LOCK TABLES `wishlist` WRITE;
/*!40000 ALTER TABLE `wishlist` DISABLE KEYS */;
/*!40000 ALTER TABLE `wishlist` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-04-20 20:21:38
