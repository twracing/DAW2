<?php
/**
 * ejercicio5_Aeropuerto.php
 * Clase Aeropuerto que gestiona un array de ElementoVolador
 */
require_once __DIR__ . '/ejercicio5_ElementoVolador.php';

class Aeropuerto {
    private $elementos; // array de ElementoVolador

    public function __construct() {
        $this->elementos = array();
    }

    // insertar un elemento en el aeropuerto
    public function insertar(ElementoVolador $e) {
        $this->elementos[] = $e;
    }

    // buscar por nombre
    public function buscar($nombre) {
        foreach ($this->elementos as $e) {
            if ($e->getNombre() === $nombre) {
                echo $e->mostrarInformacion();
                return $e;
            }
        }
        echo "No encontrado: $nombre<br>";
        return null;
    }

    // listar por compañia (solo aviones)
    public function listarCompania($compania) {
        $encontrados = array();
        foreach ($this->elementos as $e) {
            if ($e instanceof Avion) {
                if ($e->getCompaniaAerea() === $compania) {
                    $encontrados[] = $e;
                }
            }
        }
        if (count($encontrados) === 0) {
            echo "No se han encontrado aviones de la compañía $compania<br>";
        } else {
            echo "Aviones de la compañía $compania:<br>";
            foreach ($encontrados as $a) echo $a->mostrarInformacion();
        }
    }

    // listado de helicópteros por número de rotores
    public function rotores($nRotor) {
        $res = array();
        foreach ($this->elementos as $e) {
            if ($e instanceof Helicoptero) {
                if ($e->getNRotor() == $nRotor) $res[] = $e;
            }
        }
        if (count($res) === 0) {
            echo "No se han encontrado helicópteros con $nRotor rotores<br>";
        } else {
            echo "Helicópteros con $nRotor rotores:<br>";
            foreach ($res as $h) echo $h->mostrarInformacion();
        }
    }

    // despegar: buscar por nombre, acelerar, volar a altitud y devolver el objeto
    public function despegar($nombre, $altitudObjetivo, $velocidad) {
        foreach ($this->elementos as $e) {
            if ($e->getNombre() === $nombre) {
                // acelerar
                $e->acelerar($velocidad);
                // intentar volar
                $ok = $e->volar($altitudObjetivo);
                if ($ok) echo "$nombre ha despegado correctamente.<br>"; else echo "$nombre no ha podido despegar.<br>";
                return $e;
            }
        }
        echo "Elemento $nombre no encontrado para despegar.<br>";
        return null;
    }
}

?>
