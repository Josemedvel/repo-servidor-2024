<?php
function factorial($num){
    if($num <= 0){
        return 1;
    }
    if($num <= 2){
        return $num;
    }
    return $num * factorial($num - 1);
}
echo factorial(7);
function suma_recursiva($arr){
    if(count($arr) == 0){
        return 0;
    }
    if(count($arr) == 1){
        return array_pop($arr);
    }
    return array_pop($arr) + suma_recursiva($arr);
}
echo "<br>";
echo suma_recursiva([1,2,3,4]);
//devuelve el número $num en la secuencia de fibonacci
function fib($num){
    if($num <= 1){
        return 0;
    }
    if($num == 2){
        return 1;
    }
    return fib($num - 1) + fib($num - 2);
}
echo "<br>";
for($i = 1; $i <= 10; $i++){
    echo fib($i) . "&nbsp;";
}
echo "<br>";
echo fib(5000);