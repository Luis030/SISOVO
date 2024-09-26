<?php
require_once("../BD/conexionbd.php");
require_once("php/header_sidebar.php");
$idclase = $_GET['id'];
$sql = "SELECT C.ID_Docente, D.Nombre as docente, C.Nombre, C.Dia, C.Inicio, C.Final, COUNT(AC.ID_Alumno) as cantidad
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
        $datosClase['Inicio'] = $fila['Inicio'];
        $datosClase['Final'] = $fila['Final'];
        $cantidadAlumnos = $fila['cantidad'];
    }
}

?>
<link rel="stylesheet" href="css/estiloclases.css">
<script src="js/cargarselect.js"></script>
<div class="contenedor-detalle-clases">
    <div class="detalle-clases">
        <?php
        echo "<p style='font-size:30px'>";
        echo "<strong>Nombre: </strong>" .$datosClase['Nombre'] ."   <strong>Docente: </strong>" .$datosClase['docente']. "  <strong>Dia: </strong>" .$datosClase['Dia'];
        echo "</p>";
        echo "<p style='font-size:30px'>";
        echo "<strong>Inicio: </strong>" .$datosClase['Inicio'] ."   <strong>Final: </strong>" .$datosClase['Final']. "  <strong>Cantidad de alumnos: </strong>" .$cantidadAlumnos;
        echo "</p>";
        ?>
    </div>
    <select class="buscador-select" id="buscador-select">
        <option value="Nombre">Nombre</option>
        <option value="Apellido">Apellido</option>
        <option value="Cedula">Cédula</option>
        <option value="Fecha_nac">Nacimiento</option>
        <option value="Mail_Padres">Correo</option>
        <option value="Celular_Padres">Celular</option>
    </select>
    <input type="text" class="buscador" data-table="alumnos" placeholder="Buscar...">
    <div class="tabla-alumnos" id="tabla-alumnos"></div>
    <div class="select-alumnos-container">
        <form action="" method="post">
            <select name="alumnos" id="select-alumnos" style="width: 100%;" multiple>
                <option value="yhtrhr">fdsfdsfs</option>
                <option value="fhg">gsdfgsdf</option>
                <option value="hgf">gfdgdsg</option>
            </select>
            <button>Agregar</button>
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
        detalleUrl: 'pagina_detalle_clase.php',  // Página de detalle
        selector: '#tabla-alumnos'  // Selector donde se renderiza la tabla
    };
    // Llamar a la función para inicializar la tabla
    inicializarTabla(config);
</script>
<?php
require_once("php/footer.php");
?>