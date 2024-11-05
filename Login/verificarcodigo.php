<?php
session_start();
if(!isset($_SESSION['codigocorreo']) || !isset($_SESSION['correoverif'])){
    header("Location: recuperarpass.php");
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $codigoingresado = $_POST['codigo'];
    $codigofd = $_SESSION['codigocorreo'];
    if($codigoingresado == $_SESSION['codigocorreo']){
        $_SESSION['cambiarpass'] = true;
        header("Location: cambiarpass.php");
    } else {
        header("Location: verificarcodigo.php?error");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar codigo</title>
    <link rel="stylesheet" href="Diseño/recuperarpass.css">
</head>
<body>
    <div class="contenedor-verif-codigo">
        <h1>Ingrese el codigo</h1>
        <div class="contenedor-formulario-verif-codigo">
            <form action="verificarcodigo.php" method="post">
                <div class="div-codigo-correo">
                    <span>Se ha enviado un código de 6 digitos al correo <?php echo $_SESSION['correoverif']; ?></span>
                </div>
                <?php
                if(isset($_GET['error'])){
                    echo "<span id='error-span'>Codigo incorrecto</span>";
                }
                ?>
                <p>Código</p>
                <input type="text" name="codigo" required autocomplete="off">
                <button>Enviar</button>
                <p class="atrasp">
                    <a href="../index" class="atras">Atras</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>