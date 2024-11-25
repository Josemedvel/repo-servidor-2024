<?php
require_once "bd_config.php";


try{
    // se ponen los parámetros con :nombre_parametro
    $sql = "SELECT nombre, apellido, email FROM usuarios WHERE nombre = :nombre";
    // Hay que preparar la consulta
    $stmt = $conn->prepare($sql);
    // Y luego asociar todos los parámetros
    $nombre = "Jose";
    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    // Y por último ejecutar la consulta y obtener un set de resultados
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
    var_dump($usuario);
    if($usuario){
        echo "<pre>";
        print_r($usuario);
        echo "</pre>";
    }
}catch(PDOException $e){
    echo "Error en la consulta: $e";
}