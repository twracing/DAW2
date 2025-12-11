<?php
require_once __DIR__ . '/Monedero.php';

echo "Pruebas de Monedero";
echo '<br>';

// Mostrar número inicial de monederos
echo "Monederos existentes: " . Monedero::getNumeroMonederos();
echo '<br>';
// Crear dos monederos
$m1 = new Monedero(50);
$m2 = new Monedero(10);
echo "Tras crear m1 y m2 -> Monederos: " . Monedero::getNumeroMonederos();
echo '<br>';

// Operaciones
echo "m1 consultar: " . $m1->consultar();
echo '<br>';
$m1->meter(25);
echo "m1 tras meter 25: " . $m1->consultar();
echo '<br>';

// Intentar sacar más de lo disponible
$ok = $m2->sacar(20);
echo "Intentar sacar 20 de m2 (10 disponible): " . ($ok ? 'ok' : 'falló');
echo '<br>';
// Sacar una cantidad válida
$ok = $m2->sacar(5);
echo "Sacar 5 de m2: " . ($ok ? 'ok' : 'falló') . "; ahora m2: " . $m2->consultar();
echo '<br>';
// Mostrar número de monederos antes de destruir
echo "Monederos antes de unset: " . Monedero::getNumeroMonederos();
echo '<br>';
// Destruir m1
unset($m1);
echo "Tras unset(m1) -> Monederos: " . Monedero::getNumeroMonederos();
echo '<br>';
?>
