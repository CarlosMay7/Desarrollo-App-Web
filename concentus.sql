-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2023 a las 20:25:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `concentus`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id` int(4) UNSIGNED NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `imagen` text NOT NULL,
  `etiquetas` varchar(64) NOT NULL,
  `redes` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id`, `nombre`, `imagen`, `etiquetas`, `redes`) VALUES
(1, 'Florencia Bertotti', 'https://www.sonica.mx/u/fotografias/m/2023/11/28/f685x385-50654_88347_5050.jpg', 'SONG-WRITER', '@flobertottiok'),
(2, 'Iron Maiden', 'https://th.bing.com/th/id/OIF.xw7oWGBwSpxA25hkKfXvPQ?rs=1&pid=ImgDetMain', 'HEAVY-METAL', '@ironmaiden'),
(4, 'Luis Miguel', 'https://tolucalabellacd.com/wp-content/uploads/2023/02/anuncian-tour-2023-de-luis-miguel-de-manera-oficial.jpg', 'ROMANCE', '@luismiguel');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conciertos`
--

CREATE TABLE `conciertos` (
  `id` int(4) NOT NULL,
  `ciudad` varchar(64) NOT NULL,
  `recinto` varchar(64) NOT NULL,
  `fecha_id` int(4) UNSIGNED NOT NULL,
  `descripcion` text NOT NULL,
  `url_compra` text NOT NULL,
  `artista_id` int(4) UNSIGNED NOT NULL,
  `sold_out` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conciertos`
--

INSERT INTO `conciertos` (`id`, `ciudad`, `recinto`, `fecha_id`, `descripcion`, `url_compra`, `artista_id`, `sold_out`) VALUES
(1, 'CDMX', 'Auditorio Nacional', 1, 'Venta general, 1 de Diciembre, 10:00 am', 'https://www.ticketmaster.com.mx/search?q=flor%20bertotti', 1, 0),
(2, 'CDMX', 'Foro-Sol', 2, 'PREVENTA HSBC 30 DE NOVIEMBRE Y 1 DE DICIEMBRE 2:00 PM\r\n\r\nVENTA GENERAL 3 DE DICIEMBRE 2:00 PM', 'https://www.ticketmaster.com.mx/search?q=Iron%20maiden', 2, 0),
(3, 'CDMX', 'Arena CDMX', 3, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(4, 'Queretaro', 'Estadio Corregidora', 4, 'Luis Miguel Tour 2023', 'https://luismigueloficial.com/tour', 4, 1),
(5, 'Aguascalientes', 'Estadio Victoria', 5, 'Luis Miguel Tour 2023', 'https://luismigueloficial.com/tour', 4, 1),
(6, 'San Luis Potosi', 'Estadio Alfonso Lastras', 6, 'Luis Miguel Tour 2023', 'https://luismigueloficial.com/tour', 4, 1),
(7, 'Leon', 'Estadio TV4 Domingo Santana', 7, 'Luis Miguel Tour 2023', 'https://luismigueloficial.com/tour', 4, 1),
(8, 'Puebla', 'Estadio Cuahtemoc', 8, 'Luis Miguel Tour 2023', 'https://luismigueloficial.com/tour', 4, 1),
(9, 'Oaxaca', 'Estadio Tecnológico de Oaxaca', 9, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(10, 'Veracruz', 'Estadio Beto Ávila ', 10, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(11, 'Morelia', 'Estadio Morelos', 11, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(12, 'Guadalajara', 'Estadio Jalisco', 12, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(13, 'Guadalajara', 'Estadio Jalisco', 13, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(14, 'CDMX', 'Arena CDMX', 14, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conciertosdetour`
--

CREATE TABLE `conciertosdetour` (
  `tour_id` int(3) UNSIGNED NOT NULL,
  `concierto_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conciertosdetour`
--

INSERT INTO `conciertosdetour` (`tour_id`, `concierto_id`) VALUES
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fecha`
--

CREATE TABLE `fecha` (
  `id` int(4) UNSIGNED NOT NULL,
  `dia` int(2) UNSIGNED NOT NULL,
  `mes` int(2) UNSIGNED NOT NULL,
  `año` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fecha`
--

INSERT INTO `fecha` (`id`, `dia`, `mes`, `año`) VALUES
(1, 24, 3, '2024'),
(2, 20, 11, '2024'),
(3, 28, 11, '2023'),
(4, 30, 11, '2023'),
(5, 2, 12, '2023'),
(6, 4, 12, '2023'),
(7, 5, 12, '2023'),
(8, 8, 12, '2023'),
(9, 10, 12, '2023'),
(10, 12, 12, '2023'),
(11, 15, 12, '2023'),
(12, 17, 12, '2023'),
(13, 18, 12, '2023'),
(14, 20, 12, '2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tours`
--

CREATE TABLE `tours` (
  `id` int(3) UNSIGNED NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `descripcion` text NOT NULL,
  `artista_id` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tours`
--

INSERT INTO `tours` (`id`, `nombre`, `descripcion`, `artista_id`) VALUES
(1, 'Luis Miguel Tour 2023', 'Tour de regreso Luis Miguel en México ', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `apellido` varchar(128) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `confirmado` tinyint(1) NOT NULL,
  `token` varchar(128) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `confirmado`, `token`, `admin`) VALUES
(1, ' Diego', 'Alamilla', 'diego-alamilla@hotmail.com', '$2y$10$Bcfk1AxhFstxy/XvJrTRYu.7Tf5X8SP7H4uFpLT8IHvLZZ8/CNR3O', 0, '6566c58a866a4', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `conciertos`
--
ALTER TABLE `conciertos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conciertos_ibfk_1` (`artista_id`),
  ADD KEY `conciertos_ibfk_2` (`fecha_id`);

--
-- Indices de la tabla `conciertosdetour`
--
ALTER TABLE `conciertosdetour`
  ADD PRIMARY KEY (`tour_id`,`concierto_id`),
  ADD KEY `conciertosdetour_ibfk_1` (`concierto_id`);

--
-- Indices de la tabla `fecha`
--
ALTER TABLE `fecha`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tours`
--
ALTER TABLE `tours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tours_ibfk_1` (`artista_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `conciertos`
--
ALTER TABLE `conciertos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conciertos`
--
ALTER TABLE `conciertos`
  ADD CONSTRAINT `conciertos_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `conciertos_ibfk_2` FOREIGN KEY (`fecha_id`) REFERENCES `fecha` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `conciertosdetour`
--
ALTER TABLE `conciertosdetour`
  ADD CONSTRAINT `conciertosdetour_ibfk_1` FOREIGN KEY (`concierto_id`) REFERENCES `conciertos` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `conciertosdetour_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
