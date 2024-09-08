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
            $IDusuario = mysqli_insert_id($conexion);
            $añadiralumno = "INSERT INTO alumnos(ID_Usuario, Nombre, Apellido, Cedula, Fecha_Nac, Mail_Padres, Celular_Padres) VALUES ('$IDusuario', '$nombre', '$apellido', '$cedula', '$fechanac', '$correo', '$celular');";
                if($conexion->query($añadiralumno) == TRUE){
                    $nAalumno = mysqli_insert_id($conexion);
                    if($patologias){
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
<link rel="stylesheet" href="css/estiloañadir.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<script src="JS/cargarselect.js"></script>
<script src="JS/overlay.js"></script>
<script src="js/patologiasoverlay.js"></script>


<div class="contenedor-anadir-alumno">
    <div class="cambiarpagina">
        <div>
            <a href="añadiralumno.php" class="añadir-a">Añadir alumno</a>
            <a href="añadirdocente.php" class="añadir-a">Añadir docente</a>
        </div>
    </div>
    <div class="contenedor-form-añadir-alumno">
        <form action="añadiralumno.php" method="post">
            <div class="formulario-alumno">
                <div class="input-alumno">
                    <p>Nombres</p>
                    <input type="text" class="input-formulario" name="nombre" required>
                </div>
                <div class="input-alumno">
                    <p>Apellidos</p>
                    <input type="text" class="input-formulario" name="apellido" required>
                </div>
                <div class="input-alumno">
                    <p>Cedula</p>
                    <input type="number" class="input-formulario" name="cedula" required min="1">
                </div>
                <div class="input-alumno">
                    <p>Celular</p>
                    <input type="number" class="input-formulario" name="celular" required>
                </div>
                <div class="input-alumno">
                    <p>Nacimiento</p>
                    <input type="date" class="input-formulario" name="nacimiento" required>
                </div>
                <div class="input-alumno">
                    <p>Correo</p>
                    <input type="text" class="input-formulario" name="correo" placeholder="Opcional">
                </div>
                <div class="input-alumno">
                    <p>Clase/s</p>
                    <select name="clases[]" id="clases" multiple>
                        <option value="clase1">Clase 1</option>
                        <option value="clase2">Clase 2</option>
                        <option value="clase3">Clase 3</option>
                    </select>
                </div>
                <div class="input-alumno">
                    <p>Patologia/s <input type="button" class="nueva-patologia-boton" onclick="patOverlay()" value="&#10010;"></p>
                    <select name="patologias[]" id="patologias-select" multiple required placeholder="Agregar patología" style="width: 100%;">
                    </select>
                </div>
                <div class="input-alumno">
                    <button class="botonguardar">Guardar</button>
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
<div class="patologias-overlay" id="patologias-overlay">
    <div class="contenido-patologias-overlay">
        <div class="cerrar-patologias-overlay">
            <input type="button" value="✖" id="cerrar-patologias-overlay-boton" onclick="cerrarPatOverlay()">
        </div>
        <div class="container-patologias-overlay">
            
            <div class="form-patologia">
                <h1>Patologia</h1>
                <input type="text" id="boton-agregar-patologias">
                <input type="button" value="AGREGAR" class="boton-agregar" onclick="agregarPatologia()">
                <p id="longitud-array-patologias">Cantidad agregada: 0</p>
                <a href="#">Pagina de patologias</a>
                <div id="errores-patologias">

                </div>
            </div>
            <div class="patologias-agregadas">
                <h2>Patologias Agregadas</h2>
                <div class="patologias-lista" id="patologias-lista">
                    
                </div>
            </div>
        </div>
        <input type="button" value="Añadir todo" class="boton-todo" onclick="enviarFormulario()">
        
    </div>
</div>

<script src="js/urlactivo.js"></script>
<script>
   
</script>
<?php
include("php/footer.php");
?>