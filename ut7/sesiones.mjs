import express from "express"
import session from "express-session"

const puerto = 3000
const app = express()


app.use(session({
    secret: 'warwick',
    resave: false,
    saveUninitialized: true,
    cookie: {maxAge: 1000 * 60 * 30}
}))

app.get("/", (req, res)=>{
    if(req.session.contador){
        req.session.contador++
    }else{
        req.session.contador = 1
        req.session.info = {
            nombre: "Jose",
            apellido: "Medina"
        }
    }
    res.send(`Hola, visitante numero ${req.session.contador}`)
})

app.get("/info", (req, res)=>{
    if(req.session.info){
        res.send(`Hola, ${req.session.info.nombre} ${req.session.info.apellido}`)
        console.log(req.session.info)
    }
})

app.listen(puerto, ()=>{
    console.log("App sesiones iniciada")
})