-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 16-10-2019 a las 07:48:00
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
-- Base de datos: `rep_ecuad`
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
('12345678', 'Secretario'),
('28117206', 'Director');

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
  `id_clase` int(11) NOT NULL,
  `ci_escolar` varchar(15) NOT NULL,
  `id_doc_docent` varchar(15) NOT NULL,
  `id_doc_docent_fis` varchar(15) NOT NULL,
  `grado` int(1) NOT NULL,
  `seccion` varchar(1) NOT NULL,
  `no_aula` int(3) NOT NULL,
  `turno` varchar(10) NOT NULL,
  `año_escolar1` year(4) NOT NULL,
  `año_escolar2` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `ci_escolar`, `id_doc_docent`, `id_doc_docent_fis`, `grado`, `seccion`, `no_aula`, `turno`, `año_escolar1`, `año_escolar2`) VALUES
(1, '38117206', '18117206', '28117208', 1, 'a', 17, 'Matutino', 2018, 2019),
(2, '48117206', '', '', 5, 'D', 22, 'Tarde', 0000, 0000);

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
('', '', '04120566793', 'jose@hotmail.com'),
('28117206', '02392349782', '04123492390', 'newmanrodriguez@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_doc_docent` varchar(15) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_doc_docent`, `tipo`) VALUES
('18117206', 'Educacion ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `ci_escolar` varchar(15) NOT NULL,
  `id_doc_est` varchar(15) NOT NULL,
  `id_doc_pers_est` varchar(15) NOT NULL,
  `id_estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`ci_escolar`, `id_doc_est`, `id_doc_pers_est`, `id_estado`) VALUES
('38117206', '38117206', '', 1),
('48117206', '48117206', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `est_civil`
--

CREATE TABLE `est_civil` (
  `id_doc` varchar(8) NOT NULL,
  `estado` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `est_civil`
--

INSERT INTO `est_civil` (`id_doc`, `estado`) VALUES
('28117206', 'Soltero');

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
  `nacionalidad` varchar(12) NOT NULL,
  `sexo` varchar(12) NOT NULL,
  `fecha_nac` date NOT NULL,
  `lugar_nac` varchar(100) NOT NULL,
  `direcc_hab` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `info_personal`
--

INSERT INTO `info_personal` (`id_doc`, `nombre`, `apellido_p`, `apellido_m`, `nacionalidad`, `sexo`, `fecha_nac`, `lugar_nac`, `direcc_hab`) VALUES
('12345678', 'Luis', 'Perez', 'Sanchez', 'Extranjero', 'Masculini', '1080-11-01', 'Caracas', 'La Paz'),
('18117206', 'Jose Gregorio', 'Varaon', '', '', '', '0000-00-00', '', ''),
('28117206', 'Newman Louis', 'Rodriguez', 'Robles', 'Venezolana', 'Masculino', '1999-08-17', 'Dpto.Capital, San Martín, Maternidad', 'Miranda, Los Valle del Tuy, Via Cua'),
('38117206', 'Deiker Luis', 'Rodriguez', 'Robles', 'Venezolana', 'Masculino', '2005-08-03', 'Dpto.Capital, San Martín, Maternidad', 'Miranda, Los Valle del Tuy, Via Cua'),
('48117206', 'Frainer Alberto', 'Petit', 'Sanzhez', '', '', '0000-00-00', '', '');

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
('12345678', 2, '$2y$10$UneR8ZN5feex55ikYPUNROxnIie9oYNrvD6ePWXogzuWvzZX6TJZe', '2019-10-15'),
('28117206', 1, '$2y$10$r3DKvAjqBXaAqlGP/es1xOU1htsEyaln5RyecoHDZ1d1Bqfkj6uoq', '2019-10-15');

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
  ADD KEY `ci_escolar` (`ci_escolar`),
  ADD KEY `id_doc_docent` (`id_doc_docent`),
  ADD KEY `id_doc_docent_fis` (`id_doc_docent_fis`);

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
  ADD PRIMARY KEY (`id_doc_docent`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`ci_escolar`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indices de la tabla `est_civil`
--
ALTER TABLE `est_civil`
  ADD KEY `id_doc` (`id_doc`);

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
  ADD PRIMARY KEY (`id_doc`);

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
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_doc`),
  ADD KEY `id_tip_usr` (`id_tip_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `asistencias_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `asistencias_ibfk_2` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`);

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`id_doc_docent`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`id_doc_docent`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_doc_docent_fis`) REFERENCES `docentes` (`id_doc_docent`),
  ADD CONSTRAINT `clases_ibfk_3` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`);

--
-- Filtros para la tabla `contact_basic`
--
ALTER TABLE `contact_basic`
  ADD CONSTRAINT `contact_basic_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `administrativos` (`id_doc_admin`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`id_doc_docent`) REFERENCES `info_personal` (`id_doc`),
  ADD CONSTRAINT `docentes_ibfk_2` FOREIGN KEY (`id_doc_docent`) REFERENCES `contact_basic` (`id_doc`);

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `info_personal` (`id_doc`),
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`id_estado`) REFERENCES `estado` (`id_estado`);

--
-- Filtros para la tabla `est_civil`
--
ALTER TABLE `est_civil`
  ADD CONSTRAINT `est_civil_ibfk_1` FOREIGN KEY (`id_doc`) REFERENCES `administrativos` (`id_doc_admin`);

--
-- Filtros para la tabla `familiar_estd`
--
ALTER TABLE `familiar_estd`
  ADD CONSTRAINT `familiar_estd_ibfk_1` FOREIGN KEY (`ci_escolar`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `familiar_estd_ibfk_2` FOREIGN KEY (`ci_escolar_famil`) REFERENCES `estudiantes` (`ci_escolar`),
  ADD CONSTRAINT `familiar_estd_ibfk_3` FOREIGN KEY (`ci_escolar_famil`) REFERENCES `parenteco` (`id_doc`),
  ADD CONSTRAINT `familiar_estd_ibfk_4` FOREIGN KEY (`ci_escolar_famil`) REFERENCES `parenteco` (`id_doc`);

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
