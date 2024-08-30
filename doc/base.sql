-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: proyecto_software1
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `asistencias`
--

DROP TABLE IF EXISTS `asistencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `asistencias` (
  `idAsistencia` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idEmpleado` bigint unsigned NOT NULL,
  `idCapacitacion` bigint unsigned NOT NULL,
  `idDepartamento` bigint unsigned NOT NULL,
  `asistio` enum('si','no','justifico') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `justificacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idAsistencia`),
  KEY `asistencias_idempleado_foreign` (`idEmpleado`),
  KEY `asistencias_idcapacitacion_foreign` (`idCapacitacion`),
  KEY `asistencias_iddepartamento_foreign` (`idDepartamento`),
  CONSTRAINT `asistencias_idcapacitacion_foreign` FOREIGN KEY (`idCapacitacion`) REFERENCES `capacitacions` (`idCapacitacion`) ON DELETE CASCADE,
  CONSTRAINT `asistencias_iddepartamento_foreign` FOREIGN KEY (`idDepartamento`) REFERENCES `departamentos` (`idDepartamento`) ON DELETE CASCADE,
  CONSTRAINT `asistencias_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencias`
--

LOCK TABLES `asistencias` WRITE;
/*!40000 ALTER TABLE `asistencias` DISABLE KEYS */;
/*!40000 ALTER TABLE `asistencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `capacitacions`
--

DROP TABLE IF EXISTS `capacitacions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `capacitacions` (
  `idCapacitacion` bigint unsigned NOT NULL AUTO_INCREMENT,
  `capfechainicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capfechafin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capcapacitador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDepartamento` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idCapacitacion`),
  KEY `capacitacions_iddepartamento_foreign` (`idDepartamento`),
  CONSTRAINT `capacitacions_iddepartamento_foreign` FOREIGN KEY (`idDepartamento`) REFERENCES `departamentos` (`idDepartamento`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacitacions`
--

LOCK TABLES `capacitacions` WRITE;
/*!40000 ALTER TABLE `capacitacions` DISABLE KEYS */;
/*!40000 ALTER TABLE `capacitacions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `departamentos` (
  `idDepartamento` bigint unsigned NOT NULL AUTO_INCREMENT,
  `depnombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'Abastecimiento','2023-07-23 09:31:41','2023-07-23 09:31:41'),(2,'Compras','2023-07-23 09:31:41','2023-07-23 09:31:41'),(3,'Finanzas','2023-07-23 09:31:41','2023-07-23 09:31:41'),(4,'Ventas','2023-07-23 09:31:41','2023-07-23 09:31:41'),(5,'Adminstrar','2023-07-23 09:31:41','2023-07-23 09:31:41'),(6,'Seguridad','2023-07-23 09:31:41','2023-07-23 09:31:41');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_compras`
--

DROP TABLE IF EXISTS `detalle_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_compras` (
  `idDetallecompra` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idOrdencompra` bigint unsigned NOT NULL,
  `idProducto` bigint unsigned NOT NULL,
  `dcomcantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idDetallecompra`),
  KEY `detalle_compras_idordencompra_foreign` (`idOrdencompra`),
  KEY `detalle_compras_idproducto_foreign` (`idProducto`),
  CONSTRAINT `detalle_compras_idordencompra_foreign` FOREIGN KEY (`idOrdencompra`) REFERENCES `orden_compras` (`idOrdencompra`) ON DELETE CASCADE,
  CONSTRAINT `detalle_compras_idproducto_foreign` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_compras`
--

LOCK TABLES `detalle_compras` WRITE;
/*!40000 ALTER TABLE `detalle_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_ventas`
--

DROP TABLE IF EXISTS `detalle_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `detalle_ventas` (
  `idDventa` bigint unsigned NOT NULL AUTO_INCREMENT,
  `idVenta` bigint unsigned NOT NULL,
  `idProducto` bigint unsigned NOT NULL,
  `dvcantidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dvpreciounitario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idDventa`),
  KEY `detalle_ventas_idventa_foreign` (`idVenta`),
  KEY `detalle_ventas_idproducto_foreign` (`idProducto`),
  CONSTRAINT `detalle_ventas_idproducto_foreign` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE CASCADE,
  CONSTRAINT `detalle_ventas_idventa_foreign` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVenta`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_ventas`
--

LOCK TABLES `detalle_ventas` WRITE;
/*!40000 ALTER TABLE `detalle_ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalle_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documentos_contables`
--

DROP TABLE IF EXISTS `documentos_contables`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `documentos_contables` (
  `idDocumentocontable` bigint unsigned NOT NULL AUTO_INCREMENT,
  `dconnombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dconfecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dconhora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dconurl` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEmpleado` bigint unsigned NOT NULL,
  `docontable_id` bigint unsigned NOT NULL,
  `docontable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idDocumentocontable`),
  KEY `documentos_contables_idempleado_foreign` (`idEmpleado`),
  CONSTRAINT `documentos_contables_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documentos_contables`
--

LOCK TABLES `documentos_contables` WRITE;
/*!40000 ALTER TABLE `documentos_contables` DISABLE KEYS */;
/*!40000 ALTER TABLE `documentos_contables` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `idEmpleado` bigint unsigned NOT NULL AUTO_INCREMENT,
  `empnombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empapellidop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empapellidom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empdni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `empdireccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emptelefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idDepartamento` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idEmpleado`),
  KEY `empleados_iddepartamento_foreign` (`idDepartamento`),
  CONSTRAINT `empleados_iddepartamento_foreign` FOREIGN KEY (`idDepartamento`) REFERENCES `departamentos` (`idDepartamento`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (1,'Jaime Eduardo','Centurion','Goicochea','70683607','Dirección 99','981268897',1,'2023-07-23 09:31:41','2023-07-23 09:31:41');
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estados_financieros`
--

DROP TABLE IF EXISTS `estados_financieros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `estados_financieros` (
  `idEstadofinanciero` bigint unsigned NOT NULL AUTO_INCREMENT,
  `esfitipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idEstadofinanciero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estados_financieros`
--

LOCK TABLES `estados_financieros` WRITE;
/*!40000 ALTER TABLE `estados_financieros` DISABLE KEYS */;
INSERT INTO `estados_financieros` VALUES (1,'Estado 1','2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'Estado 2','2023-07-23 09:31:38','2023-07-23 09:31:38');
/*!40000 ALTER TABLE `estados_financieros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `financieros`
--

DROP TABLE IF EXISTS `financieros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `financieros` (
  `idFinanciero` bigint unsigned NOT NULL AUTO_INCREMENT,
  `finanio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fintipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idcomprobante` int NOT NULL,
  `idEstadofinanciero` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idFinanciero`),
  KEY `financieros_idestadofinanciero_foreign` (`idEstadofinanciero`),
  CONSTRAINT `financieros_idestadofinanciero_foreign` FOREIGN KEY (`idEstadofinanciero`) REFERENCES `estados_financieros` (`idEstadofinanciero`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `financieros`
--

LOCK TABLES `financieros` WRITE;
/*!40000 ALTER TABLE `financieros` DISABLE KEYS */;
/*!40000 ALTER TABLE `financieros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_05_26_033115_create_tipo_productos_table',1),(2,'2014_05_29_211427_create_departamentos_table',1),(3,'2014_05_29_213345_create_unidadmedidas_table',1),(4,'2014_06_26_031852_create_empleados_table',1),(5,'2014_06_26_032434_create_tipo_comprobante_ventas_table',1),(6,'2014_06_26_032516_create_tipo_pagos_table',1),(7,'2014_06_26_032628_create_estados_financieros_table',1),(8,'2014_06_26_032655_create_proveedores_table',1),(9,'2014_06_26_032811_create_productos_table',1),(10,'2014_10_12_000000_create_users_table',1),(11,'2019_12_14_000001_create_personal_access_tokens_table',1),(12,'2023_06_26_032240_create_ventas_table',1),(13,'2023_06_26_032311_create_detalle_ventas_table',1),(14,'2023_06_26_032725_create_orden_compras_table',1),(15,'2023_06_26_032739_create_detalle_compras_table',1),(16,'2023_06_29_211309_create_capacitacions_table',1),(17,'2023_06_29_211543_create_asistencias_table',1),(18,'2023_06_29_234330_create_financieros_table',1),(19,'2023_07_08_231146_create_permission_tables',1),(20,'2023_07_10_032555_create_documentos_contables_table',1),(21,'2023_07_11_095136_create_solicituds_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` VALUES (1,'App\\Models\\User',1);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orden_compras`
--

DROP TABLE IF EXISTS `orden_compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orden_compras` (
  `idOrdencompra` bigint unsigned NOT NULL AUTO_INCREMENT,
  `orcomfecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orcomhora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orcomdescripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orcomtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orcomestado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProveedor` bigint unsigned NOT NULL,
  `idEmpleado` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idOrdencompra`),
  KEY `orden_compras_idproveedor_foreign` (`idProveedor`),
  KEY `orden_compras_idempleado_foreign` (`idEmpleado`),
  CONSTRAINT `orden_compras_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE,
  CONSTRAINT `orden_compras_idproveedor_foreign` FOREIGN KEY (`idProveedor`) REFERENCES `proveedores` (`idProveedor`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orden_compras`
--

LOCK TABLES `orden_compras` WRITE;
/*!40000 ALTER TABLE `orden_compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `orden_compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'panel.Abastecimiento','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'panel.Compras','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(3,'panel.Finanzas','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(4,'panel.Ventas','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(5,'panel.Adminstrar','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(6,'panel.Seguridad','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(7,'productos.index','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(8,'productos.create','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(9,'productos.show','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(10,'productos.edit','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(11,'productos.destroy','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(12,'solicituds.index','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(13,'solicituds.create','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(14,'solicituds.show','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(15,'solicituds.edit','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(16,'solicituds.destroy','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(17,'ventas.index','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(18,'ventas.create','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(19,'ventas.show','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(20,'ventas.edit','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(21,'ventas.destroy','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(22,'documentos-contables.index','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(23,'documentos-contables.create','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(24,'documentos-contables.show','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(25,'documentos-contables.edit','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(26,'documentos-contables.destroy','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(27,'tipo-pagos.index','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(28,'tipo-pagos.create','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(29,'tipo-pagos.show','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(30,'tipo-pagos.edit','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(31,'tipo-pagos.destroy','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(32,'tipo-comprobante-ventas.index','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(33,'tipo-comprobante-ventas.create','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(34,'tipo-comprobante-ventas.show','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(35,'tipo-comprobante-ventas.edit','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(36,'tipo-comprobante-ventas.destroy','web','2023-07-23 09:31:39','2023-07-23 09:31:39'),(37,'capacitacions.index','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(38,'capacitacions.create','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(39,'capacitacions.show','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(40,'capacitacions.edit','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(41,'capacitacions.destroy','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(42,'departamentos.index','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(43,'departamentos.create','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(44,'departamentos.show','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(45,'departamentos.edit','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(46,'departamentos.destroy','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(47,'empleados.index','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(48,'empleados.create','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(49,'empleados.show','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(50,'empleados.edit','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(51,'empleados.destroy','web','2023-07-23 09:31:40','2023-07-23 09:31:40'),(52,'roles.index','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(53,'roles.create','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(54,'roles.show','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(55,'roles.edit','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(56,'roles.destroy','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(57,'permisos.index','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(58,'permisos.create','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(59,'permisos.show','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(60,'permisos.edit','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(61,'permisos.destroy','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(62,'orden-compras.index','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(63,'orden-compras.create','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(64,'orden-compras.show','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(65,'orden-compras.edit','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(66,'orden-compras.destroy','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(67,'proveedores.index','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(68,'proveedores.create','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(69,'proveedores.show','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(70,'proveedores.edit','web','2023-07-23 09:31:41','2023-07-23 09:31:41'),(71,'proveedores.destroy','web','2023-07-23 09:31:41','2023-07-23 09:31:41');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `idProducto` bigint unsigned NOT NULL AUTO_INCREMENT,
  `pronombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prodescripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propreciounitario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `propreciocompra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prostock` int NOT NULL,
  `prostockminimo` int NOT NULL,
  `idTipoproducto` bigint unsigned NOT NULL,
  `idUnidadmedida` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idProducto`),
  KEY `productos_idtipoproducto_foreign` (`idTipoproducto`),
  KEY `productos_idunidadmedida_foreign` (`idUnidadmedida`),
  CONSTRAINT `productos_idtipoproducto_foreign` FOREIGN KEY (`idTipoproducto`) REFERENCES `tipo_productos` (`idTipoproducto`) ON DELETE CASCADE,
  CONSTRAINT `productos_idunidadmedida_foreign` FOREIGN KEY (`idUnidadmedida`) REFERENCES `unidadmedidas` (`idUnidadmedida`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'Gasolina 95','Gasolina para gente pudiente','20.8','50.5',99,100,1,1,'2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'Gasolina 90','Gasolina para motos y autos','19.8','50.5',1000000,100,1,1,'2023-07-23 09:31:38','2023-07-23 09:31:38'),(3,'Gasolina 84','Gasolina para pobres','17.8','50.5',1000000,100,1,1,'2023-07-23 09:31:38','2023-07-23 09:31:38'),(4,'Aceite 20w50','Aceite para motor','30','50.5',50,2,4,2,'2023-07-23 09:31:38','2023-07-23 09:31:38'),(5,'Mangeras de combustible','Mangera donde pasa el combustible',NULL,'50.5',30,2,2,3,'2023-07-23 09:31:38','2023-07-23 09:31:38'),(6,'Mangeras de incendio','Mangera para extintor',NULL,'50.5',30,2,2,3,'2023-07-23 09:31:38','2023-07-23 09:31:38');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedores`
--

DROP TABLE IF EXISTS `proveedores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedores` (
  `idProveedor` bigint unsigned NOT NULL AUTO_INCREMENT,
  `provdoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provtelefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provcorreo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provdireccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `provrazonsocial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idProveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedores`
--

LOCK TABLES `proveedores` WRITE;
/*!40000 ALTER TABLE `proveedores` DISABLE KEYS */;
INSERT INTO `proveedores` VALUES (1,'789587412568','987654321','correo1@example.com','Dirección 1','Razón Social 1','2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'951235745896','987654321','correo2@example.com','Dirección 2','Razón Social 2','2023-07-23 09:31:38','2023-07-23 09:31:38');
/*!40000 ALTER TABLE `proveedores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(32,1),(33,1),(34,1),(35,1),(36,1),(37,1),(38,1),(39,1),(40,1),(41,1),(42,1),(43,1),(44,1),(45,1),(46,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(57,1),(58,1),(59,1),(60,1),(61,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(1,2),(2,3),(3,4),(4,5),(5,6),(6,7),(1,8),(7,8),(8,8),(9,8),(10,8),(11,8),(12,8),(13,8),(14,8),(15,8),(16,8),(1,9),(1,10),(12,10),(13,10),(14,10),(15,10),(16,10),(1,11),(7,11),(8,11),(9,11),(10,11),(11,11),(12,11),(13,11),(14,11),(15,11),(16,11);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'Abastecimiento','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(3,'Compras','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(4,'Finanzas','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(5,'Ventas','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(6,'Adminstrar','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(7,'Seguridad','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(8,'Supervisor','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(9,'Jefe Comercial','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(10,'Jefe Finanzas','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(11,'Gerente General','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(12,'Contador','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(13,'Vendedor','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(14,'Jefe de Personal','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(15,'Jefe Seguridad','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(16,'Brigadista','web','2023-07-23 09:31:38','2023-07-23 09:31:38'),(17,'Prevencionista','web','2023-07-23 09:31:38','2023-07-23 09:31:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicituds`
--

DROP TABLE IF EXISTS `solicituds`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `solicituds` (
  `idSolicitud` bigint unsigned NOT NULL AUTO_INCREMENT,
  `solnombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solarchivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solcantidad` int DEFAULT NULL,
  `soldescripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `solobservacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `solestado` enum('aprobado','observado','pendiente','entregado','proceso') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pendiente',
  `idEmpleado` bigint unsigned NOT NULL,
  `idDepartamento` bigint unsigned NOT NULL,
  `solicitudable_id` bigint unsigned DEFAULT NULL,
  `solicitudable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `solicituds_idempleado_foreign` (`idEmpleado`),
  KEY `solicituds_iddepartamento_foreign` (`idDepartamento`),
  CONSTRAINT `solicituds_iddepartamento_foreign` FOREIGN KEY (`idDepartamento`) REFERENCES `departamentos` (`idDepartamento`) ON DELETE CASCADE,
  CONSTRAINT `solicituds_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicituds`
--

LOCK TABLES `solicituds` WRITE;
/*!40000 ALTER TABLE `solicituds` DISABLE KEYS */;
/*!40000 ALTER TABLE `solicituds` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_comprobante_ventas`
--

DROP TABLE IF EXISTS `tipo_comprobante_ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_comprobante_ventas` (
  `idTipocomprobante` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tcomcomprobante` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTipocomprobante`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_comprobante_ventas`
--

LOCK TABLES `tipo_comprobante_ventas` WRITE;
/*!40000 ALTER TABLE `tipo_comprobante_ventas` DISABLE KEYS */;
INSERT INTO `tipo_comprobante_ventas` VALUES (1,'Factura','2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'Boleta','2023-07-23 09:31:38','2023-07-23 09:31:38'),(3,'Nota de Crédito','2023-07-23 09:31:38','2023-07-23 09:31:38'),(4,'Nota de Débito','2023-07-23 09:31:38','2023-07-23 09:31:38'),(5,'Factura Electrónica','2023-07-23 09:31:38','2023-07-23 09:31:38'),(6,'Boleta Electrónica','2023-07-23 09:31:38','2023-07-23 09:31:38');
/*!40000 ALTER TABLE `tipo_comprobante_ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_pagos`
--

DROP TABLE IF EXISTS `tipo_pagos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_pagos` (
  `idTipopago` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tpagotipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTipopago`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_pagos`
--

LOCK TABLES `tipo_pagos` WRITE;
/*!40000 ALTER TABLE `tipo_pagos` DISABLE KEYS */;
INSERT INTO `tipo_pagos` VALUES (1,'Efectivo','2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'Tarjeta','2023-07-23 09:31:38','2023-07-23 09:31:38'),(3,'Cheque','2023-07-23 09:31:38','2023-07-23 09:31:38'),(4,'Transferencia','2023-07-23 09:31:38','2023-07-23 09:31:38'),(5,'Deposito','2023-07-23 09:31:38','2023-07-23 09:31:38'),(6,'Otro','2023-07-23 09:31:38','2023-07-23 09:31:38');
/*!40000 ALTER TABLE `tipo_pagos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_productos`
--

DROP TABLE IF EXISTS `tipo_productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipo_productos` (
  `idTipoproducto` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tpronombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idTipoproducto`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_productos`
--

LOCK TABLES `tipo_productos` WRITE;
/*!40000 ALTER TABLE `tipo_productos` DISABLE KEYS */;
INSERT INTO `tipo_productos` VALUES (1,'Combustible','2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'Repuestos','2023-07-23 09:31:38','2023-07-23 09:31:38'),(3,'Acesorios','2023-07-23 09:31:38','2023-07-23 09:31:38'),(4,'Lubricantes','2023-07-23 09:31:38','2023-07-23 09:31:38');
/*!40000 ALTER TABLE `tipo_productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `unidadmedidas`
--

DROP TABLE IF EXISTS `unidadmedidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `unidadmedidas` (
  `idUnidadmedida` bigint unsigned NOT NULL AUTO_INCREMENT,
  `umednombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idUnidadmedida`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `unidadmedidas`
--

LOCK TABLES `unidadmedidas` WRITE;
/*!40000 ALTER TABLE `unidadmedidas` DISABLE KEYS */;
INSERT INTO `unidadmedidas` VALUES (1,'Galón','2023-07-23 09:31:38','2023-07-23 09:31:38'),(2,'Litro','2023-07-23 09:31:38','2023-07-23 09:31:38'),(3,'Unidad','2023-07-23 09:31:38','2023-07-23 09:31:38'),(4,'Caja','2023-07-23 09:31:38','2023-07-23 09:31:38');
/*!40000 ALTER TABLE `unidadmedidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `idUsuario` bigint unsigned NOT NULL AUTO_INCREMENT,
  `usunombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuemail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usucontra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idEmpleado` bigint unsigned NOT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE KEY `usuarios_usuemail_unique` (`usuemail`),
  KEY `usuarios_idempleado_foreign` (`idEmpleado`),
  CONSTRAINT `usuarios_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Jaime Eduardo Centurion','admin@example.com','$2y$10$z.a/f1AkdEytYdwXHCANneBcBejhmayOeB4eCDspxjwfx3CfjSVcG',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `idVenta` bigint unsigned NOT NULL AUTO_INCREMENT,
  `venfecha` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendocumentocliente` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venhora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venestado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pagado',
  `venmonto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venimpuesto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ventotalneto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `venobservacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idTipocomprobante` bigint unsigned NOT NULL,
  `idTipopago` bigint unsigned NOT NULL,
  `idEmpleado` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idVenta`),
  KEY `ventas_idtipocomprobante_foreign` (`idTipocomprobante`),
  KEY `ventas_idtipopago_foreign` (`idTipopago`),
  KEY `ventas_idempleado_foreign` (`idEmpleado`),
  CONSTRAINT `ventas_idempleado_foreign` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleado`) ON DELETE CASCADE,
  CONSTRAINT `ventas_idtipocomprobante_foreign` FOREIGN KEY (`idTipocomprobante`) REFERENCES `tipo_comprobante_ventas` (`idTipocomprobante`) ON DELETE CASCADE,
  CONSTRAINT `ventas_idtipopago_foreign` FOREIGN KEY (`idTipopago`) REFERENCES `tipo_pagos` (`idTipopago`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-07-22 23:32:37
