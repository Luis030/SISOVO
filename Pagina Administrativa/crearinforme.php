<?php
    include("php/header_sidebar.php");
    include("php/seguridaddocente.php");
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
                <select name="alumnoIngresado" id="select-alumno-ingresado" style="width: 100%" style="max-width: 100%;" required></select>
                <p class="filtrop">Filtrar por clase<input type="checkbox" name="filtrarPorClase" class="porClase"></p>
                <select name="informeClaseAlumno" class="informeClaseAlumno" style="width:100%" required disabled>
                </select>
            </div>
            <div class="grado">
                <p>Grado</p>
                <input type="number" id="grado" name="informeGrado" class="informeGrado" maxlength="2" oninput="this.value=this.value.slice(0,2);" required> °
            </div>
            <div class="botones">
                <button class="btn">Enviar</button>
                <?php
                    if(isset($_GET['success'])){
                        echo "<p>Se ha ingresado el informe correctamente.</p>";
                        $idInforme = $_SESSION['idInforme'];
                        echo "<a href='../fpdf/informe.php?ID=$idInforme' target='_blank'>Ver informe.</a>";
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
                    echo "<p>Se ha ingresado el informe correctamente.</p>";
                    echo "<a href='../fpdf/informe.php?ID=$idInforme' target='_blank'>Ver vista previa.</a>";
                }
            ?>
        </div>
    </form>
</div>
<?php 
    include("php/footer.php");
?>