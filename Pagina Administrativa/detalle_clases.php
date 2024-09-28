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
$sql = "SELECT C.ID_Docente, D.Nombre as docente, C.Nombre, C.Dia, DATE_FORMAT(C.Inicio, '%H:%i') AS hora_inicio, DATE_FORMAT(C.Final, '%H:%i') AS hora_final, COUNT(AC.ID_Alumno) as cantidad
        FROM Clase C
        JOIN Docentes D ON C.ID_Docente = D.ID_Docente
        LEFT JOIN alumnos_clase AC ON C.ID_Clase = AC.ID_Clase WHERE C.ID_Clase=$idclase
        GROUP BY C.ID_Clase;";
$resultado = mysqli_query($conexion, $sql);

$datosClase = [];
$cantidadAlumnos = 0;


if (mysqli_num_rows($resultado) > 0) {
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $datosClase['ID_Docente'] = $fila['ID_Docente'];
        $datosClase['docente'] = $fila['docente'];
        $datosClase['Nombre'] = $fila['Nombre'];
        $datosClase['Dia'] = $fila['Dia'];
        $datosClase['Inicio'] = $fila['hora_inicio'];
        $datosClase['Final'] = $fila['hora_final'];
        $cantidadAlumnos = $fila['cantidad'];
    }
}

?>
<link rel="stylesheet" href="css/estiloselect2.css">
<link rel="stylesheet" href="css/estiloclases.css">
<script src="js/cargarselect.js"></script>
<div class="contenedor-detalle-clases">
    <div class="detalle-clases" style="display: flex;">
        <?php
        echo "<div>";
        echo "<p style='font-size:30px'>";
        echo "<strong>Nombre: </strong>" .$datosClase['Nombre'] ."   <strong>Docente: </strong>" .$datosClase['docente']. "  <strong>Dia: </strong>" .$datosClase['Dia'];
        echo "</p>";
        echo "<p style='font-size:30px'>";
        echo "<strong>Inicio: </strong>" .$datosClase['Inicio'] ."   <strong>Final: </strong>" .$datosClase['Final']. "  <strong>Cantidad de alumnos: </strong>" .$cantidadAlumnos;
        echo "</p>";
        echo "</div>";
        ?>
        <a class="boton-editar-clase" href="editarclases.php?id=<?php echo $idclase ?>">Editar datos</a>
    </div>
    <div class="buscadores-select">
        <select class="buscador-select" id="buscador-select">
            <option value="Nombre">Nombre</option>
            <option value="Apellido">Apellido</option>
            <option value="Cedula">Cédula</option>
            <option value="Fecha_nac">Nacimiento</option>
            <option value="Mail_Padres">Correo</option>
            <option value="Celular_Padres">Celular</option>
        </select>
        <input type="text" class="buscador" data-table="alumnos" placeholder="Buscar...">
    </div>
    <div class="tabla-alumnos" id="tabla-alumnos" style="border: 1px solid black;"></div>
    <div class="select-alumnos-container">
        <form action="php/agregaralumnoclase.php?id=<?php echo $idclase ?>" method="post">
            <select name="alumnos[]" id="select-alumnos" style="width: 100%;" multiple required>
            </select>
            <div class="boton-mensaje" style="display: flex; align-items:center;">
                <button class="agregar-boton-alumno">Agregar</button>
                <?php
                if($agregado === true){
                    echo "<p style='font-size:40px; color:white; margin-left:15%;'>Alumno/s ingresados correctamente</p>";
                }
                if($error === true){
                    echo "<p style='font-size:40px; color:white; margin-left:15%;'>Algunos alumnos ya estan ingresados.</p>";
                }
                ?>
            </div>
        </form>
    </div>
</div>
<script src="js/tabla.js"></script>
<script>
    const config = {
        tipo: 'alumnos',  //tipo de la  tabla en data-table
        url: 'php/alumnosclase.php?id=<?php echo $idclase; ?>', 
        headers: ['Nombre', 'Apellido', 'Cedula', 'Fecha de nacimiento', 'Correo', 'Celular'],  // Encabezados de la tabla
        keys: ['Nombre', 'Apellido', 'Cedula', 'Fecha_nac', 'Mail_Padres', 'Celular_Padres', ],  // Claves de los datos
        enlace: 'ID_Alumno',  
        detalleUrl: 'carlos.php',  // Página de detalle
        selector: '#tabla-alumnos'  // Selector donde se renderiza la tabla
    };
    // Llamar a la función para inicializar la tabla
    inicializarTabla(config);
</script>
<?php
require_once("php/footer.php");
?>