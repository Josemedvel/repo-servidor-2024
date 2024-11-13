<form action="#" method="post">
    <label for="deportista">Deportista:</label><input type="checkbox" name="deporte[]" value="deportista" id="deportista">
    <label for="ajedrez">Ajedrez:</label><input type="checkbox" name="preferencias[]" value="ajedrez" id="ajedrez">
    <label for="musica">Musica:</label><input type="checkbox" name="preferencias[]" value="musica" id="musica">
    <button type="submit" name="upload">Enviar</button>
</form>
<?php
    if(isset($_POST["upload"])){
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
?>