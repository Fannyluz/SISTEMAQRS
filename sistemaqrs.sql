-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2021 a las 17:16:08
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemaqrs`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caso`
--

CREATE TABLE `caso` (
  `CodCaso` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `caso`
--

INSERT INTO `caso` (`CodCaso`, `Nombre`, `Descripcion`, `Fecha`, `Estado`) VALUES
(10, 'Aula Virtual', 'Problemas con el aula virtual', '11/02/2021', 1),
(11, 'Aula Virtual', 'Problemas con el aula virtual', '11/02/2021', 1),
(12, 'Sistema de Videoconferencia', 'erserer', '2021-02-11', 1),
(13, 'microsoft teams', 'problemas o incovenvientes con el uso de micr', '2021-02-12', 1),
(14, 'nuevo', 'nyuevo', '2021-02-12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaluptvirtual`
--

CREATE TABLE `personaluptvirtual` (
  `CodPersonalUptVirtual` int(11) NOT NULL,
  `CodTipoPersonal` int(11) NOT NULL,
  `DNI` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Foto` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CorreoElectronico` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Celular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personaluptvirtual`
--

INSERT INTO `personaluptvirtual` (`CodPersonalUptVirtual`, `CodTipoPersonal`, `DNI`, `Nombres`, `Apellidos`, `Foto`, `CorreoElectronico`, `Celular`, `Direccion`, `Fecha`, `Estado`) VALUES
(1, 1, '74569832', 'Francisco', 'Zapata', 'foto', 'francisco@gmail.com', '985632147', 'direccion', '11/02/2021', 1),
(2, 3, '96587421', 'William', 'Rodriguez', 'foto', 'William@gmail.com', '965874213', 'direccion', '11/02/2021', 1),
(4, 1, '98653214', 'nelia', 'escalante', 'foto', 'correo', '965874512', 'direccion', '15/02/2021', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipopersonal`
--

CREATE TABLE `tipopersonal` (
  `CodTipoPersonal` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipopersonal`
--

INSERT INTO `tipopersonal` (`CodTipoPersonal`, `Nombre`, `Descripcion`, `Fecha`, `Estado`) VALUES
(1, 'Soporte Tecnico Aula Virtual', 'Soporte Tecnico Aula Virtual de la UPT', '11/02/2021', 1),
(3, 'Soporte Tecnico Sistema de Videoconferecia', 'Soporte Tecnico Sistema de Videoconferecia UP', '11/02/2021', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoqrs`
--

CREATE TABLE `tipoqrs` (
  `CodTipoQRS` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `CodTipoUsuario` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`CodTipoUsuario`, `Nombre`, `Descripcion`, `Fecha`, `Estado`) VALUES
(1, 'usuario2k', 'dersre', '2021-02-11', 1),
(2, 'usuario1', 'dersre', '2021-02-10', 2),
(3, 'usuario11', 'dersre', '2021-02-11', 1),
(4, 'Docente', 'Docente de la Universidad', '2021-02-11', 1),
(5, 'Estudiante', 'Estudiante de la Universidad', '2021-02-11', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopersonaluptvirtual`
--

CREATE TABLE `usuariopersonaluptvirtual` (
  `CodUsuarioPersonalUptVirtual` int(11) NOT NULL,
  `CodPersonalUptVirtual` int(11) NOT NULL,
  `Usuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Clave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuariopersonaluptvirtual`
--

INSERT INTO `usuariopersonaluptvirtual` (`CodUsuarioPersonalUptVirtual`, `CodPersonalUptVirtual`, `Usuario`, `Clave`, `Estado`, `Fecha`) VALUES
(1, 1, 'francisco', 'francisco', 1, '11/02/2021'),
(2, 2, 'william', 'william123', 1, '11/02/2021'),
(3, 4, 'nelia', 'nelia123456', 2, '15/02/2021');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `caso`
--
ALTER TABLE `caso`
  ADD PRIMARY KEY (`CodCaso`);

--
-- Indices de la tabla `personaluptvirtual`
--
ALTER TABLE `personaluptvirtual`
  ADD PRIMARY KEY (`CodPersonalUptVirtual`),
  ADD KEY `CodTipoPersonal_idx` (`CodTipoPersonal`);

--
-- Indices de la tabla `tipopersonal`
--
ALTER TABLE `tipopersonal`
  ADD PRIMARY KEY (`CodTipoPersonal`);

--
-- Indices de la tabla `tipoqrs`
--
ALTER TABLE `tipoqrs`
  ADD PRIMARY KEY (`CodTipoQRS`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`CodTipoUsuario`);

--
-- Indices de la tabla `usuariopersonaluptvirtual`
--
ALTER TABLE `usuariopersonaluptvirtual`
  ADD PRIMARY KEY (`CodUsuarioPersonalUptVirtual`),
  ADD KEY `CodPersonalUptVirtual_idx` (`CodPersonalUptVirtual`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `caso`
--
ALTER TABLE `caso`
  MODIFY `CodCaso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `personaluptvirtual`
--
ALTER TABLE `personaluptvirtual`
  MODIFY `CodPersonalUptVirtual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipopersonal`
--
ALTER TABLE `tipopersonal`
  MODIFY `CodTipoPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipoqrs`
--
ALTER TABLE `tipoqrs`
  MODIFY `CodTipoQRS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `CodTipoUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuariopersonaluptvirtual`
--
ALTER TABLE `usuariopersonaluptvirtual`
  MODIFY `CodUsuarioPersonalUptVirtual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personaluptvirtual`
--
ALTER TABLE `personaluptvirtual`
  ADD CONSTRAINT `CodTipoPersonal` FOREIGN KEY (`CodTipoPersonal`) REFERENCES `tipopersonal` (`CodTipoPersonal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuariopersonaluptvirtual`
--
ALTER TABLE `usuariopersonaluptvirtual`
  ADD CONSTRAINT `CodPersonalUptVirtual` FOREIGN KEY (`CodPersonalUptVirtual`) REFERENCES `personaluptvirtual` (`CodPersonalUptVirtual`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
