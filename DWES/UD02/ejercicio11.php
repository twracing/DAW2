<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 11</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 11</h2>
    <div class="resultado">
        <?php
        include_once 'funcion11.php';
        echo "Cadena 1: 'cadena'<br>";
        echo "Cadena 2: 'cadena'<br>";


        echo "Resultado: ";
        echo sonIguales('cadena', 'cadena') ? "Son iguales" : "Son diferentes";

        echo "<br><br>";
        echo "Otro ejemplo:<br>";

        echo "<br>Cadena 1: 'cadena'<br>";
        echo "Cadena 2: 'string'<br>";
        echo "Resultado: ";
        echo sonIguales('cadena', 'string') ? "Son iguales" : "Son diferentes";
        ?>
    </div>
    

</body>
</html>
