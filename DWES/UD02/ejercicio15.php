<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 15</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 15</h2>
    <div class="resultado">
        <?php
        include 'funcion15.php';
        echo "Texto original: 'esta es una cadena muy larga'<br>";
        echo "Capitalizar si la cadena es mayor de 10 caracteres<br>";
        echo "<br>";
        echo "Resultado: ";
        echo capitalizarSiLarga('esta es una cadena muy larga');
        ?>
    </div>
</body>
</html>
