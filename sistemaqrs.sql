-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2021 a las 04:08:58
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
-- Estructura de tabla para la tabla `oevactpactividadqrs`
--

CREATE TABLE `oevactpactividadqrs` (
  `ACTcodigo` int(11) NOT NULL,
  `TIPcodigo` int(11) NOT NULL,
  `CAScodigo` int(11) NOT NULL,
  `TIUcodigo` int(11) NOT NULL,
  `UPUcodigo` int(11) NOT NULL,
  `ACTcodigoUPT` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ACTnombres` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTapellidos` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTDescripcion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTcelular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTcorreoelectronico` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ACTfecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevactpactividadqrs`
--

INSERT INTO `oevactpactividadqrs` (`ACTcodigo`, `TIPcodigo`, `CAScodigo`, `TIUcodigo`, `UPUcodigo`, `ACTcodigoUPT`, `ACTnombres`, `ACTapellidos`, `ACTDescripcion`, `ACTcelular`, `ACTcorreoelectronico`, `ACTfecha`, `ACTestado`) VALUES
(1, 4, 23, 6, 13, '2014569874', 'nombre estudiante', 'apellidos estudiante', 'descripcion de la queja', '985632147', 'correo', '24/02/2021', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevcastcaso`
--

CREATE TABLE `oevcastcaso` (
  `CAScodigo` int(11) NOT NULL,
  `CASnombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `CASdescripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CASfecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `CASestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevcastcaso`
--

INSERT INTO `oevcastcaso` (`CAScodigo`, `CASnombre`, `CASdescripcion`, `CASfecha`, `CASestado`) VALUES
(23, 'aula virtual', 'aula virtual upt', '24/02/2021', 1),
(24, 'nombre', 'problemas o incovenvientes con el uso de micr', '2021-02-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevpeutpersonaluptvirtual`
--

CREATE TABLE `oevpeutpersonaluptvirtual` (
  `PEUcodigo` int(11) NOT NULL,
  `ROPcodigo` int(11) NOT NULL,
  `PEUDNI` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUnombres` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUapellidos` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUfoto` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUcorreoElectronico` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUcelular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUdireccion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUfecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevpeutpersonaluptvirtual`
--

INSERT INTO `oevpeutpersonaluptvirtual` (`PEUcodigo`, `ROPcodigo`, `PEUDNI`, `PEUnombres`, `PEUapellidos`, `PEUfoto`, `PEUcorreoElectronico`, `PEUcelular`, `PEUdireccion`, `PEUfecha`, `PEUestado`) VALUES
(7, 1, '98563214', 'william', 'condori', 'foto', 'correo', '985632147', 'direccion', '04/02/2021', 1),
(8, 1, '98651247', 'gisela', 'flores colque', 'foto', 'correo', '985632147', 'direccion', '2021-02-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevroptrolpersonal`
--

CREATE TABLE `oevroptrolpersonal` (
  `ROPcodigo` int(11) NOT NULL,
  `ROPnombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ROPdescripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ROPfecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ROPestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevroptrolpersonal`
--

INSERT INTO `oevroptrolpersonal` (`ROPcodigo`, `ROPnombre`, `ROPdescripcion`, `ROPfecha`, `ROPestado`) VALUES
(1, 'soporte tecnico', 'soporte tecnico upt', '24/02/2021', 1),
(2, 'soporte tecnico1', 'soporte tecnico', '2021-02-24', 1),
(3, 'soporte tecnico13', 'soporte tecnico', '2021-02-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevtipttipoqrs`
--

CREATE TABLE `oevtipttipoqrs` (
  `TIPcodigo` int(11) NOT NULL,
  `TIPnombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `TIPdescripcion` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `TIPfecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `TIPestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevtipttipoqrs`
--

INSERT INTO `oevtipttipoqrs` (`TIPcodigo`, `TIPnombre`, `TIPdescripcion`, `TIPfecha`, `TIPestado`) VALUES
(4, 'Queja', 'quejas que se presenta', '2021-02-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevtiuttipousuario`
--

CREATE TABLE `oevtiuttipousuario` (
  `TIUcodigo` int(11) NOT NULL,
  `TIUnombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `TIUdescripcion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TIUfecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `TIUestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevtiuttipousuario`
--

INSERT INTO `oevtiuttipousuario` (`TIUcodigo`, `TIUnombre`, `TIUdescripcion`, `TIUfecha`, `TIUestado`) VALUES
(6, 'Estudiante', 'estudiante de la Universidad Privada de tacna', '2021-02-24', 1),
(7, 'Anonimo', 'estudiante de la Universidad Privada de tacna', '2021-02-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevuputusuariopersonaluptvirtual`
--

CREATE TABLE `oevuputusuariopersonaluptvirtual` (
  `UPUcodigo` int(11) NOT NULL,
  `PEUcodigo` int(11) NOT NULL,
  `UPUusuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `UPUclave` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `UPUprivilegio` int(11) NOT NULL,
  `UPUfecha` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `UPUestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevuputusuariopersonaluptvirtual`
--

INSERT INTO `oevuputusuariopersonaluptvirtual` (`UPUcodigo`, `PEUcodigo`, `UPUusuario`, `UPUclave`, `UPUprivilegio`, `UPUfecha`, `UPUestado`) VALUES
(13, 7, 'william', 'william123', 1, '24/02/2021', 1),
(14, 7, 'william111', '123456789', 1, '2021-02-24', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `oevactpactividadqrs`
--
ALTER TABLE `oevactpactividadqrs`
  ADD PRIMARY KEY (`ACTcodigo`),
  ADD KEY `TIPcodigo_idx` (`TIPcodigo`),
  ADD KEY `CAScodigo_idx` (`CAScodigo`),
  ADD KEY `TIU_idx` (`TIUcodigo`),
  ADD KEY `UPUcodigo` (`UPUcodigo`);

--
-- Indices de la tabla `oevcastcaso`
--
ALTER TABLE `oevcastcaso`
  ADD PRIMARY KEY (`CAScodigo`);

--
-- Indices de la tabla `oevpeutpersonaluptvirtual`
--
ALTER TABLE `oevpeutpersonaluptvirtual`
  ADD PRIMARY KEY (`PEUcodigo`),
  ADD KEY `ROPcodigo_idx` (`ROPcodigo`);

--
-- Indices de la tabla `oevroptrolpersonal`
--
ALTER TABLE `oevroptrolpersonal`
  ADD PRIMARY KEY (`ROPcodigo`);

--
-- Indices de la tabla `oevtipttipoqrs`
--
ALTER TABLE `oevtipttipoqrs`
  ADD PRIMARY KEY (`TIPcodigo`);

--
-- Indices de la tabla `oevtiuttipousuario`
--
ALTER TABLE `oevtiuttipousuario`
  ADD PRIMARY KEY (`TIUcodigo`);

--
-- Indices de la tabla `oevuputusuariopersonaluptvirtual`
--
ALTER TABLE `oevuputusuariopersonaluptvirtual`
  ADD PRIMARY KEY (`UPUcodigo`),
  ADD KEY `PEUcodigo_idx` (`PEUcodigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oevactpactividadqrs`
--
ALTER TABLE `oevactpactividadqrs`
  MODIFY `ACTcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `oevcastcaso`
--
ALTER TABLE `oevcastcaso`
  MODIFY `CAScodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `oevpeutpersonaluptvirtual`
--
ALTER TABLE `oevpeutpersonaluptvirtual`
  MODIFY `PEUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `oevroptrolpersonal`
--
ALTER TABLE `oevroptrolpersonal`
  MODIFY `ROPcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `oevtipttipoqrs`
--
ALTER TABLE `oevtipttipoqrs`
  MODIFY `TIPcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `oevtiuttipousuario`
--
ALTER TABLE `oevtiuttipousuario`
  MODIFY `TIUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `oevuputusuariopersonaluptvirtual`
--
ALTER TABLE `oevuputusuariopersonaluptvirtual`
  MODIFY `UPUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `oevactpactividadqrs`
--
ALTER TABLE `oevactpactividadqrs`
  ADD CONSTRAINT `CAScodigo` FOREIGN KEY (`CAScodigo`) REFERENCES `oevcastcaso` (`CAScodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIPcodigo` FOREIGN KEY (`TIPcodigo`) REFERENCES `oevtipttipoqrs` (`TIPcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `TIU` FOREIGN KEY (`TIUcodigo`) REFERENCES `oevtiuttipousuario` (`TIUcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UPUcodigo` FOREIGN KEY (`UPUcodigo`) REFERENCES `oevuputusuariopersonaluptvirtual` (`UPUcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `oevpeutpersonaluptvirtual`
--
ALTER TABLE `oevpeutpersonaluptvirtual`
  ADD CONSTRAINT `ROPcodigo` FOREIGN KEY (`ROPcodigo`) REFERENCES `oevroptrolpersonal` (`ROPcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `oevuputusuariopersonaluptvirtual`
--
ALTER TABLE `oevuputusuariopersonaluptvirtual`
  ADD CONSTRAINT `PEUcodigo` FOREIGN KEY (`PEUcodigo`) REFERENCES `oevpeutpersonaluptvirtual` (`PEUcodigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
