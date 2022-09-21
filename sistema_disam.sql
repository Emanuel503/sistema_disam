-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2022 a las 17:33:13
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
-- Estructura de tabla para la tabla `actividades_paos`
--

CREATE TABLE `actividades_paos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_seguimiento` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `actividad` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `indicador` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_equipos`
--

CREATE TABLE `asignacion_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_equipo` bigint(20) UNSIGNED NOT NULL,
  `fecha_asignacion` date NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_movimiento_equipos`
--

CREATE TABLE `asignacion_movimiento_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_movimiento` bigint(20) UNSIGNED NOT NULL,
  `id_equipo` bigint(20) UNSIGNED NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Autorizado', '2022-09-21 21:32:32', '2022-09-21 21:32:32'),
(2, 'No Autorizado', '2022-09-21 21:32:32', '2022-09-21 21:32:32'),
(3, 'Pendiente', '2022-09-21 21:32:32', '2022-09-21 21:32:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayuda_manuales`
--

CREATE TABLE `ayuda_manuales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manual` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ayuda_videos`
--

CREATE TABLE `ayuda_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_establecimientos`
--

CREATE TABLE `control_establecimientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tipo` bigint(20) UNSIGNED NOT NULL,
  `id_usuario_adiciono` bigint(20) UNSIGNED NOT NULL,
  `id_departamento` bigint(20) UNSIGNED NOT NULL,
  `id_municipio` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_servicio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permiso_funcionamiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_emision_permiso` date DEFAULT NULL,
  `fecha_vencimiento_permiso` date DEFAULT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sibasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `establecimiento_salud` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `viviendas_abastecidas_rural` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poblacion_beneficiada_rural` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `viviendas_abastecidas_urbana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `poblacion_beneficiada_urbana` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_seguridad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piscina_agua_superficial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `piscina_con_circulacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actividad_realizada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa_recolectora` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan_recolectura` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `empresa_plan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_rastro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permiso_minsal` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sustancia_quimica` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_riesgo_quimico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tipo_esta_alimento` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `correspondencias`
--

CREATE TABLE `correspondencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED DEFAULT NULL,
  `id_usuario_dos` bigint(20) UNSIGNED DEFAULT NULL,
  `id_usuario_tres` bigint(20) UNSIGNED DEFAULT NULL,
  `id_usuario_cuatro` bigint(20) UNSIGNED DEFAULT NULL,
  `id_usuario_adiciono` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `procedencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extracto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urgencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resuelto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion1` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion2` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion3` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion4` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion5` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion6` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion7` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion8` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion9` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion10` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion11` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion12` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion13` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion14` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `opcion15` char(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correspondencias_seguimientos`
--

CREATE TABLE `correspondencias_seguimientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_correspondencia` bigint(20) UNSIGNED NOT NULL,
  `id_usuario_adiciono` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED DEFAULT NULL,
  `seguimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Ahuachapán', '2022-09-21 21:32:13', '2022-09-21 21:32:13'),
(2, 'Cabañas', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(3, 'Chalatenango', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(4, 'Cuscatlán', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(5, 'La Libertad', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(6, 'La Paz', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(7, 'La Unión', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(8, 'Morazán', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(9, 'San Miguel', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(10, 'San Salvador', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(11, 'San Vicente', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(12, 'Santa Ana', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(13, 'Sonsonate', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(14, 'Usulután', '2022-09-21 21:32:14', '2022-09-21 21:32:14');

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
(1, 'Unidad de Alimentos', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(2, 'Area Administracion', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(3, 'Area Informatica', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(4, 'Unidad Juridica', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(5, 'Unidad de Vigilancia de Enfermedades Transmitiras', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(6, 'Unidad de Saneamiento Ambiental', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(7, 'Fabrica de artefactos Sanitarios', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(8, 'Unidad de Alcohol y Tabaco', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(9, 'Unidad de Zoonosis', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(10, 'Laboratorio de productos biologicos', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(11, 'Unidad Ambiental', '2022-09-21 21:32:31', '2022-09-21 21:32:31'),
(12, 'Direccion', '2022-09-21 21:32:32', '2022-09-21 21:32:32'),
(13, 'División Regional', '2022-09-21 21:32:32', '2022-09-21 21:32:32');

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
(1, 'Realizada', '2022-09-21 21:32:32', '2022-09-21 21:32:32'),
(2, 'Suspendida', '2022-09-21 21:32:32', '2022-09-21 21:32:32'),
(3, 'Pospuesta', '2022-09-21 21:32:32', '2022-09-21 21:32:32'),
(4, 'Inasistencia', '2022-09-21 21:32:32', '2022-09-21 21:32:32'),
(5, 'Pendiente', '2022-09-21 21:32:32', '2022-09-21 21:32:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_correspondencia_seguimientos`
--

CREATE TABLE `estados_correspondencia_seguimientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_correspondencia_seguimientos`
--

INSERT INTO `estados_correspondencia_seguimientos` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Recibido', '2022-09-21 21:32:35', '2022-09-21 21:32:35'),
(2, 'Resuelto', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(3, 'No resuelto', '2022-09-21 21:32:36', '2022-09-21 21:32:36');

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
(1, 'Bueno', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(2, 'Malo', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(3, 'Regular', '2022-09-21 21:32:35', '2022-09-21 21:32:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_paos`
--

CREATE TABLE `estados_paos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_paos`
--

INSERT INTO `estados_paos` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2022-09-21 21:32:35', '2022-09-21 21:32:35'),
(2, 'Inactivo', '2022-09-21 21:32:35', '2022-09-21 21:32:35');

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
(1, 'Aprobada', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(2, 'Rechazada', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(3, 'Pendiente', '2022-09-21 21:32:34', '2022-09-21 21:32:34');

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
(1, 'Pendiente', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(2, 'Realizada', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(3, 'Cancelada', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(4, 'Pospuesta', '2022-09-21 21:32:33', '2022-09-21 21:32:33');

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
(1, 'Activo', '2022-09-21 21:32:30', '2022-09-21 21:32:30'),
(2, 'Inactivo', '2022-09-21 21:32:30', '2022-09-21 21:32:30');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funciones_paos`
--

CREATE TABLE `funciones_paos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pao` bigint(20) UNSIGNED NOT NULL,
  `funcion` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 10, 179, '1', 'DISAM', '2022-09-21 21:32:30', '2022-09-21 21:32:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memos_externos`
--

CREATE TABLE `memos_externos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tecnico` bigint(20) UNSIGNED NOT NULL,
  `id_usuario_adiciono` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `numero_memo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_memo` date NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asunto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memos_internos`
--

CREATE TABLE `memos_internos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tecnico` bigint(20) UNSIGNED NOT NULL,
  `id_usuario_adiciono` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `numero_memo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_memo` date NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asunto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(25, '2022_07_19_175904_permisos', 1),
(26, '2022_08_09_141718_descripcion_equipos', 1),
(27, '2022_08_09_142024_ubicacion_equipos', 1),
(28, '2022_08_09_142138_estados_equipos', 1),
(29, '2022_08_09_142224_fuente_equipos', 1),
(30, '2022_08_09_155811_equipos', 1),
(31, '2022_08_23_163300_asignacion_equipos', 1),
(32, '2022_08_24_121223_motivos_movimientos_equipos', 1),
(33, '2022_08_24_135724_movimiento_equipos', 1),
(34, '2022_08_24_142336_asignacion_movimiento_equipos', 1),
(35, '2022_08_29_150255_estados_paos', 1),
(36, '2022_08_29_150343_paos', 1),
(37, '2022_08_29_150953_objetivos_paos', 1),
(38, '2022_08_29_151137_seguimientos_paos', 1),
(39, '2022_08_29_151550_actividades_paos', 1),
(40, '2022_08_29_152049_trimestres_paos', 1),
(41, '2022_08_29_152508_tareas_paos', 1),
(42, '2022_08_29_171943_funciones_paos', 1),
(43, '2022_09_06_170530_oficios', 1),
(44, '2022_09_06_170546_memos_internos', 1),
(45, '2022_09_06_170552_memos_externos', 1),
(46, '2022_09_07_155125_correspondencias', 1),
(47, '2022_09_11_210332_estados_correspondencia_seguimientos', 1),
(48, '2022_09_12_151249_correspondencias_seguimientos', 1),
(49, '2022_09_18_165838_tipos_establecimientos_alimentos', 1),
(50, '2022_09_19_153611_tipos_establecimientos', 1),
(51, '2022_09_19_155412_control_establecimientos', 1),
(52, '2022_09_20_203302_ayuda_manuales', 1),
(53, '2022_09_20_203310_ayuda_videos', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivos_movimientos_equipos`
--

CREATE TABLE `motivos_movimientos_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `motivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `motivos_movimientos_equipos`
--

INSERT INTO `motivos_movimientos_equipos` (`id`, `motivo`, `created_at`, `updated_at`) VALUES
(1, 'Capacitacion', '2022-09-21 21:32:35', '2022-09-21 21:32:35'),
(2, 'Prestamo', '2022-09-21 21:32:35', '2022-09-21 21:32:35'),
(3, 'Reparación', '2022-09-21 21:32:35', '2022-09-21 21:32:35'),
(4, 'Reunion de trabajo', '2022-09-21 21:32:35', '2022-09-21 21:32:35'),
(5, 'Talleres', '2022-09-21 21:32:35', '2022-09-21 21:32:35'),
(6, 'Traslados', '2022-09-21 21:32:35', '2022-09-21 21:32:35');

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
(1, 'Personal', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(2, 'Enfermedad', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(3, 'Enfermedad gravísima de pariente', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(4, 'Duelo', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(5, 'Compensatorio', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(6, 'Oficial', '2022-09-21 21:32:34', '2022-09-21 21:32:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento_equipos`
--

CREATE TABLE `movimiento_equipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_motivo` bigint(20) UNSIGNED NOT NULL,
  `fecha_orden` date NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `hora_salida` time NOT NULL,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'Ahuachapán', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(2, 1, 'Apaneca', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(3, 1, 'Atiquizaya', '2022-09-21 21:32:14', '2022-09-21 21:32:14'),
(4, 1, 'Concepción de Ataco', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(5, 1, 'El Refugio', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(6, 1, 'Guaymango', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(7, 1, 'Jujutla', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(8, 1, 'San Francisco Menéndez', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(9, 1, 'San Lorenzo', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(10, 1, 'San Pedro Puxtla', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(11, 1, 'Tacuba', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(12, 1, 'Turín', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(13, 2, 'Sensuntepeque', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(14, 2, 'Cinquera', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(15, 2, 'Dolores', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(16, 2, 'Guacotecti', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(17, 2, 'Ilobasco', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(18, 2, 'Jutiapa', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(19, 2, 'San Isidro', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(20, 2, 'Tejutepeque', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(21, 2, 'Victoria', '2022-09-21 21:32:15', '2022-09-21 21:32:15'),
(22, 3, 'Chalatenango', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(23, 3, 'Agua Caliente', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(24, 3, 'Arcatao', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(25, 3, 'Azacualpa', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(26, 3, 'Cancasque', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(27, 3, 'Citalá', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(28, 3, 'Comalapa', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(29, 3, 'Concepción Quezaltepeque', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(30, 3, 'Dulce Nombre de María', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(31, 3, 'El Carrizal', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(32, 3, 'El Paraíso', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(33, 3, 'La Laguna', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(34, 3, 'La Palma', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(35, 3, 'La Reina', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(36, 3, 'Las Flores', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(37, 3, 'Las Vueltas', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(38, 3, 'Nombre de Jesús', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(39, 3, 'Nueva Concepción', '2022-09-21 21:32:16', '2022-09-21 21:32:16'),
(40, 3, 'Nueva Trinidad', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(41, 3, 'Ojos de Agua', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(42, 3, 'Potonico', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(43, 3, 'San Antonio de la Cruz', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(44, 3, 'San Antonio Los Ranchos', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(45, 3, 'San Fernando', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(46, 3, 'San Francisco Lempa', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(47, 3, 'San Francisco Morazán', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(48, 3, 'San Ignacio', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(49, 3, 'San Isidro Labrador', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(50, 3, 'San Luis del Carmen', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(51, 3, 'San Miguel de Mercedes', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(52, 3, 'San Rafael', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(53, 3, 'Santa Rita', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(54, 3, 'Tejutla', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(55, 4, 'Cojutepeque ', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(56, 4, 'Candelaria', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(57, 4, 'El Carmen', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(58, 4, 'El Rosario', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(59, 4, 'Monte San Juan', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(60, 4, 'Oratorio de Concepción', '2022-09-21 21:32:17', '2022-09-21 21:32:17'),
(61, 4, 'San Bartolomé Perulapía', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(62, 4, 'San Cristóbal', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(63, 4, 'San José Guayabal', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(64, 4, 'San Pedro Perulapán', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(65, 4, 'San Rafael Cedros', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(66, 4, 'San Ramón', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(67, 4, 'Santa Cruz Analquito', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(68, 4, 'Santa Cruz Michapa', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(69, 4, 'Suchitoto', '2022-09-21 21:32:18', '2022-09-21 21:32:18'),
(70, 4, 'Tenancingo', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(71, 5, 'Santa Tecla ', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(72, 5, 'Antiguo Cuscatlán', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(73, 5, 'Chiltiupán ', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(74, 5, 'Ciudad Arce ', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(75, 5, 'Colón ', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(76, 5, 'Comasagua ', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(77, 5, 'Huizúcar ', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(78, 5, 'Jayaque ', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(79, 5, 'Jicalapa ', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(80, 5, 'La Libertad', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(81, 5, 'Nuevo Cuscatlán', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(82, 5, 'Quezaltepeque', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(83, 5, 'San Juan Opico', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(84, 5, 'Sacacoyo', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(85, 5, 'San José Villanueva', '2022-09-21 21:32:19', '2022-09-21 21:32:19'),
(86, 5, 'San Matías', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(87, 5, 'San Pablo Tacachico ', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(88, 5, 'Talnique ', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(89, 5, 'Tamanique ', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(90, 5, 'Teotepeque ', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(91, 5, 'Tepecoyo ', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(92, 5, 'Zaragoza ', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(93, 6, 'Zacatecoluca', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(94, 6, 'Cuyultitán', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(95, 6, 'El Rosario', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(96, 6, 'Jerusalén', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(97, 6, 'Mercedes La Ceiba', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(98, 6, 'Olocuilta', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(99, 6, 'Paraíso de Osorio', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(100, 6, 'Paraíso de Osorio', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(101, 6, 'San Emigdio', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(102, 6, 'San Francisco Chinameca', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(103, 6, 'San Pedro Masahuat', '2022-09-21 21:32:20', '2022-09-21 21:32:20'),
(104, 6, 'San Juan Nonualco', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(105, 6, 'San Juan Talpa', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(106, 6, 'San Juan Tepezontes', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(107, 6, 'San Luis La Herradura', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(108, 6, 'San Luis Talpa', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(109, 6, 'San Miguel Tepezontes', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(110, 6, 'San Pedro Nonualco', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(111, 6, 'San Rafael Obrajuelo', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(112, 6, 'Santa María Ostuma', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(113, 6, 'Santiago Nonualco', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(114, 6, 'Tapalhuaca', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(115, 7, 'La Unión', '2022-09-21 21:32:21', '2022-09-21 21:32:21'),
(116, 7, 'Anamorós', '2022-09-21 21:32:22', '2022-09-21 21:32:22'),
(117, 7, 'Bolívar', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(118, 7, 'Concepción de Oriente', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(119, 7, 'Conchagua', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(120, 7, 'El Carmen', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(121, 7, 'El Sauce', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(122, 7, 'Intipucá', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(123, 7, 'Lislique', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(124, 7, 'Meanguera del Golfo', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(125, 7, 'Nueva Esparta', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(126, 7, 'Pasaquina', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(127, 7, 'Polorós', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(128, 7, 'San Alejo', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(129, 7, 'San José', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(130, 7, 'Santa Rosa de Lima ', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(131, 7, 'Yayantique', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(132, 7, 'Yucuaiquín', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(133, 8, 'San Francisco Gotera', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(134, 8, 'Arambala', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(135, 8, 'Cacaopera', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(136, 8, 'Chilanga', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(137, 8, 'Corinto', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(138, 8, 'Delicias de Concepción', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(139, 8, 'El Divisadero', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(140, 8, 'El Rosario', '2022-09-21 21:32:24', '2022-09-21 21:32:24'),
(141, 8, 'Gualococti', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(142, 8, 'Guatajiagua', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(143, 8, 'Joateca', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(144, 8, 'Jocoaitique', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(145, 8, 'Jocoro', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(146, 8, 'Lolotiquillo', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(147, 8, 'Meanguera', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(148, 8, 'Osicala', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(149, 8, 'Perquín', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(150, 8, 'San Carlos', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(151, 8, 'San Fernando', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(152, 8, 'San Isidro', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(153, 8, 'San Simón', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(154, 8, 'Sensembra', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(155, 8, 'Sociedad', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(156, 8, 'Torola', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(157, 8, 'Yamabal', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(158, 8, 'Yoloaiquín', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(159, 9, 'San Miguel', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(160, 9, 'Carolina', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(161, 9, 'Chapeltique', '2022-09-21 21:32:25', '2022-09-21 21:32:25'),
(162, 9, 'Chinameca', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(163, 9, 'Chirilagua', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(164, 9, 'Ciudad Barrios', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(165, 9, 'Comacarán', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(166, 9, 'El Tránsito', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(167, 9, 'Lolotique', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(168, 9, 'Moncagua', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(169, 9, 'Nueva Guadalupe', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(170, 9, 'Nuevo Edén de San Juan', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(171, 9, 'Quelepa', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(172, 9, 'San Antonio', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(173, 9, 'San Gerardo', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(174, 9, 'San Jorge', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(175, 9, 'San Luis de la Reina', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(176, 9, 'San Rafael Oriente', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(177, 9, 'Sesori', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(178, 9, 'Uluazapa', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(179, 10, 'San Salvador', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(180, 10, 'Aguilares', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(181, 10, 'Apopa', '2022-09-21 21:32:26', '2022-09-21 21:32:26'),
(182, 10, 'Ayutuxtepeque', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(183, 10, 'Ciudad Delgado', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(184, 10, 'Cuscatancingo', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(185, 10, 'El Paisnal', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(186, 10, 'Guazapa', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(187, 10, 'Ilopango', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(188, 10, 'Mejicanos', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(189, 10, 'Nejapa', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(190, 10, 'Panchimalco', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(191, 10, 'Rosario de Mora', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(192, 10, 'San Marcos', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(193, 10, 'San Martín', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(194, 10, 'Santiago Texacuangos', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(195, 10, 'Santo Tomás', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(196, 10, 'Soyapango', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(197, 10, 'Tonacatepeque', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(198, 11, 'San Vicente', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(199, 11, 'Apastepeque', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(200, 11, 'Guadalupe', '2022-09-21 21:32:27', '2022-09-21 21:32:27'),
(201, 11, 'San Cayetano Istepeque', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(202, 11, 'San Esteban Catarina', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(203, 11, 'San Ildefonso', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(204, 11, 'San Lorenzo', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(205, 11, 'San Sebastián', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(206, 11, 'Santa Clara', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(207, 11, 'Santo Domingo', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(208, 11, 'Tecoluca', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(209, 11, 'Tepetitán', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(210, 11, 'Verapaz', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(211, 12, 'Santa Ana ', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(212, 12, 'Candelaria de la Frontera', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(213, 12, 'Chalchuapa', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(214, 12, 'Coatepeque', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(215, 12, 'El Congo', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(216, 12, 'El Porvenir', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(217, 12, 'Masahuat', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(218, 12, 'Metapán', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(219, 12, 'San Antonio Pajonal', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(220, 12, 'San Sebastián Salitrillo', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(221, 12, 'Santa Rosa Guachipilín', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(222, 12, 'Santiago de la Frontera', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(223, 12, 'Texistepeque', '2022-09-21 21:32:28', '2022-09-21 21:32:28'),
(224, 13, 'Sonsonate', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(225, 13, 'Acajutla', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(226, 13, 'Armenia', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(227, 13, 'Caluco', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(228, 13, 'Cuisnahuat', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(229, 13, 'Izalco', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(230, 13, 'Juayúa', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(231, 13, 'Nahuizalco', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(232, 13, 'Nahulingo', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(233, 13, 'Salcoatitán', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(234, 13, 'San Antonio del Monte', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(235, 13, 'San Julián', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(236, 13, 'Santa Catarina Masahuat', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(237, 13, 'Santa Isabel Ishuatán', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(238, 13, 'Santo Domingo de Guzmán', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(239, 13, 'Sonzacate', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(240, 14, 'Usulután ', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(241, 14, 'Alegría', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(242, 14, 'Berlín', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(243, 14, 'California', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(244, 14, 'Concepción Batres', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(245, 14, 'El Triunfo', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(246, 14, 'Ereguayquín', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(247, 14, 'Estanzuelas', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(248, 14, 'Jiquilisco', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(249, 14, 'Jucuapa', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(250, 14, 'Jucuarán', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(251, 14, 'Mercedes Umaña', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(252, 14, 'Nueva Granada', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(253, 14, 'Ozatlán', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(254, 14, 'Puerto El Triunfo', '2022-09-21 21:32:29', '2022-09-21 21:32:29'),
(255, 14, 'San Agustín', '2022-09-21 21:32:30', '2022-09-21 21:32:30'),
(256, 14, 'San Buenaventura', '2022-09-21 21:32:30', '2022-09-21 21:32:30'),
(257, 14, 'San Dionisio', '2022-09-21 21:32:30', '2022-09-21 21:32:30'),
(258, 14, 'San Francisco Javier', '2022-09-21 21:32:30', '2022-09-21 21:32:30'),
(259, 14, 'Santa Elena', '2022-09-21 21:32:30', '2022-09-21 21:32:30'),
(260, 14, 'Santa María', '2022-09-21 21:32:30', '2022-09-21 21:32:30'),
(261, 14, 'Santiago de María', '2022-09-21 21:32:30', '2022-09-21 21:32:30'),
(262, 14, 'Tecapán', '2022-09-21 21:32:30', '2022-09-21 21:32:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `objetivos_paos`
--

CREATE TABLE `objetivos_paos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_pao` bigint(20) UNSIGNED NOT NULL,
  `objetivo` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficios`
--

CREATE TABLE `oficios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_tecnico` bigint(20) UNSIGNED NOT NULL,
  `id_usuario_adiciono` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `numero_oficio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_oficio` date NOT NULL,
  `destino` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asunto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paos`
--

CREATE TABLE `paos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `dependencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(1, 'Administrador', '2022-09-21 21:32:13', '2022-09-21 21:32:13'),
(2, 'Analista', '2022-09-21 21:32:13', '2022-09-21 21:32:13'),
(3, 'Digitador', '2022-09-21 21:32:13', '2022-09-21 21:32:13'),
(4, 'Participante', '2022-09-21 21:32:13', '2022-09-21 21:32:13'),
(5, 'Motorista', '2022-09-21 21:32:13', '2022-09-21 21:32:13'),
(6, 'Jefe de conservación', '2022-09-21 21:32:13', '2022-09-21 21:32:13'),
(7, 'Usuario', '2022-09-21 21:32:13', '2022-09-21 21:32:13');

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
(1, 'Sala DISAM', '2022-09-21 21:32:30', '2022-09-21 21:32:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimientos_paos`
--

CREATE TABLE `seguimientos_paos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_objetivo` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `resultado` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Estructura de tabla para la tabla `tareas_paos`
--

CREATE TABLE `tareas_paos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_trimestre` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `tarea` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tiempo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
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
(1, 'Director de DISAM', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(2, 'Coordinador de Alimentos y Bebidas', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(3, 'Coordinadora de Zoonosis', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(4, 'Administracion de DISAM', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(5, 'Coordinador Saneamiento', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(6, 'Coordinador de Unidad Ambiental', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(7, 'Coordinacion Informatica', '2022-09-21 21:32:34', '2022-09-21 21:32:34'),
(8, 'Coordinacion de Alcohol y Tabaco', '2022-09-21 21:32:34', '2022-09-21 21:32:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_establecimientos`
--

CREATE TABLE `tipos_establecimientos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `establecimiento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_establecimientos`
--

INSERT INTO `tipos_establecimientos` (`id`, `establecimiento`, `created_at`, `updated_at`) VALUES
(1, 'Sistema de agua', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(2, 'Piscina', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(3, 'Establecimiento DB', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(4, 'Rastro', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(5, 'Sustancias quimicas peligrosas', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(6, 'Alimentos', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(7, 'Embazadora de agua', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(8, 'Granja', '2022-09-21 21:32:36', '2022-09-21 21:32:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_establecimientos_alimentos`
--

CREATE TABLE `tipos_establecimientos_alimentos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_establecimientos_alimentos`
--

INSERT INTO `tipos_establecimientos_alimentos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Bodega Seca', '2022-09-21 21:32:36', '2022-09-21 21:32:36'),
(2, 'Restaurante', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(3, 'Auto Hotel', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(4, 'Cafeteria', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(5, 'Comida Rapida', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(6, 'Cafe Bar', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(7, 'Chalet', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(8, 'Comedor', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(9, 'Pupuseria', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(10, 'Heladeria', '2022-09-21 21:32:37', '2022-09-21 21:32:37'),
(11, 'Hotel', '2022-09-21 21:32:38', '2022-09-21 21:32:38'),
(12, 'Mini Super', '2022-09-21 21:32:38', '2022-09-21 21:32:38'),
(13, 'Panaderia', '2022-09-21 21:32:38', '2022-09-21 21:32:38'),
(14, 'Rancho', '2022-09-21 21:32:38', '2022-09-21 21:32:38'),
(15, 'Sala de ventas', '2022-09-21 21:32:38', '2022-09-21 21:32:38'),
(16, 'Tienda', '2022-09-21 21:32:38', '2022-09-21 21:32:38');

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
(1, 'Con sueldo', '2022-09-21 21:32:33', '2022-09-21 21:32:33'),
(2, 'Sin sueldo', '2022-09-21 21:32:33', '2022-09-21 21:32:33');

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
-- Estructura de tabla para la tabla `trimestres_paos`
--

CREATE TABLE `trimestres_paos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_actividad` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `trimestre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `programado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `realizado` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `id_dependencia` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `codigo_marcacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ubicacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `dias_enfermedad_informales` double NOT NULL,
  `dias_enfermedad_formales` double NOT NULL,
  `dias_personales` double NOT NULL,
  `motorista` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `id_rol`, `id_dependencia`, `id_estado`, `codigo_marcacion`, `email`, `usuario`, `email_verified_at`, `password`, `nombres`, `apellidos`, `cargo`, `ubicacion`, `telefono`, `fecha_ingreso`, `dias_enfermedad_informales`, `dias_enfermedad_formales`, `dias_personales`, `motorista`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$10$t4I1Z6uq34289DtcL8ppnurXtgxmT0H8ZivwxWEolU9sZxg0siPKe', 'Emanuel', 'Molina', 'admin', 'DISAM', '2234-2345', NULL, 0, 0, 0, 'no', NULL, '2022-09-21 21:32:32', '2022-09-21 21:32:32'),
(2, 2, 13, 1, 'user', 'user@gmail.com', 'usuario', NULL, '$2y$10$0UgpqKqbEVqCFtw28gefTOrHtDYDwF8rz9Sv43a3S1BMUkv8g6MZq', 'Rafael', 'Najarro', 'usuario', 'DISAM', '2234-2345', NULL, 0, 0, 0, 'si', NULL, '2022-09-21 21:32:32', '2022-09-21 21:32:32');

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
-- Indices de la tabla `actividades_paos`
--
ALTER TABLE `actividades_paos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `actividades_paos_id_seguimiento_foreign` (`id_seguimiento`),
  ADD KEY `actividades_paos_id_dependencia_foreign` (`id_dependencia`),
  ADD KEY `actividades_paos_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `asignacion_equipos`
--
ALTER TABLE `asignacion_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignacion_equipos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `asignacion_equipos_id_equipo_foreign` (`id_equipo`);

--
-- Indices de la tabla `asignacion_movimiento_equipos`
--
ALTER TABLE `asignacion_movimiento_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asignacion_movimiento_equipos_id_movimiento_foreign` (`id_movimiento`),
  ADD KEY `asignacion_movimiento_equipos_id_equipo_foreign` (`id_equipo`);

--
-- Indices de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ayuda_manuales`
--
ALTER TABLE `ayuda_manuales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ayuda_videos`
--
ALTER TABLE `ayuda_videos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `control_establecimientos`
--
ALTER TABLE `control_establecimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `control_establecimientos_id_tipo_foreign` (`id_tipo`),
  ADD KEY `control_establecimientos_id_usuario_adiciono_foreign` (`id_usuario_adiciono`),
  ADD KEY `control_establecimientos_id_departamento_foreign` (`id_departamento`),
  ADD KEY `control_establecimientos_id_municipio_foreign` (`id_municipio`),
  ADD KEY `control_establecimientos_id_tipo_esta_alimento_foreign` (`id_tipo_esta_alimento`);

--
-- Indices de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `coordinadores_id_tecnico_foreign` (`id_tecnico`),
  ADD KEY `coordinadores_id_coordinacion_foreign` (`id_coordinacion`);

--
-- Indices de la tabla `correspondencias`
--
ALTER TABLE `correspondencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `correspondencias_id_usuario_foreign` (`id_usuario`),
  ADD KEY `correspondencias_id_usuario_dos_foreign` (`id_usuario_dos`),
  ADD KEY `correspondencias_id_usuario_tres_foreign` (`id_usuario_tres`),
  ADD KEY `correspondencias_id_usuario_cuatro_foreign` (`id_usuario_cuatro`),
  ADD KEY `correspondencias_id_usuario_adiciono_foreign` (`id_usuario_adiciono`);

--
-- Indices de la tabla `correspondencias_seguimientos`
--
ALTER TABLE `correspondencias_seguimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `correspondencias_seguimientos_id_correspondencia_foreign` (`id_correspondencia`),
  ADD KEY `correspondencias_seguimientos_id_usuario_adiciono_foreign` (`id_usuario_adiciono`),
  ADD KEY `correspondencias_seguimientos_id_estado_foreign` (`id_estado`);

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
-- Indices de la tabla `estados_correspondencia_seguimientos`
--
ALTER TABLE `estados_correspondencia_seguimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_equipos`
--
ALTER TABLE `estados_equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_paos`
--
ALTER TABLE `estados_paos`
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
-- Indices de la tabla `funciones_paos`
--
ALTER TABLE `funciones_paos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funciones_paos_id_pao_foreign` (`id_pao`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lugares_id_departamento_foreign` (`id_departamento`),
  ADD KEY `lugares_id_municipio_foreign` (`id_municipio`);

--
-- Indices de la tabla `memos_externos`
--
ALTER TABLE `memos_externos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memos_externos_id_tecnico_foreign` (`id_tecnico`),
  ADD KEY `memos_externos_id_usuario_adiciono_foreign` (`id_usuario_adiciono`),
  ADD KEY `memos_externos_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `memos_internos`
--
ALTER TABLE `memos_internos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memos_internos_id_tecnico_foreign` (`id_tecnico`),
  ADD KEY `memos_internos_id_usuario_adiciono_foreign` (`id_usuario_adiciono`),
  ADD KEY `memos_internos_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motivos_movimientos_equipos`
--
ALTER TABLE `motivos_movimientos_equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `motivos_permisos`
--
ALTER TABLE `motivos_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movimiento_equipos`
--
ALTER TABLE `movimiento_equipos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movimiento_equipos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `movimiento_equipos_id_motivo_foreign` (`id_motivo`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_id_departamento_foreign` (`id_departamento`);

--
-- Indices de la tabla `objetivos_paos`
--
ALTER TABLE `objetivos_paos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `objetivos_paos_id_pao_foreign` (`id_pao`);

--
-- Indices de la tabla `oficios`
--
ALTER TABLE `oficios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oficios_id_tecnico_foreign` (`id_tecnico`),
  ADD KEY `oficios_id_usuario_adiciono_foreign` (`id_usuario_adiciono`),
  ADD KEY `oficios_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `paos`
--
ALTER TABLE `paos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paos_id_estado_foreign` (`id_estado`);

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
-- Indices de la tabla `seguimientos_paos`
--
ALTER TABLE `seguimientos_paos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguimientos_paos_id_objetivo_foreign` (`id_objetivo`),
  ADD KEY `seguimientos_paos_id_estado_foreign` (`id_estado`);

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
-- Indices de la tabla `tareas_paos`
--
ALTER TABLE `tareas_paos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tareas_paos_id_trimestre_foreign` (`id_trimestre`),
  ADD KEY `tareas_paos_id_usuario_foreign` (`id_usuario`),
  ADD KEY `tareas_paos_id_estado_foreign` (`id_estado`);

--
-- Indices de la tabla `tipos_coordinaciones`
--
ALTER TABLE `tipos_coordinaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_establecimientos`
--
ALTER TABLE `tipos_establecimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_establecimientos_alimentos`
--
ALTER TABLE `tipos_establecimientos_alimentos`
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
-- Indices de la tabla `trimestres_paos`
--
ALTER TABLE `trimestres_paos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trimestres_paos_id_actividad_foreign` (`id_actividad`),
  ADD KEY `trimestres_paos_id_estado_foreign` (`id_estado`);

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
  ADD UNIQUE KEY `users_codigo_marcacion_unique` (`codigo_marcacion`),
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
-- AUTO_INCREMENT de la tabla `actividades_paos`
--
ALTER TABLE `actividades_paos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignacion_equipos`
--
ALTER TABLE `asignacion_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asignacion_movimiento_equipos`
--
ALTER TABLE `asignacion_movimiento_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ayuda_manuales`
--
ALTER TABLE `ayuda_manuales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ayuda_videos`
--
ALTER TABLE `ayuda_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `control_establecimientos`
--
ALTER TABLE `control_establecimientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `correspondencias`
--
ALTER TABLE `correspondencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `correspondencias_seguimientos`
--
ALTER TABLE `correspondencias_seguimientos`
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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `descripcion_equipos`
--
ALTER TABLE `descripcion_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estados_actividades`
--
ALTER TABLE `estados_actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados_correspondencia_seguimientos`
--
ALTER TABLE `estados_correspondencia_seguimientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados_equipos`
--
ALTER TABLE `estados_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados_paos`
--
ALTER TABLE `estados_paos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funciones_paos`
--
ALTER TABLE `funciones_paos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `memos_externos`
--
ALTER TABLE `memos_externos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `memos_internos`
--
ALTER TABLE `memos_internos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `motivos_movimientos_equipos`
--
ALTER TABLE `motivos_movimientos_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `motivos_permisos`
--
ALTER TABLE `motivos_permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `movimiento_equipos`
--
ALTER TABLE `movimiento_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT de la tabla `objetivos_paos`
--
ALTER TABLE `objetivos_paos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `oficios`
--
ALTER TABLE `oficios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paos`
--
ALTER TABLE `paos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `seguimientos_paos`
--
ALTER TABLE `seguimientos_paos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `tareas_paos`
--
ALTER TABLE `tareas_paos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipos_coordinaciones`
--
ALTER TABLE `tipos_coordinaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipos_establecimientos`
--
ALTER TABLE `tipos_establecimientos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipos_establecimientos_alimentos`
--
ALTER TABLE `tipos_establecimientos_alimentos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT de la tabla `trimestres_paos`
--
ALTER TABLE `trimestres_paos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ubicacion_equipos`
--
ALTER TABLE `ubicacion_equipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- Filtros para la tabla `actividades_paos`
--
ALTER TABLE `actividades_paos`
  ADD CONSTRAINT `actividades_paos_id_dependencia_foreign` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencias` (`id`),
  ADD CONSTRAINT `actividades_paos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_paos` (`id`),
  ADD CONSTRAINT `actividades_paos_id_seguimiento_foreign` FOREIGN KEY (`id_seguimiento`) REFERENCES `seguimientos_paos` (`id`);

--
-- Filtros para la tabla `asignacion_equipos`
--
ALTER TABLE `asignacion_equipos`
  ADD CONSTRAINT `asignacion_equipos_id_equipo_foreign` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `asignacion_equipos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `asignacion_movimiento_equipos`
--
ALTER TABLE `asignacion_movimiento_equipos`
  ADD CONSTRAINT `asignacion_movimiento_equipos_id_equipo_foreign` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `asignacion_movimiento_equipos_id_movimiento_foreign` FOREIGN KEY (`id_movimiento`) REFERENCES `movimiento_equipos` (`id`);

--
-- Filtros para la tabla `control_establecimientos`
--
ALTER TABLE `control_establecimientos`
  ADD CONSTRAINT `control_establecimientos_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `control_establecimientos_id_municipio_foreign` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`),
  ADD CONSTRAINT `control_establecimientos_id_tipo_esta_alimento_foreign` FOREIGN KEY (`id_tipo_esta_alimento`) REFERENCES `tipos_establecimientos_alimentos` (`id`),
  ADD CONSTRAINT `control_establecimientos_id_tipo_foreign` FOREIGN KEY (`id_tipo`) REFERENCES `tipos_establecimientos` (`id`),
  ADD CONSTRAINT `control_establecimientos_id_usuario_adiciono_foreign` FOREIGN KEY (`id_usuario_adiciono`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  ADD CONSTRAINT `coordinadores_id_coordinacion_foreign` FOREIGN KEY (`id_coordinacion`) REFERENCES `tipos_coordinaciones` (`id`),
  ADD CONSTRAINT `coordinadores_id_tecnico_foreign` FOREIGN KEY (`id_tecnico`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `correspondencias`
--
ALTER TABLE `correspondencias`
  ADD CONSTRAINT `correspondencias_id_usuario_adiciono_foreign` FOREIGN KEY (`id_usuario_adiciono`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `correspondencias_id_usuario_cuatro_foreign` FOREIGN KEY (`id_usuario_cuatro`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `correspondencias_id_usuario_dos_foreign` FOREIGN KEY (`id_usuario_dos`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `correspondencias_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `correspondencias_id_usuario_tres_foreign` FOREIGN KEY (`id_usuario_tres`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `correspondencias_seguimientos`
--
ALTER TABLE `correspondencias_seguimientos`
  ADD CONSTRAINT `correspondencias_seguimientos_id_correspondencia_foreign` FOREIGN KEY (`id_correspondencia`) REFERENCES `correspondencias` (`id`),
  ADD CONSTRAINT `correspondencias_seguimientos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_correspondencia_seguimientos` (`id`),
  ADD CONSTRAINT `correspondencias_seguimientos_id_usuario_adiciono_foreign` FOREIGN KEY (`id_usuario_adiciono`) REFERENCES `users` (`id`);

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
-- Filtros para la tabla `funciones_paos`
--
ALTER TABLE `funciones_paos`
  ADD CONSTRAINT `funciones_paos_id_pao_foreign` FOREIGN KEY (`id_pao`) REFERENCES `paos` (`id`);

--
-- Filtros para la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD CONSTRAINT `lugares_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`),
  ADD CONSTRAINT `lugares_id_municipio_foreign` FOREIGN KEY (`id_municipio`) REFERENCES `municipios` (`id`);

--
-- Filtros para la tabla `memos_externos`
--
ALTER TABLE `memos_externos`
  ADD CONSTRAINT `memos_externos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_paos` (`id`),
  ADD CONSTRAINT `memos_externos_id_tecnico_foreign` FOREIGN KEY (`id_tecnico`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `memos_externos_id_usuario_adiciono_foreign` FOREIGN KEY (`id_usuario_adiciono`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `memos_internos`
--
ALTER TABLE `memos_internos`
  ADD CONSTRAINT `memos_internos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_paos` (`id`),
  ADD CONSTRAINT `memos_internos_id_tecnico_foreign` FOREIGN KEY (`id_tecnico`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `memos_internos_id_usuario_adiciono_foreign` FOREIGN KEY (`id_usuario_adiciono`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `movimiento_equipos`
--
ALTER TABLE `movimiento_equipos`
  ADD CONSTRAINT `movimiento_equipos_id_motivo_foreign` FOREIGN KEY (`id_motivo`) REFERENCES `motivos_movimientos_equipos` (`id`),
  ADD CONSTRAINT `movimiento_equipos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_id_departamento_foreign` FOREIGN KEY (`id_departamento`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `objetivos_paos`
--
ALTER TABLE `objetivos_paos`
  ADD CONSTRAINT `objetivos_paos_id_pao_foreign` FOREIGN KEY (`id_pao`) REFERENCES `paos` (`id`);

--
-- Filtros para la tabla `oficios`
--
ALTER TABLE `oficios`
  ADD CONSTRAINT `oficios_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_paos` (`id`),
  ADD CONSTRAINT `oficios_id_tecnico_foreign` FOREIGN KEY (`id_tecnico`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `oficios_id_usuario_adiciono_foreign` FOREIGN KEY (`id_usuario_adiciono`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `paos`
--
ALTER TABLE `paos`
  ADD CONSTRAINT `paos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_paos` (`id`);

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
-- Filtros para la tabla `seguimientos_paos`
--
ALTER TABLE `seguimientos_paos`
  ADD CONSTRAINT `seguimientos_paos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_paos` (`id`),
  ADD CONSTRAINT `seguimientos_paos_id_objetivo_foreign` FOREIGN KEY (`id_objetivo`) REFERENCES `objetivos_paos` (`id`);

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
-- Filtros para la tabla `tareas_paos`
--
ALTER TABLE `tareas_paos`
  ADD CONSTRAINT `tareas_paos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_paos` (`id`),
  ADD CONSTRAINT `tareas_paos_id_trimestre_foreign` FOREIGN KEY (`id_trimestre`) REFERENCES `trimestres_paos` (`id`),
  ADD CONSTRAINT `tareas_paos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

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
-- Filtros para la tabla `trimestres_paos`
--
ALTER TABLE `trimestres_paos`
  ADD CONSTRAINT `trimestres_paos_id_actividad_foreign` FOREIGN KEY (`id_actividad`) REFERENCES `actividades_paos` (`id`),
  ADD CONSTRAINT `trimestres_paos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_paos` (`id`);

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
