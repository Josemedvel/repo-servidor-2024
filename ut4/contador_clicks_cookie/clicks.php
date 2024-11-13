<?php
if(isset($_COOKIE["valor"])){
    $valor = $_COOKIE["valor"];
}else{
    $valor = 0;
}
if(isset($_POST["sumar"])){
    $valor += 1;
    setcookie("valor", $valor, time() + 3600); // una hora de validez
}else if(isset($_POST["restar"])){
    $valor -= 1;
    setcookie("valor", $valor, time() + 3600); 
}
?>

<form action="#" method="post">
<button type="submit" name="restar">-</button>
<input type="text" disabled name="valor" value=<?=$valor?>>
<button type="submit" name="sumar">+</button>
</form>