<?php
include "conexion.php";

// Traer todos los insumos registrados, del más reciente al más antiguo
$resultado = $conexion->query("SELECT * FROM insumos ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panadería Panes y Manjares - Registro de insumos</title>
</head>
<body>

    <h1>Panadería Panes y Manjares</h1>
    <h2>Insumos registrados</h2>

    <p><a href="insumo_form.php">Agregar nuevo insumo</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nombre</th>
            <th>Unidad</th>
            <th>Cantidad disponible</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($fila['nombre']) ?></td>
            <td><?= htmlspecialchars($fila['unidad_medida']) ?></td>
            <td><?= $fila['cantidad_disponible'] ?></td>
            <td>
                <a href="insumo_form.php?id=<?= $fila['id'] ?>">Editar</a>
                |
                <a href="insumo_eliminar.php?id=<?= $fila['id'] ?>"
                   onclick="return confirm('¿Eliminar este insumo?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
