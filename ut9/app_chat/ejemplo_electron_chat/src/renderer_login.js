window.onload = () => {
    
    const axios = require('axios')
    const {ipcRenderer} = require("electron")

    const usernameInput = document.getElementById('username')
    const passwordInput = document.getElementById('password')
    const loginButton = document.getElementById('login-btn')
    const error = document.getElementById('error-login')
    const registerButton = document.getElementById("go-register-btn")
    
    loginButton.onclick = login
    registerButton.onclick = goRegister

    async function login(){
        const username = usernameInput.value
        const password = passwordInput.value

        if(username && username.trim().length > 3 && password && password.trim().length > 0){
            try{
                const res = await axios.get('http://localhost:3000/users')
                res.data.forEach(user => {
                    if(user.user === username && user.password === password){
                        console.log("dentro")
                        ipcRenderer.send("navigate-to-chat")
                    }
                })
                /*if(res.status === 200){
                    window.location.href = 'chat.html'
                }else{
                    error.innerText = 'Error al iniciar sesión'
                }*/
            }catch(err){
                error.innerText = 'Error al iniciar sesión'
            }
        }else{
            error.innerText = 'Debes introducir un nombre de usuario'
            registerButton.hidden = false
        }
    }

    function goRegister(){
        ipcRenderer.send("navigate-to-register")
    }
}