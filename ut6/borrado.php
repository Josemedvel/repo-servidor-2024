<?php
require_once "bd_config.php";

$sql = "DELETE FROM usuarios WHERE nombre = :nombre";
try{
    $stmt = $conn->prepare($sql);
    $nombre = "Maria";
    $stmt->bindParam(":nombre", $nombre, PDO::PARAM_STR);
    $stmt->execute();
    echo "Se han borrado un total de: {$stmt->rowCount()}";
}catch(PDOException $e){
    echo $e->getMessage();
}
