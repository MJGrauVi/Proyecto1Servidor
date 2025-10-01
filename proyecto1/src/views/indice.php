<?php
// 1️⃣ Cargar las constantes primero
require_once __DIR__ . '/../env.php'; // ajusta la ruta si es necesario

$titulo = "Generar Contraseña";
// 3️⃣ Incluir templates
/*
include DIRECTORIO_TEMPLATE . "head.php";
include DIRECTORIO_TEMPLATE . "header.php";
include DIRECTORIO_TEMPLATE . "subheader.php";
*/
include "template/head.php";
include "template/header.php";
include "template/subheader.php";

?>
    <!--HTML personalizado para mi página-->
    <div class="texto">
        <h1>Generador de constraseñas</h1>
    </div>

<?php
include "template/footer.php";
   // include DIRECTORIO_TEMPLATE . "footer.php";
