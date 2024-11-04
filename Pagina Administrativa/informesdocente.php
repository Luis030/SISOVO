<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");
    include("php/seguridaddocente.php");

    $cedula = $_SESSION['cedula'];

    $sql = "SELECT ID_Docente
            FROM docentes
            WHERE Cedula = '$cedula'";
    $resultado = mysqli_query($conexion, $sql);
    while($columna = mysqli_fetch_assoc($resultado)) {
        $idDocente = $columna['ID_Docente'];
    }
?>
<script>
    window.docenteinformes = <?php echo $idDocente ?> 
</script>
<link rel="stylesheet" href="css/datatables.css">
<link rel="stylesheet" href="css/estiloclases.css">
<script src="js/funcionestablas.js"></script>
<script src="js/datostablas.js"></script>
<script src="js/script.js"></script>
<div class="informesDocente">
    <h1>Informes realizados</h1>
    <table id="informes">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Alumno</th>
                <th>Fecha</th>
                <th>Opciones</th>
            </tr>
        </thead>
    </table>
</div>
<?php
    require_once("php/footer.php");
?>