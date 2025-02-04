# Servicio de consulta de API con autenticación de usuarios y bases de datos MySQL


## Introducción

Este servicio pretende utilizar Firebase Authentication para generar su propio ID Token de Firebase, que les servirá para usar las rutas protegidas de la API y consultar la información que está dentro.

## Pasos a seguir

1. Registro/Login de los usuarios en un Frontend/cliente:
    - Registro desde la una app web usando Firebase Authentication
    - Firebase generará un ID Token para cada uno

2. Envío del ID Token en el Backend:
    - El servicio verifica el ID Token usando Firebase Admin
    - Si es válido, se permite el acceso y se asocia el usuario al req.user

3. Protección de rutas:
    - Las rutas son protegidas por un middleware que verifica el token antes de procesar la solicitud.

## Pasos de ejecución

Se ejecuta desde el directorio src y es necesario incluir el archivo .env a la ejecución
