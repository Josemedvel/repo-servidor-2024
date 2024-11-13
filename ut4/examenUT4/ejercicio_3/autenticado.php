<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil del usuario</title>
</head>
<body>
    <?php
    session_start();
    if($_SERVER["REQUEST_METHOD"] === "POST"){ // si han enviado el formulario, se comprueba
        if(isset($_POST["usuario"]) && isset($_POST["contra"])){
            $usuario = $_POST["usuario"];
            $contra = $_POST["contra"];
            $_SESSION["usuario"] = $usuario;
            $_SESSION["contra"] = $contra;
        }else{
            header("Location: index.php");
        }
        if($contra === "admin2024"){// contraseña correcta
            setcookie("logeado_nombre", $usuario, time() + 3600*2);
            setcookie("logeado_contra", $contra, time() + 3600*2);
        }else{
            header("Location: index.php");
        }
    }else if(isset($_COOKIE["logeado_nombre"]) && isset($_COOKIE["logeado_contra"])){ // ya existe la sesión en las cookies
        $usuario = $_COOKIE["logeado_nombre"];
        $contra = $_COOKIE["logeado_contra"];
        setcookie("logeado_nombre", $usuario, time() + 3600*2);
        setcookie("logeado_contra", $contra, time() + 3600*2);
    }else{
        header("Location: index.php");
    }
    ?>
    <h1>Perfil de usuario</h1>
    <p>Bienvenido a tu perfil, <?=$usuario?> con contraseña <?=$contra?></p>
    <form action="index.php" method="post">
    <button type="submit" name="cierre-sesion">Cerrar sesión</button>
    </form>
</body>
</html>