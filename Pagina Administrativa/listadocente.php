<?php
    require_once("php/header_sidebar.php");
    include("php/seguridadadmin.php");
?>
<link rel="stylesheet" href="css/estilolistadocente.css">
<link rel="stylesheet" href="css/datatables.css">
<link rel="stylesheet" href="css/estiloclases.css">
<div class="contenedor-lista-docente">
    <div class="tabla-lista-docente">
        <table id="lista-docente">
            <thead>
                <tr>
                    <th>Docente</th>
                    <th>Cedula</th>
                    <th>Fecha</th>
                    <th>Tipo</th>
                    <th>Hora</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="contenedor-filtros">
        <h2>Filtros de fecha:</h2>
        <div class="filtros-divisor">
            <table id="tabla-filtros">
                <tbody>
                    <tr>
                        <td>Hoy</td>
                        <td><input type="radio" class="checkfiltro" value="hoy" checked></td>
                    </tr>
                    <tr>
                        <td>Ultimos 3 dias</td>
                        <td><input type="radio" class="checkfiltro" value="3d"></td>
                    </tr>
                    <tr>
                        <td>Ultimos 7 dias</td>
                        <td><input type="radio" class="checkfiltro" value="7d"></td>
                    </tr>
                </tbody>
            </table>
            <table id="tabla-filtros">
                <tbody>
                    <tr>
                        <td>Ultimos 30 dias</td>
                        <td><input type="radio" class="checkfiltro" value="30d"></td>
                    </tr>
                    <tr>
                        <td>Ultimos 6 meses</td>
                        <td><input type="radio" class="checkfiltro" value="6m"></td>
                    </tr>
                    <tr>
                        <td>Todos</td>
                        <td><input type="radio" class="checkfiltro" value="all"></td>
                    </tr>
                </tbody>
            </table>
            <div class="botones-filtros">
                <div class="boton-filtro-avanzado">
                    <button class="boton-filtros-avanzados" onclick="filtrosAvanzadosListaDocente()">Filtros avanzados</button>
                    <br>
                    <button class="boton-filtros-avanzados" onclick="paginaConfirmarAsistencia()">Confirmar asistencia</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="js/datostablas.js"></script>
<script src="js/funcionestablas.js"></script>
<script src="js/filtros.js"></script>
<?php
    require_once("php/footer.php");
?>