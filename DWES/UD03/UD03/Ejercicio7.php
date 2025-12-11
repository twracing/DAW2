<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$productos = [
    "Manzana" => 5,     // €/kg
    "Plátano" => 3,
    "Naranja" => 4,
    "Kiwi" => 6
];

// Cantidades compradas en kg
$compra = [
    "Manzana" => 2,
    "Plátano" => 1.5,
    "Naranja" => 5
];

$total = 0;

foreach ($compra as $fruta => $cantidad) {
    if (isset($productos[$fruta])) {
        $precio_unitario = $productos[$fruta];
        $subtotal = $precio_unitario * $cantidad;
        echo "$fruta: $cantidad kg x $precio_unitario €/kg = $subtotal €<br>";
        $total += $subtotal;
    } else {
        echo "$fruta no está disponible en el catálogo.<br>";
    }
}

echo "<br><strong>Total de la compra: $total €</strong>";
?>

</body>
</html>