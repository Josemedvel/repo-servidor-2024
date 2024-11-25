<?php

require_once "Coche.php";

$coche_1 = new Coche("12344123A", 100000, "Renault", "Clio", "1235GSP", 15000.70);
$coche_2 = new Coche("36323456B", 200500, "Volkswagen", "Polo", "8907JSK", 16400);
$matriz = [];
$serializado = serialize($coche_1);
$serializado2 = serialize($coche_2);
file_put_contents("serializacion_1.txt", $serializado); // machacará el archivo con ese nombre si existe ya
$rutaArchivo2 = "serializado_2.txt";
file_put_contents($rutaArchivo2, $serializado2); // machacará el archivo con ese nombre si existe ya
for($i = 0; $i < 4; $i++){
    $matriz[$i] = []; 
    for($j = 0; $j < 4; $j++){
        $matriz[$i][$j] = mt_rand(1, 100);
    }
}
$rutaArchivo3 = "serializado_3.txt";
$serializado3 = serialize($matriz);
file_put_contents($rutaArchivo3, $serializado3);
if(file_exists($rutaArchivo2)){
    $cadenaADeserializar = file_get_contents($rutaArchivo2);
    $coche_deserializado = unserialize($cadenaADeserializar);
    echo $coche_deserializado. "<br>";
    echo gettype($coche_deserializado)."<br>";
    echo get_class($coche_deserializado)."<br>";
}else{
    echo "No existe el archivo aún<br>";
}
