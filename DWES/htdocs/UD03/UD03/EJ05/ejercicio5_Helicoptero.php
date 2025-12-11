<?php
/**
 * ejercicio5_Helicoptero.php
 * Clase Helicoptero que extiende ElementoVolador
 */
require_once __DIR__ . '/ejercicio5_ElementoVolador.php';

class Helicoptero extends ElementoVolador {
    private $propietario;
    private $nRotor;

    public function __construct($nombre, $numAlas, $numMotores, $propietario, $nRotor) {
        parent::__construct($nombre, $numAlas, $numMotores);
        $this->propietario = (string)$propietario;
        $this->nRotor = intval($nRotor);
    }

    public function getPropietario() { return $this->propietario; }
    public function getNRotor() { return $this->nRotor; }

    // Volar: la altitud no podrá ser superior a 100 por cada rotor
    // Si cumple la condición, se eleva de 20 en 20 metros
    public function volar($altitudObjetivo) {
        $nombre = $this->getNombre();
        $maximo = $this->nRotor * 100;
        if ($altitudObjetivo < 0 || $altitudObjetivo > $maximo) {
            echo "Error: altitud objetivo inválida para $nombre. (0 <= altitud <= $maximo)\n";
            return false;
        }
        // Elevar de 20 en 20
        $actual = $this->getAltitud();
        echo "Iniciando ascenso de $nombre desde $actual m hasta $altitudObjetivo m...<br>";
        while ($actual < $altitudObjetivo) {
            $actual += 20;
            if ($actual > $altitudObjetivo) $actual = $altitudObjetivo;
            $this->setAltitud($actual);
            echo " $nombre altitud: " . $this->getAltitud() . " m<br>";
        }
        echo "$nombre ha alcanzado la altitud de " . $this->getAltitud() . " m<br>";
        return true;
    }

    public function mostrarInformacion() {
        $html = '<div class="helicoptero">';
        $html .= '<strong>Nombre:</strong> ' . htmlspecialchars($this->getNombre()) . '<br>';
        $html .= '<strong>Propietario:</strong> ' . htmlspecialchars($this->propietario) . '<br>';
        $html .= '<strong>Nº rotores:</strong> ' . $this->nRotor . '<br>';
        $html .= '<strong>Altitud actual:</strong> ' . $this->getAltitud() . ' m<br>';
        $html .= '<strong>Velocidad:</strong> ' . $this->getVelocidad() . ' km/h<br>';
        $html .= '</div>';
        return $html;
    }
}

?>
