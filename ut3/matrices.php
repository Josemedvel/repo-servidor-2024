<?php
$arr = [
    [1,2,3],
    [4,5,6],
    [7,8,9],
];
$arr2 = [
    [0,2,3],
    [1,0,0],
    [1,2,0],
];
foreach($arr as $f){
    foreach($f as $c){
        echo "$c&nbsp;";
    }
    echo "<br>";
}
echo "<br>";

for($f = 0; $f < count($arr); $f++){
    for($c = 0; $c < count($arr[$f]); $c++){
        echo $arr[$f][$c]."&nbsp;";
    }
    echo "<br>";
}
function sumaArray($arr_1, $arr_2){
    $arr_res = [];
    for($i = 0; $i < count($arr_1); $i++){
        $nueva_fila = [];
        for($j = 0; $j < count($arr_1[$i]); $j++){
            $valor_columna = $arr_1[$i][$j] + $arr_2[$i][$j];
            $nueva_fila[] = $valor_columna; 
        }
        $arr_res[] = $nueva_fila;
    }
    return $arr_res;
}
function pretty_print($arr){
    echo "<pre>";
    print_r($arr);
    echo "</pre>";
}
pretty_print(sumaArray($arr, $arr2));
echo $arr == $arr2 ? "True" : "False" ;
echo "<br>";

var_dump(array_values($arr));
function sumaReduce($num1, $num2){
    return $num1 + $num2;
}
function suma($acc, ...$numeros){
    return array_reduce($numeros,"sumaReduce",$initial=$acc);
}
echo "<br>";
var_dump(suma(1,2,3,4,5,6,7,8,9));

function haz_cafe($tipo="cappuccino"){
    echo "<p>Haciendo café $tipo</p>";
}
haz_cafe();
haz_cafe("largo");
$arr = [1,2,3,4,5,6,7,8,9];
$pares = array_values(array_filter($arr, function($num){
    return $num % 2 == 0;
}));
$doble = array_map(fn($num)=>$num*2, $pares);
pretty_print($pares);
pretty_print($doble);

function suma2($array){
    if(count($array) == 1){
        return array_pop($array);
    }
    return array_pop($array) + suma2($array);
}
echo "<p>" .suma2($doble)."</p>";
function factorial($num){
    if($num == 2){
        return $num;
    }
    return $num * factorial($num - 1);
}
echo "<p>" . factorial(6) . "</p>";