<?php
include("admin_cabecera.php");
?>
<style>
    nav{
        display: none;
    }
</style>
<form action="admin_login.php" method="post" id="form-login">
    <fieldset id="fieldset-login">
        <legend>Iniciar sesión</legend>
        <label for="usuario">Usuario</label><br>
        <input type="mail" name="usuario" id="usuario"><br>
        <label for="password">Contraseña</label><br>
        <input type="password" name="password" id="password">
        <p><button type="submit" name="enviar">Enviar</button></p>
        <p>Recuperar/cambiar contraseña</p>
    </fieldset>
</form>