-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2017 a las 19:05:21
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clima`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dispositivo`
--

CREATE TABLE `dispositivo` (
  `NUMSERIE` varchar(4) NOT NULL,
  `BARRIO` varchar(30) NOT NULL,
  `LATITUD` double NOT NULL,
  `LONGITUD` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dispositivo`
--

INSERT INTO `dispositivo` (`NUMSERIE`, `BARRIO`, `LATITUD`, `LONGITUD`) VALUES
('2001', 'Loma linda', -76.6072383, 2.4491459),
('2002', 'Centro Deportivo Tulcan ', 2.447762, -76.598313),
('2003', 'Parque caldas', 2.441237, -76.6067877),
('2004', 'Sena - Sede Norte', 2.483109, -76.561909),
('2005', 'Biblioteca Parque informático ', 2.44738, -76.62116),
('2006', 'Barrio el Plateado', 2.416616, -76.608626);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medida`
--

CREATE TABLE `medida` (
  `NUMMEDIDA` int(11) NOT NULL,
  `NUMSERIE` varchar(4) NOT NULL,
  `HUMEDAD` float NOT NULL,
  `TEMPERATURA` float NOT NULL,
  `LLUVIA` tinyint(1) NOT NULL,
  `ANIO` int(11) NOT NULL,
  `MES` int(11) NOT NULL,
  `DIA` int(11) NOT NULL,
  `HORA` int(11) NOT NULL,
  `MINUTO` int(11) NOT NULL,
  `SEGUNDO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medida`
--

INSERT INTO `medida` (`NUMMEDIDA`, `NUMSERIE`, `HUMEDAD`, `TEMPERATURA`, `LLUVIA`, `ANIO`, `MES`, `DIA`, `HORA`, `MINUTO`, `SEGUNDO`) VALUES
(1, '2002', 34.4, 23, 1, 2017, 7, 20, 2, 3, 1),
(2, '2002', 40.4, 28.6, 1, 2017, 11, 1, 11, 1, 1),
(3, '2003', 40.1, 23.6, 1, 2017, 9, 6, 4, 24, 30),
(4, '2003', 40.5, 34.5, 1, 2017, 9, 6, 4, 25, 40),
(5, '2004', 50.1, 24.5, 1, 2017, 9, 6, 4, 26, 30),
(6, '2004', 50.1, 34.2, 0, 2017, 9, 6, 4, 27, 40),
(7, '2005', 40.7, 34.6, 1, 2017, 9, 6, 4, 28, 40),
(8, '2006', 50.2, 20.4, 1, 2017, 9, 6, 4, 29, 40),
(9, '2001', 30.9, 22.5, 1, 2017, 9, 6, 4, 30, 30),
(10, '2001', 45.2, 28.4, 1, 2017, 9, 6, 4, 31, 50),
(11, '2003', 40.8, 34.5, 1, 2017, 9, 6, 4, 25, 40);

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
-- Indices de la tabla `dispositivo`
--
ALTER TABLE `dispositivo`
  ADD PRIMARY KEY (`NUMSERIE`);

--
-- Indices de la tabla `medida`
--
ALTER TABLE `medida`
  ADD PRIMARY KEY (`NUMMEDIDA`),
  ADD KEY `FK_TOMA` (`NUMSERIE`);

--
-- Indices de la tabla `mediostransporte`
--
ALTER TABLE `mediostransporte`
  ADD PRIMARY KEY (`TIPO`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `medida`
--
ALTER TABLE `medida`
  ADD CONSTRAINT `FK_TOMA` FOREIGN KEY (`NUMSERIE`) REFERENCES `dispositivo` (`NUMSERIE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
