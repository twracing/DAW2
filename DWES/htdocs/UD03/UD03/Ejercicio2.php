<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
     <?php
  //Mostramos los números de los días del 1 a la fecha actual;
  $dia = date("d");
  $inicio = 1;
  while ($inicio <= $dia) {
    echo $inicio . "<br>";
    $inicio++;
  }
  ?>
</body>
</html>