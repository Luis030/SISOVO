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

    if(document.querySelector('#tabla-alumnos')) {
        const idclase = window.idclase;
        tablas['alumnosclase'] = iniciarTabla('tabla-alumnos', `php/alumnosclase.php?id=${idclase}`, columnasAlumnosClase(idclase), "30vh");
    }

    if(document.querySelector('#clases-docente')) {
        const ceduladoc = window.ceduladoc;
        tablas['clasesdoc'] = iniciarTabla('clases-docente', `php/obtenertodasclases.php?docente=${ceduladoc}`, clasesDocente(), "60vh");
    }

    if(document.querySelector('#lista-docente')) {
        tablas['listadoc'] = iniciarTabla('lista-docente', 'php/asistenciasdocentes.php?time=hoy', columnasListaDocente(), "50vh", rollCallBackListaDocente);
    }

    if(document.querySelector('#tabla-docentes')) {
        tablas['tabladoc'] = iniciarTabla('tabla-docentes', 'php/obtenerdocentes.php?tabla=true', columnastablaDocentes(), "50vh");
    }

    if(document.querySelector('#tabla-alumnos-gestion')) {
        tablas['tablaalu'] = iniciarTabla('tabla-alumnos-gestion', 'php/alumnos.php?alumnostabla=true', columnastablaAlumnos(), "50vh");
    }
    
    if(document.querySelector('#tabla-informes-gestion')) {
        tablas['tablainformes'] = iniciarTabla('tabla-informes-gestion', 'php/obtenerinformes.php', columnastablaInformes(), "50vh");
    }

    if(document.querySelector('#tabla-esp-gestion')) {
        tablas['tablaesp'] = iniciarTabla('tabla-esp-gestion', 'php/obtenerespecialidades.php', columnastablas)
    }

    if(document.querySelector('#pat')) {
        const idalumno = window.idalumnotabla;
        tablas['tablapatalumno'] = iniciarTabla('pat', `php/traerpatologiaalumno?id=${idalumno}`, patologiasAlumno(), "50vh");
    }
    if(document.querySelector('#patD')) {
        const idalumno = window.idalumnotabla;
        tablas['tablapatalumnoD'] = iniciarTabla('patD ', `php/traerpatologiaalumno?id=${idalumno}`, patologiasAlumnoDocente(), "50vh");
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
            type: "POST",
            error: function(xhr, error, code) {
                console.log("ERROR")
                console.error("Error en la respuesta JSON:", error); // Muestra el error si ocurre
                console.log("Detalles de la respuesta:", xhr.responseText); // Muestra la respuesta del servidor
            }
        },
        columns: columnas,
        scrollY: scroll,
        deferRender: true,
        rowCallback: rollCall
    };
    return $(`#${tablaId}`).DataTable(config);
}

function patologiasAlumno() {
    const idalumno = window.idalumnotabla;
    return [
        { "data": "Nombre" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-borrar' onclick='eliminarPatAlumno(${row.ID_Patologia}, ${idalumno})'>Desasignar</button>
                `;
            },
            "orderable": false
        }
    ]
}

function patologiasAlumnoDocente() {
    return [
        { "data": "Nombre" },
    ]
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


function columnastablaAlumnos(){
    return [
        { "data": "Nombre",
            "render": function(data, type, row) {
            return `<a href="detalle_alumno.php?id=${row.ID_Alumno}">${data}</a>`;
            }
        },
        { "data": "Apellido",
            "render": function(data, type, row) {
            return `<a href="detalle_alumno.php?id=${row.ID_Alumno}">${data}</a>`;
            }
        },
        { "data": "Cedula" },
        { "data": "Edad" },
        { "data": "Celular_Padres" },
        { "data": "Mail_Padres" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-editar' onclick='editarAlumno(${row.ID_Alumno})'>Editar</button>
                    <button class='boton-borrar' onclick='eliminarAlumno(${row.ID_Alumno}, \`${row.Nombre}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ]
}

function columnastablaInformes(){
    return [
        { "data": "Titulo",
            "render": function(data, type, row) {
            return `<a href="../fpdf/informe.php?ID=${row.ID_Informe}&&Cedula=${row.Cedula}" target="_blank">${data}</a>`;
            }
        },
        { "data": "Alumno",
            "render": function(data, type, row){
                return `<a href="detalle_alumno.php?id=${row.ID_Alumno}">${data}</a>`;
            }
        },
        { "data": "Docente",
            "render": function(data, type, row) {
            return `<a href="detalle_docente.php?id=${row.ID_Docente}">${data}</a>`;
            }
        },
        { "data": "Fecha" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-editar' onclick='editarInforme(${row.ID_Informe})'>Editar</button>
                    <button class='boton-borrar' onclick='eliminarInforme(${row.ID_Informe}, \`${row.Nombre}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
        
    ]
}