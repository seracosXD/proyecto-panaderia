-- Panadería Panes y Manjares
-- Módulo de pedidos por encargo (independiente: crea también productos si no existe)

CREATE DATABASE IF NOT EXISTS panaderia_panes_y_manjares;
USE panaderia_panes_y_manjares;

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS pedidos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente VARCHAR(100) NOT NULL,
    producto_id INT NOT NULL,
    cantidad INT NOT NULL,
    fecha_entrega DATE NOT NULL,
    estado VARCHAR(20) NOT NULL DEFAULT 'pendiente',
    fecha_registro DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (producto_id) REFERENCES productos(id)
);
