<?php
class Coche{
    private string $dniDuenno;
    public string $marca;
    public string $modelo;
    public int $numKm;
    public string $color;
    public function __construct(string $marca, string $modelo, string $dniDuenno, int $numKm = 0, string $color = "blanco") {
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->numKm = $numKm;
        $this->dniDuenno = $dniDuenno;
        $this->color = $color;
    }

    protected function ssssh(){
        echo "<p>Este método es privado</p>";
    }

    public function mostrarCoche(){
        echo $this->marca;
        echo "<br>";
        echo $this->modelo;
        echo "<br>";
        echo $this->numKm;
        echo "<br>";
        echo $this->dniDuenno;
        echo "<br>";
        echo $this->color;
        echo "<br>";
    }
}

$coche_1 = new Coche("Chevrolet", "Cruze", "424352512C", color:"rojo",numKm:150000);
$coche_1->mostrarCoche();
//echo $coche_1->marca;
//echo $coche_1->dniDuenno;
//$coche_1->ssssh();