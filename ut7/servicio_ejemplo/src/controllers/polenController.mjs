import {getAll, getByName} from "../models/polenModel.mjs"

export const getAllPolen = async (req, res) => {
    try{
        const polen = await getAll()
        res.json(polen)
    }catch(error){
        res.status(500).json({mensaje: "Error consiguiendo TODOS los datos del polen", error})
    }
}

export const getPolenByName = async (req, res) => {
    try{
        const polen = await getByName(req.params.name)
        if(!polen){
            return res.status(404).json({mensaje: "Polen no encontrado"})
        }else{
            res.json(polen)
        }
    }catch(error){
        res.status(500).json({mensaje: `Error consiguiendo los datos del polen ${req.params.name}`, error})
    }
}