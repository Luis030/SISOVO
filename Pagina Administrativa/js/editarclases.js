function mostrarEditarNombre() { 
    const divNombre = document.getElementById('editandoNombre');
    const divHorario = document.getElementById('editandoHorario');
    const divDocente = document.getElementById('editandoDocente');
    if (divNombre.classList.contains('visible')) {
        divNombre.classList.remove('visible');
    } else {
        divNombre.classList.add('visible'); 
        divHorario.classList.remove('visible');
        divDocente.classList.remove('visible'); 
    }
}

function mostrarEditarHorario() {
    const divNombre = document.getElementById('editandoNombre');
    const divHorario = document.getElementById('editandoHorario');
    const divDocente = document.getElementById('editandoDocente');
    if (divHorario.classList.contains('visible')) {
        divHorario.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divHorario.classList.add('visible');
        divDocente.classList.remove('visible');
        var horario = window.horario;
        var input = document.getElementById('ingresarHorario');
        input.value = horario
    }
}

function mostrarEditarDocente() { 
    const divNombre = document.getElementById('editandoNombre');
    const divHorario = document.getElementById('editandoHorario');
    const divDocente = document.getElementById('editandoDocente');
    if (divDocente.classList.contains('visible')) {
        divDocente.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible');
        divHorario.classList.remove('visible');
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

function guardarHorario(id) {
    const horarioNuevo = document.getElementById('ingresarHorario');
    const spanHorario = document.getElementById('spanHorario');
    if (horarioNuevo.value == "") {
        Swal.fire({
            title: "Error!",
            text: "Debes ingresar un horario.",
            icon: "error",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        tipo = "horario";
        fetch("php/cambiarclases.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "tipo=" + tipo + "&horario=" + horarioNuevo.value + "&id=" + id
        })
        .then(datos => datos.json())
        .then(datos => {    
            if (datos.mensaje == "si") {
                Swal.fire({
                    title: "Correcto!",
                    text: "Horario cambiado correctamente.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000
                })
                spanHorario.textContent = datos.horario;
            }
        })
    }
}