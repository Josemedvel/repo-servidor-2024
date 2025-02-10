import express from "express"
//import ejs from "ejs"
import path from "path"
import axios from "axios"

const port = 3000
const app = express()

app.use(express.json())
app.use(express.urlencoded({ extended: true }))

app.set("view engine", "ejs")
app.set("views", path.join(path.resolve("."), "views"))

// Ruta para formulario de petición
app.get("/peticion", (req, res) => {
    res.render("formulario_peticion.ejs")
})

// Procesar la petición ingresada en el formulario
app.post("/peticion", async (req, res) => {
    const { endpoint, tipo, cuerpo } = req.body
    try {
        let response
        switch (tipo) {
            case "GET":
                response = await axios.get(endpoint)
                break
            case "POST":
                response = await axios.post(endpoint, {})
                break
            case "DELETE":
                response = await axios.delete(endpoint)
                break
            case "PUT":
                response = await axios.put(endpoint, {})
                break
            default:
                return res.status(400).send("Método no válido")
        }

        const datos = response.data
        res.render("datos_peticion.ejs", { datos }) // Renderizar datos en la vista
    } catch (error) {
        console.error("Error en la petición:", error.message)
        res.status(500).send("Error al hacer la petición: " + error.message)
    }
})
app.post("/datos", (req, res) => {
    const {username, password} = req.body
    res.render("datos.ejs",{username, password})
})

// Ruta principal (formulario principal)
app.get("/", (req, res) => {
    res.render("formulario.ejs")
})

// Iniciar servidor
app.listen(port, () => {
    console.log("Servidor iniciado en http://localhost:" + port)
})
