<?php
require 'config/auth.php';
redirectIfNotLoggedIn();
if (!isAdmin()) { header("Location: views/home.php"); exit(); }
?>
<h1>Panel de Administración</h1>
<ul>
    <li><a href="views/admin_productos.php">Administrar Productos</a></li>
    <li><a href="views/admin_usuarios.php">Administrar Usuarios</a></li>
</ul>
<a href="logout.php">Cerrar sesión</a>
