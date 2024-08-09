<?php
    session_start();
?>
<div id="header">
    <?php
        if(!isset($_SESSION['usuario'])){
            echo "<a href='../Login/index.php' id='goLogin'>Ingresar</a>";
        }
    ?>
    <a href="" id="headInfo">Servicios</a>
    <a href="" id="headInfo">Colecciones</a>
    <a href="index.php" id="titleCER">
        <h1>CER</h1>
    </a>
    <a href="" id="headInfo">Quienes somos?</a>
    <a href="contacto.php" id="headInfo">Contacto</a>
    <?php
        if (isset($_SESSION["verificacion"])) {
            echo "<div id='infoUser'>";
            echo "Bienvenido, ".$_SESSION['usuario'].".";
            if(isset($_SESSION['Privilegio'])){
                if($_SESSION['Privilegio'] == "Admin"){
                    echo "</br>";
                    echo "<a href='../../Pagina Administrativa/index.php'>Ir a administracion</a>";
                }
            }
            echo "</br>";
            echo "<a href='cerrarsesion.php'>Cerrar Sesión</a>";
            echo "</div>";
        }
    ?>
</div>

