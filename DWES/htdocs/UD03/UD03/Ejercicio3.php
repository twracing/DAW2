<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>
<body>
    
<?php
// Generar número aleatorio entre 1 y 5
$numero = rand(1, 5);

// Definir colores para cada número
$colores = [
    1 => 'red',
    2 => 'blue',
    3 => 'green',
    4 => 'orange',
    5 => 'purple'
];

// Usando if
if ($numero == 1) {
    echo "<p style='color:{$colores[1]}'>Uno</p>";
} elseif ($numero == 2) {
    echo "<p style='color:{$colores[2]}'>Dos</p>";
} elseif ($numero == 3) {
    echo "<p style='color:{$colores[3]}'>Tres</p>";
} elseif ($numero == 4) {
    echo "<p style='color:{$colores[4]}'>Cuatro</p>";
} else {
    echo "<p style='color:{$colores[5]}'>Cinco</p>";
}

// Usando switch
switch ($numero) {
    case 1:
        echo "<p style='color:{$colores[1]}'>Uno</p>";
        break;
    case 2:
        echo "<p style='color:{$colores[2]}'>Dos</p>";
        break;
    case 3:
        echo "<p style='color:{$colores[3]}'>Tres</p>";
        break;
    case 4:
        echo "<p style='color:{$colores[4]}'>Cuatro</p>";
        break;
    case 5:
        echo "<p style='color:{$colores[5]}'>Cinco</p>";
        break;
}

// Usando match (PHP 8+)
echo match($numero) {
    1 => "<p style='color:{$colores[1]}'>Uno</p>",
    2 => "<p style='color:{$colores[2]}'>Dos</p>",
    3 => "<p style='color:{$colores[3]}'>Tres</p>",
    4 => "<p style='color:{$colores[4]}'>Cuatro</p>",
    5 => "<p style='color:{$colores[5]}'>Cinco</p>",
};
?>
    

</body>
</html>