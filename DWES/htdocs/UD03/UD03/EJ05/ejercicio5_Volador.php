<?php
/**
 * ejercicio5_Volador.php
 * Interfaz Volador: define el contrato acelerar(
 */
interface Volador {
    /**
     * Acelerar el aparato a la velocidad indicada (km/h)
     * @param float|int $velocidad
     */
    public function acelerar($velocidad);
}

?>
