<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $numeros = [1, 9, 3, 8, 5, 7];
            foreach ($numeros as $numero) {
                echo $numero . " * 2 = " . ($numero * 2) . "<br>";
            }
?>
</body>
</html>