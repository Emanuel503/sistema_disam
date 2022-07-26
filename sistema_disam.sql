-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-07-2022 a las 17:10:10
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
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_finalizacion` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_finalizacion` time NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `objetivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `id_usuario`, `id_organizador`, `id_lugar`, `id_coordinador`, `id_estado`, `title`, `color`, `fecha_inicio`, `fecha_finalizacion`, `hora_inicio`, `hora_finalizacion`, `start`, `end`, `objetivo`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 6, 5, 'Evaluación de personal regional', '#4087c5', '2022-07-15', '2022-07-15', '08:00:00', '12:00:00', '2022-07-15 08:00:00', '2022-07-15 12:00:00', 'Evaluar el desempeño de personal UDAT Región Occidental.', 'El personal evaluado es de 7', '2022-07-07 02:41:36', '2022-07-07 02:41:36'),
(2, 6, 1, 1, 6, 5, 'Evaluación de desempeño', '#4087c5', '2022-07-22', '2022-07-22', '08:00:00', '12:42:00', '2022-07-22 08:00:00', '2022-07-22 12:42:00', 'Evaluar a personal UDAT Región Central y Paracentral', 'el personal evaluado es un total de 5', '2022-07-07 02:43:40', '2022-07-07 02:43:40'),
(3, 15, 1, 1, 15, 5, 'Reunión seguimiento desechos de patología', '#4087c5', '2022-07-19', '2022-07-19', '09:00:00', '11:30:00', '2022-07-19 09:00:00', '2022-07-19 11:30:00', 'Validar solicitud dirigida a MARN, referente a asesoría para el manejo de desechos de laboratorios de patología.', 'Equipo de 6 miembros', '2022-07-15 15:27:43', '2022-07-15 15:27:43'),
(4, 6, 1, 1, 6, 5, 'evaluacion', '#4087c5', '2022-07-29', '2022-07-29', '08:00:00', '12:00:00', '2022-07-29 08:00:00', '2022-07-29 12:00:00', 'evaluacion a personal udat', 'se evaluara Region Occidental', '2022-07-20 11:10:49', '2022-07-20 11:10:49'),
(5, 6, 1, 1, 6, 5, 'Evaluacion', '#4087c5', '2022-08-12', '2022-08-12', '08:00:00', '12:00:00', '2022-08-12 08:00:00', '2022-08-12 12:00:00', 'Evaluacion anual', 'se evaluara udat Region Metropolitana', '2022-07-20 11:12:21', '2022-07-20 11:12:21'),
(6, 6, 1, 1, 6, 5, 'Evaluacion', '#4087c5', '2022-08-19', '2022-08-19', '08:00:00', '12:00:00', '2022-08-19 08:00:00', '2022-08-19 12:00:00', 'Evaluacion', 'se evaluara Region Oriental', '2022-07-20 11:13:43', '2022-07-20 11:13:43');

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
(1, 'Autorizado', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(2, 'No Autorizado', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(3, 'Pendiente', '2022-07-25 22:22:49', '2022-07-25 22:22:49');

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

--
-- Volcado de datos para la tabla `coordinadores`
--

INSERT INTO `coordinadores` (`id`, `id_tecnico`, `id_coordinacion`, `created_at`, `updated_at`) VALUES
(1, 16, 1, '2022-07-21 05:25:47', '2022-07-21 05:25:47'),
(2, 31, 4, '2022-07-21 05:26:27', '2022-07-21 05:26:27'),
(3, 43, 2, '2022-07-21 05:27:09', '2022-07-21 05:27:09'),
(4, 36, 8, '2022-07-21 05:27:50', '2022-07-21 05:27:50'),
(5, 37, 5, '2022-07-21 05:28:18', '2022-07-21 05:28:18'),
(6, 15, 6, '2022-07-21 05:28:50', '2022-07-21 05:28:50'),
(7, 21, 3, '2022-07-21 05:29:46', '2022-07-21 05:29:46'),
(8, 8, 4, '2022-07-21 05:30:23', '2022-07-21 05:30:23');

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
(1, 'Ahuachapán', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(2, 'Cabañas', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(3, 'Chalatenango', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(4, 'Cuscatlán', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(5, 'La Libertad', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(6, 'La Paz', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(7, 'La Unión', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(8, 'Morazán', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(9, 'San Miguel', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(10, 'San Salvador', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(11, 'San Vicente', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(12, 'Santa Ana', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(13, 'Sonsonate', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(14, 'Usulután', '2022-07-25 22:22:40', '2022-07-25 22:22:40');

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
(1, 'Unidad de Alimentos', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(2, 'Area Administracion', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(3, 'Area Informatica', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(4, 'Unidad Juridica', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(5, 'Unidad de Vigilancia de Enfermedades Transmitiras', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(6, 'Unidad de Saneamiento Ambiental', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(7, 'Fabrica de artefactos Sanitarios', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(8, 'Unidad de Alcohol y Tabaco', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(9, 'Unidad de Zoonosis', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(10, 'Laboratorio de productos biologicos', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(11, 'Unidad Ambiental', '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(12, 'Direccion', '2022-07-25 22:22:48', '2022-07-25 22:22:48');

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
(1, 'Realizada', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(2, 'Suspendida', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(3, 'Pospuesta', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(4, 'Inasistencia', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(5, 'Pendiente', '2022-07-25 22:22:49', '2022-07-25 22:22:49');

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
(1, 'Aprobada', '2022-07-25 22:22:50', '2022-07-25 22:22:50'),
(2, 'Rechazada', '2022-07-25 22:22:50', '2022-07-25 22:22:50'),
(3, 'Pendiente', '2022-07-25 22:22:50', '2022-07-25 22:22:50');

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
(1, 'Pendiente', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(2, 'Realizada', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(3, 'Cancelada', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(4, 'Pospuesta', '2022-07-25 22:22:49', '2022-07-25 22:22:49');

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
(1, 'Activo', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(2, 'Inactivo', '2022-07-25 22:22:48', '2022-07-25 22:22:48');

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
(1, 10, 179, '1', 'DISAM', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(2, 10, 179, '2', 'Hospital El Salvador', '2022-07-03 05:03:47', '2022-07-03 05:03:47');

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_05_14_170222_departamentos', 1),
(3, '2022_05_15_170259_municipios', 1),
(4, '2022_06_19_194210_dependencias', 1),
(5, '2022_06_20_142539_lugares', 1),
(6, '2022_06_20_142547_roles', 1),
(7, '2022_06_20_142613_estados_usuarios', 1),
(8, '2022_06_20_142623_users', 1),
(9, '2022_06_21_153829_salas', 1),
(10, '2022_06_21_154103_autorizaciones', 1),
(11, '2022_06_21_164102_solicitudes_salas', 1),
(12, '2022_06_21_165105_estados_actividades', 1),
(13, '2022_06_23_151826_actividades', 1),
(14, '2022_06_28_210648_vehiculos', 1),
(15, '2022_06_29_145941_transportes', 1),
(16, '2022_06_29_160148_solicitudes_transportes', 1),
(17, '2022_06_30_142321_solicitud_combustibles', 1),
(18, '2022_07_01_174434_estados_salida', 1),
(19, '2022_07_01_174506_registros_salidas', 1),
(20, '2022_07_15_162314_motivos_permisos', 1),
(21, '2022_07_15_180118_tipos_permisos', 1),
(22, '2022_07_19_150336_tipos_coordinaciones', 1),
(23, '2022_07_19_150418_coordinadores', 1),
(24, '2022_07_19_175753_estados_permisos', 1),
(25, '2022_07_19_175904_permisos', 1);

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
(1, 'Personal', '2022-07-25 22:22:50', '2022-07-25 22:22:50'),
(2, 'Enfermedad', '2022-07-25 22:22:50', '2022-07-25 22:22:50'),
(3, 'Enfermedad gravísima de pariente', '2022-07-25 22:22:50', '2022-07-25 22:22:50'),
(4, 'Duelo', '2022-07-25 22:22:50', '2022-07-25 22:22:50'),
(5, 'Compensatorio', '2022-07-25 22:22:50', '2022-07-25 22:22:50'),
(6, 'Oficial', '2022-07-25 22:22:50', '2022-07-25 22:22:50');

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
(1, 1, 'Ahuachapán', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(2, 1, 'Apaneca', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(3, 1, 'Atiquizaya', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(4, 1, 'Concepción de Ataco', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(5, 1, 'El Refugio', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(6, 1, 'Guaymango', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(7, 1, 'Jujutla', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(8, 1, 'San Francisco Menéndez', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(9, 1, 'San Lorenzo', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(10, 1, 'San Pedro Puxtla', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(11, 1, 'Tacuba', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(12, 1, 'Turín', '2022-07-25 22:22:40', '2022-07-25 22:22:40'),
(13, 2, 'Sensuntepeque', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(14, 2, 'Cinquera', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(15, 2, 'Dolores', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(16, 2, 'Guacotecti', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(17, 2, 'Ilobasco', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(18, 2, 'Jutiapa', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(19, 2, 'San Isidro', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(20, 2, 'Tejutepeque', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(21, 2, 'Victoria', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(22, 3, 'Chalatenango', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(23, 3, 'Agua Caliente', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(24, 3, 'Arcatao', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(25, 3, 'Azacualpa', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(26, 3, 'Cancasque', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(27, 3, 'Citalá', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(28, 3, 'Comalapa', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(29, 3, 'Concepción Quezaltepeque', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(30, 3, 'Dulce Nombre de María', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(31, 3, 'El Carrizal', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(32, 3, 'El Paraíso', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(33, 3, 'La Laguna', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(34, 3, 'La Palma', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(35, 3, 'La Reina', '2022-07-25 22:22:41', '2022-07-25 22:22:41'),
(36, 3, 'Las Flores', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(37, 3, 'Las Vueltas', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(38, 3, 'Nombre de Jesús', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(39, 3, 'Nueva Concepción', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(40, 3, 'Nueva Trinidad', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(41, 3, 'Ojos de Agua', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(42, 3, 'Potonico', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(43, 3, 'San Antonio de la Cruz', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(44, 3, 'San Antonio Los Ranchos', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(45, 3, 'San Fernando', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(46, 3, 'San Francisco Lempa', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(47, 3, 'San Francisco Morazán', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(48, 3, 'San Ignacio', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(49, 3, 'San Isidro Labrador', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(50, 3, 'San Luis del Carmen', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(51, 3, 'San Miguel de Mercedes', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(52, 3, 'San Rafael', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(53, 3, 'Santa Rita', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(54, 3, 'Tejutla', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(55, 4, 'Cojutepeque ', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(56, 4, 'Candelaria', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(57, 4, 'El Carmen', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(58, 4, 'El Rosario', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(59, 4, 'Monte San Juan', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(60, 4, 'Oratorio de Concepción', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(61, 4, 'San Bartolomé Perulapía', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(62, 4, 'San Cristóbal', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(63, 4, 'San José Guayabal', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(64, 4, 'San Pedro Perulapán', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(65, 4, 'San Rafael Cedros', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(66, 4, 'San Ramón', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(67, 4, 'Santa Cruz Analquito', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(68, 4, 'Santa Cruz Michapa', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(69, 4, 'Suchitoto', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(70, 4, 'Tenancingo', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(71, 5, 'Santa Tecla ', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(72, 5, 'Antiguo Cuscatlán', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(73, 5, 'Chiltiupán ', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(74, 5, 'Ciudad Arce ', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(75, 5, 'Colón ', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(76, 5, 'Comasagua ', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(77, 5, 'Huizúcar ', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(78, 5, 'Jayaque ', '2022-07-25 22:22:42', '2022-07-25 22:22:42'),
(79, 5, 'Jicalapa ', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(80, 5, 'La Libertad', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(81, 5, 'Nuevo Cuscatlán', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(82, 5, 'Quezaltepeque', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(83, 5, 'San Juan Opico', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(84, 5, 'Sacacoyo', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(85, 5, 'San José Villanueva', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(86, 5, 'San Matías', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(87, 5, 'San Pablo Tacachico ', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(88, 5, 'Talnique ', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(89, 5, 'Tamanique ', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(90, 5, 'Teotepeque ', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(91, 5, 'Tepecoyo ', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(92, 5, 'Zaragoza ', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(93, 6, 'Zacatecoluca', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(94, 6, 'Cuyultitán', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(95, 6, 'El Rosario', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(96, 6, 'Jerusalén', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(97, 6, 'Mercedes La Ceiba', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(98, 6, 'Olocuilta', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(99, 6, 'Paraíso de Osorio', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(100, 6, 'Paraíso de Osorio', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(101, 6, 'San Emigdio', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(102, 6, 'San Francisco Chinameca', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(103, 6, 'San Pedro Masahuat', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(104, 6, 'San Juan Nonualco', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(105, 6, 'San Juan Talpa', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(106, 6, 'San Juan Tepezontes', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(107, 6, 'San Luis La Herradura', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(108, 6, 'San Luis Talpa', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(109, 6, 'San Miguel Tepezontes', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(110, 6, 'San Pedro Nonualco', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(111, 6, 'San Rafael Obrajuelo', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(112, 6, 'Santa María Ostuma', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(113, 6, 'Santiago Nonualco', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(114, 6, 'Tapalhuaca', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(115, 7, 'La Unión', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(116, 7, 'Anamorós', '2022-07-25 22:22:43', '2022-07-25 22:22:43'),
(117, 7, 'Bolívar', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(118, 7, 'Concepción de Oriente', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(119, 7, 'Conchagua', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(120, 7, 'El Carmen', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(121, 7, 'El Sauce', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(122, 7, 'Intipucá', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(123, 7, 'Lislique', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(124, 7, 'Meanguera del Golfo', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(125, 7, 'Nueva Esparta', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(126, 7, 'Pasaquina', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(127, 7, 'Polorós', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(128, 7, 'San Alejo', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(129, 7, 'San José', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(130, 7, 'Santa Rosa de Lima ', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(131, 7, 'Yayantique', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(132, 7, 'Yucuaiquín', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(133, 8, 'San Francisco Gotera', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(134, 8, 'Arambala', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(135, 8, 'Cacaopera', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(136, 8, 'Chilanga', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(137, 8, 'Corinto', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(138, 8, 'Delicias de Concepción', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(139, 8, 'El Divisadero', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(140, 8, 'El Rosario', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(141, 8, 'Gualococti', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(142, 8, 'Guatajiagua', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(143, 8, 'Joateca', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(144, 8, 'Jocoaitique', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(145, 8, 'Jocoro', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(146, 8, 'Lolotiquillo', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(147, 8, 'Meanguera', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(148, 8, 'Osicala', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(149, 8, 'Perquín', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(150, 8, 'San Carlos', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(151, 8, 'San Fernando', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(152, 8, 'San Isidro', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(153, 8, 'San Simón', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(154, 8, 'Sensembra', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(155, 8, 'Sociedad', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(156, 8, 'Torola', '2022-07-25 22:22:44', '2022-07-25 22:22:44'),
(157, 8, 'Yamabal', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(158, 8, 'Yoloaiquín', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(159, 9, 'San Miguel', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(160, 9, 'Carolina', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(161, 9, 'Chapeltique', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(162, 9, 'Chinameca', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(163, 9, 'Chirilagua', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(164, 9, 'Ciudad Barrios', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(165, 9, 'Comacarán', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(166, 9, 'El Tránsito', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(167, 9, 'Lolotique', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(168, 9, 'Moncagua', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(169, 9, 'Nueva Guadalupe', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(170, 9, 'Nuevo Edén de San Juan', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(171, 9, 'Quelepa', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(172, 9, 'San Antonio', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(173, 9, 'San Gerardo', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(174, 9, 'San Jorge', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(175, 9, 'San Luis de la Reina', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(176, 9, 'San Rafael Oriente', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(177, 9, 'Sesori', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(178, 9, 'Uluazapa', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(179, 10, 'San Salvador', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(180, 10, 'Aguilares', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(181, 10, 'Apopa', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(182, 10, 'Ayutuxtepeque', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(183, 10, 'Ciudad Delgado', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(184, 10, 'Cuscatancingo', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(185, 10, 'El Paisnal', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(186, 10, 'Guazapa', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(187, 10, 'Ilopango', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(188, 10, 'Mejicanos', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(189, 10, 'Nejapa', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(190, 10, 'Panchimalco', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(191, 10, 'Rosario de Mora', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(192, 10, 'San Marcos', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(193, 10, 'San Martín', '2022-07-25 22:22:45', '2022-07-25 22:22:45'),
(194, 10, 'Santiago Texacuangos', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(195, 10, 'Santo Tomás', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(196, 10, 'Soyapango', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(197, 10, 'Tonacatepeque', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(198, 11, 'San Vicente', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(199, 11, 'Apastepeque', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(200, 11, 'Guadalupe', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(201, 11, 'San Cayetano Istepeque', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(202, 11, 'San Esteban Catarina', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(203, 11, 'San Ildefonso', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(204, 11, 'San Lorenzo', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(205, 11, 'San Sebastián', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(206, 11, 'Santa Clara', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(207, 11, 'Santo Domingo', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(208, 11, 'Tecoluca', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(209, 11, 'Tepetitán', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(210, 11, 'Verapaz', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(211, 12, 'Santa Ana ', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(212, 12, 'Candelaria de la Frontera', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(213, 12, 'Chalchuapa', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(214, 12, 'Coatepeque', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(215, 12, 'El Congo', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(216, 12, 'El Porvenir', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(217, 12, 'Masahuat', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(218, 12, 'Metapán', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(219, 12, 'San Antonio Pajonal', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(220, 12, 'San Sebastián Salitrillo', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(221, 12, 'Santa Rosa Guachipilín', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(222, 12, 'Santiago de la Frontera', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(223, 12, 'Texistepeque', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(224, 13, 'Sonsonate', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(225, 13, 'Acajutla', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(226, 13, 'Armenia', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(227, 13, 'Caluco', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(228, 13, 'Cuisnahuat', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(229, 13, 'Izalco', '2022-07-25 22:22:46', '2022-07-25 22:22:46'),
(230, 13, 'Juayúa', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(231, 13, 'Nahuizalco', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(232, 13, 'Nahulingo', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(233, 13, 'Salcoatitán', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(234, 13, 'San Antonio del Monte', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(235, 13, 'San Julián', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(236, 13, 'Santa Catarina Masahuat', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(237, 13, 'Santa Isabel Ishuatán', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(238, 13, 'Santo Domingo de Guzmán', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(239, 13, 'Sonzacate', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(240, 14, 'Usulután ', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(241, 14, 'Alegría', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(242, 14, 'Berlín', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(243, 14, 'California', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(244, 14, 'Concepción Batres', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(245, 14, 'El Triunfo', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(246, 14, 'Ereguayquín', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(247, 14, 'Estanzuelas', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(248, 14, 'Jiquilisco', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(249, 14, 'Jucuapa', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(250, 14, 'Jucuarán', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(251, 14, 'Mercedes Umaña', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(252, 14, 'Nueva Granada', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(253, 14, 'Ozatlán', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(254, 14, 'Puerto El Triunfo', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(255, 14, 'San Agustín', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(256, 14, 'San Buenaventura', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(257, 14, 'San Dionisio', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(258, 14, 'San Francisco Javier', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(259, 14, 'Santa Elena', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(260, 14, 'Santa María', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(261, 14, 'Santiago de María', '2022-07-25 22:22:47', '2022-07-25 22:22:47'),
(262, 14, 'Tecapán', '2022-07-25 22:22:47', '2022-07-25 22:22:47');

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

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `id_usuario`, `id_licencia`, `id_motivo`, `id_usuario_autoriza`, `id_estado`, `id_usuario_adiciono`, `fecha_entrada`, `hora_entrada`, `fecha_salida`, `hora_salida`, `fecha_permiso`, `tiempo_dia`, `tiempo_horas`, `tiempo_minutos`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 1, 16, 1, 8, '2022-03-11', '07:30:00', '2022-03-11', '13:30:00', '2022-03-24', '0', '2', '0', '2022-03-24 12:00:00', '2022-07-23 02:23:54'),
(3, 32, 1, 1, 43, 1, 8, '2022-03-10', '07:30:00', '2022-03-10', '14:35:00', '2022-03-24', '0', '0', '55', '2022-03-24 12:00:00', '2022-07-23 02:25:54'),
(4, 34, 1, 1, 16, 1, 8, '2022-03-10', '08:31:00', '2022-03-10', '13:30:00', '2022-03-24', '0', '0', '31', '2022-03-24 12:00:00', '2022-07-23 02:28:14'),
(5, 34, 1, 2, 16, 1, 8, '2022-03-07', '07:30:00', '2022-03-07', '15:30:00', '2022-03-24', '1', '0', '0', '2022-03-24 12:00:00', '2022-07-23 02:34:57'),
(6, 31, 1, 2, 16, 1, 8, '2022-03-09', '07:30:00', '2022-03-09', '13:26:00', '2022-03-24', '0', '2', '4', '2022-03-24 12:00:00', '2022-07-23 03:20:08'),
(7, 31, 1, 2, 16, 1, 8, '2022-03-01', '07:30:00', '2022-03-01', '11:04:00', '2022-03-24', '0', '4', '26', '2022-03-24 12:00:00', '2022-07-23 03:20:23'),
(8, 39, 1, 1, 15, 1, 8, '2022-03-18', '08:01:00', '2022-03-18', '14:30:00', '2022-03-24', '0', '0', '31', '2022-03-24 12:00:00', '2022-07-23 02:36:40'),
(9, 14, 1, 2, 31, 1, 8, '2022-03-16', '08:03:00', '2022-03-16', '13:30:00', '2022-03-24', '0', '0', '33', '2022-03-24 12:00:00', '2022-07-23 02:37:05'),
(10, 39, 1, 1, 15, 1, 8, '2022-03-15', '08:01:00', '2022-03-15', '14:30:00', '2022-03-24', '0', '0', '31', '2022-03-24 12:00:00', '2022-07-23 02:37:25'),
(13, 44, 1, 1, 16, 1, 8, '2022-03-03', '07:30:00', '2022-03-03', '13:30:00', '2022-03-24', '1', '0', '0', '2022-03-24 12:00:00', '2022-07-23 02:38:38'),
(15, 6, 1, 2, 36, 1, 8, '2022-03-18', '07:30:00', '2022-03-18', '13:10:00', '2022-03-24', '0', '2', '20', '2022-03-24 12:00:00', '2022-07-23 02:39:35'),
(16, 32, 1, 1, 43, 1, 8, '2022-03-22', '08:25:00', '2022-03-22', '13:30:00', '2022-03-24', '0', '0', '55', '2022-03-24 12:00:00', '2022-07-23 02:40:13'),
(18, 12, 1, 1, 16, 1, 8, '2022-03-21', '08:02:00', '2022-03-21', '15:30:00', '2022-03-24', '0', '0', '32', '2022-03-24 12:00:00', '2022-07-23 02:40:41'),
(19, 21, 1, 2, 16, 1, 8, '2022-02-18', '07:30:00', '2022-03-04', '15:30:00', '2022-03-25', '15', '0', '0', '2022-03-25 12:00:00', '2022-07-23 02:41:26'),
(20, 32, 1, 2, 43, 1, 8, '2022-02-18', '07:30:00', '2022-03-03', '13:30:00', '2022-03-25', '14', '0', '0', '2022-03-25 12:00:00', '2022-07-23 02:42:17'),
(22, 42, 1, 2, 31, 1, 8, '2022-03-14', '07:30:00', '2022-03-14', '13:00:00', '2022-03-29', '0', '2', '30', '2022-03-29 12:00:00', '2022-07-23 02:43:17'),
(24, 40, 1, 2, 31, 1, 8, '2022-03-15', '07:30:00', '2022-03-15', '13:00:00', '2022-03-29', '1', '0', '0', '2022-03-29 12:00:00', '2022-07-23 02:48:09'),
(25, 28, 1, 1, 16, 1, 8, '2022-03-25', '07:30:00', '2022-03-25', '11:08:00', '2022-03-29', '0', '4', '22', '2022-03-29 12:00:00', '2022-07-23 06:20:23'),
(26, 14, 1, 2, 31, 1, 8, '2022-03-28', '08:04:00', '2022-03-28', '13:30:00', '2022-03-29', '0', '0', '34', '2022-03-29 12:00:00', '2022-07-23 06:18:38'),
(28, 25, 1, 2, 21, 1, 8, '2022-03-22', '10:35:00', '2022-03-22', '13:30:00', '2022-03-29', '0', '3', '5', '2022-03-29 12:00:00', '2022-07-23 02:52:56'),
(29, 12, 1, 1, 16, 1, 8, '2022-03-25', '07:30:00', '2022-03-25', '15:30:00', '2022-03-31', '1', '0', '0', '2022-03-31 12:00:00', '2022-07-23 02:53:58'),
(36, 25, 1, 2, 21, 1, 17, '2022-03-14', '07:30:00', '2022-03-14', '14:30:00', '2022-04-04', '0', '1', '0', '2022-04-04 12:00:00', '2022-07-23 02:54:31'),
(37, 5, 1, 1, 43, 1, 17, '2022-03-30', '07:30:00', '2022-03-30', '14:30:00', '2022-04-04', '0', '1', '0', '2022-04-04 12:00:00', '2022-07-23 02:56:47'),
(38, 28, 1, 6, 16, 1, 8, '2022-03-04', '07:30:00', '2022-03-04', '13:30:00', '2022-04-04', '1', '0', '0', '2022-04-04 12:00:00', '2022-07-23 02:57:47'),
(39, 28, 1, 6, 16, 1, 8, '2022-03-23', '07:30:00', '2022-03-23', '13:30:00', '2022-04-04', '1', '0', '0', '2022-04-04 12:00:00', '2022-07-23 02:58:16'),
(40, 28, 1, 6, 16, 1, 8, '2022-03-24', '07:30:00', '2022-03-24', '13:30:00', '2022-04-04', '1', '0', '0', '2022-04-04 12:00:00', '2022-07-23 02:58:36'),
(41, 28, 1, 6, 16, 1, 8, '2022-03-31', '07:30:00', '2022-03-31', '13:30:00', '2022-04-04', '1', '0', '0', '2022-04-04 12:00:00', '2022-07-23 02:58:53'),
(42, 20, 1, 6, 16, 1, 8, '2022-03-01', '07:30:00', '2022-03-01', '12:30:00', '2022-04-04', '0', '5', '0', '2022-04-04 12:00:00', '2022-07-23 02:59:55'),
(43, 20, 1, 6, 16, 1, 8, '2022-03-07', '13:33:00', '2022-03-07', '13:30:00', '2022-04-04', '0', '1', '57', '2022-04-04 12:00:00', '2022-07-23 03:00:19'),
(44, 20, 1, 6, 16, 1, 8, '2022-03-08', '12:00:00', '2022-03-08', '13:30:00', '2022-04-04', '0', '3', '30', '2022-04-04 12:00:00', '2022-07-23 03:00:30'),
(45, 20, 1, 6, 16, 1, 8, '2022-03-11', '07:30:00', '2022-03-13', '13:30:00', '2022-04-04', '1', '0', '0', '2022-04-04 12:00:00', '2022-07-23 03:02:39'),
(46, 20, 1, 6, 16, 1, 8, '2022-03-15', '12:41:00', '2022-03-15', '13:30:00', '2022-04-04', '0', '2', '30', '2022-04-04 12:00:00', '2022-07-23 03:03:21'),
(47, 20, 1, 6, 16, 1, 8, '2022-03-22', '12:30:00', '2022-03-22', '15:30:00', '2022-04-04', '0', '3', '0', '2022-04-04 12:00:00', '2022-07-23 03:03:38'),
(48, 44, 1, 2, 16, 1, 8, '2022-03-31', '07:30:00', '2022-03-31', '15:30:00', '2022-04-04', '1', '0', '0', '2022-04-04 12:00:00', '2022-07-23 03:05:01'),
(49, 18, 1, 2, 16, 1, 8, '2022-03-29', '07:30:00', '2022-03-29', '15:30:00', '2022-04-05', '1', '0', '0', '2022-04-05 12:00:00', '2022-07-23 03:07:24'),
(50, 18, 1, 2, 16, 1, 8, '2022-03-21', '07:30:00', '2022-03-21', '15:30:00', '2022-04-05', '1', '0', '0', '2022-04-05 12:00:00', '2022-07-23 03:07:40'),
(51, 7, 1, 2, 16, 1, 8, '2022-03-18', '07:30:00', '2022-03-18', '15:30:00', '2022-04-05', '1', '0', '0', '2022-04-05 12:00:00', '2022-07-23 03:08:21'),
(52, 41, 1, 2, 31, 1, 8, '2022-03-09', '07:30:00', '2022-03-09', '15:30:00', '2022-04-05', '1', '0', '0', '2022-04-05 12:00:00', '2022-07-23 03:08:51'),
(53, 41, 1, 2, 31, 1, 8, '2022-03-30', '07:30:00', '2022-03-30', '15:30:00', '2022-04-05', '1', '0', '0', '2022-04-05 12:00:00', '2022-07-23 03:09:22'),
(54, 40, 1, 2, 31, 1, 8, '2022-04-05', '07:30:00', '2022-04-05', '15:30:00', '2022-04-25', '1', '0', '0', '2022-04-25 12:00:00', '2022-07-23 03:09:58'),
(56, 21, 1, 5, 16, 1, 8, '2022-04-19', '07:30:00', '2022-04-19', '15:30:00', '2022-04-25', '1', '0', '0', '2022-04-25 12:00:00', '2022-07-23 03:11:46'),
(57, 34, 1, 1, 16, 1, 8, '2022-04-05', '08:02:00', '2022-04-05', '15:30:00', '2022-04-25', '0', '0', '32', '2022-04-25 12:00:00', '2022-07-23 03:12:12'),
(59, 28, 1, 1, 16, 1, 8, '2022-04-05', '08:03:00', '2022-04-05', '13:30:00', '2022-04-25', '0', '0', '33', '2022-04-25 12:00:00', '2022-07-23 03:13:25'),
(60, 8, 1, 2, 16, 1, 8, '2022-04-19', '07:30:00', '2022-04-21', '15:30:00', '2022-04-25', '3', '0', '0', '2022-04-25 12:00:00', '2022-07-23 03:14:10'),
(61, 31, 1, 1, 16, 1, 8, '2022-04-06', '07:30:00', '2022-04-06', '13:37:00', '2022-04-25', '0', '1', '53', '2022-04-25 12:00:00', '2022-07-23 03:21:03'),
(62, 14, 1, 2, 31, 1, 8, '2022-05-27', '07:30:00', '2022-05-27', '15:30:00', '2022-04-29', '1', '0', '0', '2022-04-29 12:00:00', '2022-07-23 03:24:35'),
(64, 39, 1, 1, 15, 1, 8, '2022-04-29', '09:21:00', '2022-04-29', '15:30:00', '2022-05-02', '0', '1', '51', '2022-05-02 12:00:00', '2022-07-23 03:25:14'),
(65, 34, 1, 1, 16, 1, 8, '2022-04-25', '07:30:00', '2022-04-25', '12:50:00', '2022-05-02', '0', '2', '40', '2022-05-02 12:00:00', '2022-07-23 03:25:45'),
(66, 38, 1, 5, 43, 1, 8, '2022-04-25', '07:30:00', '2022-04-25', '15:30:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:26:13'),
(67, 38, 1, 2, 43, 1, 8, '2022-04-04', '07:30:00', '2022-04-04', '15:30:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:26:30'),
(69, 25, 1, 2, 15, 1, 8, '2022-04-26', '11:30:00', '2022-04-26', '15:30:00', '2022-05-02', '0', '4', '0', '2022-05-02 12:00:00', '2022-07-23 03:30:19'),
(70, 42, 1, 2, 31, 1, 8, '2022-04-25', '07:30:00', '2022-04-25', '15:30:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:30:52'),
(71, 32, 1, 1, 43, 1, 8, '2022-04-22', '12:16:00', '2022-04-22', '15:30:00', '2022-05-02', '0', '4', '46', '2022-05-02 12:00:00', '2022-07-23 03:31:20'),
(72, 35, 1, 1, 43, 1, 8, '2022-04-22', '07:30:00', '2022-04-22', '15:30:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:31:48'),
(73, 31, 1, 1, 16, 1, 8, '2022-02-21', '08:15:00', '2022-02-21', '15:30:00', '2022-05-02', '0', '0', '45', '2022-05-02 12:00:00', '2022-07-23 03:21:28'),
(74, 43, 1, 1, 31, 1, 8, '2022-02-02', '07:30:00', '2022-02-02', '13:42:00', '2022-05-02', '0', '1', '42', '2022-05-02 12:00:00', '2022-07-23 03:32:53'),
(75, 41, 1, 5, 31, 1, 8, '2022-01-05', '11:30:00', '2022-01-05', '00:00:00', '2022-05-02', '0', '4', '0', '2022-05-02 12:00:00', '2022-07-23 03:39:54'),
(76, 41, 1, 1, 31, 1, 8, '2022-01-06', '09:00:00', '2022-01-06', '15:30:00', '2022-05-02', '0', '1', '30', '2022-05-02 12:00:00', '2022-07-23 03:40:28'),
(77, 41, 1, 1, 16, 1, 8, '2022-01-10', '00:00:00', '2022-01-10', '11:30:00', '2022-05-02', '0', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:41:13'),
(78, 41, 1, 5, 31, 1, 8, '2022-01-10', '00:00:00', '2022-01-10', '11:30:00', '2022-05-02', '0', '4', '0', '2022-05-02 12:00:00', '2022-07-23 03:41:59'),
(79, 41, 1, 2, 31, 1, 8, '2022-01-11', '07:30:00', '2022-01-11', '15:30:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:42:15'),
(80, 41, 1, 1, 31, 1, 8, '2022-01-19', '10:42:00', '2022-01-19', '15:30:00', '2022-05-02', '0', '3', '12', '2022-05-02 12:00:00', '2022-07-23 03:42:28'),
(81, 41, 1, 1, 31, 1, 8, '2022-02-21', '10:40:00', '2022-02-21', '15:30:00', '2022-05-02', '0', '3', '10', '2022-05-02 12:00:00', '2022-07-23 03:43:41'),
(82, 6, 1, 2, 36, 1, 8, '2022-02-18', '00:00:00', '2022-02-18', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:47:40'),
(83, 15, 1, 2, 16, 1, 8, '2022-01-19', '00:00:00', '2022-01-19', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:48:08'),
(85, 15, 1, 1, 16, 1, 8, '2022-02-15', '08:33:00', '2022-02-15', '15:30:00', '2022-05-02', '0', '1', '3', '2022-05-02 12:00:00', '2022-07-23 03:48:24'),
(87, 7, 1, 2, 16, 1, 8, '2022-01-24', '00:00:00', '2022-01-26', '00:00:00', '2022-05-02', '3', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:48:50'),
(88, 7, 1, 1, 16, 1, 8, '2022-01-27', '00:00:00', '2022-01-27', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:49:07'),
(89, 24, 1, 1, 16, 1, 8, '2022-01-10', '08:36:00', '2022-01-10', '00:00:00', '2022-05-02', '0', '1', '6', '2022-05-02 12:00:00', '2022-07-23 03:50:09'),
(90, 24, 1, 2, 16, 1, 8, '2022-02-15', '00:00:00', '2022-02-15', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:50:40'),
(99, 37, 1, 1, 16, 1, 8, '2022-01-06', '00:00:00', '2022-01-06', '14:00:00', '2022-05-02', '0', '0', '0', '2022-05-02 12:00:00', '2022-07-23 03:52:13'),
(100, 37, 2, 2, 16, 1, 8, '2022-01-25', '00:00:00', '2022-01-25', '00:00:00', '2022-05-02', '0', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:07:27'),
(101, 9, 1, 1, 16, 1, 8, '2022-01-17', '00:00:00', '2022-01-17', '00:00:00', '2022-05-02', '0', '8', '0', '2022-05-02 12:00:00', '2022-07-23 04:15:29'),
(103, 9, 1, 2, 16, 1, 8, '2022-01-26', '00:00:00', '2022-01-27', '00:00:00', '2022-05-02', '2', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:15:56'),
(105, 9, 1, 1, 16, 1, 8, '2022-02-17', '00:00:00', '2022-01-17', '12:00:00', '2022-05-02', '0', '3', '30', '2022-05-02 12:00:00', '2022-07-23 04:16:14'),
(106, 9, 1, 1, 16, 1, 8, '2022-02-18', '00:00:00', '2022-02-18', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:16:30'),
(107, 9, 1, 1, 16, 1, 8, '2022-02-21', '00:00:00', '2022-02-22', '00:00:00', '2022-05-02', '2', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:16:50'),
(108, 20, 1, 1, 16, 1, 8, '2022-01-07', '00:00:00', '2022-01-07', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:17:45'),
(109, 20, 1, 2, 16, 1, 8, '2022-01-11', '00:00:00', '2022-01-12', '00:00:00', '2022-05-02', '2', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:17:55'),
(111, 20, 1, 2, 16, 1, 8, '2022-01-27', '00:00:00', '0222-01-28', '00:00:00', '2022-05-02', '2', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:18:13'),
(112, 20, 1, 2, 16, 1, 8, '2022-01-29', '00:00:00', '2022-02-11', '00:00:00', '2022-05-02', '13', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:18:40'),
(113, 14, 1, 2, 31, 1, 8, '2022-01-13', '00:00:00', '2022-01-14', '00:00:00', '2022-05-02', '2', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:19:13'),
(115, 14, 1, 2, 31, 1, 8, '2022-01-27', '07:30:00', '2022-01-27', '12:15:00', '2022-05-02', '0', '3', '15', '2022-05-02 12:00:00', '2022-07-23 04:19:28'),
(116, 14, 1, 1, 31, 1, 8, '2022-02-04', '07:30:00', '2022-02-04', '12:15:00', '2022-05-02', '0', '3', '15', '2022-05-02 12:00:00', '2022-07-23 04:19:41'),
(117, 5, 1, 5, 43, 1, 8, '2022-01-07', '00:00:00', '2022-01-07', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:20:23'),
(120, 5, 1, 2, 43, 1, 8, '2022-02-02', '08:00:00', '2022-02-02', '14:30:00', '2022-05-02', '0', '0', '30', '2022-05-02 12:00:00', '2022-07-23 04:20:45'),
(121, 5, 1, 2, 43, 1, 8, '2022-02-03', '08:01:00', '2022-02-03', '14:30:00', '2022-05-02', '0', '1', '0', '2022-05-02 12:00:00', '2022-07-23 04:21:10'),
(122, 25, 1, 2, 21, 1, 8, '2022-01-24', '00:00:00', '2022-02-06', '00:00:00', '2022-05-02', '14', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:21:45'),
(123, 25, 1, 1, 21, 1, 8, '2022-02-11', '08:01:00', '2022-02-11', '15:30:00', '2022-05-02', '0', '0', '31', '2022-05-02 12:00:00', '2022-07-23 06:22:55'),
(124, 32, 1, 1, 43, 1, 8, '2022-01-04', '10:49:00', '2022-01-04', '15:30:00', '2022-05-02', '0', '3', '19', '2022-05-02 12:00:00', '2022-07-23 04:22:53'),
(125, 32, 1, 1, 43, 1, 8, '2022-01-10', '07:30:00', '2022-01-10', '14:00:00', '2022-05-02', '0', '1', '30', '2022-05-02 12:00:00', '2022-07-23 04:23:10'),
(127, 32, 1, 2, 43, 1, 8, '2022-02-02', '00:00:00', '2022-02-04', '00:00:00', '2022-05-02', '3', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:23:32'),
(128, 32, 1, 1, 43, 1, 8, '2022-02-15', '11:13:00', '2022-02-15', '15:30:00', '2022-05-02', '0', '3', '43', '2022-05-02 12:00:00', '2022-07-23 04:23:51'),
(129, 34, 1, 2, 16, 1, 8, '2022-01-05', '00:00:00', '2022-01-05', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:25:09'),
(131, 34, 1, 2, 16, 1, 8, '2022-01-18', '10:34:00', '2022-01-18', '15:30:00', '2022-05-02', '0', '4', '56', '2022-05-02 12:00:00', '2022-07-23 04:25:23'),
(132, 34, 1, 2, 16, 1, 8, '2022-01-31', '07:30:00', '2022-02-02', '15:30:00', '2022-05-02', '3', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:25:50'),
(133, 34, 1, 2, 16, 1, 8, '2022-02-04', '07:30:00', '2022-02-04', '15:30:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:26:05'),
(134, 18, 1, 2, 16, 1, 8, '2022-01-27', '00:00:00', '2022-01-27', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:27:02'),
(135, 18, 1, 2, 16, 1, 8, '2022-01-26', '07:30:00', '2022-01-26', '12:56:00', '2022-05-02', '0', '2', '34', '2022-05-02 12:00:00', '2022-07-23 04:27:13'),
(136, 42, 1, 2, 31, 1, 8, '2022-01-04', '07:30:00', '2022-01-04', '10:00:00', '2022-05-02', '0', '5', '30', '2022-05-02 12:00:00', '2022-07-23 04:27:41'),
(137, 42, 1, 5, 31, 1, 8, '2022-01-12', '00:00:00', '2022-01-12', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:27:53'),
(138, 39, 1, 5, 15, 1, 8, '2022-01-07', '00:00:00', '2022-01-07', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:35:25'),
(139, 11, 1, 5, 16, 1, 8, '2022-01-21', '00:00:00', '2022-01-21', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:35:46'),
(140, 40, 1, 2, 31, 1, 8, '2022-02-04', '00:00:00', '2022-02-04', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:36:27'),
(141, 40, 1, 2, 31, 1, 8, '2022-02-14', '00:00:00', '2022-02-14', '00:00:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:36:40'),
(142, 33, 1, 1, 31, 1, 8, '2022-04-28', '07:30:00', '2022-04-28', '15:30:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:37:26'),
(143, 15, 1, 1, 16, 1, 8, '2022-04-20', '07:30:00', '2022-04-20', '13:01:00', '2022-05-02', '0', '2', '30', '2022-05-02 12:00:00', '2022-07-23 04:38:01'),
(144, 15, 1, 5, 16, 1, 8, '2022-04-26', '07:30:00', '2022-04-26', '15:30:00', '2022-05-02', '1', '0', '0', '2022-05-02 12:00:00', '2022-07-23 04:38:13'),
(147, 44, 1, 2, 16, 1, 8, '2022-04-25', '07:30:00', '2022-04-25', '15:30:00', '2022-05-04', '1', '0', '0', '2022-05-04 12:00:00', '2022-07-23 04:45:35'),
(148, 44, 1, 2, 16, 1, 8, '2022-04-29', '07:30:00', '2022-04-29', '15:30:00', '2022-05-04', '1', '0', '0', '2022-05-04 12:00:00', '2022-07-23 04:45:52'),
(149, 46, 1, 2, 16, 1, 8, '2022-04-07', '07:30:00', '2022-04-07', '15:30:00', '2022-05-04', '1', '0', '0', '2022-05-04 12:00:00', '2022-07-23 04:46:32'),
(150, 46, 1, 2, 16, 1, 8, '2022-04-19', '07:30:00', '2022-04-19', '15:30:00', '2022-05-04', '1', '0', '0', '2022-05-04 12:00:00', '2022-07-23 04:46:42'),
(151, 13, 1, 2, 16, 1, 8, '2022-04-26', '08:27:00', '2022-04-26', '15:30:00', '2022-05-04', '0', '0', '57', '2022-05-04 12:00:00', '2022-07-23 04:47:13'),
(152, 13, 1, 2, 16, 1, 8, '2022-04-27', '07:30:00', '2022-04-27', '15:30:00', '2022-05-04', '1', '0', '0', '2022-05-04 12:00:00', '2022-07-23 04:47:30'),
(153, 13, 1, 1, 16, 1, 8, '2022-04-29', '08:05:00', '2022-04-29', '15:30:00', '2022-05-04', '0', '0', '35', '2022-05-04 12:00:00', '2022-07-23 04:47:43'),
(154, 36, 1, 2, 16, 1, 8, '2022-04-29', '07:30:00', '2022-04-29', '15:30:00', '2022-05-04', '1', '0', '0', '2022-05-04 12:00:00', '2022-07-23 04:48:09'),
(159, 30, 1, 1, 43, 1, 8, '2022-02-25', '07:30:00', '2022-02-25', '15:30:00', '2022-05-06', '1', '0', '0', '2022-05-06 12:00:00', '2022-07-23 04:48:58'),
(160, 30, 1, 2, 43, 1, 8, '2022-01-20', '07:30:00', '2022-01-20', '10:02:00', '2022-05-06', '0', '5', '28', '2022-05-06 12:00:00', '2022-07-23 04:49:11'),
(161, 30, 1, 5, 43, 1, 8, '2022-01-14', '07:30:00', '2022-01-14', '15:30:00', '2022-05-06', '1', '0', '0', '2022-05-06 12:00:00', '2022-07-23 04:49:29'),
(162, 12, 1, 1, 16, 1, 8, '2022-04-20', '07:30:00', '2022-04-22', '15:30:00', '2022-05-09', '3', '0', '0', '2022-05-09 12:00:00', '2022-07-23 04:50:02'),
(163, 12, 1, 1, 16, 1, 8, '2022-05-06', '08:01:00', '2022-05-06', '15:30:00', '2022-05-09', '0', '0', '31', '2022-05-09 12:00:00', '2022-07-23 04:50:23'),
(166, 15, 1, 5, 16, 1, 8, '2022-02-15', '08:08:00', '2022-02-15', '15:30:00', '2022-05-09', '0', '1', '33', '2022-05-09 12:00:00', '2022-07-23 04:50:56'),
(167, 15, 1, 2, 16, 1, 8, '2022-02-22', '12:26:00', '2022-02-22', '15:30:00', '2022-05-09', '0', '3', '4', '2022-05-09 12:00:00', '2022-07-23 04:51:09'),
(170, 42, 1, 5, 31, 1, 8, '2022-05-09', '07:30:00', '2022-05-09', '15:30:00', '2022-05-11', '1', '0', '0', '2022-05-11 12:00:00', '2022-07-23 04:52:46'),
(171, 42, 1, 5, 31, 1, 8, '2022-05-11', '00:00:00', '2022-05-11', '00:00:00', '2022-05-11', '1', '0', '0', '2022-05-11 12:00:00', '2022-07-23 04:53:02'),
(172, 40, 1, 5, 31, 1, 8, '2022-05-09', '00:00:00', '2022-05-09', '00:00:00', '2022-05-11', '1', '0', '0', '2022-05-11 12:00:00', '2022-07-23 04:54:16'),
(173, 20, 1, 5, 16, 1, 8, '2022-05-09', '00:00:00', '2022-05-09', '00:00:00', '2022-05-11', '1', '0', '0', '2022-05-11 12:00:00', '2022-07-23 04:55:00'),
(174, 27, 1, 1, 43, 1, 8, '2022-05-04', '08:04:00', '2022-05-04', '15:30:00', '2022-05-11', '0', '0', '34', '2022-05-11 12:00:00', '2022-07-23 04:56:07'),
(175, 39, 1, 1, 15, 1, 8, '2022-05-09', '09:53:00', '2022-05-09', '15:30:00', '2022-05-11', '0', '2', '23', '2022-05-11 12:00:00', '2022-07-23 04:56:37'),
(176, 39, 1, 1, 15, 1, 8, '2022-05-04', '08:01:00', '2022-05-04', '15:30:00', '2022-05-11', '0', '0', '31', '2022-05-11 12:00:00', '2022-07-23 04:56:47'),
(177, 15, 1, 1, 16, 1, 8, '2022-05-04', '08:01:00', '2022-05-04', '15:30:00', '2022-05-11', '0', '0', '31', '2022-05-11 12:00:00', '2022-07-23 04:57:14'),
(178, 34, 1, 2, 16, 1, 8, '2022-05-02', '08:31:00', '2022-05-02', '15:30:00', '2022-05-11', '0', '1', '1', '2022-05-11 12:00:00', '2022-07-23 04:57:46'),
(179, 31, 1, 1, 16, 1, 8, '2022-05-13', '07:30:00', '2022-05-13', '15:30:00', '2022-05-19', '1', '0', '0', '2022-05-19 12:00:00', '2022-07-23 04:58:27'),
(180, 5, 1, 5, 43, 1, 8, '2022-05-09', '07:30:00', '2022-05-09', '15:30:00', '2022-05-19', '1', '0', '0', '2022-05-19 12:00:00', '2022-07-23 04:58:57'),
(181, 14, 1, 2, 31, 1, 8, '2022-05-11', '07:30:00', '2022-05-12', '15:30:00', '2022-05-19', '2', '0', '0', '2022-05-19 12:00:00', '2022-07-23 04:59:17'),
(182, 14, 1, 1, 31, 1, 8, '2022-05-13', '07:30:00', '2022-05-13', '15:30:00', '2022-05-19', '1', '0', '0', '2022-05-19 12:00:00', '2022-07-23 04:59:42'),
(183, 44, 1, 2, 16, 1, 8, '2022-05-01', '07:30:00', '2022-05-05', '15:30:00', '2022-05-19', '5', '0', '0', '2022-05-19 12:00:00', '2022-07-23 05:00:16'),
(184, 6, 2, 1, 36, 1, 8, '2022-05-01', '00:00:00', '2022-05-31', '00:00:00', '2022-05-19', '31', '0', '0', '2022-05-19 12:00:00', '2022-07-23 05:00:42'),
(185, 10, 1, 2, 43, 1, 8, '2022-01-04', '07:30:00', '2022-01-04', '14:10:00', '2022-05-25', '0', '1', '20', '2022-05-25 12:00:00', '2022-07-23 05:01:09'),
(187, 10, 1, 1, 43, 1, 8, '2022-01-07', '00:00:00', '2022-01-07', '00:00:00', '2022-05-25', '1', '0', '0', '2022-05-25 12:00:00', '2022-07-23 05:01:24'),
(188, 10, 1, 2, 43, 1, 8, '2022-01-12', '10:58:00', '2022-01-12', '15:30:00', '2022-05-25', '0', '3', '28', '2022-05-25 12:00:00', '2022-07-23 05:01:38'),
(189, 10, 1, 2, 43, 1, 8, '2022-01-14', '11:26:00', '2022-01-14', '15:30:00', '2022-05-25', '0', '3', '56', '2022-05-25 12:00:00', '2022-07-23 05:02:00'),
(190, 10, 1, 2, 43, 1, 8, '2022-01-24', '00:00:00', '2022-01-26', '00:00:00', '2022-05-25', '3', '0', '0', '2022-05-25 12:00:00', '2022-07-23 05:02:13'),
(191, 37, 1, 2, 16, 1, 8, '2022-01-06', '07:30:00', '2022-01-06', '14:00:00', '2022-05-25', '0', '1', '30', '2022-05-25 12:00:00', '2022-07-23 05:02:42'),
(192, 37, 1, 2, 16, 1, 8, '2022-01-25', '00:00:00', '2022-03-11', '00:00:00', '2022-05-25', '45', '0', '0', '2022-05-25 12:00:00', '2022-07-23 05:02:53'),
(193, 37, 2, 2, 16, 1, 8, '2022-03-12', '00:00:00', '2022-04-25', '00:00:00', '2022-05-25', '45', '0', '0', '2022-05-25 12:00:00', '2022-07-23 05:03:10'),
(194, 9, 1, 2, 16, 1, 8, '2022-01-25', '12:00:00', '2022-01-25', '15:30:00', '2022-05-25', '0', '3', '30', '2022-05-25 12:00:00', '2022-07-23 05:08:51'),
(195, 20, 1, 2, 16, 1, 8, '2022-01-24', '00:00:00', '2022-01-26', '00:00:00', '2022-05-26', '3', '0', '0', '2022-05-26 12:00:00', '2022-07-23 05:09:26'),
(196, 5, 1, 2, 43, 1, 8, '2022-01-12', '08:40:00', '2022-01-12', '15:30:00', '2022-05-26', '0', '1', '10', '2022-05-26 12:00:00', '2022-07-23 05:09:45'),
(197, 42, 1, 1, 31, 1, 8, '2022-05-17', '07:30:00', '2022-05-17', '14:00:00', '2022-05-27', '0', '1', '30', '2022-05-27 12:00:00', '2022-07-23 05:10:04'),
(199, 10, 1, 2, 43, 1, 8, '2022-05-17', '11:20:00', '2022-05-17', '15:30:00', '2022-05-27', '0', '3', '50', '2022-05-27 12:00:00', '2022-07-23 05:10:31'),
(201, 35, 1, 1, 43, 1, 8, '2022-05-09', '09:50:00', '2022-05-09', '14:30:00', '2022-05-27', '0', '1', '50', '2022-05-27 12:00:00', '2022-07-23 05:10:55'),
(202, 31, 1, 1, 16, 1, 8, '2022-05-24', '08:01:00', '2022-05-24', '15:30:00', '2022-05-27', '0', '0', '31', '2022-05-27 12:00:00', '2022-07-23 05:11:21'),
(203, 25, 1, 1, 21, 1, 8, '2022-05-23', '08:10:00', '2022-05-23', '13:30:00', '2022-05-27', '0', '2', '17', '2022-05-27 12:00:00', '2022-07-23 05:14:08'),
(204, 32, 1, 2, 43, 1, 8, '2022-05-20', '00:00:00', '2022-05-20', '00:00:00', '2022-05-27', '1', '0', '0', '2022-05-27 12:00:00', '2022-07-23 05:14:29'),
(205, 32, 1, 1, 43, 1, 8, '2022-05-19', '07:30:00', '2022-05-19', '13:06:00', '2022-05-27', '0', '2', '24', '2022-05-27 12:00:00', '2022-07-23 05:14:41'),
(206, 34, 1, 2, 16, 1, 8, '2022-05-18', '07:30:00', '2022-05-18', '10:41:00', '2022-05-27', '0', '4', '49', '2022-05-27 12:00:00', '2022-07-23 05:15:11'),
(207, 15, 1, 2, 16, 1, 8, '2022-05-16', '00:00:00', '2022-05-18', '00:00:00', '2022-05-27', '3', '0', '0', '2022-05-27 12:00:00', '2022-07-23 05:15:36'),
(208, 29, 1, 1, 43, 1, 8, '2022-05-20', '00:00:00', '2022-05-20', '00:00:00', '2022-05-27', '1', '0', '0', '2022-05-27 12:00:00', '2022-07-23 05:16:45'),
(209, 35, 1, 1, 43, 1, 8, '2022-05-11', '09:51:00', '2022-05-11', '15:30:00', '2022-05-27', '0', '2', '21', '2022-05-27 12:00:00', '2022-07-23 05:17:14'),
(210, 10, 1, 2, 43, 1, 8, '2022-05-24', '12:15:00', '2022-05-24', '15:30:00', '2022-05-27', '0', '4', '45', '2022-05-27 12:00:00', '2022-07-23 05:17:49'),
(211, 35, 1, 1, 43, 1, 8, '2022-05-23', '08:16:00', '2022-05-23', '14:30:00', '2022-05-27', '0', '0', '46', '2022-05-27 12:00:00', '2022-07-23 05:18:50'),
(212, 35, 1, 5, 43, 1, 8, '2022-05-13', '00:00:00', '2022-05-13', '00:00:00', '2022-05-27', '1', '0', '0', '2022-05-27 12:00:00', '2022-07-23 05:19:05'),
(213, 21, 1, 2, 16, 1, 8, '2022-05-18', '00:00:00', '2022-05-20', '00:00:00', '2022-05-27', '3', '0', '0', '2022-05-27 12:00:00', '2022-07-23 05:19:42'),
(214, 21, 1, 1, 16, 1, 8, '2022-05-17', '00:00:00', '2022-05-17', '00:00:00', '2022-05-27', '1', '0', '0', '2022-05-27 12:00:00', '2022-07-23 05:19:58'),
(215, 39, 1, 1, 15, 1, 8, '2022-05-24', '08:02:00', '2022-05-24', '15:30:00', '2022-05-27', '0', '0', '32', '2022-05-27 12:00:00', '2022-07-23 05:21:13'),
(216, 30, 1, 5, 43, 1, 8, '2022-05-20', '00:00:00', '2022-05-20', '00:00:00', '2022-05-27', '1', '0', '0', '2022-05-27 12:00:00', '2022-07-23 05:21:43'),
(217, 12, 1, 1, 16, 1, 8, '2022-05-23', '08:01:00', '2022-05-23', '15:30:00', '2022-05-27', '0', '0', '31', '2022-05-27 12:00:00', '2022-07-23 05:22:16'),
(219, 15, 1, 1, 16, 1, 8, '2022-05-24', '08:01:00', '2022-05-24', '15:30:00', '2022-05-27', '0', '0', '31', '2022-05-27 12:00:00', '2022-07-23 05:22:44'),
(220, 29, 1, 2, 43, 1, 8, '2022-05-25', '07:30:00', '2022-05-25', '09:30:00', '2022-05-27', '0', '6', '0', '2022-05-27 12:00:00', '2022-07-23 05:23:03'),
(221, 31, 1, 2, 16, 1, 8, '2022-05-27', '00:00:00', '2022-05-27', '00:00:00', '2022-06-03', '1', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:23:39'),
(222, 41, 1, 2, 31, 1, 8, '2022-05-24', '07:30:00', '2022-05-24', '12:30:00', '2022-06-03', '0', '3', '0', '2022-06-03 12:00:00', '2022-07-23 05:24:01'),
(223, 44, 1, 1, 16, 1, 8, '2022-05-23', '00:00:00', '2022-05-23', '00:00:00', '2022-06-03', '1', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:24:41'),
(224, 44, 1, 1, 16, 1, 8, '2022-05-20', '00:00:00', '2022-05-20', '00:00:00', '2022-06-03', '1', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:24:56'),
(225, 44, 1, 2, 16, 1, 8, '2022-05-26', '00:00:00', '2022-05-27', '00:00:00', '2022-06-03', '2', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:25:07'),
(226, 32, 1, 1, 43, 1, 8, '2022-05-09', '00:00:00', '2022-05-09', '00:00:00', '2022-06-03', '1', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:25:40'),
(227, 18, 1, 2, 16, 1, 8, '2022-05-16', '00:00:00', '2022-05-17', '00:00:00', '2022-06-03', '2', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:26:13'),
(228, 18, 1, 1, 16, 1, 8, '2022-05-11', '00:00:00', '2022-05-13', '00:00:00', '2022-06-03', '3', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:26:31'),
(229, 15, 1, 2, 16, 1, 8, '2022-05-16', '00:00:00', '2022-05-18', '00:00:00', '2022-06-03', '3', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:29:47'),
(230, 10, 1, 2, 43, 1, 8, '2022-05-03', '00:00:00', '2022-05-03', '00:00:00', '2022-06-03', '1', '0', '0', '2022-06-03 12:00:00', '2022-07-23 05:30:07'),
(231, 26, 1, 1, 16, 1, 8, '2022-05-04', '08:01:00', '2022-05-04', '15:30:00', '2022-06-03', '0', '0', '31', '2022-06-03 12:00:00', '2022-07-23 05:30:31'),
(232, 41, 1, 1, 31, 1, 8, '2022-05-09', '08:35:00', '2022-05-09', '15:30:00', '2022-06-08', '0', '1', '5', '2022-06-08 12:00:00', '2022-07-23 05:31:04'),
(233, 41, 1, 1, 31, 1, 8, '2022-05-26', '10:30:00', '2022-05-26', '15:30:00', '2022-06-08', '0', '3', '0', '2022-06-08 12:00:00', '2022-07-23 05:31:23'),
(234, 13, 1, 2, 16, 1, 8, '2022-05-30', '00:00:00', '2022-05-30', '00:00:00', '2022-06-08', '1', '0', '0', '2022-06-08 12:00:00', '2022-07-23 05:32:07'),
(235, 13, 1, 5, 16, 1, 8, '2022-05-02', '00:00:00', '2022-05-02', '00:00:00', '2022-06-08', '1', '0', '0', '2022-06-08 12:00:00', '2022-07-23 05:32:26'),
(236, 13, 1, 1, 16, 1, 8, '2022-05-12', '00:00:00', '2022-05-12', '00:00:00', '2022-06-08', '1', '0', '0', '2022-06-08 12:00:00', '2022-07-23 05:32:46'),
(237, 24, 1, 2, 16, 1, 8, '2022-05-30', '00:00:00', '2022-05-30', '00:00:00', '2022-06-08', '1', '0', '0', '2022-06-08 12:00:00', '2022-07-23 05:33:32'),
(238, 28, 1, 1, 16, 1, 8, '2022-05-27', '07:30:00', '2022-05-27', '11:43:00', '2022-06-08', '0', '3', '47', '2022-06-08 12:00:00', '2022-07-23 05:33:55'),
(239, 35, 1, 1, 43, 1, 8, '2022-05-12', '08:41:00', '2022-05-12', '15:30:00', '2022-06-08', '0', '1', '11', '2022-06-08 12:00:00', '2022-07-23 05:34:19'),
(240, 35, 1, 1, 43, 1, 8, '2022-05-06', '09:15:00', '2022-05-06', '15:30:00', '2022-06-08', '0', '1', '45', '2022-06-08 12:00:00', '2022-07-23 05:34:31'),
(241, 35, 1, 2, 16, 1, 8, '2022-05-04', '00:00:00', '2022-05-05', '00:00:00', '2022-06-08', '2', '0', '0', '2022-06-08 12:00:00', '2022-07-23 05:34:40'),
(242, 8, 1, 2, 31, 1, 8, '2022-05-06', '07:30:00', '2022-05-06', '13:23:00', '2022-06-08', '0', '2', '7', '2022-06-08 12:00:00', '2022-07-23 05:35:06'),
(243, 4, 1, 5, 16, 1, 8, '2022-01-25', '00:00:00', '2022-01-25', '00:00:00', '2022-06-14', '1', '0', '0', '2022-06-14 12:00:00', '2022-07-23 05:35:40'),
(245, 41, 1, 1, 31, 1, 8, '2022-04-28', '00:00:00', '2022-04-28', '00:00:00', '2022-06-14', '1', '0', '0', '2022-06-14 12:00:00', '2022-07-23 05:36:15'),
(246, 35, 1, 2, 43, 1, 8, '2022-03-01', '00:00:00', '2022-03-08', '00:00:00', '2022-06-14', '6', '0', '0', '2022-06-14 12:00:00', '2022-07-23 05:36:34'),
(248, 30, 1, 2, 43, 1, 8, '2022-05-24', '08:03:00', '2022-05-24', '15:30:00', '2022-06-15', '0', '0', '33', '2022-06-15 12:00:00', '2022-07-23 05:36:55'),
(249, 41, 1, 5, 31, 1, 8, '2022-05-18', '07:30:00', '2022-05-18', '14:00:00', '2022-06-15', '0', '1', '30', '2022-06-15 12:00:00', '2022-07-23 05:37:14'),
(253, 10, 1, 1, 43, 1, 8, '2022-04-08', '00:00:00', '2022-04-08', '00:00:00', '2022-06-20', '1', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:37:51'),
(254, 10, 1, 2, 43, 1, 8, '2022-04-27', '08:05:00', '2022-04-27', '15:30:00', '2022-06-20', '0', '0', '35', '2022-06-20 12:00:00', '2022-07-23 05:38:00'),
(255, 10, 1, 1, 43, 1, 8, '2022-03-03', '07:30:00', '2022-03-03', '15:00:00', '2022-06-20', '0', '0', '30', '2022-06-20 12:00:00', '2022-07-23 05:38:24'),
(256, 10, 1, 1, 43, 1, 8, '2022-03-10', '07:30:00', '2022-03-10', '14:35:00', '2022-06-20', '0', '0', '55', '2022-06-20 12:00:00', '2022-07-23 05:38:55'),
(257, 10, 1, 1, 43, 1, 8, '2022-03-25', '00:00:00', '2022-03-25', '00:00:00', '2022-06-20', '1', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:39:05'),
(258, 10, 2, 2, 43, 1, 8, '2022-02-01', '00:00:00', '2022-02-07', '00:00:00', '2022-06-20', '7', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:39:21'),
(259, 14, 1, 1, 31, 1, 8, '2022-05-24', '00:00:00', '2022-05-24', '00:00:00', '2022-06-20', '1', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:45:16'),
(261, 25, 1, 1, 21, 1, 8, '2022-01-10', '07:30:00', '2022-01-10', '13:30:00', '2022-06-20', '0', '2', '0', '2022-06-20 12:00:00', '2022-07-23 05:45:41'),
(262, 32, 1, 2, 43, 1, 8, '2022-03-01', '00:00:00', '2022-03-03', '00:00:00', '2022-06-20', '3', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:46:20'),
(263, 32, 1, 2, 43, 1, 8, '2022-02-21', '00:00:00', '2022-02-28', '00:00:00', '2022-06-20', '6', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:46:31'),
(265, 13, 1, 1, 16, 1, 8, '2022-02-01', '00:00:00', '2022-02-01', '00:00:00', '2022-06-20', '1', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:46:52'),
(266, 13, 1, 2, 16, 1, 8, '2022-01-07', '00:00:00', '2022-01-07', '00:00:00', '2022-06-20', '1', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:47:07'),
(267, 13, 1, 5, 16, 1, 8, '2022-01-14', '07:30:00', '2022-01-14', '13:30:00', '2022-06-20', '0', '2', '0', '2022-06-20 12:00:00', '2022-07-23 05:47:20'),
(273, 39, 1, 2, 15, 1, 8, '2022-02-21', '00:00:00', '2022-03-06', '00:00:00', '2022-06-20', '14', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:50:24'),
(274, 46, 1, 1, 16, 1, 8, '2022-03-02', '00:00:00', '2022-03-02', '00:00:00', '2022-06-20', '1', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:51:05'),
(275, 46, 1, 1, 16, 1, 8, '2022-02-02', '00:00:00', '2022-02-02', '00:00:00', '2022-06-20', '1', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:51:15'),
(276, 36, 1, 2, 16, 1, 8, '2022-01-28', '00:00:00', '2022-01-28', '00:00:00', '2022-06-20', '14', '0', '0', '2022-06-20 12:00:00', '2022-07-23 05:53:48'),
(277, 10, 1, 2, 43, 1, 8, '2022-06-20', '00:00:00', '2022-06-20', '00:00:00', '2022-06-27', '1', '0', '0', '2022-06-27 12:00:00', '2022-07-23 05:54:17'),
(278, 25, 1, 1, 21, 1, 8, '2022-06-20', '07:30:00', '2022-06-20', '14:00:00', '2022-06-27', '0', '1', '30', '2022-06-27 12:00:00', '2022-07-23 05:59:35'),
(279, 41, 1, 5, 8, 1, 8, '2022-06-20', '07:30:00', '2022-06-20', '12:00:00', '2022-06-27', '0', '3', '30', '2022-06-27 12:00:00', '2022-07-23 06:00:16'),
(280, 45, 1, 2, 16, 1, 8, '2022-06-13', '00:00:00', '2022-06-13', '15:30:00', '2022-06-27', '1', '0', '0', '2022-06-27 12:00:00', '2022-07-23 06:00:47'),
(281, 40, 1, 2, 8, 1, 8, '2022-06-16', '00:00:00', '2022-06-16', '00:00:00', '2022-06-27', '1', '0', '0', '2022-06-27 12:00:00', '2022-07-23 06:01:28'),
(282, 41, 1, 1, 8, 1, 8, '2022-06-06', '10:30:00', '2022-06-06', '15:30:00', '2022-06-27', '0', '3', '0', '2022-06-27 12:00:00', '2022-07-23 06:01:48'),
(283, 39, 1, 1, 15, 1, 8, '2022-06-14', '08:18:00', '2022-06-14', '15:30:00', '2022-06-27', '0', '0', '48', '2022-06-27 12:00:00', '2022-07-23 06:02:17'),
(284, 31, 1, 2, 16, 1, 8, '2022-06-09', '07:30:00', '2022-06-09', '13:33:00', '2022-06-27', '0', '1', '57', '2022-06-27 12:00:00', '2022-07-23 06:02:42'),
(285, 8, 1, 2, 31, 1, 8, '2022-06-08', '07:30:00', '2022-06-08', '13:11:00', '2022-06-27', '0', '2', '19', '2022-06-27 12:00:00', '2022-07-23 06:03:09'),
(286, 20, 1, 1, 16, 1, 8, '2022-06-10', '00:00:00', '2022-06-10', '00:00:00', '2022-06-27', '1', '0', '0', '2022-06-27 12:00:00', '2022-07-23 06:03:38'),
(287, 42, 1, 2, 8, 1, 8, '2022-06-13', '07:30:00', '2022-06-13', '13:30:00', '2022-06-28', '0', '2', '0', '2022-06-28 12:00:00', '2022-07-23 06:03:56'),
(288, 32, 1, 2, 16, 1, 8, '2022-06-07', '00:00:00', '2022-06-07', '00:00:00', '2022-06-28', '1', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:04:22'),
(289, 25, 1, 2, 21, 1, 8, '2022-06-07', '08:07:00', '2022-06-07', '15:30:00', '2022-06-28', '0', '0', '37', '2022-06-28 12:00:00', '2022-07-23 06:04:52'),
(290, 14, 1, 2, 31, 1, 8, '2022-06-01', '08:01:00', '2022-06-01', '15:30:00', '2022-06-28', '0', '0', '31', '2022-06-28 12:00:00', '2022-07-23 06:05:32'),
(291, 10, 1, 1, 43, 1, 8, '2022-06-07', '12:22:00', '2022-06-07', '15:30:00', '2022-06-28', '0', '4', '52', '2022-06-28 12:00:00', '2022-07-23 06:05:58'),
(292, 10, 1, 2, 43, 1, 8, '2022-06-01', '11:32:00', '2022-06-01', '15:30:00', '2022-06-28', '0', '4', '2', '2022-06-28 12:00:00', '2022-07-23 06:06:07'),
(293, 34, 1, 1, 16, 1, 8, '2022-06-10', '00:00:00', '2022-06-10', '00:00:00', '2022-06-28', '1', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:06:44'),
(294, 34, 1, 2, 16, 1, 8, '2022-06-07', '00:00:00', '2022-06-09', '00:00:00', '2022-06-28', '3', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:06:55'),
(295, 31, 1, 2, 16, 1, 8, '2022-06-24', '00:00:00', '2022-06-24', '00:00:00', '2022-06-28', '1', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:07:17'),
(296, 5, 1, 2, 43, 1, 8, '2022-06-21', '00:00:00', '2022-06-22', '00:00:00', '2022-06-28', '2', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:07:52'),
(297, 44, 1, 1, 16, 1, 8, '2022-06-22', '07:30:00', '2022-06-22', '12:30:00', '2022-06-28', '0', '3', '0', '2022-06-28 12:00:00', '2022-07-23 06:08:17'),
(298, 32, 1, 2, 43, 1, 8, '2022-06-27', '09:50:00', '2022-06-27', '15:30:00', '2022-06-28', '0', '2', '20', '2022-06-28 12:00:00', '2022-07-23 06:08:43'),
(299, 24, 1, 6, 16, 1, 8, '2022-06-07', '07:30:00', '2022-06-07', '15:30:00', '2022-06-28', '1', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:09:06'),
(300, 24, 1, 6, 16, 1, 8, '2022-06-09', '00:00:00', '2022-06-10', '00:00:00', '2022-06-28', '2', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:09:36'),
(301, 24, 1, 6, 16, 1, 8, '2022-06-24', '00:00:00', '2022-06-24', '00:00:00', '2022-06-28', '1', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:09:20'),
(302, 42, 1, 6, 8, 1, 8, '2022-06-01', '00:00:00', '2022-06-01', '00:00:00', '2022-06-28', '1', '0', '0', '2022-06-28 12:00:00', '2022-07-23 06:09:55'),
(303, 39, 1, 1, 15, 1, 8, '2022-06-24', '07:30:00', '2022-06-24', '11:32:00', '2022-06-29', '0', '3', '58', '2022-06-29 12:00:00', '2022-07-23 06:10:20'),
(304, 39, 1, 6, 15, 1, 8, '2022-06-03', '07:30:00', '2022-06-03', '15:30:00', '2022-06-29', '1', '0', '0', '2022-06-29 12:00:00', '2022-07-23 06:10:30'),
(305, 39, 1, 6, 15, 1, 8, '2022-06-15', '07:30:00', '2022-06-15', '13:15:00', '2022-06-29', '0', '2', '15', '2022-06-29 12:00:00', '2022-07-23 06:10:44'),
(306, 44, 1, 2, 16, 1, 8, '2022-05-30', '00:00:00', '2022-07-01', '00:00:00', '2022-07-05', '2', '0', '0', '2022-07-05 12:00:00', '2022-07-23 06:11:10'),
(307, 10, 1, 2, 43, 1, 8, '2022-06-30', '08:15:00', '2022-06-30', '15:30:00', '2022-07-05', '0', '0', '45', '2022-07-05 12:00:00', '2022-07-23 06:11:26'),
(308, 42, 1, 2, 8, 1, 8, '2022-06-22', '00:00:00', '2022-06-22', '00:00:00', '2022-07-05', '1', '0', '0', '2022-07-05 12:00:00', '2022-07-23 06:11:45'),
(309, 15, 1, 6, 16, 1, 8, '2022-06-02', '07:30:00', '2022-06-02', '13:00:00', '2022-07-05', '0', '2', '30', '2022-07-05 12:00:00', '2022-07-23 06:12:05'),
(310, 43, 1, 6, 16, 1, 8, '2022-06-29', '00:00:00', '2022-06-29', '00:00:00', '2022-07-05', '1', '0', '0', '2022-07-05 12:00:00', '2022-07-23 06:12:27'),
(311, 14, 1, 2, 8, 1, 8, '2022-07-01', '00:00:00', '2022-07-01', '00:00:00', '2022-07-06', '1', '0', '0', '2022-07-06 12:00:00', '2022-07-23 06:12:46'),
(312, 31, 1, 2, 16, 1, 8, '2022-07-01', '07:30:00', '2022-07-01', '12:31:00', '2022-07-06', '0', '2', '59', '2022-07-06 12:00:00', '2022-07-23 06:13:07'),
(313, 27, 1, 1, 43, 1, 8, '2022-07-07', '00:00:00', '2022-07-07', '00:00:00', '2022-07-06', '1', '0', '0', '2022-07-06 12:00:00', '2022-07-23 06:13:30');

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
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registros_salidas`
--

INSERT INTO `registros_salidas` (`id`, `id_lugar`, `id_usuario`, `id_estado`, `fecha`, `hora_inicio`, `hora_final`, `objetivo`, `title`, `color`, `start`, `end`, `created_at`, `updated_at`) VALUES
(4, 2, 1, 1, '2022-07-08', '07:30:00', '13:30:00', 'Configuración de equipos en el hospital', 'Registro de salida', '#959595', '2022-07-08 07:30:00', '2022-07-08 13:30:00', '2022-07-08 22:26:30', '2022-07-08 22:26:30');

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
(1, 'Administrador', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(2, 'Analista', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(3, 'Digitador', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(4, 'Participante', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(5, 'Motorista', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(6, 'Jefe de conservación', '2022-07-25 22:22:39', '2022-07-25 22:22:39'),
(7, 'Usuario', '2022-07-25 22:22:39', '2022-07-25 22:22:39');

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
(1, 'Sala DISAM', '2022-07-25 22:22:47', '2022-07-25 22:22:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_salas`
--

CREATE TABLE `solicitudes_salas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_autorizacion` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_sala` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_finalizacion` time NOT NULL,
  `actividad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudes_salas`
--

INSERT INTO `solicitudes_salas` (`id`, `id_autorizacion`, `id_usuario`, `id_sala`, `title`, `color`, `fecha`, `hora_inicio`, `hora_finalizacion`, `actividad`, `observaciones`, `start`, `end`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 'Solicitud Sala', '#338741', '2022-07-11', '09:00:00', '11:00:00', 'Reunion...', 'Reunion...', '2022-07-11 09:00:00', '2022-07-11 11:00:00', '2022-07-01 07:53:38', '2022-07-26 00:47:28'),
(2, 1, 4, 1, 'Solicitud Sala', '#338741', '2022-07-18', '09:00:00', '11:00:00', 'reunión', 'reunión', '2022-07-18 09:00:00', '2022-07-18 11:00:00', '2022-07-01 07:54:57', '2022-07-26 00:47:03'),
(3, 1, 9, 1, 'Solicitud Sala', '#338741', '2022-07-04', '08:31:00', '12:30:00', 'Reunión equipo técnico USBA', 'Necesito multimedia', '2022-07-04 08:31:00', '2022-07-04 12:30:00', '2022-07-06 02:15:37', '2022-07-26 00:47:45'),
(4, 1, 1, 1, 'Solicitud Sala', '#338741', '2022-07-05', '07:30:00', '15:30:00', 'Para configuración de las computadoras a distribuir', 'Solo se utilizara una mesa', '2022-07-05 07:30:00', '2022-07-05 15:30:00', '2022-07-07 01:46:24', '2022-07-26 00:47:36'),
(5, 1, 1, 1, 'Solicitud Sala', '#338741', '2022-07-06', '08:00:00', '16:00:00', 'Configuración de equipo', 'Ninguna', '2022-07-06 08:00:00', '2022-07-06 16:00:00', '2022-07-07 19:53:38', '2022-07-26 00:47:35'),
(6, 1, 1, 1, 'Solicitud Sala', '#338741', '2022-07-07', '07:30:00', '15:30:00', 'Configuración de equipo', 'Ninguna', '2022-07-07 07:30:00', '2022-07-07 15:30:00', '2022-07-08 03:48:42', '2022-07-26 00:47:32'),
(7, 1, 1, 1, 'Solicitud Sala', '#338741', '2022-07-08', '08:34:00', '15:30:00', 'Configuración de equipo', 'Ninguna', '2022-07-08 08:34:00', '2022-07-08 15:30:00', '2022-07-09 03:35:41', '2022-07-26 00:47:30'),
(8, 1, 12, 1, 'Solicitud Sala', '#338741', '2022-07-12', '07:30:00', '15:30:00', 'Actualización de equipos', 'Actualización de equipos', '2022-07-12 07:30:00', '2022-07-12 15:30:00', '2022-07-13 13:37:36', '2022-07-26 00:47:25'),
(9, 1, 12, 1, 'Solicitud Sala', '#338741', '2022-07-13', '07:30:00', '15:30:00', 'Configuración de equipos\r\nReunión VUC Tabaco', 'Configuración de equipo y reuniones sistemas', '2022-07-13 07:30:00', '2022-07-13 15:30:00', '2022-07-14 13:35:59', '2022-07-26 00:47:08'),
(10, 1, 12, 1, 'Solicitud Sala', '#338741', '2022-07-14', '07:30:00', '15:30:00', 'Configuración de equipos', 'Se utilizara una sola mesa', '2022-07-14 07:30:00', '2022-07-14 15:30:00', '2022-07-15 13:27:58', '2022-07-26 00:47:05'),
(11, 1, 3, 1, 'Solicitud Sala', '#338741', '2022-08-09', '08:00:00', '15:00:00', 'evaluación/lineamiento', 'autorizada por el Director', '2022-08-09 08:00:00', '2022-08-09 15:00:00', '2022-07-16 15:29:55', '2022-07-26 00:45:27'),
(12, 1, 12, 1, 'Solicitud Sala', '#338741', '2022-07-19', '07:30:00', '15:30:00', 'Reunión VUC Tabaco / Preparación de ruta distribución de equipos', 'Preparación y reunión', '2022-07-19 07:30:00', '2022-07-19 15:30:00', '2022-07-20 13:12:24', '2022-07-26 00:47:00'),
(13, 1, 5, 1, 'Solicitud Sala', '#338741', '2022-07-28', '13:00:00', '15:30:00', 'Videoconferencia con FECALAC, que presentará las propuestas de RTCA de yogur y quesos procesados o fundidos', 'Se solicita equipo informático', '2022-07-28 13:00:00', '2022-07-28 15:30:00', '2022-07-20 14:13:09', '2022-07-26 00:45:49'),
(14, 1, 12, 1, 'Solicitud Sala', '#338741', '2022-07-20', '07:30:00', '15:30:00', 'Proceso de inventario Tablets', 'Inventariado de Tablets', '2022-07-20 07:30:00', '2022-07-20 15:30:00', '2022-07-20 12:56:49', '2022-07-26 00:46:57'),
(15, 1, 12, 1, 'Solicitud Sala', '#338741', '2022-07-21', '07:30:00', '15:30:00', 'Proceso de inventario de inventario', 'Proceso de inventario de inventario', '2022-07-21 07:30:00', '2022-07-21 15:30:00', '2022-07-22 01:06:20', '2022-07-26 00:46:55'),
(16, 1, 6, 1, 'Solicitud Sala', '#338741', '2022-07-22', '08:00:00', '12:00:00', 'evaluacion', 'region central', '2022-07-22 08:00:00', '2022-07-22 12:00:00', '2022-07-22 01:46:05', '2022-07-26 00:46:10'),
(17, 1, 6, 1, 'Solicitud Sala', '#338741', '2022-09-22', '08:00:00', '12:00:00', 'evaluacion', 'evaluacion region occidental', '2022-09-22 08:00:00', '2022-09-22 12:00:00', '2022-07-22 01:47:37', '2022-07-26 00:44:53'),
(18, 1, 6, 1, 'Solicitud Sala', '#338741', '2022-08-12', '08:00:00', '12:00:00', 'evaluacion', 'evaluacion region metropolitana', '2022-08-12 08:00:00', '2022-08-12 12:00:00', '2022-07-22 01:48:25', '2022-07-26 00:45:20'),
(19, 1, 6, 1, 'Solicitud Sala', '#338741', '2022-08-19', '08:00:00', '12:00:00', 'evaluacion', 'evaluacion region oriental', '2022-08-19 08:00:00', '2022-08-19 12:00:00', '2022-07-22 01:49:17', '2022-07-26 00:45:16'),
(20, 1, 6, 1, 'Solicitud Sala', '#338741', '2022-07-29', '08:00:00', '12:00:00', 'evaluacion', 'evaluacion region occidente', '2022-07-29 08:00:00', '2022-07-29 12:00:00', '2022-07-22 02:29:01', '2022-07-26 00:45:37'),
(21, 1, 44, 1, 'Solicitud Sala', '#338741', '2022-07-25', '13:10:00', '15:30:00', 'reunion CONNA', 'Reunion CONNA', '2022-07-25 13:10:00', '2022-07-25 15:30:00', '2022-07-26 01:53:23', '2022-07-26 00:45:59'),
(22, 1, 12, 1, 'Solicitud Sala', '#338741', '2022-07-25', '08:00:00', '12:30:00', 'Una mesa para inventariar tablet', 'Una mesa para inventariar tablet', '2022-07-25 08:00:00', '2022-07-25 12:30:00', '2022-07-26 02:26:28', '2022-07-26 00:46:04'),
(23, 1, 39, 1, 'Solicitud Sala', '#338741', '2022-07-26', '07:30:00', '12:30:00', 'Actualizar Reglamento CAPI', 'Actualizar Reglamento CAPI', '2022-07-26 07:30:00', '2022-07-26 12:30:00', '2022-07-25 23:25:32', '2022-07-26 00:45:54'),
(25, 1, 12, 1, 'Solicitud Sala', '#338741', '2022-07-26', '13:00:00', '15:30:00', 'Preparación de rutas de distribución de equipos', 'Preparación de rutas de distribución de equipos', '2022-07-26 13:00:00', '2022-07-26 15:30:00', '2022-07-26 03:46:02', '2022-07-26 03:46:16');

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

--
-- Volcado de datos para la tabla `solicitudes_transportes`
--

INSERT INTO `solicitudes_transportes` (`id`, `id_dependencia`, `id_lugar`, `id_usuario`, `id_motorista`, `id_vehiculo`, `id_autorizacion`, `fecha`, `hora_salida`, `hora_regreso`, `objetivo`, `observaciones`, `lugar_solicitud`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 8, NULL, NULL, 3, '2022-07-06', '07:30:00', '12:30:00', 'reunión técnica', 'dos personas', 'San Salvador', '2022-07-06 21:54:59', '2022-07-06 21:54:59');

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
  `tipo_combustible` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Director de DISAM', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(2, 'Coordinador de Alimentos y Bebidas', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(3, 'Coordinadora de Zoonosis', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(4, 'Administracion de DISAM', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(5, 'Coordinador Saneamiento', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(6, 'Coordinador de Unidad Ambiental', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(7, 'Coordinacion Informatica', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(8, 'Coordinacion de Alcohol y Tabaco', '2022-07-25 22:22:50', '2022-07-25 22:22:50');

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
(1, 'Con sueldo', '2022-07-25 22:22:49', '2022-07-25 22:22:49'),
(2, 'Sin sueldo', '2022-07-25 22:22:49', '2022-07-25 22:22:49');

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

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`id`, `id_dependencia`, `id_conductor`, `id_placa`, `fecha`, `hora_salida`, `km_salida`, `lugar_salida`, `hora_destino`, `km_destino`, `lugar_destino`, `distancia_recorrida`, `combustible`, `tipo_combustible`, `pasajero`, `objetivo`, `correlativo`, `nivel_tanque`, `created_at`, `updated_at`) VALUES
(1, 2, 7, 1, '2022-07-12', '07:00:00', '150221', 1, '09:00:00', '150420', 1, '199', '00', 'Salud', 6, 'Transportesss', '2022-1-ADMON', '', '2022-07-03 05:22:24', '2022-07-12 20:45:00'),
(2, 2, 2, 1, '2022-07-13', '07:30:00', '153000', 1, '08:20:00', '153040', 2, '40', '0', 'Salud', 5, 'ND', '2022-2-ADMON', '', '2022-07-14 20:16:16', '2022-07-14 20:16:16');

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
(1, 1, 3, 1, 'admin@gmail.com', 'admin', NULL, '$2y$10$EawM1WBidBXRTgIAGtYYYuEISrJHlHJuIz5dol7MXvUJMkitVoUda', 'admin', 'admin', 'admin', 'DISAM', '2234-2345', 'no', NULL, '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(2, 2, 3, 1, 'user@gmail.com', 'usuario', NULL, '$2y$10$snK6BEBYb9kwyn8CrP0kdOqu2uitV9SY6QcgMRaFYoMUfS7GjtiMC', 'usuario', 'usuario', 'usuario', 'DISAM', '2234-2345', 'si', NULL, '2022-07-25 22:22:48', '2022-07-25 22:22:48'),
(3, 1, 2, 1, 'emenjivar@salud.gob.sv', 'emenjivar', NULL, '$2y$10$aGMb.YBRM8LtZl1DY9GzHeV8GQXrTWpRgaSLAIsQpdEDOJAG3adN2', 'Edy Menjivar', 'Menjivar', 'Secretaria', 'DISAM', '79522521', 'si', NULL, '2022-07-01 07:11:15', '2022-07-25 23:20:25'),
(4, 2, 6, 1, 'julio.alvarado@salud.gob.sv', 'jalvarado', NULL, '$2y$10$.XhxL/BmOKysvQYQor/A3elm4CnRUHTR9KqYn0s7lfrEZPTP6rFAK', 'Julio Cesar', 'Alvarado', 'tecnico', 'saneamiento', '25948544', 'si', NULL, '2022-07-01 07:50:31', '2022-07-25 23:21:07'),
(5, 2, 1, 1, 'edith.hernandezr@salud.gob.sv', 'ehernandez', NULL, '$2y$10$R1a/3oE.Ho4MAMNA/hQFzu1GgtN.Ml.Sh9xurzNAab9kNUCfaFcqC', 'Edith', 'Hernandez', 'técnico', 'Alimentos', '25948562', 'no', NULL, '2022-07-01 08:02:43', '2022-07-01 08:02:43'),
(6, 7, 1, 1, 'rina.avalos@salud.gob.sv', 'ravalos', NULL, '$2y$10$wiqXLBUGp.CjDZw5IlbU4unpa08xxnRE2X5/jDrFv9OZioCKWdUjq', 'Digna Rina', 'Avalos Ramos', 'inspectora', 'UDAT-DISAM', '22051655', 'no', 'KcXY3LD3reR13u32kUF1ipanr12JYAlkNdgLObbCWIQkKJ9gmXw5Q1TvkqkM', '2022-07-03 02:06:50', '2022-07-03 02:06:50'),
(7, 5, 1, 1, 'jairo.coreas@salud.gob.sv', 'Jairo', NULL, '$2y$10$/l0yx01gzRyOiYZt/sJ/mu7PaEj7cWyjipVZKq5zi8hTP1BgJjEsW', 'Jairo Geovani', 'Coreas Arevalo', 'Motorista', 'Administracion', '7693-3361', 'si', NULL, '2022-07-03 04:54:00', '2022-07-03 04:56:14'),
(8, 1, 1, 1, 'delmy.pineda@salud.gob.sv', 'sdelmypineda', NULL, '$2y$10$FP63OsEnIABHMdc4FjHzZOS/4WL6r5Zd2tPfi7zmagtcnVW1CRrhW', 'Rosa Delmy', 'Pineda de Peñate', 'Administradora', 'DISAM Administracion', '2205-1680', 'no', 'HNeLQ5xxF334td1QKM9H6XGaDij2C6trBeDMHoQr8eg0SjWaz0J2YpdjVLX2', '2022-07-03 05:12:17', '2022-07-03 05:12:17'),
(9, 7, 1, 1, 'ociel.garcia@salud.gob.sv', 'Oguevara', NULL, '$2y$10$0N.j5u7GbAe.7nDj1IjMyOEnqRB.P.2AUZ7Ond2QuBQ.tX8D5fIjK', 'Ociel Adonay', 'Guevara Garcia', 'Tecnico', 'DISAM', '2594-8572', 'no', NULL, '2022-07-06 02:08:52', '2022-07-06 02:08:52'),
(10, 7, 1, 1, 'dinora.diaz@salud.gob.sv', 'ddiaz', NULL, '$2y$10$4KXRLhL7avots9ETI.BQc.tdghmsCSruwwbKtwJHfc/F883goWDnG', 'Dinora', 'Diaz de Elias', 'secretaria', 'Alimentos', '25948556', 'no', NULL, '2022-07-06 03:46:40', '2022-07-06 04:36:35'),
(11, 7, 1, 1, 'vivian.saade@salud.gob.sv', 'vsaade', NULL, '$2y$10$TFZlqan36jaCySBcUSrIvOZpGThGbMoX7XGf5Bnb48bTIzb1gmCzS', 'Vivian Lizeth', 'Saade Saade', 'Tecnico', 'DISAM', '2594-8555', 'no', '8uvfv5EpDg1mNCdzefQeNqCtv8kucFsJBCBfFQXUs5KLXSTkGDm5PtdUeI2Q', '2022-07-06 05:38:17', '2022-07-06 05:38:17'),
(12, 1, 3, 1, 'carla.patino@salud.gob.sv', 'carlapatiño', NULL, '$2y$10$xzsl/bgIE.y9ZD3me0cCLe53PeZdc3zNYgzeCrgDIUJcqADPoD0WW', 'Carla Estefania', 'Patiño Rivera', 'Analista', 'DISAM', '7052-0659', 'no', NULL, '2022-07-13 13:36:17', '2022-07-26 00:05:45'),
(13, 7, 1, 1, 'fernando.naves@salud.gob.sv', 'FernandoNaves', NULL, '$2y$10$Rk0oboEHH8ixk0rvnhZhZ.FVXKo7m01OQCaVEaEu1.64usIvwo./e', 'Fernando Naves', 'Fernando Naves', 'RECNICO', 'DISAM', '222222222', 'si', NULL, '2022-07-13 19:35:32', '2022-07-13 19:35:32'),
(14, 1, 1, 1, 'adavid.gutierrez@salud.gob.sv', 'agutierrez', NULL, '$2y$10$3gr38v6U.29da8dL7.Pp4O9sIvJLswqfjiTp/I.wdfiQeE9r.t9Eu', 'Andres David', 'Guitierrez Zeledon', 'Tecnico', 'DISAM', '2205-1642', 'no', NULL, '2022-07-14 20:52:34', '2022-07-14 20:52:34'),
(15, 7, 1, 1, 'evelyn.castro@salud.gob.sv', 'ecastro', NULL, '$2y$10$4lYuZT2UW0xVN21tzsj/U.9lhbclJLCCbZy5kLmPa7cr9Q1uCFyuG', 'Evelyn Maria', 'Castro de Somoza', 'Tecnico', 'Unidad Ambiental', '2594-8549', 'no', 'aKeVRLokRSEVmLe8AM3ghQli5fXDTyucmkHGIxompHlaARvTh4OOCUNoDDUU', '2022-07-15 15:21:34', '2022-07-15 15:21:34'),
(16, 7, 1, 1, 'fredyalbertofunes@gmail.com', 'f.funes', NULL, '$2y$10$VP.GcM7YSKTL8z7iCH84z.vhsutlS8q8Fe132VeUtOH14pBjLQDeK', 'Fredy', 'Funes', 'Usuario', 'DISAM', '70163597', 'no', NULL, '2022-07-21 04:42:03', '2022-07-21 04:43:51'),
(17, 7, 3, 1, 'mauricio.rosales@salud.gob.sv', 'marosales', NULL, '$2y$10$lTF5LmMiktd2SHgrdgmSPuU4wO2OwTB.BGcBP5R1R1iIoXH0XfMo2', 'Mauricio Alexander', 'Rosales', 'Usuario', 'DISAM', '74689733', 'no', NULL, '2022-07-21 04:44:22', '2022-07-25 23:12:43'),
(18, 7, 1, 1, 'edymenjivar3@gmail.com', 'DISAM241171', NULL, '$2y$10$BGO9zKrwlwwSJjSbsfjBT.QOPjY2nbqASAffU0EC4gw2Mu4MSVrp2', 'Adilia Carmelina', 'Menjivar Contreras', 'Usuario', 'DISAM', '00000000', 'no', NULL, '2022-07-21 04:47:20', '2022-07-21 04:47:20'),
(20, 7, 1, 1, 'pablo.greyna@salud.gob.sv', 'pagarcia', NULL, '$2y$10$C/ugzS6m8xbDnNDele6XNu4n66x/aZMVLLwYmomlUSBDYDE6C6Uiu', 'Pablo Arturo', 'García Reyna', 'Usuario', 'DISAM', '22051619', 'no', NULL, '2022-07-21 04:48:56', '2022-07-21 04:48:56'),
(21, 7, 1, 1, 'jacqueline.villatoro@salud.gob.sv', 'JVillatoro', NULL, '$2y$10$5bNT0jdGi1oyxlZJyzaIvOz9YCceVZv7jC.gqrwQDREykRRBJ2g1m', 'María Jacqueline', 'Villatoro Rugamas', 'Usuario', 'DISAM', '25948561', 'no', NULL, '2022-07-21 04:50:20', '2022-07-21 04:50:20'),
(22, 7, 1, 1, 'rene.lainez@salud.gob.sv', 'rlainezg', NULL, '$2y$10$569t2y3d277rsjjZl6dJg.qCP8DhM.b8R82/xjr7yGs52O.XXp996', 'René Adelio', 'Laínez Guevara', 'Usuario', 'DISAM', '25948560', 'no', NULL, '2022-07-21 04:50:30', '2022-07-21 04:50:30'),
(23, 7, 1, 1, 'jaime.amaya@salud.gob.sv', 'jamaya', NULL, '$2y$10$crLd9H2YYW0joy/DRIsFLu5NWf.rZF6rNM7D3YlaJ.ZtoiHwfDEni', 'Jaime Ricardo', 'Amaya Nieves', 'Usuario', 'DISAM', '78108828', 'no', NULL, '2022-07-21 04:51:38', '2022-07-21 04:51:38'),
(24, 7, 1, 1, 'lilian.cruzr@salud.gob.sv', 'Lcruz', NULL, '$2y$10$9HbQeCojaOpMU0VFZOb7Qu1k9veDJOKUJWOWLjVwt20eoQyVMBdoS', 'Lilian Angelica', 'Cruz de Menjivar', 'Usuario', 'DISAM', '25948586', 'no', NULL, '2022-07-21 04:51:44', '2022-07-26 03:19:58'),
(25, 7, 1, 1, 'anadelcarmenh@gmail.com', 'ana.hramos', NULL, '$2y$10$2Fa8TO/GcA5eWa83Hqce/uccElW5qU7Ml8ci8Hn2PunH94aYtiDvq', 'Ana del Carmen', 'Hernández Ramos', 'Usuario', 'DISAM', '25948563', 'no', NULL, '2022-07-21 04:53:03', '2022-07-21 04:53:03'),
(26, 1, 1, 1, 'raul.marroquin@salud.gob.sv', 'raul.marroquin', NULL, '$2y$10$4THt/G/0gOfrR1Q4SiJsWelSNPYSprC/4J9j7iSyZXB0oi1HCJb0S', 'Raúl Napoleón', 'Marroquín Contreras', 'Usuario', 'DISAM', '78222397', 'no', NULL, '2022-07-21 04:53:35', '2022-07-22 03:41:30'),
(27, 7, 1, 1, 'mari.barahona@salud.gob.sv', 'mariajo', NULL, '$2y$10$SMgB7cYnxVgr6RD.BN8Tluy3XkkwtzEBakMNTM3.d0Z7TilqQ4iOW', 'Maribel', 'Baires', 'Usuario', 'DISAM', '22051679', 'no', NULL, '2022-07-21 04:54:13', '2022-07-21 04:55:26'),
(28, 7, 1, 1, 'rafael.privera@salud.gob.sv', 'reportillo', NULL, '$2y$10$ksYZQ6kLS.d1wX/.64Nrde4UMgkZqveDfQBgRxWD4cGP/p8yN5tfa', 'Rafael Ernesto', 'Portillo Rivera', 'Usuario', 'DISAM', '22051675', 'no', NULL, '2022-07-21 04:55:01', '2022-07-21 04:55:36'),
(29, 7, 1, 1, 'catalina.ochoa@salud.gob.sv', 'cochoa', NULL, '$2y$10$tz0bSNdlda6FvJ..aPxJjON.BIfMHvQpm.KVdCakmDGYfUzO8Eo3i', 'Catalina Rebeca', 'Ochoa de Saravia', 'Usuario', 'DISAM', '2594-8545', 'no', NULL, '2022-07-21 04:55:54', '2022-07-21 04:55:54'),
(30, 7, 1, 1, 'carlos.angel@salud.gob.sv', 'titote', NULL, '$2y$10$gWpnHdrUONqO3pMjylmBkOPRMA7oCxXC0RVNAdzOLeSqZ5sAN3BCe', 'Carlos Alberto', 'Angel Campos', 'Usuario', 'DISAM', '74500589', 'no', NULL, '2022-07-21 05:00:32', '2022-07-21 05:00:32'),
(31, 7, 1, 1, 'angela.andrade@salud.gob.sv', 'Admon', NULL, '$2y$10$1HQYySjUjxoEJMWuuoSOeuJfIP2i8vXGsGJ4teQ/nbs1C9EVuGaca', 'Angela Fredivinda', 'Andrade de Garcia', 'Usuario', 'DISAM', '2205-1612', 'no', NULL, '2022-07-21 05:02:14', '2022-07-21 05:02:14'),
(32, 7, 1, 1, 'marta.larios@saalud.gob.sv', 'Genesis', NULL, '$2y$10$l.z8Gdt1vT20eWP26TduBu7yu7Woy4mTDkh3tcO9/RbeKKocCD1oa', 'Marta Alicia', 'Larios Ramírez', 'Usuario', 'DISAM', '2594-8567', 'no', NULL, '2022-07-21 05:03:15', '2022-07-21 05:03:15'),
(33, 7, 1, 1, 'vicente.moreno@salud.gob.sv', 'Vicentemoreno', NULL, '$2y$10$BkeIdNj.qofSOChqPdwRwOPeldJwr9blq3J.jClNbvsGxwpYxPln.', 'Vicente', 'Moreno Mira', 'Usuario', 'DISAM', '2205-1680', 'no', NULL, '2022-07-21 05:04:53', '2022-07-21 05:04:53'),
(34, 7, 1, 1, 'juan.machadov@salud.gob.sv', 'jmachado', NULL, '$2y$10$rfvgjrIEdn9g1hS4Jge8G.yg.KUvoBCbDeL.SB8OxmY895VdBPnY.', 'Juan Antonio', 'Machado Villatoro', 'Usuario', 'DISAM', '2205-1618', 'no', NULL, '2022-07-21 05:05:17', '2022-07-21 05:06:36'),
(35, 7, 1, 1, 'sonia.bonilla@salud.gob.sv', 'sobonilla', NULL, '$2y$10$hMvKyr5rnCYFUUBD0Uhcs.kdUu3U21qtzIsXOQeyoblole0sexaO6', 'Sonia Esperanza', 'Bonilla de Polanco', 'Usuario', 'DISAM', '25948570', 'no', NULL, '2022-07-21 05:06:14', '2022-07-21 05:06:14'),
(36, 7, 1, 1, 'fernandosiliezar@fosalud.gob.sv', 'fernandosiliezar', NULL, '$2y$10$cki/u4ORduckVMUvLpZTMOsFuE13jy2JKr9XD.hsxRG6SoU0s.1Ra', 'Fernando Andres', 'Siliezar Posada', 'Usuario', 'DISAM', '76719087', 'no', NULL, '2022-07-21 05:06:26', '2022-07-21 05:06:26'),
(37, 7, 1, 1, 'ada.duran@salud.gob.sv', 'aduran', NULL, '$2y$10$iWGzLNwYIGptRgXx8uJS0edjRjAYZVc/Wh/wcGaiwJpuAMlQKIWyC', 'Ada del Carmen', 'Durán de Umaña', 'Usuario', 'DISAM', '2594-8548', 'no', NULL, '2022-07-21 05:07:49', '2022-07-21 05:07:59'),
(38, 7, 1, 1, 'flor.cuellar@salud.gob.sv', 'flor.cuellar', NULL, '$2y$10$/G/lE45wiWAZi.clsxnpL.C50EHFL8LjEDtJ/25afer9bU9Dz6lry', 'Flor Idalma', 'Cuellar Mayen', 'Usuario', 'DISAM', '76676205', 'no', NULL, '2022-07-21 05:08:36', '2022-07-21 05:08:36'),
(39, 7, 1, 1, 'sarinelsi.quinteros@salud.gob.sv', 'sarinelsi.quinteros', NULL, '$2y$10$RjHP5.UAJpcBscJSeh4cO.hk6MMViVLq0.K2uNyDenlAHQi4ov1Ou', 'Sarinelsi Gabriela', 'Quinteros Berrios', 'Usuario', 'DISAM', '7210-1077', 'no', NULL, '2022-07-21 05:08:50', '2022-07-25 23:23:40'),
(40, 7, 1, 1, 'juan.vbarahona@salud.gob.sv', 'juanbarahona', NULL, '$2y$10$.y/ZYtcR1SOuC9GJPLffteKCmh9qE.wDLzAW8jhRNxvHEXxjfOyRy', 'Juan Antonio', 'Velásquez Barahona', 'Usuario', 'DISAM', '2205-1680', 'no', NULL, '2022-07-21 05:10:56', '2022-07-21 05:10:56'),
(41, 7, 1, 1, 'carlos.arriaga@salud.gob.sv', 'carlosarriaga', NULL, '$2y$10$U54Js6df.RTpc2CoUsXIy.9oZ3FxPiKzJmkzOCjycTzYKlq98gX3a', 'Carlos Mauricio', 'Arriaga Arriaga', 'Usuario', 'DISAM', '2205-1680', 'no', NULL, '2022-07-21 05:11:54', '2022-07-21 05:11:54'),
(42, 7, 1, 1, 'ledgardo.perez@salud.gob.sv', 'luisedgardo', NULL, '$2y$10$6/WeRPD632sA7gM0v0Qp8eoLOYM/tpqhjPEgjpaKDUyJSKcGcXP9a', 'Luis Edgardo', 'Perez', 'Usuario', 'DISAM', '2205-1680', 'no', NULL, '2022-07-21 05:13:01', '2022-07-21 05:13:01'),
(43, 7, 1, 1, 'alila.argueta@salud.gob.sv', 'Ana Lila', NULL, '$2y$10$xuR6rpdek2UoOmyy0X1AWuXIDZpMgt6Ff3jPao2u3EEBYf8viyGm2', 'Ana Lila', 'Argueta de Urbina', 'Usuario', 'DISAM', '22745137', 'no', NULL, '2022-07-21 05:14:20', '2022-07-21 05:14:20'),
(44, 7, 1, 1, 'liliana.cordova@salud.gob.sv', 'Liliana', NULL, '$2y$10$E0nm32ypepTMAK43qOkutu8rHikElo/teBQCWfdUQPHTtf5eovJvi', 'Liliana Marlene', 'Córdova de Rivera', 'Usuario', 'DISAM', '60294788', 'no', NULL, '2022-07-21 05:18:56', '2022-07-21 05:18:56'),
(45, 7, 1, 1, 'jefrain.guzman@salud.gob.sv', 'jguzman', NULL, '$2y$10$eh30A1.i.mWW2ZA54FTuyukfsOwbgYPG5av6Dr8y2SkheAHAezHju', 'Jose Efrain', 'Guzman Valle', 'Usuario', 'DISAM', '2594-8555', 'no', NULL, '2022-07-21 05:18:57', '2022-07-21 05:18:57'),
(46, 7, 1, 1, 'israel.chevez@salud.gob.sv', 'israel.chevez', NULL, '$2y$10$swzkgpeY/W0KoBG7OQLpxer3yLIRuTHLAAzIKkii4lA.xWYouLKLi', 'Israel Antonio', 'Ramirez Chevez', 'Usuario', 'DISAM', '25498566', 'no', NULL, '2022-07-21 05:20:37', '2022-07-21 05:20:37');

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
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `placa`, `marca`, `modelo`, `color`, `year`, `kilometraje`, `tipo_combustible`, `created_at`, `updated_at`) VALUES
(1, '9024', '', '', '', '', '153040', 'Gasolina', '2022-07-03 05:02:28', '2022-07-03 05:02:28');

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
-- Indices de la tabla `estados_actividades`
--
ALTER TABLE `estados_actividades`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
-- AUTO_INCREMENT de la tabla `estados_actividades`
--
ALTER TABLE `estados_actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=314;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registros_salidas`
--
ALTER TABLE `registros_salidas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `solicitudes_transportes`
--
ALTER TABLE `solicitudes_transportes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
