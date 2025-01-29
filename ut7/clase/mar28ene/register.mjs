import express from "express"
import {registrar} from "./config_fire.mjs"
import path from "path"

const router = express.Router()

router.get("/register", (req, res) => {
    const registerPath = path.join(path.resolve("."), "register.html")
    res.sendFile(registerPath)
})

router.post("/register", async (req, res) => {
    const {email, password} = req.body
    let status = 200
    if(!email || !password){
        console.log("Falta info")
        status = 500
    }else{
        const result = await registrar(email, password)
        console.log(result)
        if(!result){
            status = 500
            console.log("Error al guardar")
        }
    }
    res.sendStatus(status)
})



export default router