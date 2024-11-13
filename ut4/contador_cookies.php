<?php

$contador = 0;
if(isset($_COOKIE["contador"])){
    $contador = $_COOKIE["contador"];
}

if(isset($_POST["restar"])){
    $contador--;
}else if(isset($_POST["sumar"])){
    $contador++;
}
setcookie("contador", $contador, time() + 3600);
?>

<form action="#" method="post">
    <button type="submit" name="restar">-</button>
    <span><?=$contador?></span>
    <button type="submit" name="sumar">+</button>
</form>