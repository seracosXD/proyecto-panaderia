<?php
include "conexion.php";

$id = (int) $_GET['id'];
$producto_id = (int) $_GET['producto_id'];

$conexion->query("DELETE FROM receta_detalle WHERE id = $id");

header("Location: receta.php?producto_id=$producto_id");
