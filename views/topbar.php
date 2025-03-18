<?php
redirectIfNotLoggedIn();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Tienda</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .topbar { background: #333; color: white; padding: 10px; display: flex; justify-content: space-between; }
        .topbar a { color: white; text-decoration: none; padding: 0 15px; }
        .topbar a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="topbar">
    <div>
        <a href="home.php">Inicio</a>
        <a href="productos.php">Productos</a>
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin'): ?>
            <a href="admin_productos.php">Admin Productos</a>
            <a href="admin_usuarios.php">Admin Usuarios</a>
        <?php endif; ?>
    </div>
    <div>
        <?php if (isset($_SESSION['user_id'])): ?>
            <span>Bienvenido, <?= htmlspecialchars($_SESSION['user_name']) ?></span>
            <a href="mi_cuenta.php">Mi cuenta</a>
            <a href="../logout.php">Cerrar sesión</a>
        <?php else: ?>
            <a href="login.php">Iniciar sesión</a>
            <a href="register.php">Registrarse</a>
        <?php endif; ?>
    </div>
</div>

</body>
</html>
