function mostrarEditarNombre(who) { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (who == "alumno") {
        const divGrado = document.getElementById('editandoGrado');
        if (divNombre.classList.contains('visible')) {
            divNombre.classList.remove('visible');
        } else {
            divNombre.classList.add('visible'); 
            divApellido.classList.remove('visible');
            divFecha.classList.remove('visible');
            divMail.classList.remove('visible');
            divCel.classList.remove('visible'); 
            divGrado.classList.remove('visible');
        }
    }
    if (who == "docente") {
        const divOcu = document.getElementById('editandoOcupacion');
        if (divNombre.classList.contains('visible')) {
            divNombre.classList.remove('visible');
        } else {
            divNombre.classList.add('visible'); 
            divApellido.classList.remove('visible');
            divFecha.classList.remove('visible');
            divMail.classList.remove('visible');
            divCel.classList.remove('visible'); 
            divOcu.classList.remove('visible');
        }
    }
}

function mostrarEditarApellido(who) { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (who == "alumno") {
        const divGrado = document.getElementById('editandoGrado');
        if (divApellido.classList.contains('visible')) {
            divApellido.classList.remove('visible');
        } else {
            divNombre.classList.remove('visible'); 
            divApellido.classList.add('visible');
            divFecha.classList.remove('visible');
            divMail.classList.remove('visible');
            divCel.classList.remove('visible'); 
            divGrado.classList.remove('visible');
        }
    }
    if (who == "docente") {
        const divOcu = document.getElementById('editandoOcupacion');
        if (divApellido.classList.contains('visible')) {
            divApellido.classList.remove('visible');
        } else {
            divNombre.classList.remove('visible'); 
            divApellido.classList.add('visible');
            divFecha.classList.remove('visible');
            divMail.classList.remove('visible');
            divCel.classList.remove('visible'); 
            divOcu.classList.remove('visible');
        }
    }
}

function mostrarEditarFecha(who) { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (who == "alumno") {
        const divGrado = document.getElementById('editandoGrado');
        if (divFecha.classList.contains('visible')) {
            divFecha.classList.remove('visible');
        } else {
            divNombre.classList.remove('visible'); 
            divApellido.classList.remove('visible');
            divFecha.classList.add('visible');
            divMail.classList.remove('visible');
            divCel.classList.remove('visible'); 
            divGrado.classList.remove('visible');
        }
    }
    if (who == "docente") {
        const divOcu = document.getElementById('editandoOcupacion');
        if (divFecha.classList.contains('visible')) {
            divFecha.classList.remove('visible');
        } else {
            divNombre.classList.remove('visible'); 
            divApellido.classList.remove('visible');
            divFecha.classList.add('visible');
            divMail.classList.remove('visible');
            divCel.classList.remove('visible'); 
            divOcu.classList.remove('visible');
        }
    }
}

function mostrarEditarMail(who) { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (who == "alumno") {
        const divGrado = document.getElementById('editandoGrado');
        if (divMail.classList.contains('visible')) {
            divMail.classList.remove('visible');
        } else {
            divNombre.classList.remove('visible'); 
            divApellido.classList.remove('visible');
            divFecha.classList.remove('visible');
            divMail.classList.add('visible');
            divCel.classList.remove('visible'); 
            divGrado.classList.remove('visible');
        }
    }
    if (who == "docente") {
        const divOcu = document.getElementById('editandoOcupacion');
        if (divMail.classList.contains('visible')) {
            divMail.classList.remove('visible');
        } else {
            divNombre.classList.remove('visible'); 
            divApellido.classList.remove('visible');
            divFecha.classList.remove('visible');
            divMail.classList.add('visible');
            divCel.classList.remove('visible'); 
            divOcu.classList.remove('visible');
        }
    }
}

function mostrarEditarCelular(who) { 
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    if (who == "alumno") {
        const divGrado = document.getElementById('editandoGrado');
        if (divCel.classList.contains('visible')) {
            divCel.classList.remove('visible');
        } else {
            divNombre.classList.remove('visible'); 
            divApellido.classList.remove('visible');
            divFecha.classList.remove('visible');
            divMail.classList.remove('visible');
            divCel.classList.add('visible'); 
            divGrado.classList.remove('visible');
        }
    }
    if (who == "docente") {
        const divOcu = document.getElementById('editandoOcupacion');
        if (divCel.classList.contains('visible')) {
            divCel.classList.remove('visible');
        } else {
            divNombre.classList.remove('visible'); 
            divApellido.classList.remove('visible');
            divFecha.classList.remove('visible');
            divMail.classList.remove('visible');
            divCel.classList.add('visible'); 
            divOcu.classList.remove('visible');
        }
    }
}

function mostrarEditarOcupacion() {
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    const divOcu = document.getElementById('editandoOcupacion');
    if (divOcu.classList.contains('visible')) {
        divOcu.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible'); 
        divApellido.classList.remove('visible');
        divFecha.classList.remove('visible');
        divMail.classList.remove('visible');
        divCel.classList.remove('visible'); 
        divOcu.classList.add('visible');
    }
}

function mostrarEditarGrado() {
    const divNombre = document.getElementById('editandoNombre');
    const divApellido = document.getElementById('editandoApellido');
    const divFecha = document.getElementById('editandoFecha');
    const divMail = document.getElementById('editandoMail');
    const divCel = document.getElementById('editandoCelular');
    const divGrado = document.getElementById('editandoGrado');
    if (divGrado.classList.contains('visible')) {
        divGrado.classList.remove('visible');
    } else {
        divNombre.classList.remove('visible'); 
        divApellido.classList.remove('visible');
        divFecha.classList.remove('visible');
        divMail.classList.remove('visible');
        divCel.classList.remove('visible'); 
        divGrado.classList.add('visible');
    }
}

function volverAtras() {
    window.history.back();
}

function formatearFecha(fechaSQL) {
    const [anio, mes, dia] = fechaSQL.split('-');
    return `${dia}/${mes}/${anio}`;
}

//POST
function guardarAtributo(id, atributo, tipo) {
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
            const divNombre = document.getElementById('editandoNombre');
            divNombre.classList.remove('visible');
            nombreNuevo.value = "";
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
            const divApellido = document.getElementById('editandoApellido');
            divApellido.classList.remove('visible');
            apellidoNuevo.value = "";
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
            const divFecha = document.getElementById('editandoFecha');
            divFecha.classList.remove('visible');
            fechaNuevo.value = "";
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
            const divMail = document.getElementById('editandoMail');
            divMail.classList.remove('visible');
            mailNuevo.value = "";
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
            const divCel = document.getElementById('editandoCelular');
            divCel.classList.remove('visible');
            celularNuevo.value = "";
        }
    }
    if (atributo == "ocupacion") {
        if ($('#ingresarOcupacion').val() === null) {
            Swal.fire({
                title: "Error!",
                text: "Debes ingresar una ocupación.",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            })
        } else {
            txt = $('#ingresarOcupacion').val();
            valido = true;
            const divOcu = document.getElementById('editandoOcupacion');
            divOcu.classList.remove('visible');
            $('#ingresarOcupacion').val(null).trigger('change');
        }
    }
    if (atributo == "grado") {
        const gradoNuevo = document.getElementById('ingresarGrado');
        if (gradoNuevo.value === "") {
            Swal.fire({
                title: "Error!",
                text: "Debes ingresar el grado.",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            })
        } else {
            txt = gradoNuevo.value;
            valido = true;
            const divGrado = document.getElementById('editandoGrado');
            divGrado.classList.remove('visible');
            gradoNuevo.value = "";
        }
    }
    if (valido === true) {  
        if (txt != '') {
            fetch("php/actualizarpersona.php", {
                method: "POST",
                headers: {
                    "Content-Type": "application/x-www-form-urlencoded"
                },
                body: "id=" + id + "&atributo=" + atributo + "&txt=" + txt + "&tipo=" + tipo 
            })
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
                    if (atributo == "ocupacion") {
                        const spanOcupacion = document.getElementById('spanOcupacion');
                        spanOcupacion.textContent = datos.nombre;
                        const idDocente = window.idDocente;
                        const idOcu = txt;
                        $('#agregarEspDocente').select2({
                            placeholder: 'Seleccione especialidades para agregar',
                            minimumInputLength: 0,
                            cache: true,
                            ajax: {
                                url: 'php/obtenerespecialidades.php',
                                dataType: 'json',
                                delay: 250,
                                method: "POST",
                                data: function (params) {
                                    return {
                                        q: params.term || '',
                                        editardocente: "si",
                                        id: idDocente,
                                        ido: idOcu
                                    };
                                },
                                processResults: function (data) {
                                    return {
                                        results: data.map(function (especialidades) {
                                            return { id: especialidades.ID_Especializacion, text: especialidades.Nombre };
                                        })
                                    };
                                },
                                cache: true
                            }
                        })
                        setInterval(() => {
                            location.reload();
                        }, 3500);
                    }
                    if (atributo == "grado") {
                        const spanGrado = document.getElementById('spanGrado');
                        spanGrado.textContent = txt + '°';
                    }
                    txt = '';
                }
                if (datos.mensaje == "no") {
                    if (atributo == "ocupacion") {
                        Swal.fire({
                            title: "Error!",
                            text: datos.invalido,
                            icon: "error",
                            showConfirmButton: true
                        })
                    } else {
                        Swal.fire({
                            title: "Error!",
                            text: "Ha ocurrido un error inesperado",
                            icon: "error",
                            showConfirmButton: false,
                            timer: 3000
                        })
                    }
                }
            })
        }
    }
}

//POST
function agregarPatologias() {
    const tipo = 'alumno';
    var ida = window.idalumnotabla;
    var idp = $('#agregarPatAlumno').val();
    if (idp == "") {
        Swal.fire({
            title: "Error!",
            text: "Debes ingresar al menos una patología.",
            icon: "error",
            showConfirmButton: false,
            timer: 3000
        });
        exit;
    } else {
        $.ajax({
            url: 'php/agregarelementopersona.php',
            type: 'POST',
            data: {
                tipo: tipo,
                idp: idp,
                ida: ida
            },
            success: function() {
                tablas['tablapatalumno'].ajax.reload();
                $('#agregarPatAlumno').val(null).trigger('change');
                Swal.fire ({
                    title: "Correcto!",
                    text: "Patologías agregadas correctamente",
                    icon: "success",
                    showConfirmButton: false,   
                    timer: 3000
                })
            }
        })
    }
}

//POST
function agregarEspecialidad() {
    const tipo = 'docente';
    var idd = window.idDocente;
    var ide = $('#agregarEspDocente').val();
    if (ide == "") {
        Swal.fire({
            title: "Error!",
            text: "Debes ingresar al menos una especialización.",
            icon: "error",
            showConfirmButton: false,
            timer: 3000
        });
        exit;
    } else {
        $.ajax({
            url: 'php/agregarelementopersona.php',
            type: 'POST',
            data: {
                tipo: tipo,
                idd: idd,
                ide: ide
            },
            success: function() {
                tablas['tablaespdocente'].ajax.reload();
                $('#agregarEspDocente').val(null).trigger('change');
                Swal.fire ({
                    title: "Correcto!",
                    text: "Especializaciones agregadas correctamente",
                    icon: "success",
                    showConfirmButton: false,   
                    timer: 3000
                })
            }
        })
    }
}

//POST
function restaurarContraseña(tipo, nombre, apellido, cedula) {
    clave = window.clave;
    Swal.fire({
        title: "¿Seguro desea restablecer la contraseña?",
        text: "Por motivos de seguridad digite a continuación la clave maestra:",
        input: "text",
        inputPlaceholder: "Escriba aquí...",
        showCancelButton: true,
        confirmButtonText: 'Restaurar',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            const claveingresada = result.value;
                fetch("php/restaurarcontraseña.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "nom=" + nombre + "&ape=" + apellido + "&ced=" + cedula + "&tipo=" + tipo + "&con=" + claveingresada
                })
                .then(datos => datos.json())
                .then(datos => {
                    if (datos.estado == "restaurada") {
                        Swal.fire({
                            title: "Correcto!",
                            text: "Contraseña restaurada correctamente.",
                            icon: "success",
                            showConfirmButton: false, 
                            timer: 3000
                        })
                    }
                    if(datos.estado == "incorrecta"){
                        Swal.fire({
                            title: "Error",
                            text: "Clave maestra incorrecta",
                            icon: "error"
                        })
                    }
                })
                
            
        }
    })
}
