 
    function convertirHorasMinutos(hora) {
        var partes = hora.split(':');
        return parseInt(partes[0]) * 60 + parseInt(partes[1]);
    }

    function guardarClase() {
        var nombre = document.getElementById('nombreClase').value;
        var docenteID = $('#docenteClase').val();
        var diasVisibles = [];
        var diasSemana = ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'];
        var errorHorario = false;

        if (document.getElementById('alumnoConf').checked) {
            var alumnoID = $('#alumnosClase').val();
        }

        diasSemana.forEach(function(dia) {
            var inicioInput = $('#' + dia + 'Inicio');
            var finalInput = $('#' + dia + 'Final');

            if (inicioInput.is(':visible') && finalInput.is(':visible')) {
                var horarioInicio = inicioInput.val();
                var horarioFinal = finalInput.val();
                var minutosInicio = convertirHorasMinutos(horarioInicio);
                var minutosFinal = convertirHorasMinutos(horarioFinal);

                if (minutosInicio >= minutosFinal) {
                    errorHorario = true;
                } else {
                    diasVisibles.push({
                        dia: dia,
                        inicio: horarioInicio,
                        final: horarioFinal
                    });
                }
            }           
        });

        if (errorHorario == true) {
            Swal.fire({
                title: "Error!",
                text: "La hora de finalización debe ser mayor que la hora de inicio",
                icon: "error",
                showConfirmButton: false,
                timer: 3000
            });
            exit;
        } else {
            if (nombre && docenteID && diasVisibles.length > 0 && diasVisibles.some(d => d.inicio && d.final && d.dia)) {   
                $.ajax({
                    url: 'php/guardarclase.php',
                    type: 'POST',
                    data: {
                        nombre: nombre,
                        docenteID: docenteID,
                        alumnoID: alumnoID ? alumnoID : null,
                        diasVisibles: diasVisibles
                    },
                    success: function(response) {
                        Swal.fire ({
                            title: "Correcto!",
                            text: "Clase guardada correctamente",
                            icon: "success",
                            showConfirmButton: false,
                            timer: 3000
                        })
                    },
                    error: function(xhr, status, error) {
                        console.error("Error al enviar los datos: ", error);
                    }
                });
            } else {
                Swal.fire({
                    title: "Error!",
                    text: "Faltan ingresar varios datos",
                    icon: "error",
                    showConfirmButton: false,
                    timer: 3000
                })
            }
        }
    }