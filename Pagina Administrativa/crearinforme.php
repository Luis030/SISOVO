<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Realizar informe</title>
    </head>
        <body>
            <?php
                include("php/corroborarlogin.php");
                include("php/cuerpo.php")
            ?>
            <div id="crearInformeDiv">
                <h1>Realizar Informe</h1>
                <form action="php/subirinforme.php" method="post">
                    <div id="elementsInforme">
                        <label for="title">Titulo: </label>
                        <input type="text" name="title" id="informeInput" required>
                    </div>
                    <div id="elementsInforme">
                        <label for="patologia">Patologia: </label>
                        <input type="text" name="patologia" id="informeInput" required>
                    </div>
                    <div id="elementsInforme">
                        <label for="ciDocente">Cedula docente: </label>
                        <input type="number" name="ciDocente" id="informeInput" required>
                    </div>
                    <div id="elementsInforme">
                        <label for="ciAlumno">Cedula alumno: </label>
                        <input type="number" name="ciAlumno" id="informeInput" required>
                    </div>
                    <div id="elementsInforme">
                        <label for="obs">Observaciones: </label>
                        <textarea name="obs" id="obs" required></textarea>
                    </div>
                    <div id="elementsInforme">
                        <input type="submit" value="Crear Informe">
                    </div>
                </form>
            </div>
        </body>
</html>
