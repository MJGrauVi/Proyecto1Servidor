<?php
$titulo = "Registro Usuario";

include_once(__DIR__ . '/template/head.php');
include_once(__DIR__ . '/template/header.php');
//nclude_once "template/aside.php";
//include_once 'main.php';
?>



<div class="form-container">
    <h2 class="page-title"><?= $titulo ?></h2>

  <?php if (isset($resultado) && is_array($resultado)) : ?>
        <div class="p-3 text-danger-emphasis bg-danger-subtle border border-danger-subtle rounded-3">
            <?php foreach ($resultado as $error) : ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="/user" method="post">
        <div class="form-group">
            <label for="inputUsername" class="form-label">Nombre de Usuario</label>
            <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Intro" required
                <?php if (isset($resultado)) { echo "value" . $_POST['username'];}  ?>
                >
        </div>
        <div class="form-group">
            <label for="inputEmail" class="form-label">Correo electrónico</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Introduce tu correo" required
                <?php if (isset($resultado)) { echo "value" . $_POST['email']; } ?>
                >
        </div>
        <div class="edad-tipoUsuario">
            <div class="form-group ">
                <label for="inputEdad" class="form-label">Introduce tu edad</label>
                <input type="number" class="form-control" id="inputEdad" name="edad" min="0" max="120"
                    <?php if (isset($resultado)) { echo "value=" . $_POST['edad']; } ?>
                >
            </div>
            <div class="form-group">
                <select class="form-select" name="tipo" id="inputType">
                    <option selected>Selecciona el tipo de usuario</option>
                    <option value="Admin"
                        <?php if (isset($resultado) && $_POST['type'] == 'Admin') {echo "selected";} ?>
                        >Administrador</option>
                    <option value="normal"
                        <?php if (isset($resultado) && $_POST['type'] == 'normal') { echo "selected";} ?>
                         >Normal</option>
                    <option value="anuncios"
                        <?php if (isset($resultado) && $_POST['type'] == 'anuncios') {echo "selected";} ?>
                        >Anuncios</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="form-label">Contraseña</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Introduce tu contraseña" required
                <?php if (isset($resultado)) {echo "value" . $_POST['password'];} ?>
                >
        </div>
        <div class="form-group">
            <label for="inputConfirm" class="form-label">Confirmar contraseña</label>
            <input type="password" id="inputConfirm" name="confirm_password" class="form-control" placeholder="Repite tu contraseña" required
                <?php if (isset($resultado)) {echo "value" . $_POST['password'];} ?>
                >
        </div>
        <?php
        if (isset($resultado)) { ?>
            <div class="p-3 text-danger-emphasis bg-danger-subtle- border border-danger-subtle rounded-3">
                <?php foreach ($resultado as $error) {
                    echo $error . "</br>";
                } ?>
            </div>

        <?php }
        ?>
        <div class="form-group">
            <button type="submit" value="Registrarse">Registrarse</button>
        </div>
    </form>
    <?php
    include_once(__DIR__ . '/template/footer.php');
