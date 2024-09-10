<?php
include("../BD/conexionbd.php");
include("php/funciones.php");

$ceduladuplicada = false;
$cedulanoexiste = false;
$docenteingresado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_POST['cedula'];
    
    if (validarCedula($cedula)) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular = $_POST['celular'];
        @$correo = $_POST['correo'];
        @$especialidades = $_POST['especialidades'];
        $nacimiento = $_POST['nacimiento'];

        $contraseña = generarPassDoc($cedula, $nombre, $apellido);
        $nombreusuario = "$nombre $apellido";
        
        $cedulausada = "SELECT ID_Usuario FROM usuarios WHERE Cedula='$cedula';";
        $cedulausadaverif = mysqli_query($conexion, $cedulausada);

        if (mysqli_num_rows($cedulausadaverif) > 0) {
            header("Location: " . $_SERVER['REQUEST_URI'] . "?errorid=1");
            exit;
        }
        $sqluser = "INSERT INTO usuarios(Nombre, Contraseña, Tipo, Cedula) 
                    VALUES ('$nombreusuario', '$contraseña', 'docente', '$cedula');";
        if (mysqli_query($conexion, $sqluser) === TRUE) {
            $idUser = mysqli_insert_id($conexion);
            $añadirDoc = "INSERT INTO docentes(ID_Usuario, Nombre, Apellido, Cedula, Fecha_Nac, Mail, Celular) 
                          VALUES ('$idUser', '$nombre', '$apellido', '$cedula', '$nacimiento', '$correo', '$celular');";
            if (mysqli_query($conexion, $añadirDoc) === TRUE) {
                $idDoc = mysqli_insert_id($conexion);
                if ($especialidades) {
                    foreach ($especialidades as $especialidad) {
                        $añadirEsp = "INSERT INTO especializacion_docente(ID_Especializacion, ID_Docente) 
                                      VALUES ('$especialidad', '$idDoc');";
                        mysqli_query($conexion, $añadirEsp);
                    }
                }
                header("Location: " . $_SERVER['REQUEST_URI'] . "?success=true");
                exit;
            }
        }
    } else {
       
        header("Location: " . $_SERVER['REQUEST_URI'] . "?errorid=2");
        exit;
    }
}


if(isset($_GET['success']) && $_GET['success'] == 'true'){
    $docenteingresado = true;
}
if(isset($_GET['errorid'])){
    $error = $_GET['errorid'];
    switch($error){
        case '1':
            $ceduladuplicada = true;
            break;
        case '2':
            $cedulanoexiste = true;
            break;
    }
}
    
include("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/estiloañadir.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<script src="js/cargarselect.js"></script>
<div class="contenedor-añadir-docente">
    <div class="cambiarpagina">
        <div>
            <a href="añadiralumno.php" class="añadir-a">Añadir alumno</a>
            <a href="añadirdocente.php" class="añadir-a">Añadir docente</a>
        </div>
    </div>
    <div class="contenedor-form-añadir-docente">
        <form action="añadirdocente.php" method="post">
            <div class="formulario-docente">
                <div class="input-docente">
                    <p>Nombres</p>
                    <input type="text" class="input-formulario" name="nombre" required>
                </div>
                <div class="input-docente">
                    <p>Apellidos</p>
                    <input type="text" class="input-formulario" name="apellido" required>
                </div>
                <div class="input-docente">
                    <p>Cédula</p>
                    <input type="number" class="input-formulario" name="cedula" required>
                </div>
                <div class="input-docente">
                    <p>Correo</p>
                    <input type="text" class="input-formulario" name="correo">
                </div>
                <div class="input-docente">
                    <p>Celular</p>
                    <input type="number" class="input-formulario" name="celular" required>
                </div>
                <div class="input-docente">
                    <p>Fecha de Nacimiento</p>
                    <input type="date" class="input-formulario" name="nacimiento" required>
                </div>
                <div class="input-docente">
                    <p>Especialidad/es <input type="button" class="nueva-especialidad-boton" onclick="patOverlay()" value="&#10010;"></p>
                    <select name="especialidades[]" id="especialidades-select" style="width: 100%;" multiple required>

                    </select>
                </div>
                <div class="input-alumno">
                    <?php
                    if($docenteingresado === TRUE){
                        echo "<div class='success'>Docente ingresado correctamente.</div>";
                    } else if ($ceduladuplicada === TRUE){
                        echo "<div class='error'>Cedula ya ingresada.</div>";
                    } else if($cedulanoexiste === TRUE){
                        echo "<div class='error'>Cedula inválida.</div>";
                    }
                    ?>
                </div>
                
                <div class="input-docente">
                    <button class="botonguardar">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="agregar-overlay" id="agregar-overlay">
    <div class="contenido-agregar-overlay">
        <div class="cerrar-agregar-overlay">
            <input type="button" value="✖" id="cerrar-agregar-overlay-boton" onclick="cerrarPatOverlay()">
        </div>
        <div class="container-agregar-overlay">
            <div class="form-agregar">
                <h1>Especialidad</h1>
                <input type="text" id="boton-agregar-items">
                <input type="button" value="AGREGAR" class="boton-agregar" onclick="agregarItem()">
                <p id="longitud-array-items">Cantidad agregada: 0</p>
                <a href="#">Pagina de especialidades</a>
                <div id="mensaje-items"></div>
                <div id="errores-items"></div>
            </div>
            <div class="items-agregadas">
                <h2>Especialidades Agregadas</h2>
                <div class="items-lista" id="items-lista"></div>
            </div>
        </div>
        <input type="button" value="Añadir todo" class="boton-todo" onclick="enviarFormulario('php/añadirespecialidades.php')">
    </div>
</div>
<script src="JS/overlayreutilizable.js"></script>
<script src="JS/overlay.js"></script>
<script src="JS/urlactivo.js"></script>
<?php
include("php/footer.php");
?>