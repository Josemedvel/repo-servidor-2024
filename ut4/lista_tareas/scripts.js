window.onload = () =>{
    // seleccionado los elementos que tendrán eventos, y los que serán rellenados
    let botonAgregar = document.getElementById("annadir-boton");
    let botonBorrarTareas = document.getElementById("borrar-lista-boton");
    let seccionTareas = document.getElementById("seccion-tareas");
    let campoTarea = document.getElementById("campo-tarea");

    let tareasStorage = { ...localStorage};
    cargarTareasIniciales(tareasStorage);   
    
    
    botonBorrarTareas.addEventListener("click", borrarTodasLasTareas);
    botonAgregar.addEventListener("click", annadirTarea);


    function cargarTareasIniciales(tareas){
        for(let id in tareas){
            console.log(tareas[id]);
            const textoSpan = document.createElement("span");
            textoSpan.innerText = tareas[id];
            const divContenedor = document.createElement("div");
            divContenedor.id = id;
            divContenedor.className = "tarea";
            divContenedor.appendChild(textoSpan);
            seccionTareas.appendChild(divContenedor);
        }
    }


    function annadirTarea(){
        let textoCampo = campoTarea.value;
        if(textoCampo.length > 3){ // el input se considera suficientemente largo
            const textoSpan = document.createElement("span");
            textoSpan.innerText = textoCampo;
            const divContenedor = document.createElement("div");
            divContenedor.id = textoCampo.split(" ").join("_");
            divContenedor.className = "tarea";
            if(localStorage.getItem(divContenedor.id) == null){//ya está impresa
                divContenedor.appendChild(textoSpan);
                seccionTareas.appendChild(divContenedor);
                localStorage.setItem(divContenedor.id, textoCampo);   
            }else{
                alert("Esa tarea ya existe");
            }
            
        }else{
            alert("La tarea debe tener al menos 4 caracteres");
            campoTarea.value = "";
        }
    }

    function borrarTodasLasTareas(){
        seccionTareas.innerHTML = "";
        localStorage.clear();
        alert("Tareas borradas");
    }
};