<?php
include "conexion.php";

$id = (int) $_GET['id'];
$conexion->query("DELETE FROM pedidos WHERE id = $id");

header("Location: pedidos.php");
