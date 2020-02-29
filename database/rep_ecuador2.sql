-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-02-2020 a las 08:07:40
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rep_ecuador2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizacion`
--

CREATE TABLE `actualizacion` (
  `ci_escolar` varchar(15) NOT NULL,
  `id_doc_admin` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `id_actualizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `actualizacion`
--

INSERT INTO `actualizacion` (`ci_escolar`, `id_doc_admin`, `fecha`, `id_actualizacion`) VALUES
('V01228117879', '28117206', '2020-01-12', 1),
('37888909', '28117206', '2020-01-14', 9),
('37888909', '28117206', '2020-01-14', 10),
('37888909', '28117206', '2020-01-14', 11),
('38999029', '28117206', '2020-01-14', 12),
('38999029', '28117206', '2020-01-17', 14),
('38999029', '28117206', '2020-01-17', 15),
('34999029', '28117206', '2020-01-18', 16),
('V01115888290', '28117206', '2020-02-03', 18),
('V01115888290', '28117206', '2020-02-03', 19),
('V01115888290', '28117206', '2020-02-03', 20),
('V01115888290', '28117206', '2020-02-03', 21),
('V01115888290', '28117206', '2020-02-03', 22),
('V01115888290', '28117206', '2020-02-03', 23),
('V01115888290', '28117206', '2020-02-03', 24),
('V01415888290', '28117206', '2020-02-03', 25),
('V01115888290', '28117206', '2020-02-12', 26),
('V01115888290', '28117206', '2020-02-12', 27),
('V01115888290', '28117206', '2020-02-12', 28),
('V01115888290', '28117206', '2020-02-12', 29),
('V01115888290', '28117206', '2020-02-12', 30),
('38999029', '28117206', '2020-02-12', 31),
('38999029', '28117206', '2020-02-12', 32),
('38999029', '28117206', '2020-02-12', 33),
('30852753', '28117206', '2020-02-12', 34),
('30852753', '28117206', '2020-02-12', 35),
('30852753', '28117206', '2020-02-12', 36),
('30852753', '28117206', '2020-02-12', 37),
('30852753', '28117206', '2020-02-12', 38),
('30852753', '28117206', '2020-02-12', 39),
('30852753', '28117206', '2020-02-12', 40),
('38299090', '28117206', '2020-02-15', 41),
('38299090', '28117206', '2020-02-15', 42),
('38299090', '28117206', '2020-02-15', 43),
('38999029', '28117206', '2020-02-16', 44),
('38999029', '28117206', '2020-02-16', 45),
('38999029', '28117206', '2020-02-16', 46),
('38999029', '28117206', '2020-02-16', 47),
('38999029', '28117206', '2020-02-16', 48),
('38999029', '28117206', '2020-02-16', 49),
('38999029', '28117206', '2020-02-16', 50),
('38999029', '28117206', '2020-02-16', 51),
('38999029', '28117206', '2020-02-16', 52),
('38999029', '28117206', '2020-02-16', 53),
('38999029', '28117206', '2020-02-16', 54),
('V01115888290', '28117206', '2020-02-16', 55),
('V01115888290', '28117206', '2020-02-16', 56),
('V01115888290', '28117206', '2020-02-16', 57),
('V01115888290', '28117206', '2020-02-16', 58),
('V01115888290', '28117206', '2020-02-16', 59),
('V01115888290', '28117206', '2020-02-16', 60),
('V01115888290', '28117206', '2020-02-16', 61),
('V01115888290', '28117206', '2020-02-16', 62),
('V01115888290', '28117206', '2020-02-16', 63),
('V01115888290', '28117206', '2020-02-16', 64),
('V01115888290', '28117206', '2020-02-16', 65),
('V01115888290', '28117206', '2020-02-16', 66),
('V01115888290', '28117206', '2020-02-16', 67),
('V01115888290', '28117206', '2020-02-16', 68),
('V01115888290', '28117206', '2020-02-16', 69),
('V01115888290', '28117206', '2020-02-16', 70),
('V01115888290', '28117206', '2020-02-16', 71),
('V01115888290', '28117206', '2020-02-16', 72),
('V01415888290', '28117206', '2020-02-16', 73),
('V01415888290', '28117206', '2020-02-16', 74),
('37888909', '28117206', '2020-02-16', 75),
('37888909', '28117206', '2020-02-16', 76),
('37888909', '28117206', '2020-02-17', 77),
('V01115888290', '28117206', '2020-02-17', 78),
('V01115888290', '28117206', '2020-02-17', 79),
('V01115888290', '28117206', '2020-02-17', 80),
('V01115888290', '28117206', '2020-02-17', 81),
('V01115888290', '28117206', '2020-02-17', 82),
('V01115888290', '28117206', '2020-02-17', 83),
('V01115888290', '28117206', '2020-02-17', 84),
('V0141822898', '28117206', '2020-02-18', 85),
('V0141822898', '28117206', '2020-02-18', 86),
('V0141822898', '28117206', '2020-02-18', 87),
('V0141822898', '28117206', '2020-02-18', 88),
('39290299', '28117206', '2020-02-19', 89);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE `administrativos` (
  `id_doc_admin` varchar(15) NOT NULL,
  `id_turno` int(1) NOT NULL,
  `id_area` int(1) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_inabilitacion` date NOT NULL,
  `id_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrativos`
--

INSERT INTO `administrativos` (`id_doc_admin`, `id_turno`, `id_area`, `fecha_ingreso`, `fecha_inabilitacion`, `id_estado`) VALUES
('17227227', 1, 2, '2020-01-16', '0000-00-00', 1),
('28117201', 1, 2, '2019-12-31', '0000-00-00', 1),
('28117206', 1, 1, '2010-03-26', '0000-00-00', 1),
('28117207', 2, 3, '2010-02-22', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio_escolar_actual`
--

CREATE TABLE `anio_escolar_actual` (
  `anio_escolar1` year(4) NOT NULL,
  `anio_escolar2` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `anio_escolar_actual`
--

INSERT INTO `anio_escolar_actual` (`anio_escolar1`, `anio_escolar2`) VALUES
(2019, 2020);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(2) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `descripcion`) VALUES
(1, 'Directiva'),
(2, 'Estadistica'),
(3, 'Pedagogica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id_clase` varchar(15) NOT NULL,
  `ci_escolar` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `asistente` tinyint(1) NOT NULL,
  `desc_falta` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id_clase` varchar(15) NOT NULL,
  `grado` int(1) NOT NULL,
  `seccion` varchar(1) NOT NULL,
  `anio_escolar1` varchar(4) NOT NULL,
  `anio_escolar2` varchar(4) NOT NULL,
  `no_aula` int(6) NOT NULL,
  `id_turno` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `grado`, `seccion`, `anio_escolar1`, `anio_escolar2`, `no_aula`, `id_turno`) VALUES
('1-A-2018-2019-1', 1, 'A', '2018', '2019', 23, 1),
('1-A-2019-2020-1', 1, 'A', '2019', '2020', 43, 1),
('2-C-2018-2019-1', 2, 'C', '2018', '2019', 45, 1),
('2-C-2019-2020-1', 2, 'C', '2019', '2020', 11, 1),
('4-A-2018-2019-1', 4, 'A', '2018', '2019', 21, 1),
('5-A-2019-2020-1', 5, 'A', '2019', '2020', 32, 1),
('6-A-2019-2020-1', 6, 'A', '2019', '2020', 12, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_asignadas`
--

CREATE TABLE `clases_asignadas` (
  `id_contrato_clase` int(11) NOT NULL,
  `id_estado` int(1) NOT NULL,
  `id_clase` varchar(15) NOT NULL,
  `id_doc_docent` varchar(15) NOT NULL,
  `id_funcion_docent` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases_asignadas`
--

INSERT INTO `clases_asignadas` (`id_contrato_clase`, `id_estado`, `id_clase`, `id_doc_docent`, `id_funcion_docent`) VALUES
(11, 1, '1-A-2018-2019-1', 'No asignado', 1),
(13, 1, '1-A-2018-2019-1', 'No asignado', 2),
(15, 2, '1-A-2018-2019-1', '28117200', 3),
(70, 1, '4-A-2018-2019-1', 'No asignado', 1),
(75, 1, '4-A-2018-2019-1', 'No asignado', 3),
(78, 1, '4-A-2018-2019-1', 'No asignado', 2),
(80, 2, '1-A-2018-2019-1', '28117206', 3),
(81, 1, '2-C-2018-2019-1', 'No asignado', 1),
(82, 1, '2-C-2018-2019-1', 'No asignado', 2),
(83, 1, '2-C-2018-2019-1', 'No Asignado', 3),
(85, 1, '1-A-2018-2019-1', 'No asignado', 3),
(86, 1, '6-A-2019-2020-1', 'No asignado', 1),
(87, 1, '6-A-2019-2020-1', 'No asignado', 2),
(88, 1, '6-A-2019-2020-1', 'No Asignado', 3),
(89, 1, '1-A-2019-2020-1', 'No asignado', 1),
(90, 1, '1-A-2019-2020-1', 'No asignado', 2),
(91, 1, '1-A-2019-2020-1', 'No Asignado', 3),
(92, 1, '5-A-2019-2020-1', '28117211', 1),
(93, 1, '5-A-2019-2020-1', 'No asignado', 2),
(94, 1, '5-A-2019-2020-1', 'No Asignado', 3),
(95, 1, '2-C-2019-2020-1', 'No asignado', 1),
(96, 1, '2-C-2019-2020-1', 'No asignado', 2),
(97, 1, '2-C-2019-2020-1', 'No Asignado', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_basic`
--

CREATE TABLE `contact_basic` (
  `id_doc` varchar(15) NOT NULL,
  `tlf_local` char(11) NOT NULL,
  `tlf_cel` char(11) NOT NULL,
  `tlf_emergecia` char(11) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contact_basic`
--

INSERT INTO `contact_basic` (`id_doc`, `tlf_local`, `tlf_cel`, `tlf_emergecia`, `correo`) VALUES
('12898767', '04122029091', '02392092912', '04129928922', 'freh23@gmail.com'),
('14338288', '0239229020', '04129929920', '0412999288', ''),
('15888290', '02392289901', '04167892399', '', 'maritz112@hotmail.com'),
('15951654', '02127894523', '04248527496', '', 'ana.m@gmail.com'),
('17227227', '02392992899', '04128828767', '', 'carla@outlook.com'),
('17228989', '04129902909', '02392902000', '', 'ncarl_m23@gmail.com'),
('17229090', '0239299093', '04129928922', '', 'alber_mata33@gmail.com'),
('17290111', '02392992200', '04129202900', '', 'alber_mart@gmail.com'),
('17889299', '02392203991', '04129902033', '', 'dan_fern@gmail.com'),
('18227889', '04129920023', '02392290022', '', ''),
('1822898', '04129282909', '0412992902', '', 'carla_d@gmail.com'),
('18229092', '02392902233', '04122237744', '', 'marr23@gmail.com'),
('18299090', '02392229989', '04122020933', '', 'andre333@gmail.com'),
('19220909', '04128889782', '02393282098', '', 'herr_nesto@outlook.com'),
('20119090', '04249890077', '023933398', '', 'elenis233@hotmail.com'),
('20199002', '0212003900', '02391092099', '', 'sandra782@gmail.com'),
('20199109', '02392992000', '04129929920', '04129928829', ''),
('28117201', '04122029012', '02392929022', '', 'nal@gmail.com'),
('28117206', '02390172334', '04120172922', '04129929299', 'newmanrodriguez1999@gmail.com'),
('28117207', '02393929982', '04129992777', '', 'maria112@gmail.com'),
('28117332', '04129292934', '02122889899', '', 'nadia33@gmail.com'),
('28117333', '04129292934', '02122889899', '', 'nadia33@gmail.com'),
('28122679', '04120203399', '20382228001', '', 'caral22@Gmail.com'),
('29117203', '02392229909', '04120299929', '', 'fer_m1@gmail.com'),
('5888956', '02390290927', '04129290290', '04267772878', ''),
('5930330', '02392030099', '04244404040', '0412999200', 'andr62@gmail.com'),
('6228999', '041299200', '04129292911', '0412929200', ''),
('7222908', '02392092908', '0412290000', '04129990909', 'ana1967@gmail.com'),
('7288890', '04129902909', '02392289900', '', 'corr_@gmail.com'),
('7289288', '02393892822', '0412882992', '0412922909', ''),
('Alberto', '02392292999', '0426020001', '', ''),
('Ernesto Berluis', '02392889821', '04129982890', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_doc_docent` varchar(15) NOT NULL,
  `id_funcion_predet` int(1) NOT NULL,
  `id_turno` int(1) NOT NULL,
  `id_estado` int(1) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_inabilitacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_doc_docent`, `id_funcion_predet`, `id_turno`, `id_estado`, `fecha_ingreso`, `fecha_inabilitacion`) VALUES
('28117200', 2, 1, 1, '1980-01-01', '0000-00-00'),
('28117201', 2, 2, 1, '2019-01-18', '0000-00-00'),
('28117206', 1, 1, 1, '2010-03-26', '0000-00-00'),
('28117207', 3, 1, 1, '2020-02-01', '0000-00-00'),
('28117208', 1, 1, 1, '2019-12-05', '0000-00-00'),
('29117203', 1, 1, 1, '2020-02-01', '0000-00-00'),
('No asignado', 1, 3, 1, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escolaridad`
--

CREATE TABLE `escolaridad` (
  `ci_escolar` varchar(15) NOT NULL,
  `grado` varchar(1) NOT NULL,
  `anio_escolar2` int(4) NOT NULL,
  `anio_escolar1` int(4) NOT NULL,
  `plantel_proced` varchar(50) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `calif_def` varchar(1) NOT NULL,
  `repitiente` tinyint(1) NOT NULL,
  `observs` varchar(200) NOT NULL,
  `id_escolaridad` int(11) NOT NULL,
  `id_actualizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `escolaridad`
--

INSERT INTO `escolaridad` (`ci_escolar`, `grado`, `anio_escolar2`, `anio_escolar1`, `plantel_proced`, `localidad`, `calif_def`, `repitiente`, `observs`, `id_escolaridad`, `id_actualizacion`) VALUES
('V01228117879', '4', 2019, 2018, 'U.E.N Francisco de Miranda', 'La paz', 'A', 1, 'Ninguna', 2, 1),
('37888909', '4', 2019, 2019, 'Escuela Andres Bello', 'Bellas Artes', 'A', 0, 'Ninguna', 6, 9),
('38999029', '1', 2019, 2018, 'U.E Fransico de Miranda', 'Petare', '', 0, '', 9, 15),
('34999029', '4', 2019, 2018, 'U.E Fransico de Miranda', 'Petare', '', 1, '', 10, 16),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 12, 19),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 13, 20),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 14, 21),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 15, 22),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 16, 23),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 17, 24),
('V01415888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 18, 25),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 19, 26),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 20, 27),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 21, 28),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 22, 29),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 23, 30),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', 'C', 1, '', 24, 31),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', 'C', 1, '', 25, 32),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', 'C', 1, 'Ninguna', 26, 33),
('30852753', '2', 2019, 2018, 'u.e francisco salias', 'montalban', '', 1, '', 27, 34),
('30852753', '2', 2019, 2018, 'u.e francisco salias', 'montalban', '', 1, '', 28, 35),
('30852753', '2', 2019, 2018, 'u.e francisco salias', 'montalban', '', 1, '', 29, 36),
('30852753', '2', 2019, 2018, 'u.e francisco salias', 'montalban', '', 1, '', 30, 37),
('30852753', '2', 2019, 2018, 'u.e francisco salias', 'montalban', '', 1, '', 31, 38),
('30852753', '2', 2019, 2018, 'u.e francisco salias', 'montalban', '', 1, '', 32, 39),
('30852753', '2', 2019, 2018, 'u.e francisco salias', 'montalban', '', 1, '', 33, 40),
('38299090', '1', 2020, 2019, 'U.E.N Leonardo Chirinos', 'Miranda, Charallave', '', 1, '', 34, 41),
('38299090', '1', 2020, 2019, 'U.E.N Leonardo Chirinos', 'Miranda, Charallave', '', 1, '', 35, 42),
('38299090', '1', 2020, 2019, 'U.E.N Leonardo Chirinos', 'Miranda, Charallave', '', 1, '', 36, 43),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 37, 44),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 38, 45),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 39, 46),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 40, 47),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 41, 48),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 42, 49),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 43, 50),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 44, 51),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 45, 52),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 46, 53),
('38999029', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 47, 54),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 48, 55),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 49, 57),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 50, 58),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 51, 59),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 52, 60),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 53, 61),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 54, 62),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 55, 63),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 56, 64),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 57, 65),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 58, 66),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 59, 67),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 60, 68),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 61, 69),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 62, 70),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 63, 71),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 64, 72),
('V01415888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 65, 73),
('V01415888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 66, 74),
('37888909', '1', 2019, 2018, 'Escuela Andres Bello', 'Bellas Artes', 'A', 0, 'Ninguna', 67, 75),
('37888909', '1', 2019, 2018, 'Escuela Andres Bello', 'Bellas Artes', 'A', 0, 'Ninguna', 68, 76),
('37888909', '1', 2019, 2018, 'Escuela Andres Bello', 'Bellas Artes', 'A', 0, 'Ninguna', 69, 77),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 70, 78),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 71, 79),
('V01115888290', '6', 2020, 2019, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 72, 80),
('V01115888290', '6', 2020, 2019, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 73, 81),
('V01115888290', '6', 2020, 2019, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 74, 82),
('V01115888290', '6', 2020, 2019, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 75, 83),
('V01115888290', '6', 2020, 2019, 'Kinder Simonicito', 'La Paz', '', 1, 'Ninguna', 76, 84),
('V0141822898', '1', 2020, 2019, 'Preescolar TEC', 'Av. Principal de El Cafetal', '', 1, '', 77, 85),
('V0141822898', '1', 2020, 2019, 'Preescolar TEC', 'Av. Principal de El Cafetal', '', 1, '', 78, 86),
('V0141822898', '1', 2020, 2019, 'Preescolar TEC', 'Av. Principal de El Cafetal', '', 1, '', 79, 87),
('V0141822898', '1', 2020, 2019, 'Preescolar TEC', 'Av. Principal de El Cafetal', '', 1, '', 80, 88),
('39290299', '5', 2020, 2019, 'U.E Andres Bello', 'Bellas Artes', '', 1, '', 81, 89);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(1) NOT NULL,
  `descripcion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `descripcion`) VALUES
(1, 'Habilitado'),
(2, 'Inalibitado'),
(3, 'Activo'),
(4, 'Irregular'),
(5, 'Retirado'),
(6, 'Graduado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `ci_escolar` varchar(15) NOT NULL,
  `id_doc` varchar(15) NOT NULL,
  `id_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`ci_escolar`, `id_doc`, `id_estado`) VALUES
('30852753', '30852753', 3),
('34999029', '34999029', 3),
('37888909', '37888909', 3),
('38299090', '38299090', 3),
('38999029', '38999029', 3),
('39290299', '39290299', 3),
('V01115888290', '38338381', 6),
('V01228117879', '', 3),
('V01415888290', '', 4),
('V0141822898', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes_asignados`
--

CREATE TABLE `estudiantes_asignados` (
  `ci_escolar` varchar(15) CHARACTER SET utf8 NOT NULL,
  `id_clase` varchar(15) CHARACTER SET utf8 NOT NULL,
  `id_estado` int(1) NOT NULL,
  `id_asignacion` int(11) NOT NULL,
  `id_actualizacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiantes_asignados`
--

INSERT INTO `estudiantes_asignados` (`ci_escolar`, `id_clase`, `id_estado`, `id_asignacion`, `id_actualizacion`) VALUES
('V01228117879', '4-A-2018-2019-1', 3, 3, 1),
('38999029', '1-A-2018-2019-1', 3, 4, 12),
('34999029', '4-A-2018-2019-1', 3, 5, 16),
('38999029', '1-A-2018-2019-1', 3, 6, 14),
('37888909', '1-A-2018-2019-1', 5, 7, 11),
('V01115888290', '1-A-2018-2019-1', 5, 14, 24),
('V01415888290', '1-A-2018-2019-1', 5, 15, 25),
('V01115888290', '1-A-2018-2019-1', 5, 16, 66),
('V01115888290', '1-A-2018-2019-1', 5, 17, 67),
('V01115888290', '1-A-2018-2019-1', 5, 18, 68),
('V01115888290', '1-A-2018-2019-1', 5, 19, 69),
('V01115888290', '1-A-2018-2019-1', 5, 20, 70),
('V01115888290', '1-A-2018-2019-1', 5, 21, 71),
('V01115888290', '1-A-2018-2019-1', 5, 22, 72),
('V01415888290', '1-A-2018-2019-1', 4, 23, 74),
('37888909', '1-A-2018-2019-1', 5, 24, 76),
('37888909', '1-A-2018-2019-1', 3, 25, 77),
('V01115888290', '1-A-2018-2019-1', 5, 26, 78),
('V01115888290', '1-A-2018-2019-1', 5, 27, 79),
('V01115888290', '6-A-2019-2020-1', 5, 28, 80),
('V01115888290', '6-A-2019-2020-1', 5, 29, 82),
('V01115888290', '6-A-2019-2020-1', 5, 30, 83),
('V01115888290', '6-A-2019-2020-1', 6, 31, 84),
('V0141822898', '1-A-2019-2020-1', 3, 32, 85),
('39290299', '5-A-2019-2020-1', 3, 33, 89);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_civil`
--

CREATE TABLE `est_civil` (
  `id_estado_civil` int(1) NOT NULL,
  `descrpcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `est_civil`
--

INSERT INTO `est_civil` (`id_estado_civil`, `descrpcion`) VALUES
(1, 'Soltero/a'),
(2, 'Casado/a'),
(3, 'Divordiado/a'),
(4, 'Viudo/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `familiar_estd`
--

CREATE TABLE `familiar_estd` (
  `ci_escolar` varchar(12) NOT NULL,
  `ci_escolar_famil` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones_docentes`
--

CREATE TABLE `funciones_docentes` (
  `id_funcion_docent` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `funciones_docentes`
--

INSERT INTO `funciones_docentes` (`id_funcion_docent`, `descripcion`) VALUES
(1, 'En Aula'),
(2, 'Educación Física'),
(3, 'Arte y Cultura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_personal`
--

CREATE TABLE `info_personal` (
  `id_doc` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido_p` varchar(20) NOT NULL,
  `apellido_m` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` varchar(100) NOT NULL,
  `direcc_hab` varchar(100) NOT NULL,
  `id_nacionalidad` int(1) NOT NULL,
  `id_estado_civil` int(1) NOT NULL,
  `id_sexo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info_personal`
--

INSERT INTO `info_personal` (`id_doc`, `nombre`, `apellido_p`, `apellido_m`, `fecha_nac`, `lugar_nac`, `direcc_hab`, `id_nacionalidad`, `id_estado_civil`, `id_sexo`) VALUES
('12898767', 'Carlos Jose', 'Guerra', 'Leal', '0000-00-00', '', '', 1, 2, 1),
('14338288', 'Luis David', 'Guera', 'Sanchez', '0000-00-00', '', '', 1, 1, 1),
('15888290', 'Maritza Herrada', 'Garcia', 'Alvarado', '1982-09-22', 'Miranda, Ocumare', 'Caracas, San Bernardino', 1, 3, 2),
('15951654', 'Ana Maria', 'Goncalves', 'Martinez', '1984-08-15', 'Caracas, maternidad, hospital maternidad', 'caracas, carapita, parte baja', 1, 1, 2),
('17227227', 'Fabiana', 'Melendes', 'Gonzales', '1989-02-01', 'Caracas', 'Caracas', 1, 1, 2),
('17228989', 'Carlos Miguel', 'Rodriguez', '', '1980-02-08', 'Caracas', 'Caracas', 1, 1, 1),
('17229090', 'Alberto Jose', 'Mata', 'Guerra', '1980-03-08', 'Buena Vista, Caracas - Sucre (este), Distrito Capital', 'Calle 5 Terrazas Del Avila 120, Tzas. Del Avila, Caracas - Sucre (norte), Distrito Capital', 1, 1, 1),
('17290111', 'Juan Alberto', 'Martinez', 'Prada', '1982-02-08', 'Caracas', 'Caracas', 1, 1, 1),
('17889299', 'Andreina ', 'Perez', 'Robles', '1990-03-28', 'Caracas', 'Caracas', 1, 1, 2),
('18227889', 'Francisco', 'Hernandez', '', '1992-01-30', 'Miranda', 'Miranda', 1, 1, 1),
('1822898', 'Carla Daniela', 'Robles', 'Mendoza', '1980-02-13', 'Aquamater, Maternidad Consciente\r\nCalle de Servicio Avenida R&iacute;o De Janeiro, Caracas, Venezuel', 'Av. Lecuna, Parque Central, Av. Lecuna, cerca de Parque Central', 1, 2, 2),
('18229092', 'Maria', 'Marrieta', 'Uzcategui', '2020-02-02', 'Caracas', 'Caracas', 1, 1, 2),
('18299090', 'Adreina Antonieta', 'Rodriguez', 'Ramos', '1992-02-22', 'Edo. Carabobo, Valencia', 'Caracas', 1, 1, 2),
('19220909', 'Ernesto ', 'Guerra', 'Oviedo', '1989-04-01', 'Caracas, Municipio Libertador', 'Caracas, La paz.', 1, 1, 1),
('20119090', 'Elena Maria', 'Espinoza', 'Ramos', '1990-11-09', 'Estado Carabobo Valencia.', 'Miranda, Petare', 1, 1, 2),
('20199002', 'Sandra Maria', 'Oviedo', 'Uzcategui', '1990-02-02', 'Dpto Capital, Municipio Libertador, Chacao', 'Dpto Capital, Municipio Libertador,El Paraiso', 1, 1, 2),
('20199109', 'Carlos Miguel', 'Jimenes', 'Robles', '0000-00-00', '', '', 1, 1, 1),
('28117201', 'Carlos Manuel', 'Uzcategui', '', '1999-01-16', 'Miranda Ocumare', 'Caracas, San Benardino', 1, 1, 1),
('28117206', 'Newman Louis', 'Rodriguez', 'Robles', '1980-01-02', 'Caracas San Martin, Maternidad Concepci&oacute;n Palacios', 'Miranda Cristobal Rojas Concepcion Palacios', 1, 1, 1),
('28117207', 'Maria Elena', 'Gonzales', '', '1980-02-05', 'Miranda, Los Teques', 'Miranda, Petare', 1, 1, 2),
('28117332', 'Fernanda Maria', 'Martines', '', '1980-01-22', 'Caracas', 'Caracas', 1, 2, 2),
('28117333', 'Diana Maria', 'Martines', '', '1980-01-22', 'Caracas', 'Caracas', 1, 2, 2),
('28122679', 'Carla', 'Jordan', 'Cardenal', '1995-07-30', 'Caracas', 'Caracas', 1, 4, 2),
('29117203', 'Fernanda Maria', 'Rodriguez', 'Perez', '1982-01-10', 'Caracas', 'Caracas', 1, 2, 2),
('30852753', 'Jhonny Manuel', 'Martinez', 'Gonzales', '2014-05-20', 'Caracas,  san martin, hospital militar', 'caracas, carapita, parte baja', 1, 1, 1),
('32020390', 'Andrea Mariella', 'Sanchez', 'Giordano', '2014-11-01', 'Italia, Roma', 'Caracas, Chacao', 2, 1, 2),
('34117208', 'Andres Enrique', 'Rodriguez', 'Murcia', '2010-11-01', 'Miranda, Los Teques', 'Miranda, Los Teques', 1, 1, 1),
('34999029', 'Juan Felipe', 'Rodriguez', '', '2008-01-19', 'Caracas', 'Caracas', 1, 1, 1),
('37888909', 'Jose Julian', 'Herrera', 'Espinoza', '2010-01-21', 'Caracas, Municipio Libertador.', 'Miranda, Petare.', 1, 1, 1),
('38299090', 'Fernando Jose', 'Rodriguez', '', '2010-02-06', 'Caracas', 'Caracas', 1, 1, 1),
('38873956', 'Pedro', 'Oviedo', 'Martinez', '2014-05-07', 'Miranda, Los Valles del tuy', 'Dpto Capital, Catia', 1, 1, 1),
('38938390', 'Calos Alexander', 'Hernandez', 'Aparicio', '2013-11-01', 'Cojedes, San Carlos.', 'Dpto Capital, La Candelaria', 1, 1, 1),
('38999029', 'Alexander Felipe', 'Rodriguez', '', '2010-01-19', 'Caracas', 'Miranda', 1, 0, 1),
('39029283', 'Angela Alessandra', 'Uzcategui', 'Rodrguez', '2014-11-08', 'Dpto Capital, San Martín', 'Dpto Capital, La Paz', 1, 1, 2),
('39290299', 'Yelitza Lorena', 'Marinez', 'Marrieta', '2010-02-20', 'Caracas, Distrito Federal', 'El Paraíso, Municipio Libertador', 1, 1, 2),
('5888956', 'Antonella', 'Rodriguez', 'Perez', '0000-00-00', '', '', 1, 2, 2),
('5930330', 'Andrea Francisca', 'Cardenal', 'Uzcategui', '1950-09-02', 'Caracas', 'Caracas', 1, 1, 2),
('6228999', 'Diego Jose', 'Martinez', 'Robles', '0000-00-00', '', '', 1, 1, 1),
('7222908', 'Ana Francisca', 'Fernandez', 'Ramos', '0000-00-00', '', '', 1, 2, 2),
('7288890', 'Rafael Alberto', 'Correa', '', '1980-01-31', 'Caracas', 'Caracas', 1, 1, 1),
('7289288', 'Marco Luis', 'Robles', 'Marquez', '0000-00-00', '', '', 1, 1, 1),
('Alberto', 'Gonzales', 'Prada', '1', '0000-00-00', '', '', 1, 2147483647, 0),
('Ernesto Berluis', 'Uzcategui', 'Alvarado', '1', '0000-00-00', '', '', 1, 2147483647, 0),
('Maria Angela', 'Herrera', 'Gonzales', '2', '0000-00-00', '', '', 1, 2147483647, 0),
('No asignado', '', '', '', '0000-00-00', '', '', 1, 1, 1),
('V01115888290', 'Fabiana Maria', 'Torrealba', 'Garcia', '2010-02-07', 'Caracas, Maternidad.', 'Caracas, Artigas.', 1, 0, 2),
('V01228117879', 'Luis Esteban', 'Hernandez', 'Oviedo', '2010-01-24', 'Dpto. Capital, Municipio Libertador, San Martin', 'Dpto. Capital, Municipio Libertador, El Paraiso', 1, 1, 1),
('V01415888290', 'Mario Jose', 'Torrealba', 'Garcia', '2014-02-08', 'Caracas, Maternidad.', 'Caracas, La Paz.', 1, 1, 2),
('V0141822898', 'Oriana Elena', 'Hernandez', 'Montalvan', '2014-02-07', 'Distrito Capital. Parroquia San Bernardino1​ del Municipio Libertador.', 'Av. Lecuna, Parque Central, Av. Lecuna, cerca de Parque Central', 1, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboral`
--

CREATE TABLE `laboral` (
  `id_doc` varchar(15) NOT NULL,
  `prof_ofic` varchar(30) NOT NULL,
  `lugar_trab` varchar(50) NOT NULL,
  `direcc_trab` varchar(80) NOT NULL,
  `tlf_ofic` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `laboral`
--

INSERT INTO `laboral` (`id_doc`, `prof_ofic`, `lugar_trab`, `direcc_trab`, `tlf_ofic`) VALUES
('12898767', '', '', '', ''),
('15888290', 'Acesora', 'Torre Provincial', 'AV Wolmer San Bernardino\r\nCaracas.', '02392992898'),
('15951654', 'Medicina', 'Hospital Magallanes', 'Caracas, catia, parte media', '04248527496'),
('17227227', '', '', '', ''),
('17228989', 'Mantenimiento Electrico', 'Inversiones Lux', 'Torre de parque central', '02392990900'),
('17229090', 'Lic. Administracion', 'Soporte SPI, C.A.', 'Centro Lido, Av Francisco de Miranda, Caracas.', '04129929099'),
('17290111', 'Albañil', 'A Domicilio', 'A Domicilio', '04129293200'),
('17889299', '', '', '', ''),
('18227889', '', '', '', ''),
('1822898', 'Ing, Informatica', 'SHAADES DIGITAL SERVICE,C.A', 'Caracas', '02392891918'),
('18229092', '', '', '', ''),
('18299090', 'Docente', 'Liceo Andres Bello', 'La Candelaria', '02399092987'),
('19220909', 'Obrero', 'Jardinero', 'Los Samanes', '02392909021'),
('20119090', 'Secretario', 'Edif. Los dos caminos', 'Los dos Caminos', '04129209298'),
('28117206', 'Docente', 'Rep&uacute;blica del Ecuador', 'Maternidad', '04129292200'),
('28117332', 'Maestra De kinder', 'Se&ntilde;ora de la Chiquinquir&aacute;', 'Caraca, La paz', '02392298982'),
('28117333', 'Maestra De kinder', 'Se&ntilde;ora de la Chiquinquir&aacute;', 'Caraca, La paz', '02243399922'),
('7288890', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movilidad`
--

CREATE TABLE `movilidad` (
  `ci_escolar` varchar(15) NOT NULL,
  `est_ret` tinyint(1) NOT NULL,
  `desc_ret` varchar(80) NOT NULL,
  `est_tranport` tinyint(1) NOT NULL,
  `desc_tranport` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movilidad`
--

INSERT INTO `movilidad` (`ci_escolar`, `est_ret`, `desc_ret`, `est_tranport`, `desc_tranport`) VALUES
('30852753', 0, '', 0, ''),
('34999029', 0, '', 0, ''),
('37888909', 0, '', 0, ''),
('38299090', 0, '', 0, ''),
('38999029', 0, '', 0, ''),
('39290299', 0, '', 0, ''),
('V01115888290', 0, '', 0, ''),
('V01228117879', 0, '', 1, 'Un trasporte pasa por el a las 12:00'),
('V01415888290', 0, '', 0, ''),
('V0141822898', 0, '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE `nacionalidad` (
  `id_nacionalidad` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`id_nacionalidad`, `descripcion`) VALUES
(1, 'Venezolano/a'),
(2, 'Extrangero/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `otros_datos_estudiant`
--

CREATE TABLE `otros_datos_estudiant` (
  `ci_escolar` varchar(15) NOT NULL,
  `nro_pers_viven` int(2) NOT NULL,
  `hermanos` tinyint(1) NOT NULL,
  `descrip_hermanos` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `otros_datos_estudiant`
--

INSERT INTO `otros_datos_estudiant` (`ci_escolar`, `nro_pers_viven`, `hermanos`, `descrip_hermanos`) VALUES
('30852753', 2, 0, ''),
('34999029', 2, 1, '38999029'),
('37888909', 3, 0, ''),
('38299090', 2, 0, ''),
('38999029', 2, 0, ''),
('39290299', 2, 0, ''),
('V01115888290', 4, 0, ''),
('V01228117879', 4, 0, ''),
('V01415888290', 4, 0, ''),
('V0141822898', 2, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `id_doc` varchar(15) NOT NULL,
  `id_tip_padre` int(1) NOT NULL,
  `ci_escolar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`id_doc`, `id_tip_padre`, `ci_escolar`) VALUES
('15888290', 1, 'V01115888290'),
('15888290', 1, 'V01415888290'),
('15951654', 1, '30852753'),
('17228989', 2, '38299090'),
('17229090', 2, '38999029'),
('17290111', 2, '39290299'),
('17889299', 1, '38299090'),
('18227889', 2, 'V01228117879'),
('1822898', 1, 'V0141822898'),
('18229092', 1, '39290299'),
('18299090', 1, '38999029'),
('19220909', 2, '37888909'),
('19220909', 2, 'V01115888290'),
('19220909', 2, 'V01415888290'),
('20119090', 1, '37888909'),
('20199002', 1, 'V01228117879');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pers_est`
--

CREATE TABLE `pers_est` (
  `ci_escolar` varchar(15) NOT NULL,
  `id_doc` varchar(15) NOT NULL,
  `convivencia` tinyint(1) NOT NULL,
  `ocupacion` varchar(30) NOT NULL,
  `parentesco` varchar(30) NOT NULL,
  `id_pers_est` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pers_est`
--

INSERT INTO `pers_est` (`ci_escolar`, `id_doc`, `convivencia`, `ocupacion`, `parentesco`, `id_pers_est`) VALUES
('V01228117879', '7222908', 1, 'Ama de Casa', 'Abuela', 4),
('V01228117879', '20199002', 1, 'Ama de Casa', 'Madre', 18),
('V01228117879', '12898767', 0, '', 'Tio', 21),
('37888909', '19220909', 0, 'Obrero', 'Padre', 44),
('37888909', '15992209', 0, '', 'Primo', 45),
('37888909', '20119090', 0, 'Jardinero', 'Padre', 58),
('38999029', '18299090', 1, 'Docente', 'Madre', 59),
('34999029', '18299090', 1, 'Docente', 'Madre', 63),
('34999029', '5888956', 0, '', 'Tia', 64),
('V01115888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 67),
('V01115888290', '19220909', 0, 'Obrero', 'Padre', 68),
('V01115888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 70),
('V01115888290', '19220909', 0, 'Obrero', 'Padre', 71),
('V01115888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 72),
('V01115888290', '19220909', 0, 'Obrero', 'Padre', 73),
('V01115888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 75),
('V01115888290', '19220909', 0, 'Obrero', 'Padre', 76),
('V01115888290', '12898767', 0, '', 'Primo', 77),
('V01115888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 78),
('V01115888290', '19220909', 0, 'Obrero', 'Padre', 79),
('V01115888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 81),
('V01115888290', '19220909', 0, 'Obrero', 'Padre', 82),
('V01115888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 84),
('V01115888290', '19220909', 0, 'Obrero', 'Padre', 85),
('V01115888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 87),
('V01115888290', '19220909', 0, 'Obrero', 'Padre', 88),
('V01415888290', '15888290', 1, 'Lic. Administraci&oacute;n', 'Madre', 90),
('V01415888290', '19220909', 1, 'Obrero', 'Padre', 91),
('38999029', '18299090', 1, 'Docente', 'Madre', 93),
('38999029', '7222908', 0, '', 'Tia', 95),
('30852753', '15951654', 1, 'Doctora cardiovascular', 'Madre', 96),
('30852753', '15951654', 1, 'Doctora cardiovascular', 'Madre', 98),
('30852753', '28456851', 0, '', 'primo', 99),
('30852753', '15951654', 1, 'Doctora cardiovascular', 'Madre', 100),
('30852753', '28456851', 0, '', 'primo', 101),
('30852753', '15951654', 1, 'Doctora cardiovascular', 'Madre', 102),
('30852753', '28456851', 0, '', 'primo', 103),
('30852753', '15951654', 1, 'Doctora cardiovascular', 'Madre', 104),
('30852753', '28456851', 0, '', 'primo', 105),
('30852753', '15951654', 1, 'Doctora cardiovascular', 'Madre', 106),
('30852753', '28456851', 0, '', 'primo', 107),
('30852753', '15951654', 1, 'Doctora cardiovascular', 'Madre', 108),
('V01415888290', '5930330', 0, '', 'Abuela', 110),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 113),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 114),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 115),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 116),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 117),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 118),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 119),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 120),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 121),
('V01115888290', '7288890', 0, 'Jubilado', 'Abuelo', 122),
('V01228117879', '18227889', 1, 'Arquitecto', 'Padre', 123),
('V01228117879', '18227889', 1, 'Arquitecto', 'Padre', 124),
('38299090', '17228989', 1, 'Ing. Electrico', 'Padre', 125),
('38299090', '17228989', 1, 'Ing. Electrico', 'Padre', 126),
('38299090', '13288090', 0, '', 'Tio', 127),
('38299090', '17228989', 1, 'Ing. Electrico', 'Padre', 128),
('38299090', '13288090', 0, '', 'Tio', 129),
('38299090', '17889299', 1, 'Ama de Casa', 'Madre', 130),
('38299090', '17889299', 1, 'Ama de Casa', 'Madre', 131),
('38299090', '17889299', 1, 'Ama de Casa', 'Madre', 132),
('38299090', '17889299', 1, 'Ama de Casa', 'Madre', 133),
('38299090', '17889299', 1, 'Ama de Casa', 'Madre', 134),
('38999029', '18299090', 1, 'Docente', 'Madre', 135),
('38999029', '18299090', 1, 'Docente', 'Madre', 136),
('38999029', '18299090', 1, 'Docente', 'Madre', 137),
('38999029', '18299090', 1, 'Docente', 'Madre', 138),
('38999029', '18299090', 1, 'Docente', 'Madre', 139),
('38999029', '18299090', 1, 'Docente', 'Madre', 140),
('38999029', '18299090', 1, 'Docente', 'Madre', 141),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 143),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 144),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 145),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 146),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 147),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 148),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 149),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 150),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 151),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 152),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 153),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 154),
('38999029', '17229090', 1, 'Lic. Administracion', 'Padre', 155),
('38999029', '28117206', 1, 'Docente', '', 156),
('38299090', '17228989', 0, '', '', 157),
('38299090', '17228989', 0, '', '', 158),
('38999029', '12898767', 0, '', 'Primo', 161),
('38299090', '12898767', 0, '', 'Tio', 162),
('38299090', '20199109', 0, '', 'Hermano', 163),
('38299090', '20199109', 0, '', 'Hermano', 164),
('38299090', '20199109', 0, '', 'Hermano', 165),
('38299090', '20199109', 0, '', 'Hermano', 166),
('38299090', '20199109', 0, '', 'Hermano', 167),
('38299090', '20199109', 0, '', 'Hermano', 168),
('38299090', '20199109', 0, '', 'Hermano', 169),
('38299090', '28117206', 0, 'Docente', 'Amigo de la Familia', 170),
('38299090', '12898767', 0, '', 'Tio', 171),
('38299090', '12898767', 0, '', '', 172),
('38299090', '12898767', 0, '', 'Abuelo', 173),
('37888909', '28117206', 0, 'Docente', 'Abuelo', 174),
('V01415888290', '28117206', 0, 'Docente', 'Tio', 175),
('V01115888290', '17227227', 0, '', 'Tia', 176),
('V01115888290', '28117206', 1, 'Docente', 'Hermano', 177),
('V01115888290', '28117206', 1, 'Docente', 'Hermano', 178),
('V01115888290', '28117206', 1, 'Docente', 'Hermano', 179),
('V01115888290', '28117206', 1, 'Docente', 'Hermano', 180),
('V01115888290', '12898767', 0, 'Ing. Electrico', 'Primo', 181),
('V01115888290', '14338288', 0, '', 'Tio', 182),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 183),
('V0141822898', '7289288', 0, '', 'Abuelo', 184),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 185),
('V0141822898', '7289288', 0, '', 'Abuelo', 186),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 187),
('V0141822898', '7289288', 0, '', 'Abuelo', 188),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 189),
('V0141822898', '7289288', 0, '', 'Abuelo', 190),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 191),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 192),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 193),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 194),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 195),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 196),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 197),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 198),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 199),
('V0141822898', '1822898', 1, 'Ing, Informatica', 'Madre', 200),
('V0141822898', '17889299', 0, '', 'Tia', 201),
('V0141822898', '28117206', 1, 'Docente', 'Tio', 202),
('39290299', '18229092', 1, 'Ama de Casa', 'Madre', 203),
('39290299', '17290111', 1, 'Albañil', 'Padre', 204),
('39290299', '12898767', 1, '', 'Tio', 205),
('39290299', '6228999', 0, '', 'Abuelo', 206);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pers_retirar`
--

CREATE TABLE `pers_retirar` (
  `id_doc` varchar(15) NOT NULL,
  `ci_escolar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pers_retirar`
--

INSERT INTO `pers_retirar` (`id_doc`, `ci_escolar`) VALUES
('12898767', '38299090'),
('14338288', 'V01115888290'),
('28117206', 'V01415888290'),
('5888956', '34999029'),
('6228999', '39290299'),
('7289288', 'V0141822898');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantillas`
--

CREATE TABLE `plantillas` (
  `id_planilla` int(11) NOT NULL,
  `tipo_planilla` varchar(50) NOT NULL,
  `descripción` varchar(50) NOT NULL,
  `ruta` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_disponible`
--

CREATE TABLE `preguntas_disponible` (
  `id_pregunta` int(1) NOT NULL,
  `nombre_pregunta` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas_disponible`
--

INSERT INTO `preguntas_disponible` (`id_pregunta`, `nombre_pregunta`) VALUES
(1, '¿Cual es su artista favorito?'),
(2, '¿Cual es el nombre de su primera mascota?');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_usuarios`
--

CREATE TABLE `preguntas_usuarios` (
  `id_usr` varchar(15) CHARACTER SET utf8 NOT NULL,
  `id_pregunta` int(1) NOT NULL,
  `respuesta` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `preguntas_usuarios`
--

INSERT INTO `preguntas_usuarios` (`id_usr`, `id_pregunta`, `respuesta`) VALUES
('28117206', 1, 'da Vinci'),
('28117206', 2, 'roko');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recursos_public`
--

CREATE TABLE `recursos_public` (
  `ci_escolar` varchar(15) NOT NULL,
  `colecc_bicent` tinyint(1) NOT NULL,
  `canaima` tinyint(1) NOT NULL,
  `contrato` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `recursos_public`
--

INSERT INTO `recursos_public` (`ci_escolar`, `colecc_bicent`, `canaima`, `contrato`) VALUES
('30852753', 0, 0, ''),
('32020390', 1, 1, 'HAJ123A'),
('34999029', 1, 0, ''),
('37888909', 1, 1, 'bjku121g'),
('38299090', 0, 0, ''),
('38999029', 1, 1, '23DS23L'),
('39290299', 0, 1, '128A90S'),
('V01115888290', 1, 1, 'Ass223S'),
('V01228117879', 1, 0, ''),
('V01415888290', 1, 0, ''),
('V0141822898', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representantes`
--

CREATE TABLE `representantes` (
  `id_doc` varchar(15) NOT NULL,
  `ci_escolar` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `representantes`
--

INSERT INTO `representantes` (`id_doc`, `ci_escolar`) VALUES
('12898767', '38299090'),
('12898767', '39290299'),
('15888290', 'V01115888290'),
('18227889', 'V01228117879'),
('18299090', '34999029'),
('19220909', '37888909'),
('28117206', 'V0141822898'),
('5930330', 'V01415888290');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salud`
--

CREATE TABLE `salud` (
  `ci_escolar` varchar(15) NOT NULL,
  `est_croni` tinyint(1) NOT NULL,
  `desc_croni` varchar(150) NOT NULL,
  `est_visual` tinyint(1) NOT NULL,
  `desc_visual` varchar(150) NOT NULL,
  `est_auditivo` tinyint(1) NOT NULL,
  `desc_auditivo` varchar(150) NOT NULL,
  `est_alergia` tinyint(1) NOT NULL,
  `desc_alergia` varchar(150) NOT NULL,
  `est_condic_esp` tinyint(1) NOT NULL,
  `desc_condic_esp` varchar(150) NOT NULL,
  `est_vacuna` tinyint(1) NOT NULL,
  `desc_vacuna` varchar(150) NOT NULL,
  `desc_psicopeda` varchar(150) NOT NULL,
  `desc_psicolo` varchar(150) NOT NULL,
  `desc_ter_lenguaje` varchar(150) NOT NULL,
  `otras_condic` varchar(60) NOT NULL,
  `desc_otras` varchar(150) NOT NULL,
  `desc_medicacion` varchar(150) NOT NULL,
  `est_medicacion` tinyint(1) NOT NULL,
  `anex_inform` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salud`
--

INSERT INTO `salud` (`ci_escolar`, `est_croni`, `desc_croni`, `est_visual`, `desc_visual`, `est_auditivo`, `desc_auditivo`, `est_alergia`, `desc_alergia`, `est_condic_esp`, `desc_condic_esp`, `est_vacuna`, `desc_vacuna`, `desc_psicopeda`, `desc_psicolo`, `desc_ter_lenguaje`, `otras_condic`, `desc_otras`, `desc_medicacion`, `est_medicacion`, `anex_inform`) VALUES
('30852753', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'Malaria', '', '', '', '', '', '', 0, 0),
('34999029', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'Malaria', '', '', '', '', '', '', 0, 0),
('37888909', 0, '', 1, 'Antigmatismo', 0, '', 0, '', 0, '', 1, 'Tetano', '0', '', '0', '', '', '', 0, 0),
('38299090', 0, '', 1, 'Antigmatismo', 0, '', 0, '', 0, '', 0, '', '', '', '', '', '', '', 0, 0),
('38999029', 0, '', 1, 'Miopia', 0, '', 1, 'Camarones\r\n', 0, '', 1, 'Malaria', 'psico', 'ayax', 'buena', '', '', '', 0, 0),
('39290299', 0, '', 0, '', 0, '', 1, 'Almendras', 0, '', 1, 'hepatitis B, difteria, tétanos, tosferina, polio, la bacteria Haemophilus influenzae tipo b, meningococo C, neumococo, sarampión', '', '', '', '', '', '', 0, 0),
('V01115888290', 0, '', 0, '', 0, '', 1, 'Almendras', 0, '', 1, 'Difteria\r\nTetano', 'Si', '', '', '', '', 'Loratadine', 1, 0),
('V01228117879', 0, '', 0, '', 0, '', 1, 'Al polen', 0, '', 1, 'Difteria\r\nTetano', '', '', '', '', '', '', 0, 0),
('V01415888290', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'Difteria\r\nTetano', '', '', '', '', '', '', 0, 0),
('V0141822898', 0, '', 0, '', 1, 'Hipoacusia', 0, '', 0, '', 1, 'hepatitis B, difteria, tétanos, tosferina, polio, la bacteria Haemophilus influenzae tipo b, meningococo C, neumococo, sarampión, rubeola y paperas (p', '', '', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `descripcion`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_padres`
--

CREATE TABLE `tipos_padres` (
  `id_tip_padre` int(1) NOT NULL,
  `descripcion` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_padres`
--

INSERT INTO `tipos_padres` (`id_tip_padre`, `descripcion`) VALUES
(1, 'Madre'),
(2, 'Padre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tip_user`
--

CREATE TABLE `tip_user` (
  `id_tip_usr` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tip_user`
--

INSERT INTO `tip_user` (`id_tip_usr`, `descripcion`) VALUES
(0, 'Inabilitado'),
(1, 'Administrador'),
(2, 'Normal'),
(3, 'Invitado'),
(4, 'Prueba');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `id_turno` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turno`, `descripcion`) VALUES
(1, 'Mañana'),
(2, 'Tarde'),
(3, 'Bolivariano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_doc` varchar(15) NOT NULL,
  `id_tip_usr` int(1) NOT NULL,
  `pass` varchar(130) NOT NULL,
  `ult_sesion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_doc`, `id_tip_usr`, `pass`, `ult_sesion`) VALUES
('28117206', 1, '$2y$10$Lxtss41k7zB.xWVkGoz.NOSnMAKCCUV6AsbAnaMxbHJ2SBz84C9wi', '2020-02-18');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizacion`
--
ALTER TABLE `actualizacion`
  ADD PRIMARY KEY (`id_actualizacion`),
  ADD KEY `ci_escolar` (`ci_escolar`),
  ADD KEY `id_doc_admin` (`id_doc_admin`);

--
-- Indices de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`id_doc_admin`),
  ADD KEY `id_doc_admin` (`id_doc_admin`),
  ADD KEY `id_turno` (`id_turno`),
  ADD KEY `id_area` (`id_area`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `anio_escolar_actual`
--
ALTER TABLE `anio_escolar_actual`
  ADD PRIMARY KEY (`anio_escolar1`,`anio_escolar2`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`id_clase`,`fecha`),
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id_clase`),
  ADD KEY `id_turno` (`id_turno`);

--
-- Indices de la tabla `clases_asignadas`
--
ALTER TABLE `clases_asignadas`
  ADD PRIMARY KEY (`id_contrato_clase`),
  ADD KEY `id_doc_docent` (`id_doc_docent`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_tipo_docent` (`id_funcion_docent`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `contact_basic`
--
ALTER TABLE `contact_basic`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `id_doc` (`id_doc`) USING BTREE;

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_doc_docent`),
  ADD KEY `docentes` (`id_funcion_predet`),
  ADD KEY `id_turno` (`id_turno`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
  ADD PRIMARY KEY (`id_escolaridad`),
  ADD KEY `ci_escolar` (`ci_escolar`),
  ADD KEY `id_actualizacion` (`id_actualizacion`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`ci_escolar`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `estudiantes_asignados`
--
ALTER TABLE `estudiantes_asignados`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `ci_escolar` (`ci_escolar`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_actualizacion` (`id_actualizacion`);

--
-- Indices de la tabla `est_civil`
--
ALTER TABLE `est_civil`
  ADD PRIMARY KEY (`id_estado_civil`);

--
-- Indices de la tabla `familiar_estd`
--
ALTER TABLE `familiar_estd`
  ADD PRIMARY KEY (`ci_escolar_famil`),
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `funciones_docentes`
--
ALTER TABLE `funciones_docentes`
  ADD PRIMARY KEY (`id_funcion_docent`);

--
-- Indices de la tabla `info_personal`
--
ALTER TABLE `info_personal`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `id_nacionalidad` (`id_nacionalidad`),
  ADD KEY `id_estado_civil` (`id_estado_civil`),
  ADD KEY `id_sexo` (`id_sexo`);

--
-- Indices de la tabla `laboral`
--
ALTER TABLE `laboral`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD PRIMARY KEY (`ci_escolar`),
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`id_nacionalidad`);

--
-- Indices de la tabla `otros_datos_estudiant`
--
ALTER TABLE `otros_datos_estudiant`
  ADD PRIMARY KEY (`ci_escolar`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id_doc`,`id_tip_padre`,`ci_escolar`),
  ADD KEY `id_tip_padre` (`id_tip_padre`),
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `pers_est`
--
ALTER TABLE `pers_est`
  ADD PRIMARY KEY (`id_pers_est`),
  ADD KEY `ci_escolar` (`ci_escolar`),
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `pers_retirar`
--
ALTER TABLE `pers_retirar`
  ADD PRIMARY KEY (`id_doc`,`ci_escolar`),
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD PRIMARY KEY (`id_planilla`);

--
-- Indices de la tabla `preguntas_disponible`
--
ALTER TABLE `preguntas_disponible`
  ADD PRIMARY KEY (`id_pregunta`);

--
-- Indices de la tabla `preguntas_usuarios`
--
ALTER TABLE `preguntas_usuarios`
  ADD PRIMARY KEY (`id_pregunta`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `recursos_public`
--
ALTER TABLE `recursos_public`
  ADD PRIMARY KEY (`ci_escolar`),
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD PRIMARY KEY (`id_doc`,`ci_escolar`),
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `salud`
--
ALTER TABLE `salud`
  ADD PRIMARY KEY (`ci_escolar`),
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipos_padres`
--
ALTER TABLE `tipos_padres`
  ADD PRIMARY KEY (`id_tip_padre`);

--
-- Indices de la tabla `tip_user`
--
ALTER TABLE `tip_user`
  ADD PRIMARY KEY (`id_tip_usr`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`id_turno`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `id_tip_usr` (`id_tip_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actualizacion`
--
ALTER TABLE `actualizacion`
  MODIFY `id_actualizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `clases_asignadas`
--
ALTER TABLE `clases_asignadas`
  MODIFY `id_contrato_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
  MODIFY `id_escolaridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `estudiantes_asignados`
--
ALTER TABLE `estudiantes_asignados`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `pers_est`
--
ALTER TABLE `pers_est`
  MODIFY `id_pers_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  MODIFY `id_planilla` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actualizacion`
--
ALTER TABLE `actualizacion`
  ADD CONSTRAINT `actualizacion_ibfk_2` FOREIGN KEY (`id_doc_admin`) REFERENCES `administrativos` (`id_doc_admin`),
  ADD CONSTRAINT `actualizacion_ibfk_3` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD CONSTRAINT `administrativos_ibfk_1` FOREIGN KEY (`id_area`) REFERENCES `areas` (`id_area`),
  ADD CONSTRAINT `administrativos_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `administrativos_ibfk_3` FOREIGN KEY (`id_doc_admin`) REFERENCES `info_personal` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  ADD CONSTRAINT `asistencias_ibfk_2` FOREIGN KEY (`ci_escolar`) REFERENCES `escolaridad` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`),
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`),
  ADD CONSTRAINT `clases_ibfk_3` FOREIGN KEY (`id_clase`) REFERENCES `clases_asignadas` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clases_asignadas`
--
ALTER TABLE `clases_asignadas`
  ADD CONSTRAINT `clases_asignadas_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  ADD CONSTRAINT `clases_asignadas_ibfk_2` FOREIGN KEY (`id_funcion_docent`) REFERENCES `funciones_docentes` (`id_funcion_docent`),
  ADD CONSTRAINT `clases_asignadas_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `clases_asignadas_ibfk_4` FOREIGN KEY (`id_doc_docent`) REFERENCES `docentes` (`id_doc_docent`);

--
-- Filtros para la tabla `contact_basic`
--
ALTER TABLE `contact_basic`
  ADD CONSTRAINT `contact_basic_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `info_personal` (`id_doc`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`);

--
-- Filtros para la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
  ADD CONSTRAINT `escolaridad_ibfk_1` FOREIGN KEY (`id_actualizacion`) REFERENCES `actualizacion` (`id_actualizacion`),
  ADD CONSTRAINT `escolaridad_ibfk_2` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `recursos_public` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes_asignados`
--
ALTER TABLE `estudiantes_asignados`
  ADD CONSTRAINT `estudiantes_asignados_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_asignados_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_asignados_ibfk_3` FOREIGN KEY (`id_actualizacion`) REFERENCES `actualizacion` (`id_actualizacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_asignados_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `familiar_estd`
--
ALTER TABLE `familiar_estd`
  ADD CONSTRAINT `familiar_estd_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `escolaridad` (`ci_escolar`),
  ADD CONSTRAINT `familiar_estd_ibfk_2` FOREIGN KEY (`ci_escolar_famil`) REFERENCES `escolaridad` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `funciones_docentes`
--
ALTER TABLE `funciones_docentes`
  ADD CONSTRAINT `funciones_docentes_ibfk_1` FOREIGN KEY (`id_funcion_docent`) REFERENCES `docentes` (`id_funcion_predet`);

--
-- Filtros para la tabla `info_personal`
--
ALTER TABLE `info_personal`
  ADD CONSTRAINT `info_personal_ibfk_1` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`),
  ADD CONSTRAINT `info_personal_ibfk_2` FOREIGN KEY (`id_estado_civil`) REFERENCES `est_civil` (`id_estado_civil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `info_personal_ibfk_3` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`);

--
-- Filtros para la tabla `laboral`
--
ALTER TABLE `laboral`
  ADD CONSTRAINT `laboral_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `info_personal` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD CONSTRAINT `movilidad_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `otros_datos_estudiant`
--
ALTER TABLE `otros_datos_estudiant`
  ADD CONSTRAINT `otros_datos_estudiant_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `padres_ibfk_1` FOREIGN KEY (`id_tip_padre`) REFERENCES `tipos_padres` (`id_tip_padre`);

--
-- Filtros para la tabla `pers_est`
--
ALTER TABLE `pers_est`
  ADD CONSTRAINT `pers_est_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pers_est_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `info_personal` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pers_retirar`
--
ALTER TABLE `pers_retirar`
  ADD CONSTRAINT `pers_retirar_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `pers_est` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pers_retirar_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `pers_est` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas_disponible`
--
ALTER TABLE `preguntas_disponible`
  ADD CONSTRAINT `preguntas_disponible_ibfk_1` FOREIGN KEY (`id_pregunta`) REFERENCES `preguntas_usuarios` (`id_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas_usuarios`
--
ALTER TABLE `preguntas_usuarios`
  ADD CONSTRAINT `preguntas_usuarios_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `pers_est` (`id_doc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `representantes_ibfk_2` FOREIGN KEY (`ci_escolar`) REFERENCES `pers_est` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `salud`
--
ALTER TABLE `salud`
  ADD CONSTRAINT `salud_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `preguntas_usuarios` (`id_usr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_tip_usr`) REFERENCES `tip_user` (`id_tip_usr`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
