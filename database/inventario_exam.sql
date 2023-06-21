-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2023 a las 06:40:06
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario_exam`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `adm_id` int(11) NOT NULL,
  `adm_nombre` varchar(255) DEFAULT NULL,
  `adm_apellido` varchar(55) NOT NULL,
  `adm_usuario` varchar(55) NOT NULL,
  `adm_contrasenia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`adm_id`, `adm_nombre`, `adm_apellido`, `adm_usuario`, `adm_contrasenia`) VALUES
(1, 'Sergio Alejandro', 'Parra Toro', 'adminSergio', '1234567890');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mayoristas`
--

CREATE TABLE `mayoristas` (
  `may_id` int(11) NOT NULL,
  `may_nombre` varchar(100) DEFAULT NULL,
  `may_direccion` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mayoristas`
--

INSERT INTO `mayoristas` (`may_id`, `may_nombre`, `may_direccion`) VALUES
(1, 'Surtitodo 23', 'Cra. 23 #23-45'),
(2, 'Mercaldas las Palmas', 'Cra.23 a#58-96'),
(3, 'miscelanea la 29', 'Cra.29 #29-02'),
(4, 'Miscelanea Gran vivir', 'Cra.24 #50-34'),
(5, 'La 50 Variedades', 'Cra.25 #50-1 a 50-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_id` int(11) NOT NULL,
  `ped_fecha` date DEFAULT NULL,
  `prod_id` int(11) DEFAULT NULL,
  `prov_id` int(11) DEFAULT NULL,
  `may_id` int(11) DEFAULT NULL,
  `adm_id` int(11) DEFAULT NULL,
  `ped_alias` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prod_id` int(11) NOT NULL,
  `prod_nombre` varchar(100) DEFAULT NULL,
  `prod_precio` float DEFAULT NULL,
  `prod_cantidad_disponible` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_id`, `prod_nombre`, `prod_precio`, `prod_cantidad_disponible`) VALUES
(1, 'Jabon de Baño Atibacterial Lavanda', 6500, 70),
(2, 'Paquete de Gomas Trululu', 3400, 10),
(3, 'Camisetas Blanca talla M', 22000, 3),
(4, 'Camisetas Negra Talla M', 25000, 40),
(5, 'Jabon de Baño de Avena', 5500, 30),
(6, 'Jabon liquido Atibacterial Citrico', 10500, 15),
(7, 'Jabon de Loza Limon Intenso', 4500, 35),
(8, 'Caja de Oka Lokas(decena)', 20500, 80),
(9, 'Bebidas con gas Manzana(decena)1.5L', 45000, 20),
(10, 'Bebidas con gas Uva(decena)1.5L', 45000, 10),
(11, 'Bebidas con gas Naranja(decena)1.5L', 45000, 25),
(12, 'Caja de Barriletes x100', 15000, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `prov_id` int(11) NOT NULL,
  `prov_nombre` varchar(100) DEFAULT NULL,
  `prov_direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`prov_id`, `prov_nombre`, `prov_direccion`) VALUES
(1, 'Postobon', 'Km14 Vía Magdalena Manizales Tesorito'),
(2, 'Super de Alimentos', 'Km10 Vía Magdalena Manizales Tesorito'),
(3, 'Tejidos C.C', 'Km50 Avenida Panamericana'),
(4, 'Jabonerias Hada', 'Cra.30a #33a2'),
(5, 'Insumos de Hogar S.A', 'Cra.35 #20-04'),
(6, 'Distribuidora Nacional Crem Helado', 'Cra.48 #7-266/medellin'),
(7, 'Bodega Azur Maquila', 'Cra.60b #20-04'),
(8, 'Dispapeles SAS', 'Km10 Vía Magdalena'),
(9, 'Elektro Caldas', 'Cra.60a #20-16 Bodega 2'),
(10, 'Insumos ProMetal', 'Cra.13a #60-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indices de la tabla `mayoristas`
--
ALTER TABLE `mayoristas`
  ADD PRIMARY KEY (`may_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ped_id`),
  ADD KEY `FK_ped_prod` (`prod_id`),
  ADD KEY `FK_ped_prov` (`prov_id`),
  ADD KEY `FK_ped_may` (`may_id`),
  ADD KEY `FK_ped_adm` (`adm_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`prov_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administradores`
--
ALTER TABLE `administradores`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mayoristas`
--
ALTER TABLE `mayoristas`
  MODIFY `may_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `prov_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `FK_ped_adm` FOREIGN KEY (`adm_id`) REFERENCES `administradores` (`adm_id`),
  ADD CONSTRAINT `FK_ped_may` FOREIGN KEY (`may_id`) REFERENCES `mayoristas` (`may_id`),
  ADD CONSTRAINT `FK_ped_prod` FOREIGN KEY (`prod_id`) REFERENCES `productos` (`prod_id`),
  ADD CONSTRAINT `FK_ped_prov` FOREIGN KEY (`prov_id`) REFERENCES `proveedores` (`prov_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
