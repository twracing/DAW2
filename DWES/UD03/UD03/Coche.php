<?php
/**
 * Clase Coche
 * - Atributos privados: matricula, velocidad
 * - Constructor: matricula y velocidad (por defecto 0)
 * - Métodos: acelera, frena, mostrar
 * - Control de límites: velocidad entre 0 y 120
 */
class Coche {
    private $matricula;
    private $velocidad;

    /**
     * Constructor
     * @param string $matricula
     * @param int|float $velocidad
     */
    public function __construct($matricula, $velocidad = 0) {
        $this->matricula = (string)$matricula;
        $this->velocidad = $this->limitarVelocidad($velocidad);
    }

    // Método privado para limitar la velocidad entre 0 y 120
    private function limitarVelocidad($v) {
        $v = intval($v);
        if ($v < 0) return 0;
        if ($v > 120) return 120;
        return $v;
    }

    /**
     * Acelera: incrementa la velocidad en $inc (no supera 120)
     * @param int|float $inc
     */
    public function acelera($inc) {
        $this->velocidad = $this->limitarVelocidad($this->velocidad + intval($inc));
    }

    /**
     * Frena: disminuye la velocidad en $dec (no baja de 0)
     * @param int|float $dec
     */
    public function frena($dec) {
        $this->velocidad = $this->limitarVelocidad($this->velocidad - intval($dec));
    }

    /**
     * Mostrar matrícula y velocidad (string)
     * @return string
     */
    public function mostrar() {
        return sprintf('Matrícula: %s, Velocidad: %d km/h', $this->matricula, $this->velocidad);
    }

    // __toString para facilitar echo del objeto
    public function __toString() {
        return $this->mostrar();
    }
}

?>
