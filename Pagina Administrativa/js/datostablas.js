const TablasConfig = {
    "scrollY": '60vh',
    "scrollCollapse": true,
    "paging": true,
    "pageLength": 10,
    "destroy": true,
    "language": {
        "sProcessing":     "Procesando...",
        "sLengthMenu":     "Mostrar _MENU_ registros",
        "sZeroRecords":    "No se encontraron resultados",
        "sEmptyTable":     "Ningún dato disponible en esta tabla",
        "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
        "sSearch":         "Buscar:",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst":    "Primero",
            "sLast":     "Último",
            "sNext":     "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        }
    }
};

//Funcion que inicializa la tabla obteniendo el id el url del backend y las columnas, ademas de agregarle la config base.
function iniciarTabla(tablaId, ajaxUrl, columnas, scroll) {
    const config = {
        ...TablasConfig,
        ajax: {
            url: ajaxUrl,
            dataSrc: ""
        },
        columns: columnas,
        scrollY: scroll
    };
    return $(`#${tablaId}`).DataTable(config);
}