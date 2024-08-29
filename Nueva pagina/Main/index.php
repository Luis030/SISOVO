<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Centro de Reeducación CER</title>
    <link rel="stylesheet" href="Diseño/estiloinicio.css">
</head>
<body>
    <?php
        require_once("header.php");
    ?>
    <main>
        <div class="imagenes-inicio">
            <img src="Diseño/IMG/a0dd79b8-8fda-4430-8ccd-ec797357ecfa.jpg" class="imagen-inicio">
            <img src="Diseño/IMG/f4e05af4-078b-47f0-b29f-c6d11afe0526.jpg" alt="">
        </div>
        <div class="titulo">
            <h1 class="titulo-movil" style="color: #38b6ff;">Centro de Reeducacion</h1>
            <h1 class="titulo-pc">
                <span class="colorceleste">Centro de</span>
                <span> </span>
                <span> </span>
                <span style="color: #ff5757;">R</span>
                <span style="color: #ff66c4;">e</span>
                <span style="color: #cb6ce6;">e</span>
                <span style="color: #8c52ff;">d</span>
                <span style="color: #5e17eb;">u</span>
                <span style="color: #0097b2;">c</span>
                <span style="color: #0cc0df;">a</span>
                <span style="color: #5ce1e6;">c</span>
                <span style="color: #38b6ff;">i</span>
                <span style="color: #5271ff;">ó</span>
                <span style="color: #004aad;">n</span>
            </h1>
            <div class="parrafo-inicio">
                <p>¡Bienvenidos al sitio de Centro CER! en donde ofrecemos los mejores servicios a nuestros estudiantes.</p>
            </div>
            <div class="botoncontacto">
                <a href="contactos.php">CONTACTANOS</a>
            </div>
        </div>
        <div class="imagenes-encargados">
            <img src="Diseño/IMG/encargad.jpg" class="imagen-enc" alt="encargados">
            <img src="Diseño/IMG/titulos.jpg" alt="titulos">
            <img src="Diseño/IMG/encargados2.jpg" class="imagen-enc" alt="encargados2">
        </div>
        <div class="tituloencargados">
            <h1>Servicios</h1>
            <div class="parrafo-encargados">
                <p>Somos un equipo de profesionales comprometidos con el bienestar y desarrollo integral de niños con discapacidades y patologías.</p>
            </div>
            <div class="boton-encargados">
                <a href="servicios.php">MÁS INFORMACIÓN</a>
            </div>
        </div>
    </main>
    <?php
        require_once("footer.php");
    ?>
</body>
</html>