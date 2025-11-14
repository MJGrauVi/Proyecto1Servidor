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
                <?php /*= $contenido */?>
                <!--*************************Contenido **********************-->
                <div class="form-container>
                <form action="/user/publicacion" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="FormControlInputTitulo" class="form-label fw-bold">Título</label>
                        <input type="text" class="form-control" name="titulo" id="FormControlInputTitulo" placeholder="Introduce el título">
                        <label for="FormControlInputFecha" class="form-label">Fecha de publicación</label>
                        <input type="date" class="form-control-fecha" name="fecha_publicacion" id="FormControlInputFecha">
                    </div>
                    <div class="form-tipo">
                        <label for="FormControlSelectTipoPubli" class="form-label">Tipo de publicación</label>

                        <select class="form-select" name="tipoPubli" id="FormControlSelectTipoPubli">
                            <option selected value="articulo">Artículo</option>
                            <option value="descubrimientos">Descubrimientos</option>
                            <option value="lugares">Lugares</option>
                            <option value="poemasyVersos">Poemas y versos</option>
                            <option value="recetas">Recetas</option>
                            <option value="cartaAbierta">Carta abierta</option>
                        </select>
                    </div>

                    <fieldset class="form-tipo">
                        <legend class="fs-5 fw-bold">Lenguajes disponibles</legend>
                        <div class="form-check">
                            <input class="form-check-input" name="idiomas[]" type="checkbox" value="español" id="checkEspañol">
                            <label class="form-check-label" for="checkEspañol">Español</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" name="idiomas[]" type="checkbox" value="ingles" id="checkIngles" checked>
                            <label class="form-check-label" for="checkIngles">Inglés</label>
                        </div>
                    </fieldset>

                    <div class="form-group">
                        <label class="form-label" for="FormControlFileImagen">Imagen de la publicación</label>
                        <input type="file" class="form-control" name="imagenpubli" id="FormControlFileImagen">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enviar publicación</button>
                    </div>
                </form>
            </div>
            </div>
        </section>

    <?php
    endif;
    ?>
</main>