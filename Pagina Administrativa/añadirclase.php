<?php
    include("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/styleañadirclases.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<script src="js/cargarselect.js"></script>
<script src="js/añadirclase.js"></script>
<div class="nuevaClase">
    <div class="claseInput">
        <label for="nombreClase">Nombre de la clase</label>
        <input type="text" name="nombreClase" id="nombreClase" class="nombreClase" placeholder="Ingrese un nombre">
    </div>
    <div class="claseInput">
        <label for="docenteClase">Ingrese docente</label>
        <select name="docenteClase" id="docenteClase" class="docenteClase" style="width: 100%"></select>
    </div>
    <div class="claseInput">
        <label for="diasClase">Ingrese día(s)</label>
        <select name="diasClase" id="diasClase" class="diasClase" style="width: 100%" multiple>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miércoles">Miércoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sábado">Sábado</option>
        </select>
    </div>
    <div class="claseInput">
        <label for="alumnoConf" class="alumnosLabel">Inicializar con alumnos<input type="checkbox" name="alumnoConf" id="alumnoConf" class="alumnoConf"></label>
        <select name="alumnosClase" id="alumnosClase" class="alumnosClase" style="width: 100%" multiple disabled></select>
    </div>
</div>
<div class="diasHorarios" id="diasHorarios">
        
</div>
<div class="enviarDiv" id="enviarDiv">
    <button id="enviar" onclick="guardarClase()">Enviar</button>
</div>
<?php
    include("php/footer.php");
?>