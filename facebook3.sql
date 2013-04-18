-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2013 a las 09:04:18
-- Versión del servidor: 5.5.8
-- Versión de PHP: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `facebook`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checkins`
--

CREATE TABLE IF NOT EXISTS `checkins` (
  `che_id2` int(20) NOT NULL AUTO_INCREMENT,
  `use_id2` int(20) NOT NULL,
  `use_id` varchar(30) DEFAULT NULL,
  `che_id` varchar(30) DEFAULT NULL,
  `con_id` int(20) NOT NULL,
  `che_name` varchar(50) DEFAULT NULL,
  `che_place` varchar(50) DEFAULT NULL,
  `che_message` varchar(50) DEFAULT NULL,
  `che_latitude` varchar(50) DEFAULT NULL,
  `che_longitude` varchar(50) DEFAULT NULL,
  `che_application` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`che_id2`),
  KEY `fk_reference_11` (`use_id2`),
  KEY `fk_reference_19` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `checkins`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concurso`
--

CREATE TABLE IF NOT EXISTS `concurso` (
  `con_id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'Id',
  `con_nombre` varchar(60) NOT NULL COMMENT 'Nombre',
  `con_link` varchar(50) NOT NULL COMMENT 'Link',
  `con_cod` varchar(50) NOT NULL COMMENT 'Codigo',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`con_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `concurso`
--

INSERT INTO `concurso` (`con_id`, `con_nombre`, `con_link`, `con_cod`, `created_at`, `updated_at`) VALUES
(1, 'prueba', 'www.prueba.cl', 'hjkjhkjhkjh', '2013-04-15 22:15:32', '2013-04-15 22:15:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `fri_id2` int(20) NOT NULL AUTO_INCREMENT,
  `use_id2` int(20) NOT NULL,
  `use_id` varchar(30) DEFAULT NULL,
  `fri_id` varchar(30) DEFAULT NULL,
  `con_id` int(20) NOT NULL,
  `fri_name` varchar(50) DEFAULT NULL,
  `fri_first_name` varchar(50) DEFAULT NULL,
  `fri_middle_name` varchar(50) DEFAULT NULL,
  `fri_last_name` varchar(50) DEFAULT NULL,
  `fri_gender` varchar(50) DEFAULT NULL,
  `fri_locale` varchar(50) DEFAULT NULL,
  `fri_link` varchar(50) DEFAULT NULL,
  `fri_birthday` varchar(50) DEFAULT NULL,
  `fri_email` varchar(50) DEFAULT NULL,
  `fri_location` varchar(50) DEFAULT NULL,
  `fri_website` varchar(50) DEFAULT NULL,
  `fri_invite` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`fri_id2`),
  KEY `fk_reference_10` (`use_id2`),
  KEY `fk_reference_7` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `friends`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `gro_id2` int(20) NOT NULL AUTO_INCREMENT,
  `use_id2` int(20) NOT NULL,
  `use_id` varchar(30) DEFAULT NULL,
  `gro_id` varchar(30) DEFAULT NULL,
  `con_id` int(20) NOT NULL,
  `gro_version` varchar(50) DEFAULT NULL,
  `gro_name` varchar(50) DEFAULT NULL,
  `gro_administrator` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gro_id2`),
  KEY `fk_reference_18` (`use_id2`),
  KEY `fk_reference_4` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `groups`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interest`
--

CREATE TABLE IF NOT EXISTS `interest` (
  `int_id2` int(20) NOT NULL AUTO_INCREMENT,
  `use_id2` int(20) NOT NULL,
  `use_id` varchar(30) DEFAULT NULL,
  `int_id` varchar(30) DEFAULT NULL,
  `con_id` int(20) NOT NULL,
  `int_name` varchar(50) DEFAULT NULL,
  `int_category` varchar(50) DEFAULT NULL,
  `int_created_time` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`int_id2`),
  KEY `fk_reference_15` (`use_id2`),
  KEY `fk_reference_9` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `interest`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE IF NOT EXISTS `likes` (
  `lik_id2` int(20) NOT NULL AUTO_INCREMENT,
  `use_id2` int(20) NOT NULL,
  `pag_id` varchar(30) DEFAULT NULL,
  `use_id` varchar(30) DEFAULT NULL,
  `lik_id` varchar(30) DEFAULT NULL,
  `con_id` int(20) NOT NULL,
  `lik_name` varchar(50) DEFAULT NULL,
  `lik_category` varchar(50) DEFAULT NULL,
  `lik_created_time` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`lik_id2`),
  KEY `fk_reference_12` (`use_id2`),
  KEY `fk_reference_5` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `likes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pag_id2` int(20) NOT NULL AUTO_INCREMENT,
  `use_id2` int(20) NOT NULL,
  `use_id` varchar(30) DEFAULT NULL,
  `pag_id` varchar(30) DEFAULT NULL,
  `con_id` int(20) NOT NULL,
  `pag_name` varchar(50) DEFAULT NULL,
  `pag_picture` varchar(50) DEFAULT NULL,
  `pag_link` varchar(50) DEFAULT NULL,
  `pag_category` varchar(50) DEFAULT NULL,
  `pag_likes` varchar(50) DEFAULT NULL,
  `pag_website` varchar(50) DEFAULT NULL,
  `pag_founded` varchar(50) DEFAULT NULL,
  `pag_products` varchar(50) DEFAULT NULL,
  `pag_checkins` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pag_id2`),
  KEY `fk_reference_1` (`con_id`),
  KEY `fk_reference_14` (`use_id2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `pages`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntajes`
--

CREATE TABLE IF NOT EXISTS `puntajes` (
  `pun_id` int(20) NOT NULL AUTO_INCREMENT,
  `con_id` int(20) NOT NULL,
  `pun_nombre` varchar(50) DEFAULT NULL,
  `pun_valor` int(8) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`pun_id`),
  KEY `fk_reference_3` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `puntajes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `sta_id2` int(20) NOT NULL AUTO_INCREMENT,
  `use_id2` int(20) DEFAULT NULL,
  `sta_id` varchar(30) DEFAULT NULL,
  `con_id` int(20) NOT NULL,
  `sta_message` varchar(50) DEFAULT NULL,
  `sta_updated_time` varchar(50) DEFAULT NULL,
  `sta_like_count` varchar(50) DEFAULT NULL,
  `sta_comments_count` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`sta_id2`),
  KEY `fk_reference_13` (`use_id2`),
  KEY `fk_reference_2` (`con_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `statuses`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `use_id2` int(20) NOT NULL AUTO_INCREMENT,
  `use_id` varchar(30) DEFAULT NULL,
  `con_id` int(20) NOT NULL,
  `use_name` varchar(50) DEFAULT NULL,
  `use_first_name` varchar(50) DEFAULT NULL,
  `use_middle_name` varchar(50) DEFAULT NULL,
  `use_last_name` varchar(50) DEFAULT NULL,
  `use_gender` varchar(50) DEFAULT NULL,
  `use_locale` varchar(50) DEFAULT NULL,
  `use_link` varchar(50) DEFAULT NULL,
  `use_birthday` varchar(50) DEFAULT NULL,
  `use_email` varchar(50) DEFAULT NULL,
  `use_location` varchar(50) DEFAULT NULL,
  `use_website` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`use_id2`),
  KEY `fk_reference_17` (`con_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `users`
--


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `checkins`
--
ALTER TABLE `checkins`
  ADD CONSTRAINT `fk_reference_19` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`),
  ADD CONSTRAINT `fk_reference_11` FOREIGN KEY (`use_id2`) REFERENCES `users` (`use_id2`);

--
-- Filtros para la tabla `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `fk_reference_7` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`),
  ADD CONSTRAINT `fk_reference_10` FOREIGN KEY (`use_id2`) REFERENCES `users` (`use_id2`);

--
-- Filtros para la tabla `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `fk_reference_4` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`),
  ADD CONSTRAINT `fk_reference_18` FOREIGN KEY (`use_id2`) REFERENCES `users` (`use_id2`);

--
-- Filtros para la tabla `interest`
--
ALTER TABLE `interest`
  ADD CONSTRAINT `fk_reference_9` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`),
  ADD CONSTRAINT `fk_reference_15` FOREIGN KEY (`use_id2`) REFERENCES `users` (`use_id2`);

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `fk_reference_5` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`),
  ADD CONSTRAINT `fk_reference_12` FOREIGN KEY (`use_id2`) REFERENCES `users` (`use_id2`);

--
-- Filtros para la tabla `pages`
--
ALTER TABLE `pages`
  ADD CONSTRAINT `fk_reference_14` FOREIGN KEY (`use_id2`) REFERENCES `users` (`use_id2`),
  ADD CONSTRAINT `fk_reference_1` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`);

--
-- Filtros para la tabla `puntajes`
--
ALTER TABLE `puntajes`
  ADD CONSTRAINT `fk_reference_3` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`);

--
-- Filtros para la tabla `statuses`
--
ALTER TABLE `statuses`
  ADD CONSTRAINT `fk_reference_2` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`),
  ADD CONSTRAINT `fk_reference_13` FOREIGN KEY (`use_id2`) REFERENCES `users` (`use_id2`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_reference_17` FOREIGN KEY (`con_id`) REFERENCES `concurso` (`con_id`);
