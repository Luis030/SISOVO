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
<script src="js/editarclases.js"></script>
<script src="js/cargarselect.js"></script>
<div class="contenedor-detalle-clases">
    <img src="img/atras.png" alt="Volver" class="volver" id="volver" onclick="volverAtras()">
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
        <form action="php/agregaralumnoclase.php?id=<?php echo $idclase ?>" method="post">
            <select name="alumnos[]" id="select-alumnos" style="width: 100%;" multiple required>
            </select>
            <div class="boton-mensaje" style="display: flex; align-items:center;">
                <button class="agregar-boton-alumno">Agregar</button>
                <?php
                if($agregado === true){
                    echo "<p style='font-size:40px; color:white; margin-left:15%;'>Alumno/s ingresados correctamente</p>";
                }
                ?>
            </div>
        </form>
    </div>
</div>
<script src="js/datostablas.js"></script>
<script src="js/tabla.js"></script>
<script>
    $(document).ready(function (){
        iniciarTabla('tabla-alumnos', 'php/alumnosclase.php?id=<?php echo $idclase; ?>', [
        {   "data": "Nombre",
            "render": function(data, type, row) {
            return `<a href="detalle_alumnos.php?id=${row.ID_Alumno}">${data}</a>`;
            }
        },
        { "data": "Apellido" },
        { "data": "Cedula" },
        { "data": "Fecha_nac" },
        { "data": "Mail_Padres" },
        { "data": "Celular_Padres" },
        {
            "data": null,
            "render": function(data, type, row) {
                // Almacenar el ID del alumno en el atributo data-id
                return `
                    <button class='boton-editar'>Editar</button>
                    <button class='boton-borrar'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ], "30vh");

    $('#select-alumnos').select2({
        placeholder: "Buscar alumno..",
        minimumInputLength: 0,
        ajax: {
            url: 'php/alumnos.php?idclase=<?php echo $idclase?>',
            dataType: 'json',
            delay: 250,
            data: function (params){
                return {
                    q: params.term || '',
                };
            },
            processResults: function (data) {
                return {
                    results: data.map(function (alumno){
                        return { id: alumno.ID_Alumno, text: alumno.NombreCompleto };
                    })
                };
            },
            cache: true
        }
    })
    })
</script>
<?php
require_once("php/footer.php");
?>