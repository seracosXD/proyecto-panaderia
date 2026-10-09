<?php
// Datos de conexión a la base de datos (ajusta usuario/clave si tu XAMPP los tiene distintos)
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_datos = "panaderia_panes_y_manjares";

$conexion = new mysqli($servidor, $usuario, $clave, $base_datos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
