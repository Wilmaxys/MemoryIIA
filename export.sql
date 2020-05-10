-- MySQL dump 10.13  Distrib 5.7.28, for osx10.15 (x86_64)
--
-- Host: localhost    Database: memory
-- ------------------------------------------------------
-- Server version	5.7.28

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
-- Table structure for table `carte`
--

DROP TABLE IF EXISTS `carte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fichier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=481 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carte`
--

LOCK TABLES `carte` WRITE;
/*!40000 ALTER TABLE `carte` DISABLE KEYS */;
INSERT INTO `carte` VALUES (465,'1.png','1','1'),(466,'2.png','2','2'),(467,'3.png','3','3'),(468,'4.png','4','4'),(469,'5.png','5','5'),(470,'6.png','6','6'),(471,'7.png','7','7'),(472,'8.png','8','8'),(473,'9.png','9','9'),(474,'10.png','10','10'),(475,'11.png','11','11'),(476,'12.png','12','12'),(477,'13.png','13','13'),(478,'14.png','14','14'),(479,'15.png','15','15'),(480,'16.png','16','16');
/*!40000 ALTER TABLE `carte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20200507114450','2020-05-07 11:44:59'),('20200507114946','2020-05-07 11:49:57'),('20200508161643','2020-05-08 16:16:49'),('20200509112844','2020-05-09 11:28:53'),('20200509120439','2020-05-09 12:04:46');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partie`
--

DROP TABLE IF EXISTS `partie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `joueur_id` int(11) DEFAULT NULL,
  `plateau_id` int(11) NOT NULL,
  `fini` tinyint(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `nb_carte` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_59B1F3D927847DB` (`plateau_id`),
  KEY `IDX_59B1F3DA9E2D76C` (`joueur_id`),
  CONSTRAINT `FK_59B1F3D927847DB` FOREIGN KEY (`plateau_id`) REFERENCES `plateau` (`id`),
  CONSTRAINT `FK_59B1F3DA9E2D76C` FOREIGN KEY (`joueur_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partie`
--

LOCK TABLES `partie` WRITE;
/*!40000 ALTER TABLE `partie` DISABLE KEYS */;
INSERT INTO `partie` VALUES (18,15,19,1,'2020-05-09 13:41:22',0),(19,16,20,1,'2020-05-09 15:22:48',0),(20,16,21,0,'2020-05-09 15:23:35',8),(21,15,22,1,'2020-05-09 17:09:46',0),(22,15,23,0,'2020-05-10 13:33:42',4),(23,15,24,1,'2020-05-10 13:33:45',0),(24,15,25,0,'2020-05-10 13:35:50',8),(25,15,26,1,'2020-05-10 13:36:57',0),(26,15,27,0,'2020-05-10 13:38:47',10);
/*!40000 ALTER TABLE `partie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plateau`
--

DROP TABLE IF EXISTS `plateau`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plateau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plateau`
--

LOCK TABLES `plateau` WRITE;
/*!40000 ALTER TABLE `plateau` DISABLE KEYS */;
INSERT INTO `plateau` VALUES (19),(20),(21),(22),(23),(24),(25),(26),(27);
/*!40000 ALTER TABLE `plateau` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plateau_carte`
--

DROP TABLE IF EXISTS `plateau_carte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plateau_carte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statut_id` int(11) NOT NULL,
  `plateau_id` int(11) DEFAULT NULL,
  `carte_id` int(11) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_C3EB5E15F6203804` (`statut_id`),
  KEY `IDX_C3EB5E15927847DB` (`plateau_id`),
  KEY `IDX_C3EB5E15C9C7CEB6` (`carte_id`),
  CONSTRAINT `FK_C3EB5E15927847DB` FOREIGN KEY (`plateau_id`) REFERENCES `plateau` (`id`),
  CONSTRAINT `FK_C3EB5E15C9C7CEB6` FOREIGN KEY (`carte_id`) REFERENCES `carte` (`id`),
  CONSTRAINT `FK_C3EB5E15F6203804` FOREIGN KEY (`statut_id`) REFERENCES `statut` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=401 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plateau_carte`
--

LOCK TABLES `plateau_carte` WRITE;
/*!40000 ALTER TABLE `plateau_carte` DISABLE KEYS */;
INSERT INTO `plateau_carte` VALUES (257,58,19,465,1),(258,58,19,472,2),(259,58,19,470,3),(260,58,19,469,4),(261,58,19,472,5),(262,58,19,468,6),(263,58,19,469,7),(264,58,19,465,8),(265,58,19,470,9),(266,58,19,467,10),(267,58,19,471,11),(268,58,19,471,12),(269,58,19,467,13),(270,58,19,466,14),(271,58,19,466,15),(272,58,19,468,16),(273,58,20,472,1),(274,58,20,465,2),(275,58,20,471,3),(276,58,20,468,4),(277,58,20,469,5),(278,58,20,469,6),(279,58,20,472,7),(280,58,20,466,8),(281,58,20,470,9),(282,58,20,466,10),(283,58,20,467,11),(284,58,20,471,12),(285,58,20,465,13),(286,58,20,468,14),(287,58,20,470,15),(288,58,20,467,16),(289,57,21,471,1),(290,57,21,468,2),(291,57,21,469,3),(292,57,21,468,4),(293,57,21,470,5),(294,57,21,467,6),(295,57,21,469,7),(296,57,21,467,8),(297,57,21,465,9),(298,57,21,466,10),(299,57,21,465,11),(300,57,21,471,12),(301,57,21,472,13),(302,57,21,472,14),(303,57,21,466,15),(304,57,21,470,16),(305,58,22,467,1),(306,58,22,467,2),(307,58,22,466,3),(308,58,22,465,4),(309,58,22,469,5),(310,58,22,470,6),(311,58,22,471,7),(312,58,22,468,8),(313,58,22,472,9),(314,58,22,471,10),(315,58,22,468,11),(316,58,22,472,12),(317,58,22,470,13),(318,58,22,465,14),(319,58,22,469,15),(320,58,22,466,16),(321,57,23,466,1),(322,57,23,467,2),(323,57,23,465,3),(324,57,23,466,4),(325,57,23,468,5),(326,57,23,467,6),(327,57,23,468,7),(328,57,23,465,8),(329,58,24,468,1),(330,58,24,465,2),(331,58,24,466,3),(332,58,24,466,4),(333,58,24,465,5),(334,58,24,467,6),(335,58,24,468,7),(336,58,24,467,8),(337,57,25,466,1),(338,57,25,472,2),(339,57,25,465,3),(340,57,25,470,4),(341,57,25,465,5),(342,57,25,466,6),(343,57,25,472,7),(344,57,25,468,8),(345,57,25,469,9),(346,57,25,467,10),(347,57,25,468,11),(348,57,25,469,12),(349,57,25,470,13),(350,57,25,467,14),(351,57,25,471,15),(352,57,25,471,16),(353,58,26,470,1),(354,58,26,476,2),(355,58,26,468,3),(356,58,26,466,4),(357,58,26,465,5),(358,58,26,471,6),(359,58,26,473,7),(360,58,26,467,8),(361,58,26,472,9),(362,58,26,475,10),(363,58,26,478,11),(364,58,26,475,12),(365,58,26,474,13),(366,58,26,476,14),(367,58,26,473,15),(368,58,26,465,16),(369,58,26,478,17),(370,58,26,469,18),(371,58,26,467,19),(372,58,26,477,20),(373,58,26,466,21),(374,58,26,469,22),(375,58,26,468,23),(376,58,26,474,24),(377,58,26,477,25),(378,58,26,470,26),(379,58,26,471,27),(380,58,26,472,28),(381,57,27,465,1),(382,57,27,469,2),(383,57,27,468,3),(384,57,27,470,4),(385,57,27,473,5),(386,57,27,469,6),(387,57,27,466,7),(388,57,27,472,8),(389,57,27,474,9),(390,57,27,467,10),(391,57,27,474,11),(392,57,27,468,12),(393,57,27,466,13),(394,57,27,467,14),(395,57,27,465,15),(396,57,27,471,16),(397,57,27,472,17),(398,57,27,471,18),(399,57,27,470,19),(400,57,27,473,20);
/*!40000 ALTER TABLE `plateau_carte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statut`
--

DROP TABLE IF EXISTS `statut`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statut` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statut`
--

LOCK TABLES `statut` WRITE;
/*!40000 ALTER TABLE `statut` DISABLE KEYS */;
INSERT INTO `statut` VALUES (57,'Dos','Carte de dos'),(58,'Face','Carte de face'),(59,'Trouver','Carte trouvé'),(60,'HJ','Carte hors-jeu');
/*!40000 ALTER TABLE `statut` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nb_victoire` int(11) NOT NULL DEFAULT '0',
  `nb_partie` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (15,'demo','[]','$2y$12$aqoFBB1QLu5EkJIWsI2ANuF8UqbK21BiVhHEx23qY1iRSw06ZFIVG',3,13),(16,'Wilmaxys','[]','$2y$12$Z5UP2KzBFYbjdWomVs7uV.rkpaCRFwWvx360UDpO7G4j1M2xIsZ66',1,2);
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

-- Dump completed on 2020-05-10 18:51:31
