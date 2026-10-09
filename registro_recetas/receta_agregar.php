<?php
include "conexion.php";

$producto_id = (int) $_POST['producto_id'];
$insumo_id = (int) $_POST['insumo_id'];
$cantidad_necesaria = (float) $_POST['cantidad_necesaria'];

$conexion->query("
    INSERT INTO receta_detalle (producto_id, insumo_id, cantidad_necesaria)
    VALUES ($producto_id, $insumo_id, $cantidad_necesaria)
");

header("Location: receta.php?producto_id=$producto_id");
