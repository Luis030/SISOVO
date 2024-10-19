<?php
    include("php/header_sidebar.php");
    include("../BD/conexionbd.php");
    
    $pagina = $_GET['pagina'];
    if (isset($_GET['tipo'])) {
        $tipo = $_GET['tipo'];
    }

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
<link rel="stylesheet" href="css/datatables.css">
<div class="gestion">
    <div class="menuGestion">
        <a href="gestion.php?pagina=inicio" class="a-header">Inicio</a>
        <a href="gestion.php?pagina=docentes" class="a-header">Docentes</a>
        <a href="gestion.php?pagina=alumnos" class="a-header">Alumnos</a>
        <a href="gestion.php?pagina=informes" class="a-header">Informes</a>
        <a href="gestion.php?pagina=elementos&&tipo=especialidades" class="a-header">Elementos</a>
    </div>
    <div class="gestion-contenido" id="gestion-contenido">
        <?php
            switch ($pagina) {
                case "inicio":
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
                break;  
            case "docentes":
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
                break;  
            case "alumnos":
        ?>
        <div class="contenedor-seccion-alumnos">
            <table id="tabla-alumnos-gestion">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Cédula</th>
                        <th>Edad</th>
                        <th>Correo de tutor</th>
                        <th>Celular tutor</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
        <?php
                break;  
            case "informes":
        ?>
        <div class="contenedor-seccion-informes">
            <table id="tabla-informes-gestion">
                <thead>
                    <tr>
                        <th>Titulo</th>
                        <th>Alumno</th>
                        <th>Docente</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
        <?php
                break;  
            case "elementos":
        ?>
        <div class="seleccionPadre">
            <div class="seleccion">
                <a href="gestion.php?pagina=elementos&&tipo=especialidades" class="a-header">Especialidades</a>
                <a href="gestion.php?pagina=elementos&&tipo=patologias" class="a-header">Patologías</a>
                <a href="gestion.php?pagina=elementos&&tipo=ocupaciones" class="a-header">Ocupaciones</a>
            </div>
        </div>
        <?php
                switch ($tipo) {
                    case "especialidades":
        ?>
        <div class="esp">
            <h1>Especialidades</h1>
            <div class="espTabla">
                <table id="tabla-esp-gestion">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Cant. Docentes</th>
                            <th>Ocupación</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
        <?php
                        break;
                    case "patologias":
        ?>
        <h1>Patologias</h1>
        <?php
                        break;
                    case "ocupaciones":
        ?>
        <h1>Ocupaciones</h1>
        <?php
                        break;
                    default:
        ?>
        <script>
            window.location.href = "gestion.php?pagina=elementos&&tipo=especialidades";
        </script>
        <?php
                        break;
                    }
        ?>
        <?php
                break;
            default:
        ?>
        <script>
            window.location.href = "gestion.php?pagina=inicio";
        </script>
        <?php
                break;
            }
        ?>
    </div>
</div>
<?php
    include("php/footer.php");
?>
