<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de alumno</title>
        <link rel="stylesheet" href="Diseño/stylepanelalumno.css?aa">
        <script src="JS/panelalumno.js"></script>
    </head>
    <body>
        <?php
            require_once("PHP/header.php");
            if(!isset($_SESSION['usuario'])){
                header("Location: index.php");
            }
        ?>
        <main>
            <div class="panelAlumnoMain">
                <div class="panel">
                    <div class="panelHeader">
                        <h1 id="clasesIndice">Panel de alumno</h1>
                    </div>
                    <div class="clases">
                        <div class="tituloClases">
                            <h1>Clases asignadas</h1>
                        </div>
                        <div id="clasesAsignadas">
                        <!-- Acá estan las clases traídas de la base de datos -->
                        </div>
                    </div>
                    <div class="informes">
                        <div class="tituloInformes">
                            <h1 id="informesIndice">Informes del alumno</h1>
                        </div>
                        <div class="busquedaInformes">
                            <input type="text" id="busquedaInformeAlumno" placeholder="Escriba aquí para buscar...">
                        </div>
                        <div class="resultadosInformes">
                            <ul id="listaInformes">
                            <!-- Acá estan los informes traídos de la base de datos -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php
            require_once("PHP/footer.php");
        ?>
    </body>
</html>