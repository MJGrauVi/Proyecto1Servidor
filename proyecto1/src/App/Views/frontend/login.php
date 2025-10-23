<?php
    echo "vista de login";
    ?>
<html>
<head>
    <tittle>Iniciar sesion</tittle>
</head>
    <body>
    <h1>Bienvenido</h1>
    <form action="/user/login" method="post">
        <label for="inputUsername">Nombre de Usuario</label>

        <input type="text" id="inputUsername" name="username" placeholder="Introduce tu usuario" aria-label="input de username">
        <input type="password" id="inputPassword" name="password" placeholder="Introduce tu contraseña" aria-label="Input de Password">
        <input type="submit" value="Iniciar sesion">
    </form>
</body>

</html>