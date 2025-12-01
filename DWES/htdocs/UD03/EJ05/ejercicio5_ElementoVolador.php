<?php
/**
 * ejercicio5_ElementoVolador.php
 * Clase abstracta que implementa la interfaz Volador
 */
require_once __DIR__ . '/ejercicio5_Volador.php';

abstract class ElementoVolador implements Volador {
    // Atributos privados
    private $nombre;
    private $numAlas;
    private $numMotores;
    private $altitud; // metros
    private $velocidad; // km/h

    // Constructor: inicializa nombre, numAlas, numMotores. Altitud y velocidad a 0
    public function __construct($nombre, $numAlas, $numMotores) {
        $this->nombre = (string)$nombre;
        $this->numAlas = intval($numAlas);
        $this->numMotores = intval($numMotores);
        $this->altitud = 0;
        $this->velocidad = 0;
    }

    // Getters y setters necesarios (sólo los que tienen sentido)
    public function getNombre() { return $this->nombre; }
    public function getNumAlas() { return $this->numAlas; }
    public function getNumMotores() { return $this->numMotores; }
    public function getAltitud() { return $this->altitud; }
    public function getVelocidad() { return $this->velocidad; }

    protected function setAltitud($a) { $this->altitud = intval($a); }
    protected function setVelocidad($v) { $this->velocidad = floatval($v); }

    // volando: true si altitud > 0
    public function volando() {
        return $this->altitud > 0;
    }

    // acelerar: implementa la interfaz Volador
    public function acelerar($velocidad) {
        $this->setVelocidad($velocidad);
        echo "{$this->nombre} acelerando a " . $this->velocidad . " km/h<br>";
    }

    // Métodos abstractos que deben implementar las subclases
    abstract public function volar($altitudObjetivo);
    abstract public function mostrarInformacion();
}

?>
