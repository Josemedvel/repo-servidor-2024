<?php
$matriz =[[1,2,3,],[4,5,6,],[7,8,9,],];
echo "<pre>";
print_r($matriz);
echo "</pre>";

foreach($matriz as $f){
    foreach($f as $c){
        echo "$c\t";
    }
    echo "<br>";
}

for($f = 0; $f < count($matriz); $f++){
    for($c = 0; $c < count($matriz[$f]); $c++){
        echo "{$matriz[$f][$c]}\t";
    }
    echo "<br>";
}