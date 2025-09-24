<?php
session_start();
session_destroy(); // cerrar la sesión
header("Location: login.php");
exit();
