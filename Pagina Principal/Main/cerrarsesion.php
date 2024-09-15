<?php
    session_start();
    session_destroy();
    $_SESSION["verificacion"] = false;
    header("Location: index");
?>