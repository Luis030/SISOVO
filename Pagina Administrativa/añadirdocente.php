<?php
include("../BD/conexionbd.php");
include("php/funciones.php");
/*
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $cedula = $_POST['cedula'];
    if (validarCedula($cedula)) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $celular = $_POST['celular'];
        @$correo = $_POST['correo'];
        @$especialidades = $_POST['especialidades'];

        $contraseña = generarPass($cedula);
        $nombreusuario = "$nombre "."$apellido";
        $cedulausada = "SELECT ID_Usuario FROM usuarios WHERE Cedula='$cedula';";

        $cedulausadaverif = $conexion->query($cedulausada);
        if($cedulausadaverif->num_rows > 0){
            header("Location: " . $_SERVER['REQUEST_URI']."?errorid=1");
            exit;
        }
        $sqluser = "INSERT INTO usuarios(Nombre, Contraseña, Tipo, Cedula) VALUES ('$nombreusuario','$contraseña', 'docente', '$cedula');";
        if($conexion->query($sqluser) == "TRUE"){
            $verusuario = "SELECT ID_Usuario FROM usuarios WHERE  Nombre='$nombreusuario' AND Cedula='$cedula';";
            $consultausuario = $conexion->query($verusuario);
            if($consultausuario->num_rows > 0){
                while($fila = $consultausuario->fetch_assoc()){
                    $IDusuario = $fila["ID_Usuario"];
                }
            }
        }
    } else {
        header("Location: " . $_SERVER['REQUEST_URI']."?errorid=2");
        exit;
    }
}
    */
include("php/header_sidebar.php");
?>
<div class="contenedor-añadir-docente">
    <div class="titulo-docente">
        <h1>Añadir Docente</h1>
    </div>
    <div class="contenedor-form-añadir-docente">
        <form action="añadirdocente.php" method="post">
            <div class="formulario-alumno">
                <div class="input-alumno">
                    <p>Nombres</p>
                    <input type="text" name="nombre" required>
                </div>
                <div class="input-alumno">
                    <p>Apellidos</p>
                    <input type="text" name="apellido" required>
                </div>
                <div class="input-alumno">
                    <p>Cedula</p>
                    <input type="number" name="cedula" required>
                </div>
                <div class="input-alumno">
                    <p>Correo</p>
                    <input type="text" name="correo">
                </div>
                <div class="input-alumno">
                    <p>Celular</p>
                    <input type="number" name="celular" required>
                </div>
                <div class="input-alumno">
                    <p>Fecha de Nacimiento</p>
                    <input type="date" name="nacimiento" required>
                </div>
                <div class="input-alumno">
                    <p>Especialidad/es</p>
                    <select name="especialidades[]" id="especialidades-select" multiple required>

                    </select>
                </div>
                <div class="input-alumno">
                    <button>Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include("php/footer.php");
?>