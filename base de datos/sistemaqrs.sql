-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2021 a las 15:47:51
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
  `ACTfacultad` int(11) DEFAULT NULL,
  `ACTnombres` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTapellidos` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTDescripcion` varchar(450) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTcelular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `ACTcorreoelectronico` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ACTfecha` date NOT NULL,
  `ACTestado` int(11) NOT NULL,
  `ACTacciones` varchar(600) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevactpactividadqrs`
--

INSERT INTO `oevactpactividadqrs` (`ACTcodigo`, `TIPcodigo`, `CAScodigo`, `TIUcodigo`, `UPUcodigo`, `ACTcodigoUPT`, `ACTfacultad`, `ACTnombres`, `ACTapellidos`, `ACTDescripcion`, `ACTcelular`, `ACTcorreoelectronico`, `ACTfecha`, `ACTestado`, `ACTacciones`) VALUES
(1, 1, 1, 1, 1, '2014956320', 0, 'Gladys', 'Condori', 'tengo problemas con el aula virtual, no puedo', '963987456', 'correo', '2021-02-25', 2, ''),
(2, 2, 1, 2, 1, '269854', 0, 'fredy', 'porto', 'tengo problemas con el aula virtual, no me sa', '968745213', 'correo', '2021-02-25', 1, ''),
(3, 2, 2, 1, 3, '2314569874', 0, 'luciana', 'mercedes', 'no visualiza las grabaciones de las clases', '963452178', 'correo', '2021-02-25', 1, ''),
(4, 1, 3, 2, 5, '968745', 0, 'fernando', 'quispe', 'No puedo configurar la sala de videoconferenc', '985632147', 'correo', '2021-02-25', 1, ''),
(5, 3, 2, 2, 5, '', 0, 'rolando', 'caceres', 'recomienda que se use el google meet y que se', '963784521', '', '2021-02-25', 3, ''),
(6, 2, 2, 2, 5, '984562', 0, 'olinda', 'Quispe', 'No le visualiza el sala que cree en mi calend', '968745213', '', '2021-02-25', 2, ''),
(7, 2, 2, 2, 5, '968541', 0, 'Jaime', 'Condori', 'Tengo problemas con el Google Meet.', '963845216', 'jaime@gmail.com', '2021-02-28', 1, ''),
(8, 2, 1, 1, 1, '', 0, 'Sonnia', 'Condori', 'El sistema del aula le votaba', '952701458', 'sonia@gmail.com', '2021-04-19', 2, 'dirigido a william por sonia se le atendio por llamada comrpobar con fe'),
(35, 2, 5, 2, 1, '2014049551', 1, 'ing lanchipa', 'ing lanchipa', 'ing lanchipa', '918091406', 'lanchipa@gmail.com', '2021-04-18', 2, 'se le asesoro por llamada telefonica');

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
(1, 'Aula Virtual', 'Problemas, inconveniencias o sugerencias que se presenten con respecto al aula virtual.', '2021-02-25', 1),
(2, 'Sistema de Videoconferencia', 'problemas, inconveniencias y sugerencias que se presenten con respecto al Sistema de Videoconferencia', '2021-02-25', 1),
(3, 'Microsoft Teams', 'problemas, inconveniencias y sugerencias que se presenten con respecto al Microsoft Teams', '2021-02-25', 1),
(5, 'Google Meet', 'Problemas, inconveniencias o sugerencias que se presenten con respecto al google meet.', '2021-03-24', 1),
(6, 'pir1', 'nueva descripción', '2021-04-04', 2);

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
  `PEUfoto` varchar(450) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUcorreoElectronico` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUcelular` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUdireccion` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `PEUfecha` date NOT NULL,
  `PEUestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevpeutpersonaluptvirtual`
--

INSERT INTO `oevpeutpersonaluptvirtual` (`PEUcodigo`, `ROPcodigo`, `PEUDNI`, `PEUnombres`, `PEUapellidos`, `PEUfoto`, `PEUcorreoElectronico`, `PEUcelular`, `PEUdireccion`, `PEUfecha`, `PEUestado`) VALUES
(1, 1, '78965214', 'William', 'Rodriguez', 'persona5.jpg', 'wvrodriguez@upt.pe', '965874123', 'dirección', '2021-02-25', 1),
(2, 2, '96875412', 'Tito', 'Ale Nieto', 'persona8.jpg', 'titofale@gmail.com', '983 625 569', 'direccion', '2021-02-25', 1),
(3, 3, '74562015', 'Fanny', 'Clemente Cruz', 'personal9.jpg', 'secuptvirtual@upt.pe', '965741236', 'dirección', '2021-02-25', 1),
(4, 1, '78596321', 'Francisco', 'Zapata', 'persona4.jpg', 'fzapatam@upt.pe', '987456321', 'direccion', '2021-02-25', 1),
(5, 5, '78526143', 'Gisela', 'Flores Colque', 'persona7.jpg', 'gisela@gmail.com', '963214587', 'direccion', '2021-02-25', 1),
(6, 4, '95632147', 'Jenny', 'Huayta Curo', 'persona6.jpg', 'jhuaytac@gmail.com', '963784521', 'direccion', '2021-02-25', 1),
(40, 1, '73800724', 'Nelia', 'Escalante', 'persona9.jpg', 'nelia@gmail.com', '987456123', 'Calle Arica', '2021-03-29', 1);

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
(1, 'Soporte Técnico', 'Soporte técnico del Aula Virtual de la Universidad Privada de Tacna', '2021-02-25', 1),
(2, 'Jefe', 'Jefe de la oficina de educación virtual de la UPT', '2021-02-15', 1),
(3, 'Apoyo Administrativo', 'Apoyo administrativo de la oficina de educación virtual', '2021-02-25', 1),
(4, 'Docente Capacitador', 'Docente capacitador de la Oficina de educación virtual', '2021-03-15', 2),
(5, 'Apoyo soporte tecnico', 'Apoyo soporte técnico de la Oficina de educación virtual', '2021-02-25', 1),
(6, 'Apoyo docente', 'Apoyo docente de la oficina de educación virtual', '2021-03-19', 1);

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
(1, 'Reclamo', 'Reclamos que se presenten del Aula Virtual, sistema de videoconferencia , etc.', '2021-02-25', 1),
(2, 'Quejas', 'Quejas que se presentan con respecto al aula virtual, sistema de videoconferencia , etc.', '2021-02-25', 1),
(3, 'Sugerencias', 'Sugerencias con respecto al aula virtual y/o sistema de videoconferencias, etc.', '2021-02-25', 1);

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
(2, 'Docente', 'Docente de la Universidad Privada de Tacna', '2021-03-25', 1),
(3, 'Administrativo', 'Personal Administrativo de la Universidad Privada de Tacna', '2021-03-30', 1),
(4, 'Otros', 'Otros usuarios', '2021-04-04', 1),
(5, 'fany', 'ndg', '2021-04-04', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oevuputusuariopersonaluptvirtual`
--

CREATE TABLE `oevuputusuariopersonaluptvirtual` (
  `UPUcodigo` int(11) NOT NULL,
  `PEUcodigo` int(11) NOT NULL,
  `UPUusuario` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `UPUclave` varchar(500) COLLATE utf8_spanish2_ci NOT NULL,
  `UPUpalabraSecreta` varchar(450) COLLATE utf8_spanish2_ci NOT NULL,
  `UPUprivilegio` int(11) NOT NULL,
  `UPUfecha` date NOT NULL,
  `UPUestado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `oevuputusuariopersonaluptvirtual`
--

INSERT INTO `oevuputusuariopersonaluptvirtual` (`UPUcodigo`, `PEUcodigo`, `UPUusuario`, `UPUclave`, `UPUpalabraSecreta`, `UPUprivilegio`, `UPUfecha`, `UPUestado`) VALUES
(1, 1, 'william', 'c2ltYzFDbzIvTzl5aXUrSXBOck1ackJWRmwwM2ppZG5RSjEyQmx0ZGMzQT0=', 'william123', 3, '2021-02-25', 1),
(2, 2, 'jefetito', 'dko0dVRBdXpHaGRrdlRWaFRXcklQdz09', 'tito', 1, '2021-02-25', 1),
(3, 3, 'fanny', 'UE9xaE1IQTA0aUVraTF6M29CTkRIQT09', 'lucy', 2, '2021-02-25', 1),
(4, 4, 'francisco', 'NGtyOEhMYjVidFdUQUk4VkhWSmZmZz09', 'francisco', 3, '2021-02-25', 1),
(5, 6, 'nelia', 'U3lsSkR1SUJ2cVlLS3NDNUVpREI4dz09', 'nelia', 3, '2021-02-25', 1),
(8, 40, 'nelia', 'R2hRc2IrUzAxZG5IZ3FMYXh6OExZZz09', 'neliaas', 2, '2021-03-29', 1);

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
  MODIFY `ACTcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `oevcastcaso`
--
ALTER TABLE `oevcastcaso`
  MODIFY `CAScodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `oevpeutpersonaluptvirtual`
--
ALTER TABLE `oevpeutpersonaluptvirtual`
  MODIFY `PEUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `oevroptrolpersonal`
--
ALTER TABLE `oevroptrolpersonal`
  MODIFY `ROPcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `oevtipttipoqrs`
--
ALTER TABLE `oevtipttipoqrs`
  MODIFY `TIPcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `oevtiuttipousuario`
--
ALTER TABLE `oevtiuttipousuario`
  MODIFY `TIUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `oevuputusuariopersonaluptvirtual`
--
ALTER TABLE `oevuputusuariopersonaluptvirtual`
  MODIFY `UPUcodigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
