<?php
require_once("php/header_sidebar.php");
?>
<script>
    window.idclaselista = <?php echo json_encode($_GET['idclase']) ?>
</script>
<script src="js/scriptlista.js"></script>
<script src="js/cargarselect.js"></script>
<div class="contenedor-lista-clase">
<h1>Paso de Lista - Clase X</h1>
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

        <button type="submit">Enviar Lista</button>
    </form>
</div>
<?php
require_once("php/footer.php");
?>