<?php
    if ($_SESSION['Privilegio'] != "admin") {
        echo "<script>window.location.href = '../index';</script>";
    }
?>