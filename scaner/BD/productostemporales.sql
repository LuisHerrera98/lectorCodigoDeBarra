-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-07-2020 a las 06:32:16
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemafacturacionphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productostemporales`
--

CREATE TABLE `productostemporales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codproducto` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productostemporales`
--

INSERT INTO `productostemporales` (`id`, `codproducto`, `nombre`, `cantidad`) VALUES
(154, '3876453219293', 'Arroz', '9'),
(155, '2076453219991', 'Azucar', '28'),
(159, '2345678901258', 'Harina Pan', '9'),
(160, '1234567890128', 'Pasta Larga', '11'),
(161, '1076300219908', 'Leche', '12'),
(162, '9292900020115', 'Salsa de Tomate', '15'),
(163, '3345678905446', 'Lapto Hp', '10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productostemporales`
--
ALTER TABLE `productostemporales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productostemporales`
--
ALTER TABLE `productostemporales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
