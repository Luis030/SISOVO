<?php
    require_once("../BD/conexionbd.php");
    require_once("php/header_sidebar.php");
?>
<script src="js/datostablas.js"></script>
<link rel="stylesheet" href="css/estiloclases.css">
<link rel="stylesheet" href="css/datatables.css">
<div class="contenedor-clases">
    <div class="tabla-clases">
        <table id="tabla-clases">
            <thead>
                <tr>
                    <th>Nombre de clase</th>
                    <th>Docente</th>
                    <th>Horarios</th>
                    <th>Alumnos</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</div>
<div id="overlayFondo">
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
        { "data": "Docente" },           
        { "data": "Horarios" },    
        { "data": "Cantidad_Alumnos" },     
        {
            "data": null,
            "render": function(data, type, row) {
                return `
                    <button class='boton-editar' onclick='editar(${row.ID_Clase})'>Editar</button>
                    <button class='boton-borrar' onclick='eliminar(${row.ID_Clase},  \`${row.Nombre}\`)'>Eliminar</button>
                `;
            },
            "orderable": false
        }
    ], "60vh");
});




    function eliminar(id, nombre) {
        Swal.fire({
            title: "¿Estas seguro?",
            text: "No se podra deshacer",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Si, borrar"
            }).then((result) => {
            if (result.isConfirmed) {
                fetch("php/borrarclase.php?id="+id)
                .then(data => data.json())
                .then(dato => {
                if(dato.Resultado == "exitoso"){
                    cerrarEliminar()
                    tabla.ajax.reload();
                    Swal.fire({
                        title: "Borrado exitosamente.",
                        icon: "success"
                    });
                } else if(dato.Resultado == "error"){
                    alert("error");
                }
            })
                
            }
        });
    }

    function editar(id){
        window.location.href = "editarclases.php?id="+id;
    }
</script>

<?php
    require_once("php/footer.php");
?>
