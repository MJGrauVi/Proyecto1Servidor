<?php include "header.php"; ?>

<?php if (isset($_SESSION['usuario'])): ?>
    <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?> 🎉</h2>
    <p>Esta es la página principal del proyecto.</p>
    <ul>
        <li>Opción 1</li>
        <li>Opción 2</li>
        <li>Opción 3</li>
    </ul>
<?php else: ?>
    <h2>No estás logueado</h2>
    <p><a href="../plantillas/login.php">Haz login aquí</a></p>
<?php endif; ?>

<?php include "footer.php"; ?>

