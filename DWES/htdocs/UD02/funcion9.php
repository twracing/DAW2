<?php
function comienzaCon($cadena, $palabra) {
  
    return str_starts_with(strtolower($cadena), strtolower($palabra));
}
?>