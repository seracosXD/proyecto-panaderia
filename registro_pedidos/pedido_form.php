<?php
include "conexion.php";

$pedido = ["id" => "", "cliente" => "", "producto_id" => "", "cantidad" => "", "fecha_entrega" => "", "estado" => "pendiente"];

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $resultado = $conexion->query("SELECT * FROM pedidos WHERE id = $id");
    if ($resultado->num_rows > 0) {
        $pedido = $resultado->fetch_assoc();
    }
}

$productos = $conexion->query("SELECT * FROM productos ORDER BY nombre");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedido</title>
</head>
<body>

    <h1><?= $pedido['id'] ? "Editar pedido" : "Registrar pedido" ?></h1>

    <form action="pedido_guardar.php" method="POST">
        <input type="hidden" name="id" value="<?= $pedido['id'] ?>">

        <label>Cliente:</label><br>
        <input type="text" name="cliente" value="<?= htmlspecialchars($pedido['cliente']) ?>" required><br><br>

        <label>Producto:</label><br>
        <select name="producto_id" required>
            <?php while ($p = $productos->fetch_assoc()): ?>
                <option value="<?= $p['id'] ?>" <?= $p['id'] == $pedido['producto_id'] ? "selected" : "" ?>>
                    <?= htmlspecialchars($p['nombre']) ?>
                </option>
            <?php endwhile; ?>
        </select><br><br>

        <label>Cantidad:</label><br>
        <input type="number" name="cantidad" value="<?= $pedido['cantidad'] ?>" required><br><br>

        <label>Fecha de entrega:</label><br>
        <input type="date" name="fecha_entrega" value="<?= $pedido['fecha_entrega'] ?>" required><br><br>

        <label>Estado:</label><br>
        <select name="estado">
            <option value="pendiente" <?= $pedido['estado'] == "pendiente" ? "selected" : "" ?>>Pendiente</option>
            <option value="confirmado" <?= $pedido['estado'] == "confirmado" ? "selected" : "" ?>>Confirmado</option>
            <option value="entregado" <?= $pedido['estado'] == "entregado" ? "selected" : "" ?>>Entregado</option>
        </select><br><br>

        <button type="submit">Guardar</button>
    </form>

    <p><a href="pedidos.php">Volver al listado</a></p>

</body>
</html>
