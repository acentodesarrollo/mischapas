<?php
include("cabecera.php");
?>
<form action="aux_contacto.php" method="post">
    <ul>
        <li>
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name">
        </li>
        <li>
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email">
        </li>
        <li>
            <label for="asunto">Asunto:</label>
                <input type="text" name="asunto" id="asunto">
        </li>
        <li>
            <label for="msg">Mensaje:</label>
            <textarea id="msg" name="user_message"></textarea>
        </li>
        <button type="submit">Enviar</button>
    </ul>
</form>
<?php
include("footer.php");
?>