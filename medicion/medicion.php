<?php
// Mide cuánto tarda en consultarse el listado de insumos.
// Crea hasta 50 insumos de prueba ("Prueba N") si no existen, y mide el tiempo.
// Cuando termines, borra los datos de prueba con: DELETE FROM insumos WHERE nombre LIKE 'Prueba %';
include "../registro_insumos/conexion.php";

$existentes = $conexion->query("SELECT COUNT(*) AS n FROM insumos WHERE nombre LIKE 'Prueba %'")->fetch_assoc()['n'];
for ($i = $existentes + 1; $i <= 50; $i++) {
    $conexion->query("INSERT INTO insumos (nombre, unidad_medida, cantidad_disponible) VALUES ('Prueba $i', 'kg', $i)");
}

$tiempos = [];
for ($k = 0; $k < 10; $k++) {
    $inicio = microtime(true);
    $resultado = $conexion->query("SELECT * FROM insumos ORDER BY id DESC");
    while ($fila = $resultado->fetch_assoc()) { /* recorre todas las filas */ }
    $tiempos[] = (microtime(true) - $inicio) * 1000;
}

echo "<h1>Medición del listado de insumos</h1>";
echo "<p>Filas en la tabla: " . $conexion->query("SELECT COUNT(*) AS n FROM insumos")->fetch_assoc()['n'] . "</p>";
echo "<p>10 mediciones (ms): " . implode(" | ", array_map(fn($t) => round($t, 2), $tiempos)) . "</p>";
echo "<p>Promedio: " . round(array_sum($tiempos) / count($tiempos), 2) . " ms</p>";
