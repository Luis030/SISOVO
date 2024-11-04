<?php
    require_once("php/header_sidebar.php");
    require_once("../BD/conexionbd.php");
    include("php/seguridadadmin.php");

    $idClase = $_GET['id'];; 
    
    $sql = "SELECT C.Nombre AS NombreClase, Horario, D.Nombre AS NombreDocente, Apellido
    FROM clase C, docentes D
    WHERE C.ID_Docente = D.ID_Docente AND ID_Clase = $idClase";
    $resultado = mysqli_query($conexion, $sql);
    if(mysqli_num_rows($resultado) > 0) {
        while($columna = mysqli_fetch_assoc($resultado)) {
            $nombreClase = $columna['NombreClase'];
            $diaClase = $columna['Horario'];
            $nombreDocente = $columna['NombreDocente'] ." ". $columna['Apellido'];
        }
    }
?>
<script>
    window.horario = "<?php echo $diaClase; ?>"
</script>
<link rel="stylesheet" href="css/styleeditarclases.css">
<link rel="stylesheet" href="css/estiloselect2.css">
<script src="js/editarclases.js"></script>
<script src="js/cargarselect.js"></script>
<div class="editarClase">
    <div class="mainEditar">
        <div class="editarTop">
            <img src="img/atras.png" alt="Volver" class="volver" id="volver" onclick="volverAtras()">
            <h1>Información de la clase</h1>
        </div>
        <div class="editarBottom">
            <div class="editarElemento">
                <p>Nombre: <span id="spanNombre"><?php echo $nombreClase ?></span><img src="img/editar.png" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre()"></p>
                <div id="editandoNombre" class="fadeNombre">
                    <input type="text" id="ingresarNombre" placeholder="Ingrese un nombre" name="nombreNuevo" required>
                    <button id="guardarInput" onclick="guardarNombre(<?php echo $idClase?>)">Guardar</button>
                </div>
            </div>
            <div class="editarElemento horario">
                <p>Horario(s): <span id="spanHorario"><?php echo $diaClase ?></span><img src="img/editar.png" alt="Editar" id="editarNombre" onclick="mostrarEditarHorario()"></p>
                <div id="editandoHorario" class="fadeHorario">
                    <input type="text" id="ingresarHorario" placeholder="Ingrese un nombre" name="horarioNuevo" required>
                    <button id="guardarInput" onclick="guardarHorario(<?php echo $idClase?>)">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Docente: <span id="spanDocente"><?php echo $nombreDocente ?></span><img src="img/editar.png" alt="Editar" id="editarDocente" onclick="mostrarEditarDocente()"></p>
                <div id="editandoDocente" class="fadeDocente">
                    <select id="ingresarDocente" name="docenteNuevo" required style="width: 100%"></select>
                    <button id="guardarInput" onclick="guardarDocente(<?php echo $idClase?>)">Guardar</button>
                </div>
            </div>
        </div>
    </div>  
</div>
<?php
    require_once("php/footer.php");
?>
