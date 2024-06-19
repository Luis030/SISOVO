<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informes</title>
    <link rel="stylesheet" href="css/estilo.css?aaaA">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
</head>
<body>
    <?php
        include("php/cuerpo.php");
    ?>
    <div class="informes_content">
        <h1 class="informes_titulo">Informes</h1>
        <div class="informes_lista">
            <div class="informes_buscar">
                Buscar: <input type="text" class="buscar-informe" placeholder="Nombre del informe o alumno">
            </div>
            <div class="informes_buscados">
                <ol>
                    <li>------</li>
                    <li>------</li>
                    <li>------</li>
                </ol>
            </div>
            <div class="informes_filtros">
                <h3>Filtros:</h3>
                <input class="check_filtros" type="checkbox" name="1" id="1">
                <label for="1">Ultimas 24 horas</label>
                <br>
                <input class="check_filtros" type="checkbox" name="2" id="2">
                <label for="2">Ultimos 7 dias</label>
                <br>
                <input class="check_filtros" type="checkbox" name="3" id="3">
                <label for="3">Ultimo mes</label>
            </div>
        </div>
    </div>  
</body>
</html>