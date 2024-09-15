<?php
require_once("php/header_sidebar.php");
?>
<script src="JS/urlactivo.js"></script>
<link rel="stylesheet" href="css/estiloañadir2.css">
<div class="contenedor-nueva-especialidad">
    <div class="cambiar-pagina">
        <div>
            <a href="añadirespecialidad.php" class="añadir-a">Añadir Especialidad</a>
            <a href="añadirpatologia.php" class="añadir-a">Añadir Patología</a>
            <a href="añadirocupacion.php" class="añadir-a">Añadir Ocupacíon</a>
        </div>
    </div>
    <div class="contenedor-formulario-especialidad">
        <form action="">
            <p>nombre</p>
            <input type="text">
        </form>
    </div>
</div>
<?php
require_once("php/footer.php");
?>
<script>
    actualizarClasePorHref('añadir-a', 'enlace-activo');
</script>