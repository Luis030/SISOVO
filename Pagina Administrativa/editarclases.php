<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");

    $idClase = $_GET['id'];

    $sql = "SELECT C.Nombre AS NombreClase, Dia, Inicio, Final, D.Nombre AS NombreDocente, Apellido
    FROM Clase C, Docentes D
    WHERE C.ID_Docente = D.ID_Docente AND ID_Clase = $idClase";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) {
            $nombreClase = $columna['NombreClase'];
            $diaClase = $columna['Dia'];
            $inicioClase = $columna['Inicio'];
            $finalClase = $columna['Final'];
            $nombreDocente = $columna['NombreDocente'] ." ". $columna['Apellido'];
        }
    }
?>
<link rel="stylesheet" href="css/estiloselect2.css">
<link rel="stylesheet" href="css/styleeditarclases.css">
<script src="js/cargarselect.js"></script>
<script src="js/editarclases.js"></script>
<div class="editarClase">
    <div class="mainEditar">
        <div class="editarTop">
            <img src="img/atras.png" alt="Volver" class="volver" id="volver" onclick="volverAtras()">
            <h1>Información de la clase</h1>
        </div>
        <div class="editarBottom">
            <div class="editarElemento">
                <p>Nombre: <span id="spans"><?php echo $nombreClase ?></span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre()">
                <div id="editandoNombre" class="fadeNombre">
                    <input type="text" id="ingresarNombre" placeholder="Ingrese un nombre">
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Día: <span id="spans"><?php echo $diaClase ?></span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarDia" onclick="mostrarEditarDia()">
                <div id="editandoDia" class="fadeDia" style="display: none">
                    <select name="diaNuevo" id="ingresarDia">
                        <option selected disabled></option>
                        <option value="1">Lunes</option>
                        <option value="2">Martes</option>
                        <option value="3">Miércoles</option>
                        <option value="4">Jueves</option>
                        <option value="5">Viernes</option>
                    </select>
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Hora de inicio: <span id="spans"><?php echo $inicioClase ?></span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarInicio" onclick="mostrarEditarInicio()">
                <div id="editandoInicio" class="fadeInicio">
                    <input type="time" id="hora" name="inicioNuevo" min="08:00" max="18:00">
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Hora final: <span id="spans"><?php echo $finalClase ?></span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarFinal" onclick="mostrarEditarFinal()">
                <div id="editandoFinal" class="fadeFinal">
                    <input type="time" id="hora" name="finalNuevo" min="08:00" max="18:00">   
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Docente: <span id="spans"><?php echo $nombreDocente ?></span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarDocente" onclick="mostrarEditarDocente()">
                <div id="editandoDocente" style="display: none">
                    <select name="nuevoDocente" id="ingresarDocente"></select>
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once("php/footer.php");
?>
