window.addEventListener('DOMContentLoaded', () => {
    setInterval(actualizarListaDocente, 10000);
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
function eliminarAlumnoClase(idclase, idalumno){
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
            if(data.resultado == "exito"){
                Swal.fire({
                    title: "Borrado exitosamente.",
                    text: "Se ha borrado exitosamente el alumno",
                    icon: "success"
                });
                tablas['alumnosclase'].ajax.reload();
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
            fetch("php/borraralumno.php", {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: "id=" + id
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