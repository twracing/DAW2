<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos Escolarizados</title>
</head>
<body>
    <?php
// Array bidimensional: [Comunidad Autónoma, Número de alumnos por cada 1000 habitantes]
$datosEscolarizacion = [
    ["Andalucía", 593.6],
    ["Aragón", 600.3],
    ["Asturias", 582.9],
    ["Baleares", 489.7],
    ["Canarias", 573.2],
    ["Cantabria", 551.5],
    ["Castilla y León", 645.3],
    ["Castilla la Mancha", 555.8],
    ["Cataluña", 568.3],
    ["Comunidad Valenciana", 561.1],
    ["Extremadura", 584.3],
    ["Galicia", 600.1],
    ["Madrid", 613.3],
    ["Murcia", 564.7],
    ["Navarra", 638.1],
    ["País Vasco", 637.5],
    ["La Rioja", 562.4],
    ["Ceuta", 539.7],
    ["Melilla", 569.8]
];

// Mostrar tabla en HTML
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Comunidad Autónoma</th><th>Alumnos por cada 1000 habitantes</th><th>% Escolarización</th></tr>";

foreach ($datosEscolarizacion as $dato) {
    $comunidad = $dato[0];
    $alumnosPorMil = $dato[1];
    $porcentaje = ($alumnosPorMil / 1000) * 100; // Cálculo del porcentaje
    echo "<tr>";
    echo "<td>$comunidad</td>";
    echo "<td>$alumnosPorMil</td>";
    //Number_format para formatear números con 2 decimales
    echo "<td>" . number_format($porcentaje, 2) . "%</td>";
    echo "</tr>";
}

echo "</table>";
?>
    
</body>
</html>


