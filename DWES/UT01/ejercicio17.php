<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 17</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 17</h2>
    <div class="resultado">
        <?php
        include 'funcion17.php';
        
        echo "Sumar enteros: 3, 4, 5<br>";
        echo "<br>";    
        
        echo "Resultado: ";
        echo sumaEnteros(3, 4, 5);
        ?>
    </div>
</body>
</html>
