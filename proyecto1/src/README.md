# 🧩 Proyecto MVC en PHP - Módulo `User`

Este proyecto es un ejemplo educativo para aprender a conectar rutas, controladores, modelos y vistas usando PHP y el enrutador Phroute. Actualmente está centrado en el módulo `User`.

---

## 📁 Estructura del módulo `User`

### 🧭 Rutas activas

| Ruta HTTP       | Método del controlador        | Descripción                                 | Vista asociada                        |
|-----------------|-------------------------------|---------------------------------------------|----------------------------------------|
| `/user`         | `index()`                     | Muestra todos los usuarios (solo admin)     | `User/allusersMej.php`                 |

---

## 🧑‍💻 Controlador: `UserController.php`

Ubicación: `App/Controllers/UserController.php`

```php
function index() {
    if (isset($_SESSION['user']) && $_SESSION['user']->isAdmin()) {
        $usuarios = UserModel::getAllUsers();
        include_once DIRECTORIO_VISTAS_BACKEND . "User/allusersMej.php";
    } else {
        $error = "No tiene permisos para acceder a esta pagina";
        include_once DIRECTORIO_VISTAS_BACKEND . "error.php";
    }
}
