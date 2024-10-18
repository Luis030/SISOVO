<?php
    require_once("php/header_sidebar.php");
?>
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
        <div class="formEsp" style="display: grid;">
            <p>Nombre de la especialidad</p>
            <input type="text" name="especialidadAgregada" id="boton-agregar-esp" class="especialidadAgregada" required placeholder="Ingrese un nombre">
            <p>Ocupación</p>
            <select name="ocupacionEspecialidad" id="ocupacionEspecialidad" required style="width: 100%" style="background: rgb(192, 216, 223)"></select>
            <input type="submit" value="Agregar" class="botonAgregar" onclick="agregarItem('boton-agregar-esp', 'verificar.php?esp=true')">
        </div>
        <div class="formPat" style="display: none;">
            <p>Nombre de la patología</p>
            <input type="text" name="patologiaAgregada" id="boton-agregar-pat" class="patologiaAgregada" required placeholder="Ingrese un nombre">
            <input type="submit" value="Agregar" class="botonAgregar" onclick="agregarItem('boton-agregar-pat', 'verificar.php?pat=true')">
        </div>
        <div class="formOcu" style="display: none;">
            <p>Nombre de la ocupación</p>
            <input type="text" name="ocupacionAgregada" id="boton-agregar-ocu" class="ocupacionAgregada" required placeholder="Ingrese un nombre">
            <input type="submit" value="Agregar" class="botonAgregar" onclick="agregarItem('boton-agregar-ocu', 'verificar.php?ocu=true')">
        </div>
        <div id="errores-items">

        </div>
        <div id="mensaje-items">

        </div>
    </div>
    <div class="agregadoAlMomento">
        <p id="tituloAgregado">Especialidades ingresadas</p>
        <div class="ingresado">

        </div>
        <h5 id="longitud-array-items">Cantidad ingresada: 0</h5>
        <input type="submit" value="Agregar todo" class="botonAgregarTodo">
    </div>
</div>
<script src="JS/cambiarpestanas.js"></script>
<script src="js/cargarselect.js"></script>

<?php
    require_once("php/footer.php");
?>