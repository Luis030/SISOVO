let tablas = {};
var rollCallBackListaDocente =  function(row, data) {
    if (data.Tipo === 'Salida') {
        $(row).addClass('fila-salida');
    } else if (data.Tipo === 'Entrada') {
        $(row).addClass('fila-entrada');
    }
}
window.tablas = tablas; 

//POST
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('#tabla-clases')) {
        tablas['clases'] = iniciarTabla('tabla-clases', 'php/obtenertodasclases.php', obtenerColumnasClases(), "60vh");
    }

    if(document.querySelector('#tabla-alumnos')) {
        const idclase = window.idclase;
        tablas['alumnosclase'] = iniciarTabla('tabla-alumnos', 'php/alumnosclase.php', columnasAlumnosClase(idclase), "30vh", false, {
            id: idclase
        });
    }

    if(document.querySelector('#tabla-alumnos-docente')) {
        const idclase = window.idclase;
        tablas['alumnosclasedocente'] = iniciarTabla('tabla-alumnos-docente', 'php/alumnosclase.php', columnasAlumnosClaseDocente(), "30vh", false, {
            id: idclase
        })
    }

    if(document.querySelector('#clases-docente')) {
        const ceduladoc = window.ceduladoc;
        tablas['clasesdoc'] = iniciarTabla('clases-docente', 'php/obtenertodasclases.php', clasesDocente(), "60vh", false, {
            docente: ceduladoc
        });
    }

    if(document.querySelector('#lista-docente')) {
        tablas['listadoc'] = iniciarTabla('lista-docente', 'php/asistenciasdocentes.php', columnasListaDocente(), "50vh", rollCallBackListaDocente, {
            time: "hoy"
        });
    }

    if(document.querySelector('#tabla-docentes')) {
        tablas['tabladoc'] = iniciarTabla('tabla-docentes', 'php/obtenerdocentes.php', columnastablaDocentes(), "50vh", false, {
            tabla: true
        });
    }

    if(document.querySelector('#tabla-alumnos-gestion')) {
        tablas['tablaalu'] = iniciarTabla('tabla-alumnos-gestion', 'php/alumnos.php', columnastablaAlumnos(), "50vh", false, {
            alumnostabla: true
        });
    }
    
    if(document.querySelector('#tabla-informes-gestion')) {
        tablas['tablainformes'] = iniciarTabla('tabla-informes-gestion', 'php/obtenerinformes.php', columnastablaInformes(), "50vh");
    }

    if(document.querySelector('#informes')) {
        const id = window.docenteinformes;
        tablas['informesdocentes'] = iniciarTabla('informes', 'php/obtenerinformes.php', tablaInformesDocente(), "50vh", false, {
            docente: true,
            id: id
        })
    }

    if(document.querySelector('#tabla-patologias-gestion')) {
        tablas['patgestion'] = iniciarTabla('tabla-patologias-gestion', 'php/obtenerpatologias.php', columnastablaPatologias(), "50vh", false, {
            tabla: true
        })
    }

    if(document.querySelector('#pat')) {
        const idalumno = window.idalumnotabla;
        tablas['tablapatalumno'] = iniciarTabla('pat', 'php/traerelementospersonas', patologiasAlumno(), "50vh", false, {
            id: idalumno,
            alumno: "si"
        });
    }

    if(document.querySelector('#patD')) {
        const idalumno = window.idalumnotabla;
        tablas['tablapatalumnoD'] = iniciarTabla('patD ', 'php/traerelementospersonas', patologiasAlumnoDocente(), "50vh", false, {
            id: idalumno,
            alumno: "si"
        });
    }

    if(document.querySelector('#tabla-ocupaciones-gestion')) {
        tablas['ocugestion'] = iniciarTabla('tabla-ocupaciones-gestion', 'php/obtenerocupaciones.php', columnastablaOcupaciones(), "50vh", false, {
            tabla: true
        });
    }

    if(document.querySelector('#tabla-especialidades-gestion')) {
        tablas['espgestion'] = iniciarTabla('tabla-especialidades-gestion', 'php/obtenerespecialidades.php', columnastablaEspecialidades(), "50vh", false, {
            tabla: true
        });
    }

    if (document.querySelector('#esp')) {
        const idDocente = window.idDocente;
        tablas['tablaespdocente'] = iniciarTabla('esp', 'php/traerelementospersonas', especializacionesDocentes(), "50vh", false, {
            id: idDocente,
            docente: "si"
        })
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

//POST
function iniciarTabla(tablaId, ajaxUrl, columnas, scroll, rollCall = false, param = {}) {
    const config = {
        ...TablasConfig,
        ajax: {
            url: ajaxUrl,
            dataSrc: "",
            type: "POST",
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            data: param,    
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
                    <button class='boton-borrar' onclick='eliminarElementoPersona(${row.ID_Patologia}, ${idalumno}, "alumno")'>Desasignar</button>
                `;
            },
            "orderable": false
        }
    ]
}

function especializacionesDocentes() {
    const idDocente = window.idDocente;
    return [
        { "data": "Nombre" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-borrar' onclick='eliminarElementoPersona(${row.ID_Especializacion}, ${idDocente}, "docente")'>Desasignar</button>
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
        { "data": "Año" },
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

function columnasAlumnosClaseDocente() {
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
        { "data": "Ocupacion" },
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


function columnastablaAlumnos() {
    return [
        { "data": "Nombre",
            "render": function(data, type, row) {
            return `<a href="detalle_alumnos.php?id=${row.ID_Alumno}">${data}</a>`;
            }
        },
        { "data": "Apellido",
            "render": function(data, type, row) {
            return `<a href="detalle_alumnos.php?id=${row.ID_Alumno}">${data}</a>`;
            }
        },
        { "data": "Cedula" },
        { "data": "Edad" },
        { "data": "Mail_Padres" },
        { "data": "Celular_Padres" },
        { "data": "Grado"},
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

function columnastablaInformes() {
    return [
        { "data": "Titulo",
            "render": function(data, type, row) {
            return `<a href="../fpdf/informe.php?ID=${row.ID_Informe}&&Cedula=${row.Cedula}" target="_blank">${data}</a>`;
            }
        },
        { "data": "Alumno",
            "render": function(data, type, row){
                return `<a href="detalle_alumnos.php?id=${row.ID_Alumno}">${data}</a>`;
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
                    <button class='boton-borrar' onclick='eliminarInforme(${row.ID_Informe}, \`${row.Titulo}\`, \`${row.Fecha}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
        
    ]
}

function tablaInformesDocente() {
    return [
        { "data": "Titulo",
            "render": function(data, type, row) {
            return `<a href="../fpdf/informe.php?ID=${row.ID_Informe}&&Cedula=${row.Cedula}&&portabla=si" target="_blank">${data}</a>`;
            }
        },
        { "data": "Alumno",
            "render": function(data, type, row){
                return `<a href="detalle_alumnos.php?id=${row.ID_Alumno}">${data}</a>`;
            }
        },
        { "data": "Fecha" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-borrar' onclick='eliminarInforme(${row.ID_Informe}, \`${row.Titulo}\`, \`${row.Fecha}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ]
}

function columnastablaPatologias() {
    return [
        { "data": "Nombre" },
        { "data": "Cantidad" },
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-editar' onclick='editarPat(${row.ID_Patologia}, \`${row.Nombre}\`)'>Editar</button>
                    <button class='boton-borrar' onclick='eliminarPat(${row.ID_Patologia}, \`${row.Nombre}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ]
}

function columnastablaOcupaciones() {
    return [
        { "data": "Ocupacion" },
        { "data": "Total_Docentes" },
        { "data": null,
            "render": function(data, type, row){
                if(data.Total_Docentes > 0){
                    return `
                    <button class='boton-editar' onclick='editarOcu(${row.ID_Ocupacion}, \`${row.Ocupacion}\`)'>Editar</button>
                `;
                } else {
                    return `
                    <button class='boton-editar' onclick='editarOcu(${row.ID_Ocupacion}, \`${row.Ocupacion}\`)'>Editar</button>
                    <button class='boton-borrar' onclick='eliminarOcu(${row.ID_Ocupacion}, \`${row.Ocupacion}\`)'>Eliminar</button>
                `;
                }
            },
            "orderable": false
        }
    ]
}

function columnastablaEspecialidades() {
    return [
        { "data": "Especializacion" },
        { "data": "Ocupacion" },
        { "data": "Total_Docentes" },
        { "data": null,
            "render": function(data, type, row){
                return `
                    <button class='boton-editar' onclick='editarEsp(${row.ID_Especializacion}, \`${row.Especializacion}\`)'>Editar</button>
                    <button class='boton-borrar' onclick='eliminarEsp(${row.ID_Especializacion}, \`${row.Especializacion}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ]
}