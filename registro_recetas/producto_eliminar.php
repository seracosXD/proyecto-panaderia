<?php
include "conexion.php";

$id = (int) $_GET['id'];
$conexion->query("DELETE FROM productos WHERE id = $id");
// receta_detalle se borra sola por el ON DELETE CASCADE

header("Location: productos.php");
