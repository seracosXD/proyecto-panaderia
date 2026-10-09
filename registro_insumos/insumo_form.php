<?php
include "conexion.php";

// Si llega un id por la URL, es que vamos a editar un insumo existente
$insumo = ["id" => "", "nombre" => "", "unidad_medida" => "", "cantidad_disponible" => ""];

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $resultado = $conexion->query("SELECT * FROM insumos WHERE id = $id");
    if ($resultado->num_rows > 0) {
        $insumo = $resultado->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar insumo</title>
</head>
<body>

    <h1><?= $insumo['id'] ? "Editar insumo" : "Agregar insumo" ?></h1>

    <form action="insumo_guardar.php" method="POST">

        <input type="hidden" name="id" value="<?= $insumo['id'] ?>">

        <label>Nombre del insumo:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($insumo['nombre']) ?>" required><br><br>

        <label>Unidad de medida (kg, g, litros, unidades...):</label><br>
        <input type="text" name="unidad_medida" value="<?= htmlspecialchars($insumo['unidad_medida']) ?>" required><br><br>

        <label>Cantidad disponible:</label><br>
        <input type="number" step="0.01" name="cantidad_disponible" value="<?= $insumo['cantidad_disponible'] ?>" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <p><a href="insumos.php">Volver al listado</a></p>

</body>
</html>
