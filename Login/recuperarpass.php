<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
function enviarCodigoRecuperacion($destinatario) {
    $codigo_recuperacion = rand(100000, 999999);
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'LManuelSosa@gmail.com';
        $mail->Password = 'uygw hrgl kqam dwho';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del remitente y destinatario
        $mail->setFrom('LManuelSosa@gmail.com', 'Centro CER');
        $mail->addAddress($destinatario);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'Código de Recuperación de Contraseña';
        $mail->Body = "Tu código de recuperación es: <strong>$codigo_recuperacion</strong>";
        $mail->AltBody = "Tu código de recuperación es: $codigo_recuperacion"; // Texto alternativo en caso de que el correo no soporte HTML

        // Enviar el correo
        $mail->send();

        // Devuelve el código generado para usarlo en la verificación
        return $codigo_recuperacion;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
        return null;
    }
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    include("../BD/conexionbd.php");
    $cedula = mysqli_real_escape_string($conexion, $_POST['cedula']);
    $preparado = mysqli_prepare($conexion, "SELECT * FROM usuarios WHERE Cedula = ? AND Estado=1");
    mysqli_stmt_bind_param($preparado, "s", $cedula);
    mysqli_stmt_execute($preparado);
    $resultado = mysqli_stmt_get_result($preparado);
    if(mysqli_num_rows($resultado) > 0){
        $filas = mysqli_fetch_assoc($resultado);
        $tipo = $filas['Tipo'];
        switch($tipo){
            case 'alumno':
                $sql = "SELECT Mail_Padres FROM alumnos WHERE Cedula=$cedula AND Estado=1";
                $resultado = mysqli_query($conexion, $sql);
                $filas = mysqli_fetch_assoc($resultado);
                if(!empty($filas['Mail_Padres'])){
                    $correo = $filas['Mail_Padres'];
                } else {
                    header("Location:recuperar.php?errorid=1");
                    exit;
                }
                if(!empty($correo)){
                    $codigo = enviarCodigoRecuperacion($correo);
                    if($codigo){
                        $_SESSION['codigocorreo'] = $codigo;
                        header("Location: verificarcodigo.php");
                        break;
                    } else {
                        header("Location: recuperar.php?errorid=3");
                        exit;
                    }
                    break;
                } else {
                    header("Location:recuperar.php?errorid=1");
                }
                break;
        }
    } else {
        header("Location: recuperar.php?errorid=2");
        exit;
    }
} else {
    header("Location: index.php");
}
?>
