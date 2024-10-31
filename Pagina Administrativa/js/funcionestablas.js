window.addEventListener('DOMContentLoaded', () => {
    if(document.querySelector('#tabla-docentes')){
        setInterval(actualizarListaDocente, 10000);
    }
    if(document.querySelector('#patsinA')){
        actualizarDatosPat();
    }

    if(document.querySelector('#ocusinD')){
        actualizarDatosOcu();
    }

    if(document.querySelector('#espsinD')){
        actualizarDatosEsp();
    }

    if(document.querySelector('.detalle-clases')){
        actualizarDetalleClases();
    }
})

//POST
function eliminarClase(id, nombre) {
    Swal.fire({
        title: "¿Estas seguro de borrar la clase <span class='nombre-clase'>" + nombre + "</span>?",
        text: "No se podra deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar"
        }).then((result) => {
        if (result.isConfirmed) {
            fetch("php/borrarclase.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: "id=" + id
            })
            .then(data => data.json())
            .then(dato => {
            if(dato.Resultado == "exitoso"){
                tablas['clases'].ajax.reload();
                Swal.fire({
                    title: "Borrado exitosamente.",
                    text: "Se ha borrado exitosamente la clase " + nombre,
                    icon: "success"
                });
            } else if (dato.Resultado == "error"){
                alert("error");
            }
        })
            
        }
    });
}

function editarClase(id){
    window.location.href = "editarclases.php?id="+id;
}

//POST
function ingresarAlumno(idclase){
    var select = document.getElementById('select-alumnos');
    var valoresSeleccionados = [];
    if (select.selectedOptions.length === 0) {
        console.log('No se ha seleccionado ninguna opción.');
        return;
    }
    for (var opcion of select.selectedOptions) {
        valoresSeleccionados.push(opcion.value);
    }
    console.log(valoresSeleccionados);
    console.log(idclase);
    fetch('php/agregaralumnoclase.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ 
            valores: valoresSeleccionados,
            id: idclase
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor:', data);
        tablas['alumnosclase'].ajax.reload();
        $('#select-alumnos').val(null).trigger('change');
        actualizarDetalleClases();        
        Swal.fire({
            icon: 'success',
            title: "Alumno ingresado correctamente"
        })
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

//POST
function eliminarAlumnoClase(idclase, idalumno) {
    Swal.fire({
        title: "¿Estas seguro de quitar el alumno?",
        text: "Se desvinculara al alumno",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar"
        }).then((result) => {
        if (result.isConfirmed) {
            fetch("php/sacaralumnoclase.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: "clase=" + idclase + "&&alumno=" + idalumno
            })
            .then(respuesta => respuesta.json())
            .then(data => {
            if(data.resultado == "exito") {
                actualizarDetalleClases();   
                Swal.fire({
                    title: "Borrado exitosamente.",
                    text: "Se ha borrado exitosamente el alumno",
                    icon: "success"
                });
                tablas['alumnosclase'].ajax.reload();
            }
            if(data.resultado == "error") {
                Swal.fire({
                    title: "Ha ocurrido un error",
                    text: "Algo ha salido mal.",
                    icon: "error"
                });
            }
    })
        }
    });
    
}

function pasarLista(idclase){
    window.location.href = "listaclases.php?idclase="+idclase;
}

function paginaConfirmarAsistencia(){
    window.open("confirmarasistencia", "_blank");
}

function actualizarListaDocente(){
    tablas['listadoc'].ajax.reload();
}

//POST
function eliminarElementoPersona(ide, idp, tipo) {
    if (tipo == "alumno") {
        Swal.fire({
            title: "¿Estas seguro de desvincular esta patología?",
            text: "Se desvinculara la patología del alumno",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, desvincular"
            }).then((result) => {
            if (result.isConfirmed) {
                fetch("php/eliminarelementopersona.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "ide=" + ide + "&idp=" + idp + "&tipo=" + tipo
                })
                .then(respuesta => respuesta.json())
                .then(data => {
                if(data.resultado == "exito"){
                    Swal.fire({
                        title: "Desvinculado exitosamente.",
                        text: "Se ha desvinculado exitosamente la patología",
                        icon: "success"
                    });
                    tablas['tablapatalumno'].ajax.reload();
                }
                if(data.resultado == "error"){
                    Swal.fire({
                        title: "Ha ocurrido un error",
                        text: "Algo ha salido mal.",
                        icon: "error"
                    });
                }
                })
            }
        });
    }
    if (tipo == "docente") {
        Swal.fire({
            title: "¿Estas seguro de desvincular esta especialización?",
            text: "Se desvinculara la especialidad del docente",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, desvincular"
            }).then((result) => {
            if (result.isConfirmed) {
                fetch("php/eliminarelementopersona.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "ide=" + ide + "&idp=" + idp + "&tipo=" + tipo
                })
                .then(respuesta => respuesta.json())    
                .then(data => {
                if(data.resultado == "exito"){
                    Swal.fire({
                        title: "Desvinculado exitosamente.",
                        text: "Se ha desvinculado exitosamente la patología",
                        icon: "success"
                    });
                    tablas['tablaespdocente'].ajax.reload();
                }
                if(data.resultado == "error"){
                    Swal.fire({
                        title: "Ha ocurrido un error",
                        text: "Algo ha salido mal.",
                        icon: "error"
                    });
                }
                })
            }
        });
    }
}

function editarAlumno(id){
    window.location.href = "detalle_alumnos.php?id=" + id;
}

//POST
function eliminarAlumno(id, nombre){
    Swal.fire({
        title: "¿Estas seguro de eliminar el alumno " + nombre + "?",
        text: "Se borrara de todas sus clases",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Borrar"
        }).then((result) => {
        if (result.isConfirmed) {
            fetch("php/borrarpersona.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: "id=" + id + "&p=alumno"
            })
            .then(data => data.json())
            .then(data => {
                console.log(data)
                if(data.Resultado == "exitoso"){
                    Swal.fire({
                        title: "Eliminado correctamente.",
                        text: "Se eliminado correctamente el alumno " + nombre,
                        icon: "success"
                    });
                    tablas['tablaalu'].ajax.reload();
                }
                if(data.resultado == "error"){
                    Swal.fire({
                        title: "Ha ocurrido un error",
                        text: "Algo ha salido mal.",
                        icon: "error"
                    });
                }
            })
        }
    });
}

function editarPat(id, nombre){
    Swal.fire({
        title: "Editar Patologia",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aceptar",
        html: `
        <span>Nombre: <input type='text' placeholder='${nombre}' id='nuevonombrePat'></span>
        `
    }).then((resultado) => {
        if(resultado.isConfirmed){
            const nuevoNombre = document.getElementById('nuevonombrePat').value;
            if(nuevoNombre){
                fetch("php/cambiarelementos.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: "id=" + id + "&nombre=" + nuevoNombre + "&tipo=pat&opcion=editar"
                })
                .then(datos => datos.json())
                .then(datos => {
                    if(datos.resultado == "exito"){
                        Swal.fire({
                            icon: "success",
                            title: "Nombre actualizado",
                            text: "Nombre actualizado de "+nombre+" a "+datos.nombre
                        })
                        tablas['patgestion'].ajax.reload();
                    }
                    if(datos.resultado == "agregado"){
                        Swal.fire({
                            icon: "error",
                            title: "Nombre existente, intente otro"
                        })
                    }
                })
            }
        }
    })
}

function eliminarPat(id, nombre){
    fetch("php/cambiarelementos.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "id="+id+"&nombre="+nombre+"&tipo=pat&opcion=borrar&eliminar=false"
    })
    .then(datos => datos.json())
    .then(datos => {
        if(datos.resultado == "imposible"){
            Swal.fire({
                title: "Esta patologia no se puede eliminar",
                text: "Esta patologia pertenece al menos a 1 alumno",
                icon: "error"
            })
        }
        if(datos.resultado == "posible"){
            Swal.fire({
                icon: "warning",
                title: "¿Esta seguro de borrar la patologia "+nombre+"?",
                text: "Esto no se podrá deshacer",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Borrar",
            }).then((resultado) => {
                if(resultado.isConfirmed){
                    fetch("php/cambiarelementos.php", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: "id="+id+"&nombre="+nombre+"&tipo=pat&opcion=borrar&eliminar=true"
                    })
                    .then(datos => datos.json())
                    .then(datos => {
                        if(datos.resultado == "exito"){
                            Swal.fire({
                                icon: "success",
                                title: "Borrado correctamente",
                                text: "La patologia "+nombre+" se ha borrado correctamente."
                            })
                            tablas['patgestion'].ajax.reload();
                            actualizarDatosPat();
                        }
                    })
                }
            })
        }
    })
}

function actualizarDatosPat(){
    fetch("php/obtenerpatologias.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "datospagina=true"
    })
    .then(datos => datos.json())
    .then(datos => {
        const pattotales = document.getElementById('pattotalesgestion');
        const patsinA = document.getElementById('patsinA');
        pattotales.innerText = datos.totalpat
        patsinA.innerText = datos.patsinalumnos
    })
}

function actualizarDatosOcu(){
    fetch("php/obtenerocupaciones.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "datospagina=true"
    })
    .then(datos => datos.json())
    .then(datos => {
        const ocutotales = document.getElementById('ocutotalesgestion')
        const ocusinD = document.getElementById('ocusinD')
        ocutotales.innerText = datos.totalocu
        ocusinD.innerText = datos.ocusindoc
    })
}

function actualizarDatosEsp(){
    fetch("php/obtenerespecialidades.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "datospagina=true"
    })
    .then(datos => datos.json())
    .then(datos => {
        const esptotales = document.getElementById('esptotales')
        const espsinP = document.getElementById('espsinD')
        esptotales.innerText = datos.totalesp
        espsinP.innerText = datos.espsinp
    })
}

function actualizarDetalleClases() {
    const id = window.idClase;
    fetch("php/obtenerdatosclases.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "idclase=" + id
    })
    .then(datos => datos.json())
    .then(datos => {
        const nombre = document.getElementById('nombreC');
        const docente = document.getElementById('docenteC');
        const dia = document.getElementById('diaC');
        const cant = document.getElementById('cantC');
        nombre.textContent = datos.nombre;
        docente.textContent = datos.docente;
        dia.textContent = datos.dia;
        cant.textContent = datos.cant
    })
}

function editarOcu(id, nombre){
    Swal.fire({
        title: "Editar ocupación",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aceptar",
        html: `
        <span>Nombre: <input type='text' placeholder='${nombre}' id='nuevonombreOcu'></span>
        `
    }).then((resultado) => {
        if(resultado.isConfirmed){
            const nuevoNombre = document.getElementById('nuevonombreOcu').value;
            if(nuevoNombre){
                fetch("php/cambiarelementos.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: "id=" + id + "&nombre=" + nuevoNombre + "&tipo=ocu&opcion=editar"
                })
                .then(datos => datos.json())
                .then(datos => {
                    if(datos.resultado == "exito"){
                        Swal.fire({
                            icon: "success",
                            title: "Nombre actualizado",
                            text: "Nombre actualizado de "+nombre+" a "+datos.nombre
                        })
                        tablas['ocugestion'].ajax.reload();
                    }
                    if(datos.resultado == "agregado"){
                        Swal.fire({
                            icon: "error",
                            title: "Nombre existente, intente otro"
                        })
                    }
                })
            }
        }
    })
}

function eliminarOcu(id, nombre){
    fetch("php/cambiarelementos.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "id="+id+"&nombre="+nombre+"&tipo=ocu&opcion=borrar&eliminar=false"
    })
    .then(datos => datos.json())
    .then(datos => {
        if(datos.resultado == "imposible"){
            Swal.fire({
                title: "Esta ocupacion no se puede eliminar",
                text: "Esta ocupacion pertenece al menos a 1 persona",
                icon: "error"
            })
        }
        if(datos.resultado == "posible"){
            Swal.fire({
                icon: "warning",
                title: "¿Esta seguro de borrar la ocupacion "+nombre+"?",
                text: "Esto no se podrá deshacer",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Borrar",
            }).then((resultado) => {
                if(resultado.isConfirmed){
                    fetch("php/cambiarelementos.php", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: "id="+id+"&nombre="+nombre+"&tipo=ocu&opcion=borrar&eliminar=true"
                    })
                    .then(datos => datos.json())
                    .then(datos => {
                        if(datos.resultado == "exito"){
                            Swal.fire({
                                icon: "success",
                                title: "Borrado correctamente",
                                text: "La ocupacion "+nombre+" se ha borrado correctamente."
                            })
                            tablas['ocugestion'].ajax.reload();
                            actualizarDatosOcu();
                        }
                    })
                }
            })
        }
    })
}

function editarEsp(id, nombre){
    Swal.fire({
        title: "Editar especializad",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Aceptar",
        html: `
        <span>Nombre: <input type='text' placeholder='${nombre}' id='nuevonombreEsp'></span>
        `
    }).then((resultado) => {
        if(resultado.isConfirmed){
            const nuevonombreEsp = document.getElementById('nuevonombreEsp').value;
            if(nuevonombreEsp){
                fetch("php/cambiarelementos.php", {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: "id="+id+"&nombre="+nuevonombreEsp+"&tipo=esp&opcion=editar"
                })
                .then(datos => datos.json())
                .then(datos => {
                    console.log(datos)
                    if(datos.resultado == "exito"){
                        Swal.fire({
                            icon: "success",
                            title: "Nombre actualizado",
                            text: "Nombre actualizado de "+nombre+" a "+datos.nombre
                        })
                        tablas['espgestion'].ajax.reload();
                    }
                    if(datos.resultado == "agregado"){
                        Swal.fire({
                            icon: "error",
                            title: "Nombre existente, intente otro" 
                        })
                    }
                })
            }
        }
    })
}

function eliminarEsp(id, nombre){
    fetch("php/cambiarelementos.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "id="+id+"&nombre="+nombre+"&tipo=esp&opcion=borrar&eliminar=false"
    })
    .then(datos => datos.json())
    .then(datos => {
        if(datos.resultado == "imposible"){
            Swal.fire({
                title: "Esta ocupacion no se puede eliminar",
                text: "Esta ocupacion pertenece al menos a 1 persona",
                icon: "error"
            })
        }
        if(datos.resultado == "posible"){
            Swal.fire({
                icon: "warning",
                title: "¿Esta seguro de borrar la especialidad "+nombre+"?",
                text: "Esto no se podrá deshacer",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Borrar",
            }).then((resultado) => {
                if(resultado.isConfirmed){
                    fetch("php/cambiarelementos.php", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: "id="+id+"&nombre="+nombre+"&tipo=esp&opcion=borrar&eliminar=true"
                    })
                    .then(datos => datos.json())
                    .then(datos => {
                        if(datos.resultado == "exito"){
                            Swal.fire({
                                icon: "success",
                                title: "Borrado correctamente",
                                text: "La especialidad "+nombre+" se ha borrado correctamente."
                            })
                            tablas['espgestion'].ajax.reload();
                            actualizarDatosEsp();
                        }
                    })
                }
            })
        }
    })
}

function eliminarInforme(id, nombre, fecha){
    Swal.fire({
        icon: "warning",
        title: "¿Seguro de eliminar este informe?",
        text: "Informe: "+nombre+", Fecha: "+fecha,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Borrar",
    }).then((resultado) => {
        if(resultado.isConfirmed){
            fetch("php/borrarinforme.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: "id="+id
            })
            .then(datos => datos.json())
            .then(datos => {
                if(datos.resultado == "exito"){
                    Swal.fire({
                        icon: "success",
                        title: "Informe eliminado exitosamente"
                    })
                    if(document.querySelector('#informes')) {
                        tablas['informesdocentes'].ajax.reload()
                    }
                    
                    if(document.querySelector('#tabla-informes-gestion')) {
                        tablas['tablainformes'].ajax.reload()
                    }
                    
                }
            })
        }
    })
}

function eliminarDocente(id, nombre){
    fetch("php/borrarpersona.php", {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "id=" + id + "&p=docente&t=verificar"
    })
    .then(resultado => resultado.json())
    .then(datos => {
        if(datos.borrar == "imposible"){
            Swal.fire({
                icon: "warning",
                title: "Este docente tiene asignada almenos una clase",
                text: "Borre la clase o cambie el docente para continuar"
            })
            return;
        }
        if(datos.borrar == "posible"){
            Swal.fire({
                icon: "warning",
                title: "¿Esta Seguro de eliminar este docente?",
                text: "Docente: "+nombre,
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Cancelar",
                confirmButtonText: "Borrar",
            }).then((resultado) => {
                if(resultado.isConfirmed){
                    fetch("php/borrarpersona.php", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded'
                        },
                        body: "id=" + id + "&p=docente&t=borrar"
                    })
                    .then(resultado => resultado.json())
                    .then(datos => {
                        if(datos.resultado == "exito"){
                            Swal.fire({
                                icon: "success",
                                title: "Docente eliminado correctamente",
                                text: "Se ha borrado el docente "+nombre
                            })
                            tablas['tabladoc'].ajax.reload()
                        }
                        if(datos.resultado == "error"){
                            Swal.fire({
                                icon: "error",
                                title: "Ha ocurrido un error inesperado"
                            })
                        }
                    })
                }
            })
        }
    })
}

function editarDocente(id){
    window.location.href = "detalle_docente.php?id="+id;
}