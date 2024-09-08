-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-09-2024 a las 08:11:25
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `s2_grupal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reclamos`
--

CREATE TABLE `reclamos` (
  `reclamoID` bigint(20) UNSIGNED NOT NULL,
  `nombres_cliente` varchar(255) NOT NULL,
  `apellidos_cliente` varchar(255) NOT NULL,
  `dni_cliente` varchar(255) DEFAULT NULL,
  `telefono_cliente` varchar(255) DEFAULT NULL,
  `correo_cliente` varchar(255) NOT NULL,
  `sexo` varchar(255) NOT NULL,
  `productoID` bigint(20) UNSIGNED NOT NULL,
  `tipo_reclamo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reclamos`
--

INSERT INTO `reclamos` (`reclamoID`, `nombres_cliente`, `apellidos_cliente`, `dni_cliente`, `telefono_cliente`, `correo_cliente`, `sexo`, `productoID`, `tipo_reclamo`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Giancarlo', 'Silva', '72404052', '999002341', 'example@gmail.com', 'M', 2, 'servicio', 'Producto Expirado', '2024-09-07 10:51:30', '2024-09-07 10:51:30'),
(2, 'Giancarlo', 'Silva', '72404052', '999002341', 'example@gmail.com', 'M', 2, 'servicio', 'Producto Expirado', '2024-09-07 10:52:37', '2024-09-07 10:52:37'),
(3, 'Maria', 'Magdalena', '790234414', '989823411', 'maria@gmail.com', 'F', 3, 'producto', 'Producto en mal estado', '2024-09-07 10:55:23', '2024-09-07 10:55:23'),
(4, 'Elias', 'Morales', '75689023', '970234112', 'e@gmail.com', 'M', 4, 'otros', 'Producto daniado', '2024-09-07 11:10:09', '2024-09-07 11:10:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD PRIMARY KEY (`reclamoID`),
  ADD KEY `reclamos_productoid_foreign` (`productoID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reclamos`
--
ALTER TABLE `reclamos`
  MODIFY `reclamoID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reclamos`
--
ALTER TABLE `reclamos`
  ADD CONSTRAINT `reclamos_productoid_foreign` FOREIGN KEY (`productoID`) REFERENCES `productos` (`productoID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
