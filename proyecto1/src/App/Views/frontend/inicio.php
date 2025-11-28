<?php
   $titulo = "Inicio";
    $contenido = "Bienvenido a la web pública";
    include "App/Views/frontend/template/frontend.head.php";
    include "App/Views/frontend/template/frontend.header.php";
    include "App/Views/frontend/template/frontend.aside.php";
    ?>
<main class="content">
    <h2 class="page-title"><?= $titulo ?></h2>

<?php
if (!empty($contenido)): //Si no esta vacio contenido.
    $class = match (true) { //Asigno clase según el título.
        strpos($titulo, 'DNI') !== false        => 'dni',
        strpos($titulo, 'Contraseña') !== false => 'password',
        strpos($titulo, 'publicación') !== false=> 'publicacion',
        default                                 => 'info',
    };

    $icon = match ($class) { //Según la clase asignada asocio el icono.
        'dni'      => '🆔',
        'password' => '🔑',
        'publicacion'     => '🎴',
        default    => 'ℹ️',
    };
    ?>

    <section class="card <?= $class ?>"><!--tarjeta con clase dinámica.-->
        <div class="card-icon" aria-hidden="true"><?= $icon ?></div><!--icono-dinamico-->
        <div class="card-body">
            <?= $contenido ?>
        </div>
    </section>

<?php
endif;
?>
</main>
<?php
include_once "App/Views/frontend/template/frontend.footer.php";