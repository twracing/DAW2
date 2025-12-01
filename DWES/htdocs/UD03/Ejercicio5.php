<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>
<body>

    
<?php
// Asignar aleatoriamente "dentro" o "fuera"
$posicion = rand(0, 1) ? "dentro" : "fuera";

// Evaluar con match y guardar el resultado en una variable
$mensaje = match($posicion) {
    "dentro" => "La posición es: dentro",
    "fuera" => "La posición es: fuera",
    default => "Valor desconocido",
};

// Mostrar el mensaje
echo "<p>$mensaje</p>";
?>

    
</body>
</html>