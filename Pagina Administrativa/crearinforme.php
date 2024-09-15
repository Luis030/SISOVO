<?php
    include("../BD/conexionbd.php");
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        @$titulo = $_POST['titulo'];
        $observaciones = $_POST['observaciones'];
        $grado = $_POST['grado'];
        $fecha = $_POST['fecha'];

        $sql = "INSERT INTO informes(ID_Docente, ID_Alumno, Titulo, Observaciones, Grado, Fecha) VALUES (3, 31, '$titulo', '$observaciones', '$grado', '$fecha')";
        mysqli_query($conexion, $sql);
        echo "exito";
    }
?>
<?php
    include("php/header_sidebar.php");
?>
<script src="js/cargarselect.js"></script>
<link rel="stylesheet" href="css/styleinforme.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<div class="contenedor-informes">
    <form action="crearinforme.php" method="post" class="mainInformes">
        <div class="info">
            <div class="titulo">
                <p>Título</p>
                <input type="text" name="informeTitulo" placeholder="Ingrese un título">
            </div>
            <div class="alumno">
                <p class="alumnop">Alumno</p>
                <select name="informeAlumno" class="informeAlumno" style="width:100%" required>
                </select>
                <p class="filtrop">Filtrar por clase<input type="checkbox" name="filtrarPorClase" class="porClase"></p>
                <select name="informeClaseAlumno" class="informeClaseAlumno" style="width:100%" required disabled>
                </select>
            </div>
            <div class="fecha-grado">
                <div class="fecha">
                    <p>Fecha</p>
                    <input type="date" name="informeFecha" class="informeFecha">
                </div>
                <div class="grado">
                    <p>Grado</p>
                    <input type="number" name="informeGrado" class="informeGrado" maxlength="2" oninput="this.value=this.value.slice(0,2);"> °
                </div>
            </div>
            <div class="botones">
                <input class="btn" type="submit" value="Enviar">
            </div>
        </div>
        <div class="observaciones">
            <div class="informeObservaciones">
                <p>Cuerpo del informe</p>
                <textarea name="informeObservacion" class="informeObservacion" placeholder="..."></textarea>
            </div>
        </div>
        <div class="botonOculto">
            <input type="submit" class="btn">
        </div>
    </form>
</div>
<?php 
    include("php/footer.php");
?>