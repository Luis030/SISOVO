const tablas = {};  // Almacenará la configuración de las tablas

let dataGlobal = {};  // Para almacenar los datos de cada tabla
let order = {};       // Mantener el estado de orden de cada tabla

// Función para cargar los datos de la tabla desde el backend
function cargarTabla(config) {
    tablas[config.tipo] = config;  // Guardar la configuración específica de la tabla

    fetch(config.url)
        .then(response => response.json())
        .then(data => {
            dataGlobal[config.tipo] = data;  // Guardar los datos en dataGlobal
            mostrarTabla(config.tipo, data);  // Mostrar los datos en la tabla
            agregarBusqueda(config.tipo);     // Iniciar la funcionalidad de búsqueda
        })
        .catch(error => {
            console.error(`Error al cargar los datos de la tabla ${config.tipo}:`, error);
        });
}

// Función para mostrar la tabla con los datos
function mostrarTabla(tipo, data) {
    const tablaInfo = tablas[tipo];
    let html = `
        <table>
            <thead>
                <tr>
    `;

    // Generar los encabezados de la tabla
    tablaInfo.headers.forEach((header, index) => {
        html += `<th onclick="sortTable('${tipo}', '${tablaInfo.keys[index]}')">${header}</th>`;
    });

    // Añadir el encabezado de "Acciones"
    html += `<th>Acciones</th>`;
    html += `</tr></thead><tbody id="tabla-datos-${tipo}">`;

    // Generar las filas de la tabla con los datos
    data.forEach(item => {
        html += '<tr>';
        tablaInfo.keys.forEach(key => {
            // Agregar enlace en la columna de "Nombre" de la clase
            if (key === 'Nombre') { 
                html += `<td><a href="editarclases.php?id=${item.ID_Clase}">${item[key]}</a></td>`;
            } 
            // Agregar enlace en la columna de "Docente"
            else if (key === 'docente') {
                html += `<td><a href="pagina_detalle_docente.php?id=${item.ID_Docente}">${item[key]}</a></td>`;
            } 
            else {
                html += `<td>${item[key]}</td>`;
            }
        });

        // Añadir los botones de "Editar" y "Eliminar" en la columna de acciones
        html += `
            <td class="fila-acciones">
                <input type="image" src="img/basura.png" alt="" onclick="eliminar(${item.ID_Clase})">
                <input type="image" class="imagen-editar" src="img/editar.png" alt="" onclick="editar(${item.ID_Clase}, ${item.nombre})">
                
            </td>
        `;
        
        html += '</tr>';
    });

    html += '</tbody></table>';
    document.querySelector(tablaInfo.selector).innerHTML = html;
}

// Función para ordenar la tabla
function sortTable(tipo, column) {
    const tablaInfo = tablas[tipo];

    // Alternar entre orden ascendente y descendente
    if (!order[tipo]) order[tipo] = {};
    order[tipo][column] = (order[tipo][column] === 'ASC') ? 'DESC' : 'ASC';
    const sortOrder = order[tipo][column];

    // Ordenar los datos de la tabla
    dataGlobal[tipo].sort((a, b) => {
        let valueA = a[column].toLowerCase();
        let valueB = b[column].toLowerCase();

        if (!isNaN(valueA)) valueA = parseFloat(valueA);
        if (!isNaN(valueB)) valueB = parseFloat(valueB);

        if (sortOrder === 'ASC') {
            return (valueA > valueB) ? 1 : (valueA < valueB) ? -1 : 0;
        } else {
            return (valueA < valueB) ? 1 : (valueA > valueB) ? -1 : 0;
        }
    });

    mostrarTabla(tipo, dataGlobal[tipo]);  // Volver a mostrar la tabla con los datos ordenados
}

// Función para filtrar por nombre
function agregarBusqueda(tipo) {
    const buscador = document.querySelector(`.buscador[data-table="${tipo}"]`);
    const buscadorSelect = document.getElementById('buscador-select');

    buscador.addEventListener('keyup', function() {
        const filtro = this.value.toLowerCase();
        const campoSeleccionado = buscadorSelect.value;  // Obtener el valor seleccionado

        const filtrados = dataGlobal[tipo].filter(item => {
            // Verificar si la clave seleccionada está presente en el objeto
            return item[campoSeleccionado] && item[campoSeleccionado].toString().toLowerCase().includes(filtro);
        });

        mostrarTabla(tipo, filtrados);  // Mostrar los datos filtrados
    });
}

// Esta función se llamará desde cada página
function inicializarTabla(config) {
    cargarTabla(config);
}

function editar(id) {
    window.location.href("editarclases.php?id="+id);
}

function eliminar(id, nombre) {
    const overlayCon = document.getElementById('overlayFondo');
    overlayCon.style.display = 'block';
    const msgCon = document.getElementById('msgCon');
    msgCon.textContent = +nombre;
}

function cerrarEliminar() {
    const overlayCon = document.getElementById('overlayFondo');
    overlayCon.style.display = 'none';
}

document.addEventListener('keydown', (event) => {
    if(event.key === 'Escape'){
        const overlayCon = document.getElementById('overlayFondo');
        if(overlayCon.style.display == "block"){
        overlayCon.style.display = 'none';
        }
    }
})