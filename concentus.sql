-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 18:50:25
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artistas`
--

DROP TABLE IF EXISTS `artistas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artistas` (
  `id` int(4) UNSIGNED NOT NULL,
  `nombre` varchar(128) NOT NULL,
  `imagen` text NOT NULL,
  `etiquetas` varchar(64) NOT NULL,
  `redes` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artistas`
--

INSERT INTO `artistas` (`id`, `nombre`, `imagen`, `etiquetas`, `redes`, `descripcion`) VALUES
(1, 'Florencia Bertotti', 'https://www.sonica.mx/u/fotografias/m/2023/11/28/f685x385-50654_88347_5050.jpg', 'SONG-WRITER', '{\"instagram\":\"@flobertottiok\"}', 'María Florencia Bertotti​ es una actriz, cantante, compositora, directora teatral y creadora de contenidos digitales argentina. Es conocida por haber protagonizado las telenovelas infantiles Floricienta.'),
(2, 'Iron Maiden', 'https://th.bing.com/th/id/OIF.xw7oWGBwSpxA25hkKfXvPQ?rs=1&pid=ImgDetMain', 'HEAVY-METAL', '{\"instagram\":\"@ironmaiden\"}', 'Iron Maiden es una banda británica de heavy metal fundada en en en 1975 por el bajista Steve Harris. Considerada una de las agrupaciones más importantes y representativas del género, han vendido más de 100 millones de discos en todo el mundo, a pesar de haber contado con poco apoyo de los medios masivos durante la mayor parte de su carrera.'),
(4, 'Luis Miguel', 'https://tolucalabellacd.com/wp-content/uploads/2023/02/anuncian-tour-2023-de-luis-miguel-de-manera-oficial.jpg', 'ROMANCE', '{\"instagram\":\"@luismiguel\"}', 'Luis Miguel Gallego Basteri, ​​ conocido como Luis Miguel, es un cantante y productor mexicano.​​​ Reconocido por su poderosa voz y su presencia escénica, es uno de los cantantes más exitosos de la música en español.'),
(5, 'Alejandro Fernandez', 'https://th.bing.com/th/id/OIP.9qoNVNJ4nPyeoCIQiDauqwHaE5?w=264&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7', 'RANCHERA', '{\"instagram\":\"@alexoficial\"}', 'Alejandro Fernández Abarca es un cantante de ranchera y pop latino mexicano, hijo del recordado cantante ranchero Vicente Fernández. En un principio se especializó en estilos tradicionales de música regional mexicana​ como mariachi.'),
(6, 'MEGADETH', 'https://th.bing.com/th/id/OIP.BONzQ8YSXyrYCb8W8fzQjgHaEK?w=329&h=185&c=7&r=0&o=5&dpr=1.3&pid=1.7', 'TRASH-METAL,METAL', '{\"instagram\":\"@Megadeth\"}', 'Megadeth es un grupo musical estadounidense de thrash metal, formado en Los Ángeles, California. Fue creada en 1983 por Dave Mustaine, después de que fuera expulsado de Metallica, donde ocupaba el puesto de guitarrista principal.');

-- --------------------------------------------------------

--
-- Table structure for table `conciertos`
--

DROP TABLE IF EXISTS `conciertos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conciertos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `ciudad` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `recinto` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `fecha_id` int unsigned NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `url_compra` text COLLATE utf8mb4_general_ci NOT NULL,
  `artista_id` int unsigned NOT NULL,
  `sold_out` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `conciertos_ibfk_1` (`artista_id`),
  KEY `conciertos_ibfk_2` (`fecha_id`),
  CONSTRAINT `conciertos_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `conciertos_ibfk_2` FOREIGN KEY (`fecha_id`) REFERENCES `fecha` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conciertos`
--

LOCK TABLES `conciertos` WRITE;
/*!40000 ALTER TABLE `conciertos` DISABLE KEYS */;
INSERT INTO `conciertos` VALUES (1,'CDMX','Auditorio Nacional',1,'Venta general, 1 de Diciembre, 10:00 am','https://www.ticketmaster.com.mx/search?q=flor%20bertotti',1,0),(2,'CDMX','Foro-Sol',2,'PREVENTA HSBC 30 DE NOVIEMBRE Y 1 DE DICIEMBRE 2:00 PM\r\n\r\nVENTA GENERAL 3 DE DICIEMBRE 2:00 PM','https://www.ticketmaster.com.mx/search?q=Iron%20maiden',2,0),(7,'Leon','Estadio TV4 Domingo Santana',7,'Luis Miguel Tour 2023','https://luismigueloficial.com/tour',4,1),(8,'Puebla','Estadio Cuahtemoc',8,'Luis Miguel Tour 2023','https://luismigueloficial.com/tour',4,1),(9,'Oaxaca','Estadio Tecnológico de Oaxaca',9,'LUIS MIGUEL TOUR 2023','https://luismigueloficial.com/tour',4,1),(10,'Veracruz','Estadio Beto Ávila ',10,'LUIS MIGUEL TOUR 2023','https://luismigueloficial.com/tour',4,1),(11,'Morelia','Estadio Morelos',11,'LUIS MIGUEL TOUR 2023','https://luismigueloficial.com/tour',4,1),(12,'Guadalajara','Estadio Jalisco',12,'LUIS MIGUEL TOUR 2023','https://luismigueloficial.com/tour',4,1),(13,'Guadalajara','Estadio Jalisco',13,'LUIS MIGUEL TOUR 2023','https://luismigueloficial.com/tour',4,1),(14,'CDMX','Arena CDMX',14,'LUIS MIGUEL TOUR 2023','https://luismigueloficial.com/tour',4,1),(15,'Guadalajara','Plaza de Toros Nuevo Progreso',15,'6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n','https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez',5,0),(16,'CDMX','Plaza de Toros La México',16,'6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n','https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez',5,0),(17,'Villahermosa','Estadio de Béisbol Centenario 27 de febrero',17,'6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n','https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez',5,0),(18,'Tuxtla','Estadio de Futbol Victor Manuel Reyna',18,'6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n','https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez',5,0),(19,'Mexicali','Plaza de Toros Calafia',19,'6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n','https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez',5,0),(20,'Tijuana','Plaza de Toros Monumental las Playas',20,'6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n','https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez',5,0),(21,'Pachuca','Plaza de Toros Vicente Segura',21,'6 de diciembre Preventa Citibanamex 11:00 AM\r\n7 de diciembre Venta General 11:00 AM\r\n','https://www.eticket.mx/busqueda.aspx?buscar=alejandro%20fernandez',5,0),(22,'CDMX','Auditorio Nacional',23,'Venta General: 1 de Diciembre 10:00 am','https://www.ticketmaster.com.mx/search?q=flor%20bertotti',1,1),(23,'Guadalajara','Auditorio Telmex',22,'Venta General: 1 de Diciembre 10:00 am','https://www.ticketmaster.com.mx/search?q=flor%20bertotti',1,0),(24,'Monterrey','Arena Monterrey',24,'Venta General: 1 de Diciembre 10:00 am','https://www.ticketmaster.com.mx/search?q=flor%20bertotti',1,0),(25,'Puebla','Auditorio Metropolitano',25,'Venta General: 1 de Diciembre 10:00 am','https://www.ticketmaster.com.mx/search?q=flor%20bertotti',1,0),(26,'CDMX','Arena CDMX',28,'Preventa Army: 11 Noviembre 10:00 AM','https://web2.superboletos.com/SuperBoletos/landing-evento?event_id=562zCuaI85ahKp4L94MuZQ',6,0),(27,'Monterrey','Arena Monterrey',29,'Preventa Army: 11 Noviembre 10:00 AM','https://web2.superboletos.com/SuperBoletos/landing-evento?event_id=562zCuaI85ahKp4L94MuZQ',6,0);
/*!40000 ALTER TABLE `conciertos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conciertosdetour`
--

DROP TABLE IF EXISTS `conciertosdetour`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `conciertosdetour` (
  `tour_id` int unsigned NOT NULL,
  `concierto_id` int NOT NULL,
  PRIMARY KEY (`tour_id`,`concierto_id`),
  KEY `conciertosdetour_ibfk_1` (`concierto_id`),
  CONSTRAINT `conciertosdetour_ibfk_1` FOREIGN KEY (`concierto_id`) REFERENCES `conciertos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `conciertosdetour_ibfk_2` FOREIGN KEY (`tour_id`) REFERENCES `tours` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conciertosdetour`
--

LOCK TABLES `conciertosdetour` WRITE;
/*!40000 ALTER TABLE `conciertosdetour` DISABLE KEYS */;
INSERT INTO `conciertosdetour` VALUES (1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(2,15),(2,16),(2,17),(2,18),(2,19),(2,20),(2,21);
/*!40000 ALTER TABLE `conciertosdetour` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fecha`
--

DROP TABLE IF EXISTS `fecha`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fecha` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `dia` int unsigned NOT NULL,
  `mes` int unsigned NOT NULL,
  `año` year NOT NULL,
  PRIMARY KEY (`id`,`dia`,`mes`,`año`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fecha`
--

LOCK TABLES `fecha` WRITE;
/*!40000 ALTER TABLE `fecha` DISABLE KEYS */;
INSERT INTO `fecha` VALUES (1,24,3,2024),(2,20,11,2024),(7,5,12,2023),(8,8,12,2023),(9,10,12,2023),(10,12,12,2023),(11,15,12,2023),(12,17,12,2023),(13,18,12,2023),(14,20,12,2023),(15,23,2,2024),(16,2,3,2024),(17,7,3,2024),(18,9,3,2024),(19,14,3,2024),(20,16,3,2024),(21,20,4,2024),(22,8,2,2024),(23,4,2,2024),(24,11,2,2024),(25,14,2,2024),(28,25,4,2024),(29,27,4,2024);
/*!40000 ALTER TABLE `fecha` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros_eventos`
--

DROP TABLE IF EXISTS `registros_eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registros_eventos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mensaje` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros_eventos`
--

LOCK TABLES `registros_eventos` WRITE;
/*!40000 ALTER TABLE `registros_eventos` DISABLE KEYS */;
INSERT INTO `registros_eventos` VALUES (1,'Evento ejecutado el 2023-12-05 18:48:13'),(2,'Evento ejecutado el 2023-12-05 19:01:06');
/*!40000 ALTER TABLE `registros_eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tours`
--

DROP TABLE IF EXISTS `tours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tours` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_general_ci NOT NULL,
  `artista_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tours_ibfk_1` (`artista_id`),
  CONSTRAINT `tours_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tours`
--

LOCK TABLES `tours` WRITE;
/*!40000 ALTER TABLE `tours` DISABLE KEYS */;
INSERT INTO `tours` VALUES (1,'Luis Miguel Tour 2023','Tour de regreso Luis Miguel en México ',4),(2,'AMOR Y PATRIA','TOUR DE ALEJANDRO FERNANDEZ POR MÉXICO EN 2024',5);
/*!40000 ALTER TABLE `tours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `apellido` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `email` text COLLATE utf8mb4_general_ci NOT NULL,
  `password` text COLLATE utf8mb4_general_ci NOT NULL,
  `confirmado` tinyint(1) NOT NULL,
  `token` varchar(128) COLLATE utf8mb4_general_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `conciertosGuardados` text COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,' Diego','Alamilla','diego-alamilla@hotmail.com','$2y$10$Bcfk1AxhFstxy/XvJrTRYu.7Tf5X8SP7H4uFpLT8IHvLZZ8/CNR3O',0,'6566c58a866a4',0,NULL),(2,' Diego','Alamilla','diego@ejemplo.com','$2y$10$H12wHH9TdJsmX3L03Xe/iO7LUuJnlKji5l6tA7oL0ictiX3O2FEfO',1,'',1,'');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-12-06 12:24:50
