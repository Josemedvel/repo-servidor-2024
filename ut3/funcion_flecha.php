<?php
$y = 1;
$fn1 = fn($x) => $x+ $y; //en este caso, usamos $y como si fuese la global
echo $fn1(3); // imprime 4