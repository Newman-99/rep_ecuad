-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 04-02-2020 a las 04:28:29
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
('38873956', '28117201', '2020-02-11', 17),
('V01115888290', '28117206', '2020-02-03', 18),
('V01115888290', '28117206', '2020-02-03', 19),
('V01115888290', '28117206', '2020-02-03', 20),
('V01115888290', '28117206', '2020-02-03', 21),
('V01115888290', '28117206', '2020-02-03', 22),
('V01115888290', '28117206', '2020-02-03', 23),
('V01115888290', '28117206', '2020-02-03', 24),
('V01415888290', '28117206', '2020-02-03', 25);

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
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `ci_escolar` varchar(15) NOT NULL,
  `id_clase` varchar(15) NOT NULL,
  `id_doc_docent` varchar(15) NOT NULL,
  `nota_per` varchar(1) NOT NULL,
  `nota_acum` varchar(1) NOT NULL,
  `observs` varchar(200) NOT NULL,
  `periodo` int(1) NOT NULL
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
('1-A-2018-2019-1', 1, 'A', '2018', '2019', 12, 1),
('2-C-2018-2019-1', 2, 'C', '2018', '2019', 45, 1),
('4-A-2018-2019-1', 4, 'A', '2018', '2019', 21, 1);

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
(80, 1, '1-A-2018-2019-1', '28117206', 3),
(81, 1, '2-C-2018-2019-1', 'No asignado', 1),
(82, 1, '2-C-2018-2019-1', 'No asignado', 2),
(83, 1, '2-C-2018-2019-1', 'No Asignado', 3);

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
('', '', '', '', ''),
('12898767', '04122029099', '02392092911', '', ''),
('15888290', '02392289909', '04129929022', '', 'maritz112@hotmail.com'),
('15992209', '02392292999', '0426020001', '', ''),
('17227227', '02392992899', '04128828767', '', 'carla@outlook.com'),
('18299090', '02392229989', '04122020933', '', 'andre333@gmail.com'),
('19220909', '04128889787', '02393282099', '', 'herr_nesto@outlook.com'),
('20119090', '04249890077', '023933398', '', 'elenis233@hotmail.com'),
('20199002', '0212003900', '02391092099', '', 'sandra782@gmail.com'),
('28117201', '04122029012', '02392929022', '', 'nal@gmail.com'),
('28117206', '02390172334', '04120172922', '', 'newmanrodriguez1999@gmail.com'),
('28117207', '02393929982', '04129992777', '', 'maria112@gmail.com'),
('28117332', '04129292934', '02122889899', '', 'nadia33@gmail.com'),
('28117333', '04129292934', '02122889899', '', 'nadia33@gmail.com'),
('28122679', '04120203399', '20382228001', '', 'caral22@Gmail.com'),
('28127209', '02392889822', '04129982890', '04128827822', ''),
('29117203', '02392229909', '04120299929', '', 'fer_m1@gmail.com'),
('5888956', '02390290927', '04129290290', '04267772878', ''),
('5930330', '02392030099', '04244404040', '', 'andr62@gmail.com'),
('7222908', '02392092908', '0412290000', '', 'ana1967@gmail.com');

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
('28117201', 1, 2, 1, '2019-01-18', '0000-00-00'),
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
('38873956', '2', 2018, 2019, 'U.E.N Francisco de Miranda', 'La Paz', 'A', 0, '', 11, 17),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 12, 19),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 13, 20),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 14, 21),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 15, 22),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 16, 23),
('V01115888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 17, 24),
('V01415888290', '1', 2019, 2018, 'Kinder Simonicito', 'Artigas', '', 1, '', 18, 25);

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
(6, 'Transferido');

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
('34999029', '34999029', 3),
('37888909', '37888909', 3),
('38873956', '38873956', 3),
('38999029', '38999029', 3),
('V01115888290', '', 3),
('V01228117879', '', 3),
('V01415888290', '', 3);

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
('37888909', '1-A-2018-2019-1', 3, 7, 11),
('', '1-A-2018-2019-1', 3, 8, 18),
('', '1-A-2018-2019-1', 3, 9, 19),
('', '1-A-2018-2019-1', 3, 10, 20),
('', '1-A-2018-2019-1', 3, 11, 21),
('', '1-A-2018-2019-1', 3, 12, 22),
('', '1-A-2018-2019-1', 3, 13, 23),
('V01115888290', '1-A-2018-2019-1', 3, 14, 24),
('V01415888290', '1-A-2018-2019-1', 3, 15, 25);

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
  `id_estado_civil` int(11) NOT NULL,
  `id_sexo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info_personal`
--

INSERT INTO `info_personal` (`id_doc`, `nombre`, `apellido_p`, `apellido_m`, `fecha_nac`, `lugar_nac`, `direcc_hab`, `id_nacionalidad`, `id_estado_civil`, `id_sexo`) VALUES
('', ' ', 'Martines', '', '0000-00-00', '', '', 0, 0, 0),
('12898767', 'Carlos', 'Rodriguez', 'Perez', '0000-00-00', '', '', 1, 2, 1),
('15888290', 'Maritza Fernanda', 'Garcia', 'Alvarado', '1982-09-22', 'Miranda, Ocumare', 'Caracas, San Bernardino', 1, 1, 2),
('15992209', 'Alberto', 'Gonzales', 'Prada', '0000-00-00', '', '', 1, 1, 1),
('17227227', 'Carla Maria', 'Melendes', '', '1989-02-01', 'Caracas', 'Caracas', 1, 1, 2),
('18299090', 'Adreina Antonieta', 'Rodriguez', 'Ramos', '1992-02-22', 'Edo. Carabobo, Valencia', 'Caracas', 1, 1, 2),
('19220909', 'Hernesto', 'Herrera', 'Oviedo', '1989-04-01', 'Caracas, Municipio Libertador', 'Caracas, La paz.', 1, 1, 1),
('20119090', 'Elena Maria', 'Espinoza', 'Ramos', '1990-11-09', 'Estado Carabobo Valencia.', 'Miranda, Petare', 1, 1, 2),
('20199002', 'Sandra Maria', 'Oviedo', 'Uzcategui', '1990-02-02', 'Dpto Capital, Municipio Libertador, Chacao', 'Dpto Capital, Municipio Libertador,El Paraiso', 1, 1, 2),
('28117201', 'Carlos', 'Uzcategui', '', '1999-01-16', 'Miranda Ocumare', 'Caracas, San Benardino', 1, 1, 1),
('28117206', 'Newman Louis', 'Rodriguez', 'Robles', '1999-08-17', 'Caracas San Martin, Maternidad Concepci&oacute;n Palacios', 'Miranda Cristobal Rojas Concepcion Palacios', 1, 1, 1),
('28117207', 'Maria Elena', 'Gonzales', '', '1980-02-05', 'Miranda, Los Teques', 'Miranda, Petare', 1, 3, 2),
('28117209', 'Maria Angela', 'Herrera', 'Gonzales', '1999-10-09', 'Caracas', 'Caracas', 1, 2, 2),
('28117332', 'Fernanda Maria', 'Martines', '', '1980-01-22', 'Caracas', 'Caracas', 1, 2, 2),
('28117333', 'Diana Maria', 'Martines', '', '1980-01-22', 'Caracas', 'Caracas', 1, 2, 2),
('28122679', 'Carla', 'Jordan', 'Cardenal', '1995-07-30', 'Caracas', 'Caracas', 1, 4, 2),
('28127209', 'Ernesto Berluis', 'Uzcategui', 'Alvarado', '0000-00-00', '', '', 1, 1, 1),
('29117203', 'Fernanda Maria', 'Rodriguez', 'Perez', '1982-01-10', 'Caracas', 'Caracas', 1, 2, 2),
('32020390', 'Andrea Mariella', 'Sanchez', 'Giordano', '2014-11-01', 'Italia, Roma', 'Caracas, Chacao', 2, 1, 2),
('34117208', 'Andres Enrique', 'Rodriguez', 'Murcia', '2010-11-01', 'Miranda, Los Teques', 'Miranda, Los Teques', 1, 1, 1),
('34999029', 'Juan Felipe', 'Rodriguez', '', '2008-01-19', 'Caracas', 'Caracas', 1, 1, 1),
('37888909', 'Jose Julian', 'Herrera', 'Espinoza', '2010-01-21', 'Caracas, Municipio Libertador.', 'Miranda, Petare.', 1, 1, 1),
('38873956', 'Pedro', 'Oviedo', 'Martinez', '2014-05-07', 'Miranda, Los Valles del tuy', 'Dpto Capital, Catia', 1, 1, 1),
('38938390', 'Calos Alexander', 'Hernandez', 'Aparicio', '2013-11-01', 'Cojedes, San Carlos.', 'Dpto Capital, La Candelaria', 1, 1, 1),
('38999029', 'Carlos Felipe', 'Rodriguez', '', '2010-01-19', 'Caracas', 'Caracas', 1, 1, 1),
('39029283', 'Angela Alessandra', 'Uzcategui', 'Rodrguez', '2014-11-08', 'Dpto Capital, San Martín', 'Dpto Capital, La Paz', 1, 1, 2),
('5888956', 'Antonella', 'Rodriguez', 'Perez', '0000-00-00', '', '', 1, 2, 2),
('5930330', 'Andrea Francisca', 'Cardenal', 'Uzcategui', '1960-11-11', 'Edo Carabobo Valencia', 'Edo Carabobo Valencia', 1, 1, 2),
('7222908', 'Ana Francisca', 'Fernandez', 'Ramos', '1967-01-03', 'Dpto Capital, Municipio Libertador,San Martin', 'Dpto Capital, Municipio Libertador, El paraiso', 1, 2, 2),
('No asignado', '', '', '', '0000-00-00', '', '', 1, 1, 1),
('V01115888290', 'Fabiana Maria', 'Torrealba', 'Garcia', '2010-02-07', 'Caracas, Maternidad.', 'Caracas, La Paz.', 1, 1, 2),
('V01228117879', 'Carlos Esteban', 'Herandes', 'Oviedo', '2010-01-24', 'Dpto. Capital, Municipio Libertador, San Martin', 'Dpto. Capital, Municipio Libertador, El Paraiso', 1, 1, 1),
('V01415888290', 'Mario Jose', 'Torrealba', 'Garcia', '2014-02-08', 'Caracas, Maternidad.', 'Caracas, La Paz.', 1, 1, 2);

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
('', '', '', '', ''),
('15888290', 'Asistente de Recursos Humanos', 'Torre Provincial', 'AV Wolmer San Bernardino\r\nCaracas.', '02392992898'),
('18299090', 'Docente', 'Liceo Andres Bello', 'La Candelaria', '02399092987'),
('19220909', '', '', '', ''),
('20119090', 'Secretario', 'Edif. Los dos caminos', 'Los dos Caminos', '04129209298'),
('28117332', 'Maestra De kinder', 'Se&ntilde;ora de la Chiquinquir&aacute;', 'Caraca, La paz', '02392298982'),
('28117333', 'Maestra De kinder', 'Se&ntilde;ora de la Chiquinquir&aacute;', 'Caraca, La paz', '02243399922');

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
('34999029', 0, '', 0, ''),
('37888909', 0, '', 0, ''),
('38999029', 0, '', 0, ''),
('V01115888290', 0, '', 0, ''),
('V01228117879', 0, '', 1, 'Un trasporte pasa por el a las 12:00'),
('V01415888290', 0, '', 0, ''),
('V19913903883', 0, 'desc_ret', 0, 'desc_tranport');

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
('34999029', 2, 1, '38999029'),
('37888909', 3, 0, ''),
('38999029', 2, 0, ''),
('V01115888290', 4, 0, ''),
('V01228117879', 4, 0, ''),
('V01415888290', 4, 1, 'V01115888290'),
('V19913903883', 3, 0, '');

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
('18277902', 2, 'V01228117879'),
('18299090', 1, '34999029'),
('18299090', 1, '38999029'),
('19220909', 2, '37888909'),
('19220909', 2, 'V01115888290'),
('19220909', 2, 'V01415888290'),
('20119090', 1, '37888909'),
('28117332', 1, 'V01228117879'),
('7222908', 1, 'V19913903883');

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
('V19913903883', '5930330', 0, 'Obrero', 'Primo', 66),
('V01115888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 67),
('V01115888290', '19220909', 1, '', 'Padre', 68),
('V01115888290', '28127209', 0, '', 'Amigo de la Familia', 69),
('V01115888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 70),
('V01115888290', '19220909', 1, '', 'Padre', 71),
('V01115888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 72),
('V01115888290', '19220909', 1, '', 'Padre', 73),
('V01115888290', '28127209', 0, '', 'Amigo de la Familia', 74),
('V01115888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 75),
('V01115888290', '19220909', 1, '', 'Padre', 76),
('V01115888290', '28127209', 0, '', 'Amigo de la Familia', 77),
('V01115888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 78),
('V01115888290', '19220909', 1, '', 'Padre', 79),
('V01115888290', '28127209', 0, '', 'Amigo de la Familia', 80),
('V01115888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 81),
('V01115888290', '19220909', 1, '', 'Padre', 82),
('V01115888290', '28127209', 0, '', 'Amigo de la Familia', 83),
('V01115888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 84),
('V01115888290', '19220909', 1, '', 'Padre', 85),
('V01115888290', '28127209', 0, '', 'Amigo de la Familia', 86),
('V01115888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 87),
('V01115888290', '19220909', 1, '', 'Padre', 88),
('V01115888290', '28127209', 0, '', 'Amigo de la Familia', 89),
('V01415888290', '15888290', 1, 'Lic. Administración de Recurso', 'Madre', 90),
('V01415888290', '19220909', 1, '', 'Padre', 91),
('V01415888290', '28127209', 0, '', 'Amigo de la Familia', 92);

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
('12898767', 'V01228117879'),
('15992209', '37888909'),
('28127209', 'V01115888290'),
('28127209', 'V01415888290'),
('5888956', '34999029'),
('5930330', 'V19913903883');

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
('32020390', 1, 1, 'HAJ123A'),
('34999029', 1, 0, ''),
('37888909', 1, 1, 'bjku121g'),
('38999029', 1, 1, '23DS23L'),
('V01115888290', 1, 0, ''),
('V01228117879', 1, 0, ''),
('V01415888290', 1, 0, ''),
('V19913903883', 1, 1, 'ss');

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
('15888290', 'V01115888290'),
('15888290', 'V01415888290'),
('18299090', '34999029'),
('18299090', '38999029'),
('19220909', 'V19913903883'),
('20119090', '37888909'),
('7222908', 'V01228117879');

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
('34999029', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'Malaria', '', '', '', '', '', '', 0, 0),
('37888909', 0, '', 1, 'Antigmatismo', 0, '', 0, '', 0, '', 1, 'Tetano', '0', '', '0', '', '', '', 0, 0),
('38999029', 0, '', 1, 'Miopia', 0, '', 0, '', 0, '', 1, 'Malaria', '', '', '', '', '', '', 0, 0),
('V01115888290', 0, '', 0, '', 0, '', 1, 'Almendras', 0, '', 1, 'Difteria\r\nTetano', '', '', '', '', '', '', 0, 0),
('V01228117879', 0, '', 0, '', 0, '', 1, 'Al polen', 0, '', 1, 'Difteria\r\nTetano', '', '', '', '', '', '', 0, 0),
('V01415888290', 0, '', 0, '', 0, '', 0, '', 0, '', 1, 'Difteria\r\nTetano', '', '', '', '', '', '', 0, 0),
('V19913903883', 0, 'desc_croni', 0, 'desc_visual', 0, 'desc_auditivo', 0, 'desc_alergia', 0, 'desc_condic_esp', 0, 'desc_vacuna', 'desc_psicopeda', 'desc_psicolo', 'desc_ter_lenguaje', 'otras_condic', 'desc_otras', 'desc_medicacion', 0, 0);

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
(3, 'Invitado');

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
('28117206', 1, '$2y$10$kds6nYfN/.NRA//GQL7..O4Tu.fXEPbCSTBlFhvP8.7KMg0cv3qUe', '2020-02-03');

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
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD KEY `ci_escolar` (`ci_escolar`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_doc_docent` (`id_doc_docent`);

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
  MODIFY `id_actualizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `clases_asignadas`
--
ALTER TABLE `clases_asignadas`
  MODIFY `id_contrato_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
  MODIFY `id_escolaridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `estudiantes_asignados`
--
ALTER TABLE `estudiantes_asignados`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pers_est`
--
ALTER TABLE `pers_est`
  MODIFY `id_pers_est` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

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
  ADD CONSTRAINT `administrativos_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`),
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`);

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
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`id_funcion_predet`) REFERENCES `funciones_docentes` (`id_funcion_docent`),
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`id_doc_docent`) REFERENCES `info_personal` (`id_doc`),
  ADD CONSTRAINT `docentes_ibfk_3` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`),
  ADD CONSTRAINT `docentes_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `docentes_ibfk_5` FOREIGN KEY (`id_funcion_predet`) REFERENCES `funciones_docentes` (`id_funcion_docent`);

--
-- Filtros para la tabla `escolaridad`
--
ALTER TABLE `escolaridad`
  ADD CONSTRAINT `escolaridad_ibfk_1` FOREIGN KEY (`id_actualizacion`) REFERENCES `actualizacion` (`id_actualizacion`),
  ADD CONSTRAINT `escolaridad_ibfk_2` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `estudiantes_asignados`
--
ALTER TABLE `estudiantes_asignados`
  ADD CONSTRAINT `estudiantes_asignados_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  ADD CONSTRAINT `estudiantes_asignados_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  ADD CONSTRAINT `estudiantes_asignados_ibfk_3` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `estudiantes_asignados_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `estudiantes_asignados_ibfk_5` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `estudiantes_asignados_ibfk_6` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `estudiantes_asignados_ibfk_7` FOREIGN KEY (`id_actualizacion`) REFERENCES `actualizacion` (`id_actualizacion`);

--
-- Filtros para la tabla `info_personal`
--
ALTER TABLE `info_personal`
  ADD CONSTRAINT `info_personal_ibfk_1` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`),
  ADD CONSTRAINT `info_personal_ibfk_2` FOREIGN KEY (`id_estado_civil`) REFERENCES `est_civil` (`id_estado_civil`),
  ADD CONSTRAINT `info_personal_ibfk_3` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`);

--
-- Filtros para la tabla `laboral`
--
ALTER TABLE `laboral`
  ADD CONSTRAINT `laboral_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `info_personal` (`id_doc`);

--
-- Filtros para la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD CONSTRAINT `movilidad_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `otros_datos_estudiant`
--
ALTER TABLE `otros_datos_estudiant`
  ADD CONSTRAINT `otros_datos_estudiant_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `padres`
--
ALTER TABLE `padres`
  ADD CONSTRAINT `padres_ibfk_2` FOREIGN KEY (`id_tip_padre`) REFERENCES `tipos_padres` (`id_tip_padre`),
  ADD CONSTRAINT `padres_ibfk_3` FOREIGN KEY (`id_doc`) REFERENCES `pers_est` (`id_doc`),
  ADD CONSTRAINT `padres_ibfk_4` FOREIGN KEY (`ci_escolar`) REFERENCES `pers_est` (`ci_escolar`);

--
-- Filtros para la tabla `pers_est`
--
ALTER TABLE `pers_est`
  ADD CONSTRAINT `pers_est_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `pers_est_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `info_personal` (`id_doc`);

--
-- Filtros para la tabla `pers_retirar`
--
ALTER TABLE `pers_retirar`
  ADD CONSTRAINT `pers_retirar_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `pers_est` (`id_doc`),
  ADD CONSTRAINT `pers_retirar_ibfk_2` FOREIGN KEY (`ci_escolar`) REFERENCES `pers_est` (`ci_escolar`);

--
-- Filtros para la tabla `representantes`
--
ALTER TABLE `representantes`
  ADD CONSTRAINT `representantes_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `pers_est` (`ci_escolar`),
  ADD CONSTRAINT `representantes_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `pers_est` (`id_doc`);

--
-- Filtros para la tabla `salud`
--
ALTER TABLE `salud`
  ADD CONSTRAINT `salud_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
