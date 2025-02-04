import {v4 as uuidv4} from "uuid"
import {buscarAPIKey, registrarAPIKey, buscarEmail, comprobarLogin} from "../config/firebase.mjs"

export const generarAPIKeyFirebase = () => {
    const apiKey = uuidv4()
    return apiKey
}
export const buscarAPIKeyFirebase = async (clave) => {
    await buscarAPIKey(clave)
}

export const buscarEmailFirebase = async (email) => {
    await buscarEmail(email)
}

export const registrarAPIKeyFirebase = async (email, password, API_KEY) => {
    await registrarAPIKey(email, password, API_KEY)
}

export const comprobarLoginFirebase = async (email, password) => {
    await comprobarLogin(email, password)
}
