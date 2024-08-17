<?php
include("../BD/conexionbd.php");
function validarCedula($cedula){
    $cedula = str_replace(array('.', '-'), '', $cedula);
    if (strlen($cedula) != 8) {
        return false;
    }
    $num = substr($cedula, 0, 7);
    $digitoVerificador = substr($cedula, -1);
    $coeficientes = [2, 9, 8, 7, 6, 3, 4];
    $total = 0;
    for ($i = 0; $i < 7; $i++) {
        $total += $num[$i] * $coeficientes[$i];
    }
    $modulo = $total % 10;
    $digitoCalculado = $modulo == 0 ? 0 : 10 - $modulo;
    return $digitoCalculado == $digitoVerificador;
}

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

        $num = substr($cedula, 0, 7);
        $digitoVerificador = substr($cedula, -1);

        $cedulacompleta = $num . '-' . $digitoVerificador;
        $contraseña = password_hash($cedulacompleta, PASSWORD_DEFAULT);
        $nombreusuario = "$nombre "."$apellido";
        
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
                    echo "se hizo todo bien";
                }
            }
            
        }

    } else {
        echo"La cédula no es válida.";
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
                    <input type="text" name="cedula" placeholder="Sin guiónes: 12345678" required>
                </div>
                <div class="input-alumno">
                    <p>Celular</p>
                    <input type="text" name="celular" placeholder="090000000" required>
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
                    <select name="patologias[]" multiple>
                        <option value="pat1">Patologia 1</option>
                        <option value="pat2">Patologia 2</option>
                        <option value="pat3">Patologia 3</option>
                    </select>
                </div>
                <div class="input-alumno">
                    <button>Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include("php/footer.php");
?>