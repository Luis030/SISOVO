<?php
    require_once("../BD/conexionbd.php");
    require_once("php/header_sidebar.php");
    include("php/seguridaddocente.php");

    $ceduladoc = $_SESSION['cedula'];
?>
<link rel="stylesheet" href="css/estiloclases.css">
<link rel="stylesheet" href="css/datatables.css">
<div class="contenedor-clases-docente">
    <h1>Clases del docente</h1>
    <div class="contenedor-tabla">
        <table id="clases-docente">
            <thead>
                <tr>
                    <th>Clase</th>
                    <th>Horarios</th>
                    <th>Alumnos</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<script src="js/funcionestablas.js"></script>
<script src="js/datostablas.js"></script>
<script>
    window.ceduladoc = <?php echo json_encode($ceduladoc) ?>;
</script>
<?php
require_once("php/footer.php")
?>