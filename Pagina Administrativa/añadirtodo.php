<?php
    require_once("php/header_sidebar.php");
?>
<script src="JS/cambiarpestanas.js"></script>
<script src="js/cargarselect.js"></script>
<link rel="stylesheet" href="css/styleañadirtodo.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<div class="contenedor-nuevo-elemento">
    <div class="nuevoElemento">
        <div class="cambiar-pagina">
            <p>Añadir...</p>
            <div class="botones">
                <button id="especialidadBoton" onclick="especialidadForm()">Especialidad</button>
                <button id="patologiaBoton" onclick="patologiaForm()">Patologia</button>
                <button id="ocupacionBoton" onclick="ocupacionForm()">Ocupación</button>
            </div>
        </div>
        <div class="formEsp" style="display: flex">
            <p>Nombre de la especialidad</p>
            <input type="text" name="especialidadAgregada" class="especialidadAgregada" required placeholder="Ingrese un nombre">
            <p>Ocupación</p>
            <select name="ocupacionEspecialidad" id="ocupacionEspecialidad" required></select>
            <input type="submit" value="Agregar" class="botonAgregar">
        </div>
        <div class="formPat" style="display: none">
            <p>Nombre de la patología</p>
            <input type="text" name="patologiaAgregada" class="patologiaAgregada" required placeholder="Ingrese un nombre">
            <input type="submit" value="Agregar" class="botonAgregar">
        </div>
        <div class="formOcu" style="display: none">
            <p>Nombre de la ocupación</p>
            <input type="text" name="ocupacionAgregada" class="ocupacionAgregada" required placeholder="Ingrese un nombre">
            <input type="submit" value="Agregar" class="botonAgregar">
        </div>
    </div>
    <div class="agregadoAlMomento">
        <p id="tituloAgregado">Especialidades ingresadas</p>
        <div class="ingresado">
            <ul>

            </ul>
        </div>
        <input type="submit" value="Agregar todo" class="botonAgregarTodo">
    </div>
</div>
<?php
    require_once("php/footer.php");
?>