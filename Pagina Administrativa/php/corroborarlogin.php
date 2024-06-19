<?php
    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../Pagina Principal/Main");
    }
?>