<?php
    include("php/header_sidebar.php");
?>
<script src="js/cargarselect.js"></script>
<link rel="stylesheet" href="css/styleinforme.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<div class="contenedor-informes">
    <form action="php/añadirinforme.php" method="post" class="mainInformes">
        <div class="info">
            <div class="titulo">
                <p>Título</p>
                <input type="text" name="informeTitulo" placeholder="Ingrese un título" required>
            </div>
            <div class="alumno">
                <p class="alumnop">Alumno</p>
                <select name="alumnoIngresado" id="select-alumno-ingresado" style="width: 100%;" required></select>
                <p class="filtrop">Filtrar por clase<input type="checkbox" name="filtrarPorClase" class="porClase"></p>
                <select name="informeClaseAlumno" class="informeClaseAlumno" style="width:100%" required disabled>
                </select>
            </div>
            <div class="fecha-grado">
                <div class="fecha">
                    <p>Fecha</p>
                    <input type="date" name="informeFecha" class="informeFecha" required>
                </div>
                <div class="grado">
                    <p>Grado</p>
                    <input type="number" name="informeGrado" class="informeGrado" maxlength="2" oninput="this.value=this.value.slice(0,2);" required> °
                </div>
            </div>
            <div class="botones">
                <input class="btn" type="submit" value="Enviar">
                <?php
                    if(isset($_GET['success'])){
                        echo "<p style='color:green'>Se ha ingresado el informe correctamente.</p>";
                        $idInforme = $_SESSION['idInforme'];
                        echo "<a href='../fpdf/informe.php?ID=$idInforme' target='_blank'>Ver vista previa.</a>";
                    }
                ?>
            </div>
        </div>
        <div class="observaciones">
            <div class="informeObservaciones">
                <p>Cuerpo del informe</p>
                <textarea name="informeObservacion" class="informeObservacion" placeholder="..." required></textarea>
            </div>
        </div>
        <div class="botonOculto">
            <input type="submit" class="btn">
            <?php
                if(isset($_GET['success'])){
                    echo "<p style='color:green'>Se ha ingresado el informe correctamente.</p>";
                    echo "<a href='../fpdf/informe.php?ID=$idInforme' target='_blank'>Ver vista previa.</a>";
                }
            ?>
        </div>
    </form>
</div>
<?php 
    include("php/footer.php");
?>