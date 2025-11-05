<!-- views/user_created.php -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Usuario creado correctamente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header bg-success text-white">
                <h2 class="mb-0"> Usuario creado correctamente</h2>
            </div>
            <div class="card-body">
                <p><strong>Nombre de usuario:</strong> <?= htmlspecialchars($user->getUsername()) ?></p>
                <p><strong>Email:</strong> <?= htmlspecialchars($user->getEmail()) ?></p>
                <p><strong>Edad:</strong> <?= htmlspecialchars($user->getEdad() ?? 'No especificada') ?></p>
                <p><strong>Tipo de usuario:</strong> <?= htmlspecialchars($user->getTipo()->name) ?></p>
                <p><strong>ID:</strong> <?= htmlspecialchars($user->getUuid()->toString()) ?></p>
            </div>
            <div class="card-footer">
                <a href="/usuarios/listar" class="btn btn-primary"> Volver al listado</a>
            </div>
        </div>
    </div>

</body>

</html>