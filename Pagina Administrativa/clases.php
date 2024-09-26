<?php
require_once("../BD/conexionbd.php");
require_once("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/estiloclases.css">
<div class="contenedor-clases">
    <select class="buscador-select" id="buscador-select">
        <option value="Nombre">Nombre de Clase</option>
        <option value="docente">Docente</option>
        <option value="Dia">Día</option>
        <option value="Inicio">Inicio</option>
        <option value="Final">Final</option>
        <option value="cantidad">Cantidad de Alumnos</option>
    </select>
    
    <input type="text" class="buscador" data-table="clases" placeholder="Buscar...">

    <div class="tabla-container" id="tabla-alumnos">  <!-- Asegúrate que el ID coincide -->
        <!-- Aquí se generará la tabla -->
    </div>
</div>

<script src="js/tabla.js"></script>
<script>
    const config = {
        tipo: 'clases',  // Cambiado a 'clases' para reflejar la nueva configuración
        url: 'php/obtenertodasclases.php', 
        headers: ['Nombre de Clase', 'Docente', 'Día', 'Inicio', 'Final', 'Cantidad de Alumnos'],  // Encabezados de la tabla
        keys: ['Nombre', 'docente', 'Dia', 'Inicio', 'Final', 'cantidad', ],  // Claves de los datos
        enlace: 'ID_Clase',  // Indica que se debe crear un enlace con el ID
        detalleUrl: 'pagina_detalle_clase.php',  // Página de detalle
        selector: '#tabla-alumnos'  // Selector donde se renderiza la tabla
    };

    // Llamar a la función para inicializar la tabla
    inicializarTabla(config);
</script>

<?php
require_once("php/footer.php");
?>
