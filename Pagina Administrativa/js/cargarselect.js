$(document).ready(function() {
    const idclase = window.idclase;
    const idclaselista = window.idclaselista;
    const idalumnoactual = window.idalumnotabla;
    const idDocente = window.idDocente;

    //POST
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
                    id: idDocente
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

    //POST
    $('#agregarPatAlumno').select2({
        placeholder: 'Seleccione patologías para agregar',
        minimumInputLength: 0,
        cache: true,
        ajax: {
            url: 'php/obtenerpatologias.php',
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
                return {
                    q: params.term || '',
                    editaralumno: "si",
                    id: idalumnoactual
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (patologias) {
                        return { id: patologias.ID_Patologia, text: patologias.Nombre };
                    })
                };
            },
            cache: true
        }
    })

    //POST
    $('#alumnosClase').select2({
        placeholder: 'Seleccione alumnos',
        minimumInputLength: 0,
        cache: true,
        ajax: {
            url: 'php/obteneralumnos2.php', 
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
                return {
                    q: params.term || ''
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (alumnos) {
                        return { id: alumnos.ID_Alumno, text: alumnos.Nombre +" "+ alumnos.Apellido };
                    })
                };
            },
            cache: true
        }
    });

    $('#diasClase').select2({
        placeholder: 'Seleccione día(s)',
        minimumInputLength: 0,
    })

    $('#diasClase').select2({
        placeholder: 'Seleccione día(s)',
        minimumInputLength: 0, 
        cache: true
    })

    $('#diasClase').on('change', function() {
        const diasHorarios = document.getElementById('diasHorarios');
        var diasSeleccionados = $('#diasClase').select2('data');
        diasHorarios.innerHTML = "";
        diasSeleccionados.forEach(function(diaSeleccionado) {
            inicio = diaSeleccionado.text + "Inicio";
            final = diaSeleccionado.text + "Final";
            var p = "Horario del día " + diaSeleccionado.text;
            diasHorarios.innerHTML += "<div class='horarioTalDia'><label for='inputHora'>" + p + "<br></label><span class='pre'>Inicia:</span><br><input type='time' id='" + inicio + "'><br><span class='pre'>Termina:</span><br><input type='time' id='" + final + "'>";
        });
    });

    $('#alumnoConf').on('change', function() {
        if ($(this).is(':checked')) {
            $('#alumnosClase').prop('disabled', false);
        } else {
            $('#alumnosClase').prop('disabled', true).val(null).trigger('change');
        }
    });

    //POST
    $('#docenteClase').select2({
        placeholder: 'Seleccione un docente',
        minimumInputLength: 0, 
        ajax: {
            url: 'php/obtenerdocentes.php', 
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
                return {
                    q: params.term || '',
                    select: true
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (docentes) {
                        return { id: docentes.ID_Docente, text: docentes.Nombre +" "+docentes.Apellido};
                    })
                };
            },
            cache: true
        }
    })

    //POST
    $('#ingresarDocente').select2({
        placeholder: 'Seleccione un docente',
        minimumInputLength: 0, 
        ajax: {
            url: 'php/obtenerdocentes.php', 
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
                return {
                    q: params.term || '',
                    select: true
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (docentes) {
                        return { id: docentes.ID_Docente, text: docentes.Nombre +" "+docentes.Apellido};
                    })
                };
            },
            cache: true
        }
    })

    //POST
    $('#select-alumnos').select2({
        placeholder: "Buscar alumno..",
        minimumInputLength: 0,
        ajax: {
            url: "php/alumnos.php", 
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
                return {
                    q: params.term || '',
                    idclase: idclase
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (alumno) {
                        return { id: alumno.ID_Alumno, text: alumno.NombreCompleto };
                    })
                };
            },
            cache: true
        }
    });

    //POST
    if($('#patologias-select').length){
        $('#patologias-select').select2({
            placeholder: 'Busca o selecciona patologías...', 
            minimumInputLength: 0, 
            ajax: {
                url: 'php/obtenerpatologias.php', 
                dataType: 'json',
                delay: 250,
                method: "POST",  
                data: function (params) {
                    // Definir el término de búsqueda; si no hay término, obtener los primeros resultados
                    return {
                        q: params.term || '' // Si no hay término de búsqueda, enviar vacío
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (patologia) {
                            return { id: patologia.ID_Patologia, text: patologia.Nombre };
                        })
                    };
                },
                cache: true
            }
        });
    }
    
    //POST
    $('#ocupacionEspecialidad').select2({
        placeholder: 'Seleccione una ocupación',
        ajax: {
            url: 'php/obtenerocupaciones.php',  
            dataType: 'json',
            delay: 250,
            method: "POST",
            processResults: function (data) {
                return {
                    results: data.map(function (ocupacion) {
                        return { id: ocupacion.ID_Ocupacion, text: ocupacion.Nombre };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 0
    })

    //POST
    $('#ocupacion-select').select2({
        placeholder: 'Selecciona una ocupación',
        ajax: {
            url: 'php/obtenerocupaciones.php',  
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
                return {
                    q: params.term || '', 
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (ocupacion) {
                        return { id: ocupacion.ID_Ocupacion, text: ocupacion.Nombre };
                    })
                };
            },
            cache: true
        },
        minimumInputLength: 0
    });

    //POST
    $('#select-alumno-ingresado').select2({
        placeholder: "Seleccione un alumno",
        minimumInputLength: 0,
        ajax: {
            url: 'php/obteneralumnos.php', 
            dataType: 'json',
            delay: 250,
            method: "POST",
            data: function (params) {
                const claseSeleccionada = $('.informeClaseAlumno').val();
                console.log(claseSeleccionada)
                return {
                    q: params.term || '', 
                    clase: claseSeleccionada || '' 
                };
            },
            processResults: function (data) {
                console.log(data);
                return {
                    results: data.map(function (alumno) {
                        return { id: alumno.ID_Alumno, text: alumno.Nombre +' '+ alumno.Apellido };
                    })
                };
            },
            cache: true
        }
    });

    $('.informeClaseAlumno').select2({
        placeholder: 'Filtrar por clase'
    })

    //POST
    $('.porClase').change(function() {
        if ($(this).is(':checked')) {
            $('.informeClaseAlumno').prop('disabled', false).select2({
                placeholder: 'Selecciona una clase',
                minimumInputLength: 0,
                ajax: {
                    url: 'php/obtenerclases.php', 
                    dataType: 'json',
                    delay: 250,
                    method: "POST",
                    processResults: function (data) {
                        return {
                            results: data.map(function (clase) {
                                return { id: clase.ID_Clase, text: clase.Nombre };
                            })
                        };
                    },
                    cache: true
                }
            })
        } else {
            $('.informeClaseAlumno').prop('disabled', true).val(null).trigger('change');
            $('.informeClaseAlumno').prop('disabled', true).select2({
                placeholder: 'Filtrar por clase'
            });
        }
    })

    //POST
    $('#select-ocupacion-overlay').select2({
        placeholder: 'Elija la ocupación',
        minimumInputLength: 0,
        ajax: {
            url: 'php/obtenerocupaciones.php',  // Ruta para obtener las ocupaciones
            dataType: 'json',
            method: 'POST',
            delay: 250,
            data: function(params){
                return {
                    q: params.term || '',
                }
            },
            processResults: function (data) {
                return {
                    results: data.map(function (ocupacion) {
                        return { id: ocupacion.ID_Ocupacion, text: ocupacion.Nombre };
                    })
                };
            },
            cache: true
        }
    })

    //POST
    $('#especialidades-select').select2({
        placeholder: 'Busca o selecciona especialidades',
        minimumInputLength: 0,
        ajax: {
            url: 'php/obtenerespecialidades.php',
            type: 'POST', 
            dataType: 'json',
            delay: 250,
            data: function (params) {
                const selectedOcupacion = $('#ocupacion-select').val();
                return {
                    q: params.term || '', 
                    ocupacion: selectedOcupacion 
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (especialidad) {
                        return { id: especialidad.ID_Especializacion, text: especialidad.Nombre };
                    })
                };
            },
            cache: true
        }
    }).prop('disabled', true);
    
    //POST
    $('#ocupacion-select').on('change', function() {
        $('#especialidades-select').val([]).trigger('change');
        const selectedOcupacion = $('#ocupacion-select').val();
        fetch("php/cantidadespecialidades.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "ocupacion=" + encodeURIComponent(selectedOcupacion)
        })
        .then(datos => datos.json())
        .then(filas => {
            filas.forEach(fila => {
                if(fila.CantidadEspecializaciones > 0){
                    $('#especialidades-select').prop('disabled', false);
                } else {
                    $('#especialidades-select').prop('disabled', true);
                }
            });
        });
    });

    //POST
    $('#fecha').select2({
        placeholder: 'Busca o selecciona especialidades',
        minimumInputLength: 0,
        ajax: {
            url: 'php/cargarfechalista.php', 
            type: 'POST', 
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    idclase: idclaselista, 
                    q: params.term || ''
                };
            },
            processResults: function (data) {
                var hoyOption = [{ id: 'Hoy', text: 'Hoy' }];
                var fechaOptions = data.map(function (datos) {
                    var parts = datos.Fecha.split('-');
                    var formattedDate = parts[2] + '/' + parts[1] + '/' + parts[0];
                    return { id: datos.Fecha, text: formattedDate };
                });
                return {
                    results: hoyOption.concat(fechaOptions)
                };
            },
            cache: true
        }
    });
});

