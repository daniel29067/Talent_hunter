-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2020 a las 02:39:30
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `toto_tb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cl` int(11) NOT NULL,
  `id_pe` int(11) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `tel` varchar(250) DEFAULT NULL,
  `dir` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cl`, `id_pe`, `name`, `tel`, `dir`, `email`) VALUES
(1, 2, 'EDG', '7141693', 'CRA24', 'LEAL3@GMAIL.COM'),
(2, 3, 'dianam', '7141694', 'CRA24', 'LEAL4@GMAIL.COM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_co` int(11) NOT NULL,
  `id_pr` int(11) DEFAULT NULL,
  `precio` varchar(250) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total_co` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`id_co`, `id_pr`, `precio`, `cantidad`, `total_co`) VALUES
(1, 1, '300000', 20, '4800000'),
(6, NULL, '5000', 5, '250000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id_in` int(11) NOT NULL,
  `id_pro` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_in`, `id_pro`, `cantidad`) VALUES
(6, 1, 16),
(7, 1, 16);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pe` int(11) NOT NULL,
  `id_cl` int(11) DEFAULT NULL,
  `id_pro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id_pe`, `id_cl`, `id_pro`) VALUES
(2, 1, 1),
(3, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_pro` int(11) NOT NULL,
  `id_co` int(11) DEFAULT NULL,
  `marca` varchar(250) DEFAULT NULL,
  `precio` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_pro`, `id_co`, `marca`, `precio`) VALUES
(1, 1, 'BRIDGESTONE', '400000'),
(2, 1, 'FIRESTONE', '350000'),
(6, 1, 'michelin', '120000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_pr` int(11) NOT NULL,
  `empresa` varchar(250) DEFAULT NULL,
  `tel` varchar(250) DEFAULT NULL,
  `dir` varchar(250) DEFAULT NULL,
  `pag_web` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_pr`, `empresa`, `tel`, `dir`, `pag_web`) VALUES
(1, 'BRIDGESTONE', '1234567', 'cra 5', 'WWW.BRIDGESTONE.COM'),
(5, 'BRIDGESTON', '451332', 'cll2', 'WWW.firestone.COM');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `prueba`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `prueba` (
`name` varchar(250)
,`email` varchar(250)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_tb`
--

CREATE TABLE `user_tb` (
  `id` int(11) NOT NULL,
  `user` varchar(250) DEFAULT NULL,
  `contrasena` varchar(250) DEFAULT NULL,
  `cargo` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_tb`
--

INSERT INTO `user_tb` (`id`, `user`, `contrasena`, `cargo`, `email`) VALUES
(9, 'daniel', '1234', 'admin', 'leal@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_ve` int(11) NOT NULL,
  `id_pe` int(11) DEFAULT NULL,
  `fecha_pei` varchar(250) DEFAULT NULL,
  `fecha_en` varchar(250) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total_ve` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`id_ve`, `id_pe`, `fecha_pei`, `fecha_en`, `cantidad`, `total_ve`) VALUES
(1, 2, '24/05/2019', '28/05/2019', 4, '160000000'),
(2, 3, '24/05/2018', '28/05/2018', 16, '1400000'),
(5, NULL, '2005-05-12', '2005-05-12', 3, '250');

-- --------------------------------------------------------

--
-- Estructura para la vista `prueba`
--
DROP TABLE IF EXISTS `prueba`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `prueba`  AS  select `clientes`.`name` AS `name`,`clientes`.`email` AS `email` from `clientes` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cl`),
  ADD KEY `id_pe` (`id_pe`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_co`),
  ADD KEY `id_pr` (`id_pr`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id_in`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pe`),
  ADD KEY `id_cl` (`id_cl`),
  ADD KEY `id_pro` (`id_pro`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_pro`),
  ADD KEY `id_co` (`id_co`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_pr`);

--
-- Indices de la tabla `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_ve`),
  ADD KEY `id_pe` (`id_pe`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_co` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id_in` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id_pe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_pro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_pr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_ve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_pe`) REFERENCES `pedido` (`id_pe`);

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_pr`) REFERENCES `proveedor` (`id_pr`);

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_pro`) REFERENCES `producto` (`id_pro`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`id_cl`) REFERENCES `clientes` (`id_cl`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`id_pro`) REFERENCES `producto` (`id_pro`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_co`) REFERENCES `compra` (`id_co`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_pe`) REFERENCES `pedido` (`id_pe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
