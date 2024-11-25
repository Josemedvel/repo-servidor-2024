<?php
require_once "bd_config.php";

$sql = "INSERT INTO usuarios (nombre, apellido, email) VALUES (:nombre, :apellido, :email)";

$matrizNombres = [
    "Jose",
    "María",
    "Esther",
    "Juancho",
    "Pablo",
    "Marta",
    "Alberto",
    "Elena"
];
$matrizApellidos = [
    "Mora",
    "Medina",
    "Hernández",
    "López",
    "Velasco",
    "Martín",
    "Santiago",
    "Terroso"
];
$matrizUsuariosNuevos = [];
for ($i = 0; $i < 10; $i++) {
    $nombre = $matrizNombres[mt_rand(0, count($matrizNombres) - 1)];
    $apellido = $matrizApellidos[mt_rand(0, count($matrizApellidos) - 1)];
    $email = "$nombre.$apellido@gmail.com";
    $matrizUsuariosNuevos[] = ["nombre" => $nombre, "apellido" => $apellido, "email" => $email];
}
$valores = [];
try {
    //var_dump($matrizUsuariosNuevos); // todos los datos de los nuevos usuarios a insertar
    $stmt = $conn->prepare($sql);

    foreach ($matrizUsuariosNuevos as $k => $usuario) {
        $stmt->bindParam(":nombre", $usuario['nombre'], PDO::PARAM_STR);
        $stmt->bindParam(":apellido", $usuario['apellido'], PDO::PARAM_STR);
        $stmt->bindParam(":email", $usuario['email'], PDO::PARAM_STR);
        $stmt->execute();
        echo "Inserción completada<br>";
    }
} catch (PDOException $e) {
    echo "Error en la inserción: " . $e->getMessage();
}
