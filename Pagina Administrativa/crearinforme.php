<?php
include("../BD/conexionbd.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    @$titulo = $_POST['titulo'];
    $observaciones = $_POST['observaciones'];
    $grado = $_POST['grado'];
    $fecha = $_POST['fecha'];

    $sql = "INSERT INTO Informes(ID_Docente, ID_Alumno, Titulo, Observaciones, Grado, Fecha) VALUES (3, 31, $titulo, $observaciones, $grado, $fecha);";
    mysqli_query($conexion, $sql);
    echo "exito";
}

?>

<?php
include("php/header_sidebar.php");
?>
<div class="contenedor-informes">
<form action="crearinforme.php" method="post">
    <p>Titulo</p>
    <input type="text" name="titulo" required>
    <p>Observaciones</p>
    <textarea name="observaciones" id="1" required></textarea>
    <p>Grado</p>
    <input type="number" name="grado" required>
    <p>fecha</p>
    <input type="date" name="fecha" required>
    <input type="submit">
</form>
    
</div>
<?php 
include("php/footer.php");
?>