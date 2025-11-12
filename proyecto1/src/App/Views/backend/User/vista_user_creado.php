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
            <div class="card-header text-purple">
                <h2 class="mb-0"> Usuario creado correctamente</h2>
            </div>
            <div class="card-body">
                <p><strong>Nombre de usuario:</strong> <?=$usuario->getUsername()?></p>
                <p><strong>Email:</strong> <?= $usuario->getEmail() ?></p>
                <p><strong>Edad:</strong> <?= $usuario->getEdad() ?? 'No especificada' ?></p>
                <p><strong>Tipo de usuario:</strong> <?= $usuario->getTipo()->name ?></p>
                <p><strong>ID:</strong> <?= $usuario->getUuid()->toString() ?></p>
            </div>
            <div class="card-footer">
                <a href="/usuarios/listar" class="btn btn-primary"> Volver al listado</a>
            </div>
        </div>
    </div>
    <script>
        function goToEditUser(){
            window.location.replace("http://localhost:8080/user/<?=$usuario->getUuid()?>/edit");
        }

        function peticionDELETE(){
            const requestOptions = {
                method: "DELETE",
                redirect: "follow"
            };

            fetch("http://localhost:8080/user/<?=$usuario->getUuid()?>", requestOptions)
                .then((response) => response.text())
                .then((result) => goToUsers())
                .catch((error) => console.error(error));


        }

        function goToUsers(){
            window.location.replace("http://localhost:8080/user");
        }


    </script>
</body>

</html>