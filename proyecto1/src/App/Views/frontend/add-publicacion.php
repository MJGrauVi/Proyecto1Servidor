<?php
$titulo = "Nueva publicación";
include_once(__DIR__ . '/template/head.php');
/*include_once "App/Views/frontend/template/header.php";*/
include_once(__DIR__ . '/template/header.php');
include_once __DIR__ . '/template/aside.php';
include_once 'main.php';
?>


   <!-- <div class="form-container>
    <h2 class=" page-title"><?php /*= $titulo */?></h2>
    <form action="/user/publicacion" method="post" enctype="multipart/form-data" class="p-4 rounded shadow bg-light" style="max-width: 600px; margin: auto;">
        <h2 class="mb-4 text-center text-primary">Nueva Publicación</h2>

        <div class="mb-3">
            <label for="FormControlInputTitulo" class="form-label fw-bold">Título</label>
            <input type="text" class="form-control" name="titulo" id="FormControlInputTitulo" placeholder="Introduce el título">
        </div>

        <div class="mb-3">
            <label for="FormControlInputFecha" class="form-label fw-bold">Fecha de publicación</label>
            <input type="date" class="form-control" name="fecha_publicacion" id="FormControlInputFecha">
        </div>

        <div class="mb-3">
            <label for="FormControlSelectTipoPubli" class="form-label fw-bold">Tipo de publicación</label>
            <select class="form-select" name="tipoPubli" id="FormControlSelectTipoPubli">
                <option selected value="articulo">Artículo</option>
                <option value="descubrimientos">Descubrimientos</option>
                <option value="lugares">Lugares</option>
                <option value="poemasyVersos">Poemas y versos</option>
                <option value="recetas">Recetas</option>
                <option value="cartaAbierta">Carta abierta</option>
            </select>
        </div>

        <fieldset class="mb-3">
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

        <div class="mb-3">
            <label class="form-label fw-bold" for="FormControlFileImagen">Imagen de la publicación</label>
            <input type="file" class="form-control" name="imagenpubli" id="FormControlFileImagen">
        </div>

        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Enviar publicación</button>
        </div>
    </form>
    </div>
-->






<?php
include_once "template/footer.php";
?>