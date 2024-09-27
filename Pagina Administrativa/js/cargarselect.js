$(document).ready(function() {

    $('#ingresarDocente').select2({
        placeholder: 'Seleccione un docente',
        minimumInputLength: 0, 
        ajax: {
            url: 'php/obtenerdocentes.php', 
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    q: params.term || ''
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

    if($('#patologias-select').length){
        $('#patologias-select').select2({
            placeholder: 'Busca o selecciona patologías...', 
            minimumInputLength: 0, 
            ajax: {
                url: 'php/obtenerpatologias.php', 
                dataType: 'json',
                delay: 250,  
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
    
    $('#ocupacionEspecialidad').select2({
        placeholder: 'Seleccione una ocupación',
        ajax: {
            url: 'php/obtenerocupaciones.php',  
            dataType: 'json',
            delay: 250,
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

    $('#ocupacion-select').select2({
        placeholder: 'Selecciona una ocupación',
        ajax: {
            url: 'php/obtenerocupaciones.php',  
            dataType: 'json',
            delay: 250,
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

    $('#select-alumno-ingresado').select2({
        placeholder: "Seleccione un alumno",
        minimumInputLength: 0,
        ajax: {
            url: 'php/obteneralumnos.php', 
            dataType: 'json',
            delay: 250,
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

    $('.porClase').change(function() {
        if ($(this).is(':checked')) {
            $('.informeClaseAlumno').prop('disabled', false).select2({
                placeholder: 'Selecciona una clase',
                minimumInputLength: 0,
                ajax: {
                    url: 'php/obtenerclases.php', 
                    dataType: 'json',
                    delay: 250,
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


    $('#select-ocupacion-overlay').select2({
        placeholder: 'Elija la ocupación',
        minimumInputLength: 0,
        ajax: {
            url: 'php/obtenerocupaciones.php',  // Ruta para obtener las ocupaciones
            dataType: 'json',
            delay: 250,
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

    // Inicializar Select2 para especialidades, pero desactivado inicialmente
    $('#especialidades-select').select2({
        placeholder: 'Busca o selecciona especialidades',
        minimumInputLength: 0,
        ajax: {
            url: 'php/obtenerespecialidades.php',
            dataType: 'json',
            delay: 250,
            data: function (params){
                const selectedOcupacion = $('#ocupacion-select').val();
                return {
                    q: params.term || '',
                    ocupacion: selectedOcupacion
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (especialidad){
                        return { id: especialidad.ID_Especializacion, text: especialidad.Nombre };
                    })
                };
            },
            cache: true
        }
    }).prop('disabled', true); 

    // Habilitar/Deshabilitar select de especialidades según la ocupación seleccionada
    $('#ocupacion-select').on('change', function() {
        $('#especialidades-select').val([]).trigger('change');
        const selectedOcupacion = $('#ocupacion-select').val();
        fetch("php/cantidadespecialidades.php?ocupacion="+ selectedOcupacion)
        .then(datos => datos.json())
        .then(filas => {
                filas.forEach(fila => {
                    if(fila.CantidadEspecializaciones > 0){
                        $('#especialidades-select').prop('disabled', false);
                    } else {
                        $('#especialidades-select').prop('disabled', true);
                    }
            });
            
        })
    });


    $('#select-alumnos').select2({
        placeholder: "Buscar alumno..",
        minimumInputLength: 0,
        ajax: {
            url: 'php/alumnos.php',
            dataType: 'json',
            delay: 250,
            data: function (params){
                return {
                    q: params.term || '',
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (alumno){
                        return { id: alumno.ID_Alumno, text: alumno.NombreCompleto };
                    })
                };
            },
            cache: true
        }
    })
});

