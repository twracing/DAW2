<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 9</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 9</h2>
    <div class="resultado">
        <?php
        include 'funcion9.php';
       
        echo "Cadena: 'Hola mundo', Palabra: 'hola'<br>";


        echo "Resultado: ";
        echo comienzaCon('Hola mundo', 'hola') ? 'Sí coincide' : 'No coincide';
        ?>
    </div>
</body>
</html>
