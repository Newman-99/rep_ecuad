-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 21-11-2019 a las 10:49:03
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
-- Base de datos: `rep_ecuador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actualizacion`
--

CREATE TABLE `actualizacion` (
  `ci_escolar` varchar(15) NOT NULL,
  `id_doc_admin` varchar(15) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `grupo` varchar(1) NOT NULL,
  `grado` varchar(1) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE `administrativos` (
  `id_doc_admin` varchar(15) NOT NULL,
  `cargo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrativos`
--

INSERT INTO `administrativos` (`id_doc_admin`, `cargo`) VALUES
('28117208', 'Director');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `id_clase` int(11) NOT NULL,
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
  `id_clase` int(11) NOT NULL,
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
  `no_aula` int(3) NOT NULL,
  `id_turno` int(1) NOT NULL,
  `anio_escolar1` year(4) NOT NULL,
  `anio_escolar2` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `grado`, `seccion`, `no_aula`, `id_turno`, `anio_escolar1`, `anio_escolar2`) VALUES
('1-A-2019-2020-1', 1, 'A', 17, 1, 2019, 2020),
('1-D-2018-2019-1', 1, 'D', 5, 1, 2018, 2019),
('2-B-2018-2019-1', 2, 'B', 21, 1, 2018, 2019);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases_asignadas`
--

CREATE TABLE `clases_asignadas` (
  `id_contrato_clase` varchar(30) NOT NULL,
  `id_estado` int(1) NOT NULL,
  `id_clase` varchar(15) NOT NULL,
  `id_doc_docent` varchar(15) NOT NULL,
  `id_tipo_docent` int(1) NOT NULL,
  `nro_contrato` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases_asignadas`
--

INSERT INTO `clases_asignadas` (`id_contrato_clase`, `id_estado`, `id_clase`, `id_doc_docent`, `id_tipo_docent`, `nro_contrato`) VALUES
('1-A-2019-2020-1-No Asignado-1-', 1, '1-A-2019-2020-1', 'No Asignado', 1, 1),
('1-A-2019-2020-1-No Asignado-2-', 1, '1-A-2019-2020-1', 'No Asignado', 2, 1),
('1-A-2019-2020-1-No Asignado-3-', 1, '1-A-2019-2020-1', 'No Asignado', 3, 1),
('1-D-2018-2019-1-14117206-2-1', 1, '1-D-2018-2019-1', '14117206', 2, 1),
('1-D-2018-2019-1-28117204-1-1', 1, '1-D-2018-2019-1', '28117204', 1, 1),
('1-D-2018-2019-1-No Asignado-3-', 1, '1-D-2018-2019-1', 'No Asignado', 3, 1),
('2-B-2018-2019-1-1023102-1-1', 1, '2-B-2018-2019-1', '1023102', 1, 1),
('2-B-2018-2019-1-14117206-2-1', 1, '2-B-2018-2019-1', '14117206', 2, 1),
('2-B-2018-2019-1-1909022-3-1', 1, '2-B-2018-2019-1', '1909022', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_basic`
--

CREATE TABLE `contact_basic` (
  `id_doc` varchar(15) NOT NULL,
  `tlf_local` char(11) NOT NULL,
  `tlf_cel` char(11) NOT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contact_basic`
--

INSERT INTO `contact_basic` (`id_doc`, `tlf_local`, `tlf_cel`, `correo`) VALUES
('1023102', '0239389279', '04142980900', 'uzdiana@gmail.com'),
('14117206', '02120902945', '04126218967', 'otero123@gmail.com'),
('1909022', '023823978', '041223975', 'jose_v@gmai.com'),
('28117204', '02390972799', '04122894287', 'carlosor@gmail.com'),
('28117208', '02390172334', '04120172922', 'newmanrodriguez1999@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_doc_docent` varchar(15) NOT NULL,
  `id_tipo_docent` int(1) NOT NULL,
  `id_turno` int(1) NOT NULL,
  `id_estado` int(1) NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `fecha_inabilitacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_doc_docent`, `id_tipo_docent`, `id_turno`, `id_estado`, `fecha_ingreso`, `fecha_inabilitacion`) VALUES
('1023102', 1, 1, 1, '2005-01-20', '0000-00-00'),
('14117206', 2, 1, 1, '2010-01-05', '0000-00-00'),
('1909022', 3, 1, 1, '2016-02-01', '0000-00-00'),
('28117204', 1, 2, 2, '2017-02-08', '0000-00-00');

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
(1, 'Activo'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `ci_escolar` varchar(15) NOT NULL,
  `id_doc_est` varchar(15) NOT NULL,
  `id_clase` varchar(15) NOT NULL,
  `id_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`ci_escolar`, `id_doc_est`, `id_clase`, `id_estado`) VALUES
('32020390', '32020390', '2-B-2018-2019-1', 1),
('34117206', '34117206', '2-B-2018-2019-1', 1),
('34289190', '', '1-D-2018-2019-1', 1),
('38873956', '', '1-D-2018-2019-1', 1),
('38938390', '', '1-D-2018-2019-1', 2),
('39029283', '', '1-A-2019-2020-1', 1);

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
('1023102', 'Diana Kimberly', 'Uzcategui', 'Sanchez', '1980-11-14', 'Caracas, San Benardino', 'Caracas, Catia', 1, 1, 2),
('14117206', 'Carlos Gabriel', 'Sanchez', 'Otero', '1994-10-08', 'Caracas', 'Los Teques', 2, 1, 1),
('1909022', 'Jose Gregorio', 'Varaon', '', '1990-02-22', 'Caracas', 'Parroquia La vega', 1, 1, 1),
('28117204', 'Carlos Alexander', 'Rodriguez', 'Alvarado', '1978-11-07', 'Caracas. San Martin', 'Caracas, San Benardino', 1, 1, 1),
('28117208', 'Newman Louis', 'Rodriguez', 'Robles', '1999-08-17', 'Caracas San Martin, Maternidad Concepción Palacios', 'Miranda Cristobal Rojas Concepcion Palacios', 1, 1, 1),
('32020390', 'Andrea Mariella', 'Sanchez', 'Giordano', '2014-11-01', 'Italia, Roma', 'Caracas, Chacao', 2, 1, 2),
('34117206', 'Andres Enrique', 'Rodriguez', 'Murcia', '2010-11-01', 'Miranda, Los Teques', 'Miranda, Los Teques', 1, 1, 1),
('34289190', 'Maria Valentina', 'Robles', 'Jimenes', '2010-05-29', 'Dpto Capital, San Benardino', 'Dpto Capital, La pastora', 1, 1, 2),
('38873956', 'Pedro', 'Oviedo', 'Martinez', '2014-05-07', 'Miranda, Los Valles del tuy', 'Dpto Capital, Catia', 1, 1, 1),
('38938390', 'Calos Alexander', 'Hernandez', 'Aparicio', '2013-11-01', 'Cojedes, San Carlos.', 'Dpto Capital, La Candelaria', 1, 1, 1),
('39029283', 'Angela Alessandra', 'Uzcategui', 'Rodrguez', '2014-11-08', 'Dpto Capital, San Martín', 'Dpto Capital, La Paz', 1, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE `inscripcion` (
  `ci_escolar` varchar(15) NOT NULL,
  `ci_escolar_atg` varchar(15) NOT NULL,
  `plantel_proced` varchar(50) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `año_escolar1` year(4) NOT NULL,
  `año_escolar2` year(4) NOT NULL,
  `grado` int(1) NOT NULL,
  `seccion` varchar(1) NOT NULL,
  `calif_def` varchar(1) NOT NULL,
  `repitiente` tinyint(1) NOT NULL,
  `observs` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboral`
--

CREATE TABLE `laboral` (
  `id_doc` varchar(15) NOT NULL,
  `ocupacion` varchar(30) NOT NULL,
  `trabajo` varchar(30) NOT NULL,
  `lugar_trab` varchar(50) NOT NULL,
  `direcc_trab` varchar(80) NOT NULL,
  `tlf_ofic` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movilidad`
--

CREATE TABLE `movilidad` (
  `ci_escolar` varchar(15) NOT NULL,
  `est_ret` tinyint(1) NOT NULL,
  `desc_ret` varchar(80) NOT NULL,
  `est_tranport` tinyint(1) NOT NULL,
  `desc_tranport` int(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `parenteco`
--

CREATE TABLE `parenteco` (
  `id_doc` varchar(15) NOT NULL,
  `tipo_parentesc` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pers_est`
--

CREATE TABLE `pers_est` (
  `id_doc` varchar(15) NOT NULL,
  `representante` tinyint(1) NOT NULL,
  `padre` tinyint(1) NOT NULL,
  `madre` tinyint(1) NOT NULL,
  `person_ret` tinyint(1) NOT NULL,
  `convivencia` tinyint(1) NOT NULL,
  `tlf_emergenci` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Estructura de tabla para la tabla `recursos_public`
--

CREATE TABLE `recursos_public` (
  `ci_escolar` varchar(15) NOT NULL,
  `colecc_bicent` tinyint(1) NOT NULL,
  `canaima` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `est_psicopeda` tinyint(1) NOT NULL,
  `desc_psicopeda` varchar(150) NOT NULL,
  `est_psicolo` tinyint(1) NOT NULL,
  `desc_psicolo` varchar(150) NOT NULL,
  `est_ter_lenguaje` tinyint(1) NOT NULL,
  `desc_ter_lenguaje` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sexo`
--

CREATE TABLE `sexo` (
  `id_sexo` int(11) NOT NULL,
  `descripción` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sexo`
--

INSERT INTO `sexo` (`id_sexo`, `descripción`) VALUES
(1, 'Masculino'),
(2, 'Femenino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_docentes`
--

CREATE TABLE `tipos_docentes` (
  `id_tipo_docent` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_docentes`
--

INSERT INTO `tipos_docentes` (`id_tipo_docent`, `descripcion`) VALUES
(1, 'En Aula'),
(2, 'Educación Física'),
(3, 'Arte y Cultura');

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
(0, 'Inabilidado'),
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
(2, 'Tarde');

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
('28117208', 1, '$2y$10$i8Vrf/tmlVV5BCLUOMcoCeQLawaXzw19IXIt1GiBzzxZ7raGyjNJa', '2019-11-21');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actualizacion`
--
ALTER TABLE `actualizacion`
  ADD KEY `ci_escolar` (`ci_escolar`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_doc_admin` (`id_doc_admin`);

--
-- Indices de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`id_doc_admin`),
  ADD KEY `id_doc_admin` (`id_doc_admin`);

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
  ADD KEY `id_tipo_docent` (`id_tipo_docent`),
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
  ADD KEY `docentes` (`id_tipo_docent`),
  ADD KEY `id_turno` (`id_turno`),
  ADD KEY `id_estado` (`id_estado`);

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
  ADD KEY `id_estado` (`id_estado`),
  ADD KEY `id_clase` (`id_clase`);

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
-- Indices de la tabla `info_personal`
--
ALTER TABLE `info_personal`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `id_nacionalidad` (`id_nacionalidad`),
  ADD KEY `id_estado_civil` (`id_estado_civil`),
  ADD KEY `id_sexo` (`id_sexo`);

--
-- Indices de la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `laboral`
--
ALTER TABLE `laboral`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `nacionalidad`
--
ALTER TABLE `nacionalidad`
  ADD PRIMARY KEY (`id_nacionalidad`);

--
-- Indices de la tabla `parenteco`
--
ALTER TABLE `parenteco`
  ADD KEY `id_doc` (`id_doc`);

--
-- Indices de la tabla `pers_est`
--
ALTER TABLE `pers_est`
  ADD PRIMARY KEY (`id_doc`);

--
-- Indices de la tabla `plantillas`
--
ALTER TABLE `plantillas`
  ADD PRIMARY KEY (`id_planilla`);

--
-- Indices de la tabla `recursos_public`
--
ALTER TABLE `recursos_public`
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `salud`
--
ALTER TABLE `salud`
  ADD KEY `ci_escolar` (`ci_escolar`);

--
-- Indices de la tabla `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id_sexo`);

--
-- Indices de la tabla `tipos_docentes`
--
ALTER TABLE `tipos_docentes`
  ADD PRIMARY KEY (`id_tipo_docent`);

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
  ADD CONSTRAINT `actualizacion_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `actualizacion_ibfk_2` FOREIGN KEY (`id_doc_admin`) REFERENCES `administrativos` (`id_doc_admin`);

--
-- Filtros para la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD CONSTRAINT `administrativos_ibfk_1` FOREIGN KEY (`id_doc_admin`) REFERENCES `info_personal` (`id_doc`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_doc_docent`) REFERENCES `docentes` (`id_doc_docent`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_4` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`);

--
-- Filtros para la tabla `clases_asignadas`
--
ALTER TABLE `clases_asignadas`
  ADD CONSTRAINT `clases_asignadas_ibfk_1` FOREIGN KEY (`id_doc_docent`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `clases_asignadas_ibfk_2` FOREIGN KEY (`id_doc_docent`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `clases_asignadas_ibfk_3` FOREIGN KEY (`id_doc_docent`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `clases_asignadas_ibfk_4` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`),
  ADD CONSTRAINT `clases_asignadas_ibfk_5` FOREIGN KEY (`id_tipo_docent`) REFERENCES `tipos_docentes` (`id_tipo_docent`),
  ADD CONSTRAINT `clases_asignadas_ibfk_6` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes` FOREIGN KEY (`id_tipo_docent`) REFERENCES `tipos_docentes` (`id_tipo_docent`),
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`id_doc_docent`) REFERENCES `info_personal` (`id_doc`),
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`id_doc_docent`) REFERENCES `contact_basic` (`id_doc`),
  ADD CONSTRAINT `docentes_ibfk_3` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`),
  ADD CONSTRAINT `docentes_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
