<?php
// Recibir datos del formulario usando POST
$nombre = $_GET['nombre'];
$modulo = $_GET['modulo'];

// Mostrar los datos recibidos
echo "<h2>Datos recibidos por GET</h2>";
echo "Nombre del alumno: <strong>$nombre</strong><br>";
echo "Módulo seleccionado: <strong>$modulo</strong><br>";
?>
