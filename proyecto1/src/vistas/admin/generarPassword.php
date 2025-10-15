<?php
$titulo = "Generar contraseña";

include_once "template/head.php";
include_once "template/header.php";
include_once "template/aside.php";
//include_once './vistas/public/template/main.php';
?>
<!--<main class="content">
    <h2 class="tituloPagina"><?php /*= $titulo */ ?></h2>
    <div class="content"><?php /*= $contenido */ ?></div>
</main>-->
    <h2 class="page-title"><?= $titulo ?></h2>

<?php
if (!empty($contenido)):
    $class = match (true) {
        strpos($titulo, 'DNI') !== false        => 'dni',
        strpos($titulo, 'Contraseña') !== false => 'password',
        default                                 => 'info',
    };

    $icon = match ($class) {
        'dni'      => '🆔',
        'password' => '🔑',
        default    => 'ℹ️',
    };
    ?>

    <section class="card <?= $class ?>">
        <div class="card-icon" aria-hidden="true"><?= $icon ?></div>
        <div class="card-body">
            <?= $contenido ?>
        </div>
    </section>

<?php endif; ?>
<?php
include_once "template/footer.php";
?>