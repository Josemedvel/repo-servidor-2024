import db from "../config/db.mjs"

export const getAll = async ()=>{
    const [registros] = await db.query("SELECT * FROM polen")
    return registros
}

export const getByName = async (nombre) => {
    const busqueda = `%${nombre}%`
    const [registros] = await db.query("SELECT * FROM polen WHERE tipo_polinico LIKE ?", [busqueda])
    return registros[0]
}