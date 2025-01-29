import {initializeApp} from "firebase/app"
import { getFirestore, collection,getDocs, query, where, setDoc, doc, getDoc, addDoc, deleteDoc} from "firebase/firestore";


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

export const registrar = async (email, password) => {
  const db = getFirestore()
  const coleccion = collection(db, "registros_clase")
  const data = {
    email: email,
    password: password,
    num_tokens: 50
  }
  const docRef = doc(coleccion,email.toLowerCase()) // referencia al documento
  const resultadosBusqueda = await getDoc(docRef)
  if(!resultadosBusqueda.exists()){
    const resultInsert = await setDoc(docRef, data)
    return true
  }else{
    return null
  }
}

export const borrarTodosMenos = async (email) => {
  const db = getFirestore()
  const coleccion = collection(db, "registros_clase")
  const q = query(coleccion, where("email", "!=", email))
  const resultQ = await getDocs(q)
  resultQ.forEach(f => {
    deleteDoc(f.ref)
  })

}