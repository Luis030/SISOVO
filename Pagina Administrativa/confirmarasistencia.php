<?php
    include("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/styleasistencia.css">
<script src="js/confirmarasistencias.js"></script>
<div class="asistenciaMain">
    <div class="start">
        <h1>Confirmar asistencia</h1>
        <label for="cedulaIngresada">Cédula</label>
        <input type="number" name="cedula" id="cedulaIngresada" placeholder="Ingrese una cédula">
    </div>
    <div class="checkboxs">
        <div class="entrada">
            <label for="entrada">Entrada</label>
            <input type="checkbox" name="entrada" id="entrada">
        </div>
        <div class="salida">
            <label for="salida">Salida</label>
            <input type="checkbox" name="salida" id="salida">
        </div>
    </div>
    <div class="boton">
        <button class="btn" id="btn">Guardar</button>
    </div>
</div>
<?php
    include("php/footer.php");
?>