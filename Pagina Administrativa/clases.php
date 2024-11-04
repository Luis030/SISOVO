<?php
    require_once("../BD/conexionbd.php");
    require_once("php/header_sidebar.php");
    include("php/seguridadadmin.php");
?>

<link rel="stylesheet" href="css/estiloclases.css">
<link rel="stylesheet" href="css/datatables.css">
<div class="contenedor-clases">
    <div class="tabla-clases">
        <table id="tabla-clases">
            <thead>
                <tr>
                    <th>Nombre de clase</th>
                    <th>Docente</th>
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
<?php
    require_once("php/footer.php");
?>
