</div>
<footer class="site-footer">
    <p><?= $titulo ?? 'Proyecto Base' ?> &copy; <?= date('Y') ?></p>
</footer>

<!-- Script mínimo para menú móvil -->
<script>
    (function(){
        const btn = document.getElementById('navToggle');
        const sidebar = document.getElementById('sidebar');
        btn.addEventListener('click', () => {
            sidebar.classList.toggle('open');
        });
        // cerramos menú al navegar (útil en móviles)
        sidebar.querySelectorAll('a').forEach(a => a.addEventListener('click', () => {
            sidebar.classList.remove('open');
        }));
    })();
</script>
</body>
</html>