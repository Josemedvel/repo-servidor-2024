<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivo simple</title>
</head>
<body>
<?php
$upload_dir = "uploads/";
if(!is_dir($upload_dir)){
    mkdir($upload_dir);
}
echo "La carpeta es:" . is_writable($upload_dir) . "<br>";
if(isset($_POST["subido"])){
    $nombre = $_FILES["foto"]["name"];
    $tipo = $_FILES["foto"]["type"];
    $tamano = $_FILES["foto"]["size"];
    $temporal = $_FILES["foto"]["tmp_name"];
    $error = $_FILES["foto"]["error"];
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $fichero_subido = $upload_dir . str_replace(' ','_',$_FILES["foto"]["name"]);
    echo $fichero_subido."<br>";
    if(move_uploaded_file($temporal, $fichero_subido)){
        echo "nombre: $nombre <br>";
                    echo "tipo: $tipo <br>";
                    echo "tamano: $tamano <br>";
                    echo "nombre temporal: $temporal <br>";
                    echo "error: $error <br>";
                    echo "<img src=" . $fichero_subido . ">";
    }else{
        echo "Ha habido algún problema con la subida de la foto<br>";
    }
}else{
    echo <<<FORM
    <form action="#" method="post" enctype="multipart/form-data">
    <label for="foto">Foto a subir:</label>
    <input type="file" name="foto" id="foto" accept=".png,.jpg,.jpeg">
    <br>
    <button type="submit" name="subido">Enviar</button>
    </form>
    FORM;
}
    ?>
</body>
</html>