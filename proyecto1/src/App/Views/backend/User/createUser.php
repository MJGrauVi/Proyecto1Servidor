
<?php
$titulo = "Nuevo Usuario";

include_once(__DIR__ . '/../template/head.php');

include_once(__DIR__ . '/../template/header.php');

include_once (__DIR__ .'/../template/aside.php');

$tituloSeccion="Crear Usuario";

?>
<div class="form-container">
    <h2 class="page-title"><?= $titulo ?></h2>

    <form action="/user" method="post">
        <div class="form-group">
            <label for="inputUsername" class="form-label">Nombre de usuario</label>
            <input type="text" class="form-control" id="inputUsername" name="username"
                <?php if(isset($resultado)) {echo "value=".$_POST['username']; }?>
            >

        </div>
        <div class="form-group">
            <label for="inputPassword" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="inputPassword" name="password"
                <?php if(isset($resultado)) {echo "value=".$_POST['password']; }?>>
        </div>
        <div class="form-group">
            <label for="inputEmail" class="form-label">Correo Electrónico</label>
            <input type="email" class="form-control" id="inputEmail" name="email"
                <?php if(isset($resultado)) {echo "value=".$_POST['email']; }?>
            >
        </div>
        <div class="form-group">
            <label for="inputEdad" class="form-label">Introduce tu edad</label>
            <input type="number" class="form-control" id="inputEdad" name="edad"
                <?php if(isset($resultado)) {echo "value=".$_POST['edad']; }?>
            >

        </div>
        <div class="form-group">
            <select class="form-select" name="tipo" id="inputType">
                <option selected>Selecciona el tipo de usuario</option>
                <option value="admin"
                    <?php if(isset($resultado) && $_POST['tipo']=='admin') {echo "selected";}?>
                >Administrador</option>
                <option value="normal"
                    <?php if(isset($resultado) && $_POST['tipo']=='normal') {echo "selected";}?>
                >Normal</option>
                <option value="anuncios"
                    <?php if(isset($resultado) && $_POST['tipo']=='anuncios') {echo "selected";}?>
                >Anuncios</option>
            </select>
        </div>

        <?php
        if(isset($resultado)){?>
            <div class="p-3 text-danger-emphasis bg-danger-subtle- border border-danger-subtle rounded-3">
                <?php foreach ($resultado as $error){ echo $error."</br>";} ?>
            </div>



        <?php }
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Crear Usuario</button>
        </div>
    </form>
<?php
include_once (__DIR__ .'../../template/footer.php');
?>