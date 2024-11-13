<?php

function str_replace_falso($cadena, $busqueda, $reemplazo){
    $array_cadena = mb_str_split($cadena);
    $array_busqueda = mb_str_split($busqueda);
    $longitud_cadena = count($array_cadena);
    $longitud_busqueda = count($array_busqueda);

    for($i=0; $i < count($array_cadena);$i++){
        $encontrado = true;
        for($j = 0; $j < count($array_busqueda); $j++){
            if($longitud_cadena - $i < $longitud_busqueda || $array_cadena[$i + $j] != $array_busqueda[$j]){
                $encontrado = false;
                break;
            }
        }
        if($encontrado){
            array_splice($array_cadena, $i, $longitud_busqueda, $reemplazo);
        }
    }
    return implode($array_cadena);
}
echo str_replace_falso("hola buenas tardes que tal buenas", "buenas", "malas");
