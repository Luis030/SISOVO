<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");

    $idAlumno = $_GET['id'];; 

    function formatearFecha($fechaSQL) {
        $fecha = new DateTime($fechaSQL);
        return $fecha->format('d/m/Y');
    }
    
    $sql = "SELECT Nombre, Apellido, Fecha_Nac, Mail_Padres, Celular_Padres, CONCAT(Grado, '°') AS Grado
            FROM alumnos
            WHERE ID_Alumno = $idAlumno";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) {
            $nombreAlumno = $columna['Nombre'];
            $apellidoAlumno = $columna['Apellido'];
            $fechaAlumno = $columna['Fecha_Nac'];   
            if ($columna['Mail_Padres'] != null) {
                $mailAlumno = $columna['Mail_Padres'];
            } else {
                $mailAlumno = 'No asignado';
            }
            $celAlumno = $columna['Celular_Padres'];
            $gradoAlumno = $columna['Grado'];
        }
    }
?>
<script>
    window.idalumnotabla = <?php echo $idAlumno ?>
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
            <h1>Información del alumno</h1>
        </div>
        <?php
            if ($_SESSION['Privilegio'] == 'admin') { 
        ?>
        <div class="editarBottom">
            <div class="editarElemento">
                <p>Nombre: <span id="spanNombre"><?php echo $nombreAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre('alumno')"></p>
                <div id="editandoNombre" class="fadeNombre">
                    <input type="text" id="ingresarNombre" placeholder="Ingrese nombre(s)" name="nombreNuevo" required>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idAlumno ?>, 'nombre', 'alumno')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Apellido: <span id="spanApellido"><?php echo $apellidoAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarApellido" onclick="mostrarEditarApellido('alumno')"></p>
                <div id="editandoApellido" class="fadeApellido">
                    <input type ="text" id="ingresarApellido" placeholder="Ingrese apellido(s)" name="apellidoNuevo" required   ></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idAlumno ?>, 'apellido', 'alumno')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Fecha de nacimiento: <span id="spanFecha"><?php echo formatearFecha($fechaAlumno) ?></span><img src="img/editar.png" alt="Editar" id="editarFecha" onclick="mostrarEditarFecha('alumno')"></p>
                <div id="editandoFecha" class="fadeFecha">
                    <input type="date" id="ingresarFecha" name="fechaNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idAlumno ?>, 'fecha', 'alumno')">Guardar</button>   
                </div>
            </div>
            <div class="editarElemento">
                <p>Mail padres: <span id="spanMail"><?php echo $mailAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarMail" onclick="mostrarEditarMail('alumno')"></p>
                <div id="editandoMail" class="fadeMail">
                    <input type="email" id="ingresarMail" placeholder="Ingrese mail" name="mailNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idAlumno ?>, 'mail', 'alumno')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Celular padres: <span id="spanCelular"><?php echo $celAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarCelular" onclick="mostrarEditarCelular('alumno')"></p>
                <div id="editandoCelular" class="fadeCelular">
                    <input type="number" id="ingresarCelular" placeholder="Ingrese celular" name="celularNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idAlumno ?>, 'celular', 'alumno')">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Grado: <span id="spanGrado"><?php echo $gradoAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarGrado" onclick="mostrarEditarGrado('alumno')"></p>
                <div id="editandoGrado" class="fadeGrado">
                    <input type="number" id="ingresarGrado" placeholder="Ingrese grado" name="gradoNuevo" required></input>
                    <button id="guardarInput" onclick="guardarAtributo(<?php echo $idAlumno ?>, 'grado', 'alumno')">Guardar</button>
                </div>
            </div>
        </div>
        <div class="tablaPat">
            <h1>Patologías del alumno</h1>
            <table id="pat">
                <thead>
                    <tr>
                        <th>Nombre de patología</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="agregar">
            <select id="agregarPatAlumno" style="width: 100%;" multiple></select> 
            <button id="agregarPatA" onclick="agregarPatologias()">Agregar</button>
        </div>
        <?php
            }
            if ($_SESSION['Privilegio'] == 'docente') {
        ?>
        <div class="editarBottom">
            <div class="editarElemento">
                <p>Nombre: <span id="spanNombre"><?php echo $nombreAlumno ?></span></p>
            </div>
            <div class="editarElemento">
                <p>Apellido: <span id="spanApellido"><?php echo $apellidoAlumno ?></span></p>
            </div>
            <div class="editarElemento">
                <p>Fecha de nacimiento: <span id="spanFecha"><?php echo formatearFecha($fechaAlumno) ?></span></p>
            </div>
            <?php
                if ($mailAlumno != '') {
            ?>
            <div class="editarElemento">
                <p>Mail padres: <span id="spanMail"><?php echo $mailAlumno ?></span></p>
            </div>
            <?php
                }
            ?>
            <div class="editarElemento">
                <p>Celular padres: <span id="spanCelular"><?php echo $celAlumno ?></span></p>
            </div>
        </div>
        <div class="tablaPat">
            <h1>Patologías del alumno</h1>
            <table id="patD">
                <thead>
                    <tr>
                        <th>Nombre de patología</th>
                    </tr>
                </thead>
            </table>
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
