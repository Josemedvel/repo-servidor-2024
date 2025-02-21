window.onload = () => {
    const chat = document.getElementById("messages")
    const rutaGETMensajes = "http://localhost:3000/messages"
    const axios = require("axios")
    (async function getMessages(){
        const mensajes = await axios.get(rutaGETMensajes)
        console.log(mensajes)
    })
}