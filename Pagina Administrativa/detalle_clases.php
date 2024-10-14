<?php
    require_once("../BD/conexionbd.php");
    require_once("php/header_sidebar.php");
    $agregado = false;
    $error = false;
    if(isset($_GET['success'])){
        $agregado = true;
    }
    if(isset($_GET['error'])){
        $error = true;
    }
    $idclase = $_GET['id'];
    $sql = "SELECT C.ID_Clase, D.ID_Docente, C.Nombre, CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, C.Horario AS Horarios, COUNT(AC.ID_Alumno) AS Cantidad_Alumnos FROM clase C JOIN docentes D ON C.ID_Docente = D.ID_Docente LEFT JOIN alumnos_clase AC ON C.ID_Clase = AC.ID_Clase AND AC.Estado = 1 AND AC.Asistio IS NULL WHERE C.Estado = 1 AND C.ID_Clase=$idclase GROUP BY C.ID_Clase;
    ";
    $resultado = mysqli_query($conexion, $sql);

    $datosClase = [];
    $cantidadAlumnos = 0;


    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $datosClase['ID_Docente'] = $fila['ID_Docente'];
            $datosClase['docente'] = $fila['Docente'];
            $datosClase['Nombre'] = $fila['Nombre'];
            $datosClase['Dia'] = $fila['Horarios'];
            $cantidadAlumnos = $fila['Cantidad_Alumnos'];
        }
    }
?>
<link rel="stylesheet" href="css/datatables.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<link rel="stylesheet" href="css/estiloclases.css">
<script src="js/editarclases.js"></script>
<script src="js/cargarselect.js"></script>

<div class="contenedor-detalle-clases">
    <img src="img/atras.png" alt="Volver" class="volver" id="volver" onclick="volverAtras()">
    <div class="detalle-clases">
        <?php
        echo "<div>";
        echo "<p>";
        echo "<strong>Nombre: </strong>" .$datosClase['Nombre'] ."   <strong>Docente: </strong>" .$datosClase['docente']. "  <strong>Dia: </strong>" .$datosClase['Dia'];
        echo "</p>";
        echo "<p>";
        echo "<strong>Cantidad de alumnos: </strong>" .$cantidadAlumnos;
        echo "</p>";
        echo "</div>";
        ?>
        <a class="boton-editar-clase" href="editarclases.php?id=<?php echo $idclase ?>">Editar datos</a>
    </div>
    <div class="contenedor-tabla-alumnos">
        <table id="tabla-alumnos">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Fecha de nacimiento</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <div class="select-alumnos-container">
            <select name="alumnos[]" id="select-alumnos" style="width: 100%;" multiple required>
            </select>
            <div class="boton-mensaje">
                <button class="agregar-boton-alumno" onclick="ingresarAlumno(<?php echo $idclase ?>)">Agregar</button>
                <?php
                if($agregado === true){
                    echo "<p>Alumno/s ingresados correctamente</p>";
                }
                ?>
            </div>
    </div>
</div>
<script src="js/funcionestablas.js"></script>
<script src="js/datostablas.js"></script>
<script>
    window.idclase = <?php echo json_encode($idclase) ?>;
</script>
<?php
require_once("php/footer.php");
?>