import z from "zebras"
import mysql from "mysql2/promise"
import path from "path"
import { readFileSync } from "fs"
import process from "process"

const actualDir = path.resolve(".")
const certPath = path.join(actualDir, "ca.pem")
const cert = readFileSync(certPath)

const df = z.readCSV("./polen_madrid_23_01_25.csv")
const df_numero = z.parseNums(["granos_de_polen_x_metro_cubico"], df)
console.table(z.head(5, df_numero))

const conn = await mysql.createConnection({
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

/*
conn.connect((error)=>{
    if(error){
        throw error
    }else{
        console.log("Conexión establecida")
    }
})*/

const cleanTable = "DROP TABLE IF EXISTS polen_clase"

await conn.query(cleanTable)
console.log("Tabla polen_clase borrada")

const createTable = `CREATE TABLE polen_clase(
    id INTEGER AUTO_INCREMENT PRIMARY KEY,
    captador CHAR(4),
    fecha_lectura DATETIME,
    tipo_polinico VARCHAR(30),
    granos_m3 INTEGER
)`

await conn.query(createTable)
console.log("Tabla polen_clase creada")


const insertTable = `INSERT INTO polen_clase (captador, fecha_lectura, tipo_polinico, granos_m3)
VALUES (?, ?, ?, ?)`
for(const fila of df_numero){
    const {captador, fecha_lectura, tipo_polinico, granos_de_polen_x_metro_cubico} = fila
    await conn.query(insertTable, [captador, fecha_lectura, tipo_polinico, granos_de_polen_x_metro_cubico])
}
console.log("Insertadas con éxito")



