<?php

abstract class Camion extends Vehiculo {
    private int $kgCarga;


     public function acelerar(int $velocidadAumentar, int $kgCarg, int $velocidad)
    {
        if($kgCarga > 1000){
            $velocidadAumentar /2;
            $velocidadAumentar + $velocidad;
        }else{
            $velocidadAumentar + $velocidad;
        }
    }

}
?>