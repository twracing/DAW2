<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 16</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 16</h2>
    <div class="resultado">
        <?php
        include 'funcion16.php';
        
        echo "Texto original: 'hola mundo'<br>";
        echo "Analizar cadena: longitud y versión capitalizada<br>";
        echo "<br>";
        
        echo "Resultado: ";
        $res = analizarCadena('hola mundo'); echo 'Longitud: ' . $res['longitud'] . ', Capitalizada: ' . $res['capitalizada'];
        ?>
    </div>
</body>
</html>
