<?php
include("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/estiloañadiralumno.css">
<div class="contenedor-anadir-alumno">
    <div class="titulo-alumno">
        <h1>Añadir alumno</h1>
    </div>
    <div class="contenedor-form-añadir-alumno">
        <form action="" method="post">
            <div class="formulario-alumno">
                <div class="input-alumno">
                    <p>Nombres</p>
                    <input type="text" name="nombre" placeholder="Nombres">
                </div>
                <div class="input-alumno">
                    <p>Apellidos</p>
                    <input type="text" name="apellido" placeholder="Apellidos">
                </div>
                <div class="input-alumno">
                    <p>Cedula</p>
                    <input type="text" name="cedula" placeholder="Sin guiónes: 12345678">
                </div>
                <div class="input-alumno">
                    <p>Celular</p>
                    <input type="text" name="celular" placeholder="090000000">
                </div>
                <div class="input-alumno">
                    <p>Nacimiento</p>
                    <input type="date" name="nacimiento">
                </div>
                <div class="input-alumno">
                    <p>Correo</p>
                    <input type="text" name="correo" placeholder="Opcional">
                </div>
                <div class="input-alumno">
                    <p>Clase/s</p>
                    <select name="clases[]" multiple>
                        <option value="clase1">Clase 1</option>
                        <option value="clase2">Clase 2</option>
                        <option value="clase3">Clase 3</option>
                    </select>
                </div>
                <div class="input-alumno">
                    <p>Patologia/s</p>
                    <select name="patologias[]" multiple>
                        <option value="pat1">Patologia 1</option>
                        <option value="pat2">Patologia 2</option>
                        <option value="pat3">Patologia 3</option>
                    </select>
                </div>
                <div class="input-alumno">
                    <button>Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php
include("php/footer.php");
?>