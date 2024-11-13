<?php

use Models\Course; // Importamos la clase Course, si no pusieramos esto, tendriamos que poner Models\Course en cada uso de la clase Course
use Controllers\CourseController;

spl_autoload_register(function($nombre_clase){
    echo str_replace("\\","/",$nombre_clase) . '.php';
    if(file_exists(str_replace("\\","/",$nombre_clase) . '.php')){
        require_once str_replace("\\","/",$nombre_clase) . '.php'; // Como Course.php y CourseController.php estan en la carpeta Models y Controllers respectivamente, no hace falta poner la ruta completa
    }
});

$course = new Course();
echo "<br>";
$course->saludar();
echo "<br>";
$courseController = new CourseController();
echo "<br>";
$courseController->saludar();
echo "<br>";