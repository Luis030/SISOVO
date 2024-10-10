<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");

    $idClase = $_GET['id'];; 
    
    $sql = "SELECT C.Nombre AS NombreClase, Horario, D.Nombre AS NombreDocente, Apellido
    FROM Clase C, Docentes D
    WHERE C.ID_Docente = D.ID_Docente AND ID_Clase = $idClase";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) {
            $nombreClase = $columna['NombreClase'];
            $diaClase = $columna['Horario'];
            $nombreDocente = $columna['NombreDocente'] ." ". $columna['Apellido'];
        }
    }
?>
<link rel="stylesheet" href="css/styleeditarclases.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<script src="js/editarclases.js"></script>
<script src="js/cargarselect.js"></script>
<div class="editarClase">
    <div class="mainEditar">
        <div class="editarTop">
            <img src="img/atras.png" alt="Volver" class="volver" id="volver" onclick="volverAtras()">
            <h1>Información de la clase</h1>
        </div>
        <div class="editarBottom">
            <div class="editarElemento">
                <p>Nombre: <span id="spanNombre"><?php echo $nombreClase ?></span><img src="img/editar.png" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre()"></p>
                <div id="editandoNombre" class="fadeNombre">
                    <input type="text" id="ingresarNombre" placeholder="Ingrese un nombre" name="nombreNuevo" required>
                    <button id="guardarInput" onclick="guardarNombre(<?php echo $idClase?>)">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Días: <span id="spanDia"><?php echo $diaClase ?></span><img src="img/editar.png" alt="Editar" id="editarDia" onclick="mostrarEditarDia()"></p>
                <div id="editandoDia" class="fadeDia">
                    <select id="ingresarDia" name="diaNuevo" required>
                        <option selected disabled>Seleccione un día</option>
                        <option value="Lunes">Lunes</option>
                        <option value="Martes">Martes</option>
                        <option value="Miércoles">Miércoles</option>
                        <option value="Jueves">Jueves</option>
                        <option value="Viernes">Viernes</option>
                    </select>
                    <button id="guardarInput" onclick="guardarDia(<?php echo $idClase?>)">Guardar</button>
                </div>
            </div>
            <!--  
            <div class="editarElemento">
                <p>Hora de inicio: <span id="spanInicio"><?php echo $inicioClase ?></span><img src="img/editar.png" alt="Editar" id="editarInicio" onclick="mostrarEditarInicio()"></p>
                <div id="editandoInicio" class="fadeInicio">
                    <input type="time" id="horaInicio" min="08:00" max="18:00" name="inicioNuevo" required>
                    <button id="guardarInput" onclick="guardarInicio(<?php echo $idClase?>)">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Hora final: <span id="spanFinal"><?php echo $finalClase ?></span><img src="img/editar.png" alt="Editar" id="editarFinal" onclick="mostrarEditarFinal()"></p>
                <div id="editandoFinal" class="fadeFinal">
                    <input type="time" id="horaFinal" min="08:00" max="18:00" name="finalNuevo" required>   
                    <button id="guardarInput" onclick="guardarFinal(<?php echo $idClase?>)">Guardar</button>
                </div>
            </div>
            -->
            <div class="editarElemento">
                <p>Docente: <span id="spanDocente"><?php echo $nombreDocente ?></span><img src="img/editar.png" alt="Editar" id="editarDocente" onclick="mostrarEditarDocente()"></p>
                <div id="editandoDocente" class="fadeDocente">
                    <select id="ingresarDocente" name="docenteNuevo" required style="width: 100%"></select>
                    <button id="guardarInput" onclick="guardarDocente(<?php echo $idClase?>)">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require_once("php/footer.php");
?>
