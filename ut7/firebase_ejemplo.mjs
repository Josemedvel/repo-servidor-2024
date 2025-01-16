import { initializeApp } from "firebase/app";
import { getFirestore, collection,deleteDoc, doc, getDoc, setDoc,updateDoc, addDoc,Timestamp, getCountFromServer,getAggregateFromServer,  getDocs,where, query,orderBy,limit,or,and, count, sum, average, FieldValue} from "firebase/firestore";
//import { getAnalytics } from "firebase/analytics";
import express from "express"

const firebaseConfig = {
  apiKey: process.env.API_KEY,
  authDomain: process.env.DOMAIN,
  projectId: process.env.PROJECT_ID,
  storageBucket: process.env.STORAGE_BUCKET,
  messagingSenderId: process.env.SENDER_ID,
  appId: process.env.APP_ID
};

// Initialize Firebase
const firebaseApp = initializeApp(firebaseConfig);

const app = express()
const puerto = 3000

app.use(express.urlencoded({extended: true}))

app.use(async (req,res,next) =>{
    let db = getFirestore()
    let data = {
        ruta: req.path,
        ip: req.ip,
        instante: Timestamp.now().seconds
    }
    try{
        let resultado = await addDoc(collection(db,"logs"), data)
        if(resultado){
            console.log("Guardado")
        }else{
            console.log("Error guardando")
        }
    }catch(e){
        console.log(e)
    }
    next()
})


app.get("/", (req, res) =>{
    res.send("Inicio")
})

app.get("/about-us", (req, res) =>{
    res.send("Sobre nosotros")
})

app.get("/contact", (req, res) =>{
    res.send("Contacto")
})

app.get("/historial", async (req, res) =>{
    let db = getFirestore()
    let logsRef = collection(db, "logs")
    let logs = await getDocs(logsRef)
    let resultado = []
    logs.forEach(doc => {
        resultado.push(doc.data())
    })
    res.json(resultado)
})

app.get("/adultos", async (req, res) =>{
    let db = getFirestore()
    let adultosRef = collection(db, "usuarios")
    let adultosQuery =  query(adultosRef, where("edad", ">", 18))
    let adultos = await getDocs(adultosQuery)
    let resultado = []
    adultos.forEach(doc => {
        resultado.push(doc.data())
    })
    res.json(resultado)
})

app.get("/numero", async (req, res)=>{
    let db = getFirestore()
    let logsRef = collection(db, "logs")
    let logs = await getCountFromServer(logsRef)
    res.send(logs.data().count.toString())
})

app.get("/numero2", async (req, res) => {
    let db = getFirestore()
    let logsRef = collection(db, "logs")
    let logs = await getAggregateFromServer(logsRef, {total_logs : count()})
    res.send(logs.data().total_logs.toString())
})

app.get("/suma", async (req, res)=>{
    let db = getFirestore()
    let logsRef = collection(db, "logs")
    let suma = await getAggregateFromServer(logsRef, {suma_instantes: sum("instante")})
    res.send(suma.data().suma_instantes.toString())
})

app.listen(puerto, () =>{
    console.log("Servidor corriendo en el puerto", puerto)
})
