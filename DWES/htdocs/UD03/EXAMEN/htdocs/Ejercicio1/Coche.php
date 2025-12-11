<?php
   class Coche extends Vehiculo {
    private String $tipoCombustible;
    public int $velocidadAumentar;
    public int $velocidad;

/*
    public function constructor() {
        parent::constructor();
    }
*/
    public function acelerar($velocidadAumentar, $velocidad){
        if($encendido = false){
            echo "error";
        }else{
            $nuevaVelocidad = $velocidadAumentar + $velocidad;
        }
        if($nuevaVelocidad > 180){
            echo "la velocidad no puede superar los 180Km/h";
        }else{
            echo "nueva velocidad: $nuevaVelocidad";
        }
    }
/*
    public function fichaTecnica(string $ficha){
        string $ficha;
        $ficha = 
        "Informacion del vehiculo <br>
        Matricula: $matricula <br>
        Modelo: $modelo <br>
        Combustible: $tipoCombustible<br>
        Velocidad Actual: $nuevaVelocidad";

        echo $ficha;
        
    }
        */


 }






?>