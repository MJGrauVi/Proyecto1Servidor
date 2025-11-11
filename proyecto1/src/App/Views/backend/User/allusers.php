<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Todos los usuarios</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
    <h1 class="mb-4 text-center">Lista de usuarios</h1>

    <div class="row justify-content-center">
        <?php if (!empty($usuarios)): ?>

            <?php foreach ($usuarios as $usuario): ?>
                <div class="card m-2 shadow" style="width: 18rem;">
                    <img src="../template/img/user.png" alt="..." class='card-img-top'>
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($usuario->getUsername()) ?></h5>
                        <p class="card-text"><?= htmlspecialchars($usuario->getEmail()) ?></p>
                        <p class="card-text"><small>ID: <?= htmlspecialchars($usuario->getUuid()) ?></small></p>
                        <div class="d-flex justify-content-between">
                            <a href="/user/<?= $usuario->getUuid() ?>" class="btn btn-primary btn-sm">Detalles</a>
                            <a href="/user/edit/<?= $usuario->getUuid() ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="/user/delete/<?= $usuario->getUuid() ?>" class="btn btn-danger btn-sm"
                               onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p class="alert alert-info">No hay usuarios registrados en este momento.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Bootstrap JS (opcional si usas componentes interactivos) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
