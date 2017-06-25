-- MySQL dump 10.13  Distrib 5.7.18, for Linux (x86_64)
--
-- Host: localhost    Database: webproject
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.17.04.1

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
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `feedback` text NOT NULL,
  `upvotes` int(11) DEFAULT NULL,
  `downvotes` int(11) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `tags` int(11) NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,1,'hellos',4,NULL,NULL,2,'2017-06-20 15:10:23');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_unlike`
--

DROP TABLE IF EXISTS `like_unlike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_unlike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `question_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_unlike`
--

LOCK TABLES `like_unlike` WRITE;
/*!40000 ALTER TABLE `like_unlike` DISABLE KEYS */;
INSERT INTO `like_unlike` VALUES (1,3,NULL,5,1),(2,6,NULL,5,1),(3,3,NULL,1,1),(4,7,NULL,5,1),(5,1,NULL,5,1);
/*!40000 ALTER TABLE `like_unlike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificationlike`
--

DROP TABLE IF EXISTS `notificationlike`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificationlike` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `unread` int(1) NOT NULL DEFAULT '1',
  `category` text NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ref_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificationlike`
--

LOCK TABLES `notificationlike` WRITE;
/*!40000 ALTER TABLE `notificationlike` DISABLE KEYS */;
INSERT INTO `notificationlike` VALUES (1,1,3,1,'1','2017-06-24 08:48:11',0),(2,1,3,1,'1','2017-06-24 08:48:11',0),(3,1,3,1,'question','2017-06-24 08:48:11',0),(4,1,1,1,'question','2017-06-24 08:48:11',0),(33,1,1,1,'like','2017-06-24 08:48:11',0),(34,1,1,1,'question','2017-06-24 09:43:08',2),(35,1,1,1,'question','2017-06-24 09:43:30',2),(36,1,1,1,'question','2017-06-24 09:43:56',2),(37,1,1,1,'','2017-06-24 09:48:07',1),(38,1,1,1,'reply','2017-06-24 09:48:30',1),(39,1,1,1,'feedback','2017-06-24 09:48:48',1),(40,1,1,1,'reply','2017-06-25 09:31:08',5),(41,1,1,1,'reply','2017-06-25 09:31:28',5),(42,1,1,1,'reply','2017-06-25 09:31:41',5),(43,1,1,1,'reply','2017-06-25 09:32:22',5),(44,1,1,1,'reply','2017-06-25 09:34:00',5),(45,1,1,1,'reply','2017-06-25 09:34:07',5),(46,1,1,1,'reply','2017-06-25 09:34:50',1),(47,1,1,1,'reply','2017-06-25 11:16:31',3);
/*!40000 ALTER TABLE `notificationlike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `question` text NOT NULL,
  `upvotes` int(11) NOT NULL,
  `downvotes` int(11) NOT NULL,
  `score` double NOT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `question_heading` text,
  `tags` int(2) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,1,'this is question no 1',10,29,-8.0725130657138,'2017-06-20 15:09:52','Question 1',4),(2,1,'this is question no 2',7,4,9.8283879213863,'2017-06-20 15:09:52','Question 2',0),(3,1,'this is question no 3',53,26,10.782630430826,'2017-06-20 15:09:52','Question 3',0),(4,3,'this is 4',13,8,10.050236671003,'2017-06-20 15:09:52','Question 4',0),(5,3,'this is questiion no 5',36,46,-8.3512666666667,'2017-06-20 15:09:52','Question 5',2);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL AUTO_INCREMENT,
  `quest_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `upvotes` int(11) DEFAULT NULL,
  `downvotes` int(11) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `reg_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`reply_id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,5,1,'dsaadssddsasdadsadsa',16,6,10.4334,'2017-06-20 14:08:18'),(2,5,1,'saddsadsdsa',39,NULL,10.968664607026,'2017-06-20 14:50:09'),(3,5,1,'saddsadsdsa',3,NULL,9.8542990324974,'2017-06-20 14:50:28'),(4,5,1,'ddasdasasads',9,NULL,10.119731398328,'2017-06-20 17:29:14'),(5,5,1,'ddasdasasads',3,NULL,9.6408101436086,'2017-06-20 17:30:36'),(6,5,1,'ddasdasasads',3,NULL,9.6407434769419,'2017-06-20 17:30:39'),(7,5,1,'sdsaddddddddddddd',NULL,NULL,0,'2017-06-23 14:36:36'),(8,4,1,'pranav',11,NULL,4.6766815740471,'2017-06-23 14:36:54'),(9,4,1,'pranav',NULL,NULL,0,'2017-06-23 14:37:08'),(10,5,1,'sasdssdasaddsa',NULL,NULL,0,'2017-06-24 06:37:03'),(11,5,1,'sasdssdasaddsa',NULL,NULL,0,'2017-06-24 06:37:20'),(12,1,1,'sasdasdadds',11,NULL,3.3799260184916,'2017-06-24 06:49:28'),(13,1,1,'sasdasdadds',NULL,NULL,0,'2017-06-24 06:52:31'),(14,1,1,'sasdasdadds',1,NULL,2.3324222222222,'2017-06-24 06:54:03'),(15,1,1,'sasdasdadds',NULL,NULL,0,'2017-06-24 06:54:24'),(16,1,1,'sasdasdadds',NULL,NULL,0,'2017-06-24 06:57:45'),(17,1,1,'sasdasdadds',NULL,NULL,0,'2017-06-24 06:57:50'),(18,1,1,'sasdasdadds',NULL,NULL,0,'2017-06-24 06:58:03'),(19,1,1,'sasdasdadds',NULL,NULL,0,'2017-06-24 07:01:23'),(20,1,1,'sasdasdadds',NULL,NULL,0,'2017-06-24 07:02:26'),(21,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:03:13'),(22,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:07:28'),(23,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:09:15'),(24,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:09:31'),(26,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:18:41'),(27,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:28:10'),(28,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:28:21'),(29,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:28:53'),(30,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:29:36'),(31,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:30:05'),(32,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:32:22'),(33,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:33:01'),(34,5,1,'sadsdasads',NULL,NULL,0,'2017-06-24 07:33:08'),(35,5,1,'accddaadsdassa',NULL,NULL,0,'2017-06-24 07:35:01'),(36,5,1,'accddaadsdassa',NULL,NULL,0,'2017-06-24 07:57:41'),(37,5,1,'accddaadsdassa',NULL,NULL,0,'2017-06-24 07:57:54'),(38,5,1,'accddaadsdassa',NULL,NULL,0,'2017-06-24 08:01:18'),(39,5,1,'accddaadsdassa',NULL,NULL,0,'2017-06-24 08:01:50'),(40,5,1,'accddaadsdassa',NULL,NULL,0,'2017-06-24 08:02:31'),(41,5,1,'dsadsadds',NULL,NULL,0,'2017-06-24 08:02:41'),(42,5,1,'dsadsadds',NULL,NULL,0,'2017-06-24 08:03:41'),(43,5,1,'dsadsadds',NULL,NULL,0,'2017-06-24 08:04:49'),(44,5,1,'asddadsadsdss',NULL,NULL,0,'2017-06-25 09:31:08'),(45,5,1,'dsdssdsadsa',NULL,NULL,0,'2017-06-25 09:31:28'),(46,5,1,'dsdssdsadsa',NULL,NULL,0,'2017-06-25 09:31:41'),(47,5,1,'ssdaaadsasa',NULL,NULL,0,'2017-06-25 09:32:22'),(48,5,1,'ssdaaadsasa',NULL,NULL,0,'2017-06-25 09:34:00'),(49,5,1,'saddssddssad',NULL,NULL,0,'2017-06-25 09:34:07'),(50,1,1,'dsadsasdaasdsa',NULL,NULL,0,'2017-06-25 09:34:50');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `user_name` varchar(128) NOT NULL,
  `password` varchar(16) NOT NULL,
  `email_id` varchar(128) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'pranav','khanna','pranavk28','1234','1234@gmail.com','Hello my name is pranav.It is my dream to create the greatest company in the world which benifits my country and the human race in total.\r\n\r\nMY second dream is to join the bjp and the rss.'),(2,'pkoqwwkdl`','lwldwkl`','hey','1234','ranav@GMAIL,COM',''),(3,'someone','ghhgjhj','wtf','1234','hjhjhj',''),(6,'Vishal','Maurya','vishal','1234','vishalmry@gmail.com',''),(7,'dass','sadsdaads','hello','1234','dasdsads',' dsadsasdasdsda');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-25 17:45:37
