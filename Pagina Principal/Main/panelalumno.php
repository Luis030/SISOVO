<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de alumno</title>
        <link rel="stylesheet" href="Diseño/stylepanelalumno.css">
        <script src="JS/clases.js"></script>
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
                            <input type="text">
                            <button id="parametros"><img src="https://cdn-icons-png.flaticon.com/512/4989/4989427.png" alt="Filtros"></button>
                        </div>
                        <div class="resultadosInformes">
                            <ul>
                                <li class="resultado">asd</li>
                                <li class="resultado"></li>
                                <li class="resultado"></li>
                                <li class="resultado"></li>
                                <li class="resultado"></li>
                                <li class="resultado"></li>
                                <li class="resultado"></li>
                                <li class="resultado"></li>
                                <li class="resultado"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="indiceAlumno"> 
                    <p>Ir a <a href="#clasesIndice">Clases</a></p>
                    <p>Ir a <a href="#informesIndice">Informes</a></p>
                </div>
            </div>
        </main>
        <?php
            require_once("PHP/footer.php");
        ?>
    </body>
</html>