<?php
include "conexion.php";

$id = (int) $_POST['id'];
$nombre = $conexion->real_escape_string($_POST['nombre']);
$unidad_medida = $conexion->real_escape_string($_POST['unidad_medida']);
$cantidad_disponible = (float) $_POST['cantidad_disponible'];

if ($id > 0) {
    // Ya existe: actualizamos el insumo
    $sql = "UPDATE insumos SET
                nombre = '$nombre',
                unidad_medida = '$unidad_medida',
                cantidad_disponible = $cantidad_disponible
            WHERE id = $id";
} else {
    // No existe: lo insertamos como nuevo
    $sql = "INSERT INTO insumos (nombre, unidad_medida, cantidad_disponible)
            VALUES ('$nombre', '$unidad_medida', $cantidad_disponible)";
}

if ($conexion->query($sql)) {
    header("Location: insumos.php");
} else {
    echo "Error al guardar: " . $conexion->error;
}
