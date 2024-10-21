function mostrarEditarNombre() { 
    console.log("hola");
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

function formatearFecha(fechaSQL) {
    const [anio, mes, dia] = fechaSQL.split('-');
    return `${dia}/${mes}/${anio}`;
}


function guardarAtributo(id, atributo) {
    if (atributo == "nombre") {
        const nombreNuevo = document.getElementById('ingresarNombre');
        if (nombreNuevo.value == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes ingresar un nombre.",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            })
        } else {
            txt = nombreNuevo.value;
            valido = true;
        }
    }
    if (atributo == "apellido") {
        const apellidoNuevo = document.getElementById('ingresarApellido');
        if (apellidoNuevo.value == "") {
            Swal.fire({
                title: "Error!",
                text: "Debes ingresar un apellido.",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            })
        } else {
            txt = apellidoNuevo.value;
            valido = true;
        }
    }
    if (atributo == "fecha") {
        const fechaNuevo = document.getElementById('ingresarFecha');
        if (fechaNuevo.value === "") {
            Swal.fire({
                title: "Error!",
                text: "Debes ingresar una fecha.",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            });
        } else {
            txt = fechaNuevo.value;
            valido = true;
        }
    }
    if (atributo == "mail") {
        const mailNuevo = document.getElementById('ingresarMail');
        if (mailNuevo.value === "") {
            Swal.fire({
                title: "Error!",
                text: "Debes ingresar un mail.",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            });
        } else {
            txt = mailNuevo.value;
            valido = true;
        }
    }
    if (atributo == "celular") {
        const celularNuevo = document.getElementById('ingresarCelular');
        if (celularNuevo.value === "") {
            Swal.fire({
                title: "Error!",
                text: "Debes ingresar un celular.",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            })
        } else {
            txt = celularNuevo.value;
            valido = true;
        }
    }
    if (valido === true) {  
        if (txt != '') {
            fetch("php/cambiaralumno.php?id=" + id + "&&atributo=" + atributo + "&&txt=" + txt)
            .then(datos => datos.json())
            .then(datos => {    
                if (datos.mensaje == "si") {
                    Swal.fire({
                        title: "Correcto!",
                        text: "Atributo cambiado correctamente.",
                        icon: "success",
                        showConfirmButton: false,
                        timer: 3000
                    })
                    if (atributo == "nombre") {
                        const spanNombre = document.getElementById('spanNombre');   
                        spanNombre.textContent = txt;
                    }
                    if (atributo == "apellido") {
                        const spanApellido = document.getElementById('spanApellido');
                        spanApellido.textContent = txt;
                    }
                    if (atributo == "fecha") {
                        const spanFecha = document.getElementById('spanFecha');                 
                        spanFecha.textContent = formatearFecha(txt);
                    }
                    if (atributo == "mail") {
                        const spanMail = document.getElementById('spanMail');
                        spanMail.textContent = txt;
                    }
                    if (atributo == "celular") {
                        const spanCelular = document.getElementById('spanCelular');
                        spanCelular.textContent = txt;
                    }
                    txt = '';
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Ha ocurrido un error inesperado",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 3000
                    })
                }
            })
        }
    }
}
