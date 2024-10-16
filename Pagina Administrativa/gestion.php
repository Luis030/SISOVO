<?php
    include("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/stylegestion.css">
<div class="gestion">
    <div class="menuGestion">
        <button id="inicio">Inicio</button>
        <button id="docentes">Docentes</button>
        <button id="alumnos">Alumnos</button>
        <button id="informes">Informes</button>
        <button id="elementos">Elementos</button>
    </div>
    <div class="gestionContent" id="gestionContent">
        <div>
            <p>Alumnos totales</p>
            <span id="cantAlumnos"></span>
        </div>
        <div>
            <p>Docentes totales</p>
            <span id="cantDocentes"></span>
        </div>
        <div>
            <p>Clases totales</p>
            <span id="cantClases"></span>
        </div>
        <div>
            <p>Informes realizados</p>
            <div>
                <canvas id="canvaInf"></canvas>
            </div>
        </div>
        <div>
            <p>Patologías</p>
            <div>
                <canvas id="canvaPat"></canvas>
            </div>
        </div>
        <div>
            <p>Especialistas</p>
            <div>
                <canvas id="canvaEsp"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="js/gestion.js"></script>
<?php
    include("php/footer.php");
?>
