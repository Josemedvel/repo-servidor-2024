import express from "express"
import { borrarTodosMenos } from "./config_fire.mjs"

const router = express.Router()

router.delete("/borrar-menos/:email", async (req, res) => {
    console.table(req.params)
    await borrarTodosMenos(req.params.email.toLocaleLowerCase())
    res.sendStatus(200)
})

export default router