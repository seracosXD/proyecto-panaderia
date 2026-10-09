<?php
include "conexion.php";

$producto_id = (int) $_GET['producto_id'];

$producto = $conexion->query("SELECT * FROM productos WHERE id = $producto_id")->fetch_assoc();

// Insumos que ya hacen parte de la receta de este producto
$detalle = $conexion->query("
    SELECT receta_detalle.id, insumos.nombre AS insumo, insumos.unidad_medida, receta_detalle.cantidad_necesaria
    FROM receta_detalle
    JOIN insumos ON insumos.id = receta_detalle.insumo_id
    WHERE receta_detalle.producto_id = $producto_id
");

// Insumos disponibles para agregar al select del formulario
$insumos_disponibles = $conexion->query("SELECT * FROM insumos ORDER BY nombre");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Receta de <?= htmlspecialchars($producto['nombre']) ?></title>
</head>
<body>

    <h1>Receta: <?= htmlspecialchars($producto['nombre']) ?></h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Insumo</th>
            <th>Cantidad necesaria</th>
            <th>Acciones</th>
        </tr>
        <?php while ($fila = $detalle->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($fila['insumo']) ?></td>
            <td><?= $fila['cantidad_necesaria'] ?> <?= htmlspecialchars($fila['unidad_medida']) ?></td>
            <td>
                <a href="receta_eliminar.php?id=<?= $fila['id'] ?>&producto_id=<?= $producto_id ?>"
                   onclick="return confirm('¿Quitar este insumo de la receta?');">Quitar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <h2>Agregar insumo a la receta</h2>
    <form action="receta_agregar.php" method="POST">
        <input type="hidden" name="producto_id" value="<?= $producto_id ?>">

        <label>Insumo:</label><br>
        <select name="insumo_id" required>
            <?php while ($insumo = $insumos_disponibles->fetch_assoc()): ?>
                <option value="<?= $insumo['id'] ?>">
                    <?= htmlspecialchars($insumo['nombre']) ?> (<?= htmlspecialchars($insumo['unidad_medida']) ?>)
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <label>Cantidad necesaria por unidad del producto:</label><br>
        <input type="number" step="0.01" name="cantidad_necesaria" required><br><br>

        <button type="submit">Agregar a la receta</button>
    </form>

    <p><a href="productos.php">Volver a productos</a></p>

</body>
</html>
