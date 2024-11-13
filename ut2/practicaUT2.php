<?php
$nombre = "Silvia";
$edad = 22;
echo "<p>" . $nombre . " tiene " . $edad ." años</p>";
echo "<p>$nombre tiene $edad años</p>";
?>
<p><?= $edad+1?></p>
<?php
$x0 = 0;
$v0 = 0;
$t = 2;
$a = 9.8;
$x = $x0 + ($v0 * $t) + (1/2) * $a * ($t**2);
echo "<p>$x metros</p>";
?>
<?php
$cadena = "hola buenas";
//echo "<p>" . array($cadena) . "</p>";
$var_punto_flotante = 0.0;
$var_cadena_vacia = "";
$var_entero = -0;
$var_array_vacia = [];
echo "<p>". ($var_array_vacia == false) ."</p>";
echo "<p>". ($var_cadena_vacia == false) ."</p>";
echo "<p>". ($var_entero == false) ."</p>";
echo "<p>". ($var_punto_flotante == false) ."</p>";
?>
