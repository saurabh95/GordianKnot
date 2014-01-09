-- MySQL dump 10.13  Distrib 5.5.31, for debian-linux-gnu (armv7l)
--
-- Host: localhost    Database: gordion
-- ------------------------------------------------------
-- Server version	5.5.31-0+wheezy1

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
-- Table structure for table `comments`
--
CREATE DATABASE gordion;
USE gordion;

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `qno` int(11) NOT NULL,
  `qlevel` int(11) NOT NULL,
  `cdate` date NOT NULL,
  `ctime` time NOT NULL,
  `cstring` varchar(767) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`cstring`),
  KEY `con` (`qno`,`qlevel`),
  KEY `qlevel` (`qlevel`),
  KEY `fk_com` (`username`),
  CONSTRAINT `fk_com` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`qno`) REFERENCES `ques` (`qno`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`qlevel`) REFERENCES `ques` (`qlevel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,1,'2013-11-12','23:42:52','haha','iiit123');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qsolved`
--

DROP TABLE IF EXISTS `qsolved`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qsolved` (
  `qno` int(11) NOT NULL,
  `qlevel` int(11) NOT NULL,
  `sdate` date NOT NULL,
  `stime` time NOT NULL,
  `sbyuser` varchar(20) NOT NULL,
  PRIMARY KEY (`qno`,`qlevel`,`sbyuser`),
  KEY `fk_ql` (`qlevel`),
  KEY `fk_sbu` (`sbyuser`),
  CONSTRAINT `fk_sbu` FOREIGN KEY (`sbyuser`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ql` FOREIGN KEY (`qlevel`) REFERENCES `ques` (`qlevel`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_qn` FOREIGN KEY (`qno`) REFERENCES `ques` (`qno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qsolved`
--

LOCK TABLES `qsolved` WRITE;
/*!40000 ALTER TABLE `qsolved` DISABLE KEYS */;
INSERT INTO `qsolved` VALUES (1,1,'2013-11-13','03:00:00','iiit123'),(1,2,'2013-11-12','23:19:55','iiit123');
/*!40000 ALTER TABLE `qsolved` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ques`
--

DROP TABLE IF EXISTS `ques`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ques` (
  `qno` int(11) NOT NULL,
  `qlevel` int(11) NOT NULL,
  `qstatement` varchar(600) NOT NULL,
  `ans` varchar(600) NOT NULL,
  PRIMARY KEY (`qno`,`qlevel`),
  KEY `level` (`qlevel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ques`
--

LOCK TABLES `ques` WRITE;
/*!40000 ALTER TABLE `ques` DISABLE KEYS */;
INSERT INTO `ques` VALUES (1,0,'generalised comments','NA'),(1,1,'What is my name?','sasa'),(1,2,'maa ki choot??','haha'),(2,1,'bakwa?','haha');
/*!40000 ALTER TABLE `ques` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('iiit123','iiit123');
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

-- Dump completed on 2013-11-12 23:46:24
