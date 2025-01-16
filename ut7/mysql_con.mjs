import express from "express"
import mysql from "mysql2"
import fs from "fs"
import path from "path"
import process from "process"

// este ejemplo usa una base de datos en línea con certificado, recuerda que está en Aiven.io

console.log(process.env)
let actualDir = path.resolve(".")
let rutaCert = path.join(actualDir,"ca.pem")
let cert = fs.readFileSync(rutaCert)
let conn = mysql.createConnection({
    host: process.env.DB_HOST,
    port: process.env.DB_PORT,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    charset: "utf8mb4",
    database: process.env.DB_NAME,
    ssl: {
        ca: cert
    }
})

// Conexión exitosa
conn.connect((err) =>{
    if(err){
        console.log("Error de conexión")
        throw err
    }else{
        console.log("Conexión exitosa")
    }
})

let puerto = 3000
let app = express()

app.use(express.urlencoded({extended: true}))

app.get("/", (req, res) =>{
    res.send("hola")
})

app.get("/tablas", (req, res) =>{
    conn.query("SHOW TABLES", (err, result) =>{
        if(err){
            throw err
        }else{
            res.send(result)
        }
    })
})

app.get("/crear-tabla", (req, res) =>{
    let sql = `CREATE TABLE IF NOT EXISTS clientes (
                    id INT NOT NULL AUTO_INCREMENT,
                    nombre VARCHAR(100) NOT NULL,
                    apellido VARCHAR(100) NOT NULL,
                    edad INT NOT NULL,
                    PRIMARY KEY (id)) ENGINE = InnoDB;`
    conn.query(sql, (err, result) =>{
        if(err){
            throw err
        }else{
            res.send("Tabla creada")
        }
    })
})

app.get("/insertar-clientes", (req, res) =>{
    let sql = "INSERT INTO clientes (nombre, apellido, edad) VALUES ('Jose', 'Medina', 26);"
    conn.query(sql, (err, result) =>{
        if(err){
            throw err
        }else{
            res.send("Cliente insertado")
        }
    })
})

app.get("/mostrar-clientes", (req, res) =>{
    let sql = "SELECT * FROM clientes"
    conn.query(sql, (err, result) =>{
        if(err){
            throw err
        }else{
            res.send(result)
        }
    })
})

app.get("/eliminar-clientes", (req, res) =>{
    let sql = `DELETE FROM clientes WHERE id <> 1;`
    conn.query(sql, (err, result) =>{
        if(err){
            throw err
        }else{
            res.send("Clientes eliminados")
        }
    })
})

app.post("/crear-cliente", (req, res) =>{
    let nombre = req.body.nombre
    let apellido = req.body.apellido
    let edad = req.body.edad
    let sql = `INSERT INTO clientes (nombre, apellido, edad) VALUES (?, ?, ?);`
    conn.query(sql, [nombre, apellido, edad], (err, result) =>{
        if(err){
            throw err
        }else{
            res.send("Usuario creado")
        }
    })
})

app.listen(puerto, () =>{
    console.log(`Servidor iniciado en el puerto ${puerto}`)
})
