<?php
session_start();
if(isset($_SESSION["username"]) && $_SESSION["username"] == "admin" && isset($_SESSION["password"]) && $_SESSION["password"]=="1234"){
    echo "<h2>Bienvenido, " . $_SESSION["username"]. "</h2>";
}
elseif(isset($_POST["username"]) && $_POST["username"] == "admin" && isset($_POST["password"]) && $_POST["password"] == "1234"){ 
    $_SESSION["username"] = "admin";
    $_SESSION["password"] = "1234";
    header("Refresh:0");
    
}else{
    echo "<p>Lo siento, esta página es solo personas autenticadas, por favor vuelva al formulario</p>";
    echo "<a href='inicio.html'>Volver al formulario</a>";
}
