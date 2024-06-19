<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir docente</title>
</head>
<body>
    <?php
        include("php/corroborarlogin.php");
        include("php/cuerpo.php");
    ?>
    <div class="añadir-docente-content">
        <h1>Añadir docente</h1>
        <form action="php/subirdocente.php" method="post">
            <div id="elementsDocente">
                <label for="cedula">Cedula</label>
                <input type="text" name="cedula" id="cedula">
            </div>
            <div id="elementsDocente">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div id="elementsDocente">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido">
            </div>
            <div id="elementsDocente">
                <label for="especializacion">Especializacion</label>
                <input type="text" name="especializacion" id="especializacion">
            </div>
            <div id="elementsDocente">
                <input type="submit" value="Ingresar Docente">
            </div>
        </form>
    </div>
</body>
</html>