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
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_unlike`
--

LOCK TABLES `like_unlike` WRITE;
/*!40000 ALTER TABLE `like_unlike` DISABLE KEYS */;
INSERT INTO `like_unlike` VALUES (1,1,1,1),(2,9,1,1),(3,9,11,1),(4,9,6,1),(5,1,8,1),(6,1,2,1),(7,1,5,1),(8,1,7,1),(9,1,12,1),(10,1,6,1),(11,2,1,1),(12,2,11,1),(13,2,8,1),(14,2,2,0),(15,1,11,1),(17,9,13,1),(18,8,5,0),(19,10,11,1),(20,10,11,1),(21,10,11,1),(22,10,11,1),(23,10,11,1),(89,10,1,0),(90,1,14,1),(91,10,14,1),(92,9,2,1),(93,9,4,0),(94,11,1,0),(95,11,8,1),(96,11,2,1),(97,2,14,1),(98,2,15,0),(99,12,14,0),(100,12,15,1),(101,9,15,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `like_unlike_reply`
--

LOCK TABLES `like_unlike_reply` WRITE;
/*!40000 ALTER TABLE `like_unlike_reply` DISABLE KEYS */;
INSERT INTO `like_unlike_reply` VALUES (1,8,1,0),(2,8,4,1),(3,8,2,1),(4,8,3,1),(5,9,7,0),(6,9,5,1),(7,9,6,1),(8,8,5,0),(9,8,6,1),(10,8,7,1),(11,1,2,1),(12,9,2,0),(13,1,3,0),(14,1,8,0),(15,9,3,1),(16,10,2,1);
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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificationlike`
--

LOCK TABLES `notificationlike` WRITE;
/*!40000 ALTER TABLE `notificationlike` DISABLE KEYS */;
INSERT INTO `notificationlike` VALUES (1,1,1,1,'others','2017-06-27 11:37:42',1),(2,1,1,1,'question','2017-06-27 12:15:53',1),(3,1,1,1,'question','2017-06-27 12:15:54',1),(4,1,1,1,'question','2017-06-27 12:19:22',1),(5,1,1,1,'reply','2017-06-28 11:02:26',2),(6,9,1,0,'question','2017-06-30 17:17:05',11),(7,9,1,0,'question','2017-06-30 17:17:05',6),(8,1,1,1,'question','2017-06-28 11:41:24',8),(9,1,1,1,'question','2017-06-28 11:42:44',7),(10,2,1,0,'question','2017-06-30 17:17:05',2),(11,1,11,0,'question','2017-07-01 14:31:54',4),(12,9,9,1,'question','2017-06-30 07:14:16',13),(13,10,8,1,'question','2017-06-30 15:54:56',5),(14,10,1,0,'question','2017-06-30 17:17:05',1),(15,2,1,0,'reply','2017-06-30 17:17:05',1),(16,10,1,0,'reply','2017-06-30 17:22:07',14),(17,1,1,1,'question','2017-06-30 17:23:24',14),(18,10,1,0,'question','2017-06-30 17:24:27',14),(19,9,1,0,'question','2017-07-27 17:31:29',2),(20,9,8,1,'question','2017-07-01 13:53:50',4),(21,11,1,0,'question','2017-07-27 17:31:29',1),(22,11,1,0,'question','2017-07-27 17:31:29',8),(23,11,1,0,'question','2017-07-27 17:31:29',2),(24,2,1,0,'question','2017-07-27 17:31:29',14),(25,2,11,0,'question','2017-07-01 15:01:39',15),(26,12,1,0,'question','2017-07-27 17:31:29',14),(27,12,11,0,'question','2017-07-01 15:01:39',15),(28,12,11,0,'reply','2017-07-01 15:01:39',15),(29,9,11,1,'question','2017-07-04 07:29:17',15),(30,1,1,1,'reply','2017-07-27 14:32:26',14),(31,1,1,1,'reply','2017-07-27 17:37:19',14);
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
) ENGINE=InnoDB AUTO_INCREMENT=19773 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES (1,1,'weewewq',4,0,60.962859991328,'2017-06-26 07:26:38','This is 1','transport'),(2,1,'sdasdada',1,1,0,'2017-06-26 07:26:43','This is 2','transport'),(3,9,'$ask_question',0,0,0,'2017-06-26 15:08:55','This is 3','$category'),(4,8,'help',0,0,0,'2017-06-26 15:25:17','what should be my rank..','medical'),(5,8,'do mea favor',0,0,0,'2017-06-26 15:27:42','This is 5','medical'),(6,1,'i dn kiddo',0,0,0,'2017-06-27 07:22:33','what should be my rank..amigo','sports'),(7,1,'wtf,amigo',0,0,0,'2017-06-27 07:25:16','what should be alloooo','medical'),(8,1,'jdjdjdjdjdj',1,0,58.442088888889,'2017-06-27 07:25:41','helloo','transport'),(9,1,'baby ',0,0,0,'2017-06-27 07:26:12','hey ','other'),(10,1,'baby ',0,0,0,'2017-06-27 07:26:45','hey ','other'),(11,1,'brother',0,0,0,'2017-06-27 07:26:58','hello','transport'),(12,1,'so this is it',0,0,0,'2017-06-27 07:50:52','this is the 10th question','medical'),(13,9,'pk told me',0,0,0,'2017-06-30 07:13:53','pk','academics'),(14,1,'to be replied by shitstorm',0,0,0,'2017-06-30 17:19:27','This is questioned to be replied','mess'),(15,11,'You know',0,0,0,'2017-07-01 14:31:35','Hey this is bahubali','mess'),(19772,1,'',0,0,0,'2017-07-27 18:05:51','kdsjdjsflajlfasj','others');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,5,1,'This is my first reply',NULL,NULL,0,'2017-06-25 15:35:05'),(2,1,1,'thsi is reply for sports section',3,0,62.10572125472,'2017-06-25 15:35:24'),(3,1,1,'this is for quest. 1',NULL,NULL,0,'2017-06-25 15:35:37'),(4,5,1,'this is for quest 5',NULL,NULL,0,'2017-06-25 15:35:49'),(5,6,1,'dsasadsadsda',NULL,NULL,0,'2017-06-26 07:35:19'),(6,6,1,'dsasadsadsda',NULL,NULL,0,'2017-06-26 07:35:23'),(7,6,2,'eqwewqeewweeq',NULL,NULL,0,'2017-06-26 09:42:10'),(8,1,2,'I  have replied',NULL,NULL,0,'2017-06-27 12:21:08'),(9,1,10,'this is shitstorm',NULL,NULL,0,'2017-06-30 17:16:38'),(10,14,10,'this is shitstorm',NULL,NULL,0,'2017-06-30 17:20:52'),(11,15,12,'hi \r\ncngrts \r\nits working',NULL,NULL,0,'2017-07-01 15:00:26'),(12,14,1,'<p><strong>BOLD reply&nbsp;<em>bold italic reply</em></strong></p>',NULL,NULL,0,'2017-07-27 14:32:26'),(13,14,1,'<p><em>This is in italics<strong>&nbsp;now in bold also</strong></em></p>',NULL,NULL,0,'2017-07-27 17:37:19');
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
) ENGINE=InnoDB AUTO_INCREMENT=99679 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'pranav','khanna','pranavk28','1234','1234@gmail.com','Hello my name is pranav.It is my dream to create the greatest company in the world which benifits my country and the human race in total.\r\n\r\nMY second dream is to join the bjp and the rss.'),(2,'pkoqwwkdl','lwldwkl','hey','1234','ranav@GMAIL,COM',''),(3,'someone','ghhgjhj','wtf','1234','hjhjhj',''),(6,'Vishal','Maurya','vishal','1234','vishalmry@gmail.com',''),(7,'dass','sadsdaads','hello','1234','dasdsads',' dsadsasdasdsda'),(8,'frustated','admi','admi','1234','hello@gmail.comm',' i am fucked up'),(9,'sahaj','k','sahaj','1234','sahaj@g.com',' '),(10,'sid','kush','shitstorm','1234','sid','I am siddharth....'),(11,'bahu','bali','bahubali','123','1@2',' '),(12,'saurabh','sharma','saurabh','000000','s@gmail.com',' '),(11431,'test','test','test2','1234','test3','jdk'),(20502,'','1','1','','1@2','1'),(53980,'','','test_subject','1234','w','hey'),(54356,'letme','letme','letme','letme','letme@gmil.com','letme'),(60414,'a','a','a','a','i','jjh'),(60479,'another','another','another','antoerh','anotehr','another'),(62281,'test','test2','another_test','1234','1234@fj.com','1233'),(72315,'','','','','',''),(94742,'a','b','b','b','b','jjh'),(99678,'hey','1234','test','1234','1@2','jkdjsk');
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

-- Dump completed on 2017-07-27 23:40:28
