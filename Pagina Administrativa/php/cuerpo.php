<?php
        include("corroborarlogin.php");
?>
<link rel="stylesheet" href="css/estilo.css?Aaaaaaaaaa">
<script src="js/aboutus.js?d"></script>
<div class="header">
        <div class="horaactual">

        </div>
        <div class="usuario">
                <?php
                        echo $_SESSION['usuario'];
                ?>
                <a href="#">⚙️</a>
        </div>         
</div>
<div class="sidebar">
        <h2>Menú</h2>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="clases.php">Clases</a></li>
            <li><a href="añadiralumno.php">Añadir alumno</a></li>
            <li><a href="añadirdocente.php">Añadir docente</a></li>
            <li><a href="informes.php">Buscar Informes</a></li>
            <li><a href="crearinforme.php">Realizar Informe</a></li>
        </ul>
        <a href="#" class="aboutus" id="aboutus">About Us</a>
</div>
<div id="overlay" class="overlay">
  <div class="contenido-overlay">
    <button id="cerrarabout">Cerrar</button>
    <div class="contenido-imagenes">
        <div class="div-imagen">
                <img src="https://img.freepik.com/vector-premium/icono-perfil-avatar-predeterminado-imagen-usuario-redes-sociales-icono-avatar-gris-silueta-perfil-blanco-ilustracion-vectorial_561158-3383.jpg" alt="Luis Sosa" id="img1">
                <h1>Luis Sosa</h1>
        </div>
        <div class="div-imagen">
                <img src="https://img.freepik.com/vector-premium/icono-perfil-avatar-predeterminado-imagen-usuario-redes-sociales-icono-avatar-gris-silueta-perfil-blanco-ilustracion-vectorial_561158-3383.jpg" alt="Luis Sosa" id="img2">
                <h1>Federico Simonelli</h1>
        </div>
        <div class="div-imagen">
                <img src="https://img.freepik.com/vector-premium/icono-perfil-avatar-predeterminado-imagen-usuario-redes-sociales-icono-avatar-gris-silueta-perfil-blanco-ilustracion-vectorial_561158-3383.jpg" alt="Luis Sosa" id="img3">
                <h1>Ian Volpi</h1>
        </div>
    </div>
    <p id="parrafo-aboutus">Somos estudiante de informatica de tercer año de UTU, y esta aplicación fue desarrollada por motivo de nuestro proyecto de fin de año</p>
    <div class="idiomas">
        <input type="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Uruguay.svg/1200px-Flag_of_Uruguay.svg.png" id="logo-español">
        <input type="image" src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a4/Flag_of_the_United_States.svg/640px-Flag_of_the_United_States.svg.png" id="logo-ingles">
    </div>
    
  </div>
</div>
