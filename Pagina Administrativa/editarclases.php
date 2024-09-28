<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");

    $idClase = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['nombreNuevo'])) {
            $nombreNuevo = $_POST['nombreNuevo'];
            $sql = "UPDATE Clase
            SET Nombre = '$nombreNuevo'
            WHERE ID_Clase = $idClase";
        }
        if(isset($_POST['diaNuevo'])) {
            $diaNuevo = $_POST['diaNuevo'];
            $sql = "UPDATE Clase
            SET Dia = '$diaNuevo'
            WHERE ID_Clase = $idClase";
        }
        if(isset($_POST['inicioNuevo'])) {
            $inicioNuevo = $_POST['inicioNuevo'];
            $sql = "UPDATE Clase
            SET Inicio = '$inicioNuevo'
            WHERE ID_Clase = $idClase";
        }
        if(isset($_POST['finalNuevo'])) {
            $finalNuevo = $_POST['finalNuevo'];
            $sql = "UPDATE Clase
            SET Final = '$finalNuevo'
            WHERE ID_Clase = $idClase";
        }
        if(isset($_POST['docenteNuevo'])) {
            $docenteNuevo = $_POST['docenteNuevo'];
            $sql = "UPDATE Clase
            SET ID_Docente = $docenteNuevo
            WHERE ID_Clase = $idClase";
        }
        $resultado = mysqli_query($conexion, $sql);
    }   

    $sql = "SELECT C.Nombre AS NombreClase, Dia, DATE_FORMAT(C.Inicio, '%H:%i') AS hora_inicio, DATE_FORMAT(C.Final, '%H:%i') AS hora_final, D.Nombre AS NombreDocente, Apellido
    FROM Clase C, Docentes D
    WHERE C.ID_Docente = D.ID_Docente AND ID_Clase = $idClase";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) {
            $nombreClase = $columna['NombreClase'];
            $diaClase = $columna['Dia'];
            $inicioClase = $columna['hora_inicio'];
            $finalClase = $columna['hora_final'];
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
                <p>Nombre: <span id="spans"><?php echo $nombreClase ?></span><img src="img/editar.png" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre()"></p>  
                <form action="editarclases?id=<?php echo $idClase ?>" method="post">
                    <div id="editandoNombre" class="fadeNombre">
                        <input type="text" id="ingresarNombre" placeholder="Ingrese un nombre" name="nombreNuevo" required>
                        <button id="guardarInput">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="editarElemento">
                <p>Día: <span id="spans"><?php echo $diaClase ?></span><img src="img/editar.png" alt="Editar" id="editarDia" onclick="mostrarEditarDia()"></p>
                <form action="editarclases?id=<?php echo $idClase ?>" method="post">
                    <div id="editandoDia" class="fadeDia">
                        <select id="ingresarDia" name="diaNuevo" required>
                            <option selected disabled>Seleccione un día</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                        </select>
                        <button id="guardarInput">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="editarElemento">
                <p>Hora de inicio: <span id="spans"><?php echo $inicioClase ?></span><img src="img/editar.png" alt="Editar" id="editarInicio" onclick="mostrarEditarInicio()"></p>
                <form action="editarclases?id=<?php echo $idClase ?>" method="post">
                    <div id="editandoInicio" class="fadeInicio">
                        <input type="time" id="hora" min="08:00" max="18:00" name="inicioNuevo" required>
                        <button id="guardarInput">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="editarElemento">
                <p>Hora final: <span id="spans"><?php echo $finalClase ?></span><img src="img/editar.png" alt="Editar" id="editarFinal" onclick="mostrarEditarFinal()"></p>
                <form action="editarclases?id=<?php echo $idClase ?>" method="post">
                    <div id="editandoFinal" class="fadeFinal">
                        <input type="time" id="hora" min="08:00" max="18:00" name="finalNuevo" required>   
                        <button id="guardarInput">Guardar</button>
                    </div>
                </form>
            </div>
            <div class="editarElemento">
                <p>Docente: <span id="spans"><?php echo $nombreDocente ?></span><img src="img/editar.png" alt="Editar" id="editarDocente" onclick="mostrarEditarDocente()"></p>
                <form action="editarclases?id=<?php echo $idClase ?>" method="post">
                    <div id="editandoDocente" class="fadeDocente">
                        <select id="ingresarDocente" name="docenteNuevo" required style="width: 100%"></select>
                        <button id="guardarInput">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    require_once("php/footer.php");
?>
