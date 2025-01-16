import express from "express"
import path from "node:path"


const puerto = 3000
const app = express()
const directorio = path.resolve(".")
console.log(directorio)

app.use((req, res, next) => {
    console.log(req.path)
    next()
})


app.get("/usuarios/:id/:caracteristica", (req, res) => {
    const {id,caracteristica} = req.params
    console.log(id, typeof id)
    console.log(caracteristica, typeof caracteristica)
    res.sendStatus(200)
})

app.get("/(school)+/alumno/:nia", (req, res) => {
    console.log(req.path)
    let html = ''
    html += `<h1>${req.path}</h1>`
    html += `El alumno buscado tiene el NIA: ${req.params.nia}`
    res.send(html)
    
})

app.get("/variables", (req, res) => {
    console.table(req.query)
    console.log(req.query.altura, typeof req.query.altura)
    console.log(req.query.altura == false)
    if(req.query.nombre && req.query.apellidos && req.query.altura){
        res.sendStatus(200)
    }else{
        res.sendStatus(404)
    }

})


const saludo = (req, res, next) => {
    console.log("Hola")
}

app.use(saludo)

app.get("/", (req, res) => {
    res.send("hola")
})



app.listen(puerto, ()=>{
    console.log(`Aplicación iniciada en el puerto ${puerto}`)
})

