const {app, BrowserWindow, ipcMain} = require("electron")

let ventanaLogin
let ventanaRegistro
let ventanaChat

const createVentanaLogin = (height, width) => {
    ventanaLogin = new BrowserWindow({
    height: height,
    width: width,
    resizable: false,
    webPreferences: {
      nodeIntegration: true,
      contextIsolation: false
    }
  })
  ventanaLogin.loadFile("src/index.html")
}

const createVentanaRegistro = (height, width) => {
    ventanaRegistro = new BrowserWindow({
    height: height,
    width: width,
    resizable: false,
    webPreferences: {
      nodeIntegration: true,
      contextIsolation: false
    }
  })
  ventanaRegistro.loadFile("src/register.html")
}
const createVentanaChat = (height, width) => {
  ventanaChat = new BrowserWindow({
  height: height,
  width: width,
  resizable: false,
  webPreferences: {
    nodeIntegration: true,
    contextIsolation: false
  }
})
ventanaChat.loadFile("src/chat.html")
}

app.whenReady().then(()=> {
  createVentanaLogin(800, 800)
})

ipcMain.on("navigate-to-register", () => {
  if(ventanaLogin){
    ventanaLogin.close()
  }
  createVentanaRegistro()
})

ipcMain.on("navigate-to-chat", () => {
  if(ventanaLogin){
    ventanaLogin.close()
  }
  createVentanaChat()
})



app.on("window-all-closed", () => {
  if (process.platform !== "darwin") app.quit()
})