-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2020 a las 00:38:49
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE DATABASE abarrotes;
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) UNSIGNED NOT NULL,
  `nombre_categoria` varchar(50) NOT NULL,
  `status_categoria` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `status_categoria`) VALUES
(5, 'Congelados', 0),
(6, 'Lacteos', 0),
(7, 'Frutas y Verduras', 0),
(8, 'Panaderia', 0),
(9, 'Carnes', 0),
(10, 'Ropa', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `id_colores` int(11) UNSIGNED NOT NULL,
  `nombre_colores` varchar(50) NOT NULL,
  `status_solores` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`id_colores`, `nombre_colores`, `status_solores`) VALUES
(5, 'Azul', 0),
(6, 'Amarillo', 0),
(7, 'Blanco', 0),
(8, 'Rojo', 0),
(9, 'Naranja', 0),
(10, 'Negro', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compras` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `nombre_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `cantidad` varchar(15) NOT NULL,
  `precio_unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compras`, `id_producto`, `id_usuario`, `nombre_producto`, `nombre_usuario`, `fecha`, `cantidad`, `precio_unidad`) VALUES
(75, 9, 1, 'Leche', 0, '2020-07-15 17:36:08', '9', 19),
(76, 12, 1, 'Bistec', 0, '2020-07-15 17:36:41', '26', 84);

--
-- Disparadores `compras`
--
DELIMITER $$
CREATE TRIGGER `resta` AFTER INSERT ON `compras` FOR EACH ROW UPDATE productos SET stock_producto = stock_producto - 1 WHERE id_producto = new.id_producto
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `suma` AFTER DELETE ON `compras` FOR EACH ROW UPDATE productos SET stock_producto = stock_producto + old.cantidad WHERE id_producto = old.id_producto
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_resta` BEFORE UPDATE ON `compras` FOR EACH ROW UPDATE productos set stock_producto = stock_producto + 1 WHERE id_producto = old.id_producto
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_suma` AFTER UPDATE ON `compras` FOR EACH ROW UPDATE productos set stock_producto = stock_producto - new.cantidad WHERE id_producto = old.id_producto
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `id_categoria` int(11) UNSIGNED NOT NULL,
  `id_colores` int(11) UNSIGNED NOT NULL,
  `nombre_producto` varchar(50) DEFAULT NULL,
  `descripcion_producto` varchar(100) NOT NULL,
  `precio_producto` int(50) DEFAULT NULL,
  `stock_producto` int(10) DEFAULT NULL,
  `status_producto` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `id_categoria`, `id_colores`, `nombre_producto`, `descripcion_producto`, `precio_producto`, `stock_producto`, `status_producto`) VALUES
(8, 5, 10, 'Helado ', 'Sabor chocolate', 54, 27, 0),
(9, 6, 5, 'Leche', 'Deslactosada', 19, 0, 0),
(10, 7, 8, 'Manzana', 'Red Delicious', 32, 24, 0),
(11, 8, 5, 'Hojaldra', 'Rellena de Jamon ', 9, 11, 0),
(12, 9, 6, 'Bistec', 'De Cerdo', 84, 0, 0),
(13, 10, 7, 'Jeans', 'Mezclilla', 199, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre_usuarios` varchar(50) DEFAULT NULL,
  `telefono_usuarios` varchar(10) DEFAULT NULL,
  `direccion_usuarios` varchar(50) DEFAULT NULL,
  `correo_usuarios` varchar(50) DEFAULT NULL,
  `contraseña_usuarios` varchar(8) DEFAULT NULL,
  `status_usuarios` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre_usuarios`, `telefono_usuarios`, `direccion_usuarios`, `correo_usuarios`, `contraseña_usuarios`, `status_usuarios`) VALUES
(1, 'Barbara', '9982564716', 'Sm 26', 'bar@unid.mx', '123456', 1),
(5, 'Ana', '9983679105', 'Sm 15', 'ana@red.mx', '123', 1),
(6, 'Antonio', '9982014963', 'Sm 67', 'anto@red.mx', '78945', 1),
(8, 'Carlos', '9985617903', 'Sm 22', 'carlos@unid.mx', 'car45', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`id_colores`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compras`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`),
  ADD KEY `id_colores` (`id_colores`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `id_colores` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compras` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_colores`) REFERENCES `colores` (`id_colores`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
