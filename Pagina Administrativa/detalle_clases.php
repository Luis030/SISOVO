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
?>
<script>
    window.idClase = <?php echo $idclase ?>
</script>
<link rel="stylesheet" href="css/datatables.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<link rel="stylesheet" href="css/estiloclases.css">
<script src="js/funcionestablas.js"></script>
<script src="js/editarclases.js"></script>
<script src="js/cargarselect.js"></script>
<div class="contenedor-detalle-clases">
    <div class="volverclases">
        <img src="img/atras.png" alt="Volver" class="volver" id="volver" onclick="volverAtras()">
        <h1>Información de la clase</h1>
    </div>
    <div class="detalle-clases">
        <div class="detalle">
            <p><strong>Nombre: </strong><span id="nombreC"></span></p>
        </div>
        <div class="detalle">
            <p><strong>Docente: </strong><span id="docenteC"></span></p>
        </div>
        <div class="detalle">
            <p><strong>Día: </strong><span id="diaC"></span></p>
        </div>
        <div class="detalle">
            <p><strong>Cantidad de alumnos: </strong><span id="cantC"></span></p>
        </div>
        <div class="detalle">
            <a class="boton-editar-clase" href="editarclases.php?id=<?php echo $idclase ?>">Editar datos</a>
        </div>
    </div>
    <div class="contenedor-tabla-alumnos">
        <h1>Alumnos de la clase</h1>
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
<script src="js/datostablas.js"></script>
<script>
    window.idclase = <?php echo json_encode($idclase) ?>;
</script>
<?php
require_once("php/footer.php");
?>