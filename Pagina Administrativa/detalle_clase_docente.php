<?php
    require_once("../BD/conexionbd.php");
    require_once("php/header_sidebar.php");
    include("php/seguridaddocente.php");

    $idclase = $_GET['id'];

    $sql = "SELECT C.ID_Clase, D.ID_Docente, C.Nombre, CONCAT(D.Nombre, ' ', D.Apellido) AS Docente, C.Horario AS Horarios, COUNT(AC.ID_Alumno) AS Cantidad_Alumnos 
            FROM clase C JOIN docentes D ON C.ID_Docente = D.ID_Docente 
            LEFT JOIN alumnos_clase AC ON C.ID_Clase = AC.ID_Clase AND AC.Estado = 1 AND AC.Asistio IS NULL 
            WHERE C.Estado = 1 AND C.ID_Clase = $idclase GROUP BY C.ID_Clase";
    $resultado = mysqli_query($conexion, $sql);

    $datosClase = [];
    $cantidadAlumnos = 0;

    if (mysqli_num_rows($resultado) > 0) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
            $datosClase['ID_Docente'] = $fila['ID_Docente'];
            $datosClase['Docente'] = $fila['Docente'];
            $datosClase['Nombre'] = $fila['Nombre'];
            $datosClase['Dia'] = $fila['Horarios'];
            $cantidadAlumnos = $fila['Cantidad_Alumnos'];
        }
    }
?>
<script>
    window.idclase = <?php echo $idclase ?>
</script>
<link rel="stylesheet" href="css/datatables.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<link rel="stylesheet" href="css/estiloclases.css">
<script src="js/editarclases.js"></script>
<script src="js/cargarselect.js"></script>
<div class="contenedor-detalle-clases">
    <div class="volverclases">
        <img src="img/atras.png" alt="Volver" class="volver" id="volver" onclick="volverAtras()">
        <h1>Información de la clase</h1>
    </div>
    <div class="detalle-clases">
        <div class="detalle">
            <p><strong>Nombre: </strong><?php echo $datosClase['Nombre'] ?></p>
        </div>
        <div class="detalle">
            <p><strong>Docente: </strong><?php echo $datosClase['Docente'] ?></p>
        </div>
        <div class="detalle">
            <p><strong>Día: </strong><?php echo $datosClase['Dia'] ?></p>
        </div>
        <div class="detalle">
            <p><strong>Cantidad de alumnos: </strong><?php echo $cantidadAlumnos ?></p>
        </div>
    </div>
    <div class="contenedor-tabla-alumnos">
        <h1>Alumnos de la clase</h1>
        <table id="tabla-alumnos-docente">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Cedula</th>
                    <th>Fecha de nacimiento</th>
                    <th>Correo</th>
                    <th>Celular</th>
                    <th>Faltas</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<script src="js/funcionestablas.js"></script>
<script src="js/datostablas.js"></script>
<?php
    include("php/footer.php");
?>