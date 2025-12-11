<?php
class Encargado extends Empleado {
	// El encargado utiliza el mismo constructor que Empleado
	public function __construct($nombre, $sueldoBase) {
		parent::__construct($nombre, $sueldoBase);
	}

	// Sobrescribir getSueldo para añadir 15%
	public function getSueldo() {
		$base = parent::getSueldo();
		return $base * 1.15;
	}

	public function __toString() {
		return sprintf("Encargado: %s, Sueldo: %.2f", $this->getNombreForToString(), $this->getSueldo());
	}

	// Método privado auxiliar: intentar acceder al nombre no es posible directamente
	// (los atributos son privados en la clase base), así que no mostramos el nombre aquí.
	private function getNombreForToString() {
		return '(nombre oculto)';
	}
}
?>