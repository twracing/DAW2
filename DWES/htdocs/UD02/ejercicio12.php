<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 12</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 12</h2>
    <div class="resultado">
        <?php
        include 'funcion12.php';

        echo "Cadena: 'Ejemplo de cadena'<br>";
        echo "Posición inicial: 8<br>";
        echo "Longitud: 6<br>"; 
        echo "<br>";
        echo "Resultado: ";
        echo extraerFragmento('Ejemplo de cadena', 8, 6);
        ?>
    </div>
</body>
</html>
