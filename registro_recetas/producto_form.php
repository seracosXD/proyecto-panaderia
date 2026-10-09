<?php
include "conexion.php";

$producto = ["id" => "", "nombre" => ""];

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $resultado = $conexion->query("SELECT * FROM productos WHERE id = $id");
    if ($resultado->num_rows > 0) {
        $producto = $resultado->fetch_assoc();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Producto</title>
</head>
<body>

    <h1><?= $producto['id'] ? "Renombrar producto" : "Agregar producto" ?></h1>

    <form action="producto_guardar.php" method="POST">
        <input type="hidden" name="id" value="<?= $producto['id'] ?>">

        <label>Nombre del producto:</label><br>
        <input type="text" name="nombre" value="<?= htmlspecialchars($producto['nombre']) ?>" required><br><br>

        <button type="submit">Guardar</button>
    </form>

    <p><a href="productos.php">Volver al listado</a></p>

</body>
</html>
