import express from "express"

const puerto = 3000
const app = express()

app.get("/numero", (req, res)=> {
    res.json({numero: Math.floor(Math.random()*100)})
})

app.listen(puerto, ()=>{
    console.log("Funcionando los numeros")
})