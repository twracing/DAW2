<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monedas</title>
</head>
<body>
    
<?php
// Matriz tridimensional con país, moneda y tipo de cambio
$monedas = [
    ["país" => "EEUU", "moneda" => "Dollar", "cambio" => 1.1741],
    ["país" => "UK", "moneda" => "Libra esterlina", "cambio" => 0.8734],
    ["país" => "Japón", "moneda" => "Yenes", "cambio" => 173.76],
    ["país" => "China", "moneda" => "Yuanes", "cambio" => 8.3591],
    ["país" => "Argentina", "moneda" => "Pesos Argentinos", "cambio" => 1621.36],
    ["país" => "Australia", "moneda" => "Dollar AUS", "cambio" => 1.776],
];

// Mostrar la matriz en el navegador
echo "<h2>Conversión de monedas a euros</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>País</th><th>Moneda</th><th>Tipo de cambio</th></tr>";

$cambios = [];

foreach ($monedas as $item) {
    echo "<tr>
            <td>{$item['país']}</td>
            <td>{$item['moneda']}</td>
            <td>{$item['cambio']}</td>
          </tr>";
    // Guardar los tipos de cambio en un array separado para cálculos estadísticos
    $cambios[] = $item['cambio'];
}

echo "</table>";

// Cálculos estadísticos
// Tipo medio, mínimo y máximo  de cambio
//array_sum para sumar los valores del array
//count para contar el número de elementos en el array
$media = array_sum($cambios) / count($cambios);
$min = min($cambios);
$max = max($cambios);

// Mostrar resultados
echo "<h3>Estadísticas de tipo de cambio</h3>";
//Number_format para formatear números con 4 decimales
echo "<p><strong>Tipo medio:</strong> " . number_format($media, 4) . "</p>";
echo "<p><strong>Tipo más bajo:</strong> " . number_format($min, 4) . "</p>";
echo "<p><strong>Tipo más alto:</strong> " . number_format($max, 4) . "</p>";
?>

</body>
</html>