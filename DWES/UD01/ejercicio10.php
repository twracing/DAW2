<!DOCTYPE html>
<html>
<head>
    <title>Ejercicio 10</title>
    <style>
        body { font-family: Arial; background-color: #f0f0f0; padding: 20px; }
        .resultado { background: #fff; padding: 10px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>Ejercicio 10</h2>
    <div class="resultado">
        <?php
        include 'funcion10.php';
        echo "Cadena: 'Este es un texto con texto'<br>";
        echo "Palabra a buscar: 'texto'<br>";   

        echo "Resultado: ";
        echo ultimaPosicion('Este es un texto con texto', 'texto');
        ?>
    </div>
</body>
</html>
