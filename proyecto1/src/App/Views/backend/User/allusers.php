<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>todos los usuarios</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <?php
            if($usuarios){
            foreach ($usuarios as $usuario) {
               ?>
                <div class="card m-1" style="width: 18rem;">
                    <!-- <img src="<?php /*= DIRECTORIO_IMG_BACKEND */ ?>user.png" class="card-img-top" alt="...">-->
                    <img src="../template/img/user.png" alt="..." class='card-img-top'>
                    <div class="card-body">
                        <h5 class="card-title"><?= $usuario->getUsername() ?></h5>
                        <p class="card-text"><?= $usuario->getEmail() ?></p>
                        <p class="card-text"><?= $usuario->getUuid() ?></p>
                        <a href="/user/<?= $usuario->getUuid() ?>" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
            <?php }
            }else{?>
            <div>
                <p>No hay usuarios en el sistema.</p>
            </div>
            <?php
            }
            ?>

        </div>
    </div>

</body>

</html>
<!--=======
<?php
/*$titulo="Backend Netflix";
include_once(DIRECTORIO_TEMPLATE_BACKEND."head.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."hamburger.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."header.php");
include_once(DIRECTORIO_TEMPLATE_BACKEND."aside.php");
$tituloSeccion="Todos los usuarios";
include_once(DIRECTORIO_TEMPLATE_BACKEND."main.php");
*/?>
    <div class="container">
        <div class="row">
            <?php
/*            foreach($usuarios as $usuario){
                */?>
                <div class="card m-1" style="width: 18rem;">
                    <img src="<?php /*=DIRECTORIO_IMG_BACKEND*/?>user.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php /*=$usuario->getUsername()*/?></h5>
                        <p class="card-text"><?php /*=$usuario->getEmail()*/?></p>
                        <p class="card-text"><?php /*=$usuario->getUuid()*/?></p>
                        <a href="/user/<?php /*=$usuario->getUuid()*/?>" class="btn btn-primary">Detalles</a>
                    </div>
                </div>
                <?php
/*            }
            */?>
        </div>
    </div>
--><?php
/*include_once(DIRECTORIO_TEMPLATE_BACKEND."footer.php");
>>>>>>> 795285ea7eb02711d994ce06fdd3ca7532d4a4b0*/
