<?php
require_once("php/header_sidebar.php");
?>
<script src="JS/cambiarpestanas.js"></script>
<script src="JS/urlactivo.js"></script>
<link rel="stylesheet" href="css/estiloañadir2.css">
<div class="contenedor-nueva-especialidad">
    <div class="cambiar-pagina">
        <div>
            <button onclick="especialidadForm()">Añadir especialidad</button>
            <button onclick="patologiaForm()">Añadir patologia</button>
            <button onclick="ocupacionForm()">Añadir ocupacion</button>
        </div>
    </div>
    <div class="contenedor-formulario-especialidad">
        <form action="">
            <p>nombre</p>
            <input type="text">
        </form>
    </div>
    <div class="contenedor-formulario-patologia" style="display: none;">
        <form action="">
            <p>patologia</p>
            <input type="text">
        </form>
    </div>
    <div class="contenedor-formulario-ocupacion" style="display:none">
        <form action="">
            <p>ocupacion</p>
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