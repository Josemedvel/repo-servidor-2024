import express from "express"

const puerto = 3000
const app = express()


//ruta con comodín único
app.get("/usuarios?/:id", (req, res)=>{
    const id = req.params.id
    res.send(`Esta ruta vale para /usuario/id o /usuarios/id. Valor del id: ${id}`)
})
// ruta con comodín múltiple +
app.get("/(usuario)+/:id", (req, res)=>{
    const id = req.params.id
    res.send(`Esta ruta vale para cualquier número de apariciones de usuario`) // /localhost:3000/usuariousuariousuario/1235
})

// ruta con comodín múltiple *
app.get("/*", (req, res)=>{
    res.send(`Esta ruta vale para cualquier ruta, o incluso la ruta raíz ${req.path}` )
})



app.listen(puerto, ()=>{
    console.log("App parámetros avanzados iniciada")
})