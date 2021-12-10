<!DOCTYPE html>
<html lang="es">
<!-- Página de registro que tiene su propia cabecera y pie -->
<head>
    <title>Mis Chapas</title>
    <meta charset="UTF-8">
    <meta name="title" content="Mis Chapas">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Mi colección de chapas de cerveza con toda la información sobre la marca asociada">
    <link href="styles/style_admin.css" rel="stylesheet" type="text/css" />
    <!-- <link href="bootstrap-4.0.0-dist/css/bootstrap.css" rel="stylesheet" media="screen"> -->
    <script src="scripts/jquery-3.5.1.js"></script>
    <script src="scripts/javascript.js"></script>
    <link rel="shortcut icon" type="image/jpg" href="img/favicon.png" />
    <link rel="stylesheet" href="https://releases.jquery.com/git/ui/jquery-ui-git.css" />
    <script src="https://code.jquery.com/ui/1.13.0-rc.2/jquery-ui.js" integrity="sha256-bLjSmbMs5XYwqLIj5ppZFblCo0/9jfdiG/WjPhg52/M=" crossorigin="anonymous">
    </script>
</head>

<body>
    <div id="contenedor">
        <header>
            <h1>
                <a href="http://localhost:8888/mischapas/admin_listado.php">Mis chapas | Admin</a>
            </h1>
        </header>
        <div id="contenido">
            <form action="aux_login.php" method="post" id="form-login">
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
        </div><!--cierre del "contenido"-->
        <footer>
            <p><a href="admin_form_login.php" target="blank">Admin</a> | Aviso legal</p>
        </footer>
    </div><!--cierre del "contenedor"-->
</body>

</html>
