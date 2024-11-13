<?php
$arr = array(1, 2, 3, 4);
foreach ($arr as $value) {
	echo $value . "<br>";
}
foreach($arr as &$value){
    $value *= 2;
}
echo "<pre>";
print_r($arr);
echo "</pre>";
foreach($arr as $key => $value){
    echo "el elemento $key, de la array \$arr contiene el valor $value<br>";
}
$cadena = "Hola buenas qué tal";
$caracteres = mb_str_split($cadena);
foreach($caracteres as $value){
    echo $value . "<br>";
}