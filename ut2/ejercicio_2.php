<?php
/*define("PI",3.14234526);
define("GRAVEDAD_TIERRA", 9.81);
$a = 100;
$a += PI;
$edad = 17;
echo "El coche se puede reparar:" . (($edad >= 18) ? "Verdadero" : "Falso");
*/
$i = (int)"0 nota media de clase";

switch($i){
    case 0:
        echo "\$i vale : 0";
        break;
    case 1:
        echo "\$i vale : 1";
        break;
    default:
        echo "\$i vale otro valor <br>";
}

$mes = "septiembre";
echo "El número de días del mes $mes es: ". match($mes){
    "abril", "junio", "septiembre", "noviembre" => 30,
    "octubre", "enero", "marzo", "mayo", "julio", "agosto", "diciembre" => 31,
    "febrero" => 28,
} . "<br>";
