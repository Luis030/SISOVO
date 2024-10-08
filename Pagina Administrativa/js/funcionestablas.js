function eliminarClase(id, nombre) {
    Swal.fire({
        title: "¿Estas seguro de borrar la clase <span class='nombre-clase'>"+nombre+"</span>?",
        text: "No se podra deshacer",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar"
        }).then((result) => {
        if (result.isConfirmed) {
            fetch("php/borrarclase.php?id="+id)
            .then(data => data.json())
            .then(dato => {
            if(dato.Resultado == "exitoso"){
                tablas['clases'].ajax.reload();
                Swal.fire({
                    title: "Borrado exitosamente.",
                    text: "Se ha borrado exitosamente la clase "+nombre,
                    icon: "success"
                });
            } else if(dato.Resultado == "error"){
                alert("error");
            }
        })
            
        }
    });
}


function editarClase(id){
    window.location.href = "editarclases.php?id="+id;
}

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
    fetch('php/agregaralumnoclase.php?id='+idclase, {
        method: 'POST',
        headers: {
        'Content-Type': 'application/json',
        },
        body: JSON.stringify({ valores: valoresSeleccionados })
    })
    .then(response => response.json())
    .then(data => {
        console.log('Respuesta del servidor:', data);
        tablas['alumnosclase'].ajax.reload();
        $('#select-alumnos').val(null).trigger('change');
    })
    .catch(error => {
        console.error('Error:', error);
    });
}

function eliminarAlumnoClase(idclase, idalumno){
    Swal.fire({
        title: "¿Estas seguro quitar el alumno?",
        text: "Se desvinculara al alumno",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        cancelButtonText: "Cancelar",
        confirmButtonText: "Si, borrar"
        }).then((result) => {
        if (result.isConfirmed) {
            fetch("php/sacaralumnoclase.php?clase="+idclase+"&&alumno="+idalumno)
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