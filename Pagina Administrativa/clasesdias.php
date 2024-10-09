<?php
    require_once("../BD/conexionbd.php");
    require_once("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/styleclasesdias.css">
<link rel="stylesheet" href="css/datatables.css">
<div class="tablaMain">
    <div class="tablaDias">
        <div class="tituloClasesDias">
            <h1>Días de la clase <span></span></h1>
        </div>
        <table id="tabla-clases">
            <thead>
                <tr>
                    <th>Día</th>
                    <th>Horario</th>
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
