-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-06-2019 a las 09:50:50
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_placetopay`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `session` int(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`session`, `date`, `status`) VALUES
(208871, '2019-06-17T07:34:48-05:00', 'OK'),
(208876, '2019-06-17T07:51:10-05:00', 'OK'),
(208885, '2019-06-17T08:48:16-05:00', 'OK'),
(208886, '2019-06-17T08:49:05-05:00', 'OK'),
(208903, '2019-06-17T09:05:22-05:00', 'OK'),
(208904, '2019-06-17T09:06:14-05:00', 'OK'),
(208905, '2019-06-17T09:07:05-05:00', 'OK'),
(208908, '2019-06-17T09:11:25-05:00', 'OK'),
(208909, '2019-06-17T09:14:09-05:00', 'OK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`session`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
