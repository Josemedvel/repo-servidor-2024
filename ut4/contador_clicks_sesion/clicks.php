<?php
session_start();
if(isset($_SESSION["valor"])){
    $valor = $_SESSION["valor"];
}else{
    $valor = 0;
    $_SESSION["valor"] = $valor;
}
if(isset($_POST["sumar"])){
    $valor += 1;
    $_SESSION["valor"] = $valor;
}
else if(isset($_POST["restar"])){
    if(isset($valor)){
        $valor -= 1;
        $_SESSION["valor"] = $valor;
    }
}

echo "<pre>";
print_r($_POST);
echo "</pre>";

?>
<form action="#" method="post">
<button type="submit" name="restar">-</button>
<input type="text" disabled name="valor" value=<?=$valor?>>
<button type="submit" name="sumar">+</button>
</form>