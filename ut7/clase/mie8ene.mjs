import express from "express"
import path from "node:path"
import { readFileSync } from "node:fs"


const puerto = 3000
const app = express()
const actualDir = path.resolve(".")



console.log(actualDir)


app.use(express.urlencoded({extended:true}))

app.get("/",(req, res) => {
    const rutaCompleta = path.join(actualDir,  "index.html")
    const contentsFile = readFileSync(rutaCompleta, "UTF-8")
    console.log(contentsFile)
    res.setHeader("Content-Type", "text/html")
    res.send(contentsFile)
})

app.get("/formulario", (req, res) => {
    const rutaFormulario = path.join(actualDir, "index.html")
    console.log(req.body)
    res.sendFile(rutaFormulario)
})

app.post("/verificacion", (req, res)=> {
    console.log(req.body)
    const {username, password} = req.body
    if(username && password){
        res.send(`El nombre de usuario es ${username}, con contraseña ${password}`)
    }else{
        res.redirect("/formulario")
    }
})


app.get("/usuarios", (req, res) => {
    res.statusCode = 200
    res.send("hola")
})

app.get("/pokemon/:nombrePokemon/:nivel", (req, res)=>{
    const {nombrePokemon, level} = req.params
    
    res.send("El pokemon elegido es " + nombrePokemon + " de nivel " + level)
})

app.get("/vuelos", (req, res) => {
    console.table(req.query)
    let {destino, precio} = req.query
    try{
        precio = parseInt("asdfasdf")
    }catch(e){
        if(e){
            console.log(e)
        }
    }
    
    console.log(typeof precio)
    console.log(precio === 200)
    res.send(`El destino del vuelo es ${destino}, y su precio es de ${precio}`)
})

app.get("/demo/download", (req, res) =>{
    const ruta_juego = path.join(actualDir, "gato.jpg")
    res.download(ruta_juego)
})

app.get("/contactos?", (req, res) =>{
    res.send("Contacto")
})

app.get("/about-us", (req, res) =>{
    res.send("Sobre nosotros")
})

app.get("/careers", (req, res) =>{
    res.send("Puestos de trabajo")
})

app.get("/(trabajo)+(no)?", (req, res) => {
   res.send("A trabajar") 
})

app.get("/*", (req,res) =>{
    res.send("Cualquier otra ruta")
})



app.listen(puerto, () =>{
    console.log(`Ha empezado a escuchar en el puerto ${puerto}`)
})

