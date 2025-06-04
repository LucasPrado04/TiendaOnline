-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2022 a las 05:59:23
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prado_lucas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `descripcion`) VALUES
(1, 'Fernet'),
(2, 'Gancia'),
(3, 'Vodka'),
(4, 'Vinos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `numero` int(10) NOT NULL,
  `mensaje` varchar(30) NOT NULL,
  `leido` varchar(30) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre`, `email`, `numero`, `mensaje`, `leido`) VALUES
(1, 'Juan', 'juanM@gmail.com', 379477281, 'Hola', 'SI'),
(2, 'Juan', 'juanM@gmail.com', 379477281, 'Hola hola', 'SI'),
(3, 'Juan', 'juanM@gmail.com', 379488271, 'Muy bueno ', 'NO'),
(6, 'Uks', 'llukkasdasda@gmail.com', 2147483647, 'Cuando van a tener estok?', 'NO'),
(7, 'asdasd', 'llukkasdasda@gmail.com', 2147483647, 'Hola, disculpe la molestia qui', 'NO'),
(8, 'Uks', 'llukkasdasda@gmail.com', 2147483647, 'asd', 'NO'),
(9, 'kitez', 'asdkitez@gmail.com', 2147483647, '2\r\n', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `id_categoria` int(10) NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `precio_venta` double(7,2) NOT NULL,
  `precio_descuento` double(7,2) NOT NULL,
  `precio_cuotas` double(7,2) NOT NULL,
  `cuotas` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `stock_min` int(11) NOT NULL,
  `eliminado` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `descripcion`, `id_categoria`, `imagen`, `precio_venta`, `precio_descuento`, `precio_cuotas`, `cuotas`, `stock`, `stock_min`, `eliminado`) VALUES
(62, 'Fernet Branca 450ml.', 1, './assets/img/fernecito.jpg', 800.00, 0.00, 0.00, 0, 50, 1, 'NO'),
(63, 'Fernet Branca 750ml', 1, './assets/img/fernetmedio.jpg', 1000.00, 0.00, 0.00, 0, 48, 1, 'NO'),
(64, 'Fernet Branca 1000ml.', 1, './assets/img/fernetgrande.jpg', 1250.00, 0.00, 0.00, 0, 18, 1, 'NO'),
(65, 'Gancia Americano 950ml.', 2, './assets/img/gancia_950.jpg', 650.00, 0.00, 0.00, 0, 50, 1, 'NO'),
(66, 'Gancia Citrico 950ml.', 2, './assets/img/gancia_citrico.jpg', 799.00, 0.00, 0.00, 0, 30, 1, 'NO'),
(67, 'Gancia Frutos Rojos 750ml', 2, './assets/img/gancia_frutos.jpg', 699.00, 0.00, 0.00, 0, 49, 1, 'NO'),
(68, 'Smirnoff clasico 950ml', 3, './assets/img/classic_smirn.jpg', 899.00, 0.00, 0.00, 0, 41, 1, 'NO'),
(69, 'Absolut 750ml.', 3, './assets/img/absolut.jpg', 1399.00, 0.00, 0.00, 0, 20, 1, 'NO'),
(70, 'Nikov 1L.', 3, './assets/img/nikov.jpg', 699.00, 0.00, 0.00, 0, 30, 1, 'NO'),
(71, 'Sernova 700ml.', 3, './assets/img/sernova.jpg', 849.00, 0.00, 0.00, 0, 15, 1, 'NO'),
(72, 'Dadá de Chocolate 750ml.', 4, './assets/img/dada_chocolate8.png', 799.00, 0.00, 0.00, 0, 20, 1, 'NO'),
(73, 'Dadá Malbec 750ml.', 4, './assets/img/dada_malbec.jpg', 749.00, 0.00, 0.00, 0, 45, 1, 'NO'),
(74, 'Frizze Espumante clasico 700ml.', 4, './assets/img/frizze_espumante.jpg', 499.00, 0.00, 0.00, 0, 50, 1, 'NO'),
(75, 'Fernet Buhero 750ml.', 1, './assets/img/fernet_buhero.jpg', 799.00, 0.00, 0.00, 0, 50, 1, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `usuario`, `pass`, `perfil_id`, `baja`) VALUES
(1, 'Prado', 'Lucas', 'lluukkaas14@gmail.com', 'admin', 'admin', 1, 'NO'),
(2, 'Juan', 'Martinez', 'juanM@gmail.com', 'Juan', '1234', 2, 'SI'),
(3, 'Marcelo', 'Gimenez', 'MC@gmail.com', 'Marcelo', '1234', 2, 'NO'),
(4, 'Cynthia', 'Sosa', 'SosaCyn@gmail.com', 'Cynthia', '1234', 2, 'NO'),
(5, 'Jonas', 'Gonzalez', 'JonasGonz@gmail.com', 'Joni', '1234', 1, 'NO'),
(6, 'Martin', 'Gimenez', 'MartinGimen@gmail.com', 'Martin', '1234', 2, 'NO'),
(7, 'Axel', 'Fernandez', 'AxelFer@gmail.com', 'Axel', '1234', 2, 'SI'),
(8, 'Agustin', 'Yapper', 'yapper@gmail.com', 'Agustin', '1234', 1, 'SI'),
(9, 'Sebastian', 'Gonzalez', 'Sgonz@gmail.com', 'Sebastian', '1234', 2, 'NO'),
(10, 'Mercedez', 'Gomez', 'MerceGomez@gmail.com', 'Mercedez', '1234', 2, 'NO'),
(11, 'Santiago', 'Gomez', 'santiGomez@gmail.com', 'Santi', '1234', 2, 'SI'),
(12, 'Mariano', 'Banzas', 'MarianoBanzas2@gmail.com', 'Mariano', '1234', 2, 'SI'),
(13, 'Fabian', 'Ramirez', 'fabirami@gmail.com', 'Fabi', '1234', 2, 'NO'),
(14, 'Marcos', 'Antonio', 'MarcoAnto@gmail.com', 'Marcos', '1234', 2, 'NO'),
(15, 'Daniel', 'Gomez', 'Dgomez@gmail.com', 'Dani', '1234', 2, 'NO'),
(16, 'Juanjo', 'Gonzalez', 'Juan@gmail.com', 'Juanjo', '1234', 2, 'NO'),
(17, 'Pedro', 'Martin', 'Pd@gmail.com', 'Pedro', '1234', 2, 'NO'),
(18, 'Ricardo', 'Gonzalez', 'RicarGonz@gmail.com', 'Ricardo', '1234', 2, 'NO'),
(19, 'Rodrigo', 'Gonzalez ', 'rodrigoSG@gmail.com', 'Rodrigo', '1234', 2, 'NO'),
(20, 'juan', 'jose', 'juanjo@gmail.com', 'aaa', '123', 2, 'NO'),
(21, 'lucas', 'prado', 'luksdxzs@gmail.com', 'uks2022', '123', 2, 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(10) NOT NULL,
  `total_venta` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id`, `fecha`, `usuario_id`, `total_venta`) VALUES
(243, '2022-06-21', 20, 2598.00),
(244, '2022-06-21', 20, 1250.00),
(245, '2022-06-21', 20, 1250.00),
(246, '2022-06-21', 20, 1000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(10) NOT NULL,
  `venta_id` int(10) NOT NULL,
  `producto_id` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` double(10,2) NOT NULL,
  `cuotas` int(10) NOT NULL,
  `total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio`, `cuotas`, `total`) VALUES
(1, 243, 63, 1, 1000.00, 0, 1000.00),
(2, 243, 67, 1, 699.00, 0, 699.00),
(3, 243, 68, 1, 899.00, 0, 899.00),
(4, 244, 64, 1, 1250.00, 0, 1250.00),
(5, 245, 64, 1, 1250.00, 0, 1250.00),
(6, 246, 63, 1, 1000.00, 0, 1000.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perfil_id` (`perfil_id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `producto_id` (`producto_id`),
  ADD KEY `venta_id` (`venta_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`);

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas_cabecera_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `ventas_detalle_ibfk_3` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
