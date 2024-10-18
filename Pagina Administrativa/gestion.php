<?php
    include("php/header_sidebar.php");
    include("../BD/conexionbd.php");
    
    $pagina = $_GET['pagina'];

    $sql = "SELECT (SELECT COUNT(*) FROM alumnos WHERE Estado = 1) AS totalAlumnos,
                   (SELECT COUNT(*) FROM clase WHERE Estado = 1) AS totalClases,
                   (SELECT COUNT(*) FROM docentes WHERE Estado = 1) AS totalDocentes";
    $resultado = mysqli_query($conexion, $sql);
    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $cantA = $fila['totalAlumnos'];
            $cantD = $fila['totalDocentes'];
            $cantC = $fila['totalClases'];
        }
    }
?>
<link rel="stylesheet" href="css/stylegestion.css">
<script src="js/datostablas.js"></script>
<script src="js/funcionestablas.js"></script>
<link rel="stylesheet" href="css/estilotablas.css">
<div class="gestion">
    <div class="menuGestion">
        <a href="gestion.php?pagina=inicio" class="a-header">Inicio</a>
        <a href="gestion.php?pagina=docentes" class="a-header">Docentes</a>
        <a href="gestion.php?pagina=alumnos" class="a-header">Alumnos</a>
        <a href="gestion.php?pagina=informes" class="a-header">Informes</a>
        <a href="gestion.php?pagina=elementos" class="a-header">Elementos</a>
    </div>
    <div class="gestion-contenido" id="gestion-contenido">
        <?php
            if($pagina == "inicio") {
        ?>
        <div class="gestion-inicio-principal">
            <div class="info-inicio">
                <p>Alumnos totales</p>
                <span id="cantAlumnos"><?php echo $cantA ?></span>
            </div>
            <div class="info-inicio">
                <p>Docentes totales</p>
                <span id="cantDocentes"><?php echo $cantD ?></span>
            </div>
            <div class="info-inicio">
                <p>Clases totales</p>
                <span id="cantClases"><?php echo $cantC ?></span>
            </div>
            <div class="info-inicio">
                <p>Informes realizados</p>
                <div>
                    <canvas id="canvaInf"></canvas>
                </div>
            </div>
            <div class="info-inicio">
                <p>Patologías</p>
                <div>
                    <canvas id="canvaPat"></canvas>
                </div>
            </div>
            <div class="info-inicio">
                <p>Especialistas</p>
                <div>
                    <canvas id="canvaEsp"></canvas>
                </div>
            </div>
        </div>
        <?php
            }
            if ($pagina == "docentes") {
        ?>
        <div class="contenedor-seccion-docentes">
            <table id="tabla-docentes">
                <thead>
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Cédula</th>
                        <th>Correo</th>
                        <th>Celular</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
        <?php
            }
            if ($pagina == "alumnos") {
        ?>
        <p>aca va alumnos</p>
        <?php
            }
            if ($pagina == "informes") {
        ?>
        <p>aca va informes</p>
        <?php
            }
            if ($pagina == "elementos") {
        ?>
        <p>aca va elementos</p>
        <?php
            }
        ?>
    </div>
</div>
<?php
    include("php/footer.php");
?>
