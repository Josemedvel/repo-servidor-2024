<?php


function mb_str_replace($cadena_completa, $busqueda, $reemplazo){
    $array_completa = mb_str_split($cadena_completa);
    $array_busqueda = mb_str_split($busqueda);
    for($i = 0; $i < count($array_completa); $i++){
        if($array_completa[$i] == $busqueda[0]){
            $idx_actual = 0;
            $encontrado = true;
            if($encontrado){
                while($idx_actual < count($array_busqueda)){
                    if($array_completa[$i+$idx_actual] != $array_busqueda[$idx_actual]){
                        $encontrado = false;
                        break;
                    }
                    $idx_actual++;
                }
            }
            
            array_splice($array_completa, $i ,count($array_busqueda), $reemplazo);
        }
    }
    return implode($array_completa);
}
echo mb_str_replace("hola buenas tardes que tal buenas", "buenas", "malas");