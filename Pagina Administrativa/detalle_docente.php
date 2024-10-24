<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");

    $idDocente = $_GET['id'];; 

    function formatearFecha($fechaSQL) {
        $fecha = new DateTime($fechaSQL);
        return $fecha->format('d/m/Y');
    }
    
    $sql = "SELECT Nombre, Apellido, Fecha_Nac, Mail, Celular
            FROM docentes
            WHERE ID_Docente = $idDocente";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) {
            $nombreDocente = $columna['Nombre'];
            $apellidoDocente = $columna['Apellido'];
            $fechaDocente = $columna['Fecha_Nac'];   
            if ($columna['Mail'] != null) {
                $mailDocente = $columna['Mail'];
            } else {
                $mailDocente = 'No asignado';
            }
            $celDocente = $columna['Celular'];
        }
    }
?>
<script>
    window.idDocente = <?php echo $idDocente ?>
</script>
<link rel="stylesheet" href="css/styleeditarclases.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<link rel="stylesheet" href="css/estilotablas.css">
<link rel="stylesheet" href="css/datatables.css">
<link rel="stylesheet" href="css/styles.css">
<script src="js/funcionestablas.js"></script>
<script src="js/cargarselect.js"></script>
<script src="js/datostablas.js"></script>
<div class="editarClase">
    <div class="mainEditar">
        <div class="editarTop">
            <img src="img/atras.png" alt="Volver" class="volver" id="volver" onclick="volverAtras()">
            <h1>Información del docente</h1>
        </div>
        <?php
            if ($_SESSION['Privilegio'] == 'admin') { 
        ?>
        <div class="editarBottom">
            <div class="editarElemento">
                <p>Nombre: <span id="spanNombre"><?php echo $nombreDocente ?></span><img src="img/editar.png" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre()"></p>
                <div id="editandoNombre" class="fadeNombre">
                    <input type="text" id="ingresarNombre" placeholder="Ingrese nombre(s)" name="nombreNuevo" required>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'nombre', 'docente')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Apellido: <span id="spanApellido"><?php echo $apellidoDocente ?></span><img src="img/editar.png" alt="Editar" id="editarApellido" onclick="mostrarEditarApellido()"></p>
                <div id="editandoApellido" class="fadeApellido">
                    <input type ="text" id="ingresarApellido" placeholder="Ingrese apellido(s)" name="apellidoNuevo" required   ></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'apellido', 'docente')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Fecha de nacimiento: <span id="spanFecha"><?php echo formatearFecha($fechaDocente) ?></span><img src="img/editar.png" alt="Editar" id="editarFecha" onclick="mostrarEditarFecha()"></p>
                <div id="editandoFecha" class="fadeFecha">
                    <input type="date" id="ingresarFecha" name="fechaNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'fecha', 'docente')">Guardar</button>   
                </div>
            </div>
            <div class="editarElemento">
                <p>Mail padres: <span id="spanMail"><?php echo $mailDocente ?></span><img src="img/editar.png" alt="Editar" id="editarMail" onclick="mostrarEditarMail()"></p>
                <div id="editandoMail" class="fadeMail">
                    <input type="text" id="ingresarMail" placeholder="Ingrese mail" name="mailNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'mail', 'docente')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Celular padres: <span id="spanCelular"><?php echo $celDocente ?></span><img src="img/editar.png" alt="Editar" id="editarCelular" onclick="mostrarEditarCelular()"></p>
                <div id="editandoCelular" class="fadeCelular">
                    <input type="number" id="ingresarCelular" placeholder="Ingrese celular" name="celularNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'celular', 'docente')">Guardar</button>
                </div>
            </div>
        </div>
        <div class="tablaEsp">
            <h1>Especialidades del docente</h1>
            <table id="esp">
                <thead>
                    <tr>
                        <th>Nombre de especialidad</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="agregar">
            <select id="agregarEspDocente" style="width: 100%;" multiple></select> 
            <button id="agregarEspD" onclick="agregarEspecialidad()">Agregar</button>
        </div>
        <?php
            }
        ?>
    </div>  
</div>
<script src="js/editarpersona.js"></script>
<?php
    require_once("php/footer.php");
?>
