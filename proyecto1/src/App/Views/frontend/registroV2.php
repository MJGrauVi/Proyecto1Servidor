<?php
$titulo = "Registro Usuario";

include_once(__DIR__ . '/template/head.php');
include_once(__DIR__ . '/template/header.php');
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

    <form action="user/registro" method="post">
        <div class="form-group">
            <label for="inputUsername" class="form-label">Nombre de Usuario</label>
            <input type="text" id="inputUsername" name="username" class="form-control" placeholder="Introduce tu nombre"
                   value="<?= htmlspecialchars($_POST['username'] ?? '') ?>" required>
        </div>

        <div class="form-group">
            <label for="inputEmail" class="form-label">Correo electrónico</label>
            <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Introduce tu correo"
                   value="<?= htmlspecialchars($_POST['email'] ?? '') ?>" required>
        </div>

        <div class="edad-tipoUsuario">
            <div class="form-group">
                <label for="inputEdad" class="form-label">Introduce tu edad</label>
                <input type="number" id="inputEdad" name="edad" class="form-control" min="0" max="120"
                       value="<?= htmlspecialchars($_POST['edad'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="inputType" class="form-label">Tipo de usuario</label>
                <select class="form-select" name="type" id="inputType">
                    <option value="">Selecciona el tipo de usuario</option>
                    <option value="Admin" <?= ($_POST['type'] ?? '') === 'Admin' ? 'selected' : '' ?>>Administrador</option>
                    <option value="normal" <?= ($_POST['type'] ?? '') === 'normal' ? 'selected' : '' ?>>Normal</option>
                    <option value="anuncios" <?= ($_POST['type'] ?? '') === 'anuncios' ? 'selected' : '' ?>>Anuncios</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="form-label">Contraseña</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Introduce tu contraseña" required>
        </div>

        <div class="form-group">
            <label for="inputConfirm" class="form-label">Confirmar contraseña</label>
            <input type="password" id="inputConfirm" name="confirm_password" class="form-control" placeholder="Repite tu contraseña" required>
        </div>

        <div class="form-group">
            <button type="submit">Registrarse</button>
        </div>
    </form>
</div>

<?php include_once(__DIR__ . '/template/footer.php'); ?>
