<?php
// Usamos PHPMailer para enviar el mensaje desde el formulario de contacto
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
function enviar_mail($email,$asunto,$msg){
include("conexion.php");
require("PHPMailer/PHPMailer.php");
require("PHPMailer/SMTP.php");
require("PHPMailer/Exception.php");
//Create a new PHPMailer instance

$mail = new PHPMailer(true);
try{
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
$mail->IsSMTP();
//$mailÂ­ -> CharSet = "UTFÂ­8";
//$mailÂ­ -> Encoding = "quotedÂ­printable";
$mail->SMTPDebug=0;

//Configuracion servidor mail
$mail->setFrom = "acentodesarrollo@gmail.com"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username = 'acentodesarrollo@gmail.com'; //nombre usuario
$mail->Password = 'A2008cento'; //contraseña
//Agregar destinatario
$mail->addAddress("acentodesarrollo@gmail.com");
$mail->addReplyTo($email);
$mail->Subject = $asunto;
$mail->Body = $msg;

$mail->send();
return true;
// echo '<script type="text/javascript">
//            alert("Enviado Correctamente");
//         </script>';
}
catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
}
}
?>
