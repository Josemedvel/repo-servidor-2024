<?php
    //se devuelve el primer valor de izq a der que exista y no sea null
    $valor = null ?? $array[0] ?? 7 ?? "hola";
    echo $valor;
