<?php

function mb_str_replace_falso($haystack, $needle, $replacement){
    $caracteres_haystack = mb_str_split($haystack);
    $caracteres_needle = mb_str_split($needle);
    for($i = 0; $i < count($caracteres_haystack); $i++){
        if($caracteres_haystack[$i] == $caracteres_needle[0]){
            $idx_inicio = $i;
            $encontrado = true;
            for($j = 0; $j < count($caracteres_needle); $j++){
                if($caracteres_haystack[$i + $j] != $caracteres_needle[$j]){
                    $encontrado = false;
                    break;
                }
            }
            if($encontrado){
                array_splice($caracteres_haystack, $idx_inicio, count($caracteres_needle), mb_str_split($replacement));
            }
        }
    }
    return implode($caracteres_haystack);
}
echo mb_str_replace_falso("hola niño", "niño", "mundo");