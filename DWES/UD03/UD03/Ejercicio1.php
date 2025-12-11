<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
   
    <?php
    echo "Tabla del 2 con el for";
  echo "<br>";
  for ($f = 2; $f <= 20; $f = $f + 2) {
    echo $f;
    echo "-";
  }
  echo "<br>";
  echo "Tabla del 2 con el while";
  echo "<br>";
  $f = 2;
  while ($f <= 20) {
    echo $f;
    echo "-";
    $f = $f + 2;
  }
  echo "<br>";
  echo "Tabla del 2 con el do/while";
  echo "<br>";
  $f = 2;
  do {
    echo $f;
    echo "-";
    $f = $f + 2;
  } while ($f <= 20);

  ?>

</body>
</html>