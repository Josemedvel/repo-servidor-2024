<?php
function es_primo($num){
    if($num <= 3 && $num > 0){ //es primo
        echo $num . "<br>";
        return;
    }
    if($num % 2 == 0){ // no es primo
        return;
    }
    $limite = sqrt($num);
    for($i = 3; $i < $limite; $i+=2){
        if($num % $i == 0 && $i != 1){ //no es primo
            return;
        }
    }
    echo $num . "<br>";
}
for($i = 1; $i < 100; $i++){
    es_primo($i);
}