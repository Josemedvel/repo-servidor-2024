<?php
class Rectangulo{
    protected float $base;
    protected float $altura;

    public function __construct(float $base=1, float $altura=1){
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcPerimetro(): float{
        return $this->base*2 + $this->altura*2;
    }

    public function calcArea() : float{
        return $this->base * $this->altura;
    }

    public function tipoFigura(): string{
        return __CLASS__;
    }
}
class Cuadrado extends Rectangulo{
    public function __construct(float $lado = 1){
        parent::__construct($lado, $lado);
    }
    public function tipoFigura(): string{
        return __CLASS__;
    }
}
$rectangulo = new Rectangulo(10.2,5);
echo $rectangulo->calcArea();
echo "<br>";
echo $rectangulo->calcPerimetro();
echo "<br>";
echo $rectangulo->tipoFigura();

$cuadrado = new Cuadrado(5);
echo "<hr>";
echo $cuadrado->calcArea();
echo "<br>";
echo $cuadrado->calcPerimetro();
echo "<br>";
echo $cuadrado->tipoFigura();
