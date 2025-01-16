import express from "express"
const puerto = 3000
const app = express()

//ruta con parámetro id
app.get("/usuarios/:id", (req, res)=>{
    console.table(req.params)
    res.send(`Información del usuario con id ${req.params.id}`)
})


//ruta con parámetro id
app.get("/empresas/:comunidad", (req, res)=>{
    res.send(`Información del usuario con id ${req.params.comunidad}`)
})

//resto de rutas
app.get("/:resto", (req, res)=>{
    const resto = req.params.resto
    res.send(`Resto de páginas: ${resto}`)
})


app.listen(puerto, ()=>{
    console.log("App de rutas con parámetros iniciado")
})