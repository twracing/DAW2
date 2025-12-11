<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes</title>
</head>
<body>
    
<?php
// Matriz tridimensional con origen, destino y distancia en metros
$viajes = [
    ["origen" => "Madrid", "destino" => "Segovia", "distancia" => 90201],
    ["origen" => "Madrid", "destino" => "A Coruña", "distancia" => 596887],
    ["origen" => "Barcelona", "destino" => "Cádiz", "distancia" => 1152669],
    ["origen" => "Bilbao", "destino" => "Valencia", "distancia" => 622233],
    ["origen" => "Sevilla", "destino" => "Santander", "distancia" => 832067],
    ["origen" => "Oviedo", "destino" => "Badajoz", "distancia" => 682429],
];

// Mostrar la matriz en el navegador
echo "<h2>Listado de viajes</h2>";
echo "<table border='1' cellpadding='5'>";
echo "<tr><th>Origen</th><th>Destino</th><th>Distancia (km)</th></tr>";

$distancias = [];
$trayectoMasLargo = null;

foreach ($viajes as $trayecto) {
    // Convertir metros a kilómetros
    $km = $trayecto['distancia'] / 1000;
    echo "<tr>
            <td>{$trayecto['origen']}</td>
            <td>{$trayecto['destino']}</td>
            <td>" . number_format($km, 2) . "</td>
          </tr>";
    // Guardar las distancias en un array separado para cálculos los estadísticos
    $distancias[] = $trayecto['distancia'];
    // Determinar el trayecto más largo
    if (!$trayectoMasLargo || $trayecto['distancia'] > $trayectoMasLargo['distancia']) {
        $trayectoMasLargo = $trayecto;
    }
}

echo "</table>";

// Mostrar el trayecto más largo
echo "<h3>Trayecto más largo</h3>";
echo "<p>De <strong>{$trayectoMasLargo['origen']}</strong> a <strong>{$trayectoMasLargo['destino']}</strong> con una distancia de <strong>" . number_format($trayectoMasLargo['distancia'] / 1000, 2) . " km</strong>.</p>";
?>

</body>
</html>