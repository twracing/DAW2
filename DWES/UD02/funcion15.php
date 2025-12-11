<?php
function capitalizarSiLarga($cadena) {
    return strlen($cadena) > 15 ? ucfirst($cadena) : $cadena;
}
?>