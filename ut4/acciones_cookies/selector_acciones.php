<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js"
        integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Visualizador Acciones</title>
</head>

<body>

    <form action="#" method="post">
        <!-- Falta meter el selector de la o las acciones a ver, posiblemente con un checkbox para 
 poder elegir varias
 cuando se envía el formulario, tenemos que guardar una cookie con los nombres de las acciones
 seleccionadas.
 Usamos AJAX para hacer una petición asíncrona al "servicio" de acciones. -->
        <p>Selecciona las acciones a visualizar:</p>
        <label for="accion_apple">APPLE:</label><input type="checkbox" name="accion" id="accion_apple" value="apple">
        <br>
        <label for="accion_nvidia">NVIDIA:</label><input type="checkbox" name="accion" id="accion_nvidia" value="nvidia">
        <br>
        <label for="accion_alphabet">ALPHABET:</label><input type="checkbox" name="accion" id="accion_alphabet" value="alphabet">
        <br>
        <button type="submit">Mostrar</button>
    </form>
    <div style="width:800px;">
        <canvas id="grafico">

        </canvas>
    </div>
</body>

</html>