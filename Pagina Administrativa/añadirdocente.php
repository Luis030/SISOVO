<?php
    include("php/header_sidebar.php");
    include("../BD/conexionbd.php");
    include("php/funciones.php");
    include("php/seguridadadmin.php");

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
            $idocupacion = $_POST['ocupacion'];

            $contraseña = generarPassDoc($cedula, $nombre, $apellido);
            $nombreusuario = "$nombre $apellido";
            
            $cedulausada = "SELECT ID_Usuario FROM usuarios WHERE Cedula='$cedula' AND Estado = 1;";
            $cedulausadaverif = mysqli_query($conexion, $cedulausada);

            if (mysqli_num_rows($cedulausadaverif) > 0) {
                header("Location: " . $_SERVER['REQUEST_URI'] . "?errorid=1");
                exit;
            }
            $sqluser = "INSERT INTO usuarios(Nombre, Contraseña, Tipo, Cedula) 
                        VALUES ('$nombreusuario', '$contraseña', 'docente', '$cedula');";
            if (mysqli_query($conexion, $sqluser) === TRUE) {
                $idUser = mysqli_insert_id($conexion);
                $añadirDoc = "INSERT INTO docentes(ID_Usuario, Nombre, Apellido, Cedula, Fecha_Nac, Mail, Celular, ID_Ocupacion) 
                            VALUES ('$idUser', '$nombre', '$apellido', '$cedula', '$nacimiento', '$correo', '$celular', '$idocupacion');";
                if (mysqli_query($conexion, $añadirDoc) === TRUE) {
                    $idDoc = mysqli_insert_id($conexion);
                    if ($especialidades) {
                        foreach ($especialidades as $especialidad) {
                            $añadirEsp = "INSERT INTO especializacion_docente(ID_Especializacion, ID_Docente) 
                                        VALUES ('$especialidad', '$idDoc');";
                            mysqli_query($conexion, $añadirEsp);
                        }
                    }
                    header("Location: " . $_SERVER['REQUEST_URI'] . "?success=true&&id=" . $idDoc);
                    exit;
                }
            }
        } else {
        
            header("Location: " . $_SERVER['REQUEST_URI'] . "?errorid=2");
            exit;
        }
    }


    if(isset($_GET['success']) && $_GET['success'] == 'true')   {
        $docenteingresado = true;
    }

    if(isset($_GET['errorid'])) {
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
<script src="js/cargarselect.js"></script>
<div class="contenedor-añadir-docente">
    <div class="cambiarpagina">
        <div>
            <a href="añadiralumno.php" class="añadir-a" id="agregar-alumno-a">Añadir alumno</a>
            <a href="añadirdocente.php" class="añadir-a" id="agregar-docente-a">Añadir docente</a>
        </div>
    </div>
    <div class="contenedor-form-añadir-docente">
        <form action="añadirdocente.php" method="post">
            <div class="formulario-docente">
                <div class="input-docente">
                    <p>Nombres</p>
                    <input type="text" class="input-formulario" name="nombre" required placeholder="Ingrese un nombre">
                </div>
                <div class="input-docente">
                    <p>Apellidos</p>
                    <input type="text" class="input-formulario" name="apellido" required placeholder="Ingrese un apellido">
                </div>
                <div class="input-docente">
                    <p>Cédula</p>
                    <input type="number" class="input-formulario" name="cedula" required placeholder="Ingrese una cédula">
                </div>
                <div class="input-docente">
                    <p>Correo</p>
                    <input type="text" class="input-formulario" name="correo" placeholder="Ingrese un correo (Opcional)">
                </div>
                <div class="input-docente">
                    <p>Celular</p>
                    <input type="number" class="input-formulario" name="celular" required placeholder="Ingrese un número de teléfono">
                </div>
                <div class="input-docente">
                    <p>Fecha de Nacimiento</p>
                    <input type="date" class="input-formulario" name="nacimiento" required>
                </div>
                <div class="input-docente select-ocupacion-div">
                    <p>Ocupación</p>
                    <select name="ocupacion" id="ocupacion-select" style="width: 100%;" required>

                    </select>
                </div>
                <div class="input-docente">
                    <p>Especialidad/es</p>
                    <select name="especialidades[]" id="especialidades-select" style="width: 100%;" multiple required>

                    </select>
                </div>
                <div class="input-docente">
                    <button class="botonguardar">Guardar</button>
                </div>
                <?php
                    if($docenteingresado === TRUE) {
                    $id = $_GET['id'];
                    echo "<div class='success'>Docente ingresado correctamente.</div>";
                    echo "<div class='input-docente'>";
                    echo "<a class='botonguardar nuevo' href='detalle_docente.php?id=$id'>Ver último docente ingresado</a>";
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