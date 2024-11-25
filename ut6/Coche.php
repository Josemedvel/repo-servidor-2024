<?php

class Coche implements JsonSerializable{
    private string $dniDuenno;
    private int $km;
    private string $marca;
    private string $modelo;
    private string $matricula;
    private float $precio;
    public function __construct(string $dni, int $km, string $marca, string $modelo, string $matricula, float $precio){
        $this->dniDuenno = $dni;
        $this->km = $km;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->matricula = $matricula;
        $this->precio = $precio;
    }
    public function __toString()
    {
        return "{Dni del dueño:$this->dniDuenno, KM: $this->km, Marca: $this->marca, Modelo: $this->modelo, Matrícula: $this->matricula, Precio: $this->precio}";
    }

    public function jsonSerialize():mixed { // obligado poner mixed
        return [
            'dniDuenno' => $this->dniDuenno,
            'km' => $this->km,
            'marca' => $this->marca,
            'modelo' => $this->modelo,
            'matricula' => $this->matricula,
            'precio' => $this->precio
        ];
    }
}