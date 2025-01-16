import express from "express"

const app = express()
const puerto = 3000

// ruta raíz
app.get("/", (req, res)=>{
    res.send("Hola buenas")
})

// ruta usuarios
app.get("/usuarios", (req, res)=>{
    res.send("usuarios")
})

// ruta contactos
app.get("/contactos", (req, res)=>{
    res.send("contactos")
})

app.listen(puerto, () =>{
    console.log(`App de rutas escuchando en el puerto localhost:${puerto}`)
})
