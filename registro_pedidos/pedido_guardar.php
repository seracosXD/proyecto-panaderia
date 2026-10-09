<?php
include "conexion.php";

$id = (int) $_POST['id'];
$cliente = $conexion->real_escape_string($_POST['cliente']);
$producto_id = (int) $_POST['producto_id'];
$cantidad = (int) $_POST['cantidad'];
$fecha_entrega = $conexion->real_escape_string($_POST['fecha_entrega']);
$estado = $conexion->real_escape_string($_POST['estado']);

if ($id > 0) {
    $sql = "UPDATE pedidos SET
                cliente = '$cliente',
                producto_id = $producto_id,
                cantidad = $cantidad,
                fecha_entrega = '$fecha_entrega',
                estado = '$estado'
            WHERE id = $id";
} else {
    $sql = "INSERT INTO pedidos (cliente, producto_id, cantidad, fecha_entrega, estado)
            VALUES ('$cliente', $producto_id, $cantidad, '$fecha_entrega', '$estado')";
}

if ($conexion->query($sql)) {
    header("Location: pedidos.php");
} else {
    echo "Error al guardar: " . $conexion->error;
}
