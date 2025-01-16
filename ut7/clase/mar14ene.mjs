import express from "express"
import cookieParser from "cookie-parser"
import clearCookie from "cookie-parser"

const puerto = 3000
const app = express()

app.use(cookieParser())

app.get("/", (req, res)=>{
    res.cookie("fecha", "14-01-2025", {maxAge: 1000 * 30 * 60})
    .cookie("alumno", {nombre:"Alonso", nia: "1234895"})
    .sendStatus(200)
})

app.get("/lectura", (req, res)=>{
    console.table(req.cookies)
    res.send("info")
})

app.get("/borrarFecha", (req, res) =>{
    res.cookie("fecha","", {maxAge: -11111})
    .send("Hola")
})

app.listen(puerto, ()=>{
    console.log(`Servidor escuchando en el ${puerto}`)
})