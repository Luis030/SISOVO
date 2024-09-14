$(document).ready(function() {
    // Inicializar Select2 para ocupación
    $('#ocupacion-select').select2({
        placeholder: 'Selecciona una ocupación',
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
    });

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
});
