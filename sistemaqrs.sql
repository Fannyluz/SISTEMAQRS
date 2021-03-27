-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-03-2021 a las 03:16:50
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
  `ACTDescripcion` varchar(450) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTcelular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTcorreoelectronico` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ACTfecha` date NOT NULL,
  `ACTestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevactpactividadqrs`
--

INSERT INTO `oevactpactividadqrs` (`ACTcodigo`, `TIPcodigo`, `CAScodigo`, `TIUcodigo`, `UPUcodigo`, `ACTcodigoUPT`, `ACTnombres`, `ACTapellidos`, `ACTDescripcion`, `ACTcelular`, `ACTcorreoelectronico`, `ACTfecha`, `ACTestado`) VALUES
(1, 1, 1, 1, 1, '2014956320', 'Gladys', 'Condori', 'tengo problemas con el aula virtual, no puedo', '963987456', 'correo', '2021-02-25', 1),
(2, 2, 1, 2, 1, '269854', 'fredy', 'porto', 'tengo problemas con el aula virtual, no me sa', '968745213', 'correo', '2021-02-25', 2),
(3, 2, 2, 1, 3, '2314569874', 'luciana', 'mercedes', 'no visualiza las grabaciones de las clases', '963452178', 'correo', '2021-02-25', 1),
(4, 1, 3, 2, 5, '968745', 'fernando', 'quispe', 'No puedo configurar la sala de videoconferenc', '985632147', 'correo', '2021-02-25', 1),
(5, 3, 2, 2, 5, '', 'rolando', 'caceres', 'recomienda que se use el google meet y que se', '963784521', '', '2021-02-25', 3),
(6, 2, 2, 2, 5, '984562', 'olinda', 'Quispe', 'No le visualiza el sala que cree en mi calend', '968745213', '', '2021-02-25', 2),
(7, 2, 2, 2, 5, '968541', 'Jaime', 'Condori', 'tengo problemas con el Google Meet, no puedo ', '963845216', '', '2021-02-28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevcastcaso`
--

CREATE TABLE `oevcastcaso` (
  `CAScodigo` int(11) NOT NULL,
  `CASnombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `CASdescripcion` varchar(450) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `CASfecha` date NOT NULL,
  `CASestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevcastcaso`
--

INSERT INTO `oevcastcaso` (`CAScodigo`, `CASnombre`, `CASdescripcion`, `CASfecha`, `CASestado`) VALUES
(1, 'aula virtual', 'problemas, inconveniencias o sugerencias que se presenten con respecto al aula virtual', '2021-02-25', 1),
(2, 'Sistema de Videoconferencia', 'problemas, inconveniencias y sugerencias que se presenten con respecto al Sistema de Videoconferencia', '2021-02-25', 1),
(3, 'Microsoft Teams', 'problemas, inconveniencias y sugerencias que se presenten con respecto al Microsoft Teams', '2021-02-25', 1),
(4, 'Aula Virtual CEPU', 'Aula virtual de Admisión -CEPU', '2021-03-24', 1),
(5, 'nuevo caso', 'descripción de nuevo caso', '2021-03-24', 1);

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
  `PEUfoto` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUcorreoElectronico` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUcelular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUdireccion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUfecha` date NOT NULL,
  `PEUestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevpeutpersonaluptvirtual`
--

INSERT INTO `oevpeutpersonaluptvirtual` (`PEUcodigo`, `ROPcodigo`, `PEUDNI`, `PEUnombres`, `PEUapellidos`, `PEUcorreoElectronico`, `PEUcelular`, `PEUdireccion`, `PEUfecha`, `PEUestado`) VALUES
(1, 1, '78965214', 'William', 'Rodriguez', 'wvrodriguez@upt.pe', '965874123', 'dirección', '2021-02-25', 1),
(2, 2, '96875412', 'Tito', 'Ale Nieto', 'titofale@gmail.com', '983 625 569', 'direccion', '2021-02-25', 1),
(3, 3, '74562015', 'Fanny', 'Clemente Cruz', 'secuptvirtual@upt.pe', '965741236', 'dirección', '2021-02-25', 1),
(4, 1, '78596321', 'Francisco', 'Zapata', 'fzapatam@upt.pe', '987456321', 'direccion', '2021-02-25', 1),
(5, 5, '78526143', 'Gisela', 'Flores Colque', 'giselafloresc13@gmail.com', '963214587', 'direccion', '2021-02-25', 1),
(6, 4, '95632147', 'jenny', 'Huayta Curo', 'jhuaytac@gmail.com', '963784521', 'direccion', '2021-02-25', 1),
(8, 1, '96325874', 'nuevo nombre', 'nuevo apellido', 'correo electronico', '985632147', 'nueva dirección', '2021-03-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevroptrolpersonal`
--

CREATE TABLE `oevroptrolpersonal` (
  `ROPcodigo` int(11) NOT NULL,
  `ROPnombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ROPdescripcion` varchar(450) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ROPfecha` date NOT NULL,
  `ROPestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevroptrolpersonal`
--

INSERT INTO `oevroptrolpersonal` (`ROPcodigo`, `ROPnombre`, `ROPdescripcion`, `ROPfecha`, `ROPestado`) VALUES
(1, 'soporte técnico', 'soporte técnico del Aula Virtual de la Universidad Privada de Tacna', '2021-02-25', 1),
(2, 'Jefe', 'jefe de la oficina de educación virtual de la UPT', '2021-02-15', 1),
(3, 'Apoyo Administrativo', 'Apoyo administrativo de la oficina de educación virtual', '2021-02-25', 1),
(4, 'Docente Capacitador', 'Docente capacitador de la Oficina de educación virtual', '2021-03-15', 2),
(5, 'Apoyo soporte tecnico', 'Apoyo soporte técnico de la Oficina de educación virtual', '2021-02-25', 1),
(6, 'Apoyo docente', 'Apoyo docente de la oficina de educación virtual', '2021-03-19', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevtipttipoqrs`
--

CREATE TABLE `oevtipttipoqrs` (
  `TIPcodigo` int(11) NOT NULL,
  `TIPnombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `TIPdescripcion` varchar(450) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `TIPfecha` date NOT NULL,
  `TIPestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevtipttipoqrs`
--

INSERT INTO `oevtipttipoqrs` (`TIPcodigo`, `TIPnombre`, `TIPdescripcion`, `TIPfecha`, `TIPestado`) VALUES
(1, 'Reclamo', 'Reclamos que se presenten del Aula Virtual', '2021-02-25', 1),
(2, 'Quejas', 'quejas que se presentan con respecto al aula virtual, sistema de videoconferencia , etc.', '2021-02-25', 1),
(3, 'Sugerencias', 'sugerencias con respecto al aula virtual y/o sistema de videoconferencias', '2021-02-25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevtiuttipousuario`
--

CREATE TABLE `oevtiuttipousuario` (
  `TIUcodigo` int(11) NOT NULL,
  `TIUnombre` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `TIUdescripcion` varchar(450) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `TIUfecha` date NOT NULL,
  `TIUestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevtiuttipousuario`
--

INSERT INTO `oevtiuttipousuario` (`TIUcodigo`, `TIUnombre`, `TIUdescripcion`, `TIUfecha`, `TIUestado`) VALUES
(1, 'Estudiante', 'Estudiante de la Universidad Privada de Tacna', '2021-02-25', 1),
(2, 'Docente', 'Docente de la Universidad Privada de Tacna', '2021-03-25', 1);

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
  `UPUfecha` date NOT NULL,
  `UPUestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevuputusuariopersonaluptvirtual`
--

INSERT INTO `oevuputusuariopersonaluptvirtual` (`UPUcodigo`, `PEUcodigo`, `UPUusuario`, `UPUclave`, `UPUprivilegio`, `UPUfecha`, `UPUestado`) VALUES
(1, 1, 'william', 'cnIyV01SOTJDS28xak5LWUF4bkpHZz09', 3, '2021-02-25', 1),
(2, 2, 'jefetito', 'dko0dVRBdXpHaGRrdlRWaFRXcklQdz09', 1, '2021-02-25', 1),
(3, 3, 'fanny', 'UE9xaE1IQTA0aUVraTF6M29CTkRIQT09', 2, '2021-02-25', 1),
(4, 4, 'francisco', 'NGtyOEhMYjVidFdUQUk4VkhWSmZmZz09', 3, '2021-02-25', 1),
(5, 6, 'nelia', 'U3lsSkR1SUJ2cVlLS3NDNUVpREI4dz09', 3, '2021-02-25', 1),
(7, 3, 'fanny2021', 'UE9xaE1IQTA0aUVraTF6M29CTkRIQT09', 2, '2021-03-25', 1);

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
  MODIFY `ACTcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `oevcastcaso`
--
ALTER TABLE `oevcastcaso`
  MODIFY `CAScodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `oevpeutpersonaluptvirtual`
--
ALTER TABLE `oevpeutpersonaluptvirtual`
  MODIFY `PEUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `oevroptrolpersonal`
--
ALTER TABLE `oevroptrolpersonal`
  MODIFY `ROPcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `oevtipttipoqrs`
--
ALTER TABLE `oevtipttipoqrs`
  MODIFY `TIPcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `oevtiuttipousuario`
--
ALTER TABLE `oevtiuttipousuario`
  MODIFY `TIUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `oevuputusuariopersonaluptvirtual`
--
ALTER TABLE `oevuputusuariopersonaluptvirtual`
  MODIFY `UPUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
