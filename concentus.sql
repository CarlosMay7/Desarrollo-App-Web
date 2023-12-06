-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 19:54:46
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ACTUALIZAR_TABLA_EVENTOS` ()   INSERT INTO registros_eventos (mensaje) VALUES (CONCAT('Se borraron fechas en la fecha ', NOW()))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `Borrar_ConciertosPasados` ()   BEGIN
DELETE FROM fecha WHERE STR_TO_DATE(CONCAT(año, '-', mes, '-', dia), '%Y-%m-%d') < DATE_SUB(CURDATE(), INTERVAL 1 DAY);
CALL ACTUALIZAR_TABLA_EVENTOS();
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `id` int(4) UNSIGNED NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `imagen` text NOT NULL,
  `etiquetas` varchar(64) NOT NULL,
  `redes` varchar(64) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`id`, `nombre`, `imagen`, `etiquetas`, `redes`, `descripcion`) VALUES
(1, 'Florencia Bertotti', '74a6cf36c11ba5cec40beee41dda12c0', 'SONG-WRITER', '@flobertottiok', 'María Florencia Bertotti​ es una actriz, cantante, compositora, directora teatral y creadora de contenidos digitales argentina. Es conocida por haber protagonizado las telenovelas infantiles Floricienta.'),
(2, 'Iron Maiden', 'fa5cb3b01f81564441db077a1bdab70b', 'HEAVY-METAL', '@ironmaiden', 'Iron Maiden es una banda británica de heavy metal fundada en en en 1975 por el bajista Steve Harris. Considerada una de las agrupaciones más importantes y representativas del género, han vendido más de 100 millones de discos en todo el mundo, a pesar de haber contado con poco apoyo de los medios masivos durante la mayor parte de su carrera.'),
(4, 'Luis Miguel', '7116f0824258cdab2185fafac4cb014d', 'ROMANCE', '@luismiguel', 'Luis Miguel Gallego Basteri, ​​ conocido como Luis Miguel, es un cantante y productor mexicano.​​​ Reconocido por su poderosa voz y su presencia escénica, es uno de los cantantes más exitosos de la música en español.'),
(5, 'Alejandro Fernandez', '8a0c59b8a19a2d6f2c70855f0aa4d300', 'RANCHERA', '@alexoficial', 'Alejandro Fernández Abarca es un cantante de ranchera y pop latino mexicano, hijo del recordado cantante ranchero Vicente Fernández. En un principio se especializó en estilos tradicionales de música regional mexicana​ como mariachi.'),
(6, 'MEGADETH', '5405e06132605b0759d2aa3d6dd6e262', 'TRASH-METAL,METAL', '@Megadeth', 'Megadeth es un grupo musical estadounidense de thrash metal, formado en Los Ángeles, California. Fue creada en 1983 por Dave Mustaine, después de que fuera expulsado de Metallica, donde ocupaba el puesto de guitarrista principal.'),
(7, ' Bad Bunny', 'f0765c75b4a53d9da295d7764f7c1e9f', 'Trap,Regueton', '@benito ', 'El mejor artista latino de toda la historia'),
(8, ' Twice', '94e17decb669d9e12d2902e900df5589', 'K-POP,Pop', '@twicetagram', 'Uno de los mejores grupos de K-POP ');

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
(7, 'Leon', 'Estadio TV4 Domingo Santana', 7, 'Luis Miguel Tour 2023', 'https://luismigueloficial.com/tour', 4, 1),
(8, 'Puebla', 'Estadio Cuahtemoc', 8, 'Luis Miguel Tour 2023', 'https://luismigueloficial.com/tour', 4, 1),
(9, 'Oaxaca', 'Estadio Tecnológico de Oaxaca', 9, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(10, 'Veracruz', 'Estadio Beto Ávila ', 10, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(11, 'Morelia', 'Estadio Morelos', 11, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(12, 'Guadalajara', 'Estadio Jalisco', 12, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(13, 'Guadalajara', 'Estadio Jalisco', 13, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(14, 'CDMX', 'Arena CDMX', 14, 'LUIS MIGUEL TOUR 2023', 'https://luismigueloficial.com/tour', 4, 1),
(15, 'Guadalajara', 'Plaza de Toros Nuevo Progreso', 15, '6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n', 'https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez', 5, 0),
(16, 'CDMX', 'Plaza de Toros La México', 16, '6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n', 'https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez', 5, 0),
(17, 'Villahermosa', 'Estadio de Béisbol Centenario 27 de febrero', 17, '6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n', 'https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez', 5, 0),
(18, 'Tuxtla', 'Estadio de Futbol Victor Manuel Reyna', 18, '6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n', 'https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez', 5, 0),
(19, 'Mexicali', 'Plaza de Toros Calafia', 19, '6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n', 'https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez', 5, 0),
(20, 'Tijuana', 'Plaza de Toros Monumental las Playas', 20, '6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n', 'https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez', 5, 0),
(21, 'Pachuca', 'Plaza de Toros Vicente Segura', 21, '6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n', 'https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez', 5, 0),
(22, 'CDMX', 'Auditorio Nacional', 23, 'Venta General: 1 de Diciembre 10:00 am', 'https://www.ticketmaster.com.mx/search?q=flor%20bertotti', 1, 1),
(23, 'Guadalajara', 'Auditorio Telmex', 22, 'Venta General: 1 de Diciembre 10:00 am', 'https://www.ticketmaster.com.mx/search?q=flor%20bertotti', 1, 0),
(24, 'Monterrey', 'Arena Monterrey', 24, 'Venta General: 1 de Diciembre 10:00 am', 'https://www.ticketmaster.com.mx/search?q=flor%20bertotti', 1, 0),
(25, 'Puebla', 'Auditorio Metropolitano', 25, 'Venta General: 1 de Diciembre 10:00 am', 'https://www.ticketmaster.com.mx/search?q=flor%20bertotti', 1, 0),
(26, 'CDMX', 'Arena CDMX', 28, 'Preventa Army: 11 Noviembre 10:00 AM', 'https://web2.superboletos.com/SuperBoletos/landing-evento?event_id=562zCuaI85ahKp4L94MuZQ', 6, 0),
(27, 'Monterrey', 'Arena Monterrey', 29, 'Preventa Army: 11 Noviembre 10:00 AM', 'https://web2.superboletos.com/SuperBoletos/landing-evento?event_id=562zCuaI85ahKp4L94MuZQ', 6, 0);

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
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21);

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
(7, 5, 12, '2023'),
(8, 8, 12, '2023'),
(9, 10, 12, '2023'),
(10, 12, 12, '2023'),
(11, 15, 12, '2023'),
(12, 17, 12, '2023'),
(13, 18, 12, '2023'),
(14, 20, 12, '2023'),
(15, 23, 2, '2024'),
(16, 2, 3, '2024'),
(17, 7, 3, '2024'),
(18, 9, 3, '2024'),
(19, 14, 3, '2024'),
(20, 16, 3, '2024'),
(21, 20, 4, '2024'),
(22, 8, 2, '2024'),
(23, 4, 2, '2024'),
(24, 11, 2, '2024'),
(25, 14, 2, '2024'),
(28, 25, 4, '2024'),
(29, 27, 4, '2024');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_eventos`
--

CREATE TABLE `registros_eventos` (
  `id` int(11) NOT NULL,
  `mensaje` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registros_eventos`
--

INSERT INTO `registros_eventos` (`id`, `mensaje`) VALUES
(1, 'Evento ejecutado el 2023-12-05 18:48:13'),
(2, 'Evento ejecutado el 2023-12-05 19:01:06');

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
(1, 'Luis Miguel Tour 2023', 'Tour de regreso Luis Miguel en México ', 4),
(2, 'AMOR Y PATRIA', 'TOUR DE ALEJANDRO FERNANDEZ POR MÉXICO EN 2024', 5);

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
  `admin` tinyint(1) NOT NULL,
  `conciertosGuardados` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `password`, `confirmado`, `token`, `admin`, `conciertosGuardados`) VALUES
(1, ' Diego', 'Alamilla', 'diego-alamilla@hotmail.com', '$2y$10$Bcfk1AxhFstxy/XvJrTRYu.7Tf5X8SP7H4uFpLT8IHvLZZ8/CNR3O', 0, '6566c58a866a4', 0, NULL),
(2, ' Diego', 'Alamilla', 'diego@ejemplo.com', '$2y$10$H12wHH9TdJsmX3L03Xe/iO7LUuJnlKji5l6tA7oL0ictiX3O2FEfO', 1, '', 1, NULL);

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
  ADD PRIMARY KEY (`id`,`dia`,`mes`,`año`);

--
-- Indices de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
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
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `conciertos`
--
ALTER TABLE `conciertos`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `fecha`
--
ALTER TABLE `fecha`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `registros_eventos`
--
ALTER TABLE `registros_eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tours`
--
ALTER TABLE `tours`
  MODIFY `id` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conciertos`
--
ALTER TABLE `conciertos`
  ADD CONSTRAINT `conciertos_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `conciertos_ibfk_2` FOREIGN KEY (`fecha_id`) REFERENCES `fecha` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `conciertosdetour`
--
ALTER TABLE `conciertosdetour`
  ADD CONSTRAINT `conciertosdetour_ibfk_1` FOREIGN KEY (`concierto_id`) REFERENCES `conciertos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `conciertosdetour_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `tours`
--
ALTER TABLE `tours`
  ADD CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`root`@`localhost` EVENT `eliminar_registros_diariamente` ON SCHEDULE EVERY 1 DAY STARTS '2023-12-05 18:54:06' ON COMPLETION PRESERVE ENABLE DO BEGIN
    CALL Borrar_ConciertosPasados();
END$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
