<?php
//Formulario de contacto de la web, envia los mensajes a acentodesarrollo@gmail.com
include("cabecera.php");
include("aux_contacto.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST["email"];
    $msg = $_POST["msg"];
    $asunto = $_POST["asunto"];
    if(enviar_mail($email,$asunto,$msg)){
        echo '<script type="text/javascript">
            alert("Enviado Correctamente");
            </script>';
    };
}
?>
<form method="post">
    <ul>
        <li>
            <label for="name">Nombre: </label>
            <input type="text" id="name" name="name">
        </li>
        <li>
            <label for="email">Correo electrónico: </label>
            <input type="email" id="email" name="email">
        </li>
        <li>
            <label for="asunto">Asunto: </label>
                <input type="text" name="asunto" id="asunto">
        </li>
        <li>
            <label for="msg">Mensaje: </label>
            <textarea id="msg" name="msg"></textarea>
        </li>
        <button type="submit">Enviar</button>
    </ul>
</form>
<?php
include("footer.php");
?>
