$(document).ready(function() {
    // Inicializar Select2 con AJAX para la búsqueda y resultados iniciales
    if($('#patologias-select').length){
        $('#patologias-select').select2({
            placeholder: 'Busca o selecciona patologías...', 
            minimumInputLength: 0, 
            ajax: {
                url: 'php/obtenerpatologias.php', 
                dataType: 'json',
                delay: 250, // Tiempo de espera antes de enviar la solicitud al servidor
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

    if($('#especialidades-select').length){
        $('#especialidades-select').select2({
            placeholder: 'Busca o selecciona especialidades',
            minimumInputLength: 0,
            ajax: {
                url: 'php/obtenerespecialidades.php',
                dataType: 'json',
                delay: 250,
                data: function (params){
                    return {
                        q: params.term || ''
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (especialidad){
                            return { id: especialidad.ID_Especializacion, text: especialidad.Nombre};
                        })
                    };
                },
                cache: true
            }
        })
    }
});
