<?php
    include("php/header_sidebar.php");
    include("../BD/conexionbd.php");
    include("php/funciones.php");
    include("php/seguridadadmin.php");

    $alumnoingresado = false;
    $ceduladuplicada = false;
    $cedulanoexiste = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $cedula = $_POST['cedula'];
        if(isset($_POST['validarCedula']) && $_POST['validarCedula'] == "1"){
            if(!validarCedula($cedula)){
                header("Location: añadiralumno.php?errorid=2");
                exit;
            }
        }
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $fechanac = $_POST['nacimiento'];
        $celular = $_POST['celular'];
        $correo = isset($_POST['correo']) ? $_POST['correo'] : "";
        @$clases = $_POST['clases'];
        @$patologias = $_POST['patologias'];
        $grado = $_POST['grado'];
    
        $contraseña = generarPass($cedula);
        $nombreusuario = "$nombre $apellido";
                
        // Verificar si la cédula ya está en uso
        $cedulausada = "SELECT ID_Usuario FROM usuarios WHERE Cedula = '$cedula' AND Estado = 1;";
        $cedulausadaverif = mysqli_query($conexion, $cedulausada);
    
        if (mysqli_num_rows($cedulausadaverif) > 0) {
            header("Location: " . $_SERVER['REQUEST_URI'] . "?errorid=1");
            exit;
        }
    
        // Insertar en la tabla "usuarios"
        $sqluser = "INSERT INTO usuarios(Nombre, Contraseña, Tipo, Cedula, Correo) VALUES ('$nombreusuario','$contraseña', 'alumno', '$cedula', '$correo');";
        if (mysqli_query($conexion, $sqluser) === TRUE) {
            $IDusuario = mysqli_insert_id($conexion);
    
            $añadiralumno = "INSERT INTO alumnos(ID_Usuario, Nombre, Apellido, Cedula, Fecha_Nac, Celular_Padres, Grado) 
                            VALUES ('$IDusuario', '$nombre', '$apellido', '$cedula', '$fechanac', '$celular', '$grado');";
            if (mysqli_query($conexion, $añadiralumno) === TRUE) {
                $nAalumno = mysqli_insert_id($conexion);
    
                if ($patologias) {
                    foreach ($patologias as $patologia) {
                        $añadirpat = "INSERT INTO patologia_alumno(ID_Patologia, ID_Alumno) 
                                    VALUES ('$patologia', '$nAalumno');";
                        mysqli_query($conexion, $añadirpat);
                    }
                }
    
                header("Location: " . $_SERVER['REQUEST_URI'] . "?success=true&&id=" . $nAalumno);
                exit;
            }
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
<link rel="stylesheet" href="css/estiloañadir.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<script src="JS/cargarselect.js"></script>
<div class="contenedor-anadir-alumno">
    <div class="cambiarpagina">
        <div>
            <a href="añadiralumno.php" class="añadir-a" id="agregar-alumno-a">Añadir alumno</a>
            <a href="añadirdocente.php" class="añadir-a" id="agregar-docente-a">Añadir docente</a>
        </div>
    </div>
    <div class="contenedor-form-añadir-alumno">
        <form action="añadiralumno.php" method="post">
            <div class="formulario-alumno">
                <div class="input-alumno">
                    <p>Nombres</p>
                    <input type="text" class="input-formulario" name="nombre" required placeholder="Ingrese un nombre">
                </div>
                <div class="input-alumno">
                    <p>Apellidos</p>
                    <input type="text" class="input-formulario" name="apellido" required placeholder="Ingrese un apellido">
                </div>
                <div class="input-alumno">
                    <div class="elegirCedula">
                        <p>Cédula</p>
                        <input type="checkbox" name="validarCedula" value="1" checked>Verificar cedula
                    </div>
                    <input type="number" class="input-formulario" name="cedula" required min="1" placeholder="Ingrese una cédula">
                </div>
                <div class="input-alumno">
                    <p>Celular</p>
                    <input type="number" class="input-formulario" name="celular" required placeholder="Ingrese un número de teléfono">
                </div>
                <div class="input-alumno">
                    <p>Nacimiento</p>
                    <input type="date" class="input-formulario" name="nacimiento" required>
                </div>
                <div class="input-alumno">
                    <p>Correo</p>
                    <input type="email" class="input-formulario" name="correo" placeholder="Ingrese un correo (Opcional)">
                </div>
                <div class="input-alumno">
                    <p>Grado</p>
                    <input type="number" name="grado" class="input-formulario input-grado" maxlength="2" oninput="this.value=this.value.slice(0,2);" required><span id="span-grado">°</span> 
                </div>
                <div class="input-alumno">
                    <p>Patologia/s</p>
                    <select name="patologias[]" id="patologias-select" multiple required placeholder="Agregar patología" style="width: 100%;">
                    </select>
                </div>
                <div class="input-alumno">
                    <button class="botonguardar">Guardar</button>
                </div>

                <?php
                    if($alumnoingresado === TRUE) {
                        $id = $_GET['id'];
                        echo "<div class='success'>Alumno ingresado correctamente.</div>";
                        echo "<div class='input-alumno'>";
                        echo "<a class='botonguardar nuevo' href='detalle_alumnos.php?id=$id'>Ver último alumno ingresado</a>";
                        echo "</div>";
                    } else if ($ceduladuplicada === TRUE) {
                        echo "<div class='error'>Cedula ya ingresada.</div>";
                    } else if($cedulanoexiste === TRUE) {
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