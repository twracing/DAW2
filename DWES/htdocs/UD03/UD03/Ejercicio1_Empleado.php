<?php
class Empleado {
	// Atributos privados
	private $nombre;
	private $sueldoBase;

	public function __construct($nombre, $sueldoBase) {
		$this->nombre = (string)$nombre;
		$this->sueldoBase = floatval($sueldoBase);
	}

	// Método para obtener el sueldo (empleado normal)
	public function getSueldo() {
		return $this->sueldoBase;
	}

	// Método para mostrar info
	public function __toString() {
		return sprintf("Empleado: %s, Sueldo: %.2f", $this->nombre, $this->getSueldo());
	}
}
?>