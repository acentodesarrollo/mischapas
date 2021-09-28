<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
include("conexion.php");
require("PHPMailer/PHPMailerAutoload.php");
require("PHPMailer/PHPMailer.php");
require("PHPMailer/SMTP.php");
require("PHPMailer/Exception.php");
//Create a new PHPMailer instance
echo ("Iniciando Mailer");
$mail = new PHPMailer;
$mail->IsSMTP();
$mail­ -> CharSet = "UTF­8";
$mail­ -> Encoding = "quoted­printable";

//Configuracion servidor mail
$mail->From = "acentodesarrollo@gmail.com"; //remitente
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls'; //seguridad
$mail->Host = "smtp.gmail.com"; // servidor smtp
$mail->Port = 587; //puerto
$mail->Username = 'acentodesarrollo@gmail.com'; //nombre usuario
$mail->Password = 'A2008cento'; //contraseña
//Agregar destinatario
$mail->addAddress($_POST['email']);
$mail->Subject = $_POST['asunto'];
$mail->Body = $_POST['msg'];
var_dump ($mail);

//Avisar si fue enviado o no y dirigir al index
if ($mail->send()) {
    echo'<script type="text/javascript">
           alert("Enviado Correctamente");
        </script>';
} else {
    echo '<script type="text/javascript">
           alert("NO ENVIADO, intentar de nuevo");
        </script>';
}
?>