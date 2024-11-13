<?php
var_dump($_POST);
echo isset($_POST);
if(isset($_POST["username"]) && isset($_POST["age"])){
    echo "Buenas, usted es el usuario " . htmlspecialchars($_POST["username"],ENT_QUOTES) . " con edad " . htmlspecialchars($_POST["age"], ENT_QUOTES);
}else{
    header("Location: formulario_clase.html" );
}

