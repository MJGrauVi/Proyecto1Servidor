<main class="content">
    <h2 class="page-title"><?= $titulo ?></h2>

    <?php
    if (!empty($contenido)): //Si no esta vacio contenido.
        $class = match (true) { //Asigno clase según el título.
            strpos($titulo, 'DNI') !== false        => 'dni',
            strpos($titulo, 'Contraseña') !== false => 'password',
            strpos($titulo, 'publicacion') !== false=> 'publicacion',
            strpos($titulo,'Iniciar sesion') !== false => 'iniciar_sesion',
            strpos($titulo, 'Registrarse') !== false => 'registrarse',
            default                                 => 'info',
        };

        $icon = match ($class) { //Según la clase asignada asocio el icono.
            'dni'      => '🆔',
            'password' => '🔑',
            'publicacion'     => '🎴',
            'iniciar_sesion' => '🎞️',
            'registrarse' => '🧑',
            default    => 'ℹ️'
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