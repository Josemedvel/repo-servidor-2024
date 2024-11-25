<?php

$destino = "mysql:host=localhost;dbname=test;charset=utf8mb4";
$user = "root";
$password = "1234";
try {
    // Crear conexión PDO
    $conn = new PDO($destino, $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado!!<br>";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage()."<br>";
}
?>