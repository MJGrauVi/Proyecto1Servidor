<?php
$titulo = "Nuevo Post";

include_once DIRECTORIO_VISTAS_FRONTEND . 'template/frontend.head.php';
include_once DIRECTORIO_VISTAS_FRONTEND . 'template/frontend.header.php';
include_once  DIRECTORIO_VISTAS_FRONTEND .'template/frontend.aside.php' ;
$tituloSeccion="Crear Publi";
?>
    <div class="form-container">
        <h2 class="page-title"><?= $titulo ?></h2>

        <form action="/publi/show" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="FormControlInputTitulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" id="FormControlInputTitulo" placeholder="Introduce el título">
            </div>

            <!--    <div class="form-group mb-3">
                    <label for="FormControlInputFecha" class="form-label">Fecha</label>
                    <input type="date" class="form-control" name="fecha_estreno" id="FormControlInputFecha">
                </div>-->

            <div class="form-group">
                <label for="FormControlSelectTipo" class="form-label">Tipo publicación</label>
                <select class="form-select" name="genero" id="FormControlSelectTipo" aria-label="Default select">
                    <option selected value="accion">Reflexión con imagen</option>
                    <option value="drama">Carta abierta</option>
                    <option value="slasher">Historia personal</option>
                </select>
            </div>

            <div class="form-group">
                <label for="contenido" class="form-label">Contenido</label>
                <textarea rows="5"  class="form-control" id="contenido" name="contenido"></textarea>
            </div>

            <div class="form-group">
                <fieldset name="idomas" class="border rounded p-3">
                    <legend class="w-auto px-2">Redes Sociales</legend>

                    <div class="form-check">
                        <input class="form-check-input" name="redes[]" type="checkbox" value="face" id="checkface" checked>
                        <label class="form-check-label" for="checkface">Facebook</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" name="redes[]" type="checkbox" value="x" id="checkx">
                        <label class="form-check-label" for="checkx">X</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" name="redes[]" type="checkbox" value="insta" id="checkinsta">
                        <label class="form-check-label" for="checkinsta">Instagram</label>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <label class="form-label" for="FormControlFilePoster">Poster de la película</label>
                <input type="file" class="form-control" name="poster" id="FormControlFilePoster">
            </div>

            <div class="form-group">
                <input class="btn btn-primary" type="submit" value="Enviar">
            </div>

        </form>
    </div>
<?php
include_once DIRECTORIO_VISTAS_FRONTEND .'template/frontend.footer.php';
?>