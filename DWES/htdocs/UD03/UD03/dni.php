<?php
// Array con las letras del DNI según la regla oficial
// El índice del array (0..22) corresponde al resto de dividir el DNI por 23
$letras = array('T','R','W','A','G','M','Y','F','P','D','X','B','N','J','Z','S','Q','V','H','L','C','K','E');

// DNI almacenado (cadena o número). Cambia este valor para probar otros casos.
$dni = '12345678';

// Normalizar y calcular la letra del DNI
// 1) Nos aseguramos de trabajar con una cadena
$solo = '';
$dni = (string)$dni; // convertir a cadena en caso de que venga como entero

// 2) Extraer solo los caracteres que son dígitos (0-9)
//    Usamos str_split para obtener un array de caracteres y luego foreach
//    Comprueba cada carácter y si está entre '0' y '9' lo añade a $solo.
$chars = str_split($dni);
foreach ($chars as $c) {
	// Comparación sencilla: si el carácter está entre '0' y '9' lo guardamos
	if ($c >= '0' && $c <= '9') {
		$solo .= $c; // concatenar dígito válido
	}
}

// 3) Si después de extraer no hay dígitos, el DNI no es válido
if ($solo === '') {
	echo "DNI no válido\n";
	exit(0);
}

// 4) Convertir la cadena de dígitos a número (int) y calcular el resto
$numero = intval($solo); // intval convierte la cadena a entero
$resto = $numero % 23;    // resto de la división por 23

// 5) Obtener la letra correspondiente usando el array $letras
$letra = $letras[$resto];

// 6) Mostrar el NIF (DNI + letra)
echo $solo . $letra . "\n";
