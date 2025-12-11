<?php
$bandas = [
    "U2" => [
        "vocalista" => ["nombre" => "Bono", "img" => "img/bono.jpg"],
        "musicos" => [
            ["nombre" => "The Edge", "instrumento" => "Guitarra", "img" => "img/edge.jpg"],
            ["nombre" => "Adam Clayton", "instrumento" => "Bajo", "img" => "img/clayton.jpg"],
            ["nombre" => "Larry Mullen Jr.", "instrumento" => "Batería", "img" => "img/mullen.jpg"]
        ]
    ],
    "Led Zeppelin" => [
        "vocalista" => ["nombre" => "Robert Plant", "img" => "img/plant.jpg"],
        "musicos" => [
            ["nombre" => "Jimmy Page", "instrumento" => "Guitarra", "img" => "img/page.jpg"],
            ["nombre" => "John Paul Jones", "instrumento" => "Bajo", "img" => "img/jones.jpg"],
            ["nombre" => "John Bonham", "instrumento" => "Batería", "img" => "img/bonham.jpg"]
        ]
    ],
    "Metallica" => [
        "vocalista" => ["nombre" => "James Hetfield", "img" => "img/hetfield.jpg"],
        "musicos" => [
            ["nombre" => "Lars Ulrich", "instrumento" => "Batería", "img" => "img/ulrich.jpg"],
            ["nombre" => "Kirk Hammett", "instrumento" => "Guitarra solista", "img" => "img/hammett.jpg"],
            ["nombre" => "Robert Trujillo", "instrumento" => "Bajo", "img" => "img/trujillo.jpg"]
        ]
    ]
    
];

$grupo = $_POST["grupo"] ?? "todos";
$tipo = $_POST["tipo"] ?? "vocalista";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
</head>
<body>

<h2>Ejercicio 2 - Bandas de Rock</h2>

<form method="post">
    <select name="grupo">
        <option value="todos">Todos</option>
        <?php foreach ($bandas as $nombre => $info): ?>
            <option value="<?= $nombre ?>" <?= $grupo === $nombre ? "selected" : "" ?>>
                <?= $nombre ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label><input type="radio" name="tipo" value="vocalista"
        <?= $tipo === "vocalista" ? "checked" : "" ?>> Vocalista</label>

    <label><input type="radio" name="tipo" value="musicos"
        <?= $tipo === "musicos" ? "checked" : "" ?>> Músicos</label>

    <button type="submit">Mostrar</button>
</form>

<hr>

<?php
$gruposAMostrar = $grupo === "todos" ? array_keys($bandas) : [$grupo];

foreach ($gruposAMostrar as $g):
?>
    <h3><?= $g ?></h3>

    <?php if ($tipo === "vocalista"): ?>
        <?php $v = $bandas[$g]["vocalista"]; ?>
        <p><b><?= $v["nombre"] ?></b></p>
        <img src="<?= $v["img"] ?>" width="150">

    <?php else: ?>
        <?php foreach ($bandas[$g]["musicos"] as $m): ?>
            <p><b><?= $m["nombre"] ?></b> - <?= $m["instrumento"] ?></p>
            <img src="<?= $m["img"] ?>" width="150"><br><br>
        <?php endforeach; ?>
    <?php endif; ?>

<?php endforeach; ?>

</body>
</html>
