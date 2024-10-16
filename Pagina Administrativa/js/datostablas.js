let tablas = {};
var rollCallBackListaDocente =  function(row, data) {
    if (data.Tipo === 'Salida') {
        $(row).addClass('fila-salida');
    } else if (data.Tipo === 'Entrada') {
        $(row).addClass('fila-entrada');
    }
}
window.tablas = tablas; 
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#tabla-clases')) {
        tablas['clases'] = iniciarTabla('tabla-clases', 'php/obtenertodasclases.php', obtenerColumnasClases(), "60vh");
    }

    if(document.querySelector('#tabla-alumnos')){
        const idclase = window.idclase;
        tablas['alumnosclase'] = iniciarTabla('tabla-alumnos', `php/alumnosclase.php?id=${idclase}`, columnasAlumnosClase(idclase), "30vh");
    }

    if(document.querySelector('#clases-docente')){
        const ceduladoc = window.ceduladoc;
        tablas['clasesdoc'] = iniciarTabla('clases-docente', `php/obtenertodasclases.php?docente=${ceduladoc}`, clasesDocente(), "60vh");
    }

    if(document.querySelector('#lista-docente')){
        tablas['listadoc'] = iniciarTabla('lista-docente', 'php/asistenciasdocentes.php?time=hoy', columnasListaDocente(), "50vh", rollCallBackListaDocente);
    }

    if(document.querySelector('#tabla-docentes')){
        tablas['tabladoc'] = iniciarTabla('tabla-docentes', 'php/obtenerdocentes.php?tabla=true', columnastablaDocentes(), "50vh");
    }
});

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
function columnasListaDocente(){
    return [
        {
            "data": "Docente",
            "render": function(data, type, row){
                return `<a href="detalle_docente.php?id=${row.ID_Docente}">${data}</a>`
            }
        },
        { "data": "Cedula" },
        { "data": "Fecha" },
        { "data": "Tipo" },
        { "data": "Hora" }
    ]
}

    

function iniciarTabla(tablaId, ajaxUrl, columnas, scroll, rollCall = false) {
    const config = {
        ...TablasConfig,
        ajax: {
            url: ajaxUrl,
            dataSrc: "",
            type: "POST"
        },
        columns: columnas,
        scrollY: scroll,
        deferRender: true,
        rowCallback: rollCall
    };
    return $(`#${tablaId}`).DataTable(config);
}

function clasesDocente(){
    return [
        {
            "data": "Nombre",
            "render": function(data, type, row) {
                return `<a href="detalle_clase_docente.php?id=${row.ID_Clase}">${data}</a>`;
            }
        },
        { "data": "Horarios"},
        { "data": "Cantidad_Alumnos" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-editar' onclick='pasarLista(${row.ID_Clase})'>Pasar Lista</button>
                `;
            },
            "orderable": false
        }
    ]
}

function obtenerColumnasClases() {
    return [
        {
            "data": "Nombre",
            "render": function(data, type, row) {
                return `<a href="detalle_clases.php?id=${row.ID_Clase}">${data}</a>`;
            }
        },
        { "data": "Docente" },
        { "data": "Horarios" },
        { "data": "Cantidad_Alumnos" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-editar' onclick='editarClase(${row.ID_Clase})'>Editar</button>
                    <button class='boton-borrar' onclick='eliminarClase(${row.ID_Clase}, \`${row.Nombre}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ];
}

function columnasAlumnosClase(idclase){
    return [
        {   "data": "Nombre",
            "render": function(data, type, row) {
            return `<a href="detalle_alumnos.php?id=${row.ID_Alumno}">${data}</a>`;
            }
        },
        { "data": "Apellido" },
        { "data": "Cedula" },
        { "data": "Fecha_nac" },
        { "data": "Mail_Padres" },
        { "data": "Celular_Padres" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-editar' onclick='\`editaralumno.php?id=${row.ID_Alumno}'\`>Editar</button>
                    <button class='boton-borrar' onclick='eliminarAlumnoClase(${idclase}, ${row.ID_Alumno})'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ]
}

function columnastablaDocentes(){
    return [
        { "data": "Nombre",
            "render": function(data, type, row) {
            return `<a href="detalle_docente.php?id=${row.ID_Docente}">${data}</a>`;
            }
        },
        { "data": "Cedula" },
        { "data": "Mail" },
        { "data": "Celular" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-editar' onclick='editarDocente(${row.ID_Docente})'>Editar</button>
                    <button class='boton-borrar' onclick='eliminarDocente(${row.ID_Docente}, \`${row.Nombre}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ]
}