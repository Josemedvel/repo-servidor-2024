<?php
$arr = [1,2,3,4,5];
$fun = function ($num){
    return $num * 2;
};

echo "<pre>";
print_r(array_map($fun, $arr));
echo "</pre>";

function suma($acc, $num){
    return $acc + $num;
}
echo array_reduce($arr,"suma", 0);
array_splice($arr, 2, 1);
echo "<pre>";
print_r($arr);
echo "</pre>";
$total = 0;
foreach($arr as $v){
    $total += $v;
}
$nota_media = $total / count($arr);

$nota_media = array_reduce($arr, "suma",0)/count($arr);
$nota_media = array_sum($arr)/count($arr);
echo $arr[0];

function media($arr){
    $suma_total = 0;
    $longitud_array = count($arr);
    for($i = 0; $i < $longitud_array; $i++){
        $suma_total = $suma_total + $arr[$i];
    }
    return $suma_total / $longitud_array;
}


function media_ponderada($notas, $porcentajes){
    $nota_final = 0;
    for($i = 0; $i < count($notas); $i++){
        $nota_final += $notas[$i] * $porcentajes[$i];
    }
    if(array_sum($porcentajes) == 100){
        return $nota_final / 100;
    }
    return $nota_final;
}

