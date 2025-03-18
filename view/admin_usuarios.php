<?php
require 'config/auth.php';
redirectIfNotLoggedIn();
if (!isAdmin()) { header("Location: home.php"); exit(); }

$stmt = $conn->query("SELECT id, nombre, apellido, correo, rol FROM usuarios");
$usuarios = $stmt->fetchAll();
?>
<h1>Administrar Usuarios</h1>
<a href="crear_usuario.php">Agregar Usuario</a>
<table>
    <tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Rol</th><th>Acciones</th></tr>
    <?php foreach ($usuarios as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['nombre'] . ' ' . $u['apellido'] ?></td>
            <td><?= $u['correo'] ?></td>
            <td><?= $u['rol'] ?></td>
            <td>
                <a href="editar_usuario.php?id=<?= $u['id'] ?>">Editar</a>
                <a href="borrar_usuario.php?id=<?= $u['id'] ?>">Eliminar</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
