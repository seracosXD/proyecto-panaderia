<?php
include "conexion.php";

$id = (int) $_POST['id'];
$nombre = $conexion->real_escape_string($_POST['nombre']);

if ($id > 0) {
    $sql = "UPDATE productos SET nombre = '$nombre' WHERE id = $id";
} else {
    $sql = "INSERT INTO productos (nombre) VALUES ('$nombre')";
}

if ($conexion->query($sql)) {
    header("Location: productos.php");
} else {
    echo "Error al guardar: " . $conexion->error;
}
