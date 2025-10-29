<?php
$titulo = "Registro Usuario";

include_once(__DIR__ . '/template/head.php');
include_once(__DIR__ . '/template/header.php');
//nclude_once "template/aside.php";
//include_once 'main.php';
?>
<!--<main class="content">
    <h2 class="tituloPagina"><?php /*= $titulo */ ?></h2>
    <div class="content"><?php /*= $contenido */ ?></div>
</main>-->

<!-- pendiente de comprobación
<?php if(is_array($resultado)){?>
<div class="mensaje-error">
    <?php foreach ($resultado as $error){echo $error. "</br>";}?>
</div>
}
-->

    <div class="form-container">
        <h2 class="page-title"><?= $titulo ?></h2>
        <form action="/user"  method="post">
<div class="form-group">
            <label for="inputUsername">Nombre de Usuario</label>
            <input type="text" id="inputUsername" name="username" placeholder="Intro" required>
</div>
            <div class="form-group">
                <label for="inputEmail">Correo electrónico</label>
                <input type="email" id="inputEmail" name="email" placeholder="Introduce tu correo" required>
            </div>
            <div class="form-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" id="inputPassword" name="password" placeholder="Introduce tu contraseña" required>
            </div>
            <div class="form-group">
                <label for="inputConfirm">Confirmar contraseña</label>
                <input type="password" id="inputConfirm" name="confirm_password" placeholder="Repite tu contraseña" required>
            </div>
            <div class="form-group">
                <button type="submit" value="Registrarse">Registrarse</button>
            </div>
        </form>
    </div>
</body>

</html>