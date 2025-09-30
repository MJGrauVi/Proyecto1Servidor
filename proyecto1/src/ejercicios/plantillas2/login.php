<?php include "header.php"; ?>

<div class="container">
    <h2>Login</h2>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        if ($usuario === "admin" && $password === "1234") {
            $_SESSION['usuario'] = $usuario;
            header("Location: index2.php");
            exit();
        } else {
            echo "<p class='error'>Usuario o contraseña incorrectos</p>";
        }
    }
    ?>

    <form method="post" action="" class="formulario">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>

        <label>Contraseña:</label>
        <input type="password" name="password" required>

        <button type="submit">Entrar</button>
    </form>
</div>

<?php include "footer.php"; ?>
