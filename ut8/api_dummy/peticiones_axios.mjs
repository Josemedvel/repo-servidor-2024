import axios from "axios"

// esta petición no espera (asíncrona) y no hace nada con la respuesta
axios.delete("http://localhost:3001/api/datos?id=15")

/*
// esta petición no espera que ejecute y tiene promesas con callback
axios.get("http://localhost:3001/api/datos", {
    params:{nombre: "Aitor", apellido:"Molina"}
})
.then(response => {
    console.log(response.data)
})
.catch(error => {
    console.error(error)
})
.finally(()=>{
    console.log("Esto ejecuta siempre y al final")
})


// esta petición es síncrona, usamos una función async para poder meter el await
async function getInfo(){
    try{
        const respuesta = await axios.get("http://localhost:3001/api/datos", {
            params:{nombre: "Aitor", apellido:"Molina"}
        })
        console.log(respuesta.data)
    }catch(err){
        console.log(err)
    }
}
getInfo()
*/