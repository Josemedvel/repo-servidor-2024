<?php
    // transformar condicionales if en switch-case o match
    $a = 10; // edad de persona 1
    $b = 20; // edad de persona 2
    
    $resultado = $a <=> $b;  // Esto devuelve -1 porque $a es menor que $b
    
    if ($a < $b) {
        echo "$a es menor que $b";
    } elseif ($a === $b) {
        echo "$a es igual a $b";
    } else {
        echo "$a es mayor que $b";
    }
    echo "<br>";
    // pasaría a ser
    switch($a <=> $b){
        case -1:
            echo "Persona 1 es más joven que Persona 2";
            break;
        case 0:
            echo "Ambas personas tienen la misma edad";
            break;
        case 1:
            echo "Persona 1 es mayor que Persona 2";
            break;
    }
    echo "<br>";
    // o en match
    echo match($a <=> $b){
        -1 => "Persona 1 es más joven que Persona 2",
        0 => "Ambas personas tienen la misma edad",
        1 => "Persona 1 es mayor que Persona 2"
    };
    echo "<br>";

    // ordenación automática de listas

    $numeros = [5, 2, 9, 1, 7, 6];
    usort($numeros, function($a, $b){
        return $a <=> $b;
    });

    print_r($numeros);