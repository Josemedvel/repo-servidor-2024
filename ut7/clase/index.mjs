/*import {createServer} from "node:http";

const hostname = '127.0.0.1';
const port = 3000;
const server = createServer((req, res) => {
res.statusCode = 200;
res.setHeader('Content-Type', 'text-plain');
res.end('Hello World');
});
server.listen(port, hostname, () => {
console.log(`Server running at <http:${hostname}:${port}>`);
});
*/
import express from "express"
import path from "node:path"

const carpeta = path.resolve(".")
console.log(carpeta)
const puerto = 3000
const app = express()


app.get("/", (req, res) => {
    res.sendStatus(200)
})
app.get("/archivo", (req, res) => {
    res.sendFile(path.join(carpeta, "/package.json"), (err)=>{
        if (err){
            console.error("Error al cargar la foto:" + err);
        }
    })
})

app.get("/json", (req, res) => {
    res.send({
        "dependencies": {
          "express": "^4.21.2"
        }
      }
      )
})

app.get("/contactos?", (req, res) => {
    res.send("Página de contacto")
})

app.get("/*", (req, res) => {
    res.send(`Resto de rutas: ${req.path}`)
})

app.listen(puerto, () => {
    console.log("Aplicación iniciada en el puerto " + puerto)
})