<?php
require_once("../BD/conexionbd.php");
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
function enviarCodigo($destinatario) {
    $codigo_recuperacion = rand(100000, 999999);
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'reeducacionsalto@gmail.com';
        $mail->Password = 'ukns ecxj cjhh akvv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

            // Configuración del remitente y destinatario
        $mail->setFrom('reeducacionsalto@gmail.com', 'Centro CER');
        $mail->addAddress($destinatario);

            // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = mb_encode_mimeheader('Verificacion de correo electronico', 'UTF-8');
            
        $mail->Body = "
        <html>
        <body>
            <h1 style='color: #2E86C1;'>Centro CER - Verificacion de correo</h1>
            <p>Hola,</p>
            <p>Tu código de recuperación es: <strong>$codigo_recuperacion</strong></p>
            <p>Si no solicitaste este código, ignora este correo.</p>
            <p>Saludos,<br>Centro CER</p>
        </body>
        </html>";

        $mail->AltBody = "Hola,\n\nTu código de recuperación es: $codigo_recuperacion\n\nPor favor, utiliza este código para verificar tu cuenta.\nSi no solicitaste este código, ignora este correo.\n\nSaludos,\nCentro CER";

            // Enviar el correo
        $mail->send();

        // Devuelve el código generado para usarlo en la verificación
        return $codigo_recuperacion;
    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
        return null;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cedula = $_SESSION['cedula'];
    $correonuevo = $_POST['nuevomail'];
    $correonuevoconfirm = $_POST['nuevomailconfirm'];

    if ($correonuevo !== $correonuevoconfirm) {
        header("Location:../ajustes?errorid=6"); 
        exit;
    }
    $codigo = enviarCodigo($correonuevo);
    if($codigo){
        $_SESSION['codigocorreo'] = $codigo;
        $_SESSION['correoverif'] = $correonuevo;
        $_SESSION['cambiarcorreo'] = true;
        header("Location: ../Login/verificarcodigo.php");
    }
}