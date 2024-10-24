<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios</title>
    <link rel="stylesheet" href="Diseño/estiloservicios.css">
</head>
<body>
    <?php
        require_once("PHP/header.php");
    ?>
    <main>
        <div class="titulo-servicios">
            <h1>Servicios</h1>
        </div>
        <div class="parrafo-servicios">
            <p>En Clínica CER, ofrecemos una amplia gama de servicios adaptados a las necesidades específicas de cada niño.</p>
        </div>
        <div class="imagenes-servicios">
            <div class="servicio1">
                <h1>Terapias ocupacionales</h1>
                <p>Diseñadas para ayudar a los niños a desarrollar habilidades motoras y de coordinación.</p>
            </div>
            <div class="servicio2">
                <h1>Terapias del habla y lenguaje</h1>
                <p>Para mejorar la comunicación y el lenguaje.</p>
            </div>
        </div>
        <div class="imagenes-servicios">
            <div class="servicio3">
                <h1>Rehabilitación Física</h1>
                <p>Enfocada en la movilidad y el fortalecimiento físico.</p>
            </div>
            <div class="servicio4">
                <h1>Apoyo Psicológico</h1>
                <p>Brindado por psicólogos especializados en el trato con niños y sus familias.</p>
            </div>
        </div>
        <div class="contacto-servicios">
            <p>Si necesitas saber más información acerca de nuestros servicios contáctate con nosotros.</p>
            <div class="boton-servicios">
                <a href="contactos">CONTACTO</a>
            </div>
        </div>
    </main>
    <?php
        require_once("PHP/footer.php");
    ?>
</body>
</html>