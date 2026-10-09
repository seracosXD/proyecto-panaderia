-- Base de datos del proyecto: Control de Pedidos e Inventario de Insumos
-- Panadería Panes y Manjares

CREATE DATABASE IF NOT EXISTS panaderia_panes_y_manjares;
USE panaderia_panes_y_manjares;

CREATE TABLE IF NOT EXISTS insumos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    unidad_medida VARCHAR(20) NOT NULL,
    cantidad_disponible DECIMAL(10,2) NOT NULL DEFAULT 0,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);
