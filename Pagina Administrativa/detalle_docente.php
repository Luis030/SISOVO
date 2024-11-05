<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");
    include("php/seguridadadmin.php");

    $idDocente = $_GET['id'];; 

    function formatearFecha($fechaSQL) {
        $fecha = new DateTime($fechaSQL);
        return $fecha->format('d/m/Y');
    }
    
    $sql = "SELECT D.ID_Ocupacion, D.Nombre AS Docente, D.Apellido, D.Fecha_Nac, U.Correo AS Mail, D.Celular, O.Nombre AS Ocupacion, O.Estado, D.Cedula
            FROM docentes D, ocupacion O, usuarios U
            WHERE ID_Docente = $idDocente AND O.ID_Ocupacion = D.ID_Ocupacion AND D.ID_Usuario=U.ID_Usuario";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) {
            $cedulaDocente = $columna['Cedula'];
            $idOcu = $columna['ID_Ocupacion'];
            $nombreDocente = $columna['Docente'];
            $apellidoDocente = $columna['Apellido'];
            $fechaDocente = $columna['Fecha_Nac'];   
            $estadoOcupacion = $columna['Estado'];
            if ($estadoOcupacion == 0) {
                $docenteOcupacion = "No asignado";
            } else {
                $docenteOcupacion = $columna['Ocupacion'];
            }
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
    window.idOcu = <?php echo $idOcu ?>;
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
                <p>Nombre: <span id="spanNombre"><?php echo $nombreDocente ?></span><img src="img/editar.png" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre('docente')"></p>
                <div id="editandoNombre" class="fadeNombre">
                    <input type="text" id="ingresarNombre" placeholder="Ingrese nombre(s)" name="nombreNuevo" required>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'nombre', 'docente')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Apellido: <span id="spanApellido"><?php echo $apellidoDocente ?></span><img src="img/editar.png" alt="Editar" id="editarApellido" onclick="mostrarEditarApellido('docente')"></p>
                <div id="editandoApellido" class="fadeApellido">
                    <input type ="text" id="ingresarApellido" placeholder="Ingrese apellido(s)" name="apellidoNuevo" required   ></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'apellido', 'docente')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Fecha de nacimiento: <span id="spanFecha"><?php echo formatearFecha($fechaDocente) ?></span><img src="img/editar.png" alt="Editar" id="editarFecha" onclick="mostrarEditarFecha('docente')"></p>
                <div id="editandoFecha" class="fadeFecha">
                    <input type="date" id="ingresarFecha" name="fechaNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'fecha', 'docente')">Guardar</button>   
                </div>
            </div>
            <div class="editarElemento">
                <p>Mail: <span id="spanMail"><?php echo $mailDocente ?></span><img src="img/editar.png" alt="Editar" id="editarMail" onclick="mostrarEditarMail('docente')"></p>
                <div id="editandoMail" class="fadeMail">
                    <input type="email" id="ingresarMail" placeholder="Ingrese mail" name="mailNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'mail', 'docente')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Celular: <span id="spanCelular"><?php echo $celDocente ?></span><img src="img/editar.png" alt="Editar" id="editarCelular" onclick="mostrarEditarCelular('docente')"></p>
                <div id="editandoCelular" class="fadeCelular">
                    <input type="number" id="ingresarCelular" placeholder="Ingrese celular" name="celularNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'celular', 'docente')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Ocupación: <span id="spanOcupacion"><?php echo $docenteOcupacion ?></span><img src="img/editar.png" alt="Editar" id="editarCelular" onclick="mostrarEditarOcupacion()"></p>
                <div id="editandoOcupacion" class="fadeOcupacion">
                    <select id="ingresarOcupacion" style="width: 100%;"></select>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idDocente ?>, 'ocupacion', 'docente')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Restaurar contraseña de fábrica</p>
                <div id="editandoContraseña">
                    <button id="restaurarContraseña" onclick="restaurarContraseña('docente', '<?php echo $nombreDocente ?>', '<?php echo $apellidoDocente ?>', <?php echo $cedulaDocente ?>)">Restaurar</button>
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
        <?php
            if ($docenteOcupacion != "No asignado") {
        ?>
        <div class="agregar">
            <select id="agregarEspDocente" style="width: 100%;" multiple></select> 
            <button id="agregarEspD" onclick="agregarEspecialidad()">Agregar</button>
        </div>
        <?php
            }
        ?>
        <?php
            }
        ?>
    </div>  
</div>
<script src="js/editarpersona.js"></script>
<?php
    require_once("php/footer.php");
?>
