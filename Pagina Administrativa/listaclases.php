<?php
require_once("php/header_sidebar.php");
include("../BD/conexionbd.php");
if(isset($_GET['fecha'])){
    $fechalista = $_GET['fecha'];
    if($fechalista !== "Hoy"){
        list($anio, $mes, $dia) = explode("-", $fechalista);
        $fechaTransformada = $dia . '/' . $mes . '/' . $anio;
        $fechalista = $fechaTransformada;
    }
    $fechanormal = $_GET['fecha'];
}
$cedulaDoc = $_SESSION['cedula'];
$idclase = $_GET['idclase'];
$sql = "SELECT C.ID_Clase, C.Nombre from clase C JOIN docentes D on C.ID_Docente=D.ID_Docente WHERE D.Cedula=$cedulaDoc AND C.ID_Clase=$idclase;";
$resultado = mysqli_query($conexion, $sql);
if(mysqli_num_rows($resultado) > 0){
    while($fila = mysqli_fetch_assoc($resultado)){
        $nombreclase = $fila['Nombre'];
    }
} else {
    echo "<script>";
    echo "window.location.href = 'error.php'";
    echo "</script>";
}
?>
<script>
    window.idclaselista = <?php echo json_encode($_GET['idclase']) ?>
</script>
<link rel="stylesheet" href="css/estiloselect2.css">
<link rel="stylesheet" href="css/estiloclases.css">
<link rel="stylesheet" href="css/estilolista.css">
<script src="js/scriptlista.js"></script>
<script src="js/cargarselect.js"></script>
<div class="contenedor-lista-clase">
    <?php 
    if(!isset($_GET['success'])){
    ?>
    <h1>Paso de Lista - Clase <?php echo $nombreclase ?></h1>
    <form id="asistencia-form" action="php/enviarasistencia.php?idclase=<?php echo $_GET['idclase']; ?>" method="post">
        <label for="fecha">Seleccione una fecha:</label>
        <select id="fecha" name="fecha" style="width: 100%;">
            <option value="Hoy">Hoy</option>
        </select>
        <input type="hidden" id="ID_Clase" name="ID_Clase" value="">
        <table>
            <thead>
                <tr>
                    <th>Nombre del Alumno</th>
                    <th>Falta</th>
                </tr>
            </thead>
            <tbody id="lista-alumnos">
            </tbody>
        </table>

        <button type="submit" id="boton-guardar-lista">Guardar</button>
    </form>
    <?php
    } else {
    ?>
    <div class="lista-ingresada">
        <h1>Lista ingresada correctamente</h1>
        <h2>Se ha ingresado correctamente la lista</h2>
        <h2>Clase: <span class="azul"><?php echo $nombreclase?></span></h2>
        <h2>Fecha: <span class="azul"><?php echo $fechalista?></span></h2>
        <div class="tabla-muestra">
            <table>
                <thead>
                    <tr>
                        <th>Nombre del alumno</th>
                        <th>Falta</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if($fechanormal == "Hoy"){
                        $query = "SELECT a.ID_Alumno, CONCAT(a.Nombre, ' ', a.Apellido) AS Nombre, ac.Asistio FROM alumnos_clase ac
                    JOIN alumnos a ON ac.ID_Alumno = a.ID_Alumno
                    WHERE ac.ID_Clase = '$idclase' AND ac.Fecha = curdate() AND ac.Asistio IS NOT NULL"; 
                    } else {
                        $query = "SELECT a.ID_Alumno, CONCAT(a.Nombre, ' ', a.Apellido) AS Nombre, ac.Asistio FROM alumnos_clase ac
                    JOIN alumnos a ON ac.ID_Alumno = a.ID_Alumno
                    WHERE ac.ID_Clase = '$idclase' AND ac.Fecha = '$fechanormal' AND ac.Asistio IS NOT NULL"; 
                    }
                    
                    $resultado = mysqli_query($conexion, $query);
            
                    if ($resultado) {
                        while ($row = mysqli_fetch_assoc($resultado)) {
                            // Si el alumno faltó (Asistio = 0), el checkbox estará marcado
                            $asistio = $row['Asistio'] == 0 ? 'checked' : ''; 
                            if($asistio == "checked"){
                                echo "<tr>
                                    <td class='falto'>{$row['Nombre']}</td>
                                    <td class='falto'>
                                        <input type='checkbox' name='asistencia[{$row['ID_Alumno']}]' value='0' {$asistio} disabled>
                                    </td>
                                </tr>";
                            } else {
                                echo "<tr>
                                    <td class='vino'>{$row['Nombre']}</td>
                                    <td class='vino'>
                                        <input type='checkbox' name='asistencia[{$row['ID_Alumno']}]' value='0' {$asistio} disabled>
                                    </td>
                                </tr>";
                            }
                            
                        }
                    } else {
                        echo "Error en la consulta";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="botones-lista-ingresada">
            <a href="clasesdocente.php" class="botonlista botoninicio">Inicio Clases</a>
            <a href="detalle_clases_docente.php?idclase=<?php echo $idclase ?>" class="botonlista botondetalle">Detalle Clase</a>
        </div>
    </div>
    <?php
    }
    ?>
</div>
<?php
require_once("php/footer.php");
?>