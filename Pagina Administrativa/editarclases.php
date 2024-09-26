<?php
    require_once("php/header_sidebar.php");
?>
<link rel="stylesheet" href="css/estiloselect2.css">
<link rel="stylesheet" href="css/styleeditarclases.css">
<script src="js/cargarselect.js"></script>
<script src="js/editarclases.js"></script>
<div class="editarClase">
    <div class="mainEditar">
        <div class="editarTop">
            <img src="https://www.svgrepo.com/show/416120/arrow-back-basic.svg" alt="Volver" class="volver">
            <h1>Editar clase</h1>
        </div>
        <div class="editarBottom">
            <div class="editarElemento">
                <p>Nombre: <span id="nombreClase"> </span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarNombre" onclick="mostrarEditarNombre()">
                <div id="editandoNombre" style="display: none">
                    <input type="text" id="ingresarNombre">
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Día: <span id="diaClase"> </span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarDia" onclick="mostrarEditarDia()">
                <div id="editandoDia" style="display: none">
                    <select name="" id="ingresarDia">
                        <option selected disabled></option>
                        <option value="1">Lunes</option>
                        <option value="2">Martes</option>
                        <option value="3">Miércoles</option>
                        <option value="4">Jueves</option>
                        <option value="5">Viernes</option>
                    </select>
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Hora de inicio: <span id="inicioClase"></span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarInicio" onclick="mostrarEditarInicio()">
                <div id="editandoInicio" style="display: none">
                    <input type="time" id="hora" name="hora" min="08:00" max="18:00">
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Hora final: <span id="finalClase"> </span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarFinal" onclick="mostrarEditarFinal()">
                <div id="editandoFinal" style="display: none">
                    <input type="time" id="hora" name="hora" min="08:00" max="18:00">   
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <div class="editarElemento">
                <p>Docente: <span id="docenteClase"> </span></p>
                <img src="https://www.svgrepo.com/show/535562/pencil-square.svg" alt="Editar" id="editarDocente" onclick="mostrarEditarDocente()">
                <div id="editandoDocente" style="display: none">
                    <select name="" id="ingresarDocente"></select>
                    <button id="guardarInput">Guardar</button>
                </div>
            </div>
            <p id="errorMsg" style="color:red; display:none;">Solo puedes seleccionar entre 8:00-12:00 o 14:00-18:00</p>  
        </div>
    </div>
</div>
<?php
    require_once("php/footer.php");
?>
