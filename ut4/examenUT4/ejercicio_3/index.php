<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>
    <?php
    session_start();
    $usuario = isset($_SESSION["usuario"]) ? $_SESSION["usuario"] : "";
    $contra = isset($_SESSION["contra"]) ? $_SESSION["contra"] : "";
    if(isset($_POST["cierre-sesion"])){ // si llegamos a través de la página de perfil, con el botón de cierre sesión
        setcookie("logeado_nombre",expires_or_options:time() - 10000);
        setcookie("logeado_contra", expires_or_options:time() - 10000);
    }
    ?>
    <h1>Entra en tu perfil</h1>
    <form action="autenticado.php" method="post">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" name="usuario" id= "usuario" placeholder="Pepe" value="<?=$usuario?>">
        <br>
        <label for="contra">Contraseña:</label>
        <input type="password" name="contra" id="contra" placeholder="Contraseña segura" value="<?=$contra?>">
        <br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>