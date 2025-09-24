<?php include "header.php"; ?>

<div class="container">
    <?php if (isset($_SESSION['usuario'])): ?>
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?> 🎉</h2>
        <p>Esta es la página principal del proyecto.</p>
        <ul class="opciones">
            <li><a href="#">Opción 1</a></li>
            <li><a href="#">Opción 2</a></li>
            <li><a href="#">Opción 3</a></li>
        </ul>
    <?php else: ?>
        <h2>No estás logueado</h2>
        <p><a href="../plantillas2/login.php">Haz login aquí</a></p>
    <?php endif; ?>
</div>

<?php include "footer.php"; ?>

