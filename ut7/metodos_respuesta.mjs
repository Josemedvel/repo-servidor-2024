import express from "express"
import path from "path"

const puerto = 3000
const app = express()
const root = path.resolve(".")

// ruta con comodín único
// se envía texto
app.get("/usuarios?/:id", (req, res)=>{
    const id = req.params.id
    res.send(`Esta ruta vale para /usuario/id o /usuarios/id. Valor del id: ${id}`)
})
// ruta con comodín múltiple +
// se envía un estado de conexión
app.get("/(usuario)+/:id", (req, res)=>{
    res.sendStatus(200)
})

// ruta que envía json
app.get("/json", (req, res)=>{
    res.json({nombre: "Juan", edad: 20})
})

// ruta que envía un archivo leído como json
app.get("/jsonfile", (req, res)=>{
    res.sendFile(path.join(root, "package.json"), (err)=>{
        if(err){
            res.status(500).send("Error al enviar el archivo")
        }
    })
})

// ruta que envía un archivo para descargar
app.get("/codigo", (req, res)=>{
    res.download(path.join(root, "metodos_respuesta.mjs"), (err)=>{
        if(err){
            res.status(500).send("Error al enviar el archivo")
        }
    })
})

// se envía un archivo HTML
app.get("/*", (req, res)=>{
    res.sendFile(path.join(root,"login.html"), (err) =>{
        if(err){
            res.status(500).send("Error al enviar el archivo")
        }
    })
})

app.listen(puerto, ()=>{
    console.log("App métodos de respuesta iniciada")
})