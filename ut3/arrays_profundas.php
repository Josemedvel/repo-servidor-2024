<?php

$array = [1,[9,8,7],3];

function imprimir_array($array){
    if(!is_array($array)){
        echo "$array&nbsp;";
        return;
    }
    echo " [ ";
    foreach($array as $v){
        imprimir_array($v);
    }
    echo " ] ";
}
imprimir_array($array);

if(isset($_POST["username"])){
    $username = htmlspecialchars(trim($_POST["username"]),ENT_QUOTES, "UTF-8");
    echo "sdafasdfasfd" . $username;
}