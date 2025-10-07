<main class="content">
    <h2 class="page-title"><?= $titulo ?></h2>

    <?php if(!empty($contenido)):
        $class = strpos($titulo, 'DNI') !== false ? 'dni' : (strpos($titulo, 'Contraseña') !== false ? 'password' : 'info');
        $icon = $class === 'dni' ? '🆔' : ($class === 'password' ? '🔑' : 'ℹ️');
        ?>
        <section class="card <?= $class ?>">
            <div class="card-icon" aria-hidden="true"><?= $icon ?></div>
            <div class="card-body">
                <?= $contenido ?>
            </div>
        </section>
    <?php endif; ?>
</main>
</div>