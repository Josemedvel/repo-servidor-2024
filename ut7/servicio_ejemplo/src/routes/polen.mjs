import express from "express"
import {getAllPolen, getPolenByName} from "../controllers/polenController.mjs"

const router = express.Router()

router.get("/", getAllPolen)
router.get("/:name", getPolenByName)

export default router