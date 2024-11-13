<?php
class Math{
    const PI = 3.1412452346;
    public static function sum(float $a, float $b){
        return $a + $b;
    }
}

echo Math::sum(4, 6);
echo "<br>";
echo Math::PI;