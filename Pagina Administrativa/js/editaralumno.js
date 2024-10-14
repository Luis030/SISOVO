function mostrarEditarNombre() { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (divNombre.classList.contains('visible')) {
        divNombre.classList.remove('visible');
    } else {
        divNombre.classList.add('visible'); 
        divApellido.classList.remove('visible');
        divFecha.classList.remove('visible');
        divMail.classList.remove('visible');
        divCel.classList.remove('visible'); 
    }
}

function mostrarEditarApellido() { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (divApellido.classList.contains('visible')) {
        divApellido.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible'); 
        divApellido.classList.add('visible');
        divFecha.classList.remove('visible');
        divMail.classList.remove('visible');
        divCel.classList.remove('visible'); 
    }
}

function mostrarEditarFecha() { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (divFecha.classList.contains('visible')) {
        divFecha.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible'); 
        divApellido.classList.remove('visible');
        divFecha.classList.add('visible');
        divMail.classList.remove('visible');
        divCel.classList.remove('visible'); 
    }
}

function mostrarEditarMail() { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (divMail.classList.contains('visible')) {
        divMail.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible'); 
        divApellido.classList.remove('visible');
        divFecha.classList.remove('visible');
        divMail.classList.add('visible');
        divCel.classList.remove('visible'); 
    }
}

function mostrarEditarCelular() { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (divCel.classList.contains('visible')) {
        divCel.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible'); 
        divApellido.classList.remove('visible');
        divFecha.classList.remove('visible');
        divMail.classList.remove('visible');
        divCel.classList.add('visible'); 
    }
}

function volverAtras() {
    window.history.back();
}

let tipo = '';

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
        fetch("php/cambiarclases.php?tipo=" + tipo + "&&nombre=" + nombreNuevo.value + "&&id=" + id)
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

function guardarDia(id) {
    const diaNuevo = document.getElementById('ingresarDia');
    const spanDia = document.getElementById('spanDia');
    if (diaNuevo.value === "" || diaNuevo.value === "Seleccione un día") {
        Swal.fire({
            title: "Error!",
            text: "Debes ingresar un día.",
            icon: "error",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        tipo = "dia";
        fetch("php/cambiarclases.php?tipo=" + tipo + "&&dia=" + diaNuevo.value + "&&id=" + id)
        .then(datos => datos.json())
        .then(datos => {    
            if (datos.mensaje == "si") {
                Swal.fire({
                    title: "Correcto!",
                    text: "Día cambiado correctamente.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000
                })
                spanDia.textContent = diaNuevo.value;
            }
        })
    }
}

function guardarInicio(id) {
    const inicioNuevo = document.getElementById('horaInicio');
    const spanInicio = document.getElementById('spanInicio');
    if (inicioNuevo.value == "" || inicioNuevo.value < "08:00" || inicioNuevo.value >= "18:00") {
        Swal.fire({
            title: "Error!",
            text: "Debes ingresar una franja de tiempo valida (08:00 - 18:00).",
            icon: "error",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        tipo = "inicio";
        fetch("php/cambiarclases.php?tipo=" + tipo + "&&inicio=" + inicioNuevo.value + "&&id=" + id)
        .then(datos => datos.json())
        .then(datos => {    
            if (datos.mensaje == "si") {
                Swal.fire({
                    title: "Correcto!",
                    text: "Hora de inicio cambiada correctamente.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000
                })
                spanInicio.textContent = inicioNuevo.value;
            }
        })
    }
}

function guardarFinal(id) {
    const finalNuevo = document.getElementById('horaFinal');
    const spanFinal = document.getElementById('spanFinal');
    if (finalNuevo.value == "" || finalNuevo.value < "08:00" || finalNuevo.value >= "18:00") {
        Swal.fire({
            title: "Error!",
            text: "Debes ingresar una franja de tiempo valida (08:00 - 18:00).",
            icon: "error",
            showConfirmButton: false,
            timer: 3000
        })
    } else {
        tipo = "final";
        fetch("php/cambiarclases.php?tipo=" + tipo + "&&final=" + finalNuevo.value + "&&id=" + id)
        .then(datos => datos.json())
        .then(datos => {    
            if (datos.mensaje == "si") {
                Swal.fire({
                    title: "Correcto!",
                    text: "Hora final cambiada correctamente.",
                    icon: "success",
                    showConfirmButton: false,
                    timer: 3000
                })
                spanFinal.textContent = finalNuevo.value;
            }
        })
    }
}

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
        fetch("php/cambiarclases.php?tipo=" + tipo + "&&docente=" + docenteNuevo.value + "&&id=" + id)
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