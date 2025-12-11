<?php

 abstract class Vehiculo implements Transportable {
    private String $matricula;
    private String $modelo;
    private bool $encendido = false;
    private int $velocidad = 0;


   public function  constructor(String $matricula, String $modelo, bool $encendido, int $velocidad){
        $this -> matricula = $matricula;
        $this -> modelo = $modelo;
        $this -> encendido = $encendido;
        $this -> velocidad = $velocidad;
    }

    public function getMatricula($matricula){
        return $this -> matricula = $matricula;
    }
    public function getModelo($modelo){
        return $this -> modelo = $modelo;
    }
    public function getEncendido($encendido){
       return $this -> encendido = $encendido;
    }
 
    public function getVelocidad($velocidad){
       return $this -> velocidad = $velocidad;
    }

    public function setMatricula($matricula){
        $this -> matricula = $matricula;
    }
    public function setModelo($modelo){
         $this -> modelo = $modelo;
    }
    public function setEncendido($encendido){
        $this -> encendido = $encendido;
    }
 
    public function setVelocidad($velocidad){
        $this -> velocidad = $velocidad;
    }
  

    function arrancar() {
        $encendido = true;
        echo "Has arrancado";
    }

     abstract public function acelerar($velocidad);
/*
   abstract function fichaTecnica(){
         echo "Informacion del vehiculo <br> Matricula: $matricula <br> Modelo: $modelo <br> Encendido: $encendido<br> Velocidad: $velocidad";
   }
        
     */
      
}

?>