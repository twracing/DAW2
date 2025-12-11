<?php
/**
 * ejercicio5_Avion.php
 * Clase Avion que extiende ElementoVolador
 */
require_once __DIR__ . '/ejercicio5_ElementoVolador.php';

class Avion extends ElementoVolador {
    private $companiaAerea;
    private $fechaAlta;
    private $altitudMaxima;

    public function __construct($nombre, $numAlas, $numMotores, $companiaAerea, $fechaAlta, $altitudMaxima) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->companiaAerea = (string)$companiaAerea;
        $this->fechaAlta = (string)$fechaAlta;
        $this->altitudMaxima = intval($altitudMaxima);
    }

    public function getCompaniaAerea() { return $this->companiaAerea; }
    public function getFechaAlta() { return $this->fechaAlta; }
    public function getAltitudMaxima() { return $this->altitudMaxima; }

    // Método volar: comprueba altitud y velocidad >=150 y asciende de 100 en 100
    public function volar($altitudObjetivo) {
        $nombre = $this->getNombre();
        if ($altitudObjetivo < 0 || $altitudObjetivo > $this->altitudMaxima) {
            echo "Error: altitud objetivo inválida para $nombre. (0 <= altitud <= {$this->altitudMaxima})<br>";
            return false;
        }
        if ($this->getVelocidad() < 150) {
            echo "Error: la velocidad debe ser al menos 150 km/h para despegar ($nombre). Velocidad actual: " . $this->getVelocidad() . "<br>";
            return false;
        }
        // Ascenso de 100 en 100
        $actual = $this->getAltitud();
        echo "Iniciando ascenso de $nombre desde $actual m hasta $altitudObjetivo m...<br>";
        while ($actual < $altitudObjetivo) {
            $actual += 100;
            if ($actual > $altitudObjetivo) $actual = $altitudObjetivo;
            $this->setAltitud($actual);
            echo " $nombre altitud: " . $this->getAltitud() . " m<br>";
        }
        echo "$nombre ha alcanzado la altitud de " . $this->getAltitud() . " m<br>";
        return true;
    }

    public function mostrarInformacion() {
        $html = '<div class="avion">';
        $html .= '<strong>Nombre:</strong> ' . htmlspecialchars($this->getNombre()) . '<br>';
        $html .= '<strong>Compañía:</strong> ' . htmlspecialchars($this->companiaAerea) . '<br>';
        $html .= '<strong>Fecha alta:</strong> ' . htmlspecialchars($this->fechaAlta) . '<br>';
        $html .= '<strong>Altitud máxima:</strong> ' . $this->altitudMaxima . ' m<br>';
        $html .= '<strong>Altitud actual:</strong> ' . $this->getAltitud() . ' m<br>';
        $html .= '<strong>Velocidad:</strong> ' . $this->getVelocidad() . ' km/h<br>';
        $html .= '</div>';
        return $html;
    }
}

?>
