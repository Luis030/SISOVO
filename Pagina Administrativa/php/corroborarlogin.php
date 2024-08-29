<?php
    session_start();

    if(!isset($_SESSION["usuario"])) {
        header("Location: ../Nueva pagina/Main");
    }
?>