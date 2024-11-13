<?php

class Coche{
    public string $matricula;
    public string $modelo;
    public float $km;
    private string $dni;
    private string $direccion;

    public function __construct(string $matricula, string $modelo, float $km, string $dni, string $direccion){
        $this->dni = $dni;
        $this->setMatricula($matricula);
        $this->modelo = $modelo;
        $this->km = $km;
        $this->direccion = $direccion;
    }
    protected function setMatricula(string $matricula){
        if(mb_strlen($matricula) <= 7 && mb_strlen($matricula) >= 5){
            $this->matricula = $matricula;
        }else{
            $this->matricula = "0000ZZZ";
        }
    }
    public function traverse(){
        foreach($this as $k => $v){
            echo "<p>$k : $v </p>";
        }
    }
    public function __toString(){
        return "{Matricula: $this->matricula, Modelo: $this->modelo, Km: $this->km}";
    }
}
$coche = new Coche("hola buenas", "Astra", 150000, "12341235A", "avd. de móstoles 64");
var_dump($coche);
echo "<br>";
$coche->traverse();
foreach($coche as $k => $v){
    echo "<p>$v </p>";
}
echo $coche;
