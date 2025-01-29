import express from "express"
import rutasRegistro from "./register.mjs"
import rutasBorrado from "./borrado.mjs"


const app = express()
const puerto = 3000

app.use(express.json())
app.use(express.urlencoded({extended:true}))

app.use("/api", rutasRegistro)
app.use("/api", rutasBorrado)

app.listen(puerto, () => {
    console.log(`Iniciamos en el ${puerto}`)
})