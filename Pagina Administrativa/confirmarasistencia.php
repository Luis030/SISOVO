<?php
    include("php/header_sidebar.php");
    include("php/seguridadadmin.php");
?>  
<link rel="stylesheet" href="css/styleasistencia.css">
<script src="js/datostablas.js"></script>
<script src="js/funcionestablas.js"></script>
<script src="js/confirmarasistencias.js"></script>
<div class="asistenciaMain">
    <div class="start">
        <h1>Confirmar asistencia</h1>
        <p><span id="hora"></span></p>
        <input type="number" name="cedula" id="cedulaIngresada" placeholder="Ingrese una cédula" oninput="this.value = this.value.replace(/[eE]/g, '')">
    </div>
    <div class="checkboxs">
        <div class="entrada">
            <label for="entrada">Entrada</label>    
            <input type="radio" name="entrada" id="entrada">
        </div>
        <div class="salida">
            <label for="salida">Salida</label>
            <input type="radio" name="salida" id="salida">
        </div>
    </div>
    <span>X - Salida</span>
    <span>Z - Entrada</span>
    <div class="boton">
        <button class="btn" id="btn">Guardar</button>
    </div>
</div>
<?php
    include("php/footer.php");
?>