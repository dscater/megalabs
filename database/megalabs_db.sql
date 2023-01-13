-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 13-01-2023 a las 16:56:46
-- Versión del servidor: 5.7.33
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `megalabs_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertas`
--

CREATE TABLE `alertas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maestro_registro_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alertas`
--

INSERT INTO `alertas` (`id`, `maestro_registro_id`, `descripcion`, `fecha`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 1, 'EL PRODUCTO P001 DE AGEMED YA TIENE 295 DÍAS QUE VENCIÓ', '2022-11-01', '2022-11-01', '2022-11-01 21:02:40', '2022-11-01 21:02:40'),
(2, 2, 'EL PRODUCTO P001 DE SENASAC LE QUEDAN 4 DÍAS PARA SU VENCIMIENTO', '2022-11-01', '2022-11-01', '2022-11-01 21:02:40', '2022-11-01 21:02:40'),
(3, 1, 'EL PRODUCTO P001 DE AGEMED YA TIENE 296 DÍAS QUE VENCIÓ', '2022-11-02', '2022-11-02', '2022-11-02 15:56:49', '2022-11-02 15:56:49'),
(4, 2, 'EL PRODUCTO P001 DE SENASAC LE QUEDAN 3 DÍAS PARA SU VENCIMIENTO', '2022-11-02', '2022-11-02', '2022-11-02 15:56:49', '2022-11-02 15:56:49'),
(5, 1, 'EL PRODUCTO P001 DE AGEMED YA TIENE 299 DÍAS QUE VENCIÓ', '2022-11-05', '2022-11-05', '2022-11-05 14:48:26', '2022-11-05 14:48:26'),
(6, 2, 'EL PRODUCTO P001 DE SENASAC LE QUEDAN 0 DÍAS PARA SU VENCIMIENTO', '2022-11-05', '2022-11-05', '2022-11-05 14:48:26', '2022-11-05 14:48:26'),
(7, 1, 'EL PRODUCTO P001 DE AGEMED YA TIENE 330 DÍAS QUE VENCIÓ', '2022-12-06', '2022-12-06', '2022-12-06 15:24:23', '2022-12-06 15:24:23'),
(8, 2, 'EL PRODUCTO P001 DE SENASAC YA TIENE 31 DÍAS QUE VENCIÓ', '2022-12-06', '2022-12-06', '2022-12-06 15:24:23', '2022-12-06 15:24:23'),
(9, 1, 'EL PRODUCTO P001 DE AGEMED YA TIENE 367 DÍAS QUE VENCIÓ', '2023-01-12', '2023-01-12', '2023-01-12 18:28:39', '2023-01-12 18:28:39'),
(10, 2, 'EL PRODUCTO P001 DE SENASAC YA TIENE 68 DÍAS QUE VENCIÓ', '2023-01-12', '2023-01-12', '2023-01-12 18:28:39', '2023-01-12 18:28:39'),
(11, 1, 'EL PRODUCTO P001 DE AGEMED YA TIENE 368 DÍAS QUE VENCIÓ', '2023-01-13', '2023-01-13', '2023-01-13 14:01:39', '2023-01-13 14:01:39'),
(12, 2, 'EL PRODUCTO P001 DE SENASAC YA TIENE 69 DÍAS QUE VENCIÓ', '2023-01-13', '2023-01-13', '2023-01-13 14:01:39', '2023-01-13 14:01:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracions`
--

CREATE TABLE `configuracions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_sistema` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `web` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actividad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configuracions`
--

INSERT INTO `configuracions` (`id`, `nombre_sistema`, `alias`, `razon_social`, `ciudad`, `dir`, `fono`, `web`, `actividad`, `correo`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'SISTEMA DE INFORMACIÓN WEB PARA EL CONTROL Y SEGUIMIENTO DE REGISTROS SANITARIOS FARMACEUTICOS', 'MEGALABS', 'EMPRESA DE PRUEBA \"MEGALABS\"', 'LA PAZ', 'LOS OLIVOS', '222222', 'WEB', 'ACTIVIDAD', 'MEGALABAS@GMAIL.COM', '1666904097_logo.png', NULL, '2022-10-27 20:54:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro_registros`
--

CREATE TABLE `maestro_registros` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `institucion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_producto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion_figura_rs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_sac` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comercializado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_rs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_emision_rs` date DEFAULT NULL,
  `fecha_vencimiento_rs` date DEFAULT NULL,
  `dias_vencer` int(11) DEFAULT NULL,
  `estado_sanitario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actualizacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion_sanitario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `propiedad_lc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prioridad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_revision_ab` date DEFAULT NULL,
  `fecha_tentativa_agemed` date DEFAULT NULL,
  `fecha_respuesta_agemed` date DEFAULT NULL,
  `primera_fecha_ro` date DEFAULT NULL,
  `segunda_fecha_ro` date DEFAULT NULL,
  `fecha_tentativa_p` date DEFAULT NULL,
  `fecha_estimada_o_rs2` date DEFAULT NULL,
  `comentarios_registro` text COLLATE utf8mb4_unicode_ci,
  `comentarios_planificacion` text COLLATE utf8mb4_unicode_ci,
  `gdp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentacion_comercial` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentacion_rs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origen_rs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fabricante` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `para` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bajo_licencia` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_rectificacion` date DEFAULT NULL,
  `principio_activo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `concentracion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forma_farmaceutica_rs` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `forma_farmaceutica_amornizada` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formula_cc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venta_ventanilla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion_venta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto_tecnico` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vida_util` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `atq` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `condicion_almacenamiento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linea_estucheria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio_comercializacion` date DEFAULT NULL,
  `producto_licitacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registro_sanitario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `maestro_registros`
--

INSERT INTO `maestro_registros` (`id`, `institucion`, `codigo_producto`, `descripcion_figura_rs`, `descripcion_sac`, `comercializado`, `numero_rs`, `fecha_emision_rs`, `fecha_vencimiento_rs`, `dias_vencer`, `estado_sanitario`, `actualizacion`, `condicion_sanitario`, `propiedad_lc`, `prioridad`, `responsable`, `fecha_revision_ab`, `fecha_tentativa_agemed`, `fecha_respuesta_agemed`, `primera_fecha_ro`, `segunda_fecha_ro`, `fecha_tentativa_p`, `fecha_estimada_o_rs2`, `comentarios_registro`, `comentarios_planificacion`, `gdp`, `presentacion_comercial`, `presentacion_rs`, `origen_rs`, `fabricante`, `para`, `bajo_licencia`, `fecha_rectificacion`, `principio_activo`, `concentracion`, `forma_farmaceutica_rs`, `forma_farmaceutica_amornizada`, `formula_cc`, `venta_ventanilla`, `condicion_venta`, `contacto_tecnico`, `vida_util`, `atq`, `condicion_almacenamiento`, `linea_estucheria`, `fecha_inicio_comercializacion`, `producto_licitacion`, `registro_sanitario`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 'AGEMED', 'P001', 'PRODUCTO 1 AGEMED', '', '', '', '2022-01-01', '2022-01-10', 9, 'VENCIDO', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '16736228941_registro_sanitario.pdf', '2022-10-27', '2022-10-27 22:00:42', '2023-01-13 15:14:54'),
(2, 'SENASAC', 'P001', 'PRODUCTO 1 AGEMED', '', '', '', '2022-08-20', '2022-11-05', 77, 'VENCIDO', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '16736229112_registro_sanitario.pdf', '2022-10-27', '2022-10-27 22:01:37', '2023-01-13 15:15:11'),
(4, 'AGEMED', 'P001', 'PRODUCTO 1 AGEMED', '', '', '22222', '0000-00-00', '0000-00-00', 0, 'SIN REGISTRO', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', NULL, '2022-10-27', '2022-10-27 22:35:19', '2023-01-13 16:04:30'),
(5, 'AGEMED', 'P0044', 'DESC FIGURA', '', '', '', '0000-00-00', '0000-00-00', 0, 'VIGENTE', '', '', '', '', '', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '0000-00-00', '', '16736228875_registro_sanitario.pdf', '2023-01-12', '2023-01-12 19:49:29', '2023-01-13 16:04:48');

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
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_10_13_132625_create_configuracions_table', 1),
(7, '2022_10_27_024350_create_maestro_registros_table', 1),
(8, '2022_10_27_024405_create_seguimiento_tramites_table', 1),
(9, '2022_10_27_024418_create_seguimiento_aprobados_table', 1),
(10, '2022_10_27_024430_create_seguimiento_rectificacions_table', 1),
(11, '2022_10_27_024438_create_notas_table', 1),
(12, '2022_10_27_024455_create_notificacions_table', 1),
(13, '2022_10_27_024503_create_alertas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maestro_registro_id` bigint(20) UNSIGNED NOT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `maestro_registro_id`, `referencia`, `descripcion`, `archivo`, `fecha`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 2, 'REFERENCIA NOTA', 'DESCRIPCION NOTA 1', '1667254205_notas1.jpg', '2022-10-28', '2022-10-28', '2022-10-28 18:59:05', '2022-10-31 22:10:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacions`
--

CREATE TABLE `notificacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maestro_registro_id` bigint(20) UNSIGNED NOT NULL,
  `referencia` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `notificacions`
--

INSERT INTO `notificacions` (`id`, `maestro_registro_id`, `referencia`, `descripcion`, `archivo`, `fecha`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 1, 'NOTIFICACION', 'DESCRIPCION NOTIFICACION', '1667254412_notificacions1.jpg', '2022-10-31', '2022-10-31', '2022-10-31 21:06:54', '2022-10-31 22:13:32');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_aprobados`
--

CREATE TABLE `seguimiento_aprobados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maestro_registro_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_aprobacion` date NOT NULL,
  `estado_final` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seguimiento_aprobados`
--

INSERT INTO `seguimiento_aprobados` (`id`, `maestro_registro_id`, `fecha_aprobacion`, `estado_final`, `archivo`, `observacion`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-01-01', 'APROBADO', '', '', '2022-10-28', '2022-10-28 16:00:05', '2022-10-28 16:00:05'),
(2, 2, '2022-01-01', 'APROBADO', '1667254089_aprobados2.pdf', 'OBSERVACION TRAMITE APROBADO', '2022-10-28', '2022-10-28 17:21:48', '2022-10-31 22:08:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_rectificacions`
--

CREATE TABLE `seguimiento_rectificacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maestro_registro_id` bigint(20) UNSIGNED NOT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_tramite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `codigo_misa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoja_ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `motivo_rectificacion` text COLLATE utf8mb4_unicode_ci,
  `agemed_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agemed_fecha` date DEFAULT NULL,
  `megalabs_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `megalabs_fecha` date DEFAULT NULL,
  `rs_fecha` date DEFAULT NULL,
  `rs_nro_registro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rs_fecha_recojo` date DEFAULT NULL,
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seguimiento_rectificacions`
--

INSERT INTO `seguimiento_rectificacions` (`id`, `maestro_registro_id`, `responsable`, `tipo_tramite`, `fecha_ingreso`, `codigo_misa`, `hoja_ruta`, `motivo_rectificacion`, `agemed_estado`, `agemed_fecha`, `megalabs_estado`, `megalabs_fecha`, `rs_fecha`, `rs_nro_registro`, `rs_fecha_recojo`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 1, 'JUAN PERES', 'RECTIFICACIÓN', '2022-03-03', 'MISA001', '', 'MOTIVO RECTIFICACION', 'ESTADO OBS. MISA AGEMED', '2022-04-04', 'ESTADO MISA-MEGALABS', '2022-05-05', '2022-06-06', '11111', '2022-10-28', '2022-10-28', '2022-10-28 17:44:38', '2022-10-28 17:50:48'),
(2, 2, 'PEDRO RAMIRES', 'NOTIFICACIÓN', '0000-00-00', '', '', '', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '2022-11-01', '2022-11-01 20:45:42', '2022-11-01 20:45:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_tramites`
--

CREATE TABLE `seguimiento_tramites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `maestro_registro_id` bigint(20) UNSIGNED NOT NULL,
  `responsable` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_tramite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_ingreso` date DEFAULT NULL,
  `codigo_misa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoja_ruta` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ameged_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ameged_fecha` date DEFAULT NULL,
  `megalabs_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `megalabs_fecha` date DEFAULT NULL,
  `rs_fecha_aprobacion` date DEFAULT NULL,
  `rs_nro_registro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rs_fecha_recojo` date DEFAULT NULL,
  `cpp_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpp_carta` text COLLATE utf8mb4_unicode_ci,
  `cpp_cite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cpp_archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muestra_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muestra_carta` text COLLATE utf8mb4_unicode_ci,
  `muestra_cite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muestra_archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desplegado_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desplegado_carta` text COLLATE utf8mb4_unicode_ci,
  `desplegado_cite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desplegado_archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmp_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmp_carta` text COLLATE utf8mb4_unicode_ci,
  `gmp_cite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmp_archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rl_estado` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rl_carta` text COLLATE utf8mb4_unicode_ci,
  `rl_cite` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rl_archivo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_aprobacion` date DEFAULT NULL,
  `estado_final` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archivo_aprobacion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observacion` text COLLATE utf8mb4_unicode_ci,
  `fecha_registro` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seguimiento_tramites`
--

INSERT INTO `seguimiento_tramites` (`id`, `maestro_registro_id`, `responsable`, `tipo_tramite`, `fecha_ingreso`, `codigo_misa`, `hoja_ruta`, `ameged_estado`, `ameged_fecha`, `megalabs_estado`, `megalabs_fecha`, `rs_fecha_aprobacion`, `rs_nro_registro`, `rs_fecha_recojo`, `cpp_estado`, `cpp_carta`, `cpp_cite`, `cpp_archivo`, `muestra_estado`, `muestra_carta`, `muestra_cite`, `muestra_archivo`, `desplegado_estado`, `desplegado_carta`, `desplegado_cite`, `desplegado_archivo`, `gmp_estado`, `gmp_carta`, `gmp_cite`, `gmp_archivo`, `rl_estado`, `rl_carta`, `rl_cite`, `rl_archivo`, `fecha_aprobacion`, `estado_final`, `archivo_aprobacion`, `observacion`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 1, 'JUAN PERES', 'TIPO DE TRAMITE', '0000-00-00', '', '', '', '0000-00-00', 'ESTADO PRESENTACIÓN', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', '', '1667253780_cpp_archivo1.pdf', '', '', '', '1667253780_muestra_archivo1.jpg', '', '', '', NULL, '', '', '', NULL, '', '', '', NULL, '0000-00-00', 'APROBADO', '1673626865_archivo_aprobacion1.pdf', '', '2022-10-28', '2022-10-28 14:44:53', '2023-01-13 16:21:05'),
(2, 2, 'PEDRO RAMIRES', 'TRAMITE CON ARCHIVOS', '2022-01-01', 'CODIGO MISA', 'HOJA DE RUTA', 'OBSERVACIONES MISA AGEMED', '2022-10-28', 'ESTADO MISA MEGALABS', '2022-10-28', '2022-10-28', '123', '2022-10-28', 'ESTADO CPP', 'CARTA CPP', 'CITE CPP', '1666971403_cpp_archivo2.pdf', '', '', '', '1666971148_muestra_archivo2.pdf', '', '', '', NULL, '', '', '', NULL, '', '', '', NULL, '2023-01-13', 'EN PROCESO', '', 'OBSERVACION DE APROBACIÓN', '2022-10-28', '2022-10-28 15:23:52', '2023-01-13 16:04:02'),
(3, 5, 'JORGE PAREDES', 'TRAMITE DE PRUEBA', '2023-01-13', '00011', '22300', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', '0000-00-00', '', '', '', NULL, '', '', '', NULL, '', '', '', NULL, '', '', '', NULL, '', '', '', NULL, '2023-01-13', 'APROBADO', '1673627297_archivo_aprobacion3.pdf', 'OBS. APROBACIÓN', '2023-01-13', '2023-01-13 16:05:16', '2023-01-13 16:28:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paterno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `materno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ci` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci_exp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fono` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cel` varchar(155) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` enum('ADMINISTRADOR','AUXILIAR') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_registro` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `nombre`, `paterno`, `materno`, `ci`, `ci_exp`, `dir`, `correo`, `fono`, `cel`, `tipo`, `foto`, `password`, `fecha_registro`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '', NULL, '0', '', '', NULL, '', '', 'ADMINISTRADOR', NULL, '$2y$10$cDSOdzTsMDQAfqcb6.WFtu40s.wmQ4Jl8poIwW69MSZnnedD3prKu', '2022-10-27', NULL, NULL),
(2, 'JPERES', 'JUAN', 'PERES', '', '1234', 'LP', 'LOS OLIVOS', 'juan@gmail.com', '22222', '777777', 'AUXILIAR', '1666903970_JPERES.jpg', '$2y$10$sh3kqQQ/YjWUCaKKEPofae.dfPWIgHsv2t8KE/OAYru5WJGMJugM2', '2022-10-27', '2022-10-27 20:52:22', '2022-11-02 15:58:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alertas_maestro_registro_id_foreign` (`maestro_registro_id`);

--
-- Indices de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestro_registros`
--
ALTER TABLE `maestro_registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notas_maestro_registro_id_foreign` (`maestro_registro_id`);

--
-- Indices de la tabla `notificacions`
--
ALTER TABLE `notificacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notificacions_maestro_registro_id_foreign` (`maestro_registro_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `seguimiento_aprobados`
--
ALTER TABLE `seguimiento_aprobados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguimiento_aprobados_maestro_registro_id_foreign` (`maestro_registro_id`);

--
-- Indices de la tabla `seguimiento_rectificacions`
--
ALTER TABLE `seguimiento_rectificacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguimiento_rectificacions_maestro_registro_id_foreign` (`maestro_registro_id`);

--
-- Indices de la tabla `seguimiento_tramites`
--
ALTER TABLE `seguimiento_tramites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seguimiento_tramites_maestro_registro_id_foreign` (`maestro_registro_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_usuario_unique` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alertas`
--
ALTER TABLE `alertas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `configuracions`
--
ALTER TABLE `configuracions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `maestro_registros`
--
ALTER TABLE `maestro_registros`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `notificacions`
--
ALTER TABLE `notificacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `seguimiento_aprobados`
--
ALTER TABLE `seguimiento_aprobados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimiento_rectificacions`
--
ALTER TABLE `seguimiento_rectificacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seguimiento_tramites`
--
ALTER TABLE `seguimiento_tramites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alertas`
--
ALTER TABLE `alertas`
  ADD CONSTRAINT `alertas_maestro_registro_id_foreign` FOREIGN KEY (`maestro_registro_id`) REFERENCES `maestro_registros` (`id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_maestro_registro_id_foreign` FOREIGN KEY (`maestro_registro_id`) REFERENCES `maestro_registros` (`id`);

--
-- Filtros para la tabla `notificacions`
--
ALTER TABLE `notificacions`
  ADD CONSTRAINT `notificacions_maestro_registro_id_foreign` FOREIGN KEY (`maestro_registro_id`) REFERENCES `maestro_registros` (`id`);

--
-- Filtros para la tabla `seguimiento_aprobados`
--
ALTER TABLE `seguimiento_aprobados`
  ADD CONSTRAINT `seguimiento_aprobados_maestro_registro_id_foreign` FOREIGN KEY (`maestro_registro_id`) REFERENCES `maestro_registros` (`id`);

--
-- Filtros para la tabla `seguimiento_rectificacions`
--
ALTER TABLE `seguimiento_rectificacions`
  ADD CONSTRAINT `seguimiento_rectificacions_maestro_registro_id_foreign` FOREIGN KEY (`maestro_registro_id`) REFERENCES `maestro_registros` (`id`);

--
-- Filtros para la tabla `seguimiento_tramites`
--
ALTER TABLE `seguimiento_tramites`
  ADD CONSTRAINT `seguimiento_tramites_maestro_registro_id_foreign` FOREIGN KEY (`maestro_registro_id`) REFERENCES `maestro_registros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
