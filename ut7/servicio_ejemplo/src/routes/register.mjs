import express from "express"
import {generarAPIKeyFirebase, buscarAPIKeyFirebase, registrarAPIKeyFirebase} from "../services/apiKeyService.mjs"
import path from "path"

const router = express.Router()

// const mostrar_registro

router.use(express.urlencoded({extended:true}))
router.use(express.json())

router.post("/register", (req, res)=>{
    // se guarda un registro del usuario en la bd
    // habría que comprobar que no existe ya el email
    const email = req.body.email
    const password = req.body.password
    let claveAPI = generarAPIKeyFirebase()
    while(buscarAPIKeyFirebase(claveAPI).exists){
        claveAPI = generarAPIKeyFirebase()
    }
    registrarAPIKeyFirebase(email, password, claveAPI)
    res.send(`Su clave API es: ${claveAPI}, no la pierda`)
})

router.get("/register", (req, res) => {
    // se debe devolver una página de registro (formulario)
    // para ingresar email y contraseña
    const registerPath = path.join(path.resolve("."), "views/register.html")
    res.sendFile(registerPath)
})


export default router