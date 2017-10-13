-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2017 a las 07:33:03
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdmovilidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mediostransporte`
--

CREATE TABLE `mediostransporte` (
  `TIPO` varchar(30) NOT NULL,
  `COSTO` int(11) NOT NULL,
  `VELPROMEDIO` int(11) NOT NULL,
  `HUMEDAD` int(11) NOT NULL,
  `LLUVIA` varchar(11) NOT NULL,
  `TEMPERATURA` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mediostransporte`
--

INSERT INTO `mediostransporte` (`TIPO`, `COSTO`, `VELPROMEDIO`, `HUMEDAD`, `LLUVIA`, `TEMPERATURA`) VALUES
('BUS', 9000, 20, 10, 'AMBOS', 'AMBOS'),
('Taxi', 5000, 80, 10, 'Si', 'Baja');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mediostransporte`
--
ALTER TABLE `mediostransporte`
  ADD PRIMARY KEY (`TIPO`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
