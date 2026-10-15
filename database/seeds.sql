-- =============================================================================
-- NovaPOS Demo Seed Data
-- =============================================================================

USE `ventas_php`;

-- -----------------------------------------------------------------------------
-- Admin User Seed
-- Credentials: Username: admin | Password: admin123
-- BCrypt Hash: $2y$12$Unei3atBUvZNxEs2OwDDyebgEDyRFdiFd031BIyDDzb6S3JKsrkny
-- -----------------------------------------------------------------------------
INSERT INTO `usuarios` (`usuario`, `nombre`, `telefono`, `direccion`, `password`, `rol`) VALUES
('admin', 'Administrador Principal', '555-0199', 'Av. Roosevelt Sur #120, San Salvador', '$2y$12$Unei3atBUvZNxEs2OwDDyebgEDyRFdiFd031BIyDDzb6S3JKsrkny', 'Admin');

-- -----------------------------------------------------------------------------
-- Sample Client Seed
-- -----------------------------------------------------------------------------
INSERT INTO `clientes` (`nombre`, `telefono`, `direccion`) VALUES
('Carlos Ramirez', '555-0144', 'Colonia Escalón, Calle Los Cedros #12, San Salvador');

-- -----------------------------------------------------------------------------
-- Sample Vendor Seed
-- -----------------------------------------------------------------------------
INSERT INTO `vendedores` (`nombre`) VALUES
('Marcos Lopez');

-- -----------------------------------------------------------------------------
-- 5 Sample Inventory Products
-- -----------------------------------------------------------------------------
INSERT INTO `productos` (`codigo`, `nombre`, `compra`, `venta`, `existencia`) VALUES
('PROD-001', 'Pomada Fijadora Mate 100g', 4.50, 10.00, 25.00),
('PROD-002', 'Aceite Esencial para Barba 50ml', 6.00, 14.50, 18.00),
('PROD-003', 'Shampoo Anticaspa Profesional 250ml', 3.80, 8.50, 30.00),
('PROD-004', 'Cera Modeladora Texturizante 150g', 5.20, 12.00, 15.00),
('PROD-005', 'Loción After Shave Refrescante 100ml', 4.00, 9.00, 20.00);
