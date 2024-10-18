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
<div class="gestion">
    <div class="menuGestion">
        <a href="gestion.php?pagina=inicio" >Inicio</a>
        <a href="gestion.php?pagina=docentes">Docentes</a>
        <a href="gestion.php?pagina=alumnos">Alumnos</a>
        <a href="gestion.php?pagina=informes">Informes</a>
        <a href="gestion.php?pagina=elementos">Elementos</a>
    </div>
    <div class="gestionContent" id="gestionContent">
        <?php
            if($pagina == "inicio") {
        ?>
        <div>
            <p>Alumnos totales</p>
            <span id="cantAlumnos"><?php echo $cantA ?></span>
        </div>
        <div>
            <p>Docentes totales</p>
            <span id="cantDocentes"><?php echo $cantD ?></span>
        </div>
        <div>
            <p>Clases totales</p>
            <span id="cantClases"><?php echo $cantC ?></span>
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
        <?php
            }
            if ($pagina == "docentes") {
        ?>
        <p>aca va docentes</p>
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
