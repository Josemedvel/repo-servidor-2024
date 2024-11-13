<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if(isset($_POST['enviar'])){
        echo "Buenas usuario " . $_POST["nombre"].", tienes " . (int)$_POST["edad"] . " años";
    }else{
        echo <<<FORM
        <form action="#" method="post">
        <p>Nombre: <input type="text" name="nombre" /></p>
        <p>Edad: <input type="text" name="edad" /></p>
        <p><input type="submit" name="enviar"/></p>
        </form>
        FORM;
    }
    ?>
</body>
</html>