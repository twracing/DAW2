<?php
/**
 * Clase Círculo
 * - Atributo privado: radio
 * - Constructor para inicializar el radio
 * - Métodos setRadio/getRadio
 * - Métodos mágicos __set y __get para acceso por propiedad
 */
class Circulo {
    // Atributo privado que guarda el radio
    private $radio = 0;

    /**
     * Constructor: permite crear el objeto con un radio inicial
     * @param float|int $radio
     */
    public function __construct($radio = 0) {
        // Usamos el método público para aplicar validaciones
        $this->setRadio($radio);
    }

    /**
     * Método set tradicional (documentado)
     * Establece el valor del radio.
     * Si se pasa un valor negativo, se convertirá a 0.
     * @param float|int $r
     * @return void
     */
    public function setRadio($r) {
        // Validación sencilla: forzar a número y evitar negativos
        $r = floatval($r);
        if ($r < 0) $r = 0;
        $this->radio = $r;
    }

    /**
     * Método get tradicional (documentado)
     * Devuelve el radio actual.
     * @return float
     */
    public function getRadio() {
        return $this->radio;
    }

    /**
     * Método mágico __set: permite asignar propiedades "virtuales"
     * Si se intenta asignar a 'radio' redirigimos a setRadio.
     */
    public function __set($name, $value) {
        if ($name === 'radio') {
            $this->setRadio($value);
        } else {
            // Para simplicidad, ignoramos otras propiedades
        }
    }

    /**
     * Método mágico __get: permite leer propiedades "virtuales"
     */
    public function __get($name) {
        if ($name === 'radio') {
            return $this->getRadio();
        }
        return null;
    }

    /**
     * Método mágico toString: devuelve una representación del objeto
     * Útil para depuración.
     */
    public function __toString() {
        return "Círculo(radio=" . $this->radio . ")";
    }
}

?>
