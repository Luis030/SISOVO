<?php
    require_once("../BD/conexionbd.php");
    require_once("php/header_sidebar.php");
?>
<script src="js/datostablas.js"></script>
<link rel="stylesheet" href="css/estiloclases.css">
<div class="contenedor-clases">
    <div class="tabla-clases">
        <table id="tabla-clases">
            <thead>
                <tr>
                    <th>Nombre de Clase</th>
                    <th>Docente</th>
                    <th>Día</th>
                    <th>Inicio</th>
                    <th>Final</th>
                    <th>Cantidad de Alumnos</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<div id="overlayFondo" style="display: none">
    <div id="overlayConfirmacion">
        <div class="salir">
            <input type="button" value="✖" id="cerrar" onclick="cerrarEliminar()">
        </div>
        <div class="eliminar">
            <p class="conf">¿Seguro que quiere eliminar la clase <span id="msgCon"></span>?</p>
            <button id="conSi">Sí</button>
            <button id="conNo" onclick="cerrarEliminar()">No</button>
        </div>
    </div>
</div>
<script src="js/tabla.js"></script>
<script>
    let tabla;
    $(document).ready(function (){
        tabla = iniciarTabla('tabla-clases', 'php/obtenertodasclases.php', [
        {   "data": "Nombre",
            "render": function(data, type, row) {
            return `<a href="detalle_clases.php?id=${row.ID_Clase}">${data}</a>`;
            }
        },
        { "data": "docente" },
        { "data": "Dia" },
        { "data": "hora_inicio" },
        { "data": "hora_final" },
        { "data": "cantidad" },
        {
            "data": null,
            "render": function(data, type, row) {
                // Almacenar el ID del alumno en el atributo data-id
                return `
                    <button class='boton-editar' onclick='editar(${row.ID_Clase})'>Editar</button>
                    <button class='boton-borrar' onclick='eliminar(${row.ID_Clase},  \`${row.Nombre}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ], "60vh");
    })

    function eliminar(id, nombre) {
        const overlayCon = document.getElementById('overlayFondo');
        overlayCon.style.display = 'block';
        const msgCon = document.getElementById('msgCon');
        msgCon.textContent = nombre;
        const botonSi = document.getElementById('conSi');
        botonSi.addEventListener('click', function() {
            fetch("php/borrarclase.php?id="+id)
            .then(data => data.json())
            .then(dato => {
                if(dato.Resultado == "exitoso"){
                    cerrarEliminar()
                    tabla.ajax.reload();
                } else if(dato.Resultado == "error"){
                    alert("error");
                }
            })
        })
    }

    function editar(id){
        window.location.href = "editarclases.php?id="+id;
    }
</script>

<?php
    require_once("php/footer.php");
?>
