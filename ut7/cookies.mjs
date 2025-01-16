import express from "express"
import cookieParser from "cookie-parser"
const puerto = 3000
const app = express()


//app.use(express.json()) // middleware para decodificar json

app.use(cookieParser()) // middleware para decodificar cookies


// establecemos una cookie, se puede hacer en un middleware también
// para modificarla o eliminarla se llama a la misma función con los parámetros adecuados
app.get("/cookie", (req, res) =>{
    res.cookie("hola", "mundo", {expire: 0})
    .cookie("info", {nombre: "Marta", edad: 23}, {maxAge: 1000 * 60 * 60 * 24})
    .send("Cookie enviada")
})

app.get("/leercookie", (req, res) => {
    const info = req.cookies.info
    console.log(info)
    const hola = req.cookies.hola
    res.send(`Cookie leída: ${hola}, ${info.nombre}, ${info.edad}`)
})

app.listen(puerto, ()=>{
    console.log("App cookies iniciada")
})