import express from "express"

const puerto = 3000
const app = express()

app.use(express.urlencoded({extended: true})) // middleware para decodificar formularios post

// ruta que recibe el formulario get
// simulamos nombre y apellido

app.get("/", (req, res) =>{
    const {nombre, apellido} = req.query
    res.send(`Nombre: ${nombre}, Apellido: ${apellido}`)
})

// ruta que recibe el formulario post
// simulamos nombre y apellido
app.post("/", (req, res)=>{
    const {nombre, apellido} = req.body
    res.send(`Nombre: ${nombre}, Apellido: ${apellido}`)
})


app.listen(puerto, ()=>{
    console.log("App tratamiento de formularios iniciada")
})