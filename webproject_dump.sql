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
INSERT INTO `feedback` VALUES (1,1,'hellos',7,3,NULL,2,'2017-06-20 15:10:23');
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
  `question_id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_unlike`
--

LOCK TABLES `like_unlike` WRITE;
/*!40000 ALTER TABLE `like_unlike` DISABLE KEYS */;
INSERT INTO `like_unlike` VALUES (1,3,5,0),(2,6,5,1),(3,3,1,1),(4,7,5,1),(5,1,5,1),(6,1,1,1),(7,8,5,0),(8,8,1,1),(9,9,6,1),(10,9,7,0);
/*!40000 ALTER TABLE `like_unlike` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `like_unlike_reply`
--

DROP TABLE IF EXISTS `like_unlike_reply`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `like_unlike_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_unlike_reply`
--

LOCK TABLES `like_unlike_reply` WRITE;
/*!40000 ALTER TABLE `like_unlike_reply` DISABLE KEYS */;
INSERT INTO `like_unlike_reply` VALUES (1,8,1,1),(2,8,4,1),(3,8,2,1),(4,8,3,1),(5,9,7,0),(6,9,5,0),(7,9,6,1);
/*!40000 ALTER TABLE `like_unlike_reply` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificationlike`
--

LOCK TABLES `notificationlike` WRITE;
/*!40000 ALTER TABLE `notificationlike` DISABLE KEYS */;
INSERT INTO `notificationlike` VALUES (3,1,1,0,'reply','2017-06-26 10:05:07',0),(4,1,1,0,'reply','2017-06-26 10:05:10',0),(33,1,1,1,'like','2017-06-26 10:39:56',0),(34,1,1,0,'question','2017-06-26 10:23:10',2),(35,1,1,0,'question','2017-06-26 10:23:35',2),(36,1,1,0,'question','2017-06-26 10:24:17',6),(37,1,1,0,'','2017-06-26 09:56:33',1),(38,1,1,0,'reply','2017-06-26 09:56:33',1),(39,1,1,0,'feedback','2017-06-26 09:56:33',1),(40,1,1,0,'reply','2017-06-26 09:56:33',5),(41,1,1,0,'reply','2017-06-26 09:56:33',5),(42,1,1,0,'reply','2017-06-26 09:56:33',5),(43,1,1,0,'reply','2017-06-26 09:56:33',5),(44,1,1,0,'reply','2017-06-26 09:56:33',5),(45,1,1,0,'reply','2017-06-26 09:56:33',5),(46,1,1,0,'reply','2017-06-26 09:56:33',1),(47,1,1,0,'reply','2017-06-26 09:56:33',3),(48,1,3,1,'reply','2017-06-25 15:31:28',5),(49,1,1,0,'reply','2017-06-26 09:56:33',1),(50,1,1,0,'reply','2017-06-26 09:56:33',1),(51,1,3,1,'reply','2017-06-25 15:35:05',5),(52,1,1,0,'reply','2017-06-26 09:56:33',1),(53,1,1,0,'reply','2017-06-26 09:56:33',1),(54,1,1,0,'reply','2017-06-26 09:56:33',5),(55,1,1,0,'reply','2017-06-26 09:56:33',6),(56,1,1,0,'reply','2017-06-26 09:56:33',6),(57,2,1,0,'reply','2017-06-26 09:56:33',6);
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
  `tags` varchar(128) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (6,1,'weewewq',11,0,1.3815037962693,'2017-06-26 07:26:38',NULL,'transport'),(7,1,'sdasdada',0,0,0,'2017-06-26 07:26:43',NULL,'transport');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,5,1,'This is my first reply',NULL,NULL,0,'2017-06-25 15:35:05'),(2,1,1,'thsi is reply for sports section',NULL,NULL,0,'2017-06-25 15:35:24'),(3,1,1,'this is for quest. 1',NULL,NULL,0,'2017-06-25 15:35:37'),(4,5,1,'this is for quest 5',NULL,NULL,0,'2017-06-25 15:35:49'),(5,6,1,'dsasadsadsda',NULL,NULL,0,'2017-06-26 07:35:19'),(6,6,1,'dsasadsadsda',NULL,NULL,0,'2017-06-26 07:35:23'),(7,6,2,'eqwewqeewweeq',NULL,NULL,0,'2017-06-26 09:42:10');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'pranav','khanna','pranavk28','1234','1234@gmail.com','Hello my name is pranav.It is my dream to create the greatest company in the world which benifits my country and the human race in total.\r\n\r\nMY second dream is to join the bjp and the rss.'),(2,'pkoqwwkdl','lwldwkl','hey','1234','ranav@GMAIL,COM',''),(3,'someone','ghhgjhj','wtf','1234','hjhjhj',''),(6,'Vishal','Maurya','vishal','1234','vishalmry@gmail.com',''),(7,'dass','sadsdaads','hello','1234','dasdsads',' dsadsasdasdsda'),(8,'frustated','admi','admi','1234','hello@gmail.comm',' i am fucked up'),(9,'sahaj','k','sahaj','1234','sahaj@g.com',' ');
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

-- Dump completed on 2017-06-26 17:16:41
