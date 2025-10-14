<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titulo ?? 'Proyecto Base' ?></title>

    <!-- Fuente moderna -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Estilos -->
    <link rel="stylesheet" href="vistas/public/template/style.css">
</head>

<body>
    <header class="site-header">
        <div class="brand">
            <a href="/" class="logo">Proyecto Base</a>
        </div>

        <button class="nav-toggle" id="navToggle" aria-label="Abrir navegación">
            ☰
        </button>
    </header>
    <div class="layout">
        <button class="nav-toggle" id="navToggle" aria-label="Abrir navegación"></button>
        <aside class="sidebar" id="sidebar" aria-label="Menú principal">
            <nav>
                <ul>
                    <li><a href="/">Inicio</a></li>
                    <li><a href="/dni?numero=12345678">Calcular DNI</a></li>
                    <li><a href="/password?length=8">Generar Contraseña</a></li>
                    <li><a href="/administrador">Administración</a></li>
                </ul>
            </nav>
        </aside>
        <main class="content">
            <h2 class="page-title"><?= $titulo ?></h2>

            <?php if (!empty($contenido)):
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
    <footer class="site-footer">
        <p>Proyecto Base &copy; <?= date('Y') ?></p>
    </footer>

    <!-- Script mínimo para menú móvil -->
    <script>
      /*   (function() {
            const btn = document.getElementById('navToggle');
            const sidebar = document.getElementById('sidebar');
            btn.addEventListener('click', () => {
                sidebar.classList.toggle('open');
            });
            // cerramos menú al navegar (útil en móviles)
            sidebar.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
                sidebar.classList.remove('open');
            }));
        })(); */
            document.addEventListener("DOMContentLoaded", () => {
                const navToggle = document.getElementById("navToggle");
                const sidebar = document.querySelector(".sidebar");

                navToggle.addEventListener("click", () => {
                    sidebar.classList.toggle("open");
                });
            });
    </script>
</body>

</html>