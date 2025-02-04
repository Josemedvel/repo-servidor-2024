import express from "express"
import polenRoutes from "./polen.mjs"
import registerRoutes from "./register.mjs"
import loginRoutes from "./login.mjs"

const router = express.Router()

router.use("/admin", registerRoutes)
router.use("/admin", loginRoutes)

router.use("/polen", polenRoutes)

export default router