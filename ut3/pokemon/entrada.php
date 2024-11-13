<form action="#" method="post">

<select name="opciones['primera'][]">
    <option value="1" name="opciones['primera'][]">Opcion 1</option>
    <option value="2" name="opciones['primera'][]">Opcion 2</option>
    <option value="3" name="opciones['primera'][]">Opcion 3</option>
    <option value="4" name="opciones['primera'][]">Opcion 4</option>
</select>
<br>
<select name="opciones['primera'][]">
    <option value="5" name="opciones['primera'][]">Opcion 5</option>
    <option value="6" name="opciones['primera'][]">Opcion 6</option>
    <option value="7" name="opciones['primera'][]">Opcion 7</option>
    <option value="8" name="opciones['primera'][]">Opcion 8</option>
</select>
<br>
<hr>
<select name="opciones['segunda'][]">
    <option value="1" name="opciones['segunda'][]">Opcion 1</option>
    <option value="2" name="opciones['segunda'][]">Opcion 2</option>
    <option value="3" name="opciones['segunda'][]">Opcion 3</option>
    <option value="4" name="opciones['segunda'][]">Opcion 4</option>
</select>
<br>
<select name="opciones['segunda'][]">
    <option value="5" name="opciones['segunda'][]">Opcion 5</option>
    <option value="6" name="opciones['segunda'][]">Opcion 6</option>
    <option value="7" name="opciones['segunda'][]">Opcion 7</option>
    <option value="8" name="opciones['segunda'][]">Opcion 8</option>
</select>
<button type="submit" name="enviar">Enviar</button>
</form>
<?php
    if(isset($_POST["enviar"])){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
?>