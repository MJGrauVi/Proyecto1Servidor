<?php
$titulo = "Iniciar sesión";

include_once(__DIR__ . '/template/frontend.head.php');
include_once(__DIR__ . '/template/frontend.header.php');
//nclude_once "template/aside.php";
//include_once 'main.php';
?>
<!--<main class="content">
    <h2 class="tituloPagina"><?php /*= $titulo */ ?></h2>
    <div class="content"><?php /*= $contenido */ ?></div>
</main>-->


<div class="form-container">
    <h2 class="page-title"><?= $titulo ?></h2>
    <form action="/user/login" method="post">
        <div class="form-group">
            <label for="inputUsername">Nombre de Usuario</label>
            <input type="text" id="inputUsername" name="username" placeholder="Introduce tu usuario" aria-label="input de username">
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="inputPassword" name="password" placeholder="Introduce tu contraseña" aria-label="Input de Password">
        </div>
        <div class="form-group">
            <button type="submit" value="Iniciar sesion">Enviar</button>
        </div>
</div>
</form>
<?php
// Verificamos si hay un mensaje de error desde login.php
if (isset($_GET['error'])) {
    echo '<p class="error">Usuario o contraseña incorrectos.</p>';
}
?>

<?php
include_once __DIR__ . '/template/frontend.footer.php';
?>