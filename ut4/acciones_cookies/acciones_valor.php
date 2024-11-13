<?php
session_start();
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
$acciones = [
    "Apple" => 100,
    "NVIDIA" => 90,
    "GOOGLE" => 85
];
function cambio_valor(){
    if(isset($_SESSION["acciones"])){
        $acciones = $_SESSION["acciones"];
    }else{
        $acciones = $GLOBALS["acciones"];
        $_SESSION["acciones"] = $acciones;
    }
    $nuevos_valores = array_map(fn($v)=>$v + $v*(rand(-3,3)/100), $acciones);
    $_SESSION["acciones"] = $nuevos_valores;
    return $nuevos_valores;
}
    echo json_encode(cambio_valor());
