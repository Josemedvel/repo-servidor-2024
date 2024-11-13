<?php
interface iVehiculo{
    public function arrancar();
    public function detener();
    public function obtenerCombustibleRestante();
}

class Coche implements iVehiculo{// si solo escribimos esto ya da error de que no implementa los métodos
    private float $combustible;
    
    public function __construct(float $combustible){
        $this->combustible = $combustible;
    }
    
    public function arrancar(){
        echo "<p>Brumm brumm</p>";
    }

    public function detener(){
        echo "<p>Parado</p>";
    }
    
    public function obtenerCombustibleRestante(){
        return $this->combustible;
    }
}