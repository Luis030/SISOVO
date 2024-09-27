<?php
    require_once("../BD/conexionbd.php");
    require_once("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/estiloclases.css">
<div class="contenedor-clases">
    <div class="filtros">
        <select class="buscador-select" id="buscador-select">
            <option value="Nombre">Nombre de Clase</option>
            <option value="docente">Docente</option>
            <option value="Dia">Día</option>
            <option value="Inicio">Inicio</option>
            <option value="Final">Final</option>
            <option value="cantidad">Cantidad de Alumnos</option>
        </select>
        <input type="text" class="buscador" data-table="clases" placeholder="Buscar...">
    </div>
    <div class="tabla-container" id="tabla-alumnos">  

    </div>
</div>
<div id="overlayFondo" style="display: none">
    <div id="overlayConfirmacion">
        <div class="salir">
            <input type="button" value="✖" id="cerrar" onclick="cerrarEliminar()">
        </div>
        <div class="eliminar">
            <p>¿Seguro que quiere eliminar la clase <span id="msgCon"></span>?</p>
            <button id="conSi">Sí</button>
            <button id="conNo" onclick="cerrarEliminar()">No</button>
        </div>
    </div>
</div>


<script src="js/tabla.js"></script>
<script>
    const config = {
        tipo: 'clases',  //tipo de la  tabla en data-table
        url: 'php/obtenertodasclases.php', 
        headers: ['Nombre de Clase', 'Docente', 'Día', 'Inicio', 'Final', 'Cantidad de Alumnos'],  // Encabezados de la tabla
        keys: ['Nombre', 'docente', 'Dia', 'Inicio', 'Final', 'cantidad', ],  // Claves de los datos
        enlace: 'ID_Clase',  
        selector: '#tabla-alumnos'  // Selector donde se renderiza la tabla
    };

    // Llamar a la función para inicializar la tabla
    inicializarTabla(config);
</script>

<?php
    require_once("php/footer.php");
?>
