<?php
session_start();
$contador = 0;

if(isset($_SESSION["contador"])){
    $contador = $_SESSION["contador"];
}
if(isset($_POST["restar"])){
    $contador--;
}
else if(isset($_POST["sumar"])){
    $contador++;
}
$_SESSION["contador"] = $contador;
?>


<form action="#" method="post">
    <button type="submit" name="restar">-</button>
    <p><?=$contador?></p>
    <button type="submit" name="sumar">+</button>
</form>