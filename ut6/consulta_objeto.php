<?php
require_once "bd_config.php";
require_once "Usuario.php";

$stmt = $conn->query("SELECT * FROM usuarios");
$usuarios = []; // partimos de una array vacía

//mientras queden resultados, usamos cada registro para crear un objeto
echo "<h2>Modo 1(fetch)</h2>";
while($registro = $stmt->fetch(PDO::FETCH_ASSOC)){// fetch lo usamos para sacar registro a registro
    $usuario = new Usuario();
    $usuario->setDatos($registro["nombre"], $registro["apellido"], $registro["email"]);
    $usuarios[] = $usuario;
}
foreach($usuarios as $u){
    echo $u;
    echo "<br>";
}

echo "<h2>Modo 2 (fetchAll)</h2>";
$stmt_2 = $conn->query("SELECT * FROM usuarios");
$usuarios_registros_2 = $stmt_2->fetchAll(PDO::FETCH_ASSOC);
$usuarios_objetos_2 = [];
foreach($usuarios_registros_2 as $u){
    $usuario_nuevo_2 = new Usuario();
    $usuario_nuevo_2->setDatos($u["nombre"], $u["apellido"], $u["email"]);
    $usuarios_objetos_2[] = $usuario_nuevo_2;
}
foreach($usuarios_objetos_2 as $u){
    echo "$u <br>";
}


// otra forma, sin usar el "constructor", con fetchObject
echo "<h2>Modo 3 (fetchObject)</h2>";
$stmt_3 = $conn->query("SELECT * FROM usuarios;");
while($usuario_3 = $stmt_3->fetchObject("Usuario")){
    $usuarios_3[] = $usuario_3;
}
echo "<pre>";
print_r($usuarios_3);
echo "</pre>";