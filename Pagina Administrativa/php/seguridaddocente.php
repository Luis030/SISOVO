<?php
    if ($_SESSION['Privilegio'] != "docente") {
        echo "<script>window.location.href = '../index';</script>";
    }
?>