<?php
require_once "Coche.php";

$coche1 = new Coche("12344123A", 100000, "Renault", "Clio", "1235GSP", 15000.70);
$coche2 = new Coche("36323456B", 200500, "Volkswagen", "Polo", "8907JSK", 16400);
$matriz = [];
for($i = 0; $i < 4; $i++){
    $matriz[$i] = []; 
    for($j = 0; $j < 4; $j++){
        $matriz[$i][$j] = mt_rand(1, 100);
    }
}
$arrayCoches = [$coche1, $coche2];
$serializadoCoches = json_encode($arrayCoches, JSON_PRETTY_PRINT); 
// json_encode no codifica por defecto las propiedades privadas y protegidas
// hay que implementar el método jsonSerialize() en la clase (de la interfaz JsonSerializable)



$serializadoMatriz = json_encode($matriz, JSON_PRETTY_PRINT);

// todos al mismo archivo
$rutaArchivoJson1 = "lista_coches.json";
$rutaArchivoJson2 = "matriz.json";
file_put_contents($rutaArchivoJson1, $serializadoCoches);
file_put_contents($rutaArchivoJson2, $serializadoMatriz);
echo "Todo codificado!<br>";
if(file_exists($rutaArchivoJson1)){
    $concesionarioDatos = file_get_contents($rutaArchivoJson1);
    echo "$concesionarioDatos<br>";
    $concesionarioDatos = json_decode($concesionarioDatos, true); // muy importante poner true para recibir cada cosa como array asociativa.
    // al decodificar un json con un objeto, hay que reconstruir las instancias
    foreach($concesionarioDatos as $cocheData){
        $coche = new Coche(
            $cocheData['dniDuenno'],
            $cocheData['km'],
            $cocheData['marca'],
            $cocheData['modelo'],
            $cocheData['matricula'],
            $cocheData['precio']);
        echo "$coche <br>";
    }
}
