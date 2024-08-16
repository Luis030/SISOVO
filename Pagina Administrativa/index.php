<?php 
include("php/header_sidebar.php");
?>
<div class="contenedorinicio">
    <div class="infoinicio">
        <h2 id="welcome-message">Bienvenido, <?php echo "Luis"; ?></h2>
        <div class="datetime">
            <div id="horaactual"></div> <!-- Aquí se actualiza la hora en la página principal -->
            <div id="date"></div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="css/estiloinicio.css">
<?php include('php/footer.php'); ?>
