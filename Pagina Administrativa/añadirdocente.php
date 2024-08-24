<?php
include("../BD/conexionbd.php");
include("php/funciones.php");
$ceduladuplicada = false;
$cedulanoexiste = false;
$docenteingresado = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cedula = $_POST['cedula'];
    if (validarCedula($cedula)) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular = $_POST['celular'];
        @$correo = $_POST['correo'];
        @$especialidades = $_POST['especialidades'];
        $nacimiento = $_POST['nacimiento'];

        $contraseña = generarPassDoc($cedula, $nombre, $apellido);
        $nombreusuario = "$nombre "."$apellido";
        $cedulausada = "SELECT ID_Usuario FROM usuarios WHERE Cedula='$cedula';";

        $cedulausadaverif = $conexion->query($cedulausada);
        if($cedulausadaverif->num_rows > 0){
            header("Location: " . $_SERVER['REQUEST_URI']."?errorid=1");
            exit;
        }
        $sqluser = "INSERT INTO usuarios(Nombre, Contraseña, Tipo, Cedula) VALUES ('$nombreusuario','$contraseña', 'docente', '$cedula');";
        if($conexion->query($sqluser) == TRUE){
            $idUser = mysqli_insert_id($conexion);
            $añadirDoc = "INSERT INTO docentes(ID_Usuario, Nombre, Apellido, Cedula, Fecha_Nac, Mail, Celular) VALUES ('$idUser', '$nombre', '$apellido', '$cedula', '$nacimiento', '$correo', '$celular');";
            if($conexion->query($añadirDoc) == TRUE){
                $idDoc = mysqli_insert_id($conexion);
                if($especialidades){
                    foreach($especialidades as $especialidad){
                        $añadirEsp = "INSERT INTO especializacion_docente(ID_Especializacion, ID_Docente) VALUES ('$especialidad', '$idDoc');";
                        $conexion->query($añadirEsp);
                    }
                    header("Location: " . $_SERVER['REQUEST_URI']."?success=true");
                    exit;
                } else {
                    header("Location: " . $_SERVER['REQUEST_URI']."?success=true");
                    exit;
                }
            }
        }
    } else {
        header("Location: " . $_SERVER['REQUEST_URI']."?errorid=2");
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
<div class="contenedor-añadir-docente">
    <div class="titulo-docente">
        <h1>Añadir Docente</h1>
    </div>
    <div class="contenedor-form-añadir-docente">
        <form action="añadirdocente.php" method="post">
            <div class="formulario-docente">
                <div class="input-docente">
                    <p>Nombres</p>
                    <input type="text" name="nombre" required placeholder="Nombres">
                </div>
                <div class="input-docente">
                    <p>Apellidos</p>
                    <input type="text" name="apellido" required placeholder="Apellidos">
                </div>
                <div class="input-docente">
                    <p>Cedula</p>
                    <input type="number" name="cedula" required placeholder="Sin guiónes: 12345678">
                </div>
                <div class="input-docente">
                    <p>Correo</p>
                    <input type="text" name="correo" placeholder="Opcional">
                </div>
                <div class="input-docente">
                    <p>Celular</p>
                    <input type="number" name="celular" required placeholder="090000000">
                </div>
                <div class="input-docente">
                    <p>Fecha de Nacimiento</p>
                    <input type="date" name="nacimiento" required>
                </div>
                <div class="input-docente">
                    <p>Especialidad/es</p>
                    <select name="especialidades[]" id="especialidades-select" multiple required>

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
                    <button>Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include("php/footer.php");
?>