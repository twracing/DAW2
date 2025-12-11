<?php
require_once __DIR__ . '/Coche.php';


$c1 = new Coche('1234-ABC', 50);
echo $c1->mostrar();
echo '<br>';

$c1->acelera(30); // ahora 80
echo 'Después de acelerar 30: ' . $c1->mostrar();
echo '<br>';

$c1->acelera(50); // no debe superar 120
echo 'Después de acelerar 50: ' . $c1->mostrar();
echo '<br>';

$c1->frena(100); // debe bajar a 20
echo 'Después de frenar 100: ' . $c1->mostrar();
echo '<br>';

// Otro coche
$c2 = new Coche('9999-ZZZ');
echo 'Coche 2: ' . $c2->mostrar();
echo '<br>';

// Mostrar usando echo del objeto (gracias a __toString)
echo $c2->__toString(); 
echo '<br>';

?>
