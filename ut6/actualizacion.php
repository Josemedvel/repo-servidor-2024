<?php
require_once "bd_config.php";

$sql = "UPDATE usuarios SET nombre = :nombre WHERE nombre = 'Juan'";
try{
    $stmt = $conn->prepare($sql);
    $nombre = "Maria";
    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $stmt->execute();
    echo "Se han modificado un total de: {$stmt->rowCount()}";
}catch(PDOException $e){
    echo $e->getMessage();
}




