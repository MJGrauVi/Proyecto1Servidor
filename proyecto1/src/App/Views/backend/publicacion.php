<?php
$titulo = "Añadir publicación";
include_once("template/head.php");
//include_once("template/hamburger.php");
include_once("template/header.php");
include_once("template/aside.php");
$tituloSeccion = "Añadir Publicación";
//include_once("template/main.php");

?>
    <div class="form-wrapper">
    <h2 class="page-title"><?= $titulo ?></h2>
<form action="/post" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="FormControlInputTitulo" class="form-label">Titulo</label>
        <input type="text" class="form-control" name="titulo" id="FormControlInputTitulo" placeholder="Introduce el título">
    </div>
    <div class="form-group">
        <label for="FormControlInputFecha" class="form-label">Fecha</label>
        <input type="date" class="form-control" name="fecha_estreno" id="FormControlInputFecha">
    </div>
    <div class="form-group">
        <label for="FormControlSelectTipo" class="form-label">Tipo publicación</label>
        <select class="form-select" name="genero" id="FormControlSelectTipo" aria-label="Default select">
            <option selected value="accion">Reflexión con imagen</option>
            <option value="drama">Carta abierta</option>
            <option value="comedia">Frase del día</option>
            <option value="slasher">Historia personal</option>
        </select>
    </div class="form-group">
    <label for="contenido" class="contenido-label">Contenido</label>
    <textarea type="text" rows="5" id="contenido" name="contenido"></textarea>
    <div>

    </div>
    <div class="form-group">
        <fieldset name="idomas">
            <legend>Redes Sociales</legend>
            <div class="form-check">
                <input class="form-check-input" name="redes[]" type="checkbox" value="face" id="checkface" checked>
                <label class="form-check-label" for="checkface">
                    Facebook
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="redes[]" type="checkbox" value="x" id="checkx">
                <label class="form-check-label" for="checkx">
                    X
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" name="redes[]" type="checkbox" value="insta" id="checkinsta">
                <label class="form-check-label" for="checkinsta">
                    Instagram
                </label>
            </div>
        </fieldset>

    </div>
    <div class="form-group">
        <label class="form-label" for="FormControlFilePoster">Poster de la película</label>
        <input type="file" name="poster" id="FormControlFilePoster">
    </div>

    <div class="form-group">
        <input type="submit" value="Enviar">
    </div>

</form>

<?php
include_once("template/footer.php");
