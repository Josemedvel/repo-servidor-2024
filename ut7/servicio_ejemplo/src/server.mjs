import app from "./app.mjs"
import process from "process"

const port = 3000

app.listen(port, () => {
    console.log(`Servidor corriendo en localhost:${port}`)
})