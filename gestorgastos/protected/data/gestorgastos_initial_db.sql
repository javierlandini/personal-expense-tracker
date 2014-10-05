-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-10-2014 a las 23:36:59
-- Versión del servidor: 5.5.35-0ubuntu0.13.10.2
-- Versión de PHP: 5.5.3-1ubuntu2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `gestorgastos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE IF NOT EXISTS `Categoria` (
  `Cid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `Descripcion` varchar(300) NOT NULL,
  PRIMARY KEY (`Cid`),
  UNIQUE KEY `Descripcion` (`Descripcion`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`Cid`, `Descripcion`) VALUES
(1, 'Gastos Auto'),
(2, 'Trabajo'),
(3, 'Gastos fijos'),
(4, 'Entretenimiento'),
(5, 'Trabajos particulares'),
(6, 'Otros'),
(7, 'Pasajes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Gasto`
--

CREATE TABLE IF NOT EXISTS `Gasto` (
  `Gid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `Fecha` datetime DEFAULT NULL,
  `Descripcion` varchar(300) NOT NULL,
  `Monto` decimal(8,2) DEFAULT NULL,
  `IdCategoria` mediumint(8) unsigned NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (IdCategoria) REFERENCES Categoria(Cid)',
  `IdUsuario` int(11) NOT NULL,
  PRIMARY KEY (`Gid`),
  KEY `IdCategoria` (`IdCategoria`),
  KEY `IdUsuario` (`IdUsuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=148 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT,
  `Usuario` varchar(70) NOT NULL,
  `Contrasena` varchar(128) NOT NULL,
  `Email` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`Uid`),
  UNIQUE KEY `Usuario` (`Usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`Uid`, `Usuario`, `Contrasena`, `Email`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@localhost.com'),

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
