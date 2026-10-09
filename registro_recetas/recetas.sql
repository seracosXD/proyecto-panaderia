-- Panadería Panes y Manjares
-- Módulo de recetas por producto (independiente: crea todo lo que necesita)

CREATE DATABASE IF NOT EXISTS panaderia_panes_y_manjares;
USE panaderia_panes_y_manjares;

CREATE TABLE IF NOT EXISTS insumos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    unidad_medida VARCHAR(20) NOT NULL,
    cantidad_disponible DECIMAL(10,2) NOT NULL DEFAULT 0,
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS receta_detalle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto_id INT NOT NULL,
    insumo_id INT NOT NULL,
    cantidad_necesaria DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (producto_id) REFERENCES productos(id) ON DELETE CASCADE,
    FOREIGN KEY (insumo_id) REFERENCES insumos(id)
);
