<?php
/**
 * Ejercicio5_index.php
 * Programa principal que prueba la jerarquía de ElementoVolador
 */
require_once __DIR__ . '/ejercicio5_Avion.php';
require_once __DIR__ . '/ejercicio5_Helicoptero.php';
require_once __DIR__ . '/ejercicio5_Aeropuerto.php';

// 1) Crear aeropuerto
$aero = new Aeropuerto();

// 2) Crear 3 aviones
$av1 = new Avion('A-100', 2, 2, 'Iberia', '2020-01-01', 10000);
$av2 = new Avion('A-200', 2, 4, 'Ryanair', '2019-06-12', 9000);
$av3 = new Avion('A-300', 2, 2, 'Iberia', '2021-03-22', 12000);

// 3) Crear 3 helicópteros
$h1 = new Helicoptero('H-1', 0, 1, 'EmpresaX', 2);
$h2 = new Helicoptero('H-2', 0, 2, 'EmpresaY', 4);
$h3 = new Helicoptero('H-3', 0, 1, 'EmpresaZ', 1);

// 4) Insertar en el aeropuerto
$aero->insertar($av1);
$aero->insertar($av2);
$aero->insertar($av3);
$aero->insertar($h1);
$aero->insertar($h2);
$aero->insertar($h3);

// 5) Probar buscar: existente y no existente
echo '<h3>Buscar existente (A-200)</h3>';
$aero->buscar('A-200');

echo '<h3>Buscar no existente (X-999)</h3>';
$aero->buscar('X-999');

// 6) Probar listarCompania: existente e inexistente
echo '<h3>Listar compañía existente (Iberia)</h3>';
$aero->listarCompania('Iberia');

echo '<h3>Listar compañía no existente (NoAir)</h3>';
$aero->listarCompania('NoAir');

// 7) Probar rotores: existente y no existente
echo '<h3>Listar helicópteros con 1 rotor</h3>';
$aero->rotores(1);

echo '<h3>Listar helicópteros con 3 rotores (ninguno)</h3>';
$aero->rotores(3);

// 8) Despegue de un avión
echo '<h3>Despegue avión A-100 a 2000 m con velocidad 160</h3>';
$aero->despegar('A-100', 2000, 160);
echo '¿Está volando?: ' . ($av1->volando() ? 'Sí' : 'No') . '<br>';
echo $av1->mostrarInformacion();

// 9) Despegue helicóptero H-2
echo '<h3>Despegue helicóptero H-2 a 80 m con velocidad 60</h3>';
$aero->despegar('H-2', 80, 60);
echo '¿Está volando?: ' . ($h2->volando() ? 'Sí' : 'No') . '<br>';
echo $h2->mostrarInformacion();

// 10) Intentar despegue con condiciones no permitidas (velocidad insuficiente)
echo '<h3>Intento despegue A-200 a 1000 m con velocidad 140 (debiera fallar)</h3>';
$aero->despegar('A-200', 1000, 140);

?>
