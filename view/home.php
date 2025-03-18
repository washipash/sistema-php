<?php
require '../config/auth.php';
redirectIfNotLoggedIn();
?>
<h1>Bienvenido a la tienda</h1>
<a href="productos.php">Ver productos</a>
<a href="mi_cuenta.php">Mi cuenta</a>
<a href="../logout.php">Cerrar sesión</a>
