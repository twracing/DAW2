<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 13</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 13</h2>
    <div class="resultado">
        <?php
        include 'funcion13.php';

        
        echo "Texto original: 'Hola mundo'<br>";
        echo "Reemplazar 'mundo' por 'PHP'<br>";
        echo "<br>";                
        
        echo "Resultado: ";
        echo reemplazarPalabra('Hola mundo', 'mundo', 'PHP');
        ?>
    </div>
</body>
</html>
