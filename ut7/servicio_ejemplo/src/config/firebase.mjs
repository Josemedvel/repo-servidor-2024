import {initializeApp} from "firebase/app"
import { getFirestore, collection,getDocs, query, where, setDoc, doc, getDoc} from "firebase/firestore";


const firebaseConfig = {
  apiKey: process.env.API_KEY,
  authDomain: process.env.DOMAIN,
  projectId: process.env.PROJECT_ID,
  storageBucket: process.env.STORAGE_BUCKET,
  messagingSenderId: process.env.SENDER_ID,
  appId: process.env.APP_ID
};

// Inicializar Firebase
const firebaseApp = initializeApp(firebaseConfig);


// Busca una clave API y devuelve el documento donde está, puede no existir
export const buscarAPIKey = async (clave) =>{
    const db = getFirestore()
    const users = collection(db, "users")

    const usersAPIQuery = query(users, where("API_KEY", "==", clave))
    const result = await getDocs(usersAPIQuery)
    if(!result.empty){
        return result.docs[0]
    }else{
        return null // no hay nada con esa clave
    }
}

// guardar clave API asociada a un usuario
export const registrarAPIKey = async (email, password, API_KEY) => {
    const db = getFirestore()
    const users = doc(collection(db, "users"), email)
    const info = {
        email: email,
        password: password,
        API_KEY: API_KEY
    }
    await setDoc(users, info)
}

// Busca un email en la base de usuarios y lo devuelve, puede no existir
export const buscarEmail = async (email) => {
    const db = getFirestore()
    const docRef = doc(db, "users", email.toLowerCase())
    const docSnap = await getDoc(docRef)
    return docSnap
}

export const comprobarLogin = async (email, password) => {
    const db = getFirestore()
    const docSnap = buscarEmail(email)
    if(docSnap.exists){ // si existe el usuario se mira la constraseña
        const data = docSnap.data()
        console.log("La info es: " + data)
    }else{
        console.table(docSnap)
    }
}