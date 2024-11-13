<?php
$str = "ñoño";
echo strlen($str) . "<br>";
echo mb_strlen($str) . "<br>";
$chars = mb_str_split($string=$str);
print_r($chars);
for($i = 0; $i < count($chars); $i++){
    echo $chars[$i] . "<br>";
}
echo implode("_",$chars);



function reverse1($cadena){
    $res = "";
    $longitud = mb_strlen($cadena);
    $chars = mb_str_split($cadena);
    for($i = 0; $i < $longitud; $i++){
        $res .= array_pop($chars);
    }
    return $res;
}
function reverse2($cadena){
    $res = [];
    $chars = mb_str_split($cadena);
    for($c = count($chars) - 1; $c >= 0; $c--){
        array_push($res, $chars[$c]);
    }
    return implode("", $res);
}
function moda1($cadena){

    $arr = mb_str_split(str_replace(" ","",$cadena));
    $apariciones = [];
    $mas_repetida = "";
    $maximas_repeticiones = 0;
    foreach($arr as $v){
        if(isset($apariciones[$v])){
            $apariciones[$v] += 1; 
        }else{
            $apariciones[$v] = 1;
            
        }
        if($maximas_repeticiones < $apariciones[$v]){
            $mas_repetida = $v;
            $maximas_repeticiones = $apariciones[$v];
        }
    }
    echo $mas_repetida;
}



echo "<br>";
echo reverse1("hola qué tal?");
echo "<br>";
echo reverse2("hola qué tal?");
echo "<br>";
moda1("hola qué tal?");