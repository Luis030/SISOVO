<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir alumno</title>
</head>
<body>
    <?php
        include("php/corroborarlogin.php");
        include("php/cuerpo.php");
    ?>
    <div class="añadir-alumno-content">
        <h1>Agregar alumno</h1>
        <form action="php/subiralumno.php" method="post">
            <div id="elementsAlumno">
                <label for="cedula">Cedula</label>
                <input type="text" name="cedula" id="cedula">
            </div>
            <div id="elementsAlumno">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre">
            </div>
            <div id="elementsAlumno">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido">
            </div>
            <div id="elementsAlumno">
                <label for="fecha">Fecha de Nacimiento</label>
                <input type="date" name="fecha" id="fecha">
            </div>
            <div id="elementsAlumno">
                <label for="patologias">Patologias</label>
                <input type="text" name="patologias" id="patologias">
            </div>
            <div id="elementsAlumno">
                <input type="submit" value="Ingresar alumno">
            </div>
        </form>
    </div>
</body>
</html>