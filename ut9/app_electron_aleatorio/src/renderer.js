window.onload = () => {
    const numeroBtn = document.getElementById("numero-btn")
    const numeroDiv = document.getElementById("espacio-numero")
    const rutaAPI = "http://localhost:3000/numero"
    const axios = require("axios")

    numeroBtn.onclick = pedirNumero

    async function pedirNumero(){
        const resultado = await axios.get(rutaAPI)
        numeroDiv.innerText = resultado.data.numero
    }
}