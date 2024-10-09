<?php
include("../BD/conexionbd.php");
include("php/funciones.php");
?>
<?php
include("php/header_sidebar.php");
?>

<! ref a estilos 
!>

<link rel="stylesheet" href="css/estilogestion.css">
<script src="JS/cargarselect.js"></script>
<script src="JS/overlay.js"></script>
<script src="js/overlayreutilizable.js"></script>

<! divs  !> 
<div class="Graficas">
    
    <div class="botones">
    <a href="pepe" class="boton-inicio">Inicio</a>
    <a href="añadirdocente.php" class="boton-inicio">Docentes</a>
    <a href="añadiralumno.php" class="boton-inicio">Alumnos</a>
    <a href="añadirdocente.php" class="boton-inicio">Informes</a>
    <a href="añadiralumno.php" class="boton-inicio">Clases</a>
    <a href="añadirdocente.php" class="boton-inicio">Elementos</a>
    </div>

</div>


<?php
include("php/footer.php");
?>
