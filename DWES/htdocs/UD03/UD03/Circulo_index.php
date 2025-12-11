<?php
require_once __DIR__ . '/Circulo.php';

echo "Pruebas de la clase Círculo\n\n";
echo "<br>";

// Crear con constructor
$c1 = new Circulo(5);
//PHP_EOL es una constante que representa el salto de línea adecuado según el sistema
echo "Objeto c1 (constructor 5): " . $c1;
echo "<br>";
echo "getRadio(): " . $c1->getRadio();
echo "<br>";

// Usar setRadio tradicional
$c1->setRadio(10);
echo "Después setRadio(10): " . $c1->getRadio();
echo "<br>";

// Usar métodos mágicos
$c2 = new Circulo();
$c2->radio = 3.5; // usa __set
echo "Objeto c2 (mágico): " . $c2;
echo "<br>";
echo "c2->radio (mágico __get): " . $c2->radio;
echo "<br>";

// Intentar asignar un negativo (se convertirá a 0)
$c2->radio = -7;
echo "Después asignar -7: " . $c2->radio;
echo "<br>";

// Mostrar en HTML si se accede desde navegador
if (php_sapi_name() !== 'cli') {
    echo '<h2>Pruebas de la clase Círculo</h2>';
    echo '<pre>' . htmlspecialchars("c1: " . $c1 . "\ngetRadio c1: " . $c1->getRadio() . "\n\n") . '</pre>';
}

?>
