<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Panel de alumno</title>
        <link rel="stylesheet" href="Diseño/stylepanelalumno.css?aa">
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
                        <h1>Panel de alumno</h1>

                    </div>
                    <div class="clases">
                        <div class="tituloClases">
                            <h1>Clases asignadas</h1>
                        </div>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                        <p>-</p>
                    </div>
                    <div class="informes">
                        <div class="tituloInformes">
                            <h1>Informes del alumno</h1>
                        </div>
                        <div class="busquedaInformes">
                            <input type="text">
                            <img src="https://cdn-icons-png.flaticon.com/512/4989/4989427.png" alt="Filtros" class="parametros">
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
            </div>
        </main>
        <?php
            require_once("PHP/footer.php");
        ?>
    </body>
</html>