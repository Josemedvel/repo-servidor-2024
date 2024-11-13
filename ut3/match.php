<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul {
            list-style-type: none;
        }
        *{
            background-color: <?=
            match(date("w")){
                "1" => 'blue',
                "2" => 'green',
                "3" => 'red',
                default => 'yellow',
            }?>
        }
    </style>
</head>
<body>
    <?php
/*Si el año es uniformemente divisible por 4, vaya al paso 2. De lo contrario, vaya al paso 5.
Si el año es uniformemente divisible por 100, vaya al paso 3. De lo contrario, vaya al paso 4.
Si el año es uniformemente divisible por 400, vaya al paso 4. De lo contrario, vaya al paso 5.
El año es un año bisiesto (tiene 366 días).
El año no es un año bisiesto (tiene 365 días).
*/
function annoBisiesto($anno){
    if($anno % 4 == 0){
        if($anno % 100 == 0){
            if($anno % 400 == 0){
                return true;
            }else{
                return false;
            }
        }else{
            return true;
        }
    }else{
        return false;
    }
}
echo annoBisiesto(2017);
$mes = "febrero";
$anno = 2024;
echo match($mes){
    "febrero" => annoBisiesto(2024) ? 29 : 28,
    "septiembre" => 30,
};
echo "<br>";
$dias_semana = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
echo $dias_semana;
echo "<pre>";
print_r($dias_semana);
echo "</pre>";
$edad = 22;
echo "<p>" . $edad ."</p>";
echo "<ul>";
for($i = 0; $i < count($dias_semana); $i++){
    echo "<li>" . $dias_semana[$i] . "</li>";
}
echo "</ul>";
echo date("w");
var_dump(match(date("w")){
    "1" => "blue",
    "2" => "red",
    "3" => "green",
    default => "yellow",
});
/*foreach($dias_semana as $k => $dia){
    echo "$k => $dia <br>";
    $dias_semana[$k] .= "hola";
}*/
foreach($dias_semana as $dia){
    echo "$dia <br>";
}
$horas_dia = ["15:05-15:55", "15:55-16:50", "1" ];
$arr = [1,2,3,4,"hola" => "qué tal?"];
var_dump($arr);

$a = ["a0" => 1, "a1" => 2, "a2"=>3, 6 => 4, 8];
print_r($a);
$b = [4,5,6, 7 ];
echo "<pre>";
print_r(($a+$b));
echo "</pre>";

$indices = ["a"=>1,3=>2,3,4,5,6,7];
$resultado = array();
$resultado[] = "hola";
print_r($resultado);

?>
</body>
</html>
<?php
