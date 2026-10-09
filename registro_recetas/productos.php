<?php
include "conexion.php";

$resultado = $conexion->query("SELECT * FROM productos ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panadería Panes y Manjares - Productos</title>
</head>
<body>

    <h1>Panadería Panes y Manjares</h1>
    <h2>Productos</h2>

    <p><a href="producto_form.php">Agregar nuevo producto</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Producto</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($fila['nombre']) ?></td>
            <td>
                <a href="receta.php?producto_id=<?= $fila['id'] ?>">Ver / editar receta</a>
                |
                <a href="producto_form.php?id=<?= $fila['id'] ?>">Renombrar</a>
                |
                <a href="producto_eliminar.php?id=<?= $fila['id'] ?>"
                   onclick="return confirm('¿Eliminar este producto y su receta?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
