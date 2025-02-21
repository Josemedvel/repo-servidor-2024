import { createServer } from "http"
import { Server } from "socket.io"
import express from "express"
import conn from "./connection.mjs"

const app = express()
const server = createServer(app)
const io = new Server(server)
const port = 3000

app.use(express.json())
app.use(express.urlencoded({ extended: true }))

app.put("/ingesta", async (req, res) => {
    try {
        await conn.execute(`
            CREATE TABLE IF NOT EXISTS mensajes(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                user TEXT NOT NULL,
                message TEXT NOT NULL,
                sent_at INTEGER DEFAULT (unixepoch())
            )`)
        await conn.execute(`
            CREATE TABLE IF NOT EXISTS users(
                user TEXT PRIMARY KEY,
                password TEXT NOT NULL
            )`)
        res.sendStatus(200)
    } catch (err) {
        console.error("Error creating table:", err)
        res.sendStatus(500)
    }
})
app.get("/messages", async (req, res) => {
    try{
        const messages = await conn.execute({
            sql: `SELECT * FROM mensajes`
        })
        res.json(messages.rows)
    }catch(err){
        console.error("Error getting messages:", err)
        res.sendStatus(500)
    }
})

app.post("/message", async (req, res) => {
    const { username, message } = req.body
    try {
        await conn.execute({
            sql: `INSERT INTO mensajes (user, message) VALUES (?, ?)`,
            args: [username, message]
        })
        io.emit("new_message", { username, message })
        res.sendStatus(200)
    } catch (err) {
        console.error("Error inserting message:", err)
        res.sendStatus(500)
    }
})

app.get("/users", async (req, res) => {
    try{
        const users = await conn.execute(`SELECT * FROM users`)
        res.json(users.rows)
    }catch(err){
        console.error("Error getting users:", err)
        res.sendStatus(500)
    }
})

app.delete("/mensajes", async (req, res) => {
    try {
        await conn.execute(`DELETE FROM mensajes`)
        res.sendStatus(200)
    } catch (err) {
        console.error("Error deleting mensajes:", err)
        res.sendStatus(500)
    }
})

app.delete("/users", async (req, res) => {
    try {
        await conn.execute(`DELETE FROM users`)
        res.sendStatus(200)
    } catch (err) {
        console.error("Error deleting users:", err)
        res.sendStatus(500)
    }
})


app.put("/register", async (req, res) => {
    const { username, password } = req.body
    try {
        await conn.execute({
            sql: `INSERT INTO users (user, password) VALUES (?, ?)`,
            args: [username, password]
        })
        res.sendStatus(200)
    } catch (err) {
        console.error("Error registering user:", err)
        res.sendStatus(500)
    }
})

io.on("connection", async (socket) => {
    try {
        await conn.execute({
            sql:`INSERT INTO mensajes (user, message) VALUES (?, ?)`,
            params: ["ADMIN", "Un usuario se ha conectado"]
        })
    } catch (err) {
        console.log("Error inserting connection message:", err)
    }

    socket.on("disconnect", async () => {
        try {
            await conn.execute({
                sql:`INSERT INTO mensajes (user, message) VALUES (?, ?)`,
                params: ["ADMIN", "Un usuario se ha desconectado"]
            })
        } catch (err) {
            console.log("Error inserting disconnection message:", err)
        }
    })
})

server.listen(port, () => {
    console.log(`Servidor de chat iniciado en ${port}`)
})