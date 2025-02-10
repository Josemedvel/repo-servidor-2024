import express from "express"



const port = 3001
const app = express()
const router = express.Router()


router.get("/datos", (req, res) => {
    console.log("GET")
    console.log("body")
    console.table(req.body)
    console.log("params")
    console.table(req.params)
    console.log("query")
    console.table(req.query)
    res.json({datos: "Hola"})
})

router.post("/datos", (req, res) => {
    console.log("POST")
    console.log("body")
    console.table(req.body)    
    console.log("params")
    console.table(req.params)
    console.log("query")
    console.table(req.query)
    res.json({info: "datos actualizados"})
})

router.put("/datos", (req, res) =>{
    console.log("PUT")
    console.log("body")
    console.table(req.body)
    console.log("params")
    console.table(req.params)
    console.log("query")
    console.table(req.query)
    res.json({info: "datos insertados"})
})

router.delete("/datos", (req, res) => {
    console.log("DELETE")
    console.log("body")
    console.table(req.body)
    console.log("params")
    console.table(req.params)
    console.log("query")
    console.table(req.query)
    res.json({info: "datos eliminados"})
})

app.use(express.json())
app.use(express.urlencoded({extended:true}))
app.use("/api", router)

app.listen(port, () => {
    console.log("API dummy en el puerto: "+port)
})