-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-12-2017 a las 18:04:05
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `alfredo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `Id_Categoria` tinyint(4) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`Id_Categoria`, `descripcion`, `estado`) VALUES
(2, 'Bebidas', 1),
(3, 'Frutas', 1),
(4, 'cereales', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `Id_Cliente` tinyint(4) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`Id_Cliente`, `Nombre`, `Direccion`, `Telefono`, `estado`) VALUES
(6, 'Juan', 'San Vicente', '7865-3245', 1),
(7, 'Alberto del Rio', 'La Paz', '7865-4356', 1),
(8, 'Jonh cena', 'San Vicente', '78430954', 1),
(9, 'aaa', 'aaa', '77777777', 0),
(10, 'Brom stroman', 'aaa', '77777777', 1),
(11, 'emanuel', 'zacztecoluca', '7777777', 1),
(12, 'Charlo', 'la paz', '74424963', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `Id_Factura` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Id_Cliente` tinyint(4) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`Id_Factura`, `Fecha`, `Id_Cliente`, `estado`) VALUES
(1, '2017-04-20', 1, 1),
(7, '2017-04-23', 6, 1),
(8, '2017-05-10', 11, 1),
(9, '2017-05-10', 11, 1),
(10, '2017-05-24', 9, 1),
(11, '2017-05-04', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `Id_Producto` tinyint(4) NOT NULL,
  `Descripcion` varchar(50) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `Id_Categoria` tinyint(4) NOT NULL,
  `Id_Proveedor` tinyint(4) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`Id_Producto`, `Descripcion`, `Precio`, `Id_Categoria`, `Id_Proveedor`, `estado`) VALUES
(6, 'Tamarindo', '0.25', 2, 2, 1),
(7, 'Fresco de Tamarindo', '0.25', 2, 2, 1),
(8, 'Pera', '0.50', 3, 1, 1),
(9, 'Fresco de orchata', '0.25', 2, 2, 1),
(10, 'jugo', '3.00', 2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Id_Proveedor` tinyint(4) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Telefono` varchar(9) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Id_Proveedor`, `Nombre`, `Direccion`, `Telefono`, `estado`) VALUES
(2, 'manuel', 'la paz', '77756666', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` mediumint(9) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `email` varchar(75) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(50) NOT NULL COMMENT 'La clave se guardará usando el método MD5',
  `estado` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nombre`, `apellido`, `email`, `usuario`, `clave`, `estado`) VALUES
(10, 'Alfredo', 'Alvarado', 'alfredo@gmail.com', 'Alfred', '5c2bf15004e661d7b7c9394617143d07', 0),
(12, 'alfredo', 'Alvarado', 'alfredo@hotmail.com', 'alfredito', 'ab5dc71a6a445689138f201f1dbd9256', 1),
(13, 'Alfredo', 'Alvarado', 'Alvaradop@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(14, 'administrador', 'administrador', 'Ayala@gmail.com', 'administrador', '21232f297a57a5a743894a0e4a801fc3', 1),
(15, '', '', '', '', '', 1),
(16, '', '', '', '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `Id_Venta` tinyint(4) NOT NULL,
  `Id_Factura` tinyint(4) NOT NULL,
  `Id_Producto` tinyint(4) NOT NULL,
  `Cantidad` float NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`Id_Venta`, `Id_Factura`, `Id_Producto`, `Cantidad`, `estado`) VALUES
(1, 2, 1, 58, 1),
(3, 1, 1, 6, 1),
(4, 1, 6, 6, 0),
(5, 1, 6, 20, 0),
(6, 1, 8, 89, 1),
(7, 1, 9, 9, 1),
(8, 1, 6, 30, 1),
(9, 11, 6, 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`Id_Cliente`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`Id_Factura`),
  ADD KEY `Id_Cliente` (`Id_Cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `Id_Categoria` (`Id_Categoria`),
  ADD KEY `Id_Proveedor` (`Id_Proveedor`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id_Proveedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`Id_Venta`),
  ADD KEY `Id_Factura` (`Id_Factura`),
  ADD KEY `Id_Producto` (`Id_Producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `Id_Categoria` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `Id_Cliente` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `Id_Factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `Id_Producto` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id_Proveedor` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `Id_Venta` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
