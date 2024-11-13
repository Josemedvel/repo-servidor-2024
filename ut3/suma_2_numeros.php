<?php


var_dump($_POST);
if(isset($_POST["number_1"]) && isset($_POST["number_2"]) && $_POST["number_1"] && $_POST["number_2"]){
    $total = (float)$_POST["number_1"] + (float)$_POST["number_2"];
    echo "<p>El resultado es <b>$total</b></p>";
}else{
    echo '<form action="#" method="post">
        <label for="number_1">Número 1: </label>
        <input type="text" name="number_1">
        <label for="number_2">Número 2: </label>
        <input type="text" name="number_2">
        <button type="submit">Calcular</button>
        </form>';
}
?>
