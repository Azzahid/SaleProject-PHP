-- MySQL dump 10.13  Distrib 5.7.15, for Linux (x86_64)
--
-- Host: localhost    Database: db1
-- ------------------------------------------------------
-- Server version	5.7.15-0ubuntu0.16.04.1

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
<<<<<<< HEAD
<<<<<<< HEAD
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `namaProduk` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(20) NOT NULL,
  `photo_url` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `idx_userid` (`user_id`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
=======
=======
>>>>>>> 7ab0e520be3e4a8540a2f18e5a6dd1a23b2d6ff2
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `prod_id` int(11) NOT NULL,
  `prod_name` varchar(255) DEFAULT NULL,
  `prod_price` int(11) DEFAULT NULL,
  `prod_like` int(11) DEFAULT NULL,
  `prod_purc` int(11) DEFAULT NULL,
  `prod_expl` tinytext,
  `user_id` int(11) DEFAULT NULL,
  `prod_date` datetime DEFAULT NULL,
  `prod_img` text,
  PRIMARY KEY (`prod_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
<<<<<<< HEAD
>>>>>>> 7ab0e520be3e4a8540a2f18e5a6dd1a23b2d6ff2
=======
>>>>>>> 7ab0e520be3e4a8540a2f18e5a6dd1a23b2d6ff2
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
<<<<<<< HEAD
<<<<<<< HEAD
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase`
--

DROP TABLE IF EXISTS `purchase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `purchase` (
  `purchase_id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `consignee` varchar(255) NOT NULL,
  `fulladdress` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `creditcardnumber` varchar(50) NOT NULL,
  `postalcode` varchar(10) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `card_verification` varchar(255) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_price` varchar(20) NOT NULL,
  `product_photourl` varchar(255) NOT NULL,
  `seller_id` int(11) NOT NULL,
  UNIQUE KEY `purchase_pid` (`product_id`),
  UNIQUE KEY `idx_sellerid` (`seller_id`),
  KEY `idx_buyerid` (`buyer_id`),
  CONSTRAINT `purchase_ibfk_1` FOREIGN KEY (`buyer_id`) REFERENCES `user` (`id`),
  CONSTRAINT `purchase_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`p_id`),
  CONSTRAINT `purchase_ibfk_3` FOREIGN KEY (`seller_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase`
--

LOCK TABLES `purchase` WRITE;
/*!40000 ALTER TABLE `purchase` DISABLE KEYS */;
/*!40000 ALTER TABLE `purchase` ENABLE KEYS */;
=======
=======
>>>>>>> 7ab0e520be3e4a8540a2f18e5a6dd1a23b2d6ff2
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'neko',15000,0,0,'small cat',1,'2016-09-25 15:56:49','/home/zahid/Downloads.cat.jpeg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
<<<<<<< HEAD
>>>>>>> 7ab0e520be3e4a8540a2f18e5a6dd1a23b2d6ff2
=======
>>>>>>> 7ab0e520be3e4a8540a2f18e5a6dd1a23b2d6ff2
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `postalcode` varchar(10) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (7,'Varian Caesar','varian97','variancaesar@gmail.c','admin','Jalan Pelesiran no. 19 Taman Sari, Bandung				','40116','082379511452'),(15,'admin','admin','admin@gmail.com','admin','jalan ganesha no. 7			','80886','0811726266');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_like`
--

DROP TABLE IF EXISTS `user_like`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_like` (
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  KEY `idx_userlike_userid` (`user_id`),
  KEY `idx_userlike_pid` (`barang_id`),
  CONSTRAINT `user_like_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_like_ibfk_2` FOREIGN KEY (`barang_id`) REFERENCES `product` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_like`
--

LOCK TABLES `user_like` WRITE;
/*!40000 ALTER TABLE `user_like` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_like` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<< HEAD
<<<<<<< HEAD
-- Dump completed on 2016-09-26 16:12:29
=======
-- Dump completed on 2016-09-25 15:58:02
>>>>>>> 7ab0e520be3e4a8540a2f18e5a6dd1a23b2d6ff2
=======
-- Dump completed on 2016-09-25 15:58:02
>>>>>>> 7ab0e520be3e4a8540a2f18e5a6dd1a23b2d6ff2
