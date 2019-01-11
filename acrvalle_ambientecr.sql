-- MySQL dump 10.13  Distrib 5.6.41, for Linux (x86_64)
--
-- Host: localhost    Database: acrvalle_ambientecr
-- ------------------------------------------------------
-- Server version	5.6.41

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
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abouts` (
  `id_about` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_about`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abouts`
--

LOCK TABLES `abouts` WRITE;
/*!40000 ALTER TABLE `abouts` DISABLE KEYS */;
/*!40000 ALTER TABLE `abouts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `id_album` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentphotos`
--

DROP TABLE IF EXISTS `commentphotos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentphotos` (
  `id_commentphoto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commentphoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentphotos`
--

LOCK TABLES `commentphotos` WRITE;
/*!40000 ALTER TABLE `commentphotos` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentphotos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentrecorridos`
--

DROP TABLE IF EXISTS `commentrecorridos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentrecorridos` (
  `id_commentrecorridos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_recorridoalbum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commentrecorridos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentrecorridos`
--

LOCK TABLES `commentrecorridos` WRITE;
/*!40000 ALTER TABLE `commentrecorridos` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentrecorridos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentvideos`
--

DROP TABLE IF EXISTS `commentvideos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentvideos` (
  `id_commentvideo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commentvideo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentvideos`
--

LOCK TABLES `commentvideos` WRITE;
/*!40000 ALTER TABLE `commentvideos` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentvideos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentworks`
--

DROP TABLE IF EXISTS `commentworks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `commentworks` (
  `id_commentwork` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_workalbum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commentwork`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentworks`
--

LOCK TABLES `commentworks` WRITE;
/*!40000 ALTER TABLE `commentworks` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentworks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `infotecas`
--

DROP TABLE IF EXISTS `infotecas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `infotecas` (
  `id_infoteca` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_workalbum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_infoteca`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `infotecas`
--

LOCK TABLES `infotecas` WRITE;
/*!40000 ALTER TABLE `infotecas` DISABLE KEYS */;
/*!40000 ALTER TABLE `infotecas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=386 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (371,'2014_10_12_000000_create_users_table',2),(372,'2014_10_12_100000_create_password_resets_table',2),(373,'2018_04_28_173358_create_abouts_table',2),(374,'2018_04_28_173526_create_photos_table',2),(375,'2018_04_28_174014_create_albums_table',2),(376,'2018_04_28_174310_create_videos_table',2),(377,'2018_05_08_004615_create_commentrecorridos_table',2),(378,'2018_05_08_004753_create_commentworks_table',2),(379,'2018_05_08_004811_create_commentphotos_table',2),(380,'2018_05_08_004830_create_commentvideos_table',2),(381,'2018_05_08_004923_create_workalbums_table',2),(382,'2018_05_08_004948_create_works_table',2),(280,'2018_07_14_184519_create_tamano_table',1),(383,'2018_05_08_005015_create_recorridoalbums_table',2),(384,'2018_05_08_005031_create_recorridovirtuals_table',2),(385,'2018_05_08_005052_create_infotecas_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id_photo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_album` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recorridoalbums`
--

DROP TABLE IF EXISTS `recorridoalbums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recorridoalbums` (
  `id_recorridoalbum` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_recorridoalbum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recorridoalbums`
--

LOCK TABLES `recorridoalbums` WRITE;
/*!40000 ALTER TABLE `recorridoalbums` DISABLE KEYS */;
/*!40000 ALTER TABLE `recorridoalbums` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recorridovirtuals`
--

DROP TABLE IF EXISTS `recorridovirtuals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recorridovirtuals` (
  `id_recorridovirtual` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `archivo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo_content` int(11) NOT NULL,
  `id_workalbum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_recorridovirtual`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recorridovirtuals`
--

LOCK TABLES `recorridovirtuals` WRITE;
/*!40000 ALTER TABLE `recorridovirtuals` DISABLE KEYS */;
/*!40000 ALTER TABLE `recorridovirtuals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jaylan Hartmann','romaine.lemke@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',1,NULL,NULL,'TAnuoJ6C7l','2018-10-17 09:40:05','2018-10-17 09:40:05'),(2,'Ms. Neha Yundt','zgutkowski@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',1,NULL,NULL,'MVf8ec8Tpf','2018-10-17 09:40:05','2018-10-17 09:40:05'),(3,'Samantha Prosacco','raegan98@example.net','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',1,NULL,NULL,'u2AhfObRVV','2018-10-17 09:40:05','2018-10-17 09:40:05'),(4,'August Hagenes III','fisher.veronica@example.org','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',1,NULL,NULL,'PVZSrfBQBc','2018-10-17 09:40:05','2018-10-17 09:40:05'),(5,'Ms. Lue Abernathy','xshanahan@example.com','$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',1,NULL,NULL,'QkcnL3omYb','2018-10-17 09:40:05','2018-10-17 09:40:05'),(6,'puch','puchmaster97@hotmail.com','$2y$10$9FyDBS9gZhO91slRjf25G.iAIjkIiIp5zTLbu0xax2HlNbT4OwG7u',2,NULL,NULL,NULL,'2018-10-17 09:40:05','2018-10-17 09:40:05');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id_video` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `works`
--

DROP TABLE IF EXISTS `works`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `works` (
  `id_work` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `id_workalbum` int(11) NOT NULL,
  `prioridad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_work`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `works`
--

LOCK TABLES `works` WRITE;
/*!40000 ALTER TABLE `works` DISABLE KEYS */;
INSERT INTO `works` VALUES (1,'Photos/8f9076B7Xsk4TwxuNVQDw2bod0kxIkeZxssoFkC3.jpeg',1,1,1,NULL,NULL),(10,'Photos/uiH9VbkXjiQqYGQ2roEoS4jWRdx75WagQUNYTh8Z.jpeg',1,2,1,NULL,NULL),(3,'Photos/5PxwEh0G9ZlIXlltNEjNY041FIlqgAyZpe2jNiXp.jpeg',1,1,1,NULL,NULL),(4,'Photos/PZKehIygzTTjmdSoexoKAAET8tyMeQHvsLfrucBc.jpeg',1,1,1,NULL,NULL),(5,'Photos/K7Eb6gSMg2pYRzQ6Xh1fLqTauD0Ux0aaMYJIcsN8.jpeg',1,1,1,NULL,NULL),(6,'Photos/RaCBSZa0Yt2CB6eSosDgfBenLVKQl4V2JLG2bYOI.jpeg',1,1,1,NULL,NULL),(7,'Photos/C7ZoIomNLQKdCgQ87m0prnaKwWvdfzZk2gQSsjZm.jpeg',1,1,1,NULL,NULL),(8,'Photos/U5q188GgZlvQoAHHfweHOedv4MTbwNBHM14HruDU.jpeg',1,1,1,NULL,NULL),(9,'Photos/doLpsRwIachkiL1fhbsmj2ujJhWFZwsMDN92aFDE.jpeg',1,1,1,NULL,NULL),(11,'Photos/7Qji21iFRgwOIfajJDC1HmYE1rJev5x2ssTJgpPu.jpeg',1,2,1,NULL,NULL),(12,'Photos/ywQAM5cOkTClWMmoV4A3YWV5zPlse1C2z6glmyFU.jpeg',1,2,1,NULL,NULL),(13,'Photos/Yabn8uEfPwasJ7ykTH0AHrPd1ZSg0XHG0Pw5Lzsa.jpeg',1,2,1,NULL,NULL),(14,'Photos/cQXpeEKPngFUydC71eSs6bq0PHK7xRAAAUAoZA4n.jpeg',1,2,1,NULL,NULL),(15,'Photos/Vbf6NRnW80q643KqUHd9IVYlhQBUVwfVDwo6PfOd.jpeg',1,2,1,NULL,NULL),(16,'Photos/lYzTkX97qmSX8QvJ2UeyvYFZF8WBWjki5NZmE7V3.jpeg',1,5,1,NULL,NULL),(17,'Photos/Zo2yi9R6iaUfRSyGGY1v187AQ3Ld49MaVFKlXbpd.jpeg',1,5,1,NULL,NULL),(18,'Photos/WrW8aVQKGW9oXIkBVLLi6d1gQJFcdOoP7LRsNuHY.jpeg',1,5,1,NULL,NULL),(19,'Photos/RIGwvnSYwritZulod0tnk0scb5NB7FQoBSFosHbp.jpeg',1,5,1,NULL,NULL);
/*!40000 ALTER TABLE `works` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-17  1:58:10
