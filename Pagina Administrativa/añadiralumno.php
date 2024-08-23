<?php
include("../BD/conexionbd.php");
include("php/funciones.php");


$alumnoingresado = false;
$ceduladuplicada = false;
$cedulanoexiste = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cedula = $_POST['cedula'];
    if (validarCedula($cedula)) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fechanac = $_POST['nacimiento'];
        $celular = $_POST['celular'];
        @$correo = $_POST['correo'];
        @$clases = $_POST['clases'];
        @$patologias = $_POST['patologias'];

        $contraseña = generarPass($cedula);

        $nombreusuario = "$nombre "."$apellido";
        $cedulausada = "SELECT ID_Usuario FROM usuarios WHERE Cedula='$cedula';";

        $cedulausadaverif = $conexion->query($cedulausada);
        if($cedulausadaverif->num_rows > 0){
            header("Location: " . $_SERVER['REQUEST_URI']."?errorid=1");
            exit;
        }
        $sqluser = "INSERT INTO usuarios(Nombre, Contraseña, Tipo, Cedula) VALUES ('$nombreusuario','$contraseña', 'alumno', '$cedula');";
        if($conexion->query($sqluser) == "TRUE"){
            $verusuario = "SELECT ID_Usuario FROM usuarios WHERE  Nombre='$nombreusuario' AND Cedula='$cedula';";
            $consultausuario = $conexion->query($verusuario);
            if($consultausuario->num_rows > 0){
                while($fila = $consultausuario->fetch_assoc()){
                    $IDusuario = $fila["ID_Usuario"];
                }
                $añadiralumno = "INSERT INTO alumnos(ID_Usuario, Nombre, Apellido, Cedula, Fecha_Nac, Mail_Padres, Celular_Padres) VALUES ('$IDusuario', '$nombre', '$apellido', '$cedula', '$fechanac', '$correo', '$celular');";
                if($conexion->query($añadiralumno) == TRUE){
                    if($patologias){
                        $idalumno = "SELECT ID_Alumno FROM alumnos WHERE ID_Usuario='$IDusuario';";
                        $enviar = $conexion->query($idalumno);
                        while($fila = $enviar->fetch_assoc()){
                            $nAalumno = $fila['ID_Alumno'];
                        }

                        foreach($patologias as $patologia){
                            $añadirpat = "INSERT INTO patologia_alumno(ID_Patologia, ID_Alumno) VALUES ('$patologia', '$nAalumno');";
                            $conexion->query($añadirpat);
                        }
                        header("Location: " . $_SERVER['REQUEST_URI']."?success=true");
                        exit;
                    } else {
                        header("Location: " . $_SERVER['REQUEST_URI']."?success=true");
                        exit;
                    }
                }
            }
            
        }

    } else {
        header("Location: " . $_SERVER['REQUEST_URI']."?errorid=2");
        exit;
    }
    
}
if(isset($_GET['success']) && $_GET['success'] == 'true'){
    $alumnoingresado = true;
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
?>
<?php
include("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/estiloañadiralumno.css">
<div class="contenedor-anadir-alumno">
    <div class="titulo-alumno">
        <h1>Añadir alumno</h1>
    </div>
    <div class="contenedor-form-añadir-alumno">
        <form action="añadiralumno.php" method="post">
            <div class="formulario-alumno">
                <div class="input-alumno">
                    <p>Nombres</p>
                    <input type="text" name="nombre" placeholder="Nombres" required>
                </div>
                <div class="input-alumno">
                    <p>Apellidos</p>
                    <input type="text" name="apellido" placeholder="Apellidos" required>
                </div>
                <div class="input-alumno">
                    <p>Cedula</p>
                    <input type="number" name="cedula" placeholder="Sin guiónes: 12345678" required>
                </div>
                <div class="input-alumno">
                    <p>Celular</p>
                    <input type="number" name="celular" placeholder="090000000" required>
                </div>
                <div class="input-alumno">
                    <p>Nacimiento</p>
                    <input type="date" name="nacimiento" required>
                </div>
                <div class="input-alumno">
                    <p>Correo</p>
                    <input type="text" name="correo" placeholder="Opcional">
                </div>
                <div class="input-alumno">
                    <p>Clase/s</p>
                    <select name="clases[]" multiple>
                        <option value="clase1">Clase 1</option>
                        <option value="clase2">Clase 2</option>
                        <option value="clase3">Clase 3</option>
                    </select>
                </div>
                <div class="input-alumno">
                    <p>Patologia/s</p>
                    <select name="patologias[]" id="patologias-select" multiple required>

                    </select>
                </div>
                <div class="input-alumno">
                    <button>Guardar</button>
                </div>
                <?php
                if($alumnoingresado === TRUE){
                    echo "<div class='success'>Alumno ingresado correctamente.</div>";
                } else if ($ceduladuplicada === TRUE){
                    echo "<div class='error'>Cedula ya ingresada.</div>";
                } else if($cedulanoexiste === TRUE){
                    echo "<div class='error'>Cedula inválida.</div>";
                }
                
                ?>
            </div>
        </form>
    </div>
</div>
<?php
include("php/footer.php");
?>