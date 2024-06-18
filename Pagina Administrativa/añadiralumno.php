<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir alumno</title>
</head>
<body>
    <?php
    include("php/cuerpo.php");
    ?>
    <div class="añadir-alumno-content">
        <div class="añadir-alumno-div">
            <form action="php/subiralumno.php" method="post">
                <div class="contenido-formulario">
                    <label for="cedula">Cedula</label>
                    <input type="text" name="cedula" id="cedula" sugerence="none">
                </div>
                <div class="contenido-formulario">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div class="contenido-formulario">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido">
                </div>
                <div class="contenido-formulario">
                    <label for="fecha">Fecha de Nacimiento</label>
                    <input type="date" name="fecha" id="fecha">
                </div>
                <div class="contenido-formulario">
                    <label for="patologias">Patologias</label>
                    <input type="text" name="patologias" id="patologias">
                </div>
                <div class="contenido-formulario-btn">
                    <input type="submit" value="Ingresar alumno">
                </div>
            </form>
        </div>
    </div>
</body>
</html>