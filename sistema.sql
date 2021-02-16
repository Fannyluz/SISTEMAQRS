-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: sistemaqrs
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `caso`
--

DROP TABLE IF EXISTS `caso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `caso` (
  `CodCaso` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Fecha` varchar(45) NOT NULL,
  `Estado` int NOT NULL,
  PRIMARY KEY (`CodCaso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caso`
--

LOCK TABLES `caso` WRITE;
/*!40000 ALTER TABLE `caso` DISABLE KEYS */;
/*!40000 ALTER TABLE `caso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personaluptvirtual`
--

DROP TABLE IF EXISTS `personaluptvirtual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personaluptvirtual` (
  `CodPersonalUptVirtual` int NOT NULL AUTO_INCREMENT,
  `CodRolPersonal` int NOT NULL,
  `DNI` varchar(45) NOT NULL,
  `Nombres` varchar(45) NOT NULL,
  `Apellidos` varchar(45) NOT NULL,
  `Foto` varchar(45) NOT NULL,
  `CorreoElectronico` varchar(45) NOT NULL,
  `Celular` varchar(45) NOT NULL,
  `Direccion` varchar(45) NOT NULL,
  `Fecha` varchar(45) NOT NULL,
  `Estado` int NOT NULL,
  PRIMARY KEY (`CodPersonalUptVirtual`),
  KEY `CodRolPersonal_idx` (`CodRolPersonal`),
  CONSTRAINT `CodRolPersonal` FOREIGN KEY (`CodRolPersonal`) REFERENCES `rolpersonal` (`CodRolPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personaluptvirtual`
--

LOCK TABLES `personaluptvirtual` WRITE;
/*!40000 ALTER TABLE `personaluptvirtual` DISABLE KEYS */;
/*!40000 ALTER TABLE `personaluptvirtual` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rolpersonal`
--

DROP TABLE IF EXISTS `rolpersonal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rolpersonal` (
  `CodRolPersonal` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Fecha` varchar(45) NOT NULL,
  `Estado` int NOT NULL,
  PRIMARY KEY (`CodRolPersonal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rolpersonal`
--

LOCK TABLES `rolpersonal` WRITE;
/*!40000 ALTER TABLE `rolpersonal` DISABLE KEYS */;
/*!40000 ALTER TABLE `rolpersonal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoqrs`
--

DROP TABLE IF EXISTS `tipoqrs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipoqrs` (
  `CodTipoQRS` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Fecha` varchar(45) NOT NULL,
  `Estado` int NOT NULL,
  PRIMARY KEY (`CodTipoQRS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoqrs`
--

LOCK TABLES `tipoqrs` WRITE;
/*!40000 ALTER TABLE `tipoqrs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoqrs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipousuario` (
  `CodTipoUsuario` int NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(45) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `Fecha` varchar(45) NOT NULL,
  `Estado` varchar(45) NOT NULL,
  PRIMARY KEY (`CodTipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuariopersonaluptvirtual`
--

DROP TABLE IF EXISTS `usuariopersonaluptvirtual`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuariopersonaluptvirtual` (
  `CodUsuarioPersonalUptVirtual` int NOT NULL AUTO_INCREMENT,
  `CodPersonalUptVirtual` int NOT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Clave` varchar(45) NOT NULL,
  `Privilegio` int NOT NULL,
  `Estado` varchar(45) NOT NULL,
  `Fecha` int NOT NULL,
  PRIMARY KEY (`CodUsuarioPersonalUptVirtual`),
  KEY `CodPersonalUptVirtual_idx` (`CodPersonalUptVirtual`),
  CONSTRAINT `CodPersonalUptVirtual` FOREIGN KEY (`CodPersonalUptVirtual`) REFERENCES `personaluptvirtual` (`CodPersonalUptVirtual`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuariopersonaluptvirtual`
--

LOCK TABLES `usuariopersonaluptvirtual` WRITE;
/*!40000 ALTER TABLE `usuariopersonaluptvirtual` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuariopersonaluptvirtual` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-16 14:42:23
