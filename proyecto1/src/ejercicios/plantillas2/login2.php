<?php include "header.php"; ?>

<h2>Login</h2>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Para el ejemplo usamos usuario fijo
    if ($usuario === "admin" && $password === "1234") {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        echo "<p style='color:red;'>Usuario o contraseña incorrectos</p>";
    }
}
?>

<form method="post" action="">
    <label>Usuario:</label>
    <input type="text" name="usuario" required><br><br>

    <label>Contraseña:</label>
    <input type="password" name="password" required><br><br>

    <button type="submit">Entrar</button>
</form>

<?php include "footer.php"; ?>
