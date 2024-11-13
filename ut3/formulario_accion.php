
<?php 
    if($_SERVER["REQUEST_METHOD"] === "POST"){
        if(isset($_POST["username"]) && isset($_POST["password"])){
            $nombre = htmlspecialchars(trim($_POST["username"]), ENT_QUOTES, "UTF-8");
            $password = htmlspecialchars(trim($_POST["password"]), ENT_QUOTES, "UTF-8");
            echo "<h1>Bienvenido $nombre</h1>";
            echo "Tu contraseña es $password";
        }
    }
    else{
        echo '<form action="#" method="post">
        <p>Introduzca el usuario: <input type="text" name="username"></p>
        <p>Introduzca la contraseña: <input type="password" name="password"></p>
        <button type="submit">Enviar</button>
        </form>';
    }
    
?>