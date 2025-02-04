import express from "express"
import path from "path"
import {comprobarLoginFirebase} from "../services/apiKeyService.mjs"

const router = express.Router()

router.use(express.urlencoded({extended:true}))
router.use(express.json())

router.get("/login", (req, res) => {
    // se envía el formulario de login
    const rutaLogin = path.join(path.resolve("."), "./views/login.html")
    res.sendFile(rutaLogin)
})

router.post("/login", (req, res) => {
    // se comprueba el email y la contraseña y se manda la vista de perfil
    const email = req.body.email
    const password = req.body.password
    const comprobar = comprobarLoginFirebase(email, password)
    res.send(comprobar)
})


export default router