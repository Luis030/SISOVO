<?php
    session_start();
?>
<div id="header">
    <?php
        if(!isset($_SESSION['usuario'])){
            echo "<a href='../Login/index.php' id='goLogin'>Ingresar</a>";
        }
    ?>
    <a href="servicios.php" id="headInfo">Servicios</a>
    <a href="" id="headInfo">Colecciones</a>
    <a href="index.php" id="titleCER">
        <h1>CER</h1>
    </a>
    <a href="" id="headInfo">¿Quienes somos?</a>
    <a href="contacto.php" id="headInfo">Contacto</a>
    <?php
        if (isset($_SESSION["verificacion"])) {
            echo "<div id='infoUser'>";
            echo "<button id='botonUser' onclick='toggleMenu()'>".$_SESSION['usuario']."</button>";
            echo "<ul class='menuUser'>";
            if(isset($_SESSION['Privilegio'])){
                if($_SESSION['Privilegio'] == "admin"){
                    echo "<li><a href='../../Pagina Administrativa/index.php'>Administrador</a></li>";
                }
                if($_SESSION['Privilegio'] == "alumno"){
                    echo "<li><a href='#'>Panel de alumno</a></li>";
                }
                echo "<li><a href='#'>Ajustes</a></li>";
                echo "<li><a href='cerrarsesion.php'>Cerrar Sesión</a></li>";
            }
            echo "</ul>";
            echo "</div>";
        }
    ?>
</div>
<script src="JS/infousuario.js?h"></script>


