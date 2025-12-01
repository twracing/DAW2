<?php

/* 1) Datos: array de películas
   - $peliculas es un array asociativo donde la clave es el título de la película
   - y el valor es otro array con 'año' y 'sinopsis'.
*/
$peliculas = [
    "El espíritu de la colmena" => [
        "año" => 1973, // año de estreno
        "sinopsis" => "Una niña en la posguerra española queda fascinada por la película 'Frankenstein' y vive entre realidad y fantasía." // breve descripción
    ],
    "Volver" => [
        "año" => 2006, // año de estreno
        "sinopsis" => "Drama de Pedro Almodóvar sobre la familia, los secretos y la supervivencia de varias mujeres en La Mancha." // descripción
    ],
    "Tristana" => [
        "año" => 1970,
        "sinopsis" => "Relación compleja entre una joven huérfana y su tutor; retrato de poder y dependencia."
    ],
    "La vaquilla" => [
        "año" => 1985,
        "sinopsis" => "Comedia satírica sobre la Guerra Civil española: un grupo intenta robar una vaca utilizada en una fiesta franquista."
    ],
    "Los otros" => [
        "año" => 2001,
        "sinopsis" => "Thriller gótico sobre una mujer y sus hijos fotosensibles que viven en una mansión aislada con secretos inquietantes."
    ],
    "El laberinto del fauno" => [
        "año" => 2006,
        "sinopsis" => "Fábula oscura ambientada en la posguerra: una niña encuentra un mundo fantástico mientras su madre sufre con la brutalidad del régimen."
    ],
    "Mar adentro" => [
        "año" => 2004,
        "sinopsis" => "Historia real de Ramón Sampedro, un hombre tetrapléjico que luchó por su derecho a morir dignamente."
    ],
    "Ocho apellidos vascos" => [
        "año" => 2014,
        "sinopsis" => "Comedia romántica sobre los choques culturales entre un sevillano y una joven vasca."
    ],
    "La lengua de las mariposas" => [
        "año" => 1999,
        "sinopsis" => "Relato tierno y amargo sobre la amistad entre un niño y su maestro en la víspera de la Guerra Civil."
    ],
    "Tesis" => [
        "año" => 1996,
        "sinopsis" => "Suspense universitario sobre una estudiante que investiga la morbosa fascinación por las imágenes violentas."
    ],
    "Celda 211" => [
        "año" => 2009,
        "sinopsis" => "Un guardia de prisiones se ve atrapado en un motín y debe hacerse pasar por reo para sobrevivir."
    ],
    "La piel que habito" => [
        "año" => 2011,
        "sinopsis" => "Thriller psicológico de Pedro Almodóvar sobre venganza y ética científica."
    ],
]; // Fin del array $peliculas

// --------------------------
// PROCESAR BÚSQUEDA
// --------------------------
$busqueda = isset($_GET['titulo']) ? trim($_GET['titulo']) : "";
$resultados = [];

if ($busqueda !== "") {
    foreach ($peliculas as $titulo => $info) {
        if (stripos($titulo, $busqueda) !== false) {
            $resultados[$titulo] = $info;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscador de películas</title>
</head>
<body>

<h2>Buscador de películas por título</h2>

<form method="get" action="">
    <label>Buscar por título:</label><br>
    <input type="text" name="titulo" value="<?= htmlspecialchars($busqueda) ?>" size="40"
           placeholder="Ej: Volver, Mar adentro, Tesis">
    <input type="submit" value="Buscar">
    <?php if ($busqueda): ?>
        <a href="buscador2.php">Limpiar</a>
    <?php endif; ?>
</form>

<p>Introduce un título (o parte de él) para buscar.</p>

<hr>

<?php
// --------------------------
// MOSTRAR RESULTADOS
// --------------------------
if ($busqueda !== "") {
    echo "<p><strong>" . count($resultados) . "</strong> resultado(s) para \"<em>$busqueda</em>\".</p>";

    foreach ($resultados as $titulo => $info) {
        echo "<h3>$titulo <small>(" . $info['año'] . ")</small></h3>";
        echo "<p>" . $info['sinopsis'] . "</p><br>";
    }

    if (count($resultados) === 0) {
        echo "<p>No se encontraron películas con ese título.</p>";
    }
}

?>

</body>
</html>