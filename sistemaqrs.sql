-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-02-2021 a las 21:25:27
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
  `Descripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `caso`
--

INSERT INTO `caso` (`CodCaso`, `Nombre`, `Descripcion`, `Fecha`, `Estado`) VALUES
(1, 'Aula Virtual', 'Aula Virtual de la Universidad Privada de Tac', '16/02/2021', 1),
(2, 'Sistema de Videoconferencia', 'Sistema de Videoconferencia de la Universidad', '16/02/2021', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaluptvirtual`
--

CREATE TABLE `personaluptvirtual` (
  `CodPersonalUptVirtual` int(11) NOT NULL,
  `CodRolPersonal` int(11) NOT NULL,
  `DNI` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombres` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellidos` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Foto` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `CorreoElectronico` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Celular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Direccion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `personaluptvirtual`
--

INSERT INTO `personaluptvirtual` (`CodPersonalUptVirtual`, `CodRolPersonal`, `DNI`, `Nombres`, `Apellidos`, `Foto`, `CorreoElectronico`, `Celular`, `Direccion`, `Fecha`, `Estado`) VALUES
(1, 1, '98653265', 'william', 'rodriguez', 'foto', 'correo', '965874512', 'direccion', '16/02/2021', 1),
(2, 2, '98653214', 'fanny', 'clemente cruz', 'foto', 'correo', '962358415', 'direccion', '16/02/2021', 1),
(3, 1, '96325874', 'francisco', 'zapata', 'foto', 'correo', '963258741', 'direccion', '16/02/2021', 1),
(4, 3, '96587412', 'nelia', 'escalante', 'foto', 'correo', '985632147', 'direccion', '16/02/2021', 1),
(5, 4, '59874123', 'tito', 'ale nieto', 'foto', 'correo', '965214785', 'direccion', '16/02/2021', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolpersonal`
--

CREATE TABLE `rolpersonal` (
  `CodRolPersonal` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `rolpersonal`
--

INSERT INTO `rolpersonal` (`CodRolPersonal`, `Nombre`, `Descripcion`, `Fecha`, `Estado`) VALUES
(1, 'Soporte Tecnico', 'Soporte Tecnico de UPTVIRTUAL', '16/02/2021', 1),
(2, 'Apoyo Administrativo', 'Apoyo Administrativo de UPT Virtual', '16/02/2021', 1),
(3, 'Apoyo soporte tecnico', 'Apoyo soporte tecnico de uptvirtual', '16/02/2021', 1),
(4, 'Jefe de la Oficina', 'jefe de la oficina virtual', '16/02/2021', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoqrs`
--

CREATE TABLE `tipoqrs` (
  `CodTipoQRS` int(11) NOT NULL,
  `Nombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Descripcion` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariopersonaluptvirtual`
--

CREATE TABLE `usuariopersonaluptvirtual` (
  `CodUsuarioPersonalUptVirtual` int(11) NOT NULL,
  `CodPersonalUptVirtual` int(11) NOT NULL,
  `Usuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Clave` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Privilegio` int(11) NOT NULL,
  `Fecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuariopersonaluptvirtual`
--

INSERT INTO `usuariopersonaluptvirtual` (`CodUsuarioPersonalUptVirtual`, `CodPersonalUptVirtual`, `Usuario`, `Clave`, `Privilegio`, `Fecha`, `Estado`) VALUES
(1, 1, 'william', 'william123', 1, '16/02/2021', 1),
(2, 2, 'fanny', 'fanny123', 2, '16/02/2021', 1),
(3, 3, 'francisco', 'francisco123', 3, '16/02/2021', 1),
(4, 4, 'nelia', 'nelia123456', 3, '16/02/2021', 1);

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
  ADD KEY `CodRolPersonal_idx` (`CodRolPersonal`);

--
-- Indices de la tabla `rolpersonal`
--
ALTER TABLE `rolpersonal`
  ADD PRIMARY KEY (`CodRolPersonal`);

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
  MODIFY `CodCaso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personaluptvirtual`
--
ALTER TABLE `personaluptvirtual`
  MODIFY `CodPersonalUptVirtual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rolpersonal`
--
ALTER TABLE `rolpersonal`
  MODIFY `CodRolPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipoqrs`
--
ALTER TABLE `tipoqrs`
  MODIFY `CodTipoQRS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `CodTipoUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuariopersonaluptvirtual`
--
ALTER TABLE `usuariopersonaluptvirtual`
  MODIFY `CodUsuarioPersonalUptVirtual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personaluptvirtual`
--
ALTER TABLE `personaluptvirtual`
  ADD CONSTRAINT `CodRolPersonal` FOREIGN KEY (`CodRolPersonal`) REFERENCES `rolpersonal` (`CodRolPersonal`);

--
-- Filtros para la tabla `usuariopersonaluptvirtual`
--
ALTER TABLE `usuariopersonaluptvirtual`
  ADD CONSTRAINT `CodPersonalUptVirtual` FOREIGN KEY (`CodPersonalUptVirtual`) REFERENCES `personaluptvirtual` (`CodPersonalUptVirtual`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
