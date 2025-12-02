<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 14</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 14</h2>
    <div class="resultado">
        <?php
        include 'funcion14.php';
        
        echo "Texto original: 'Hola Mundo'<br>";
        echo "Convertir a mayúsculas y minúsculas<br>";
        echo "<br>";
        echo "Resultado: ";
        $res = mayusMinus('Hola Mundo'); echo 'Mayúsculas: ' . $res['mayus'] . ', Minúsculas: ' . $res['minus'];
        ?>
    </div>
</body>
</html>
