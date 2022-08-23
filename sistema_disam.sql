-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2022 a las 19:36:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_disam`
--
CREATE DATABASE IF NOT EXISTS `sistema_disam` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sistema_disam`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_organizador` bigint(20) UNSIGNED NOT NULL,
  `id_lugar` bigint(20) UNSIGNED NOT NULL,
  `id_coordinador` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_finalizacion` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_finalizacion` time NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `objetivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizaciones`
--

CREATE TABLE `autorizaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `autorizacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `autorizaciones`
--

INSERT INTO `autorizaciones` (`id`, `autorizacion`, `created_at`, `updated_at`) VALUES
(1, 'Autorizado', '2022-08-23 20:27:45', '2022-08-23 20:27:45'),
(2, 'No Autorizado', '2022-08-23 20:27:45', '2022-08-23 20:27:45'),
(3, 'Pendiente', '2022-08-23 20:27:45', '2022-08-23 20:27:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinadores`
--

CREATE TABLE `coordinadores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tecnico` bigint(20) UNSIGNED NOT NULL,
  `id_coordinacion` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`, `created_at`, `updated_at`) VALUES
(1, 'Ahuachapán', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(2, 'Cabañas', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(3, 'Chalatenango', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(4, 'Cuscatlán', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(5, 'La Libertad', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(6, 'La Paz', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(7, 'La Unión', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(8, 'Morazán', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(9, 'San Miguel', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(10, 'San Salvador', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(11, 'San Vicente', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(12, 'Santa Ana', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(13, 'Sonsonate', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(14, 'Usulután', '2022-08-23 20:27:34', '2022-08-23 20:27:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencias`
--

CREATE TABLE `dependencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `dependencias`
--

INSERT INTO `dependencias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Unidad de Alimentos', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(2, 'Area Administracion', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(3, 'Area Informatica', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(4, 'Unidad Juridica', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(5, 'Unidad de Vigilancia de Enfermedades Transmitiras', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(6, 'Unidad de Saneamiento Ambiental', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(7, 'Fabrica de artefactos Sanitarios', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(8, 'Unidad de Alcohol y Tabaco', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(9, 'Unidad de Zoonosis', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(10, 'Laboratorio de productos biologicos', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(11, 'Unidad Ambiental', '2022-08-23 20:27:44', '2022-08-23 20:27:44'),
(12, 'Direccion', '2022-08-23 20:27:44', '2022-08-23 20:27:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descripcion_equipos`
--

CREATE TABLE `descripcion_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `descripcion_equipos`
--

INSERT INTO `descripcion_equipos` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(5, 'CPU', '2022-08-23 20:58:13', '2022-08-23 20:59:30'),
(6, 'Aire acondicionado', '2022-08-23 20:59:59', '2022-08-23 20:59:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_descripcion` bigint(20) UNSIGNED NOT NULL,
  `id_ubicacion` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `id_fuente` bigint(20) UNSIGNED NOT NULL,
  `id_unidad` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_adquisicion` date NOT NULL,
  `valor_adquisicion` double(8,2) NOT NULL,
  `valor_actual` double(8,2) NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_actividades`
--

CREATE TABLE `estados_actividades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_actividades`
--

INSERT INTO `estados_actividades` (`id`, `tipo_estado`, `created_at`, `updated_at`) VALUES
(1, 'Realizada', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(2, 'Suspendida', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(3, 'Pospuesta', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(4, 'Inasistencia', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(5, 'Pendiente', '2022-08-23 20:27:46', '2022-08-23 20:27:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_equipos`
--

CREATE TABLE `estados_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_equipos`
--

INSERT INTO `estados_equipos` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Bueno', '2022-08-23 20:27:48', '2022-08-23 20:27:48'),
(2, 'Malo', '2022-08-23 20:27:48', '2022-08-23 20:27:48'),
(3, 'Regular', '2022-08-23 20:27:48', '2022-08-23 20:27:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_permisos`
--

CREATE TABLE `estados_permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_permisos`
--

INSERT INTO `estados_permisos` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Aprobada', '2022-08-23 20:27:48', '2022-08-23 20:27:48'),
(2, 'Rechazada', '2022-08-23 20:27:48', '2022-08-23 20:27:48'),
(3, 'Pendiente', '2022-08-23 20:27:48', '2022-08-23 20:27:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_salidas`
--

CREATE TABLE `estados_salidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_salidas`
--

INSERT INTO `estados_salidas` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(2, 'Realizada', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(3, 'Cancelada', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(4, 'Pospuesta', '2022-08-23 20:27:46', '2022-08-23 20:27:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_usuarios`
--

CREATE TABLE `estados_usuarios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_usuarios`
--

INSERT INTO `estados_usuarios` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(2, 'Inactivo', '2022-08-23 20:27:44', '2022-08-23 20:27:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fuente_equipos`
--

CREATE TABLE `fuente_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fuente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `fuente_equipos`
--

INSERT INTO `fuente_equipos` (`id`, `fuente`, `created_at`, `updated_at`) VALUES
(3, 'Union Europea', '2022-08-23 21:00:58', '2022-08-23 21:00:58'),
(4, 'APSISA', '2022-08-23 21:01:46', '2022-08-23 21:01:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_departamento` bigint(20) UNSIGNED NOT NULL,
  `id_municipio` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `id_departamento`, `id_municipio`, `codigo`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 10, 179, '1', 'DISAM', '2022-08-23 20:27:43', '2022-08-23 20:27:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_05_14_170222_departamentos', 1),
(4, '2022_05_15_170259_municipios', 1),
(5, '2022_06_19_194210_dependencias', 1),
(6, '2022_06_20_142539_lugares', 1),
(7, '2022_06_20_142547_roles', 1),
(8, '2022_06_20_142613_estados_usuarios', 1),
(9, '2022_06_20_142623_users', 1),
(10, '2022_06_21_153829_salas', 1),
(11, '2022_06_21_154103_autorizaciones', 1),
(12, '2022_06_21_164102_solicitudes_salas', 1),
(13, '2022_06_21_165105_estados_actividades', 1),
(14, '2022_06_23_151826_actividades', 1),
(15, '2022_06_28_210648_vehiculos', 1),
(16, '2022_06_29_145941_transportes', 1),
(17, '2022_06_29_160148_solicitudes_transportes', 1),
(18, '2022_06_30_142321_solicitud_combustibles', 1),
(19, '2022_07_01_174434_estados_salida', 1),
(20, '2022_07_01_174506_registros_salidas', 1),
(21, '2022_07_15_162314_motivos_permisos', 1),
(22, '2022_07_15_180118_tipos_permisos', 1),
(23, '2022_07_19_150336_tipos_coordinaciones', 1),
(24, '2022_07_19_150418_coordinadores', 1),
(25, '2022_07_19_175753_estados_permisos', 1),
(26, '2022_07_19_175904_permisos', 1),
(27, '2022_08_09_141718_descripcion_equipos', 1),
(28, '2022_08_09_142024_ubicacion_equipos', 1),
(29, '2022_08_09_142138_estados_equipos', 1),
(30, '2022_08_09_142224_fuente_equipos', 1),
(31, '2022_08_09_155811_equipos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos_permisos`
--

CREATE TABLE `motivos_permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `motivos_permisos`
--

INSERT INTO `motivos_permisos` (`id`, `motivo`, `created_at`, `updated_at`) VALUES
(1, 'Personal', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(2, 'Enfermedad', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(3, 'Enfermedad gravísima de pariente', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(4, 'Duelo', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(5, 'Compensatorio', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(6, 'Oficial', '2022-08-23 20:27:47', '2022-08-23 20:27:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_departamento` bigint(20) UNSIGNED NOT NULL,
  `municipio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `id_departamento`, `municipio`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ahuachapán', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(2, 1, 'Apaneca', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(3, 1, 'Atiquizaya', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(4, 1, 'Concepción de Ataco', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(5, 1, 'El Refugio', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(6, 1, 'Guaymango', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(7, 1, 'Jujutla', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(8, 1, 'San Francisco Menéndez', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(9, 1, 'San Lorenzo', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(10, 1, 'San Pedro Puxtla', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(11, 1, 'Tacuba', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(12, 1, 'Turín', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(13, 2, 'Sensuntepeque', '2022-08-23 20:27:35', '2022-08-23 20:27:35'),
(14, 2, 'Cinquera', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(15, 2, 'Dolores', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(16, 2, 'Guacotecti', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(17, 2, 'Ilobasco', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(18, 2, 'Jutiapa', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(19, 2, 'San Isidro', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(20, 2, 'Tejutepeque', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(21, 2, 'Victoria', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(22, 3, 'Chalatenango', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(23, 3, 'Agua Caliente', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(24, 3, 'Arcatao', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(25, 3, 'Azacualpa', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(26, 3, 'Cancasque', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(27, 3, 'Citalá', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(28, 3, 'Comalapa', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(29, 3, 'Concepción Quezaltepeque', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(30, 3, 'Dulce Nombre de María', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(31, 3, 'El Carrizal', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(32, 3, 'El Paraíso', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(33, 3, 'La Laguna', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(34, 3, 'La Palma', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(35, 3, 'La Reina', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(36, 3, 'Las Flores', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(37, 3, 'Las Vueltas', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(38, 3, 'Nombre de Jesús', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(39, 3, 'Nueva Concepción', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(40, 3, 'Nueva Trinidad', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(41, 3, 'Ojos de Agua', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(42, 3, 'Potonico', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(43, 3, 'San Antonio de la Cruz', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(44, 3, 'San Antonio Los Ranchos', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(45, 3, 'San Fernando', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(46, 3, 'San Francisco Lempa', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(47, 3, 'San Francisco Morazán', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(48, 3, 'San Ignacio', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(49, 3, 'San Isidro Labrador', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(50, 3, 'San Luis del Carmen', '2022-08-23 20:27:36', '2022-08-23 20:27:36'),
(51, 3, 'San Miguel de Mercedes', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(52, 3, 'San Rafael', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(53, 3, 'Santa Rita', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(54, 3, 'Tejutla', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(55, 4, 'Cojutepeque ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(56, 4, 'Candelaria', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(57, 4, 'El Carmen', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(58, 4, 'El Rosario', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(59, 4, 'Monte San Juan', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(60, 4, 'Oratorio de Concepción', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(61, 4, 'San Bartolomé Perulapía', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(62, 4, 'San Cristóbal', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(63, 4, 'San José Guayabal', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(64, 4, 'San Pedro Perulapán', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(65, 4, 'San Rafael Cedros', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(66, 4, 'San Ramón', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(67, 4, 'Santa Cruz Analquito', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(68, 4, 'Santa Cruz Michapa', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(69, 4, 'Suchitoto', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(70, 4, 'Tenancingo', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(71, 5, 'Santa Tecla ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(72, 5, 'Antiguo Cuscatlán', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(73, 5, 'Chiltiupán ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(74, 5, 'Ciudad Arce ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(75, 5, 'Colón ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(76, 5, 'Comasagua ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(77, 5, 'Huizúcar ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(78, 5, 'Jayaque ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(79, 5, 'Jicalapa ', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(80, 5, 'La Libertad', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(81, 5, 'Nuevo Cuscatlán', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(82, 5, 'Quezaltepeque', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(83, 5, 'San Juan Opico', '2022-08-23 20:27:37', '2022-08-23 20:27:37'),
(84, 5, 'Sacacoyo', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(85, 5, 'San José Villanueva', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(86, 5, 'San Matías', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(87, 5, 'San Pablo Tacachico ', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(88, 5, 'Talnique ', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(89, 5, 'Tamanique ', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(90, 5, 'Teotepeque ', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(91, 5, 'Tepecoyo ', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(92, 5, 'Zaragoza ', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(93, 6, 'Zacatecoluca', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(94, 6, 'Cuyultitán', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(95, 6, 'El Rosario', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(96, 6, 'Jerusalén', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(97, 6, 'Mercedes La Ceiba', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(98, 6, 'Olocuilta', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(99, 6, 'Paraíso de Osorio', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(100, 6, 'Paraíso de Osorio', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(101, 6, 'San Emigdio', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(102, 6, 'San Francisco Chinameca', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(103, 6, 'San Pedro Masahuat', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(104, 6, 'San Juan Nonualco', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(105, 6, 'San Juan Talpa', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(106, 6, 'San Juan Tepezontes', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(107, 6, 'San Luis La Herradura', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(108, 6, 'San Luis Talpa', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(109, 6, 'San Miguel Tepezontes', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(110, 6, 'San Pedro Nonualco', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(111, 6, 'San Rafael Obrajuelo', '2022-08-23 20:27:38', '2022-08-23 20:27:38'),
(112, 6, 'Santa María Ostuma', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(113, 6, 'Santiago Nonualco', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(114, 6, 'Tapalhuaca', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(115, 7, 'La Unión', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(116, 7, 'Anamorós', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(117, 7, 'Bolívar', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(118, 7, 'Concepción de Oriente', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(119, 7, 'Conchagua', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(120, 7, 'El Carmen', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(121, 7, 'El Sauce', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(122, 7, 'Intipucá', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(123, 7, 'Lislique', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(124, 7, 'Meanguera del Golfo', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(125, 7, 'Nueva Esparta', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(126, 7, 'Pasaquina', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(127, 7, 'Polorós', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(128, 7, 'San Alejo', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(129, 7, 'San José', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(130, 7, 'Santa Rosa de Lima ', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(131, 7, 'Yayantique', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(132, 7, 'Yucuaiquín', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(133, 8, 'San Francisco Gotera', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(134, 8, 'Arambala', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(135, 8, 'Cacaopera', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(136, 8, 'Chilanga', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(137, 8, 'Corinto', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(138, 8, 'Delicias de Concepción', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(139, 8, 'El Divisadero', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(140, 8, 'El Rosario', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(141, 8, 'Gualococti', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(142, 8, 'Guatajiagua', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(143, 8, 'Joateca', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(144, 8, 'Jocoaitique', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(145, 8, 'Jocoro', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(146, 8, 'Lolotiquillo', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(147, 8, 'Meanguera', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(148, 8, 'Osicala', '2022-08-23 20:27:39', '2022-08-23 20:27:39'),
(149, 8, 'Perquín', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(150, 8, 'San Carlos', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(151, 8, 'San Fernando', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(152, 8, 'San Isidro', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(153, 8, 'San Simón', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(154, 8, 'Sensembra', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(155, 8, 'Sociedad', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(156, 8, 'Torola', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(157, 8, 'Yamabal', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(158, 8, 'Yoloaiquín', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(159, 9, 'San Miguel', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(160, 9, 'Carolina', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(161, 9, 'Chapeltique', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(162, 9, 'Chinameca', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(163, 9, 'Chirilagua', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(164, 9, 'Ciudad Barrios', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(165, 9, 'Comacarán', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(166, 9, 'El Tránsito', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(167, 9, 'Lolotique', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(168, 9, 'Moncagua', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(169, 9, 'Nueva Guadalupe', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(170, 9, 'Nuevo Edén de San Juan', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(171, 9, 'Quelepa', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(172, 9, 'San Antonio', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(173, 9, 'San Gerardo', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(174, 9, 'San Jorge', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(175, 9, 'San Luis de la Reina', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(176, 9, 'San Rafael Oriente', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(177, 9, 'Sesori', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(178, 9, 'Uluazapa', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(179, 10, 'San Salvador', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(180, 10, 'Aguilares', '2022-08-23 20:27:40', '2022-08-23 20:27:40'),
(181, 10, 'Apopa', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(182, 10, 'Ayutuxtepeque', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(183, 10, 'Ciudad Delgado', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(184, 10, 'Cuscatancingo', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(185, 10, 'El Paisnal', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(186, 10, 'Guazapa', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(187, 10, 'Ilopango', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(188, 10, 'Mejicanos', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(189, 10, 'Nejapa', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(190, 10, 'Panchimalco', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(191, 10, 'Rosario de Mora', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(192, 10, 'San Marcos', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(193, 10, 'San Martín', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(194, 10, 'Santiago Texacuangos', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(195, 10, 'Santo Tomás', '2022-08-23 20:27:41', '2022-08-23 20:27:41'),
(196, 10, 'Soyapango', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(197, 10, 'Tonacatepeque', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(198, 11, 'San Vicente', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(199, 11, 'Apastepeque', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(200, 11, 'Guadalupe', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(201, 11, 'San Cayetano Istepeque', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(202, 11, 'San Esteban Catarina', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(203, 11, 'San Ildefonso', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(204, 11, 'San Lorenzo', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(205, 11, 'San Sebastián', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(206, 11, 'Santa Clara', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(207, 11, 'Santo Domingo', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(208, 11, 'Tecoluca', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(209, 11, 'Tepetitán', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(210, 11, 'Verapaz', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(211, 12, 'Santa Ana ', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(212, 12, 'Candelaria de la Frontera', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(213, 12, 'Chalchuapa', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(214, 12, 'Coatepeque', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(215, 12, 'El Congo', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(216, 12, 'El Porvenir', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(217, 12, 'Masahuat', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(218, 12, 'Metapán', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(219, 12, 'San Antonio Pajonal', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(220, 12, 'San Sebastián Salitrillo', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(221, 12, 'Santa Rosa Guachipilín', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(222, 12, 'Santiago de la Frontera', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(223, 12, 'Texistepeque', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(224, 13, 'Sonsonate', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(225, 13, 'Acajutla', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(226, 13, 'Armenia', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(227, 13, 'Caluco', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(228, 13, 'Cuisnahuat', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(229, 13, 'Izalco', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(230, 13, 'Juayúa', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(231, 13, 'Nahuizalco', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(232, 13, 'Nahulingo', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(233, 13, 'Salcoatitán', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(234, 13, 'San Antonio del Monte', '2022-08-23 20:27:42', '2022-08-23 20:27:42'),
(235, 13, 'San Julián', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(236, 13, 'Santa Catarina Masahuat', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(237, 13, 'Santa Isabel Ishuatán', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(238, 13, 'Santo Domingo de Guzmán', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(239, 13, 'Sonzacate', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(240, 14, 'Usulután ', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(241, 14, 'Alegría', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(242, 14, 'Berlín', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(243, 14, 'California', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(244, 14, 'Concepción Batres', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(245, 14, 'El Triunfo', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(246, 14, 'Ereguayquín', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(247, 14, 'Estanzuelas', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(248, 14, 'Jiquilisco', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(249, 14, 'Jucuapa', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(250, 14, 'Jucuarán', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(251, 14, 'Mercedes Umaña', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(252, 14, 'Nueva Granada', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(253, 14, 'Ozatlán', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(254, 14, 'Puerto El Triunfo', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(255, 14, 'San Agustín', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(256, 14, 'San Buenaventura', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(257, 14, 'San Dionisio', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(258, 14, 'San Francisco Javier', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(259, 14, 'Santa Elena', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(260, 14, 'Santa María', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(261, 14, 'Santiago de María', '2022-08-23 20:27:43', '2022-08-23 20:27:43'),
(262, 14, 'Tecapán', '2022-08-23 20:27:43', '2022-08-23 20:27:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_licencia` bigint(20) UNSIGNED NOT NULL,
  `id_motivo` bigint(20) UNSIGNED NOT NULL,
  `id_usuario_autoriza` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `id_usuario_adiciono` bigint(20) UNSIGNED NOT NULL,
  `fecha_entrada` date NOT NULL,
  `hora_entrada` time NOT NULL,
  `fecha_salida` date NOT NULL,
  `hora_salida` time NOT NULL,
  `fecha_permiso` date NOT NULL,
  `tiempo_dia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo_horas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo_minutos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros_salidas`
--

CREATE TABLE `registros_salidas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_lugar` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `objetivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', '2022-08-23 20:27:33', '2022-08-23 20:27:33'),
(2, 'Analista', '2022-08-23 20:27:33', '2022-08-23 20:27:33'),
(3, 'Digitador', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(4, 'Participante', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(5, 'Motorista', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(6, 'Jefe de conservación', '2022-08-23 20:27:34', '2022-08-23 20:27:34'),
(7, 'Usuario', '2022-08-23 20:27:34', '2022-08-23 20:27:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salas`
--

CREATE TABLE `salas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sala` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `salas`
--

INSERT INTO `salas` (`id`, `sala`, `created_at`, `updated_at`) VALUES
(1, 'Sala DISAM', '2022-08-23 20:27:43', '2022-08-23 20:27:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_salas`
--

CREATE TABLE `solicitudes_salas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_autorizacion` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_sala` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_finalizacion` time NOT NULL,
  `actividad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_transportes`
--

CREATE TABLE `solicitudes_transportes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_lugar` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_motorista` bigint(20) UNSIGNED DEFAULT NULL,
  `id_vehiculo` bigint(20) UNSIGNED DEFAULT NULL,
  `id_autorizacion` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_regreso` time NOT NULL,
  `objetivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_solicitud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud_combustibles`
--

CREATE TABLE `solicitud_combustibles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_destinatario` bigint(20) UNSIGNED NOT NULL,
  `id_origen` bigint(20) UNSIGNED NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `id_vehiculo` bigint(20) UNSIGNED NOT NULL,
  `id_conductor` bigint(20) UNSIGNED NOT NULL,
  `lugar_destino` bigint(20) UNSIGNED NOT NULL,
  `fecha_detalle` date NOT NULL,
  `hora_salida` time NOT NULL,
  `objetivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad_combustible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometraje` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_coordinaciones`
--

CREATE TABLE `tipos_coordinaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_coordinacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_coordinaciones`
--

INSERT INTO `tipos_coordinaciones` (`id`, `tipo_coordinacion`, `created_at`, `updated_at`) VALUES
(1, 'Director de DISAM', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(2, 'Coordinador de Alimentos y Bebidas', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(3, 'Coordinadora de Zoonosis', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(4, 'Administracion de DISAM', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(5, 'Coordinador Saneamiento', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(6, 'Coordinador de Unidad Ambiental', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(7, 'Coordinacion Informatica', '2022-08-23 20:27:47', '2022-08-23 20:27:47'),
(8, 'Coordinacion de Alcohol y Tabaco', '2022-08-23 20:27:47', '2022-08-23 20:27:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_permisos`
--

CREATE TABLE `tipos_permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_permiso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_permisos`
--

INSERT INTO `tipos_permisos` (`id`, `tipo_permiso`, `created_at`, `updated_at`) VALUES
(1, 'Con sueldo', '2022-08-23 20:27:46', '2022-08-23 20:27:46'),
(2, 'Sin sueldo', '2022-08-23 20:27:46', '2022-08-23 20:27:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_conductor` bigint(20) UNSIGNED NOT NULL,
  `id_placa` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora_salida` time NOT NULL,
  `km_salida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_salida` bigint(20) UNSIGNED NOT NULL,
  `hora_destino` time NOT NULL,
  `km_destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lugar_destino` bigint(20) UNSIGNED NOT NULL,
  `distancia_recorrida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `combustible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_combustible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pasajero` bigint(20) UNSIGNED NOT NULL,
  `objetivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correlativo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_tanque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion_equipos`
--

CREATE TABLE `ubicacion_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ubicacion_equipos`
--

INSERT INTO `ubicacion_equipos` (`id`, `ubicacion`, `created_at`, `updated_at`) VALUES
(2, 'Area tecnica', '2022-08-23 21:00:16', '2022-08-23 21:00:16'),
(3, 'Bodega', '2022-08-23 21:00:20', '2022-08-23 21:00:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motorista` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_rol`, `id_dependencia`, `id_estado`, `email`, `usuario`, `email_verified_at`, `password`, `nombres`, `apellidos`, `cargo`, `ubicacion`, `telefono`, `motorista`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 'admin@gmail.com', 'admin', NULL, '$2y$10$PGgDQq2KD.wjveErEwGGcuHxFA7cN43YuhwT/.tEBOO1RVfO2d8lK', 'admin', 'admin', 'admin', 'DISAM', '2234-2345', 'no', NULL, '2022-08-23 20:27:45', '2022-08-23 20:27:45'),
(2, 2, 3, 1, 'user@gmail.com', 'usuario', NULL, '$2y$10$GWKDN4Ef0Fobd4Ep6SrQNOhi00lGTecMSmtJzIbUulcoEA6tSL476', 'usuario', 'usuario', 'usuario', 'DISAM', '2234-2345', 'si', NULL, '2022-08-23 20:27:45', '2022-08-23 20:27:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `placa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modelo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kilometraje` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_combustible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_id_usuario_foreign` (`id_usuario`),
  ADD KEY `actividades_id_organizador_foreign` (`id_organizador`),
  ADD KEY `actividades_id_lugar_foreign` (`id_lugar`),
  ADD KEY `actividades_id_coordinador_foreign` (`id_coordinador`),
  ADD KEY `actividades_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coordinadores_id_tecnico_foreign` (`id_tecnico`),
  ADD KEY `coordinadores_id_coordinacion_foreign` (`id_coordinacion`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `descripcion_equipos`
--
ALTER TABLE `descripcion_equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `equipos_codigo_unique` (`codigo`),
  ADD KEY `equipos_id_descripcion_foreign` (`id_descripcion`),
  ADD KEY `equipos_id_ubicacion_foreign` (`id_ubicacion`),
  ADD KEY `equipos_id_estado_foreign` (`id_estado`),
  ADD KEY `equipos_id_fuente_foreign` (`id_fuente`),
  ADD KEY `equipos_id_unidad_foreign` (`id_unidad`);

--
-- Indices de la tabla `estados_actividades`
--
ALTER TABLE `estados_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_equipos`
--
ALTER TABLE `estados_equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_permisos`
--
ALTER TABLE `estados_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_salidas`
--
ALTER TABLE `estados_salidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_usuarios`
--
ALTER TABLE `estados_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fuente_equipos`
--
ALTER TABLE `fuente_equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lugares_id_departamento_foreign` (`id_departamento`),
  ADD KEY `lugares_id_municipio_foreign` (`id_municipio`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motivos_permisos`
--
ALTER TABLE `motivos_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_id_departamento_foreign` (`id_departamento`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `permisos_id_licencia_foreign` (`id_licencia`),
  ADD KEY `permisos_id_motivo_foreign` (`id_motivo`),
  ADD KEY `permisos_id_usuario_autoriza_foreign` (`id_usuario_autoriza`),
  ADD KEY `permisos_id_estado_foreign` (`id_estado`),
  ADD KEY `permisos_id_usuario_adiciono_foreign` (`id_usuario_adiciono`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `registros_salidas`
--
ALTER TABLE `registros_salidas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registros_salidas_id_lugar_foreign` (`id_lugar`),
  ADD KEY `registros_salidas_id_usuario_foreign` (`id_usuario`),
  ADD KEY `registros_salidas_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salas`
--
ALTER TABLE `salas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitudes_salas`
--
ALTER TABLE `solicitudes_salas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitudes_salas_id_autorizacion_foreign` (`id_autorizacion`),
  ADD KEY `solicitudes_salas_id_usuario_foreign` (`id_usuario`),
  ADD KEY `solicitudes_salas_id_sala_foreign` (`id_sala`);

--
-- Indices de la tabla `solicitudes_transportes`
--
ALTER TABLE `solicitudes_transportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitudes_transportes_id_dependencia_foreign` (`id_dependencia`),
  ADD KEY `solicitudes_transportes_id_lugar_foreign` (`id_lugar`),
  ADD KEY `solicitudes_transportes_id_usuario_foreign` (`id_usuario`),
  ADD KEY `solicitudes_transportes_id_motorista_foreign` (`id_motorista`),
  ADD KEY `solicitudes_transportes_id_vehiculo_foreign` (`id_vehiculo`),
  ADD KEY `solicitudes_transportes_id_autorizacion_foreign` (`id_autorizacion`);

--
-- Indices de la tabla `solicitud_combustibles`
--
ALTER TABLE `solicitud_combustibles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `solicitud_combustibles_id_destinatario_foreign` (`id_destinatario`),
  ADD KEY `solicitud_combustibles_id_origen_foreign` (`id_origen`),
  ADD KEY `solicitud_combustibles_id_vehiculo_foreign` (`id_vehiculo`),
  ADD KEY `solicitud_combustibles_id_conductor_foreign` (`id_conductor`),
  ADD KEY `solicitud_combustibles_lugar_destino_foreign` (`lugar_destino`);

--
-- Indices de la tabla `tipos_coordinaciones`
--
ALTER TABLE `tipos_coordinaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_permisos`
--
ALTER TABLE `tipos_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transportes_id_dependencia_foreign` (`id_dependencia`),
  ADD KEY `transportes_id_conductor_foreign` (`id_conductor`),
  ADD KEY `transportes_id_placa_foreign` (`id_placa`),
  ADD KEY `transportes_lugar_salida_foreign` (`lugar_salida`),
  ADD KEY `transportes_lugar_destino_foreign` (`lugar_destino`),
  ADD KEY `transportes_pasajero_foreign` (`pasajero`);

--
-- Indices de la tabla `ubicacion_equipos`
--
ALTER TABLE `ubicacion_equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`),
  ADD KEY `users_id_rol_foreign` (`id_rol`),
  ADD KEY `users_id_dependencia_foreign` (`id_dependencia`),
  ADD KEY `users_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vehiculos_placa_unique` (`placa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `dependencias`
--
ALTER TABLE `dependencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `descripcion_equipos`
--
ALTER TABLE `descripcion_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `estados_actividades`
--
ALTER TABLE `estados_actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados_equipos`
--
ALTER TABLE `estados_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados_permisos`
--
ALTER TABLE `estados_permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados_salidas`
--
ALTER TABLE `estados_salidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados_usuarios`
--
ALTER TABLE `estados_usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fuente_equipos`
--
ALTER TABLE `fuente_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `motivos_permisos`
--
ALTER TABLE `motivos_permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros_salidas`
--
ALTER TABLE `registros_salidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `salas`
--
ALTER TABLE `salas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `solicitudes_salas`
--
ALTER TABLE `solicitudes_salas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitudes_transportes`
--
ALTER TABLE `solicitudes_transportes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `solicitud_combustibles`
--
ALTER TABLE `solicitud_combustibles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_coordinaciones`
--
ALTER TABLE `tipos_coordinaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipos_permisos`
--
ALTER TABLE `tipos_permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ubicacion_equipos`
--
ALTER TABLE `ubicacion_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_id_coordinador_foreign` FOREIGN KEY (`id_coordinador`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `actividades_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_actividades` (`id`),
  ADD CONSTRAINT `actividades_id_lugar_foreign` FOREIGN KEY (`id_lugar`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `actividades_id_organizador_foreign` FOREIGN KEY (`id_organizador`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `actividades_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  ADD CONSTRAINT `coordinadores_id_coordinacion_foreign` FOREIGN KEY (`id_coordinacion`) REFERENCES `tipos_coordinaciones` (`id`),
  ADD CONSTRAINT `coordinadores_id_tecnico_foreign` FOREIGN KEY (`id_tecnico`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_id_descripcion_foreign` FOREIGN KEY (`id_descripcion`) REFERENCES `descripcion_equipos` (`id`),
  ADD CONSTRAINT `equipos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_equipos` (`id`),
  ADD CONSTRAINT `equipos_id_fuente_foreign` FOREIGN KEY (`id_fuente`) REFERENCES `fuente_equipos` (`id`),
  ADD CONSTRAINT `equipos_id_ubicacion_foreign` FOREIGN KEY (`id_ubicacion`) REFERENCES `ubicacion_equipos` (`id`),
  ADD CONSTRAINT `equipos_id_unidad_foreign` FOREIGN KEY (`id_unidad`) REFERENCES `dependencias` (`id`);

--
-- Filtros para la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `lugares_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `lugares_id_municipio_foreign` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `permisos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_permisos` (`id`),
  ADD CONSTRAINT `permisos_id_licencia_foreign` FOREIGN KEY (`id_licencia`) REFERENCES `tipos_permisos` (`id`),
  ADD CONSTRAINT `permisos_id_motivo_foreign` FOREIGN KEY (`id_motivo`) REFERENCES `motivos_permisos` (`id`),
  ADD CONSTRAINT `permisos_id_usuario_adiciono_foreign` FOREIGN KEY (`id_usuario_adiciono`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `permisos_id_usuario_autoriza_foreign` FOREIGN KEY (`id_usuario_autoriza`) REFERENCES `coordinadores` (`id_tecnico`),
  ADD CONSTRAINT `permisos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `registros_salidas`
--
ALTER TABLE `registros_salidas`
  ADD CONSTRAINT `registros_salidas_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_salidas` (`id`),
  ADD CONSTRAINT `registros_salidas_id_lugar_foreign` FOREIGN KEY (`id_lugar`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `registros_salidas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `solicitudes_salas`
--
ALTER TABLE `solicitudes_salas`
  ADD CONSTRAINT `solicitudes_salas_id_autorizacion_foreign` FOREIGN KEY (`id_autorizacion`) REFERENCES `autorizaciones` (`id`),
  ADD CONSTRAINT `solicitudes_salas_id_sala_foreign` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id`),
  ADD CONSTRAINT `solicitudes_salas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `solicitudes_transportes`
--
ALTER TABLE `solicitudes_transportes`
  ADD CONSTRAINT `solicitudes_transportes_id_autorizacion_foreign` FOREIGN KEY (`id_autorizacion`) REFERENCES `autorizaciones` (`id`),
  ADD CONSTRAINT `solicitudes_transportes_id_dependencia_foreign` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`),
  ADD CONSTRAINT `solicitudes_transportes_id_lugar_foreign` FOREIGN KEY (`id_lugar`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `solicitudes_transportes_id_motorista_foreign` FOREIGN KEY (`id_motorista`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicitudes_transportes_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicitudes_transportes_id_vehiculo_foreign` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`);

--
-- Filtros para la tabla `solicitud_combustibles`
--
ALTER TABLE `solicitud_combustibles`
  ADD CONSTRAINT `solicitud_combustibles_id_conductor_foreign` FOREIGN KEY (`id_conductor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicitud_combustibles_id_destinatario_foreign` FOREIGN KEY (`id_destinatario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicitud_combustibles_id_origen_foreign` FOREIGN KEY (`id_origen`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicitud_combustibles_id_vehiculo_foreign` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id`),
  ADD CONSTRAINT `solicitud_combustibles_lugar_destino_foreign` FOREIGN KEY (`lugar_destino`) REFERENCES `lugares` (`id`);

--
-- Filtros para la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD CONSTRAINT `transportes_id_conductor_foreign` FOREIGN KEY (`id_conductor`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transportes_id_dependencia_foreign` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`),
  ADD CONSTRAINT `transportes_id_placa_foreign` FOREIGN KEY (`id_placa`) REFERENCES `vehiculos` (`id`),
  ADD CONSTRAINT `transportes_lugar_destino_foreign` FOREIGN KEY (`lugar_destino`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `transportes_lugar_salida_foreign` FOREIGN KEY (`lugar_salida`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `transportes_pasajero_foreign` FOREIGN KEY (`pasajero`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_dependencia_foreign` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`),
  ADD CONSTRAINT `users_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_usuarios` (`id`),
  ADD CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
