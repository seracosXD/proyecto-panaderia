<?php
include "conexion.php";

$resultado = $conexion->query("
    SELECT pedidos.id, pedidos.cliente, productos.nombre AS producto,
           pedidos.cantidad, pedidos.fecha_entrega, pedidos.estado
    FROM pedidos
    JOIN productos ON productos.id = pedidos.producto_id
    ORDER BY pedidos.fecha_entrega ASC
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panadería Panes y Manjares - Pedidos</title>
</head>
<body>

    <h1>Panadería Panes y Manjares</h1>
    <h2>Pedidos por encargo</h2>

    <p><a href="pedido_form.php">Registrar nuevo pedido</a></p>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Cliente</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Fecha de entrega</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>

        <?php while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?= htmlspecialchars($fila['cliente']) ?></td>
            <td><?= htmlspecialchars($fila['producto']) ?></td>
            <td><?= $fila['cantidad'] ?></td>
            <td><?= $fila['fecha_entrega'] ?></td>
            <td><?= htmlspecialchars($fila['estado']) ?></td>
            <td>
                <a href="pedido_form.php?id=<?= $fila['id'] ?>">Editar</a>
                |
                <a href="pedido_eliminar.php?id=<?= $fila['id'] ?>"
                   onclick="return confirm('¿Eliminar este pedido?');">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

</body>
</html>
