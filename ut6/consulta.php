<?php
// Incluir el archivo de conexión
require_once 'bd_config.php';

try {
    // Consulta SQL con un parámetro
    $sql = "SELECT id, nombre, email FROM usuarios";
    // Ejecutar la consulta y guardar la sentencia en un objeto PDOStatement
    $stmt = $conn->query($sql);

    // Recuperar los datos
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($usuarios) {
        echo "<pre>";
        print_r($usuarios);
        echo "</pre>";
    } else {
        echo "No se han encontrado usuarios";
    }
} catch (PDOException $e) {
    // Manejo de errores al ejecutar la consulta
    echo "Error al recuperar los datos: " . $e->getMessage();
}
?>
