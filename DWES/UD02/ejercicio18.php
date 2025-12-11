<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 18</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 18</h2>
    <div class="resultado">
        <?php
        include 'funcion18.php';

        echo "Calcular área de triángulo con base 10 y altura 5<br>";
        echo "<br>";    
        echo "La formula del area es (base * altura) / 2 <br>";

        echo "Resultado: ";
        echo areaTriangulo(10, 5);
        ?>
    </div>
</body>
</html>
