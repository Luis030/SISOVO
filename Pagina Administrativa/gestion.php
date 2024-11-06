<?php
    include("php/header_sidebar.php");
    include("../BD/conexionbd.php");
    include("php/seguridadadmin.php");
    
    $pagina = $_GET['pagina'];
    if (isset($_GET['seccion'])) {
        $seccion = $_GET['seccion'];
    } else {
        $seccion = "";
    }
    $pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 'inicio';
   
?>
<link rel="stylesheet" href="css/stylegestion.css">
<script src="js/datostablas.js"></script>
<script src="js/funcionestablas.js"></script>
<script src="js/graficos.js"></script>
<script src="js/filtros.js"></script>
<script src="js/cargarselect.js"></script>
<link rel="stylesheet" href="css/estilotablas.css">
<link rel="stylesheet" href="css/datatables.css">
<div class="gestion">
    <div class="menuGestion">
        <a href="gestion.php?pagina=inicio" class="a-header <?php echo $pagina_actual == 'inicio' ? 'activo-pagina' : '' ?>">Inicio</a>
        <a href="gestion.php?pagina=docentes" class="a-header <?php echo $pagina_actual == 'docentes' ? 'activo-pagina' : '' ?>">Docentes</a>
        <a href="gestion.php?pagina=alumnos" class="a-header <?php echo $pagina_actual == 'alumnos' ? 'activo-pagina' : '' ?>">Alumnos</a>
        <a href="gestion.php?pagina=informes" class="a-header <?php echo $pagina_actual == 'informes' ? 'activo-pagina' : '' ?>">Informes</a>
        <a href="gestion.php?pagina=elementos" class="a-header <?php echo $pagina_actual == 'elementos' ? 'activo-pagina' : '' ?>">Elementos</a>
    </div>
    <div class="gestion-contenido" id="gestion-contenido">
        <?php
            switch ($pagina) {
                case "inicio":
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
        </div>
        <div class="grafs">
            <div class="info-inicio">
                    <p>Patologías<svg onclick="filtroGraficoPat(1)" class="filtradoGPat" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="filter-circle"> <path id="vector" d="M2 17.5H7" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_2" d="M22 6.5H17" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_3" d="M13 17.5H22" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_4" d="M11 6.5H2" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_5" d="M10 20.3999C8.34315 20.3999 7 19.0568 7 17.3999C7 15.743 8.34315 14.3999 10 14.3999C11.6569 14.3999 13 15.743 13 17.3999C13 19.0568 11.6569 20.3999 10 20.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_6" d="M14 9.3999C15.6569 9.3999 17 8.05676 17 6.3999C17 4.74305 15.6569 3.3999 14 3.3999C12.3431 3.3999 11 4.74305 11 6.3999C11 8.05676 12.3431 9.3999 14 9.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g> </g></svg></p>
                <div>
                    <canvas id="canvaPat"></canvas>
                </div>
            </div>
            <div class="info-inicio">
                <p>Especialistas<svg onclick="filtroGraficoEsp()" class="filtradoGEsp" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="filter-circle"> <path id="vector" d="M2 17.5H7" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_2" d="M22 6.5H17" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_3" d="M13 17.5H22" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_4" d="M11 6.5H2" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_5" d="M10 20.3999C8.34315 20.3999 7 19.0568 7 17.3999C7 15.743 8.34315 14.3999 10 14.3999C11.6569 14.3999 13 15.743 13 17.3999C13 19.0568 11.6569 20.3999 10 20.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_6" d="M14 9.3999C15.6569 9.3999 17 8.05676 17 6.3999C17 4.74305 15.6569 3.3999 14 3.3999C12.3431 3.3999 11 4.74305 11 6.3999C11 8.05676 12.3431 9.3999 14 9.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g> </g></svg></p>
                <div>
                    <canvas id="canvaEsp"></canvas>
                 </div>
            </div>
        </div>  
        <div class="grafInf">
            <div class="info-inicio">
                <p>Informes realizados<svg onclick="filtradoGraficoInf()" class="filtradoGInf" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="filter-circle"> <path id="vector" d="M2 17.5H7" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_2" d="M22 6.5H17" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_3" d="M13 17.5H22" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_4" d="M11 6.5H2" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_5" d="M10 20.3999C8.34315 20.3999 7 19.0568 7 17.3999C7 15.743 8.34315 14.3999 10 14.3999C11.6569 14.3999 13 15.743 13 17.3999C13 19.0568 11.6569 20.3999 10 20.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_6" d="M14 9.3999C15.6569 9.3999 17 8.05676 17 6.3999C17 4.74305 15.6569 3.3999 14 3.3999C12.3431 3.3999 11 4.74305 11 6.3999C11 8.05676 12.3431 9.3999 14 9.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g> </g></svg></p>
                <div>
                    <canvas id="canvaInf"></canvas>
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
                        <th>Ocupación</th>
                        <th>Celular</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
            <div class="contenedor-graficos-docentes">
                <div class="grafico-docentes">
                    <h1>Docentes con alumnos<svg onclick="filtradoGraficoDocAlu()" class="filtradoGDocAlu" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="filter-circle"> <path id="vector" d="M2 17.5H7" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_2" d="M22 6.5H17" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_3" d="M13 17.5H22" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_4" d="M11 6.5H2" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_5" d="M10 20.3999C8.34315 20.3999 7 19.0568 7 17.3999C7 15.743 8.34315 14.3999 10 14.3999C11.6569 14.3999 13 15.743 13 17.3999C13 19.0568 11.6569 20.3999 10 20.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_6" d="M14 9.3999C15.6569 9.3999 17 8.05676 17 6.3999C17 4.74305 15.6569 3.3999 14 3.3999C12.3431 3.3999 11 4.74305 11 6.3999C11 8.05676 12.3431 9.3999 14 9.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g> </g></svg></h1>
                    <canvas id="canvaDocAlu"></canvas>
                </div>
                <div class="grafico-docentes">
                    <h1>Docentes con clase<svg onclick="filtradoGraficoDocCla()" class="filtradoGDocCla" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="filter-circle"> <path id="vector" d="M2 17.5H7" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_2" d="M22 6.5H17" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_3" d="M13 17.5H22" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_4" d="M11 6.5H2" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_5" d="M10 20.3999C8.34315 20.3999 7 19.0568 7 17.3999C7 15.743 8.34315 14.3999 10 14.3999C11.6569 14.3999 13 15.743 13 17.3999C13 19.0568 11.6569 20.3999 10 20.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_6" d="M14 9.3999C15.6569 9.3999 17 8.05676 17 6.3999C17 4.74305 15.6569 3.3999 14 3.3999C12.3431 3.3999 11 4.74305 11 6.3999C11 8.05676 12.3431 9.3999 14 9.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g> </g></svg></h1>
                    <canvas id="canvaDocCla"></canvas>
                </div>
                <div class="grafico-docentes">
                    <h1>Informes realizados<svg onclick="filtradoGraficoDocInf()" class="filtradoGDocInf" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="filter-circle"> <path id="vector" d="M2 17.5H7" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_2" d="M22 6.5H17" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_3" d="M13 17.5H22" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_4" d="M11 6.5H2" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_5" d="M10 20.3999C8.34315 20.3999 7 19.0568 7 17.3999C7 15.743 8.34315 14.3999 10 14.3999C11.6569 14.3999 13 15.743 13 17.3999C13 19.0568 11.6569 20.3999 10 20.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_6" d="M14 9.3999C15.6569 9.3999 17 8.05676 17 6.3999C17 4.74305 15.6569 3.3999 14 3.3999C12.3431 3.3999 11 4.74305 11 6.3999C11 8.05676 12.3431 9.3999 14 9.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g> </g></svg></h1>
                    <canvas id="canvaDocInf"></canvas>
                </div>
            </div>
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
                        <th>Grado</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
            <div class="boton-filtros-alumnos">
                <button id="boton-filtro-alumnos" onclick="filtradoTablaAlumnos()">Filtrar tabla</button>
            </div>
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
                $seccion_actual = isset($_GET['seccion']) ? $_GET['seccion'] : 'inicio';
        ?>
        <?php 
        if($seccion != "") {
            switch($seccion) {
                case "patologias":
                    $sql = "SELECT 
                    (SELECT COUNT(*) FROM patologias WHERE Estado = 1) AS Total_Patologias_Activas,
                    (SELECT COUNT(p.ID_Patologia) 
                    FROM patologias p 
                    LEFT JOIN patologia_alumno pa ON p.ID_Patologia = pa.ID_Patologia AND pa.Estado = 1
                    WHERE p.Estado = 1 AND pa.ID_Alumno IS NULL) AS Patologias_Sin_Alumnos;
                    ";
                    $resultado = mysqli_query($conexion, $sql);
                    if(mysqli_num_rows($resultado) > 0){
                        while($fila = mysqli_fetch_assoc($resultado)){
                            $cantidadpatologias = $fila['Total_Patologias_Activas'];
                            $patologiassinalumnos = $fila['Patologias_Sin_Alumnos'];
                        }
                    }
        ?>
        <div class="contenedor-seccion-elementos">
            <div class="contenedor-primera-fila-seccion-elementos-inicio contenedor-seccion-elementos-altura">
                <div class="contenedor-botones primera-fila-div">
                    <a href="gestion.php?pagina=elementos" class="<?php echo $seccion_actual == 'inicio' ? 'activo-seccion' : '' ?>">Inicio</a>
                    <a href="gestion.php?pagina=elementos&&seccion=patologias" class="<?php echo $seccion_actual == 'patologias' ? 'activo-seccion' : '' ?>">Patologias</a>
                    <a href="gestion.php?pagina=elementos&&seccion=especialidades" class="<?php echo $seccion_actual == 'especialidades' ? 'activo-seccion' : '' ?>">Especialidades</a>
                    <a href="gestion.php?pagina=elementos&&seccion=ocupaciones" class="<?php echo $seccion_actual == 'ocupaciones' ? 'activo-seccion' : '' ?>">Ocupaciones</a>
                </div>
                <div class="contenedor-tabla-patologias primera-fila-tabla">
                    <table id="tabla-patologias-gestion">
                        <thead>
                            <tr>
                                <th>Nombre de patologia</th>
                                <th>Alumnos</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="contenedor-segunda-fila-div">
                <div class="contenedor-segunda-fila-seccion-elementos-patologias">
                    <p>Patologias totales</p>
                    <span id="pattotalesgestion"></span>
                </div>
                <div class="contenedor-tercera-fila-seccion-elementos-inicio">
                    <div class="contenedor-patologias-sin-alumnos">
                        <p>Patologias sin alumnos</p>
                        <span id="patsinA"></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
                    break;
                case "ocupaciones":
        ?>
        <div class="contenedor-seccion-elementos">
            <div class="contenedor-primera-fila-seccion-elementos-inicio contenedor-seccion-elementos-altura">
                <div class="contenedor-botones primera-fila-div">
                    <a href="gestion.php?pagina=elementos" class="<?php echo $seccion_actual == 'inicio' ? 'activo-seccion' : '' ?>">Inicio</a>
                    <a href="gestion.php?pagina=elementos&&seccion=patologias" class="<?php echo $seccion_actual == 'patologias' ? 'activo-seccion' : '' ?>">Patologias</a>
                    <a href="gestion.php?pagina=elementos&&seccion=especialidades" class="<?php echo $seccion_actual == 'especialidades' ? 'activo-seccion' : '' ?>">Especialidades</a>
                    <a href="gestion.php?pagina=elementos&&seccion=ocupaciones" class="<?php echo $seccion_actual == 'ocupaciones' ? 'activo-seccion' : '' ?>">Ocupaciones</a>
                </div>
                <div class="contenedor-tabla-ocupaciones primera-fila-tabla">
                    <table id="tabla-ocupaciones-gestion">
                        <thead>
                            <tr>
                                <th>Nombre de ocupacion</th>
                                <th>Personas</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="contenedor-segunda-fila-div">
                <div class="contenedor-segunda-fila-seccion-elementos-ocupaciones">
                    <p>Ocupaciones totales</p>
                    <span id="ocutotalesgestion"></span>
                </div>
                <div class="contenedor-tercera-fila-seccion-elementos-inicio">
                    <div class="contenedor-ocupaciones-sin-personas">
                        <p>Ocupaciones sin docentes</p>
                        <span id="ocusinD"></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
                    break;
                case "especialidades":
        ?>
        <div class="contenedor-seccion-elementos">
            <div class="contenedor-primera-fila-seccion-elementos-inicio contenedor-seccion-elementos-altura">
                <div class="contenedor-botones primera-fila-div">
                    <a href="gestion.php?pagina=elementos" class="<?php echo $seccion_actual == 'inicio' ? 'activo-seccion' : '' ?>">Inicio</a>
                    <a href="gestion.php?pagina=elementos&&seccion=patologias" class="<?php echo $seccion_actual == 'patologias' ? 'activo-seccion' : '' ?>">Patologias</a>
                    <a href="gestion.php?pagina=elementos&&seccion=especialidades" class="<?php echo $seccion_actual == 'especialidades' ? 'activo-seccion' : '' ?>">Especialidades</a>
                    <a href="gestion.php?pagina=elementos&&seccion=ocupaciones" class="<?php echo $seccion_actual == 'ocupaciones' ? 'activo-seccion' : '' ?>">Ocupaciones</a>
                </div>
                <div class="contenedor-tabla-especialidades primera-fila-tabla">
                    <table id="tabla-especialidades-gestion">
                        <thead>
                            <tr>
                                <th>Nombre de especialidad</th>
                                <th>Ocupacion</th>
                                <th>Personas</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <div class="contenedor-segunda-fila-div">
                <div class="contenedor-segunda-fila-seccion-elementos-especialidades">
                    <p>Especialidades totales</p>
                    <span id="esptotales"></span>
                </div>
                <div class="contenedor-tercera-fila-seccion-elementos-inicio">
                    <div class="contenedor-ocupaciones-sin-personas">
                        <p>Especialidades sin personas</p>
                        <span id="espsinD"></span>
                    </div>
                </div>
            </div>
        </div>
        <?php
                    break;
                default:
        ?>
        <script>
            window.location.href = "gestion.php?pagina=elementos";
        </script>
        <?php
                    break;
            }
        } else {
            $sql = "SELECT (SELECT COUNT(*) FROM patologias WHERE Estado=1) AS Cantidad_Patologias, (SELECT COUNT(*) FROM especializaciones WHERE Estado=1) AS Cantidad_Especialidades, (SELECT COUNT(*) FROM ocupacion WHERE Estado=1) AS Cantidad_Ocupaciones;
";
            $resultado = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    $cantE = $fila['Cantidad_Especialidades'];
                    $cantO = $fila['Cantidad_Ocupaciones'];
                    $cantP = $fila['Cantidad_Patologias'];
                }
            }
        ?>
        <div class="contenedor-seccion-elementos">
            <div class="contenedor-primera-fila-seccion-elementos-inicio">
            <div class="contenedor-botones primera-fila-div">
                    <a href="gestion.php?pagina=elementos" class="<?php echo $seccion_actual == 'inicio' ? 'activo-seccion' : '' ?>">Inicio</a>
                    <a href="gestion.php?pagina=elementos&&seccion=patologias" class="<?php echo $seccion_actual == 'patologias' ? 'activo-seccion' : '' ?>">Patologias</a>
                    <a href="gestion.php?pagina=elementos&&seccion=especialidades" class="<?php echo $seccion_actual == 'especialidades' ? 'activo-seccion' : '' ?>">Especialidades</a>
                    <a href="gestion.php?pagina=elementos&&seccion=ocupaciones" class="<?php echo $seccion_actual == 'ocupaciones' ? 'activo-seccion' : '' ?>">Ocupaciones</a>
                </div>
                <div class="contenedor-grafico-patologias primera-fila-div">
                    <h1>Patologias <svg onclick="filtroGraficoPat(2)" class="filtradoGPat" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="filter-circle"> <path id="vector" d="M2 17.5H7" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_2" d="M22 6.5H17" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_3" d="M13 17.5H22" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_4" d="M11 6.5H2" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_5" d="M10 20.3999C8.34315 20.3999 7 19.0568 7 17.3999C7 15.743 8.34315 14.3999 10 14.3999C11.6569 14.3999 13 15.743 13 17.3999C13 19.0568 11.6569 20.3999 10 20.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_6" d="M14 9.3999C15.6569 9.3999 17 8.05676 17 6.3999C17 4.74305 15.6569 3.3999 14 3.3999C12.3431 3.3999 11 4.74305 11 6.3999C11 8.05676 12.3431 9.3999 14 9.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g> </g></svg></h1>
                    <canvas id="canvaPatElementos"></canvas>
                </div>
                <div class="contenedor-grafico-empleados primera-fila-div">
                    <h1>Tipos de empleados <svg onclick="filtroGraficoOcu()" class="filtradoGOcu" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g id="style=linear"> <g id="filter-circle"> <path id="vector" d="M2 17.5H7" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_2" d="M22 6.5H17" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_3" d="M13 17.5H22" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_4" d="M11 6.5H2" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_5" d="M10 20.3999C8.34315 20.3999 7 19.0568 7 17.3999C7 15.743 8.34315 14.3999 10 14.3999C11.6569 14.3999 13 15.743 13 17.3999C13 19.0568 11.6569 20.3999 10 20.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> <path id="vector_6" d="M14 9.3999C15.6569 9.3999 17 8.05676 17 6.3999C17 4.74305 15.6569 3.3999 14 3.3999C12.3431 3.3999 11 4.74305 11 6.3999C11 8.05676 12.3431 9.3999 14 9.3999Z" stroke="#000000" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path> </g> </g> </g></svg></h1>
                    <canvas id="canvaEmpleados"></canvas>
                </div>
            </div>
            <div class="contenedor-segunda-fila-seccion-elementos-inicio">
                <div class="contenedor-total-patologias segunda-fila-div">
                    <p>Patologias Totales</p>
                    <?php echo "<span>$cantP</span>"; ?>
                </div>
                <div class="contenedor-total-ocupaciones segunda-fila-div">
                    <p>Ocupaciones totales</p>
                    <?php echo "<span>$cantO</span>"; ?>
                </div>
                <div class="contenedor-total-especialidades segunda-fila-div">
                    <p>Especialidades totales</p>
                    <?php echo "<span>$cantE</span>"; ?>
                </div>
            </div>
        </div>
        <?php
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
