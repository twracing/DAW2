<?php
function analizarCadena($cadena) {
    return [
        'longitud' => strlen($cadena),
        'capitalizada' => ucwords($cadena)
    ];
}
?>