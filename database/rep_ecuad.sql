-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-10-2019 a las 17:50:01
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
  `id_doc_docent` varchar(15) NOT NULL,
  `id_doc_docent_fis` varchar(15) NOT NULL,
  `id_doc_docent_cult` varchar(15) NOT NULL,
  `grado` int(1) NOT NULL,
  `seccion` varchar(1) NOT NULL,
  `no_aula` int(3) NOT NULL,
  `id_turno` int(1) NOT NULL,
  `año_escolar1` year(4) NOT NULL,
  `año_escolar2` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `id_doc_docent`, `id_doc_docent_fis`, `id_doc_docent_cult`, `grado`, `seccion`, `no_aula`, `id_turno`, `año_escolar1`, `año_escolar2`) VALUES
('2-a-2018-2019', '1909022', '1909022', '14117206', 2, 'a', 28, 2, 2018, 2019),
('4-b-2018-2019', '1909022', '14117206', '', 4, 'b', 12, 1, 2018, 2019);

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
('14117206', '02120902945', '04126218967', 'otero123@gmail.com'),
('1909022', '023823978', '041223975', 'jose_v@gmai.com'),
('28117208', '02390172334', '04120172922', 'newmanrodriguez1999@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_doc_docent` varchar(15) NOT NULL,
  `id_tipo_docent` int(1) NOT NULL,
  `id_turno` int(1) NOT NULL,
  `id_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_doc_docent`, `id_tipo_docent`, `id_turno`, `id_estado`) VALUES
('14117206', 2, 1, 1),
('1909022', 1, 1, 1);

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
('3228117206', '3228117206', '4-b-2018-2019', 1),
('34990567', '', '4-b-2018-2019', 1),
('36117206', '', '2-a-2018-2019', 1);

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
('14117206', 'Carlos Gabriel', 'Sanchez', 'Otero', '1994-10-08', 'Caracas', 'Los Teques', 2, 1, 1),
('1909022', 'Jose Gregorio', 'Varaon', '', '1990-02-22', 'Caracas', 'Parroquia La vega', 1, 1, 1),
('28117208', 'Newman Louis', 'Rodriguez', 'Robles', '1999-08-17', 'Caracas San Martin, Maternidad Concepción Palacios', 'Miranda Cristobal Rojas Concepcion Palacios', 1, 1, 1),
('3228117206', 'Angel Nicolas', 'Hernandez Garantón', 'Zapatero', '2010-10-02', 'Cojedes San Carlos', 'Caracas Catia', 1, 1, 1),
('34990567', 'Fabiana Maria', 'Giordano ', 'Petit', '2011-05-01', 'Caracas San Martin', 'Caracas El Valle', 1, 1, 2),
('36117206', 'Alessandro Gabriel', 'Rodriguez', 'Hernandez', '2016-04-23', 'Caracas', 'Caracas San Bernardino', 1, 1, 1);

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
  `id_tipo_docente` int(1) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos_docentes`
--

INSERT INTO `tipos_docentes` (`id_tipo_docente`, `descripcion`) VALUES
(1, 'Normal'),
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
('28117208', 1, '$2y$10$i8Vrf/tmlVV5BCLUOMcoCeQLawaXzw19IXIt1GiBzzxZ7raGyjNJa', '2019-10-25');

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
  ADD KEY `id_doc_docent` (`id_doc_docent`),
  ADD KEY `id_doc_docent_fis` (`id_doc_docent_fis`),
  ADD KEY `id_doc_docent_cult` (`id_doc_docent_cult`),
  ADD KEY `id_turno` (`id_turno`);

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
  ADD PRIMARY KEY (`id_tipo_docente`);

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
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_doc_docent`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_doc_docent_fis`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `clases_ibfk_3` FOREIGN KEY (`id_doc_docent_cult`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `clases_ibfk_4` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`);

--
-- Filtros para la tabla `contact_basic`
--
ALTER TABLE `contact_basic`
  ADD CONSTRAINT `contact_basic_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `administrativos` (`id_doc_admin`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes` FOREIGN KEY (`id_tipo_docent`) REFERENCES `tipos_docentes` (`id_tipo_docente`),
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`id_doc_docent`) REFERENCES `info_personal` (`id_doc`),
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`id_doc_docent`) REFERENCES `contact_basic` (`id_doc`),
  ADD CONSTRAINT `docentes_ibfk_3` FOREIGN KEY (`id_turno`) REFERENCES `turnos` (`id_turno`),
  ADD CONSTRAINT `docentes_ibfk_4` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `info_personal` (`id_doc`),
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`),
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`);

--
-- Filtros para la tabla `familiar_estd`
--
ALTER TABLE `familiar_estd`
  ADD CONSTRAINT `familiar_estd_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `familiar_estd_ibfk_2` FOREIGN KEY (`ci_escolar_famil`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `familiar_estd_ibfk_3` FOREIGN KEY (`ci_escolar_famil`) REFERENCES `parenteco` (`id_doc`),
  ADD CONSTRAINT `familiar_estd_ibfk_4` FOREIGN KEY (`ci_escolar_famil`) REFERENCES `parenteco` (`id_doc`);

--
-- Filtros para la tabla `info_personal`
--
ALTER TABLE `info_personal`
  ADD CONSTRAINT `info_personal_ibfk_1` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`),
  ADD CONSTRAINT `info_personal_ibfk_2` FOREIGN KEY (`id_estado_civil`) REFERENCES `est_civil` (`id_estado_civil`),
  ADD CONSTRAINT `info_personal_ibfk_3` FOREIGN KEY (`id_nacionalidad`) REFERENCES `nacionalidad` (`id_nacionalidad`),
  ADD CONSTRAINT `info_personal_ibfk_4` FOREIGN KEY (`id_estado_civil`) REFERENCES `est_civil` (`id_estado_civil`),
  ADD CONSTRAINT `info_personal_ibfk_5` FOREIGN KEY (`id_sexo`) REFERENCES `sexo` (`id_sexo`);

--
-- Filtros para la tabla `inscripcion`
--
ALTER TABLE `inscripcion`
  ADD CONSTRAINT `inscripcion_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `laboral`
--
ALTER TABLE `laboral`
  ADD CONSTRAINT `laboral_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `pers_est` (`id_doc`);

--
-- Filtros para la tabla `movilidad`
--
ALTER TABLE `movilidad`
  ADD CONSTRAINT `movilidad_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `parenteco`
--
ALTER TABLE `parenteco`
  ADD CONSTRAINT `parenteco_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `pers_est` (`id_doc`);

--
-- Filtros para la tabla `pers_est`
--
ALTER TABLE `pers_est`
  ADD CONSTRAINT `pers_est_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `info_personal` (`id_doc`),
  ADD CONSTRAINT `pers_est_ibfk_2` FOREIGN KEY (`id_doc`) REFERENCES `contact_basic` (`id_doc`);

--
-- Filtros para la tabla `recursos_public`
--
ALTER TABLE `recursos_public`
  ADD CONSTRAINT `recursos_public_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `salud`
--
ALTER TABLE `salud`
  ADD CONSTRAINT `salud_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `administrativos` (`id_doc_admin`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`id_tip_usr`) REFERENCES `tip_user` (`id_tip_usr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
