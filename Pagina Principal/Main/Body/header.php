<div id="header">
    <a href="../../Login/Español/index.php" id="goLogin">Ingresar</a>
    <a href="" id="headInfo">Servicios</a>
    <a href="" id="headInfo">Colecciones</a>
    <a href="index.php" id="titleCER">
        <h1>CER</h1>
    </a>
    <a href="" id="headInfo">Quienes somos?</a>
    <a href="contacto.php" id="headInfo">Contacto</a>
    <?php
        session_start();

        if (isset($_SESSION["verificacion"])) {
            echo $_SESSION['usuario'];
            echo "<a href='Backend/cerrarsesion.php'>Cerrar Sesión</a>";
        }
    ?>
</div>

