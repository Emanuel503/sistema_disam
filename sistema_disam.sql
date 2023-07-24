-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2022 a las 00:27:26
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
  `id_organizador` bigint(20) UNSIGNED NOT NULL,
  `id_lugar` bigint(20) UNSIGNED NOT NULL,
  `id_coordinador` bigint(20) UNSIGNED NOT NULL,
  `id_estado` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

INSERT INTO `actividades` (`id`, `id_organizador`, `id_lugar`, `id_coordinador`, `id_estado`, `title`, `fecha_inicio`, `fecha_finalizacion`, `hora_inicio`, `hora_finalizacion`, `start`, `end`, `objetivo`, `observaciones`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 5, 'Prueba', '2022-06-26', '2022-06-26', '13:00:00', '14:00:00', '2022-06-26 13:00:00', '2022-06-26 14:00:00', 'AAAAAA', 'BBBBBB', '2022-06-27 09:31:01', '2022-06-27 09:31:01'),
(2, 1, 1, 1, 5, 'adwadawdawda', '2022-07-02', '2022-07-02', '14:00:00', '15:00:00', '2022-07-02 14:00:00', '2022-07-02 15:00:00', 'wdwadadawdawdaw', 'adwadawdadwawd', '2022-07-03 04:30:38', '2022-07-03 04:30:38'),
(3, 1, 1, 1, 5, 'dadadwawdada', '2022-07-02', '2022-07-02', '14:00:00', '15:00:00', '2022-07-02 14:00:00', '2022-07-02 15:00:00', 'adawdawdawda', 'dadawdawdawdaw', '2022-07-03 04:31:14', '2022-07-03 04:31:14');

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
(1, 'Autorizado', '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(2, 'No Autorizado', '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(3, 'Pendiente', '2022-06-27 09:21:39', '2022-06-27 09:21:39');

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
(1, 'Realizada', '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(2, 'Suspendida', '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(3, 'Pospuesta', '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(4, 'Inasistencia', '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(5, 'Pendiente', '2022-06-27 09:21:39', '2022-06-27 09:21:39');

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
(1, 'Activo', '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(2, 'Inactivo', '2022-06-27 09:21:39', '2022-06-27 09:21:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE `lugares` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`id`, `codigo`, `nombre`, `created_at`, `updated_at`) VALUES
(1, '30', 'HOSPITAL SAN JUAN DE DIOS, SANTA ANA', '2022-06-27 09:21:39', '2022-06-27 09:21:39');

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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_06_20_142539_lugares', 1),
(5, '2022_06_20_142547_roles', 1),
(6, '2022_06_20_142613_estados_usuarios', 1),
(7, '2022_06_20_142623_users', 1),
(8, '2022_06_21_153829_salas', 1),
(9, '2022_06_21_154103_autorizaciones', 1),
(10, '2022_06_21_164102_solicitudes_salas', 1),
(11, '2022_06_21_165105_estados_actividades', 1),
(12, '2022_06_23_151826_actividades', 1);

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
(1, 'Administrador', '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(2, 'Usuario', '2022-06-27 09:21:39', '2022-06-27 09:21:39');

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
(1, 'Sala DISAM', '2022-06-27 09:21:39', '2022-06-27 09:21:39');

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
(1, 1, 1, 1, 'admin@gmail.com', 'admin', NULL, '$2y$10$Y65VvRdUiP5p32xGy7r3H.IM2RZ3e7kPmwjdAENoG1pmmGf2kLJDi', 'admin', 'admin', 'admin', 'DISAM', '2234-2345', 'no', NULL, '2022-06-27 09:21:39', '2022-06-27 09:21:39'),
(2, 2, 1, 1, 'user@gmail.com', 'usuario', NULL, '$2y$10$RFjya2owdh2lF2HJ6CLVc.bD5St6Ro3AgkmmMvHg/PJ2gts1UyfPO', 'usuario', 'usuario', 'usuario', 'DISAM', '2234-2345', 'si', NULL, '2022-06-27 09:21:39', '2022-06-27 09:21:39');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
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
-- Indices de la tabla `estados_actividades`
--
ALTER TABLE `estados_actividades`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados_usuarios`
--
ALTER TABLE `estados_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `lugares`
--
ALTER TABLE `lugares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `autorizaciones`
--
ALTER TABLE `autorizaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados_actividades`
--
ALTER TABLE `estados_actividades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estados_usuarios`
--
ALTER TABLE `estados_usuarios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lugares`
--
ALTER TABLE `lugares`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `actividades_id_organizador_foreign` FOREIGN KEY (`id_organizador`) REFERENCES `lugares` (`id`);

--
-- Filtros para la tabla `solicitudes_salas`
--
ALTER TABLE `solicitudes_salas`
  ADD CONSTRAINT `solicitudes_salas_id_autorizacion_foreign` FOREIGN KEY (`id_autorizacion`) REFERENCES `autorizaciones` (`id`),
  ADD CONSTRAINT `solicitudes_salas_id_sala_foreign` FOREIGN KEY (`id_sala`) REFERENCES `salas` (`id`),
  ADD CONSTRAINT `solicitudes_salas_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_dependencia_foreign` FOREIGN KEY (`id_dependencia`) REFERENCES `lugares` (`id`),
  ADD CONSTRAINT `users_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados_usuarios` (`id`),
  ADD CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
