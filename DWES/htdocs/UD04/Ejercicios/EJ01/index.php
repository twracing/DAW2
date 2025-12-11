

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
    <title>EQUIPOS NBA</title>
</head>
<body>
    <h1>EQUIPOS NBA</h1>

  <?php
require_once "funcionesBD.php";

$equipos = getEquipos();


foreach ($equipos as $e) {
    echo "🏀 " . $e["nombre"] . "<br>";
}
?>  

</body>
</html>