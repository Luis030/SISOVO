<?php
session_start();
if(!isset($_SESSION['codigocorreo'])){
    header("Location: recuperarpass.php");
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $codigoingresado = $_POST['codigo'];
    $codigofd = $_SESSION['codigocorreo'];
    if($codigoingresado == $_SESSION['codigocorreo']){
        echo "felicidades es ese el codigo";
    } else {
        echo "codigo incorrecto.";
        echo "<br>$codigoingresado";
        echo "<br>$codigofd";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar codigo</title>
</head>
<body>
    <div class="contenedor-verif-codigo">
        <h1>Ingrese el codigo</h1>
        <form action="verificarcodigo.php" method="post">
            <p>código</p>
            <input type="text" name="codigo" required>
            <button>Enviar</button>
        </form>
    </div>
</body>
</html>