<?php
class ClaseSinConflicto{
    public $saludo = "Hola";
    public function saludo(){
        echo "¿Qué tal estás? <br>";
    }
}

$instanciaClase = new ClaseSinConflicto();
$instanciaClase->saludo();
echo $instanciaClase->saludo;
