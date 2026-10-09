<?php
include "conexion.php";

$id = (int) $_GET['id'];
$conexion->query("DELETE FROM insumos WHERE id = $id");

header("Location: insumos.php");
