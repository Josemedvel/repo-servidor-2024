<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Media números con sesiones</title>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION["numeros"])){
        $_SESSION["numeros"] = [];
    }
    if($_SERVER["REQUEST_METHOD"] === "POST"){ // si se ha enviado el formulario, tendremos que añadir el número a la sesión
        if(isset($_POST["annadir-numero"]) && isset($_POST["campo-numero"])){
            if(mb_strlen($_POST["campo-numero"]) != 0){
                $numero = (float)$_POST["campo-numero"];
                array_push($_SESSION["numeros"], $numero);
            }else{ // en caso de que se haya enviado el formulario sin número, se recarga la página sin más
                header("Refresh: 0");
            }
        }
    }
    ?>
    <h1>Media de números con sesiones</h1>
    <form action="#" method="post">
        <label for="campo-numero">Introduzca un nuevo número:</label>
        <input type="text" name="campo-numero" id="campo_numero">
        <br>
        <button type="submit" name="annadir-numero">Añadir número</button>
        <button type="submit" name="calcular-media">Calcular media</button>
    </form>
    <hr>
    <?php
    // Una vez hemos calculado cuáles son los números a imprimir en la tabla o no tabla, se hace
    $numeros = $_SESSION["numeros"];
    echo "<table border='1px solid black'>";
    echo "<tr>";
    echo "<th>Números</th>";
    echo "</tr>";
    foreach($numeros as $numero){
        echo "<tr>";
        echo "<td> $numero </td>";
        echo "</tr>";
    }
    echo "</table>";
    if(isset($_POST["calcular-media"])){
        $numeros = $_SESSION["numeros"];
        $num_elementos = count($numeros);
        if($num_elementos == 0){
            echo "<a href='index.php'>El número de elementos no puede ser 0 para calcular la media, vuelve para introducir números</a>";
        }else{
            $media  = array_sum($numeros) / $num_elementos;
            echo "<h2>La media es de los números introducidos es: $media</h2>";
        }
    }
    ?>
</body>
</html>
