<?php
session_start();
if(isset($_SESSION["nombre"])){
    echo "<h1>Bienvenido de nuevo " . $_SESSION["nombre"] . "</h1>";
}else{
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["nombre"])){
            $_SESSION["nombre"] = $_POST["nombre"];
            header("Refresh:0");
        }
    }else{
        echo "<form action='#' method='post'>
            <p>Ingresa tu nombre: <input type='text' name='nombre'></p>
            <button type='submit'>Enviar</button>
            </form>";
    }
}