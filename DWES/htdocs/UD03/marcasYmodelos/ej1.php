<?php
// ----- DATOS -----
$coches = [
    "BMW" => ["Serie 1", "Serie 3", "X1", "X5"],
    "Audi" => ["A1", "A3", "Q3", "Q7"],
    "Mercedes" => ["Clase A", "Clase C", "GLA", "GLE"]
];

$marcaSeleccionada = $_POST["marca"] ?? "";
$accion = $_POST["accion"] ?? "";
$modelosModificados = [];

if ($accion === "actualizar" && !empty($marcaSeleccionada)) {
    // Comprobar qué modelos cambiaron
    $original = $coches[$marcaSeleccionada];
    $nuevos = $_POST["modelo"];

    foreach ($original as $i => $valorOriginal) {
        if ($valorOriginal !== $nuevos[$i]) {
            $modelosModificados[] = $valorOriginal . " → " . $nuevos[$i];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1 - DWES</title>
</head>
<body>

<h2>Ejercicio 1 - Marcas y modelos</h2>

<form method="post">
    <select name="marca">
        <?php foreach ($coches as $marca => $modelos): ?>
            <option value="<?= $marca ?>" 
                <?= $marca === $marcaSeleccionada ? "selected" : "" ?>>
                <?= $marca ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit" name="accion" value="mostrar">Mostrar</button>
</form>

<?php if ($accion === "mostrar" || $accion === "actualizar"): ?>

    <h3>Modelos de <?= $marcaSeleccionada ?></h3>
    <form method="post">
        <input type="hidden" name="marca" value="<?= $marcaSeleccionada ?>">

        <table border="1" cellpadding="5">
            <tr><th>Modelo</th></tr>

            <?php foreach ($coches[$marcaSeleccionada] as $i => $modelo): ?>
                <tr>
                    <td>
                        <input type="text" name="modelo[]" value="<?= $modelo ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <br>
        <button type="submit" name="accion" value="actualizar">Actualizar</button>
    </form>

<?php endif; ?>

<?php if (!empty($modelosModificados)): ?>
    <h3>Modelos modificados:</h3>
    <ul>
        <?php foreach ($modelosModificados as $m): ?>
            <li><?= $m ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</body>
</html>
