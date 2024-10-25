document.addEventListener('DOMContentLoaded', function(){
    const idclase = window.idclaselista;
    cargarAlumnosParaNuevaAsistencia(idclase);

    function cargarAlumnosParaNuevaAsistencia(idClase) {
        $.ajax({
            url: 'php/cargarlista.php',
            method: 'POST',
            data: { ID_Clase: idClase },
            success: function(response) {
                $('#lista-alumnos').html(response); // Mostrar la lista de alumnos
            }
        });
    }

    $('#fecha').change(function() {
        var fechaSeleccionada = $(this).val();
        if (fechaSeleccionada === "Hoy") {
            cargarAlumnosParaNuevaAsistencia(idclase);
        } else {
            cargarAsistenciaPorFecha(fechaSeleccionada, idclase);
        }
    });

    function cargarAsistenciaPorFecha(fecha, idClase) {
        $.ajax({
            url: 'php/cargarasistencia.php',
            method: 'POST',
            data: { fecha: fecha, idclase: idClase },
            success: function(response) {
                $('#lista-alumnos').html(response); // Rellenar la tabla con la asistencia
            }
        });
    }
})