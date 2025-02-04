import express from "express"
import index_routes from "./routes/index.mjs"
import polen_routes from "./routes/polen.mjs"
import process from "process"

const app = express()

// Middlewares globales
app.use(express.json())
app.use(express.urlencoded({extended:true}))

// Rutas
// establece un prefijo común, todas las rutas deben comenzar por /api
app.use("/api", index_routes) 
app.use("/api", polen_routes)

export default app