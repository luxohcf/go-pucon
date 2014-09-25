-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2014 a las 05:30:56
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `go-pucon`
--
drop table if exists TBL_IMAGEN;

drop table if exists TBL_ACTIVIDAD;

drop table if exists TBL_TIPO_ACTIVIDAD;

drop table if exists TBL_CLIENTES;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_actividad`
--

CREATE TABLE IF NOT EXISTS `TBL_ACTIVIDAD` (
  `ID_ACTIVIDAD` int(11) NOT NULL AUTO_INCREMENT,
  `ID_TIPO_ACTIVIDAD` int(11) DEFAULT NULL,
  `NOMBRE_ACTIVIDAD` varchar(100) DEFAULT NULL,
  `RESUMEN` varchar(1000) DEFAULT NULL,
  `DESCRIPCION` mediumtext,
  `IMAGEN_RESUMEN` varchar(300) DEFAULT NULL,
  `IMAGEN_RESUMEN_CHICA` varchar(300) DEFAULT NULL,
  `URL_WEB` varchar(300) DEFAULT NULL,
  `ACTIVA` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ID_ACTIVIDAD`),
  KEY `FK_REFERENCE_1` (`ID_TIPO_ACTIVIDAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `tbl_actividad`
--

INSERT INTO `TBL_ACTIVIDAD` (`ID_ACTIVIDAD`, `ID_TIPO_ACTIVIDAD`, `NOMBRE_ACTIVIDAD`, `RESUMEN`, `DESCRIPCION`, `IMAGEN_RESUMEN`, `IMAGEN_RESUMEN_CHICA`, `URL_WEB`, `ACTIVA`) VALUES
(20, 1, 'Cabalgata', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'http://www.puconaventura.cl/visor/images/1.jpg', 'http://www.puconaventura.cl/visor/images/1.jpg', '', '1'),
(21, 1, 'Nadar', ' rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'http://www.puconaventura.cl/visor/images/2.jpg', 'http://www.puconaventura.cl/visor/images/2.jpg', '', '1'),
(22, 1, 'Piscina ', 'Piscina''''''''ááá', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'http://www.puconaventura.cl/visor/images/3.jpg', 'http://www.puconaventura.cl/visor/images/3.jpg', '', '1'),
(23, 1, 'Ascenso Volcan Villarrica', ' Ejecutamos el atractivo y desafiante ascenso a la cumbre del Volcán Villarrica, actividad que parte desde nuestra agencia a las 06:30 a.m. y regresamos a las 16:00 hrs. Aprox. ', 'Ejecutamos el atractivo y desafiante ascenso a la cumbre del Volcán Villarrica, actividad que parte desde nuestra agencia a las 06:30 a.m. y regresamos a las 16:00 hrs. Aprox. \r\n\r\nRequisitos:\r\n\r\n• Llevar alimentación calórica\r\n• Gafas de sol\r\n• Ropa Sport (manga larga)\r\n• Protector solar\r\n\r\nIncluye:\r\n\r\n• Guías y asistentes Altamente profesionalizados\r\n• Zapatos de trekking y polainas\r\n• Crampones \r\n• Chaqueta y pantalón \r\n• Piolet\r\n• Casco\r\n• Guantes \r\n• Mochila\r\n• Transfer ida y vuelta al centro de Ski\r\n• Entrada al Parque Nacional Villarrica\r\n• Seguro de turismo aventura \r\n\r\nPrecios por persona:\r\n\r\n• $45.000', 'http://www.puconaventura.cl/uploads/1/ascenso_volcan.jpg', 'http://www.puconaventura.cl/uploads/1/ascenso_volcan.jpg', '', '1'),
(24, 1, 'cabalgata_mapuche', 'cabalgata_mapuche', 'cabalgata_mapuche', 'http://www.puconaventura.cl/uploads/1/cabalgata_mapuche.jpg', 'http://www.puconaventura.cl/uploads/1/cabalgata_mapuche.jpg', '', '1'),
(25, 1, 'Termas', 'Termas', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'http://www.puconaventura.cl/uploads/1/termas_geometricas.jpg', 'http://www.puconaventura.cl/uploads/1/termas_geometricas.jpg', '', '1'),
(26, 1, 'Canyoning', 'Canyoning Canyoning Canyoning Canyoning', '<p>Ejecutamos dos tramos del río Trancura (Trancura alto grado IV, y Trancura baj grado III).</p><h4>Requisitos:</h4><ul><li>Mayores de 8 años (Trancura bajo)</li><li>Muda de ropa liviana</li><li>Mayores de 14 años (Trancura alto)</li></ul><h4>Incluye:</h4><ul><li>Seguros de turismo aventura </li><li>Kayak de seguridad</li><li>Guía de rafting especializado</li><li>Equipo de río completo </li><li>Traslado ida y vuelta</li></ul><h4>Precios por persona: </h4><ul><li>Trancura bajo $15.000</li><li>Trancura alto $23.000</li></ul>', 'http://www.puconaventura.cl/uploads/1/canyoning.jpg', 'http://www.puconaventura.cl/uploads/1/canyoning.jpg', '', '1'),
(27, 2, 'Publicidad Interna', 'Publicidad Interna', '', 'imagenes/externa/6.png', '', '', '1'),
(28, 3, 'Publicidad externa', '', '', 'imagenes/externa/5.png', '', 'http://www.google.cl', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_clientes`
--

CREATE TABLE IF NOT EXISTS `TBL_CLIENTES` (
  `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(100) DEFAULT NULL,
  `ASUNTO` varchar(100) DEFAULT NULL,
  `COMENTARIO` varchar(5000) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  PRIMARY KEY (`ID_CLIENTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_imagen`
--

CREATE TABLE IF NOT EXISTS `TBL_IMAGEN` (
  `ID_IMAGEN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ACTIVIDAD` int(11) DEFAULT NULL,
  `URL_IMAGEN` varchar(300) DEFAULT NULL,
  `ES_PRINCIPAL` bit(1) DEFAULT NULL,
  PRIMARY KEY (`ID_IMAGEN`),
  KEY `FK_REFERENCE_2` (`ID_ACTIVIDAD`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tbl_imagen`
--

INSERT INTO `TBL_IMAGEN` (`ID_IMAGEN`, `ID_ACTIVIDAD`, `URL_IMAGEN`, `ES_PRINCIPAL`) VALUES
(9, 20, 'http://www.puconaventura.cl/uploads/1/geometricas1.jpg', '1'),
(10, 20, 'http://www.puconaventura.cl/uploads/1/IMAG0080.jpg', '0'),
(11, 25, 'http://www.puconaventura.cl/uploads/1/IMG_4122.jpg', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_actividad`
--

CREATE TABLE IF NOT EXISTS `TBL_TIPO_ACTIVIDAD` (
  `ID_TIPO_ACTIVIDAD` int(11) NOT NULL,
  `NOMBRE_TIPO_ATIVIDAD` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_TIPO_ACTIVIDAD`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tbl_tipo_actividad`
--

INSERT INTO `TBL_TIPO_ACTIVIDAD` (`ID_TIPO_ACTIVIDAD`, `NOMBRE_TIPO_ATIVIDAD`) VALUES
(1, 'Actividad'),
(2, 'Publicidad Interna'),
(3, 'Publicidad Externa');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_actividad`
--
ALTER TABLE `TBL_ACTIVIDAD`
  ADD CONSTRAINT `FK_REFERENCE_1` FOREIGN KEY (`ID_TIPO_ACTIVIDAD`) REFERENCES `TBL_TIPO_ACTIVIDAD` (`ID_TIPO_ACTIVIDAD`);

--
-- Filtros para la tabla `tbl_imagen`
--
ALTER TABLE `tbl_imagen`
  ADD CONSTRAINT `FK_REFERENCE_2` FOREIGN KEY (`ID_ACTIVIDAD`) REFERENCES `TBL_ACTIVIDAD` (`ID_ACTIVIDAD`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
