-- =============================================================================
-- NovaPOS Database Schema
-- Point of Sale and Inventory Management System
-- Compatible with MySQL 5.7+, MariaDB 10.3+, MySQL 8.0+
-- =============================================================================

CREATE DATABASE IF NOT EXISTS `ventas_php` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ventas_php`;

SET FOREIGN_KEY_CHECKS = 0;

-- -----------------------------------------------------------------------------
-- 1. Table structure for table `usuarios`
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `usuario` VARCHAR(50) NOT NULL UNIQUE,
  `nombre` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(20) NOT NULL,
  `direccion` TEXT DEFAULT NULL,
  `password` VARCHAR(255) NOT NULL,
  `rol` VARCHAR(50) NOT NULL DEFAULT 'Vendedor',
  INDEX `idx_usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 2. Table structure for table `clientes`
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(100) NOT NULL,
  `telefono` VARCHAR(20) NOT NULL,
  `direccion` TEXT DEFAULT NULL,
  INDEX `idx_cliente_nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 3. Table structure for table `vendedores`
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `vendedores`;
CREATE TABLE `vendedores` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `nombre` VARCHAR(100) NOT NULL,
  INDEX `idx_vendedor_nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 4. Table structure for table `productos`
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `codigo` VARCHAR(50) NOT NULL UNIQUE,
  `nombre` VARCHAR(150) NOT NULL,
  `compra` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
  `venta` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
  `existencia` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
  INDEX `idx_producto_codigo` (`codigo`),
  INDEX `idx_producto_nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 5. Table structure for table `ventas`
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `ventas`;
CREATE TABLE `ventas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `fecha` DATETIME NOT NULL,
  `total` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
  `idUsuario` INT NOT NULL,
  `vendedor` VARCHAR(100) NOT NULL,
  `metodo_pago` VARCHAR(50) NOT NULL DEFAULT 'Efectivo',
  `idCliente` INT DEFAULT NULL,
  INDEX `idx_ventas_fecha` (`fecha`),
  INDEX `idx_ventas_usuario` (`idUsuario`),
  INDEX `idx_ventas_cliente` (`idCliente`),
  INDEX `idx_ventas_vendedor` (`vendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- -----------------------------------------------------------------------------
-- 6. Table structure for table `productos_ventas`
-- -----------------------------------------------------------------------------
DROP TABLE IF EXISTS `productos_ventas`;
CREATE TABLE `productos_ventas` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `cantidad` DECIMAL(10, 2) NOT NULL DEFAULT 1.00,
  `precio` DECIMAL(10, 2) NOT NULL DEFAULT 0.00,
  `idProducto` INT NOT NULL,
  `idVenta` INT NOT NULL,
  INDEX `idx_pv_venta` (`idVenta`),
  INDEX `idx_pv_producto` (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

SET FOREIGN_KEY_CHECKS = 1;
