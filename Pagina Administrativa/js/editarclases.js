function mostrarEditarNombre() { 
    const divNombre = document.getElementById('editandoNombre');
    /*const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');*/
    const divDocente = document.getElementById('editandoDocente');
    if (divNombre.classList.contains('visible')) {
        divNombre.classList.remove('visible');
    } else {
        divNombre.classList.add('visible'); 
        /*divDia.classList.remove('visible');
        divInicio.classList.remove('visible');
        divFinal.classList.remove('visible');*/
        divDocente.classList.remove('visible'); 
    }
}

/*function mostrarEditarDia() { 
    const divNombre = document.getElementById('editandoNombre');
    const divDia = document.getElementById('editandoDia');  
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');
    const divDocente = document.getElementById('editandoDocente');
    if (divDia.classList.contains('visible')) {
        divDia.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divDia.classList.add('visible');
        divInicio.classList.remove('visible');
        divFinal.classList.remove('visible');
        divDocente.classList.remove('visible'); 
    }
}*/

/*function mostrarEditarInicio() { 
    const divNombre = document.getElementById('editandoNombre');
    const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');
    const divDocente = document.getElementById('editandoDocente');
    if (divInicio.classList.contains('visible')) {
        divInicio.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divDia.classList.remove('visible');
        divInicio.classList.add('visible');
        divFinal.classList.remove('visible');
        divDocente.classList.remove('visible'); 
    }
}*/

/*function mostrarEditarFinal() { 
    const divNombre = document.getElementById('editandoNombre');
    const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');
    const divDocente = document.getElementById('editandoDocente');
    if (divFinal.classList.contains('visible')) {
        divFinal.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divDia.classList.remove('visible');
        divInicio.classList.remove('visible');
        divFinal.classList.add('visible');
        divDocente.classList.remove('visible');
    }
}*/

function mostrarEditarDocente() { 
    const divNombre = document.getElementById('editandoNombre');
    /*const divDia = document.getElementById('editandoDia');
    const divInicio = document.getElementById('editandoInicio');
    const divFinal = document.getElementById('editandoFinal');*/
    const divDocente = document.getElementById('editandoDocente');
    if (divDocente.classList.contains('visible')) {
        divDocente.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        /*divDia.classList.remove('visible');
        divInicio.classList.remove('visible');
        divFinal.classList.remove('visible');*/
        divDocente.classList.add('visible');
    }
}

function volverAtras() {
    window.history.back();
}

let tipo = '';

//POST
function guardarNombre(id) {
    const nombreNuevo = document.getElementById('ingresarNombre');
    const spanNombre = document.getElementById('spanNombre');
    if (nombreNuevo.value == "") {
        Swal.fire({
            title: "Error!",
            text: "Debes ingresar un nombre.",
            icon: "error",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        tipo = "nombre";
        fetch("php/cambiarclases.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "tipo=" + tipo + "&nombre=" + nombreNuevo.value + "&id=" + id
        })
        .then(datos => datos.json())
        .then(datos => {    
            if (datos.mensaje == "si") {
                Swal.fire({
                    title: "Correcto!",
                    text: "Nombre cambiado correctamente.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000
                })
                spanNombre.textContent = nombreNuevo.value;
            }
        })
    }
}

//POST
function guardarDocente(id) {
    const docenteNuevo = document.getElementById('ingresarDocente');
    const spanDocente = document.getElementById('spanDocente');
    if (docenteNuevo.value == "") {
        Swal.fire({
            title: "Error!",
            text: "Debes ingresar un docente.",
            icon: "error",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        tipo = "docente";
        fetch("php/cambiarclases.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "tipo=" + tipo + "&docente=" + docenteNuevo.value + "&id=" + id
        })
        .then(datos => datos.json())
        .then(datos => {    
            if (datos.mensaje == "si") {
                Swal.fire({
                    title: "Correcto!",
                    text: "Docente cambiado correctamente.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000
                })
                spanDocente.textContent = datos.docente;
            }
        })
    }
}