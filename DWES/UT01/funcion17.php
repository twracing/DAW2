<?php
declare(strict_types=1);
// Ejercicio 17: Crear una función que reciba tres números enteros y devuelva
function sumaEnteros($a, $b, $c) {
    if (is_int($a) && is_int($b) && is_int($c)) {
        return $a + $b + $c;
    }
    return "Error: Solo se permiten enteros.";
}
?>