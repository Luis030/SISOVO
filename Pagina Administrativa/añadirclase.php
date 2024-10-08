<?php
    include("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/styleañadirclases.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<script src="js/cargarselect.js"></script>
<script src="js/.js"></script>
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
        <select name="diasClase" id="diasClase" class="diasClase" style="width: 100%" multiple></select>
    </div>
    <div class="claseInput">
        <label for="alumnoConf" class="alumnosLabel">Inicializar con alumnos</label>
        <input type="checkbox" name="alumnoConf" id="alumnoConf" class="alumnoConf">
        <select name="alumnosClase" id="alumnosClase" class="alumnosClase" style="width: 100%" multiple></select>
    </div>
</div>
<div class="díasHorarios">
        
</div>
<?php
    include("php/footer.php");
?>