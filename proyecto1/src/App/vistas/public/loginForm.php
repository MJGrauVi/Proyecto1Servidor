<?php
$titulo = "Iniciar sesión";

include_once "template/head.php";
include_once "template/header.php";
//nclude_once "template/aside.php";
//include_once 'main.php';
?>
    <!--<main class="content">
    <h2 class="tituloPagina"><?php /*= $titulo */ ?></h2>
    <div class="content"><?php /*= $contenido */ ?></div>
</main>-->


    <div class="login-container">
        <h2 class="page-title"><?= $titulo ?></h2>
        <form action="/login" method="post">
            <div class="form-group">
                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" id="usuario" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Entrar</button>
            </div>
        </form>
        <?php
        // Verificamos si hay un mensaje de error desde login.php
        if (isset($_GET['error'])) {
            echo '<p class="error">Usuario o contraseña incorrectos.</p>';
        }
        ?>

<?php
include_once "template/footer.php";
?>