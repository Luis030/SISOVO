<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");

    $idAlumno = $_GET['id'];; 

    function formatearFecha($fechaSQL) {
        $fecha = new DateTime($fechaSQL);
        $fecha->modify('+1 day');
        return $fecha->format('d/m/Y');
    }
    
    $sql = "SELECT Nombre, Apellido, Fecha_Nac, Mail_Padres, Celular_Padres
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
        }
    }
?>
<link rel="stylesheet" href="css/styleeditarclases.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<script src="js/editaralumno.js"></script>
<script src="js/cargarselect.js"></script>
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
                <p>Nombre: <span id="spanNombre"><?php echo $nombreAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre()"></p>
                <div id="editandoNombre" class="fadeNombre">
                    <input type="text" id="ingresarNombre" placeholder="Ingrese nombre(s)" name="nombreNuevo" required>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Apellido: <span id="spanApellido"><?php echo $apellidoAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarApellido" onclick="mostrarEditarApellido()"></p>
                <div id="editandoApellido" class="fadeApellido">
                    <input type ="text" id="ingresarApellido" placeholder="Ingrese apellido(s)" name="apellidoNuevo" required   ></input>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Fecha de nacimiento: <span id="spanFecha"><?php echo formatearFecha($fechaAlumno)     ?></span><img src="img/editar.png" alt="Editar" id="editarFecha" onclick="mostrarEditarFecha()"></p>
                <div id="editandoFecha" class="fadeFecha">
                    <input type="date" id="ingresarFecha" name="fechaNuevo" required></input>
                    <button id="guardarInput" onclick="">Guardar</button>   
                </div>
            </div>
            <div class="editarElemento">
                <p>Mail padres: <span id="spanMail"><?php echo $mailAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarMail" onclick="mostrarEditarMail()"></p>
                <div id="editandoMail" class="fadeMail">
                    <input type="text" id="ingresarMail" placeholder="Ingrese mail" name="mailNuevo" required></input>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Celular padres: <span id="spanCelular"><?php echo $celAlumno ?></span><img src="img/editar.png" alt="Editar" id="editarCelular" onclick="mostrarEditarCelular()"></p>
                <div id="editandoCelular" class="fadeCelular">
                    <input type="number" id="ingresarCelular" placeholder="Ingrese celular" name="celularNuevo" required></input>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
        </div>
        <?php
            }
            if ($_SESSION['Privilegio'] == 'docente') {
        ?>
        <div class="editarBottom">
            <div class="editarElemento">
                <p>Nombre: <span id="spanNombre"><?php echo $nombreAlumno ?></span></p>
                <div id="editandoNombre" class="fadeNombre">
                    <input type="text" id="ingresarNombre" placeholder="Ingrese un nombre" name="nombreNuevo" required>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Apellido: <span id="spanApellido"><?php echo $apellidoAlumno ?></span></p>
                <div id="editandoApellido" class="fadeApellido">
                    <select id="ingresarApellido" name="apellidoNuevo" required style="width: 100%"></select>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Fecha de nacimiento: <span id="spanFecha"><?php echo $fechaAlumno ?></span></p>
                <div id="editandoFecha" class="fadeFecha">
                    <select id="ingresarFecha" name="fechaNuevo" required style="width: 100%"></select>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
            <?php
                if ($mailAlumno != '') {
            ?>
            <div class="editarElemento">
                <p>Mail padres: <span id="spanMail"><?php echo $mailAlumno ?></span></p>
                <div id="editandoMail" class="fadeMail">
                    <select id="ingresarMail" name="mailNuevo" required style="width: 100%"></select>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
            <?php
                }
            ?>
            <div class="editarElemento">
                <p>Celular padres: <span id="spanCelular"><?php echo $celAlumno ?></span></p>
                <div id="editandoCelular" class="fadeCelular">
                    <select id="ingresarCelular" name="celularNuevo" required style="width: 100%"></select>
                    <button id="guardarInput" onclick="">Guardar</button>
                </div>
            </div>
        </div>
        <?php
            }
        ?>
    </div>  
</div>
<?php
    require_once("php/footer.php");
?>
