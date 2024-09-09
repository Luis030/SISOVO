<?php
    /* require_once("../../../BD/conexionbd.php");
    session_start();

    $sql = "SELECT ID_Alumno
            FROM alumnos
            WHERE Cedula = $_SESSION['cedula']";

    $consultasql = $conexion->prepare($sql); 

    if ($consultasql) {
        $consultasql->execute();
        $resultado = $consultasql->get_result();
        if ($resultado) {
            while($fila = $resultado->fetch_assoc()){
                $_SESSION['ID_Alumno'] = $fila['ID_Alumno'];
            }
        } else {
            echo json_encode(["error" => "Error en la obtención de datos."]);
        }
        $consultasql->close();
    } else {
        echo json_encode(["error" => "Error al preparar la consulta SQL."]);
    } 
    */
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Detalles del Informe</title>
        <script src="JS/detallesinformes.js"></script>
        <link rel="stylesheet" href="Diseño/styledetallesinformes.css?aaa">
    </head>
    <body>
        <div class="main">
            <div class="izq">
                <h1>Detalles del informe</h1>
                <div class="infoRapida">
                    <p><strong>Título:</strong> <span id="titulo">Cargando...</span></p>
                    <p><strong>Fecha:</strong> <span id="fecha">Cargando...</span></p>
                    <p><strong>Docente:</strong> <span id="docente">Cargando...</span></p>
                </div>
                <p class="aviso">El informe debe ser impreso sin encabezado ni pie de pagina, esas opciones pueden ser deshabilitadas en el menú de impresión.</p>
                <div class="botonImp">
                    <button onclick="window.print()" id="imprimir">Imprimir</button>
                </div>
            </div>
            <div class="der">
                <div id="informe">
                    <p>adsd</p>
                </div>
            </div>  
        </div>
    </body>
</html>
