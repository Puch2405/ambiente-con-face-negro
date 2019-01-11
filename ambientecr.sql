-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 11-01-2019 a las 08:04:53
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ambientecr`
--

DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `PRIORIDAD_ALBUM`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PRIORIDAD_ALBUM` (IN `pid_album` INT)  BEGIN
	
	DECLARE IDA INT;

	SET IDA=0;

	select id_album into IDA from albums where id_album=pid_album;

	if IDA > 0 then
		update albums set estado=1;
		update albums set estado=2 where id_album=IDA;	
	else
		select 'El album no existe' as mensaje;
	end if;

END$$

DROP PROCEDURE IF EXISTS `PRIORIDAD_ALBUMRECORRIDO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PRIORIDAD_ALBUMRECORRIDO` (IN `pid_albumrecorrido` INT)  BEGIN
	
	DECLARE IDA INT;

	SET IDA=0;

	select id_recorridoalbum into IDA from recorridoalbums where id_recorridoalbum=pid_albumrecorrido;

	if IDA > 0 then
		update recorridoalbums set estado=1;
		update recorridoalbums set estado=2 where id_recorridoalbum=IDA;	
	else
		select 'El album no existe' as mensaje;
	end if;

END$$

DROP PROCEDURE IF EXISTS `PRIORIDAD_ALBUMWORK`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PRIORIDAD_ALBUMWORK` (IN `pid_albumwork` INT)  BEGIN
	
	DECLARE IDA INT;

	SET IDA=0;

	select id_workalbum into IDA from workalbums where id_workalbum=pid_albumwork;

	if IDA > 0 then
		update workalbums set estado=1;
		update workalbums set estado=2 where id_workalbum=IDA;	
	else
		select 'El album no existe' as mensaje;
	end if;

END$$

DROP PROCEDURE IF EXISTS `PRIORIDAD_FOTO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PRIORIDAD_FOTO` (IN `pid_photo` INT)  BEGIN
	
	DECLARE IDP INT;

	SET IDP=0;

	select id_photo into IDP from photos where id_photo=pid_photo;

	if IDP > 0 then
		update photos set estado=1;
		update photos set estado=2 where id_photo=IDP;	
	else
		select 'El album no existe' as mensaje;
	end if;

END$$

DROP PROCEDURE IF EXISTS `PRIORIDAD_TRABAJO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PRIORIDAD_TRABAJO` (IN `pid_work` INT)  BEGIN
	
	DECLARE IDW INT;

	SET IDW=0;

	select id_work into IDW from works where id_work=pid_work;

	if IDW > 0 then
		update works set estado=1;
		update works set estado=2 where id_work=IDW;	
	else
		select 'El album no existe' as mensaje;
	end if;

END$$

DROP PROCEDURE IF EXISTS `PRIORIDAD_VIDEO`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `PRIORIDAD_VIDEO` (IN `pid_video` INT)  BEGIN
	
	DECLARE IDV INT;

	SET IDV=0;

	select id_video into IDV from videos where id_video=pid_video;

	if IDV > 0 then
		update videos set estado=1;
		update videos set estado=2 where id_video=IDV;	
	else
		select 'El album no existe' as mensaje;
	end if;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id_about` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_about`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albums`
--

DROP TABLE IF EXISTS `albums`;
CREATE TABLE IF NOT EXISTS `albums` (
  `id_album` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_album`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `awards`
--

DROP TABLE IF EXISTS `awards`;
CREATE TABLE IF NOT EXISTS `awards` (
  `id_award` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_award`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentphotos`
--

DROP TABLE IF EXISTS `commentphotos`;
CREATE TABLE IF NOT EXISTS `commentphotos` (
  `id_commentphoto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_album` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commentphoto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentrecorridos`
--

DROP TABLE IF EXISTS `commentrecorridos`;
CREATE TABLE IF NOT EXISTS `commentrecorridos` (
  `id_commentrecorridos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_recorridoalbum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commentrecorridos`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentvideos`
--

DROP TABLE IF EXISTS `commentvideos`;
CREATE TABLE IF NOT EXISTS `commentvideos` (
  `id_commentvideo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_video` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commentvideo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commentworks`
--

DROP TABLE IF EXISTS `commentworks`;
CREATE TABLE IF NOT EXISTS `commentworks` (
  `id_commentwork` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_workalbum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_commentwork`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `infotecas`
--

DROP TABLE IF EXISTS `infotecas`;
CREATE TABLE IF NOT EXISTS `infotecas` (
  `id_infoteca` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_workalbum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_infoteca`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=480 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(464, '2014_10_12_000000_create_users_table', 2),
(465, '2014_10_12_100000_create_password_resets_table', 2),
(466, '2018_04_28_173358_create_abouts_table', 2),
(467, '2018_04_28_173526_create_photos_table', 2),
(468, '2018_04_28_174014_create_albums_table', 2),
(469, '2018_04_28_174310_create_videos_table', 2),
(470, '2018_05_08_004615_create_commentrecorridos_table', 2),
(471, '2018_05_08_004753_create_commentworks_table', 2),
(472, '2018_05_08_004811_create_commentphotos_table', 2),
(473, '2018_05_08_004830_create_commentvideos_table', 2),
(280, '2018_07_14_184519_create_tamano_table', 1),
(474, '2018_05_08_004923_create_workalbums_table', 2),
(475, '2018_05_08_004948_create_works_table', 2),
(476, '2018_05_08_005015_create_recorridoalbums_table', 2),
(477, '2018_05_08_005031_create_recorridovirtuals_table', 2),
(478, '2018_05_08_005052_create_infotecas_table', 2),
(479, '2018_11_07_044319_create_awards_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `photos`
--

DROP TABLE IF EXISTS `photos`;
CREATE TABLE IF NOT EXISTS `photos` (
  `id_photo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_album` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_photo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorridoalbums`
--

DROP TABLE IF EXISTS `recorridoalbums`;
CREATE TABLE IF NOT EXISTS `recorridoalbums` (
  `id_recorridoalbum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_recorridoalbum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recorridovirtuals`
--

DROP TABLE IF EXISTS `recorridovirtuals`;
CREATE TABLE IF NOT EXISTS `recorridovirtuals` (
  `id_recorridovirtual` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `archivo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `tipo_content` int(11) NOT NULL,
  `id_workalbum` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_recorridovirtual`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_usuario` int(11) NOT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tipo_usuario`, `provider`, `provider_id`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Eusebio Kihn Jr.', 'turcotte.bradley@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, NULL, NULL, 'ee7cNrRDAD', '2019-01-11 13:51:00', '2019-01-11 13:51:00'),
(2, 'Prof. Emiliano Ratke', 'velma.stanton@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, NULL, NULL, 'yjMPjZPOPM', '2019-01-11 13:51:00', '2019-01-11 13:51:00'),
(3, 'Laverna Kerluke', 'dejon18@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, NULL, NULL, '7pH5KZYLE7', '2019-01-11 13:51:00', '2019-01-11 13:51:00'),
(4, 'Dr. Ceasar Hammes DDS', 'mae.reinger@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, NULL, NULL, 'px9QGqmiz3', '2019-01-11 13:51:00', '2019-01-11 13:51:00'),
(5, 'Dr. Raheem Kozey', 'joannie95@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 1, NULL, NULL, NULL, 'hF9Yv2kOUg', '2019-01-11 13:51:00', '2019-01-11 13:51:00'),
(6, 'puch', 'puchmaster97@hotmail.com', '$2y$10$sB.WO8Vqudx9V9aEA1D4dehFNZ9GT20XcbixgFLy.ZTUymURDn2om', 2, NULL, NULL, NULL, NULL, '2019-01-11 13:51:00', '2019-01-11 13:51:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videos`
--

DROP TABLE IF EXISTS `videos`;
CREATE TABLE IF NOT EXISTS `videos` (
  `id_video` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_video`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workalbums`
--

DROP TABLE IF EXISTS `workalbums`;
CREATE TABLE IF NOT EXISTS `workalbums` (
  `id_workalbum` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titulo` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulov` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `cordenada` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_workalbum`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `works`
--

DROP TABLE IF EXISTS `works`;
CREATE TABLE IF NOT EXISTS `works` (
  `id_work` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `archivo` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `id_workalbum` int(11) NOT NULL,
  `prioridad` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_work`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
